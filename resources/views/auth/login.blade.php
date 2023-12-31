@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-2xl mb-6 text-center">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="w-full px-3 py-2 border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center">
                            <input class="form-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 text-sm text-gray-700" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
