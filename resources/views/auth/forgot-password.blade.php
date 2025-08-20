<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            Reset Password
        </h2>
        <p class="text-gray-600">
            Enter your email address and we'll send you a password reset link
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="space-y-4">
            <x-primary-button class="w-full">
                {{ __('Send Reset Link') }}
            </x-primary-button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-purple-600 font-medium transition-colors">
                    Back to login
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
