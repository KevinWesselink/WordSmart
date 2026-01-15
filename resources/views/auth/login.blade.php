<body class="bg-gray-50 text-gray-800 font-sans">

    @extends('layouts.app')

    @section('content')

        <div class="md:flex min-h-screen">

            <!-- Leftside: Promo / image -->
            <div class="md:w-2/5 flex flex-col justify-center items-center border-r border-gray-200 p-4 bg-white">
                <h1 class="text-3xl font-bold mb-2 text-blue-700">Welkom bij WordSmart</h1>
                <p class="text-center text-gray-600 max-w-xs mb-4">
                    Ontdek de voordelen van WordSmart — registreer vandaag nog en ervaar het zelf!
                </p>
                <img src="https://placehold.co/400x400" alt="Promotie afbeelding" class="rounded-lg shadow-md mb-6">
            </div>

            <!-- Rightside: Registration form -->
            <div class="md:w-3/5 flex justify-center items-center p-10">
                <form action="{{ route('login.authenticate') }}" method="POST" class="bg-white shadow-md rounded-xl p-8 w-full max-w-lg">
                    @csrf
                    <h2 class="text-2xl font-semibold text-center mb-6 text-gray-900">Login bij WordSmart</h2>

                    <div class="grid gap-4">
                        <!-- E-mail -->
                        <div class="col-span-1">
                            <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('email') border-red-600 @enderror">

                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-span-1">
                            <label for="password" class="block text-sm font-medium mb-1">Wachtwoord</label>
                            <input id="password" name="password" type="password" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('password') border-red-600 @enderror">

                            @error('password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 hover:cursor-pointer transition">
                            Login
                        </button>
                    </div>

                    <div class="mt-4">
                        <p class="text-center text-sm text-gray-600">
                            Heb je nog geen account?
                            <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">Registreer hier</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    @endsection

</body>