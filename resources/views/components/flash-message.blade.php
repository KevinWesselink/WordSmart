@props(['type' => 'success'])

@php
    $map = [
        'success' => 'green',
        'error'   => 'red',
        'warning' => 'yellow',
        'info'    => 'blue',
    ];
    $color = $map[$type] ?? 'blue';
@endphp

@foreach (['success', 'error', 'warning', 'info'] as $key)
    @if (session()->has($key))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition
            class="mx-auto max-w-4xl px-4 py-3 rounded-md border shadow-sm flex items-start justify-between mb-4
                   bg-{{ $map[$key] ?? 'blue' }}-50 border-{{ $map[$key] ?? 'blue' }}-200 text-{{ $map[$key] ?? 'blue' }}-800"
            role="alert"
        >
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                </svg>

                <div class="text-sm">
                    {{ session($key) }}
                </div>
            </div>

            <button
                type="button"
                @click="show = false"
                class="ml-4 text-sm font-medium opacity-70 hover:opacity-100"
                aria-label="Sluit melding"
            >
                &times;
            </button>
        </div>
        @break
    @endif
@endforeach