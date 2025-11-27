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

        <!-- STUDENT NAAM (alleen tonen) -->
        <div>
            <label class="block font-semibold mb-1">Student</label>
            <input type="text"
                   value="{{ $cijfer->user->firstname }}"
                   disabled
                   class="w-full p-2 border rounded bg-gray-100">
        </div>

        <!-- NAAM -->
        <div>
            <label class="block font-semibold mb-1">Naam</label>
            <input type="text" name="naam"
                   value="{{ old('naam', $cijfer->naam) }}"
                   class="w-full p-2 border rounded">
            @error('naam')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

          <!-- WEGING -->
        <div>
            <label class="block font-semibold mb-1">Weging</label>
            <input type="text" name="weging"
                   value="{{ old('weging', $cijfer->weging) }}"
                   class="w-full p-2 border rounded">
            @error('weging')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

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

        <!-- WAARDE -->
        <div>
            <label class="block font-semibold mb-1">Waarde</label>
            <input type="text" name="waarde"
                   value="{{ old('waarde', $cijfer->waarde) }}"
                   placeholder="bijv. 7,5 of 8"
                   class="w-full p-2 border rounded">
            @error('waarde')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Opslaan
        </button>

        <a href="{{ route('cijfers.index', ['user_id' => $cijfer->user_id]) }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Terug
        </a>

    </form>
</div>

</body>
</html>
