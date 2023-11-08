<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-inputs.text
                name="name"
                label="{{ __('Name') }}"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-inputs.email
                name="email"
                label="{{ __('Email') }}"
                :value="old('email')"
                required
                autocomplete="username"
            />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-inputs.password
                name="password"
                label="{{ __('Password') }}"
                required
                autocomplete="new-password"
            />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-inputs.password
                name="password_confirmation"
                label="{{ __('Confirm Password') }}"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
