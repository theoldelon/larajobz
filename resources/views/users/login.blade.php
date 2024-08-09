@section('title', 'Sign in | ' . config('app.name'))

<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-white">
        <div class="w-full max-w-xl bg-blue-100 p-8 rounded-lg shadow-xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Sign in</h2>
            <form action="/users/authenticate" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password') }}">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Sign in
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center mb-24">
                <p>Don't have an account? <a href="/register" class="text-blue-500 hover:text-blue-700">Sign up</a></p>
            </div>
        </div>
    </div>
</x-layout>
