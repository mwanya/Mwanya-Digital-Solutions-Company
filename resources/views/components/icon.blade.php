@props(['name' => 'sparkles'])

@php
    $classes = $attributes->get('class', 'w-6 h-6');
@endphp

@switch($name)

    @case('sparkles')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 3l1.8 4.6L18 9l-4.2 1.4L12 15l-1.8-4.6L6 9l4.2-1.4L12 3z"/>
            <path d="M19 15l.9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15z"/>
            <path d="M5 14.5l.6 1.4L7 16.5l-1.4.6L5 18.5l-.6-1.4L3 16.5l1.4-.6L5 14.5z"/>
        </svg>
        @break

    @case('home')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M3 11.5L12 4l9 7.5"/>
            <path d="M5.5 10v9a1 1 0 0 0 1 1H10v-6h4v6h3.5a1 1 0 0 0 1-1v-9"/>
        </svg>
        @break

    @case('factory')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 21V10l5 3.5V10l5 3.5V7l6 4v10H4z"/>
            <path d="M8 21v-4M13 21v-4M18 21v-4"/>
        </svg>
        @break

    @case('water-drop')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 3s7 7.6 7 12a7 7 0 0 1-14 0c0-4.4 7-12 7-12z"/>
            <path d="M9.5 15.5a2.5 2.5 0 0 0 2.5 2.5"/>
        </svg>
        @break

    @case('archive-box')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <rect x="3" y="6" width="18" height="4" rx="1"/>
            <path d="M5 10v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-8"/>
            <path d="M10 14h4"/>
        </svg>
        @break

    @case('wrench')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.6 2.6-2.8-2.8 2.6-2.6z"/>
        </svg>
        @break

    @case('car')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M3 13l1.6-4.8A2 2 0 0 1 6.5 7h11a2 2 0 0 1 1.9 1.2L21 13"/>
            <rect x="3" y="13" width="18" height="5" rx="1.5"/>
            <circle cx="7.5" cy="18.5" r="1.4"/>
            <circle cx="16.5" cy="18.5" r="1.4"/>
        </svg>
        @break

    @case('leaf')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M5 19c8 1 13-4 14-14-10-1-14 5-14 14z"/>
            <path d="M5 19c3-4 6-7 9-10"/>
        </svg>
        @break

    @case('bug')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <ellipse cx="12" cy="13" rx="4" ry="6"/>
            <path d="M12 7V4M9.5 9 6.5 6.5M14.5 9l3-2.5M8 13H4M20 13h-4M9 18l-2.5 2.5M15 18l2.5 2.5"/>
        </svg>
        @break

    @case('spray')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M9 2.5h3M9 5h3"/>
            <path d="M8 5h4v2.2l1 1V20a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8.2l1-1V5z"/>
            <path d="M16 8.5l2-1.2M17 12h2.2M16 15.5l2 1.2"/>
        </svg>
        @break

    @case('check-circle')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="9"/>
            <path d="M8 12.5l2.5 2.5L16 9"/>
        </svg>
        @break

    @case('star')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 3l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6L3.3 9.2l6.1-.6L12 3z"/>
        </svg>
        @break

    @case('phone')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M5 4h3l2 5-2.4 1.4a11.5 11.5 0 0 0 5 5L14 13l5 2v3a2 2 0 0 1-2 2A15 15 0 0 1 3 6a2 2 0 0 1 2-2z"/>
        </svg>
        @break

    @case('mail')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M3 7l9 6 9-6"/>
        </svg>
        @break

    @case('map-pin')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 21s7-7.5 7-12a7 7 0 1 0-14 0c0 4.5 7 12 7 12z"/>
            <circle cx="12" cy="9" r="2.5"/>
        </svg>
        @break

    @case('facebook')
        <svg viewBox="0 0 24 24" fill="currentColor" class="{{ $classes }}">
            <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.9h2.54V9.84c0-2.5 1.49-3.89 3.77-3.89 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.9h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/>
        </svg>
        @break

    @case('instagram')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <rect x="3" y="3" width="18" height="18" rx="5"/>
            <circle cx="12" cy="12" r="4"/>
            <circle cx="17.3" cy="6.7" r="1" fill="currentColor" stroke="none"/>
        </svg>
        @break

    @case('menu')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        @break

    @case('close')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M6 6l12 12M18 6L6 18"/>
        </svg>
        @break

    @case('arrow-right')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M5 12h14M13 6l6 6-6 6"/>
        </svg>
        @break

    @case('chart-bar')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 20V10M10 20V4M16 20v-7M3 20h18"/>
        </svg>
        @break

    @case('photo')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <rect x="3" y="4" width="18" height="16" rx="2"/>
            <circle cx="8.5" cy="9.5" r="1.5"/>
            <path d="M21 16l-5.5-5.5a1.5 1.5 0 0 0-2.1 0L5 19"/>
        </svg>
        @break

    @case('trash')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 7h16M9 7V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2M6 7l1 13a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1l1-13"/>
        </svg>
        @break

    @case('pencil')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 20l1-4 11-11 3 3-11 11-4 1z"/>
            <path d="M13.5 6.5l3 3"/>
        </svg>
        @break

    @case('plus')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 5v14M5 12h14"/>
        </svg>
        @break

    @case('logout')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <path d="M16 17l5-5-5-5M21 12H9"/>
        </svg>
        @break

    @case('shield-check')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3z"/>
            <path d="M9 12l2 2 4-4"/>
        </svg>
        @break

    @case('globe')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="9"/>
            <path d="M3 12h18M12 3c2.6 2.6 2.6 15.4 0 18M12 3c-2.6 2.6-2.6 15.4 0 18"/>
        </svg>
        @break

    @case('target')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="8"/>
            <circle cx="12" cy="12" r="4"/>
            <circle cx="12" cy="12" r="0.8" fill="currentColor" stroke="none"/>
        </svg>
        @break

    @case('upload')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12 16V4M7 9l5-5 5 5"/>
            <path d="M4 16v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3"/>
        </svg>
        @break

    @case('chat')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M4 5h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H9l-4.5 4v-4H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z"/>
            <path d="M8 10h8M8 13h5"/>
        </svg>
        @break

    @case('search')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="11" cy="11" r="7"/>
            <path d="M21 21l-4.3-4.3"/>
        </svg>
        @break

    @case('user-circle')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="9"/>
            <circle cx="12" cy="10" r="3"/>
            <path d="M6.5 19c1-2.5 3-4 5.5-4s4.5 1.5 5.5 4"/>
        </svg>
        @break

    @case('map')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M9 4l-6 2.5v13.5l6-2.5 6 2.5 6-2.5V3.5L15 6"/>
            <path d="M9 4v14.5M15 6v14.5"/>
        </svg>
        @break

    @case('key')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="8" cy="15" r="4"/>
            <path d="M11 12l8-8M16 7l2 2M19 4l2 2"/>
        </svg>
        @break

    @case('cog')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="3.2"/>
            <path d="M19.4 13.5a1.9 1.9 0 0 0 .4 2.1l.1.1a2.3 2.3 0 1 1-3.3 3.3l-.1-.1a1.9 1.9 0 0 0-2.1-.4 1.9 1.9 0 0 0-1.2 1.8v.2a2.3 2.3 0 1 1-4.6 0v-.1a1.9 1.9 0 0 0-1.3-1.8 1.9 1.9 0 0 0-2.1.4l-.1.1a2.3 2.3 0 1 1-3.3-3.3l.1-.1a1.9 1.9 0 0 0 .4-2.1 1.9 1.9 0 0 0-1.8-1.2h-.2a2.3 2.3 0 1 1 0-4.6h.1a1.9 1.9 0 0 0 1.8-1.3 1.9 1.9 0 0 0-.4-2.1l-.1-.1a2.3 2.3 0 1 1 3.3-3.3l.1.1a1.9 1.9 0 0 0 2.1.4h0a1.9 1.9 0 0 0 1.2-1.8v-.2a2.3 2.3 0 1 1 4.6 0v.1a1.9 1.9 0 0 0 1.2 1.8h0a1.9 1.9 0 0 0 2.1-.4l.1-.1a2.3 2.3 0 1 1 3.3 3.3l-.1.1a1.9 1.9 0 0 0-.4 2.1v0a1.9 1.9 0 0 0 1.8 1.2h.2a2.3 2.3 0 1 1 0 4.6h-.1a1.9 1.9 0 0 0-1.8 1.2z"/>
        </svg>
        @break

    @case('tag')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M12.6 3H5a2 2 0 0 0-2 2v7.6c0 .5.2 1 .6 1.4l8.4 8.4a2 2 0 0 0 2.8 0l6.4-6.4a2 2 0 0 0 0-2.8L12.6 3z"/>
            <circle cx="8" cy="8" r="1.5" fill="currentColor" stroke="none"/>
        </svg>
        @break

    @case('clock')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 7v5l3 3"/>
        </svg>
        @break

    @case('users')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="9" cy="8" r="3"/>
            <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/>
            <circle cx="17" cy="9" r="2.3"/>
            <path d="M15.5 14.2c2.6.5 4.5 2.8 4.5 5.8"/>
        </svg>
        @break

    @case('envelope-open')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M3 8.5l9 6 9-6"/>
            <rect x="3" y="6" width="18" height="13" rx="2"/>
        </svg>
        @break

    @case('eye')
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        @break

    @default
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="{{ $classes }}">
            <circle cx="12" cy="12" r="9"/>
        </svg>

@endswitch
