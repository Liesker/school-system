<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cijfers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">

        <h1 class="text-3xl font-bold mb-4">Cijfers per student</h1>

        <!-- FILTER FORM -->
        <form method="GET" class="mb-6">
            <label class="block font-semibold mb-2">Selecteer een student:</label>

            <select name="user_id"
                    class="w-full p-2 border rounded"
                    onchange="this.form.submit()">
                <option value="">-- Kies een student --</option>

                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->firstname }}
                    </option>
                @endforeach
            </select>
        </form>

        
        <!-- Alleen cijfers tonen als er een user geselecteerd is -->
        @if(request()->filled('user_id'))
        
        <h2 class="text-xl font-semibold mb-2">Cijfers:</h2>
        
        @if($cijfers->count() > 0)
        <ul class="space-y-2">
            @foreach($cijfers as $cijfer)
            <li>
                <a href="{{ route('cijfers.show', $cijfer) }}"
                class="block p-3 rounded bg-gray-200 hover:bg-gray-300">
                {{ $cijfer->naam }}: {{ $cijfer->waarde }}
            </a>
        </li>
        @endforeach
    </ul>
    @else
    <p class="text-gray-600">Deze student heeft nog geen cijfers.</p>
    @endif
    
    
</div>
@endif
<!-- Nieuw cijfer toevoegen knop -->
@if(request()->filled('user_id'))
    <div class="mb-4">
        <a href="{{ route('cijfers.create', ['user_id' => request('user_id')]) }}"
           class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Nieuw Cijfer Toevoegen
        </a>
    </div>
@endif

</body>
</html>
