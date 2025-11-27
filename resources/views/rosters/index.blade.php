

<x-layout>
    <div class="container">
        <h1>Rosters</h1>

        @if ($rosters->isEmpty())
        <p>No rosters available.</p>
        @else
        <ul>
            @foreach ($rosters as $roster)
            <li>
                <td>{{ $roster->term }}</td>
                <td>{{ $roster->year }}</td>
                
            </li>
            @endforeach
        </ul>
        @endif
    </div>

</x-layout>