@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<x-auth-card>
    <p class="text-red-500 text-sm text-center font-bold pb-2">
        {{ $errors->first('failed') }}
    </p>
    <form class="w-full max-w-sm" method="POST" action="{{ route('login.authenticate') }}">
        @csrf
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                    Email
                </label>
            </div>
            <div class="md:w-2/3">
                <x-input name="email" type="email" placeholder="Email" :error="$errors->has('email')" value="{{ Request::old('email') }}" required></x-input>
                <p class="text-red-500 text-xs italic">
                    @if ($errors->first('email') != true) {{ $errors->first('email') }} @endif
                </p>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                    Password
                </label>
            </div>
            <div class="md:w-2/3">
                <x-input name="password" type="password" placeholder="******************" :error="$errors->has('password')" required></x-input>
                <p class="text-red-500 text-xs italic">
                    @if ($errors->first('password') != true) {{ $errors->first('password') }} @endif
                </p>
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <x-button type="submit">
                    Login
                </x-button>
                <a href="{{ route('register') }}" class="pl-4 text-blue-600 font-bold hover:text-blue-400">
                    Register
                </a>
            </div>
        </div>
    </form>
</x-auth-card>
@endsection