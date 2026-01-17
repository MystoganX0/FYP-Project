<tr class="group transition-colors relative">
    <!-- Date -->
    <td
        class="bg-white border-b border-gray-50 py-4 pl-4 first:rounded-l-2xl last:rounded-r-2xl shadow-sm transition-all">
        <span class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</span>
    </td>

    <!-- Time -->
    <td class="bg-white border-b border-gray-50 py-4 shadow-sm transition-all text-center">
        <span class="text-xs text-gray-500 flex items-center justify-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} -
            {{ \Carbon\Carbon::parse($schedule->time_out)->format('h:i A') }}
        </span>
    </td>

    <!-- Day -->
    <td class="bg-white border-b border-gray-50 py-4 shadow-sm transition-all text-center">
        <span class="font-medium text-gray-700">{{ $schedule->day }}</span>
    </td>

    <!-- Phase Name -->
    <td class="bg-white border-b border-gray-50 py-4 shadow-sm transition-all text-center">
        <span class="bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold border border-gray-700 shadow-sm">
            {{ $schedule->phase->phase_name ?? 'N/A' }}
        </span>
    </td>

    <!-- Slots -->
    <td class="bg-white border-b border-gray-50 py-4 shadow-sm transition-all text-center">
        <div class="flex items-center justify-center gap-2">
            <span class="font-bold text-gray-900">{{ $schedule->slot }}</span>
            <span class="text-xs text-gray-500">slots</span>
        </div>
    </td>

    <!-- Duration -->
    <td class="bg-white border-b border-gray-50 py-4 shadow-sm transition-all text-center">
        <span class="text-gray-600">{{ $schedule->duration }}</span>
    </td>

    <!-- Actions -->
    <td
        class="bg-white border-b border-gray-50 py-4 pr-4 first:rounded-l-2xl last:rounded-r-2xl text-center shadow-sm transition-all">
        <div class="flex items-center justify-center gap-2">
            <button onclick="openEditModal({{ json_encode($schedule) }})"
                class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                title="Edit Schedule">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
            </button>
            <button onclick="openDeleteModal({{ $schedule->schedule_id }})"
                class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                title="Delete Schedule">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </button>
        </div>
    </td>
</tr>