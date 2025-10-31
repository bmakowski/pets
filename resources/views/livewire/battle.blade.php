<div class="min-h-screen flex flex-col justify-center max-w-6xl mx-auto p-4 md:p-6">
    <!-- Battle Arena -->
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-6 md:gap-8">
        <!-- Dog Card -->
        <div class="group relative cursor-pointer select-none" wire:click="like({{ $dog->id }})">
            <div
                class="relative overflow-hidden rounded-2xl ring-2 ring-indigo-700/60 bg-gradient-to-b from-slate-900/60 to-slate-900/30 shadow-[0_0_25px_rgba(99,102,241,0.35)] transition transform duration-300 ease-out hover:scale-[1.03] hover:shadow-[0_0_45px_rgba(99,102,241,0.6)] hover:ring-indigo-400/80">
                <img src="{{ asset('images/pets/' . $dog->photo) }}" alt="{{ $dog->name }}"
                     class="w-full h-80 md:h-96 object-cover object-center opacity-95 group-hover:opacity-100 transition duration-300">

                <!-- Dark gradient overlay -->
                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                <!-- Neon radial highlights on hover -->
                <div
                    class="pointer-events-none absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300 bg-[radial-gradient(circle_at_30%_20%,rgba(99,102,241,0.25),transparent_40%),radial-gradient(circle_at_70%_80%,rgba(16,185,129,0.25),transparent_40%)]"></div>

                <!-- Subtle scanline/grid overlay -->
                <div
                    class="pointer-events-none absolute inset-0 opacity-15 group-hover:opacity-25 transition duration-300 bg-[linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] bg-[size:10px_10px]"></div>

                <!-- Name -->
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h1 class="text-center text-3xl md:text-4xl font-extrabold tracking-wider text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.7)]">{{ $dog->name }}</h1>
                </div>

                <!-- Vote badge -->
                <div class="absolute top-3 right-3">
                    <span
                        class="px-3 py-1 text-[10px] md:text-xs font-bold uppercase tracking-widest rounded-full bg-indigo-600/90 text-white shadow-md opacity-0 group-hover:opacity-100 transition">{{ __('Vote') }}</span>
                </div>
            </div>
        </div>

        <!-- VS -->
        <div class="relative flex items-center justify-center py-2">
            <div
                class="absolute -z-10 w-40 h-40 md:w-56 md:h-56 rounded-full blur-2xl opacity-70 bg-[conic-gradient(from_180deg_at_50%_50%,#6366f1_0deg,#22d3ee_120deg,#10b981_240deg,#6366f1_360deg)]"></div>
            <div
                class="text-white text-center text-5xl md:text-7xl font-black tracking-widest drop-shadow-[0_0_20px_rgba(59,130,246,0.8)]">{{ __('VS') }}</div>
        </div>

        <!-- Cat Card -->
        <div class="group relative cursor-pointer select-none" wire:click="like({{ $cat->id }})">
            <div
                class="relative overflow-hidden rounded-2xl ring-2 ring-pink-700/60 bg-gradient-to-b from-slate-900/60 to-slate-900/30 shadow-[0_0_25px_rgba(236,72,153,0.35)] transition transform duration-300 ease-out hover:scale-[1.03] hover:shadow-[0_0_45px_rgba(236,72,153,0.6)] hover:ring-pink-400/80">
                <img src="{{ asset('images/pets/' . $cat->photo) }}" alt="{{ $cat->name }}"
                     class="w-full h-80 md:h-96 object-cover object-center opacity-95 group-hover:opacity-100 transition duration-300">

                <!-- Dark gradient overlay -->
                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                <!-- Neon radial highlights on hover -->
                <div
                    class="pointer-events-none absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300 bg-[radial-gradient(circle_at_30%_20%,rgba(236,72,153,0.25),transparent_40%),radial-gradient(circle_at_70%_80%,rgba(14,165,233,0.25),transparent_40%)]"></div>

                <!-- Subtle scanline/grid overlay -->
                <div
                    class="pointer-events-none absolute inset-0 opacity-15 group-hover:opacity-25 transition duration-300 bg-[linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] bg-[size:10px_10px]"></div>

                <!-- Name -->
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h1 class="text-center text-3xl md:text-4xl font-extrabold tracking-wider text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.7)]">{{ $cat->name }}</h1>
                </div>

                <!-- Vote badge -->
                <div class="absolute top-3 right-3">
                    <span
                        class="px-3 py-1 text-[10px] md:text-xs font-bold uppercase tracking-widest rounded-full bg-pink-600/90 text-white shadow-md opacity-0 group-hover:opacity-100 transition">{{ __('Vote') }}</span>
                </div>
            </div>
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

    <!-- Actions -->
    <div class="mt-16 w-full flex items-center justify-center gap-8">
        <x-button wire:click="loadPets"
                  class="from-green-400 via-green-500 to-green-700 text-white border-4 border-green-800 shadow-[0_0_20px_rgba(16,185,129,0.6)] hover:shadow-[0_0_32px_rgba(16,185,129,0.8)] hover:-translate-y-0.5 transition">{{ __('Reload') }}</x-button>
        <x-link href="{{ route('rankings') }}"
                class="from-blue-400 via-blue-500 to-blue-700 text-blue-50 border-4 border-blue-800 shadow-[0_0_20px_rgba(59,130,246,0.6)] hover:shadow-[0_0_32px_rgba(59,130,246,0.8)] hover:-translate-y-0.5 transition">{{ __('Rankings') }}</x-link>
    </div>
</div>
