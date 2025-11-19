    <!-- Navbar -->
    <header class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/">
                <h1 class="text-2xl font-bold text-blue-600">WordSmart</h1>
            </a>
            @auth
                <nav class="hidden md:block">
                    <span class="text-gray-700">Welkom, {{ auth()->user()->first_name }}!</span>
                </nav>
                <nav class="hidden md:flex space-x-6 items-center">
                    <a href="#" class="hover:text-blue-600 transition">Profiel</a>
                    <a href="#" class="hover:text-blue-600 transition">Mijn lijsten</a>
                </nav>
            @endauth
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <a href="#" class="hover:text-blue-600 transition">Over ons</a> <!-- Aanpassen -->
                <a href="#contact" class="hover:text-blue-600 transition">Contact</a> <!-- Aanpassen -->
                @guest
                    <a href="{{ route('login.form') }}" class="px-4 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition">Inloggen</a>
                    <a href="{{ route('register.form') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Registreren</a>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition hover:cursor-pointer">Uitloggen</button>
                    </form>
                @endauth
            </nav>

            <!-- Hamburger -->
            <button id="hamburger" class="md:hidden flex flex-col space-y-1">
                <span class="w-6 h-0.5 bg-gray-800"></span>
                <span class="w-6 h-0.5 bg-gray-800"></span>
                <span class="w-6 h-0.5 bg-gray-800"></span>
            </button>
        </div>

        <!-- Mobile Menu --> <!-- Aanpassen -->
        <div id="mobileMenu" class="hidden md:hidden flex-col space-y-2 bg-white px-6 py-4 shadow-md">
            @auth
                <nav class="flex flex-col space-y-2 mb-4">
                    <span class="text-gray-700">Welkom, {{ auth()->user()->first_name }}!</span>
                    <a href="#" class="hover:text-blue-600 transition">Profiel</a>
                    <a href="#" class="hover:text-blue-600 transition">Mijn lijsten</a>
                </nav>
            @endauth
            <a href="/" class="hover:text-blue-600 transition">Home</a>
            <a href="#" class="hover:text-blue-600 transition">Over ons</a> <!-- Aanpassen -->
            <a href="#" class="hover:text-blue-600 transition">Contact</a> <!-- Aanpassen -->
            @guest
                <a href="{{ route('login.form') }}" class="px-4 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition">Inloggen</a>
                <a href="{{ route('register.form') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Registreren</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition hover:cursor-pointer">Uitloggen</button>
                </form>
            @endauth
        </div>

        <div class="container mx-auto px-4">
            <x-flash-message />
        </div>
    </header>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>