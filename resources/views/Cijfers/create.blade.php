<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Cijfer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-3xl font-bold mb-4">Nieuw Cijfer Toevoegen</h1>

    <form action="{{ route('cijfers.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- STUDENT -->
        <div>
            <label class="block font-semibold mb-1">Student</label>
            <select name="user_id" class="w-full p-2 border rounded">
                <option value="">-- kies een student --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ $selectedUserId == $user->id ? 'selected' : '' }}>
                        {{ $user->firstname }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- NAAM -->
        <div>
            <label class="block font-semibold mb-1">Naam</label>
            <input type="text" name="naam"
                   value="{{ old('naam') }}"
                   class="w-full p-2 border rounded">
            @error('naam')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Weging -->
        <div>
            <label class="block font-semibold mb-1">Weging</label>
            <input type="text" name="weging"
                   value="{{ old('weging') }}"
                   class="w-full p-2 border rounded">
            @error('weging')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- VAK -->
        <div>
            <label class="block font-semibold mb-1">Vak</label>
            <input type="text" name="vak"
                   value="{{ old('vak') }}"
                   class="w-full p-2 border rounded">
            @error('vak')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- WAARDE -->
        <div>
            <label class="block font-semibold mb-1">Waarde</label>
            <input type="text" name="waarde"
                   value="{{ old('waarde') }}"
                   placeholder="bijv. 7,5 of 8.0"
                   class="w-full p-2 border rounded">
            @error('waarde')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Opslaan
        </button>

        <a href="{{ route('cijfers.index', ['user_id' => $selectedUserId]) }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Annuleren
        </a>
    </form>
</div>

</body>
</html>
