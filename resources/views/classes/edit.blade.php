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


            <div style="margin-bottom:0.75rem;">
                <label for="date">Date</label><br>
                <input id="date" name="date" type="date" value="{{ old('date', $class->date) }}" style="width:100%;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="is_available">Availability</label><br>
                <select id="is_available" name="is_available" style="width:100%;padding:0.5rem;">
                    <option value="1" {{ old('is_available', $class->is_available) ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ !old('is_available', $class->is_available) ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="roster_id">Roster</label><br>
                <p style="margin:0 0 0.5rem 0;font-size:0.9rem;color:#555;">Of kies onderdelen afzonderlijk</p>

                <div style="display:flex;gap:0.5rem;margin-bottom:0.5rem;">
                    <select id="classyear" name="classyear" style="padding:0.5rem;width:6rem;">
                        <option value="">Jaar</option>
                        @foreach($classyears as $y)
                        <option value="{{ $y }}" {{ (string)old('classyear', optional($class->roster)->classyear) === (string)$y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>

                    <select id="lesson_hour" name="lesson_hour" style="padding:0.5rem;width:6rem;">
                        <option value="">Lesuur</option>
                        @foreach($lesson_hours as $lh)
                        <option value="{{ $lh }}" {{ (string)old('lesson_hour', optional($class->roster)->lesson_hour) === (string)$lh ? 'selected' : '' }}>{{ $lh }}</option>
                        @endforeach
                    </select>

                    <select id="class_number" name="class_number" style="padding:0.5rem;width:6rem;">
                        <option value="">Klasnr</option>
                        @foreach($class_numbers as $cn)
                        <option value="{{ $cn }}" {{ (string)old('class_number', optional($class->roster)->class_number) === (string)$cn ? 'selected' : '' }}>{{ $cn }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div style="margin-top:1rem;">
                <button type="submit" style="padding:0.5rem 1rem;">Save</button>
                <a href="{{ url('/classrooms/'.$class->id) }}" style="margin-left:1rem;">Cancel</a>
            </div>
        </form>
    </div>

</x-layout>