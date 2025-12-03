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

    {{-- FOUTMELDINGEN --}}
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cijfers.update', $cijfer) }}" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- STUDENT --}}
        <div>
            <label class="font-semibold block mb-1">Student</label>
            <select name="user_id" class="w-full p-2 border rounded">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $cijfer->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->firstname }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- NAAM VAN DE TOETS --}}
        <div>
            <label class="font-semibold block mb-1">Naam toets</label>
            <input type="text" name="naam" value="{{ old('naam', $cijfer->naam) }}"
                   class="w-full p-2 border rounded">
        </div>

        {{-- VAK --}}
        <div>
            <label class="font-semibold block mb-1">Vak</label>
            <input type="text" name="vak" value="{{ old('vak', $cijfer->vak) }}"
                   class="w-full p-2 border rounded">
        </div>

        {{-- WAARDE (CIJFER) --}}
        <div>
            <label class="font-semibold block mb-1">Waarde (bijv. 7.5)</label>
            <input type="text" name="waarde" value="{{ old('waarde', $cijfer->waarde) }}"
                   class="w-full p-2 border rounded">
        </div>

        {{-- WEGING --}}
        <div>
            <label class="font-semibold block mb-1">Weging</label>
            <input type="number" name="weging" value="{{ old('weging', $cijfer->weging) }}"
                   class="w-full p-2 border rounded">
        </div>

        {{-- TOTAAL TOETSEN VOOR DIT VAK (ENKEL VOOR DEZE STUDENT) --}}
        <div>
            <label class="font-semibold block mb-1">Totaal toetsen voor dit vak (alleen voor deze student)</label>
            <input type="number" name="totaal_toetsen" min="1"
                   value="{{ old('totaal_toetsen', $totaal_toetsen) }}"
                   class="w-full p-2 border rounded">
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('cijfers.show', $cijfer) }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Annuleren
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Opslaan
            </button>
        </div>

    </form>

</div>

</body>
</html>
