@section('title', 'Login')
<x-guest-layout>
    <div class="max-w-md mx-auto mt-5 p-8  rounded-2xl shadow-xl border border-blue-600">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            🔐 Login Pengguna
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <x-input-label for="username" :value="'Username'" />
                <x-text-input id="username" 
                    class="block w-full mt-1 rounded-xl border border-gray-300 shadow-inner focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition duration-300"
                    type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <x-input-label for="password" :value="'Password'" />
                <x-text-input id="password" 
                    class="block w-full mt-1 rounded-xl border border-gray-300 shadow-inner focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition duration-300"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-400"
                    name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">
                    Ingat saya
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-center">
                <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
