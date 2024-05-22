<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <!-- Tailwind CSS Error Alert -->
    <div class="max-w-lg mx-auto">

        <div class="bg-gray-100 border-b border-gray-300 w-full mb-5">
            <h2 class="text-left py-4 mx-5">Login</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Existing login form -->
            <div class="flex items-center space-x-2 pb-3">
                <x-input-label for="username" :value="__('Username')" class="w-1/4" />

                <x-text-input id="username" class="block mt-1 w-3/4" type="text" name="username"
                    :value="old('username')" required autofocus />

                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="flex items-center space-x-2">
                <x-input-label for="password" :value="__('Password')" class="w-1/4" />

                <x-text-input id="password" class="block mt-1 w-3/4" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 ml-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ms-3 mr-4">
                    {{ __('Log in') }}
                </x-primary-button>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

            </div>
        </form>
    </div>
</x-guest-layout>