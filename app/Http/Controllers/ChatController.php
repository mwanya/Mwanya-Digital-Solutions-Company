<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PricingPackage;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Throwable;

class ChatController extends Controller
{
    public function ask(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:500'],
            'history' => ['nullable', 'array', 'max:12'],
            'history.*.role' => ['required_with:history', 'in:user,assistant'],
            'history.*.content' => ['required_with:history', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.anthropic.key');

        if ($apiKey) {
            $answer = $this->askAi($validated['message'], $validated['history'] ?? [], $apiKey);
            if ($answer !== null) {
                return response()->json(['reply' => $answer, 'source' => 'ai']);
            }
        }

        return response()->json(['reply' => $this->fallbackAnswer($validated['message']), 'source' => 'fallback']);
    }

    /**
     * Calls the Anthropic Messages API with a system prompt built from live
     * site content, so the assistant only talks about this company's real
     * services, pricing and policies. Returns null on any failure so the
     * caller can fall back to the FAQ matcher instead of showing an error.
     */
    private function askAi(string $message, array $history, string $apiKey): ?string
    {
        try {
            $messages = [];
            foreach ($history as $turn) {
                $messages[] = ['role' => $turn['role'], 'content' => $turn['content']];
            }
            $messages[] = ['role' => 'user', 'content' => $message];

            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
                'anthropic-version' => '2023-06-01',
                'content-type' => 'application/json',
            ])->timeout(20)->post('https://api.anthropic.com/v1/messages', [
                'model' => config('services.anthropic.model'),
                'max_tokens' => 400,
                'system' => $this->systemPrompt(),
                'messages' => $messages,
            ]);

            if (! $response->ok()) {
                return null;
            }

            $text = collect($response->json('content'))
                ->where('type', 'text')
                ->pluck('text')
                ->implode("\n");

            return trim($text) ?: null;
        } catch (Throwable $e) {
            return null;
        }
    }

    private function systemPrompt(): string
    {
        $company = setting('company.name', config('app.company.name'));
        $tagline = setting('company.tagline', config('app.company.tagline'));
        $phone = setting('company.phone_primary', config('app.company.phone_primary'));
        $email = setting('company.email', config('app.company.email'));
        $address = setting('company.address', config('app.company.address'));

        $services = Service::ordered()->get()
            ->map(fn ($s) => "- {$s->title}: {$s->short_description}")
            ->implode("\n");

        $pricing = PricingPackage::ordered()->get()
            ->map(fn ($p) => "- [{$p->category}] {$p->package_name}: {$p->price}".($p->unit ? " ({$p->unit})" : ''))
            ->implode("\n");

        $faqs = Faq::ordered()->get()
            ->map(fn ($f) => "Q: {$f->question}\nA: {$f->answer}")
            ->implode("\n\n");

        return <<<PROMPT
You are the friendly Quick Help assistant on the official website of {$company} ({$tagline}), a cleaning, fumigation, pest control and environmental services company based in Dar es Salaam, Tanzania.

Only answer questions about {$company} and its services, pricing, booking process, coverage area and policies, using the information below. If asked something unrelated or something you don't have information for, politely say you're not sure and suggest contacting the team directly.

Keep answers short (2-4 sentences), warm, and in plain English (or Swahili if the visitor writes in Swahili). Never invent prices or facts not listed below. Always end by inviting them to the Contact page or phone/email if they want to proceed.

COMPANY CONTACT
Phone: {$phone}
Email: {$email}
Address: {$address}

SERVICES
{$services}

PRICING (Tsh)
{$pricing}

FREQUENTLY ASKED QUESTIONS
{$faqs}
PROMPT;
    }

    /**
     * No-AI-key fallback: scores each FAQ by keyword overlap with the
     * visitor's message and returns the best match, or a generic nudge
     * toward the Contact page if nothing scores well.
     */
    private function fallbackAnswer(string $message): string
    {
        $query = strtolower($message);
        $queryWords = array_filter(preg_split('/\W+/', $query));

        $best = null;
        $bestScore = 0;

        foreach (Faq::ordered()->get() as $faq) {
            $haystack = strtolower($faq->question.' '.$faq->keywords);
            $score = 0;

            foreach ($queryWords as $word) {
                if (strlen($word) > 2 && str_contains($haystack, $word)) {
                    $score++;
                }
            }

            if (str_contains($haystack, $query) || str_contains($query, strtolower($faq->question))) {
                $score += 3;
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $faq;
            }
        }

        if ($best && $bestScore > 0) {
            return $best->answer;
        }

        $phone = setting('company.phone_primary', config('app.company.phone_primary'));

        return "I don't have a specific answer for that yet, but our team can help directly — call or WhatsApp us at {$phone}, or use the Contact form and we'll get back to you quickly.";
    }
}
