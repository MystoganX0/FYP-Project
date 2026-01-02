<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"],
                    },
                },
            },
        };
    </script>
</head>

<body class="bg-gray-50 font-poppins min-h-screen">
    @include('ui.admin.sidebar')

    <div class="p-4 sm:ml-72 transition-all duration-300">
        <div class="p-2 mt-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Manage Bookings</h1>
                    <p class="text-gray-500 text-sm mt-1">View and update student booking statuses and results.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">Student</th>
                                <th scope="col" class="px-6 py-3 font-medium">Phase</th>
                                <th scope="col" class="px-6 py-3 font-medium">Date</th>
                                <th scope="col" class="px-6 py-3 font-medium">Attendance</th>
                                <th scope="col" class="px-6 py-3 font-medium">Result</th>
                                <th scope="col" class="px-6 py-3 font-medium text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-blue-50 transition-colors group">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <div class="flex flex-col">
                                            <span>{{ $booking->student->full_name ?? 'N/A' }}</span>
                                            <span class="text-xs text-gray-400">{{ $booking->student->ic ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ $booking->schedule->phase->phase_name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') }}
                                        <div class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusColor = match ($booking->booking_status) {
                                                'Completed' => 'green',
                                                'Confirmed' => 'blue',
                                                'Pending' => 'yellow',
                                                'Failed' => 'red',
                                                default => 'gray'
                                            };
                                        @endphp
                                        <span
                                            class="bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 text-xs font-bold px-2.5 py-0.5 rounded-full border border-{{ $statusColor }}-200">
                                            {{ $booking->booking_status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($booking->attempt)
                                            @php
                                                $resColor = match ($booking->attempt->result) {
                                                    'Pass' => 'green',
                                                    'Failed' => 'red',
                                                    'Pending' => 'gray',
                                                    default => 'gray'
                                                };
                                            @endphp
                                            <span
                                                class="bg-{{ $resColor }}-100 text-{{ $resColor }}-800 text-xs font-bold px-2.5 py-0.5 rounded-full border border-{{ $resColor }}-200">
                                                {{ $booking->attempt->result }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button data-modal-target="editModal-{{ $booking->booking_id }}"
                                            data-modal-toggle="editModal-{{ $booking->booking_id }}"
                                            class="font-medium text-blue-600 hover:underline hover:text-blue-800">
                                            Update
                                        </button>

                                        <!-- Edit Modal -->
                                        <div id="editModal-{{ $booking->booking_id }}" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                        <h3 class="text-xl font-semibold text-gray-900">Update Booking</h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                            data-modal-hide="editModal-{{ $booking->booking_id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.bookings.update', $booking->booking_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="p-6 space-y-6 text-left">
                                                            <div>
                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900">Attendance
                                                                    Status (Logistics)</label>
                                                                <select name="booking_status"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                    <option value="Pending" {{ $booking->booking_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                    <option value="Confirmed" {{ $booking->booking_status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                                    <option value="Completed" {{ $booking->booking_status == 'Completed' ? 'selected' : '' }}>Completed (Attended)</option>
                                                                    <option value="Absent" {{ $booking->booking_status == 'Absent' ? 'selected' : '' }}>Absent</option>
                                                                    <!-- Failed in logistics context usually means something else, but keeping for compatibility if existing. Usually Absent is simpler. -->
                                                                </select>
                                                                <p class="mt-1 text-xs text-gray-500">Mark 'Completed' if
                                                                    student showed up.</p>
                                                            </div>

                                                            @if($booking->attempt)
                                                                <div>
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Academic
                                                                        Result</label>
                                                                    <select name="result"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                        <option value="Pending" {{ $booking->attempt->result == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="Pass" {{ $booking->attempt->result == 'Pass' ? 'selected' : '' }}>Pass</option>
                                                                        <option value="Failed" {{ $booking->attempt->result == 'Failed' ? 'selected' : '' }}>Failed</option>
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div
                                                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                                            <button type="submit"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                                                            <button data-modal-hide="editModal-{{ $booking->booking_id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <button data-modal-target="deleteModal-{{ $booking->booking_id }}"
                                            data-modal-toggle="deleteModal-{{ $booking->booking_id }}"
                                            class="font-medium text-red-600 hover:underline hover:text-red-800 ml-3">
                                            Delete
                                        </button>

                                        <!-- Delete Modal -->
                                        <div id="deleteModal-{{ $booking->booking_id }}" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                        data-modal-hide="deleteModal-{{ $booking->booking_id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you
                                                            want to delete this booking?</h3>
                                                        <form
                                                            action="{{ route('admin.bookings.destroy', $booking->booking_id) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                Yes, I'm sure
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="deleteModal-{{ $booking->booking_id }}"
                                                            type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                            cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>