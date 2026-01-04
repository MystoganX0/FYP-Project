@foreach($bookings as $booking)
    <!-- Edit Modal -->
    <div id="editModal-{{ $booking->booking_id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-xl shadow-2xl ring-1 ring-black/5">
                <div class="flex items-center justify-between p-5 border-b border-gray-100 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-t-xl">
                    <h3 class="text-lg font-bold text-white">Update Booking</h3>
                    <button type="button"
                        class="text-white/80 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-white/20 transition-colors"
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
                    <div class="p-6 space-y-5 text-left">
                        <div>
                            <label class="block mb-1.5 text-xs font-bold text-gray-500 uppercase tracking-wide">Phase</label>
                            <input type="text" value="{{ $booking->schedule->phase->phase_name ?? 'N/A' }}" readonly
                                class="bg-gray-100 border border-gray-200 text-gray-500 text-sm rounded-xl block w-full p-2.5 cursor-not-allowed select-none">
                        </div>

                        <div>
                            <label
                                class="block mb-1.5 text-xs font-bold text-gray-500 uppercase tracking-wide">Attendance
                                Status</label>
                            <select name="booking_status"
                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition-shadow">
                                <option value="Pending" {{ $booking->booking_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Confirmed" {{ $booking->booking_status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="Completed" {{ $booking->booking_status == 'Completed' ? 'selected' : '' }}>Completed (Attended)</option>
                                <option value="Absent" {{ $booking->booking_status == 'Absent' ? 'selected' : '' }}>Absent</option>
                            </select>
                            <p class="mt-1.5 text-[10px] text-gray-400">Mark 'Completed' if
                                student showed up.</p>
                        </div>

                        @if($booking->attempt)
                            <div>
                                <label
                                    class="block mb-1.5 text-xs font-bold text-gray-500 uppercase tracking-wide">Academic
                                    Result</label>
                                <select name="result"
                                    class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition-shadow">
                                    <option value="Pending" {{ $booking->attempt->result == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Pass" {{ $booking->attempt->result == 'Pass' ? 'selected' : '' }}>Pass</option>
                                    <option value="Failed" {{ $booking->attempt->result == 'Failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                            </div>
                        @endif
                    </div>
                    <div
                        class="flex items-center justify-end p-6 pt-2 space-x-2 rounded-b">
                        <button data-modal-hide="editModal-{{ $booking->booking_id }}"
                            type="button"
                            class="text-gray-500 bg-white hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-100 rounded-xl border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 transition-colors">Cancel</button>
                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center shadow-sm hover:shadow-md transition-all">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal-{{ $booking->booking_id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50">
        
        <div class="fixed inset-0 z-10 w-full overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0"
                 onclick="if(event.target === this) document.querySelector('[data-modal-hide=\'deleteModal-{{ $booking->booking_id }}\']').click()">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-md w-full ring-1 ring-black/5">

                    <!-- Header -->
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-red-500 to-red-600">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white">Delete Booking</h3>
                        </div>
                        <button type="button" data-modal-hide="deleteModal-{{ $booking->booking_id }}"
                            class="text-white/80 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-2 -mr-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6">
                        <div class="text-center">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Are you sure you want to delete this booking?
                                <span class="block mt-2 text-gray-900 font-semibold">This action cannot be undone.</span>
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                        <button type="button" data-modal-hide="deleteModal-{{ $booking->booking_id }}"
                            class="inline-flex justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-all active:scale-95">
                            Cancel
                        </button>
                        
                        <form action="{{ route('admin.bookings.destroy', $booking->booking_id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 transition-all hover:shadow-md active:scale-95">
                                Delete Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
