<x-guest-layout>
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="reg_name" :value="__('Name')">Name</label>
            <input id="reg_name" class="block mt-1 w-full rounded-lg" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name">
        </div>
        <div class="mb-2 error text-sm" id="NameError"></div>


        <!-- Email Address -->
        <div class="mt-4">
            <label for="reg_email" :value="__('Email')">Email</label>
            <input id="reg_email" class="block mt-1 w-full rounded-lg" type="email" name="email"
                :value="old('email')" autofocus autocomplete="username">
        </div>
        <div class="mb-2 error text-sm" id="EmailError"></div>


        <!-- Password -->
        <div class="mt-4">
            <label for="reg_password" :value="__('Password')">Password</label>
            <input id="reg_password" class="block mt-1 w-full rounded-lg" type="password" name="password" required
                autocomplete="new-password">
        </div>
        <div class="mb-2 error text-sm" id="PasswordError"></div>


        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="reg_password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
            <input id="reg_password_confirmation" class="block mt-1 w-full rounded-lg" type="password"
                name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="mb-2 error text-sm" id="PasswordConfirmationError"></div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
