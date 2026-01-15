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
            class="fixed left-1/2 transform -translate-x-1/2 top-[90px] z-[9999]"
        >
            <div class="
                max-w-lg w-full mx-auto
                px-6 py-4 rounded-lg shadow-xl border
                flex items-start justify-between gap-4
                
                @if($key === 'success') bg-green-50 border-green-200 text-green-800 @endif
                @if($key === 'error') bg-red-50 border-red-200 text-red-800 @endif
                @if($key === 'warning') bg-yellow-50 border-yellow-200 text-yellow-800 @endif
                @if($key === 'info') bg-blue-50 border-blue-200 text-blue-800 @endif
            ">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                    </svg>

                    <p class="text-sm leading-5">
                        {{ session($key) }}
                    </p>
                </div>

                <button
                    @click="show = false"
                    class="text-xl leading-none font-bold opacity-50 hover:opacity-100 hover:cursor-pointer"
                >
                    &times;
                </button>
            </div>
        </div>

        @break
    @endif
@endforeach
