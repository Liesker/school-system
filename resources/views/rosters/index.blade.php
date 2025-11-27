

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
                
                <a  class="text-green-500 hover:underline ml-4" href="{{ route('rosters.edit', $roster->id) }}">Edit</a>
                <a class="text-red-500 hover:underline ml-4" href="{{ route('rosters.delete', $roster->id) }}">Delete</a>
            
            </li>
            @endforeach
        </ul>
        @endif
    </div>

</x-layout>