<body class="bg-gray-50 text-gray-800 font-sans">

    @extends('layouts.app')

    @section('content')

        <div class="min-h-screen bg-gray-100 py-10 px-4">
            <div class="max-w-7xl mx-auto md:flex gap-10">

                <!-- Leftside: Profile -->
                <div class="w-full md:w-3/5">
                    <div class="bg-white shadow-lg rounded-2xl p-10">

                        <!-- Header -->
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-20 h-20 rounded-full bg-blue-200 flex items-center justify-center text-3xl text-blue-700 font-semibold">
                                {{ strtoupper(substr($user->first_name, 0, 1)) }} {{ strtoupper(substr($user->last_name, 0, 1)) }}
                            </div>

                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">
                                    {{ $user->first_name }} {{ $user->infix }} {{ $user->last_name }}
                                </h2>
                                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                            </div>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Persoonlijke Gegevens</h3>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="space-y-4">
                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="first_name" class="font-medium text-gray-600">Voornaam</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="infix" class="font-medium text-gray-600">Tussenvoegsel</label>
                                    <input type="text" id="infix" name="infix" value="{{ $user->infix }}" @if ($user->infix === null)
                                        @disabled(true) class="hover:cursor-not-allowed text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1"
                                    @endif class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="last_name" class="font-medium text-gray-600">Achternaam</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="email" class="font-medium text-gray-600">E-mail</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="date_of_birth" class="font-medium text-gray-600">Geboortedatum</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth->format('Y-m-d') }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="country" class="font-medium text-gray-600">Land</label>
                                    <input type="text" id="country" name="country" value="{{ $user->country }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="address" class="font-medium text-gray-600">Adres</label>
                                    <input type="text" id="address" name="address" value="{{ $user->address }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="postal_code" class="font-medium text-gray-600">Postcode</label>
                                    <input type="text" id="postal_code" name="postal_code" value="{{ $user->postal_code }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="city" class="font-medium text-gray-600">Woonplaats</label>
                                    <input type="text" id="city" name="city" value="{{ $user->city }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <label for="phone_number" class="font-medium text-gray-600">Telefoonnummer</label>
                                    <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" class="text-gray-900 w-2/3 border border-gray-300 rounded-md px-3 py-1">
                                </div>

                                <div class="flex justify-between border-b border-gray-200 py-2">
                                    <span class="font-medium text-gray-600">Account Aangemaakt Op</span>
                                    <span class="text-gray-900">{{ $user->created_at->format('d-m-Y H:i:s') }}</span>
                                </div>
                            </div>

                            <div class="mt-10 flex gap-4">
                                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 hover:cursor-pointer transition text-center">
                                    Profiel Opslaan
                                </button>
                            </div>    
                        </form>
                    </div>
                </div>

                <!-- Rightside: Info -->
                <div class="w-full md:w-2/5 mt-10 md:mt-0">
                    <div class="bg-white shadow-lg rounded-2xl p-8 sticky top-10">

                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                            Pas je profiel aan
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Op deze pagina kun je jouw persoonlijke informatie bewerken.
                        </p>

                        <p class="text-gray-600 leading-relaxed mt-4">
                            Zorg ervoor dat je gegevens altijd up-to-date zijn.
                        </p>

                        <div class="mt-6 bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-md">
                            <p>
                                Tip: Gebruik een sterk wachtwoord, deel dit niet met anderen, en zorg ervoor dat je e-mailadres actueel is voor accountbeveiliging en communicatie.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endsection

</body>