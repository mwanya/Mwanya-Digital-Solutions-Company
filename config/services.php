<?php

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Chat (Quick Help widget)
    |--------------------------------------------------------------------------
    | Optional. If ANTHROPIC_API_KEY is set in .env, the Quick Help widget
    | becomes a real AI assistant that can answer free-form questions about
    | the company using live site content (services, pricing, FAQs) as its
    | knowledge base. Without a key, the widget automatically falls back to
    | matching questions against the Quick Answers library in the admin
    | panel, so it still works out of the box with no configuration.
    */
    'anthropic' => [
        'key' => env('ANTHROPIC_API_KEY'),
        'model' => env('ANTHROPIC_MODEL', 'claude-3-5-haiku-20241022'),
    ],

];
