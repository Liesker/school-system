<x-layout>
	<div class="max-w-xl w-full mx-auto bg-white rounded-xl shadow-2xl p-8">
		<h1 class="mb-6 text-2xl font-extrabold text-gray-800 text-center tracking-tight">Aanwezigheid</h1>

		@if(isset($presences) && $presences->count())
			@php
				$total = $presences->count();
				$present = $presences->where('option', 'present')->count();
				$absent = $presences->where('option', 'absent')->count();
				$presentPercent = $total ? round($present / $total * 100) : 0;
				$absentPercent = $total ? round($absent / $total * 100) : 0;
			@endphp
			<div class="mb-8">
				<div class="w-full bg-gray-200 rounded-full h-8 flex overflow-hidden shadow-inner">
					<div class="flex items-center justify-center bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold h-8 transition-all duration-500" style="width:{{ $presentPercent }}%">
						{{ $presentPercent }}% Present
					</div>
					<div class="flex items-center justify-center bg-gradient-to-r from-red-400 to-red-600 text-white font-semibold h-8 transition-all duration-500" style="width:{{ $absentPercent }}%">
						{{ $absentPercent }}% Absent
					</div>
				</div>
				<div class="flex justify-between mt-2 text-xs text-gray-500 px-1">
					<span>{{ $present }} present</span>
					<span>{{ $absent }} absent</span>
					<span>{{ $total }} total</span>
				</div>
			</div>
			<div class="overflow-x-auto">
				<table class="min-w-full bg-white rounded-lg shadow border border-gray-200">
					<thead>
						<tr class="bg-gradient-to-r from-blue-100 to-purple-100">
							<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Date</th>
							<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Time</th>
							<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Status</th>
							<th class="px-4 py-2 border-b border-gray-300 text-left font-semibold text-gray-700">Description</th>
						</tr>
					</thead>
					<tbody>
						@foreach($presences as $presence)
							<tr class="hover:bg-blue-50 transition">
								<td class="px-4 py-2 border-b border-gray-100">{{ $presence->date }}</td>
								<td class="px-4 py-2 border-b border-gray-100">{{ $presence->time }}</td>
								<td class="px-4 py-2 border-b border-gray-100 text-xs">
									<span class="@if($presence->option === 'present') bg-green-100 text-green-700 @elseif($presence->option === 'absent') bg-red-100 text-red-700 @else bg-gray-100 text-gray-700 @endif px-2 py-1 rounded-full font-medium">
										{{ ucfirst($presence->option ?? '') }}
									</span>
								</td>
								<td class="px-4 py-2 border-b border-gray-100 text-xs text-gray-600">{{ $presence->description ?? '-' }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@else
			<div class="text-center py-12 text-gray-400 text-lg font-medium">
				No presences found.
			</div>
		@endif
	</div>
</x-layout>
