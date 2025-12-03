<x-layout>
	<script src="//unpkg.com/alpinejs" defer></script>

	<div class="max-w-5xl w-full mx-auto bg-white rounded-xl shadow-2xl p-8">
		<h1 class="mb-6 text-2xl font-extrabold text-gray-800 text-center tracking-tight">Aanwezigheid</h1>

		@if(isset($presences) && $presences->count())
			@php
				$total = $presences->count();
				$present = $presences->where('option', 'present')->count();
				$absent = $presences->where('option', 'absent')->count();
				$presentPercent = $total ? round($present / $total * 100) : 0;
				$absentPercent = $total ? round($absent / $total * 100) : 0;
				$latestPresences = $presences->sortByDesc(function($p) { return $p->date . ' ' . $p->time; });
				$filterDate = request('filter_date');
				$filteredPresences = $filterDate ? $presences->where('date', $filterDate) : $presences;
			@endphp

			@if($absentPercent > 80)
				<div x-data="{ show: true }" x-show="show" class="mb-6">
					<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex items-center justify-between" role="alert">
						<span class="font-semibold">Warning:</span>
						<span class="ml-2">Absence is above 80 percent. Please take action.</span>
						<button @click="show = false" class="ml-4 text-red-700 hover:text-red-900 font-bold text-xl leading-none">&times;</button>
					</div>
				</div>
			@endif

			<div x-data="{ tab: 'overview', openObjection: false, objectionId: null }">

				<div class="flex justify-center mb-6 border-b border-gray-200">
					<div class="flex space-x-8">
						<button @click="tab = 'overview'" :class="tab === 'overview' ? 'border-blue-500 text-blue-700' : 'border-transparent text-gray-500'" class="px-6 py-2 font-semibold border-b-2 focus:outline-none transition">Overview</button>
						<button @click="tab = 'latest'" :class="tab === 'latest' ? 'border-blue-500 text-blue-700' : 'border-transparent text-gray-500'" class="px-6 py-2 font-semibold border-b-2 focus:outline-none transition">Latest Updates</button>
						<button @click="tab = 'export'" :class="tab === 'export' ? 'border-blue-500 text-blue-700' : 'border-transparent text-gray-500'" class="px-6 py-2 font-semibold border-b-2 focus:outline-none transition">Export Absence</button>
						<button @click="tab = 'create'" :class="tab === 'create' ? 'border-blue-500 text-blue-700' : 'border-transparent text-gray-500'" class="px-6 py-2 font-semibold border-b-2 focus:outline-none transition">Create</button>
					</div>
				</div>

				<div x-show="tab === 'overview'">
					<div class="mb-8">
						<div class="w-full bg-gray-200 rounded-full h-8 flex overflow-hidden shadow-inner">
							<div class="flex items-center justify-center bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold h-8 transition-all duration-500" style="width:{{ $presentPercent }}%">
								{{ $presentPercent }} percent Present
							</div>
							<div class="flex items-center justify-center bg-gradient-to-r from-red-400 to-red-600 text-white font-semibold h-8 transition-all duration-500" style="width:{{ $absentPercent }}%">
								{{ $absentPercent }} percent Absent
							</div>
						</div>
						<div class="flex justify-between mt-2 text-xs text-gray-500 px-1">
							<span>{{ $present }} present</span>
							<span>{{ $absent }} absent</span>
							<span>{{ $total }} total</span>
						</div>
					</div>

					<form method="GET" action="{{ route('presence.index') }}" class="mb-6 flex items-center gap-4">
						<label for="filter_date" class="text-gray-700 font-semibold">Filter by date:</label>
						<input type="date" id="filter_date" name="filter_date" value="{{ request('filter_date') }}" class="px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
						<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 font-semibold transition">Filter</button>
						@if(request('filter_date'))
							<a href="{{ route('presence.index') }}" class="text-sm text-gray-500 underline">Clear</a>
						@endif
					</form>

					<div>
						<table class="w-full bg-white rounded-lg shadow border border-gray-200">
							<thead>
								<tr class="bg-gradient-to-r from-blue-100 to-purple-100">
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Date</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Time</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Status</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Description</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Objection</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($filteredPresences as $presence)
									<tr class="hover:bg-blue-50 transition">
										<td class="px-4 py-2 border-b border-gray-100">{{ $presence->date }}</td>
										<td class="px-4 py-2 border-b border-gray-100">{{ $presence->time }}</td>
										<td class="px-4 py-2 border-b border-gray-100 text-xs">
											<span class="@if($presence->option === 'present') bg-green-100 text-green-700 @elseif($presence->option === 'absent') bg-red-100 text-red-700 @else bg-gray-100 text-gray-700 @endif px-2 py-1 rounded-full font-medium">
												{{ ucfirst($presence->option ?? '') }}
											</span>
										</td>
										<td class="px-4 py-2 border-b border-gray-100 text-xs text-gray-600">{{ $presence->description ?? '-' }}</td>
										<td class="px-4 py-2 border-b border-gray-100 text-xs text-purple-700">
											@if(!empty($presence->objection))
												{{ $presence->objection }}
											@else
												<span class="text-gray-400">-</span>
											@endif
										</td>
										<td class="px-4 py-2 border-b border-gray-100 flex gap-2">
											<a href="{{ route('presence.show', $presence->id) }}" class="bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200 text-xs font-semibold transition">View</a>
											<a href="{{ route('presence.edit', $presence->id) }}" class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded hover:bg-yellow-200 text-xs font-semibold transition">Edit</a>
											<form action="{{ route('presence.destroy', $presence->id) }}" method="POST" class="inline">
												@csrf
												@method('DELETE')
												<button type="submit" onclick="return confirm('Are you sure you want to delete this presence?')" class="bg-red-100 text-red-700 px-2 py-1 rounded hover:bg-red-200 text-xs font-semibold transition">Delete</button>
											</form>
											<button type="button" @click="openObjection = true; objectionId = {{ $presence->id }}" class="bg-purple-100 text-purple-700 px-2 py-1 rounded hover:bg-purple-200 text-xs font-semibold transition">Objection</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div x-show="tab === 'latest'">
					<div class="mb-8">
						<h2 class="text-xl font-bold text-gray-700 mb-4">Latest Updates</h2>
						<table class="w-full bg-white rounded-lg shadow border border-gray-200">
							<thead>
								<tr class="bg-gradient-to-r from-blue-100 to-purple-100">
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Date</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Time</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Status</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Description</th>
									<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($latestPresences as $presence)
									<tr class="hover:bg-blue-50 transition">
										<td class="px-4 py-2 border-b border-gray-100">{{ $presence->date }}</td>
										<td class="px-4 py-2 border-b border-gray-100">{{ $presence->time }}</td>
										<td class="px-4 py-2 border-b border-gray-100 text-xs">
											<span class="@if($presence->option === 'present') bg-green-100 text-green-700 @elseif($presence->option === 'absent') bg-red-100 text-red-700 @else bg-gray-100 text-gray-700 @endif px-2 py-1 rounded-full font-medium">
												{{ ucfirst($presence->option ?? '') }}
											</span>
										</td>
										<td class="px-4 py-2 border-b border-gray-100 text-xs text-gray-600">{{ $presence->description ?? '-' }}</td>
										<td class="px-4 py-2 border-b border-gray-100 flex gap-2">
											<a href="{{ route('presence.show', $presence->id) }}" class="bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200 text-xs font-semibold transition">View</a>
											<a href="{{ route('presence.edit', $presence->id) }}" class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded hover:bg-yellow-200 text-xs font-semibold transition">Edit</a>
											<form action="{{ route('presence.destroy', $presence->id) }}" method="POST" class="inline">
												@csrf
												@method('DELETE')
												<button onclick="return confirm('Are you sure you want to delete this presence?')" class="bg-red-100 text-red-700 px-2 py-1 rounded hover:bg-red-200 text-xs font-semibold transition">Delete</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div x-show="tab === 'export'">
					<div class="mb-8">
						<h2 class="text-xl font-bold text-gray-700 mb-4">Export Absence</h2>
						<p class="mb-4 text-gray-600">Export all absence records to a document.</p>
						<form action="{{ route('presence.exportAbsence') }}" method="POST">
							@csrf
							<button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-semibold transition">Export Absence Document</button>
						</form>
					</div>
					<table class="w-full bg-white rounded-lg shadow border border-gray-200">
						<thead>
							<tr class="bg-gradient-to-r from-blue-100 to-purple-100">
								<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Date</th>
								<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Time</th>
								<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Description</th>
							</tr>
						</thead>
						<tbody>
							@foreach($presences->where('option', 'absent') as $presence)
								<tr class="hover:bg-blue-50 transition">
									<td class="px-4 py-2 border-b border-gray-100">{{ $presence->date }}</td>
									<td class="px-4 py-2 border-b border-gray-100">{{ $presence->time }}</td>
									<td class="px-4 py-2 border-b border-gray-100 text-xs text-gray-600">{{ $presence->description ?? '-' }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div x-show="tab === 'create'">
					<div class="max-w-lg w-full mx-auto bg-white rounded-xl shadow-2xl p-8 mt-8">
						<h2 class="mb-6 text-2xl font-extrabold text-gray-800 text-center tracking-tight">Add Presence</h2>
						<form action="{{ route('presence.store') }}" method="POST" class="space-y-6">
							@csrf
							<div>
								<label class="block text-gray-700 font-semibold mb-1" for="date">Date</label>
								<input type="date" name="date" id="date" value="{{ old('date') }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
							</div>
							<div>
								<label class="block text-gray-700 font-semibold mb-1" for="time">Time</label>
								<input type="time" name="time" id="time" value="{{ old('time') }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
							</div>
							<div>
								<label class="block text-gray-700 font-semibold mb-1" for="option">Status</label>
								<select name="option" id="option" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
									<option value="present" @if(old('option') === 'present') selected @endif>Present</option>
									<option value="absent" @if(old('option') === 'absent') selected @endif>Absent</option>
								</select>
							</div>
							<div>
								<label class="block text-gray-700 font-semibold mb-1" for="description">Description</label>
								<textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('description') }}</textarea>
							</div>
							<input type="hidden" name="timecreated_at" value="{{ now()->format('H:i:s') }}">
							<input type="hidden" name="datecreated_at" value="{{ now()->toDateString() }}">
							<div class="flex gap-3 justify-end pt-4">
								<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold transition">Save</button>
							</div>
						</form>
					</div>
				</div>

				<div x-show="openObjection" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" style="display: none;" x-transition>
					<div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md relative">
						<button @click="openObjection = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-xl">&times;</button>
						<h2 class="mb-6 text-xl font-extrabold text-gray-800 text-center tracking-tight">Absence Objection</h2>
						<form x-ref="objectionForm" action="{{ route('presence.objection') }}" method="POST" class="space-y-6">
							@csrf
							<input type="hidden" name="presence_id" :value="objectionId">
							<div>
								<label class="block text-gray-700 font-semibold mb-1" for="objection_description">Why should your absence be changed</label>
								<textarea name="objection_description" id="objection_description" rows="4" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required></textarea>
							</div>
							<div class="flex gap-3 justify-end pt-4">
								<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold transition">Submit Objection</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		@else
			<div class="text-center py-12 text-gray-400 text-lg font-medium">
				No presences found.
			</div>
		@endif

	</div>
</x-layout>
