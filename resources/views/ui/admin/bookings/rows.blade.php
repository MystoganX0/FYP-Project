@forelse($bookings as $booking)
    <tr class="group" @if($loop->index >= 5) style="display: none;" @endif>
        <td class="bg-white border-b border-gray-50 py-4 pl-4 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm">
                    {{ substr($booking->student->full_name ?? '?', 0, 1) }}
                </div>
                <div class="flex flex-col">
                    <span class="text-gray-900 font-bold text-sm">{{ $booking->student->full_name ?? 'N/A' }}</span>
                    <span class="text-xs text-gray-400">{{ $booking->student->ic ?? 'N/A' }}</span>
                </div>
            </div>
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center">
            <span class="bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold border border-gray-700 shadow-sm">
                {{ $booking->schedule->phase->phase_name ?? 'N/A' }}
            </span>
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center">
            <div class="text-gray-700 font-semibold text-sm">
                {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') }}
            </div>
            <div class="text-xs text-gray-400 font-medium">
                {{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }}
            </div>
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center">
            @php
                $statusColor = match ($booking->booking_status) {
                    'Completed' => 'green',
                    'Confirmed' => 'blue',
                    'Pending' => 'gray',
                    'Failed' => 'red',
                    'Absent' => 'red',
                    default => 'gray',
                };
            @endphp
            <div class="flex justify-center">
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-full text-xs font-bold bg-{{ $statusColor }}-100 text-{{ $statusColor }}-700 ring-1 ring-inset ring-{{ $statusColor }}-600/20">
                    <span class="w-2 h-2 rounded-full bg-{{ $statusColor }}-600"></span>
                    {{ $booking->booking_status }}
                </span>
            </div>
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center">
            <span class="text-gray-700 font-bold text-sm">
                {{ $booking->attempt->attempt_no ?? '-' }}
            </span>
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center">
            @if ($booking->attempt)
                @php
                    $resColor = match ($booking->attempt->result) {
                        'Pass' => 'green',
                        'Failed' => 'red',
                        'Pending' => 'gray',
                        default => 'gray',
                    };
                @endphp
                <div class="flex justify-center">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-full text-xs font-bold bg-{{ $resColor }}-100 text-{{ $resColor }}-700 ring-1 ring-inset ring-{{ $resColor }}-600/20">
                        <span class="w-2 h-2 rounded-full bg-{{ $resColor }}-600"></span>
                        {{ $booking->attempt->result }}
                    </span>
                </div>
            @else
                <span class="text-gray-300">-</span>
            @endif
        </td>
        <td class="bg-white border-b border-gray-50 py-4 text-center pr-4 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
            <div class="flex items-center justify-center gap-2">
                <button data-modal-target="editModal-{{ $booking->booking_id }}"
                    data-modal-toggle="editModal-{{ $booking->booking_id }}"
                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                        </path>
                    </svg>
                </button>

                <button data-modal-target="deleteModal-{{ $booking->booking_id }}"
                    data-modal-toggle="deleteModal-{{ $booking->booking_id }}"
                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors ml-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="px-6 py-8 text-center text-gray-500 italic">No bookings found in this
            category.</td>
    </tr>
@endforelse