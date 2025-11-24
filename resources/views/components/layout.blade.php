<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'School Systeem' }}</title>

    <!-- Tailwind import via Vite -->
    @vite('resources/css/app.css')
</head>

<body >

    <!-- Navbar -->
    <nav >
        <div>
            <h1 class="text-2xl font-bold">School Systeem</h1>

            <ul class="flex gap-6">
                <li><a href="/" >Home</a></li>
                <li><a href="/classrooms">Roosters</a></li>
                <li><a href="#" >Docenten</a></li>
                <li><a href="#" >Leerlingen</a></li>
            </ul>
        </div>
    </nav>

    <!-- Pagina inhoud -->
    <main >
      {{ $slot }}
    </main>

</body>
</html>
