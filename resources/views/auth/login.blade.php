<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="log_email" :value="__('Email')">Email</label>
            <input id="log_email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email')"
                autofocus autocomplete="username">

            {{-- <x-input-label for="log_email" :value="__('Email')" />
            <x-text-input id="log_email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" /> --}}
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" /> --}}
        </div>
        <div class="mb-2 error text-sm" id="EmailError"></div>

        <!-- Password -->
        <div class="mt-4">
            <label for="log_password" :value="__('Password')">Password</label>
            <input id="log_password" class="block mt-1 w-full rounded-md" type="password" name="password"
                autocomplete="current-password">
            {{-- <x-input-label for="log_password" :value="__('Password')" />

            <x-text-input id="log_password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" /> --}}

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>
        <div class="mb-2 text-red-500 error text-sm" id="PasswordError"></div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <a href="{{ route('register') }}"
                class="ml-3 mr-3 rounded-md px-4 py-2 bg-secondary text-white text-sm">REGISTER</a>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-secondary hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 bg-secondary text-primary">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
