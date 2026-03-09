<body class="bg-gray-50 text-gray-800 font-sans">

    @extends('layouts.app')

    @section('content')

        <div class="py-10 px-4">
            <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-8"
                x-data="wordListForm()">

                <h2 class="text-2xl font-semibold mb-8">Nieuwe Woordenlijst</h2>

                <form method="POST" action="{{ route('wordsmart-lists.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Titel
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                            required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Beschrijving
                        </label>

                        <textarea
                            name="description"
                            rows="3"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-10">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Linker taal
                            </label>

                            <input
                                type="text"
                                name="left_language"
                                x-model="leftLanguage"
                                placeholder="Bijv. Engels"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Rechter taal
                            </label>

                            <input
                                type="text"
                                name="right_language"
                                x-model="rightLanguage"
                                placeholder="Bijv. Nederlands"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>

                    </div>

                    <div class="border rounded-xl overflow-hidden">

                        <div class="grid grid-cols-2 bg-gray-100 px-4 py-3 font-semibold text-gray-700 sticky top-0">
                            <span x-text="leftLanguage || 'Linker woord'"></span>
                            <span x-text="rightLanguage || 'Rechter woord'"></span>
                        </div>

                        <div class="p-4 space-y-3">

                            <template x-for="(item, index) in items" :key="index">

                                <div class="grid grid-cols-2 gap-4 items-center">

                                    <input
                                        type="text"
                                        :name="'items['+index+'][left_word]'"
                                        x-model="item.left_word"
                                        @keydown.enter.prevent="addRow(index)"
                                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                                        placeholder="woord">

                                    <div class="flex gap-2">

                                        <input
                                            type="text"
                                            :name="'items['+index+'][right_word]'"
                                            x-model="item.right_word"
                                            @keydown.enter.prevent="addRow(index)"
                                            class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:ring focus:ring-blue-200"
                                            placeholder="vertaling">

                                        <button
                                            type="button"
                                            @click="removeRow(index)"
                                            class="text-red-500 hover:text-red-700 font-bold text-lg hover:cursor-pointer">
                                            ✕
                                        </button>

                                    </div>

                                </div>

                            </template>

                        </div>

                    </div>

                    <button
                        type="button"
                        @click="addRow()"
                        class="mt-4 text-blue-600 font-semibold hover:text-blue-800 hover:cursor-pointer">
                        + Woord toevoegen
                    </button>

                    <div class="mt-10 text-right">

                        <button
                            type="submit"
                            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 hover:cursor-pointer">
                            Lijst opslaan
                        </button>

                    </div>

                </form>

            </div>
        </div>

    @endsection

</body>

<script>
function wordListForm() {
    return {

        leftLanguage: '',
        rightLanguage: '',

        items: [
            { left_word: '', right_word: '' }
        ],

        addRow(index = null) {

            const newIndex = index !== null ? index + 1 : this.items.length;

            this.items.splice(newIndex, 0, {
                left_word: '',
                right_word: ''
            });

            this.$nextTick(() => {

                const inputs = document.querySelectorAll(
                    'input[name^="items["]'
                );

                if (inputs[newIndex * 2]) {
                    inputs[newIndex * 2].focus();
                }

            });
        },

        removeRow(index) {

            if (this.items.length > 1) {
                this.items.splice(index, 1);
            }

        }

    }
}
</script>