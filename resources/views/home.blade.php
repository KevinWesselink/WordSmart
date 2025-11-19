<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordSmart - Leer slimmer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    @extends('layouts.app')

    @section('content')
    <!-- Hero --> <!-- Tekst aanpassen -->
    <section class="pt-28 pb-16 bg-gradient-to-r from-blue-600 to-blue-400 text-white text-center px-6">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Leer slimmer, niet harder 💡</h1>
            <p class="text-lg md:text-xl mb-6">Maak leren leuker met interactieve oefeningen, gamified progressie en persoonlijke woordenschatlijsten. Net als WRTS, maar met een frisse twist!</p>
            <a href="#" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">Begin nu gratis</a>
        </div>
    </section>

    <!-- Features --> <!-- Teksten aanpassen -->
    <section class="py-16 px-6 max-w-6xl mx-auto grid md:grid-cols-3 gap-8 text-center">
        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold mb-2">🎯 Gepersonaliseerd leren</h2>
            <p>Wij passen de moeilijkheid aan jouw niveau aan, zodat je sneller vooruitgang boekt.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold mb-2">🔥 Motivatie door gamification</h2>
            <p>Verdien punten, badges en hou streaks bij terwijl je leert!</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold mb-2">🌍 Altijd en overal</h2>
            <p>Beschikbaar op laptop, tablet en smartphone — studeer waar je maar wilt.</p>
        </div>
    </section>
    @endsection

</body>
</html>
