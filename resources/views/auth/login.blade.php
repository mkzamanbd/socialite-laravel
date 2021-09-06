<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a href="{{ route('login.google') }}" class="py-2 flex items-center justify-center mb-4 text-white rounded shadow bg-gray-100">
            <div class="px-4 py-1">
                <img class="h-6 w-6" src="{{ asset('images/google.svg') }}" alt="">
            </div>
            <h1 class="px-4 py-1 w-5/6 text-center text-gray-600 font-bold">Sign in with Google</h1>
        </a>

        <a href="{{ route('login.facebook') }}" class="py-2 flex items-center justify-center mb-4 text-white rounded shadow bg-gray-100">
            <div class="px-4 py-1">
                <img class="h-6 w-6" src="{{ asset('images/facebook.svg') }}" alt="">
            </div>
            <h1 class="px-4 py-1 w-5/6 text-center text-gray-600 font-bold">Sign in with Facebook</h1>
        </a>

        <a href="{{ route('login.github') }}" class="py-2 flex items-center justify-center mb-4 text-white rounded shadow bg-gray-100">
            <div class="px-4 py-1">
                <img class="h-6 w-6" src="{{ asset('images/github.svg') }}" alt="">
            </div>
            <h1 class="px-4 py-1 w-5/6 text-center text-gray-600 font-bold">Sign in with Github</h1>
        </a>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
