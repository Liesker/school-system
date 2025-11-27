<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cijfer Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-3xl font-bold mb-4">Cijfer Details</h1>

        <div class="space-y-2">
            <p><strong>Vak:</strong> {{ $cijfer->vak }}</p>
            <p><strong>Waarde:</strong> {{ $cijfer->waarde }}</p>
        </div>

        <div class="mt-6 flex gap-3">

            <a href="{{ route('cijfers.index', ['user_id' => $cijfer->user_id]) }}"
                class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Terug naar overzicht
            </a>

            <!-- Bewerken -->
            <a href="{{ route('cijfers.edit', $cijfer) }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Bewerken
            </a>
        </div>

        @if(session('success'))
            <p class="mt-4 text-green-600 font-semibold">{{ session('success') }}</p>
        @endif
    </div>

</body>
</html>
