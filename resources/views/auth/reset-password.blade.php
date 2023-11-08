<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-inputs.email
                name="email"
                label="{{ __('Email') }}"
                :value="old('email')"
                required
                autofocus
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
