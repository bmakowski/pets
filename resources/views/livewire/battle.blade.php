<div>
    <div class="justify-center items-center p-4 grid grid-cols-3">
        <div class="space-y-4 cursor-pointer" wire:click="like({{ $dog->id }})">
            <img src="{{ asset('images/pets/' . $dog->photo) }}" alt="{{ $dog->name }}" class="w-full h-auto">
            <h1 class="text-2xl text-white text-center font-bold">{{ $dog->name }}</h1>
        </div>
        <div class="text-white text-center p-4 text-8xl">{{ __('VS') }}</div>
        <div class="space-y-4 cursor-pointer" wire:click="like({{ $cat->id }})">
            <img src="{{ asset('images/pets/' . $cat->photo) }}" alt="{{ $cat->name }}" class="w-full h-auto">
            <h1 class="text-2xl text-white text-center  font-bold">{{ $cat->name }}</h1>
        </div>
    </div>

    @if($thankYou)
        <div class="my-8 text-center">
            <h2 class="text-6xl font-black uppercase tracking-wider bg-gradient-to-r from-green-400 via-emerald-500 to-teal-400 bg-clip-text text-transparent animate-pulse drop-shadow-[0_0_15px_rgba(52,211,153,0.5)]">
                {{ __('Thanks for Vote!') }}
            </h2>
            <div class="mt-4 flex justify-center gap-2">
                <span class="inline-block w-3 h-3 bg-green-400 rounded-full animate-bounce"
                      style="animation-delay: 0s;"></span>
                <span class="inline-block w-3 h-3 bg-emerald-400 rounded-full animate-bounce"
                      style="animation-delay: 0.1s;"></span>
                <span class="inline-block w-3 h-3 bg-teal-400 rounded-full animate-bounce"
                      style="animation-delay: 0.2s;"></span>
            </div>
        </div>
    @endif

    <div class="w-full flex items-center justify-center gap-4">
        <x-button wire:click="loadPets"
                  class="from-green-400 via-green-500 to-green-700 text-white border-4 border-green-800">{{ __('Reload') }}</x-button>
        <x-link href="{{ route('rankings') }}"
                class="from-blue-400 via-blue-500 to-blue-700 text-blue-50 border-4 border-blue-800">{{ __('Rankings') }}</x-link>
    </div>
</div>
