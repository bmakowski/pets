@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center max-w-6xl mx-auto p-4 md:p-6">
        <!-- Title -->
        <div class="relative mb-8 text-center">
            <div class="absolute -z-10 inset-0 flex items-center justify-center">
                <div
                    class="w-56 h-56 md:w-72 md:h-72 rounded-full blur-3xl opacity-60 bg-[conic-gradient(from_180deg_at_50%_50%,#22d3ee_0deg,#6366f1_120deg,#10b981_240deg,#22d3ee_360deg)]"></div>
            </div>
            <h1 class="text-4xl md:text-6xl font-black tracking-wider bg-gradient-to-r from-sky-300 via-indigo-300 to-emerald-300 bg-clip-text text-transparent drop-shadow-[0_0_20px_rgba(99,102,241,0.5)]">
                {{ __('Rankings') }}
            </h1>
            <p class="mt-2 text-slate-300/80">{{ __('Top pets by likes') }}</p>
        </div>

        <!-- Table Wrapper -->
        <div
            class="relative overflow-hidden rounded-2xl ring-2 ring-indigo-700/60 bg-gradient-to-b from-slate-900/60 to-slate-900/30 shadow-[0_0_25px_rgba(99,102,241,0.35)]">
            <!-- subtle grid/scanlines overlay -->
            <div
                class="pointer-events-none absolute inset-0 opacity-15 bg-[linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] bg-[size:12px_12px]"></div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                    <tr class="bg-gradient-to-r from-indigo-700/60 via-sky-700/50 to-emerald-700/60 text-indigo-50">
                        <th class="px-4 md:px-6 py-4 text-xs md:text-sm font-bold uppercase tracking-widest">#</th>
                        <th class="px-4 md:px-6 py-4 text-xs md:text-sm font-bold uppercase tracking-widest">{{ __('Name') }}</th>
                        <th class="px-4 md:px-6 py-4 text-xs md:text-sm font-bold uppercase tracking-widest text-right">{{ __('Likes') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($pets as $i => $pet)
                        @php
                            $pos = $i + 1;
                            $badge = $pos === 1 ? '🥇' : ($pos === 2 ? '🥈' : ($pos === 3 ? '🥉' : null));
                        @endphp
                        <tr class="group relative border-t border-white/5 hover:bg-white/5 transition">
                            <!-- glow on hover -->
                            <td class="px-4 md:px-6 py-4 font-extrabold text-slate-200 whitespace-nowrap">
                            <span class="inline-flex items-center gap-2">
                                <span class="text-sm md:text-base tabular-nums">{{ $pos }}</span>
                                @if($badge)
                                    <span
                                        class="text-base md:text-lg drop-shadow-[0_0_8px_rgba(255,255,255,0.35)]">{{ $badge }}</span>
                                @endif
                            </span>
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <div class="flex items-center gap-3 text-white/90">
                                    <span class="font-semibold tracking-wide">{{ $pet->name }}</span>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4 text-right">
                            <span class="inline-flex items-center justify-end gap-2 font-bold text-sky-200">
                                <span class="tabular-nums">{{ $pet->numberOfLikes }}</span>
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-emerald-400/80 group-hover:bg-emerald-300/90 transition"></span>
                            </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 md:px-6 py-10 text-center text-slate-300">
                                {{ __('No pets yet — come back after some battles!') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-10 w-full flex items-center justify-center gap-4">
            <x-link href="{{ route('home') }}"
                    class="from-slate-700 via-slate-800 to-slate-900 text-slate-100 border-4 border-slate-800 shadow-[0_0_16px_rgba(148,163,184,0.35)] hover:shadow-[0_0_28px_rgba(148,163,184,0.55)] hover:-translate-y-0.5 transition">{{ __('Home') }}</x-link>
            <x-link href="{{ route('battle') }}"
                    class="from-pink-500 via-fuchsia-600 to-indigo-700 text-white border-4 border-fuchsia-800 shadow-[0_0_20px_rgba(217,70,239,0.6)] hover:shadow-[0_0_32px_rgba(217,70,239,0.85)] hover:-translate-y-0.5 transition">{{ __('Back to Battle') }}</x-link>
        </div>
    </div>
@endsection
