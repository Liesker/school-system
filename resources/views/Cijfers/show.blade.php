<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cijfer Details</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // veilige conversie van Blade naar JS
            const gemaakt = @json($huidigAantal);
            const resterend = @json($restToDo);
            const totaal = @json($totaal_toetsen);


            // maak data; gebruiken absolute aantallen zodat de pie niet altijd 100% gevuld
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Aantal'],
                ['Gemaakt',     gemaakt],
                ['Nog te maken', resterend]
            ]);

            var options = {
                title: 'Voortgang voor {{ addslashes($cijfer->vak) }}',
                pieHole: 0.45,
                colors: ['#3B82F6', '#E5E7EB'],
                chartArea: { width: '90%', height: '80%' },
                legend: { position: 'bottom' },
                // tooltip toont ook percentage en aantallen
                tooltip: { text: 'both' }
            };

            var chart = new google.visualization.PieChart(
                document.getElementById('chart')
            );

            chart.draw(data, options);

            // optioneel: toon % voortgang onder de chart (DOM)
            const pct = totaal > 0 ? Math.round((gemaakt / totaal) * 100) : 0;
            const pctEl = document.getElementById('progressPercent');
            if (pctEl) pctEl.textContent = pct + '%';
        }
    </script>
</head>

<body class="bg-gray-100 py-10 px-5">

<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">

    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        📘 Cijferdetails: {{ $cijfer->vak }}
    </h1>

    <div class="space-y-2 text-lg">
        <p><strong>Student:</strong> {{ $cijfer->user->firstname }}</p>
        <p><strong>Cijfer:</strong> {{ $cijfer->waarde }}</p>
        <p><strong>Weging:</strong> {{ $cijfer->weging }}</p>
        <p><strong>Gemiddelde van vak (gewogen):</strong>
            <span class="font-semibold text-blue-600">
                {{ $gemiddelde }}
            </span>
        </p>
        <p>
            <strong>Voortgang:</strong>
            {{ $huidigAantal }} / {{ $totaal_toetsen }} toetsen afgerond
            (<span id="progressPercent" class="font-semibold text-green-600">--%</span>)
        </p>
    </div>

    <div id="chart" class="mt-8" style="height: 350px;"></div>

    <div class="mt-8 flex space-x-4">
        <a href="{{ route('cijfers.edit', $cijfer) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            Bewerken
        </a>

        <a href="{{ route('cijfers.index', ['user_id' => $cijfer->user_id]) }}"
           class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">
            Terug
        </a>
    </div>
</div>

</body>
</html>
