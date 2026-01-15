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

                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Voornaam</span>
                                <span class="text-gray-900">{{ $user->first_name }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Tussenvoegsel</span>
                                <span class="text-gray-900">{{ $user->infix ?: '-' }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Achternaam</span>
                                <span class="text-gray-900">{{ $user->last_name }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">E-mail</span>
                                <span class="text-gray-900">{{ $user->email }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Geboortedatum</span>
                                <span class="text-gray-900">{{ $user->date_of_birth->format('d-m-Y') }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Land</span>
                                <span class="text-gray-900">{{ $user->country }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Adres</span>
                                <span class="text-gray-900">{{ $user->address }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Postcode</span>
                                <span class="text-gray-900">{{ $user->postal_code }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Woonplaats</span>
                                <span class="text-gray-900">{{ $user->city }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Telefoonnummer</span>
                                <span class="text-gray-900">{{ $user->phone_number }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span class="font-medium text-gray-600">Account Aangemaakt Op</span>
                                <span class="text-gray-900">{{ $user->created_at->format('d-m-Y H:i:s') }}</span>
                            </div>
                        </div>

                        <div class="mt-10 flex gap-4 text-center">
                            <a href="{{ route('profile.edit') }}"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 transition">
                                Profiel Bewerken
                            </a>

                            <button
                                type="button"
                                onclick="openDeleteModal()"
                                class="w-full bg-red-600 text-white font-semibold py-3 rounded-md hover:bg-red-700 transition cursor-pointer">
                                Account Verwijderen
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Rightside: Info -->
                <div class="w-full md:w-2/5 mt-10 md:mt-0">
                    <div class="bg-white shadow-lg rounded-2xl p-8 sticky top-10">

                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                            Over je account
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Op deze pagina kun je jouw persoonlijke informatie bekijken en verwijderen.
                        </p>

                        <p class="text-gray-600 leading-relaxed mt-4">
                            Zorg ervoor dat je gegevens altijd up-to-date zijn. Je kunt je wachtwoord wijzigen, jouw profiel aanpassen of zelfs je account verwijderen.
                        </p>

                        <div class="mt-6 bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-md">
                            <p>
                                Tip: Gebruik een sterk wachtwoord, deel dit niet met anderen, en zorg ervoor dat je e-mailadres actueel is voor accountbeveiliging en communicatie.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Confirm Profile Deletion Modal -->
                <div id="deleteModal"
                    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">

                    <div class="relative w-full max-w-lg bg-white shadow-lg rounded-2xl p-8">
                        <button
                            type="button"
                            onclick="closeDeleteModal()"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition cursor-pointer"
                            aria-label="Sluiten">
                            ✕
                        </button>

                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                            Verwijder je account
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Weet je zeker dat je je account wilt verwijderen?
                        </p>

                        <div class="mt-10 flex gap-4">
                            <button
                                type="button"
                                onclick="closeDeleteModal()"
                                class="w-full bg-gray-200 text-gray-800 font-semibold py-3 rounded-md hover:bg-gray-300 transition cursor-pointer">
                                Annuleren
                            </button>

                            <form action="{{ route('profile.delete') }}" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full bg-red-600 text-white font-semibold py-3 rounded-md hover:bg-red-700 transition cursor-pointer">
                                    Account verwijderen
                                </button>
                            </form>
                        </div>

                        <div class="mt-6 bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-md">
                            <p>
                                Het verwijderen van je account is permanent en kan niet ongedaan worden gemaakt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

</body>

<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>