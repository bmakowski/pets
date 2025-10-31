@extends('layouts.app')

@section('content')
    <div class="space-y-8 min-h-screen flex flex-col justify-center">
        <div class="w-full flex items-center justify-center">
            <img class="w-1/3" src="{{ asset('images/logo-haloween.png') }}" alt="logo"/>
        </div>
        <div class="w-full flex items-center justify-center">
            <x-link href="{{ route('battle') }}"
                    class="from-yellow-300 via-yellow-400 to-yellow-600 text-yellow-900 border-4 border-yellow-600">
                {{ __('Start') }}
            </x-link>
        </div>
        <div class="w-full flex items-center justify-center">
            <x-link href="{{ route('rankings') }}"
                    class="from-blue-400 via-blue-500 to-blue-700 text-blue-50 border-4 border-blue-800">{{ __('Rankings') }}</x-link>
        </div>
    </div>

@endsection
