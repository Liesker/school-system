<x-layout>
    <div class="max-w-7xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Rooster – Klassen Overzicht</h1>

        <div class="bg-white shadow rounded-lg p-6">

            <!-- Header: week navigatie -->
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('classrooms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Nieuwe Klasse Aanmaken
                </a>

                <div class="flex items-center gap-4">
                    @php
                        $prev = $startOfWeek->copy()->subWeek()->toDateString();
                        $next = $startOfWeek->copy()->addWeek()->toDateString();
                    @endphp

                    <a href="{{ route('classrooms', ['start' => $prev]) }}" class="px-3 py-1 border rounded">
                        &larr; Vorige week
                    </a>

                    <div class="text-center">
                        <div class="text-sm text-gray-500">Week</div>
                        <div class="font-semibold">
                            {{ $startOfWeek->format('d M Y') }} – {{ $startOfWeek->copy()->addDays(4)->format('d M Y') }}
                        </div>
                    </div>

                    <a href="{{ route('classrooms', ['start' => $next]) }}" class="px-3 py-1 border rounded">
                        Volgende week &rarr;
                    </a>
                </div>
            </div>

            <!-- Rooster grid -->
            <div class="grid grid-cols-6 border border-gray-300">

                <!-- Tijd header -->
                <div class="border-r border-gray-300 bg-gray-100 p-2 font-semibold text-center">Tijd</div>

                <!-- Dag headers -->
                @foreach ($days as $day)
                    <div class="border-r border-gray-300 bg-gray-100 p-2 text-center font-semibold">
                        <div>{{ $day->format('D') }}</div>
                        <div class="text-xs text-gray-500">{{ $day->format('d M') }}</div>
                    </div>
                @endforeach

                @php
                    $times = [
                        '08:00:00','09:00:00','10:00:00','11:00:00','12:00:00',
                        '13:00:00','14:00:00','15:00:00','16:00:00'
                    ];
                @endphp

                <!-- Tijden + vakjes -->
                @foreach ($times as $time)
                    <!-- Tijd links -->
                    <div class="border-t border-r border-gray-300 p-2 text-sm text-gray-600">
                        {{ substr($time, 0, 5) }}
                    </div>

                    <!-- Vakjes per dag -->
                    @foreach ($days as $day)
                        <div class="border-t border-r border-gray-300 relative h-24 p-1">

                            @foreach ($classes as $class)
                                @if ($class->date === $day->toDateString() &&
                                     $class->roster &&
                                     $class->roster->start_time === $time)

                                    <!-- Klikbare les -->
                                    <div onclick="openPopup({{ $class->id }})"
                                         class="absolute inset-1 bg-blue-500 hover:bg-blue-600 transition text-white rounded p-2 text-xs shadow cursor-pointer">

                                        <div class="font-bold">{{ $class->name }}</div>
                                        <div>{{ $class->description }}</div>

                                        <div class="text-[10px] mt-1">
                                            {{ substr($class->roster->start_time, 0, 5) }} -
                                            {{ substr($class->roster->end_time, 0, 5) }}
                                        </div>

                                        <div class="text-[10px]">
                                            Lesuur: {{ $class->roster->lesson_hour }}
                                        </div>
                                    </div>

                                @endif
                            @endforeach

                        </div>
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>

    <!-- POPUP ACHTERGROND -->
    <div id="popupBackground"
         class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 opacity-0 transition-opacity duration-300">
    </div>

    <!-- POPUP VENSTER -->
    <div id="popupWindow"
         class="hidden fixed bg-white rounded-lg shadow-xl p-6 w-96 z-50 scale-75 opacity-0 transition-all duration-300">

        <h2 id="popupTitle" class="text-xl font-bold mb-2"></h2>
        <p id="popupDescription" class="text-gray-700 mb-2"></p>

        <p class="text-sm text-gray-600">
            <span class="font-semibold">Tijd:</span>
            <span id="popupTime"></span>
        </p>

        <p class="text-sm text-gray-600">
            <span class="font-semibold">Lesuur:</span>
            <span id="popupHour"></span>
        </p>

        <p class="text-sm text-gray-600 mb-4">
            <span class="font-semibold">Datum:</span>
            <span id="popupDate"></span>
        </p>

        <a id="popupDetailLink"
           class="block bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded mb-3">
            Bekijk details
        </a>

        <button onclick="closePopup()"
                class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 rounded">
            Sluiten
        </button>
    </div>

    <script>
        const classesData = @json($classes);

        function openPopup(id) {
            const item = classesData.find(c => c.id === id);
            if (!item) return;

            document.getElementById('popupTitle').textContent = item.name;
            document.getElementById('popupDescription').textContent = item.description;
            document.getElementById('popupTime').textContent =
                item.roster.start_time.substring(0, 5) + " - " +
                item.roster.end_time.substring(0, 5);
            document.getElementById('popupHour').textContent = item.roster.lesson_hour;
            document.getElementById('popupDate').textContent = item.date;

            document.getElementById('popupDetailLink').href = "/classrooms/" + item.id;

            // Popup background fade-in
            const bg = document.getElementById("popupBackground");
            const win = document.getElementById("popupWindow");

            bg.classList.remove("hidden");
            win.classList.remove("hidden");

            setTimeout(() => {
                bg.classList.remove("opacity-0");
                win.classList.remove("opacity-0", "scale-75");
            }, 10);
        }

        function closePopup() {
            const bg = document.getElementById("popupBackground");
            const win = document.getElementById("popupWindow");

            bg.classList.add("opacity-0");
            win.classList.add("opacity-0", "scale-75");

            setTimeout(() => {
                bg.classList.add("hidden");
                win.classList.add("hidden");
            }, 300);
        }

        document.getElementById("popupBackground").addEventListener("click", closePopup);
    </script>
</x-layout>
