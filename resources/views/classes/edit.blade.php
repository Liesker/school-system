<x-layout>
    <div class="container" style="max-width:700px;margin:2rem auto;">
        <h1>Edit Classroom</h1>

        @if ($errors->any())
        <div style="color:#b00020;margin-bottom:1rem;">
            <strong>There were some problems with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ url('/classrooms/'.$class->id) }}">
            @csrf

            <div style="margin-bottom:0.75rem;">
                <label for="name">Name</label><br>
                <input id="name" name="name" type="text" value="{{ old('name', $class->name) }}" style="width:100%;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="description">Description</label><br>
                <textarea id="description" name="description" rows="4" style="width:100%;padding:0.5rem;">{{ old('description', $class->description) }}</textarea>
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="capacity">Capacity</label><br>
                <input id="capacity" name="capacity" type="number" value="{{ old('capacity', $class->capacity) }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-top:1rem;">
                <button type="submit" style="padding:0.5rem 1rem;">Save</button>
                <a href="{{ url('/classrooms/'.$class->id) }}" style="margin-left:1rem;">Cancel</a>
            </div>
        </form>
    </div>

</x-layout>