<body class="bg-gray-50 text-gray-800 font-sans">

    @extends('layouts.app')

    @section('content')

        <div class="min-h-screen bg-gray-100 py-10 px-4">
            <div class="max-w-7xl mx-auto">

                <h1 class="text-3xl font-bold text-gray-900 mb-6">WordSmart Lijsten</h1>

                <div class="bg-white shadow-lg rounded-2xl p-10 flex justify-between items-center">
                    <p class="text-gray-700">Hier komen de WordSmart lijsten te staan.</p>

                    <a href="{{ route('wordsmart-lists.create') }}" 
                    class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                    Maak een nieuwe lijst aan
                    </a>
                </div>

            </div>
        </div>

    @endsection

</body>