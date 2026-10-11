@php
    $starterFaqs = \App\Models\Faq::ordered()->take(3)->get();
@endphp

<button id="help-widget-toggle" class="fixed bottom-6 right-6 z-40 h-14 w-14 rounded-full bg-brand-orange text-white shadow-2xl flex items-center justify-center lift-hover pulse-glow" aria-label="Open Quick Help chat">
    <x-icon name="chat" class="w-6 h-6" />
</button>

<div id="help-widget-panel" class="hidden fixed bottom-24 right-6 z-40 w-[92vw] max-w-sm bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden flex flex-col h-[70vh] max-h-[560px]">
    <div class="bg-brand-dark text-white px-5 py-4 flex items-center justify-between flex-none">
        <div class="flex items-center gap-3">
            <span class="h-9 w-9 rounded-full bg-brand-orange flex items-center justify-center flex-none">
                <x-icon name="chat" class="w-4 h-4" />
            </span>
            <div>
                <p class="font-extrabold text-sm">Quick Help Assistant</p>
                <p class="text-[11px] text-gray-300 flex items-center gap-1.5">
                    <span class="h-1.5 w-1.5 rounded-full bg-green-400"></span> Ask anything about our services
                </p>
            </div>
        </div>
        <button id="help-widget-close" class="text-gray-300 hover:text-white flex-none">
            <x-icon name="close" class="w-5 h-5" />
        </button>
    </div>

    <div id="help-chat-messages" class="flex-1 overflow-y-auto px-4 py-4 space-y-3 bg-brand-cream/40">
        <div class="flex gap-2">
            <span class="h-7 w-7 rounded-full bg-brand-orange/15 text-brand-orange flex items-center justify-center flex-none"><x-icon name="chat" class="w-3.5 h-3.5" /></span>
            <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm shadow-sm max-w-[80%]">
                Hi! I'm the HEISEN GROUP Quick Help assistant. Ask me anything about our services, pricing or how to book — I'll do my best to answer right away.
            </div>
        </div>

        @if ($starterFaqs->isNotEmpty())
            <div class="flex flex-wrap gap-2 pl-9">
                @foreach ($starterFaqs as $faq)
                    <button type="button" class="help-suggestion text-xs font-semibold bg-white border border-brand-orange/30 text-brand-orange rounded-full px-3 py-1.5 hover:bg-brand-orange hover:text-white transition" data-question="{{ $faq->question }}">
                        {{ $faq->question }}
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    <div id="help-chat-typing" class="hidden px-4 pb-1 flex-none">
        <div class="flex gap-2">
            <span class="h-7 w-7 rounded-full bg-brand-orange/15 text-brand-orange flex items-center justify-center flex-none"><x-icon name="chat" class="w-3.5 h-3.5" /></span>
            <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-3 shadow-sm flex items-center gap-1">
                <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce" style="animation-delay:0ms"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce" style="animation-delay:150ms"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce" style="animation-delay:300ms"></span>
            </div>
        </div>
    </div>

    <form id="help-chat-form" class="p-3 border-t border-gray-100 flex-none flex items-center gap-2">
        <input type="text" id="help-chat-input" autocomplete="off" placeholder="Type your question..." class="!py-2.5 !text-sm flex-1" maxlength="500">
        <button type="submit" class="flex-none h-11 w-11 rounded-full bg-brand-orange text-white flex items-center justify-center hover:bg-brand-dark transition" aria-label="Send">
            <x-icon name="arrow-right" class="w-4 h-4" />
        </button>
    </form>
    <div class="px-4 pb-3 flex-none">
        <a href="{{ route('contact') }}" class="text-xs text-gray-400 hover:text-brand-orange flex items-center gap-1">
            Prefer a human? Contact us directly <x-icon name="arrow-right" class="w-3 h-3" />
        </a>
    </div>
</div>

<script>
    (function () {
        const toggleBtn = document.getElementById('help-widget-toggle');
        const closeBtn = document.getElementById('help-widget-close');
        const panel = document.getElementById('help-widget-panel');
        const form = document.getElementById('help-chat-form');
        const input = document.getElementById('help-chat-input');
        const messages = document.getElementById('help-chat-messages');
        const typing = document.getElementById('help-chat-typing');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        let history = [];
        let sending = false;

        toggleBtn?.addEventListener('click', () => {
            panel.classList.toggle('hidden');
            if (!panel.classList.contains('hidden')) input?.focus();
        });
        closeBtn?.addEventListener('click', () => panel.classList.add('hidden'));

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        const assistantAvatarSvg = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><path d="M4 5h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H9l-4.5 4v-4H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z"/><path d="M8 10h8M8 13h5"/></svg>`;

        function addMessage(role, text) {
            const wrap = document.createElement('div');
            if (role === 'user') {
                wrap.className = 'flex justify-end';
                wrap.innerHTML = `<div class="bg-brand-orange text-white rounded-2xl rounded-tr-sm px-4 py-2.5 text-sm shadow-sm max-w-[80%]">${escapeHtml(text)}</div>`;
            } else {
                wrap.className = 'flex gap-2';
                wrap.innerHTML = `<span class="h-7 w-7 rounded-full bg-brand-orange/15 text-brand-orange flex items-center justify-center flex-none">${assistantAvatarSvg}</span><div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm shadow-sm max-w-[80%] whitespace-pre-line">${escapeHtml(text)}</div>`;
            }
            messages.appendChild(wrap);
            messages.scrollTop = messages.scrollHeight;
        }

        async function sendMessage(text) {
            if (!text || sending) return;
            sending = true;
            addMessage('user', text);
            input.value = '';
            typing.classList.remove('hidden');
            messages.scrollTop = messages.scrollHeight;

            try {
                const res = await fetch('{{ route('chat.ask') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ message: text, history: history.slice(-10) }),
                });
                const data = await res.json();
                const reply = data.reply || "Sorry, something went wrong. Please try again or contact us directly.";
                typing.classList.add('hidden');
                addMessage('assistant', reply);
                history.push({ role: 'user', content: text });
                history.push({ role: 'assistant', content: reply });
            } catch (e) {
                typing.classList.add('hidden');
                addMessage('assistant', "I couldn't reach the server just now. Please try again, or use the Contact page.");
            } finally {
                sending = false;
            }
        }

        form?.addEventListener('submit', function (e) {
            e.preventDefault();
            sendMessage(input.value.trim());
        });

        document.querySelectorAll('.help-suggestion').forEach((btn) => {
            btn.addEventListener('click', () => sendMessage(btn.dataset.question));
        });
    })();
</script>
