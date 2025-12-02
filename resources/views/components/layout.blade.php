<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'School Systeem' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-5xl mx-auto flex items-center justify-between p-4">
            <h1 class="text-xl font-semibold">School Systeem</h1>

            <ul class="flex gap-6 text-sm">
                <li>
                    <a href="/" class="hover:text-blue-600">Home</a>
                </li>
                <li>
                    <a href="/classrooms" class="hover:text-blue-600">Roosters</a>
                </li>
                <li>
                    <a href="#" class="hover:text-blue-600">Docenten</a>
                </li>
                <li>
                    <a href="#" class="hover:text-blue-600">Leerlingen</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-4">
        {{ $slot }}
    </main>

</body>
</html>
