<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Restaurant Name -->
        <div>
            <x-input-label for="restaurant_name" :value="'restaurant_name'" />
            <x-text-input id="restaurant_name" class="block mt-1 w-full" type="text" restaurant_name="restaurant_name" :value="old('restaurant_name')" required autofocus autocomplete="restaurant_name" />
            <x-input-error :messages="$errors->get('restaurant_name')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="'description'" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" description="description" :value="old('description')" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- City -->
        <div>
            <x-input-label for="city" :value="'city'" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" city="city" :value="old('city')" required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="address" :value="'address'" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" address="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Vat -->
        <div>
            <x-input-label for="vat" :value="'vat'" />
            <x-text-input id="vat" class="block mt-1 w-full" type="text" vat="vat" :value="old('vat')" required autofocus autocomplete="vat" />
            <x-input-error :messages="$errors->get('vat')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
