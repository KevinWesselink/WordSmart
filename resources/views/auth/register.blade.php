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
                <form action="{{ route('register.store') }}" method="POST" class="bg-white shadow-md rounded-xl p-8 w-full max-w-lg">
                    @csrf
                    <h2 class="text-2xl font-semibold text-center mb-6 text-gray-900">Maak een account aan</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div class="col-span-1">
                            <label for="first_name" class="block text-sm font-medium mb-1">Voornaam</label>
                            <input id="first_name" name="first_name" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('first_name') border-red-600 @enderror">

                            @error('first_name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Infix -->
                        <div class="col-span-1">
                            <label for="infix" class="block text-sm font-medium mb-1">Tussenvoegsel</label>
                            <input id="infix" name="infix" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('infix') border-red-600 @enderror">

                            @error('infix')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="col-span-2">
                            <label for="last_name" class="block text-sm font-medium mb-1">Achternaam</label>
                            <input id="last_name" name="last_name" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('last_name') border-red-600 @enderror">

                            @error('last_name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="date_of_birth" class="block text-sm font-medium mb-1">Geboortedatum</label>
                            <input id="date_of_birth" name="date_of_birth" type="date" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('date_of_birth') border-red-600 @enderror">

                            @error('date_of_birth')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Country -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="country" class="block text-sm font-medium mb-1">Land</label>
                            <input id="country" name="country" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('country') border-red-600 @enderror">

                            @error('country')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-span-2">
                            <label for="address" class="block text-sm font-medium mb-1">Adres</label>
                            <input id="address" name="address" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('address') border-red-600 @enderror">

                            @error('address')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Postal Code -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="postal_code" class="block text-sm font-medium mb-1">Postcode</label>
                            <input id="postal_code" name="postal_code" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('postal_code') border-red-600 @enderror">

                            @error('postal_code')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="city" class="block text-sm font-medium mb-1">Woonplaats</label>
                            <input id="city" name="city" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('city') border-red-600 @enderror">

                            @error('city')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="phone_number" class="block text-sm font-medium mb-1">Telefoonnummer</label>
                            <input id="phone_number" name="phone_number" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('phone_number') border-red-600 @enderror">

                            @error('phone_number')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                            <input id="email" name="email" type="email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('email') border-red-600 @enderror">

                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="password" class="block text-sm font-medium mb-1">Wachtwoord</label>
                            <input id="password" name="password" type="password" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('password') border-red-600 @enderror">

                            @error('password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="password_confirmation" class="block text-sm font-medium mb-1">Herhaal wachtwoord</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:px-2 @error('password_confirmation') border-red-600 @enderror">

                            @error('password_confirmation')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 hover:cursor-pointer transition">
                            Registreer
                        </button>
                    </div>

                    <div class="mt-4">
                        <p class="text-center text-sm text-gray-600">
                            Heb je al een account?
                            <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Log hier in</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    @endsection

</body>