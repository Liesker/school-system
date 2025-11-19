<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cijfer Bewerken</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-3xl font-bold mb-4">Cijfer Bewerken</h1>

        <form action="{{ route('cijfers.update', $cijfer) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- VAK -->
            <div>
                <label class="block font-semibold mb-1">Vak</label>
                <input type="text" name="vak"
                       value="{{ old('vak', $cijfer->vak) }}"
                       class="w-full p-2 border rounded">
                @error('vak')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- WAARDE (nu met komma-ondersteuning via text input) -->
            <div>
                <label class="block font-semibold mb-1">Waarde</label>
                <input type="text" name="waarde"
                       value="{{ old('waarde', $cijfer->waarde) }}"
                       class="w-full p-2 border rounded"
                       placeholder="Bijv. 7,5 of 8.0">
                @error('waarde')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- OPSLAAN -->
            <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Opslaan
            </button>

            <!-- TERUGKNOP naar dezelfde user -->
            <a href="{{ route('cijfers.index', ['user_id' => $cijfer->user_id]) }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Terug naar overzicht
            </a>
        </form>
    </div>

</body>
</html>
