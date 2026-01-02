<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brandBlue: '#174aa6',
                        softBlue: '#1f6fd8'
                    }
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite-charts@1.0.0/dist/flowbite-charts.min.js"></script>

</head>

<body class="font-poppins bg-[#002D81]">
    @include('ui.user.header')
    <!-- SUB NAV (tabs) -->
    <div class="bg-white border-b border-gray-200">
        <div
            class="px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">

            <!-- Navigation Links -->
            @php
                $studentId = \Illuminate\Support\Facades\Auth::id();

                // Get Application to check payment type
                $application = \App\Models\Application::where('student_id', $studentId)
                    ->with('payment')
                    ->latest()
                    ->first();

                $paymentType = $application && $application->payment ? $application->payment->payment_type : null;
                $activeBookingsCount = $bookings->where('booking_status', '!=', 'Absent')->count();

                // Check completed practical slots
                $completedPracticalSlots = $bookings->whereIn('booking_status', ['Done', 'Completed'])->count();
                $isPracticalDone = $completedPracticalSlots >= 5;
            @endphp
            <nav class="flex-1 w-full md:w-auto">
                <div class="flex flex-wrap justify-center md:justify-start items-center gap-2 p-1">

                    <!-- Label -->
                    <span
                        class="font-medium text-base font-bold text-gray-400 uppercase tracking-widest mr-4 hidden md:block">
                        License Phases
                    </span>

                    <!-- Computer Test -->
                    <a href="{{ route('computer') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('computer') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('computer') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        Computer Test
                    </a>

                    <!-- Divider Arrow -->
                    <svg class="w-5 h-5 text-black hidden sm:block" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <!-- Practical Slot -->
                    <a href="{{ route('practical') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('practical') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('practical') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8h3c0 2.76 2.24 5 5 5s5-2.24 5-5h3c0 4.41-3.59 8-8 8z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v-5">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l4 4">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l-4 4">
                                </path>
                            </svg>
                        </div>
                        Practical Slot
                    </a>

            </nav>

            @if($isPracticalDone)
                @if($paymentType === 'full')
                    <a href="{{ route('jpj') }}"
                        class="flex items-center justify-center gap-2 px-5 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm sm:text-base font-medium rounded-2xl w-full md:w-auto shadow-sm hover:shadow-md transition-all active:scale-95 font-semibold">
                        <span>Next Phase</span>
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                @else
                    <button
                        class="open-payment-modal font-semibold flex items-center justify-center gap-2 px-5 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm sm:text-base font-medium rounded-2xl w-full md:w-auto shadow-sm hover:shadow-md transition-all active:scale-95">
                        <span>Next Phase</span>
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                @endif
            @else
                <button disabled title="Complete 5 Practical Training slots to unlock"
                    class="flex items-center justify-center gap-2 px-5 py-3 bg-gray-300 text-gray-500 cursor-not-allowed text-sm sm:text-base font-medium rounded-2xl w-full md:w-auto shadow-sm transition-all opacity-70">
                    <span>Next Phase</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </button>
            @endif

        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-32 py-6 md:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-6 lg:gap-x-20 items-start">
            <aside class="lg:col-span-4 flex flex-col">
                <div class="border-4 border-white rounded-3xl bg-gray-900 p-6 shadow-sm flex-1">
                    <div class="flex justify-between mb-3">
                        <div class="flex justify-center items-center mb-3 w-full">
                            <h5 class="text-2xl font-bold leading-none text-white text-center pe-2">
                                Practical Progress
                            </h5>
                        </div>
                    </div>

                    <!-- Indicator -->
                    <div class="flex flex-col" id="devices">
                        <div class="flex justify-center items-center text-center">
                            <span class="text-xl font-semibold text-gray-300">Total Slot:</span>
                            <span class="text-xl font-bold text-blue-500 ms-2">5</span>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="py-4" id="donut-chart"></div>

                    <div class="flex flex-col" id="devices">
                        <div class="flex items-center justify-center space-x-6 py-2">
                            <!-- Done -->
                            <div
                                class="flex items-center gap-3 bg-gray-800/50 px-4 py-2 rounded-full border border-gray-700">
                                <span
                                    class="w-3 h-3 rounded-full bg-yellow-400 shadow-[0_0_10px_rgba(250,204,21,0.5)]"></span>
                                <span class="text-sm font-medium text-gray-300">Done</span>
                            </div>

                            <!-- Remaining -->
                            <div
                                class="flex items-center gap-3 bg-gray-800/50 px-4 py-2 rounded-full border border-gray-700">
                                <span
                                    class="w-3 h-3 rounded-full bg-[#0E1F8E] shadow-[0_0_10px_rgba(14,31,142,0.5)]"></span>
                                <span class="text-sm font-medium text-gray-300">Remaining</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status booked -->
                    <div class="border-t border-white mt-4 pt-5 pb-6">
                        <div class="flex justify-center items-center gap-3 mb-6">
                            <h5 class="text-2xl font-bold text-white">History</h5>
                            <button id="historyDropdownButton" data-dropdown-toggle="historyDropdown"
                                class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-2 focus:ring-blue-500 font-medium rounded-lg text-sm px-3 py-1.5 inline-flex items-center">
                                Filter
                                <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="historyDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li><a href="#" data-filter="all"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">All</a></li>
                                    <li><a href="#" data-filter="Done"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Done</a></li>
                                    <li><a href="#" data-filter="Pending"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Pending</a></li>
                                    <li><a href="#" data-filter="Failed"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Failed</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- History List -->
                        <div id="historyList" class="space-y-4">
                            @forelse($bookings as $booking)
                                @php
                                    // Attendance / Logistics Status
                                    $statusColor = match ($booking->booking_status) {
                                        'Completed' => 'green',
                                        'Done' => 'green',
                                        'Pending' => 'yellow',
                                        'Failed' => 'red',
                                        'Confirmed' => 'blue',
                                        default => 'gray'
                                    };


                                @endphp

                                <div class="history-item group flex flex-col sm:flex-row justify-between sm:items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100"
                                    data-status="{{ $booking->booking_status }}">

                                    <!-- Left: Date & Info -->
                                    <div class="flex items-center gap-4 mb-4 sm:mb-0">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] text-gray-400 font-extrabold uppercase tracking-widest leading-none mb-1">Test
                                                Date</span>
                                            <span class="text-base font-bold text-gray-800 leading-none">
                                                {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Right: Statuses -->
                                    <div
                                        class="grid grid-cols-2 sm:flex sm:items-center gap-4 w-full sm:w-auto border-t sm:border-t-0 border-gray-100 pt-3 sm:pt-0 mt-2 sm:mt-0">

                                        <!-- Attendance Status -->
                                        <div class="flex flex-col items-start sm:items-end">
                                            <span
                                                class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Attendance</span>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold uppercase tracking-wider bg-{{ $statusColor }}-50 text-{{ $statusColor }}-700 border border-{{ $statusColor }}-100 whitespace-nowrap">
                                                <span class="w-1.5 h-1.5 rounded-full bg-{{ $statusColor }}-500"></span>
                                                {{ $booking->booking_status }}
                                            </span>
                                        </div>


                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-gray-500 font-medium">No booking history found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </aside>

            <main class="lg:col-span-8 flex flex-col">
                <h1
                    class="text-xl sm:text-2xl font-bold mb-6 text-white text-center flex justify-center items-center gap-3">
                    <span>Practical Training Slot</span>
                    <span class="w-0.5 h-6 bg-white/30 hidden sm:block"></span>
                    <span class="hidden sm:block">
                        {{ optional($application->class)->class_code ?? 'N/A' }} -
                        {{ optional($application->class)->class_name ?? 'N/A' }}
                    </span>
                    <span class="sm:hidden block">
                        - {{ optional($application->class)->class_code ?? 'N/A' }}
                    </span>
                </h1>

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Error!</span> {{ session('error') }}
                    </div>
                @endif

                @if(isset($hasActiveBooking) && $hasActiveBooking)
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Note:</span> You have reached the limit of 5 practical training slots.
                            You cannot book any more slots.
                        </div>
                    </div>
                @endif

                <!-- Schedule Table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-3xl flex-1">
                    <div
                        class="bg-gray-900 px-6 sm:px-8 lg:px-12 py-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-gray-100">

                        <!-- Automate Button with Dropdown -->
                        <div class="relative w-full sm:w-auto"
                            x-data="{ open: false, viewSettings: false, slotCount: 1 }">
                            <button @click="open = !open; viewSettings = false"
                                class="w-full sm:w-auto relative group overflow-hidden bg-gradient-to-br from-yellow-400 to-amber-500 hover:from-yellow-300 hover:to-amber-400 text-gray-900 font-bold rounded-2xl text-sm px-6 py-3 mr-auto sm:mr-0 transition-all duration-300 shadow-lg shadow-yellow-400/30 hover:shadow-yellow-400/50 hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:ring-4 focus:ring-yellow-300/50">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <rect width="18" height="10" x="3" y="11" rx="2" />
                                    <circle cx="12" cy="5" r="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7v4M8 16h.01M16 16h.01" />
                                </svg>
                                Automate Slot
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95" style="display: none;"
                                class="absolute top-full left-0 mt-2 w-full sm:w-72 origin-top-left z-50">
                                <div
                                    class="bg-white/70 backdrop-blur-md border border-white/10 rounded-2xl shadow-2xl overflow-hidden ring-1 ring-black/5 text-black/90">

                                    <!-- Main Menu -->
                                    <div x-show="!viewSettings" x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 -translate-x-10"
                                        x-transition:enter-end="opacity-100 translate-x-0">

                                        <div
                                            class="px-4 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                            Automation Options
                                        </div>

                                        <div class="divide-y divide-gray-200">
                                            <a href="#"
                                                @click.prevent="handleAutomation('next', slotCount); open = false"
                                                class="group flex items-center justify-between px-4 py-3 hover:bg-gray-100 transition-colors">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-medium">Auto-fill Next Available</span>
                                                    <span class="text-[10px] text-gray-600">Book next <span
                                                            x-text="slotCount"></span> slots</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-600 group-hover:text-gray-900" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </a>
                                            <a href="#"
                                                @click.prevent="handleAutomation('random', slotCount); open = false"
                                                class="group flex items-center justify-between px-4 py-3 hover:bg-gray-100 transition-colors">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-medium">Auto-fill Random Slot</span>
                                                    <span class="text-[10px] text-gray-600">Book random <span
                                                            x-text="slotCount"></span> slots</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-600 group-hover:text-gray-900" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="py-1 border-t border-gray-200">
                                            <button @click="viewSettings = true"
                                                class="w-full group flex items-center justify-between px-4 py-3 hover:bg-gray-100 transition-colors text-left">
                                                <span class="text-sm font-medium">View Settings</span>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-600"><span x-text="slotCount"></span>
                                                        Slots</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 text-gray-600 group-hover:text-gray-900"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Settings Menu -->
                                    <div x-show="viewSettings" x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 translate-x-10"
                                        x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">

                                        <div class="px-2 py-2 border-b border-gray-200 flex items-center">
                                            <button @click="viewSettings = false"
                                                class="p-1 rounded-full hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <span
                                                class="ml-2 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Settings
                                            </span>
                                        </div>

                                        <div class="p-4 space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-600 mb-2">Number of
                                                    Slots</label>
                                                <div
                                                    class="flex items-center justify-between bg-gray-50 rounded-lg p-2 border border-gray-200">
                                                    <button @click="if(slotCount > 1) slotCount--"
                                                        class="p-2 rounded-md hover:bg-gray-200 text-gray-700 hover:text-gray-900 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4" />
                                                        </svg>
                                                    </button>
                                                    <span class="font-bold text-lg w-8 text-center text-gray-900"
                                                        x-text="slotCount"></span>
                                                    <button @click="if(slotCount < 5) slotCount++"
                                                        class="p-2 rounded-md hover:bg-gray-200 text-gray-700 hover:text-gray-900 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <p class="text-[10px] text-gray-600 mt-2">Maximum 5 slots per session.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Search Group -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                            <div class="relative w-full sm:w-72" x-data="calendarFilter()" x-init="initCalendar()"
                                @click.away="open = false">

                                <!-- Hidden Native Input -->
                                <input type="hidden" id="month" value="all">

                                <!-- Trigger Button -->
                                <button @click="open = !open" type="button"
                                    class="relative w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-[#0BCE83] focus:border-[#0BCE83] block pl-10 pr-10 p-2.5 outline-none transition-all cursor-pointer hover:bg-white hover:border-gray-400 text-left flex items-center justify-between">

                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>

                                    <span x-text="displayText" class="truncate font-medium"></span>

                                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 transition-transform duration-200"
                                            :class="{'rotate-180': open}" aria-hidden="true" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </button>

                                <!-- Calendar Dropdown -->
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-50 w-full sm:w-80 mt-2 bg-white rounded-2xl shadow-xl border border-gray-100 p-4"
                                    style="display: none;">

                                    <!-- Header -->
                                    <div class="flex items-center justify-between mb-4">
                                        <button @click="prevMonth()"
                                            class="p-1 hover:bg-gray-100 rounded-full transition-colors text-gray-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="font-bold text-gray-800 text-lg"
                                            x-text="monthNames[month] + ' ' + year"></div>
                                        <button @click="nextMonth()"
                                            class="p-1 hover:bg-gray-100 rounded-full transition-colors text-gray-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Weekdays -->
                                    <div class="grid grid-cols-7 mb-2 text-center">
                                        <template x-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
                                            <div class="text-xs font-semibold text-gray-400 py-1" x-text="day"></div>
                                        </template>
                                    </div>

                                    <!-- Days Grid -->
                                    <div class="grid grid-cols-7 gap-1 text-center text-sm">
                                        <template x-for="blank in blanks">
                                            <div class="h-8"></div>
                                        </template>
                                        <template x-for="date in no_of_days">
                                            <div @click="selectDate(date)"
                                                class="h-8 w-8 mx-auto flex items-center justify-center rounded-full text-gray-700 font-medium transition-colors hover:bg-gray-100 cursor-pointer"
                                                :class="{
                                                     'bg-black text-white hover:bg-gray-800': isToday(date) && !isSelected(date),
                                                     'bg-blue-600 text-white hover:bg-blue-700 shadow-md': isSelected(date)
                                                 }">
                                                <span x-text="date"></span>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- Actions -->
                                    <div
                                        class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center px-1">
                                        <button @click="clearFilter()"
                                            class="text-xs text-gray-400 hover:text-gray-600 font-medium">
                                            Clear
                                        </button>
                                        <button @click="selectMonth()"
                                            class="text-sm text-blue-600 hover:text-blue-800 font-bold">
                                            Select This Month
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function calendarFilter() {
                                    return {
                                        open: false,
                                        displayText: 'All Months',
                                        month: new Date().getMonth(),
                                        year: new Date().getFullYear(),
                                        selectedDate: null,
                                        no_of_days: [],
                                        blanks: [],
                                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

                                        initCalendar() {
                                            const today = new Date();
                                            const day = String(today.getDate()).padStart(2, '0');
                                            const month = this.monthNames[today.getMonth()];
                                            const year = today.getFullYear();
                                            this.displayText = `${day} ${month} ${year}`;

                                            this.getNoOfDays();
                                        },

                                        isToday(date) {
                                            const today = new Date();
                                            return today.getDate() === date && today.getMonth() === this.month && today.getFullYear() === this.year;
                                        },

                                        isSelected(date) {
                                            if (!this.selectedDate) return false;
                                            const d = new Date(this.year, this.month, date);
                                            // Format Y-m-d
                                            const format = d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0');
                                            return this.selectedDate === format;
                                        },

                                        getNoOfDays() {
                                            const daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                                            const dayOfWeek = new Date(this.year, this.month).getDay(); // 0 (Sun) - 6 (Sat)

                                            this.blanks = Array.from({ length: dayOfWeek }, (_, i) => i + 1);
                                            this.no_of_days = Array.from({ length: daysInMonth }, (_, i) => i + 1);
                                        },

                                        selectDate(date) {
                                            // Set Selected Date (Y-m-d)
                                            const d = new Date(this.year, this.month, date);
                                            const year = d.getFullYear();
                                            const month = String(d.getMonth() + 1).padStart(2, '0');
                                            const day = String(d.getDate()).padStart(2, '0');
                                            const formatted = `${year}-${month}-${day}`;

                                            this.selectedDate = formatted;

                                            // Update Display Text
                                            this.displayText = `${day} ${this.monthNames[this.month]} ${year}`;

                                            // Update Hidden Input
                                            document.getElementById('month').value = formatted;
                                            this.open = false;
                                        },

                                        selectMonth() {
                                            // Set Selected Month (Y-m)
                                            const month = String(this.month + 1).padStart(2, '0');
                                            const formatted = `${this.year}-${month}`;

                                            this.selectedDate = formatted;
                                            this.displayText = this.monthNames[this.month] + ' ' + this.year;
                                            document.getElementById('month').value = formatted;
                                            this.open = false;
                                        },

                                        selectMonth() {
                                            // Set Selected Month (Y-m)
                                            const month = String(this.month + 1).padStart(2, '0');
                                            const formatted = `${this.year}-${month}`;

                                            this.selectedDate = formatted;
                                            this.displayText = this.monthNames[this.month] + ' ' + this.year;
                                            document.getElementById('month').value = formatted;
                                            this.open = false;
                                        },

                                        nextMonth() {
                                            if (this.month === 11) {
                                                this.month = 0;
                                                this.year++;
                                            } else {
                                                this.month++;
                                            }
                                            this.getNoOfDays();
                                        },

                                        prevMonth() {
                                            if (this.month === 0) {
                                                this.month = 11;
                                                this.year--;
                                            } else {
                                                this.month--;
                                            }
                                            this.getNoOfDays();
                                        },

                                        clearFilter() {
                                            this.displayText = 'All Months';
                                            this.selectedDate = null;
                                            document.getElementById('month').value = 'all';
                                            this.open = false;
                                        }
                                    }
                                }
                            </script>
                            <button id="searchBtn"
                                class="w-full sm:w-auto text-white bg-gradient-to-r from-[#0E1F8E] to-blue-800 hover:from-indigo-900 hover:to-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-7 py-3 text-center inline-flex items-center justify-center gap-2 transition-all shadow-lg shadow-blue-900/30 hover:shadow-blue-900/50 hover:-translate-y-0.5 active:scale-95">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div id="desktopTable"
                        class="hidden sm:block w-full text-sm text-gray-700 p-5 space-y-4 px-6 sm:px-8 lg:px-12 min-h-[500px]">
                        <div id="desktopTableHeader"
                            class="hidden md:grid md:grid-cols-7 bg-white rounded-lg px-4 py-2 text-sm font-semibold text-gray-500 uppercase tracking-wider text-center">
                            <div class="md:col-span-2 text-left md:px-4"></div>
                            <div class="md:col-span-1 md:px-4">Date</div>
                            <div class="md:col-span-1 md:px-4">Start Time</div>
                            <div class="md:col-span-1 md:px-4">Time Out</div>
                            <div class="md:col-span-1 md:px-4">Duration</div>
                            <div class="md:col-span-1 md:px-4">Slots</div>
                        </div>

                        @forelse($schedules as $schedule)
                            <div
                                class="bg-white border rounded-lg shadow p-4 px-4 md:grid md:grid-cols-7 md:items-center md:text-center hover:border-blue-900 hover:border-[3px]">
                                <!-- Academy -->
                                <div class="flex items-center gap-4 md:px-4 text-left md:col-span-2">
                                    <img src="/image/icon/logo.png" class="h-14" alt="MDA Logo" />
                                    <div>
                                        <p class="font-bold text-gray-800 text-base">Molek Driving Academy</p>
                                        <p class="text-sm text-gray-500">Practical Training Slot</p>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="md:px-4 md:py-2 md:col-span-1">
                                    <p class="font-semibold text-base" data-date="{{ $schedule->date }}">
                                        {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}
                                    </p>
                                    <p class="text-sm text-gray-500">{{ $schedule->day }}</p>
                                </div>

                                <!-- Time Start -->
                                <div class="md:px-4 md:py-2 md:col-span-1">
                                    <p class="font-semibold text-base">
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-500">Start</p>
                                </div>

                                <!-- Time End -->
                                <div class="md:px-4 md:py-2 md:col-span-1">
                                    <p class="font-semibold text-base">
                                        {{ \Carbon\Carbon::parse($schedule->time_out)->format('H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-500">End</p>
                                </div>

                                <!-- Duration -->
                                <div class="md:px-4 md:py-2 md:col-span-1">
                                    <p class="font-semibold text-base">{{ $schedule->duration }} hours</p>
                                    <p class="text-sm text-gray-500">Each Slot</p>
                                </div>

                                <!-- Slots -->
                                <div class="md:px-4 md:py-2 md:col-span-1 text-right">
                                    <p class="text-gray-600 text-sm mb-2">
                                        <span class="font-semibold">{{ $schedule->slot }} Slots</span> Available
                                    </p>
                                    @if(in_array($schedule->schedule_id, $bookedScheduleIds))
                                        <button disabled
                                            class="inline-flex items-center justify-center px-5 py-2.5 rounded-full font-bold text-sm text-red-500 bg-red-50 border border-red-100 cursor-not-allowed opacity-80 shadow-sm transition-all">
                                            <span class="mr-2">Booked</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    @elseif($activeBookingsCount >= 5)
                                        <button disabled
                                            class="inline-flex items-center justify-center px-5 py-2.5 rounded-full font-bold text-sm text-gray-500 bg-gray-100 border border-gray-200 cursor-not-allowed opacity-80 shadow-sm transition-all">
                                            <span class="mr-2">Book</span>
                                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    @elseif(isset($hasActiveBooking) && $hasActiveBooking)
                                        <button disabled
                                            class="inline-flex items-center justify-center px-5 py-2.5 rounded-full font-bold text-sm text-gray-500 bg-gray-100 border border-gray-200 cursor-not-allowed opacity-80 shadow-sm transition-all">
                                            <span class="mr-2">Book</span>
                                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    @else
                                        <button data-date="{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}"
                                            data-day="{{ $schedule->day }}"
                                            data-start="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}"
                                            data-end="{{ \Carbon\Carbon::parse($schedule->time_out)->format('H:i') }}"
                                            data-type="{{ $schedule->phase->phase_name }}"
                                            data-id="{{ $schedule->schedule_id }}"
                                            class="open-confirm-modal group relative inline-flex items-center justify-center px-6 py-2.5 overflow-hidden font-bold text-white transition-all duration-300 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full hover:from-blue-500 hover:to-indigo-500 focus:outline-none ring-offset-2 focus:ring-4 ring-blue-300 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transform">
                                            <span class="mr-2">Book</span>
                                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-8">
                                No schedules available specifically for 'Computer Test'.
                            </div>
                        @endforelse

                        <!-- Pagination Controls (Desktop) -->
                        <div
                            class="pagination-controls mt-4 flex flex-col sm:flex-row justify-end items-center gap-4 hidden">
                            <span
                                class="page-indicator text-sm font-medium text-gray-400 font-poppins order-2 sm:order-1">
                                Page <span class="current-page-user font-bold text-black">1</span> of <span
                                    class="total-pages-user font-bold text-black">1</span>
                            </span>

                            <div class="flex gap-2 order-1 sm:order-2">
                                <button
                                    class="prev-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Previous
                                </button>
                                <button
                                    class="next-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                    Next
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!--  Mobile Cards -->
                    <div id="mobileCards" class="sm:hidden space-y-4 p-4 min-h-[500px]">
                        @forelse($schedules as $schedule)
                            <div
                                class="bg-white p-4 rounded-lg shadow border flex flex-col gap-4 hover:border-blue-900 hover:border-[3px] transition">


                                <div class="flex items-center gap-4">
                                    <img src="/image/icon/logo.png" class="h-14 w-14" alt="MDA Logo" />
                                    <div>
                                        <p class="font-bold text-gray-800">Molek Driving Academy</p>
                                        <p class="text-sm text-gray-500">Computer Test</p>
                                    </div>
                                </div>


                                <div class="flex flex-col gap-2 text-sm">
                                    <div>
                                        <p class="text-gray-500 font-medium">Date</p>
                                        <p class="font-semibold"
                                            data-date="{{ \Carbon\Carbon::parse($schedule->date)->format('n-Y') }}">
                                            {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}
                                            ({{ $schedule->day }})
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-gray-500 font-medium">Time</p>
                                        <p class="font-semibold">
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} –
                                            {{ \Carbon\Carbon::parse($schedule->time_out)->format('H:i') }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-gray-500 font-medium">Duration</p>
                                        <p class="font-semibold">{{ $schedule->duration }} Hours (each slot)</p>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 text-sm">Slots: {{ $schedule->slot }}</span>
                                    @if(in_array($schedule->schedule_id, $bookedScheduleIds))
                                        <button disabled
                                            class="px-4 py-2 rounded-full font-bold text-xs text-red-500 bg-red-50 border border-red-100 cursor-not-allowed uppercase tracking-wider">
                                            Booked
                                        </button>
                                    @elseif($activeBookingsCount >= 5)
                                        <button disabled
                                            class="px-4 py-2 rounded-full font-bold text-xs text-gray-500 bg-gray-100 border border-gray-200 cursor-not-allowed uppercase tracking-wider">
                                            <span class="mr-2">Book</span>
                                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    @elseif(isset($hasActiveBooking) && $hasActiveBooking)
                                        <button disabled
                                            class="px-4 py-2 rounded-full font-bold text-xs text-gray-500 bg-gray-100 border border-gray-200 cursor-not-allowed uppercase tracking-wider">
                                            <span class="mr-2">Book</span>
                                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    @else
                                        <button data-date="{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}"
                                            data-day="{{ $schedule->day }}"
                                            data-start="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}"
                                            data-end="{{ \Carbon\Carbon::parse($schedule->time_out)->format('H:i') }}"
                                            data-type="{{ $schedule->phase->phase_name }}"
                                            data-id="{{ $schedule->schedule_id }}"
                                            class="open-confirm-modal inline-flex items-center justify-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold rounded-full shadow-md shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-0.5">
                                            Book
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-4">
                                No schedules available.
                            </div>
                        @endforelse

                    </div>

                    <!-- Pagination Controls (Mobile) -->
                    <div
                        class="pagination-controls mt-4 flex flex-col sm:flex-row justify-center items-center gap-4 hidden sm:hidden">
                        <span class="page-indicator text-sm font-medium text-gray-400 font-poppins order-2 sm:order-1">
                            Page <span class="current-page-user font-bold text-black">1</span> of <span
                                class="total-pages-user font-bold text-black">1</span>
                        </span>

                        <div class="flex gap-2 order-1 sm:order-2">
                            <button
                                class="prev-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Previous
                            </button>
                            <button
                                class="next-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                Next
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>

        </div>

        <!-- Notes -->
        <div class="mt-10 text-sm text-white">
            <p class="font-semibold">IMPORTANT NOTES*</p>
            <ul class="list-disc ml-5 mt-2 space-y-1">
                <li>Original MyKad must be carried at all times during your test.</li>
                <li>Dress Code Semi Formal with shoes.</li>
            </ul>
        </div>
        </main>
    </div>
    </div>

    @include('ui.user.footer')

    <!-- Popup Modal -->
    <div id="confirmModal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
        <div id="modalContent"
            class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full mx-4 transform scale-90 transition-transform duration-300 text-center relative">

            <!-- Close Button -->
            <button type="button"
                class="close-confirm-modal absolute top-5 right-5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full p-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Icon -->
            <div
                class="mx-auto w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 ring-8 ring-blue-50/50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
            </div>

            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Confirm Booking
                </h3>
                <p class="text-sm text-gray-500 mb-6 leading-relaxed px-4">
                    Are you sure you want to book this slot?
                </p>

                <!-- Slot Detail Card -->
                <div class="bg-gray-50 rounded-xl p-4 mb-8 text-sm border border-gray-100" id="singleSlotDetails">
                    <div class="grid grid-cols-2 gap-y-3 text-left">
                        <div class="text-gray-500">Phase</div>
                        <div class="font-semibold text-gray-900 text-right" id="modalType">-</div>

                        <div class="text-gray-500">Date</div>
                        <div class="font-semibold text-gray-900 text-right" id="modalDate">-</div>

                        <div class="text-gray-500">Day</div>
                        <div class="font-semibold text-gray-900 text-right" id="modalDay">-</div>

                        <div class="text-gray-500">Time</div>
                        <div class="font-semibold text-gray-900 text-right" id="modalTime">-</div>
                    </div>
                </div>

                <!-- Bulk Slot Details (Hidden by default) -->
                <div class="bg-gray-50 rounded-xl p-4 mb-8 text-sm border border-gray-100 hidden text-left"
                    id="bulkSlotDetails">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-bold text-gray-500 uppercase">Selected Slots</span>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">Automated
                            Selection</span>
                    </div>
                    <div class="space-y-2 max-h-48 overflow-y-auto pr-1 customize-scrollbar" id="bulkSlotList">
                        <!-- Populated by JS -->
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-4">
                <button
                    class="close-confirm-modal w-full px-6 py-3.5 rounded-xl bg-gray-50 text-gray-700 font-bold hover:bg-gray-100 hover:text-gray-900 transition-all border border-gray-200">
                    Cancel
                </button>
                <form method="POST" action="{{ route('booking.store') }}" class="w-full">
                    @csrf
                    <input type="hidden" name="schedule_id" id="modalScheduleId">
                    <input type="hidden" name="phase_type" id="modalPhaseTypeVal">

                    <!-- Bulk Inputs -->
                    <div id="bulkInputs"></div>

                    <button type="submit"
                        class="w-full px-6 py-3.5 rounded-xl bg-gradient-to-r from-blue-700 to-blue-600 text-white font-bold hover:from-blue-800 hover:to-blue-700 shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40 hover:-translate-y-0.5 transition-all">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-gray-900/60 backdrop-blur-md hidden opacity-0 transition-opacity duration-300">
        <div id="paymentModalContent"
            class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-md p-8 text-center transform scale-90 transition-transform duration-300 overflow-hidden">

            <!-- Decorative circle -->
            <div
                class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>

            <!-- Close Button -->
            <button type="button"
                class="close-payment-modal absolute top-4 right-4 text-gray-400 hover:text-gray-600 bg-transparent hover:bg-gray-50 rounded-full p-2 transition-colors z-10">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- Modal Content -->
            <div class="relative z-10 mt-2">
                <div
                    class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6 shadow-inner ring-4 ring-white">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                </div>

                @if(isset($stage3Payment) && $stage3Payment)
                    <div class="bg-gray-100 rounded-2xl p-6 mb-8 border border-gray-100">
                        <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Stage 3
                            Installment</span>
                        <div class="flex items-start justify-center text-gray-900 mb-1">
                            <span class="text-xl font-bold mr-1 mt-1">RM</span>
                            <span
                                class="text-5xl font-extrabold tracking-tight">{{ number_format($stage3Payment->amount, 2) }}</span>
                        </div>
                        <p class="text-gray-400 text-sm">Please clear this amount to proceed.</p>
                    </div>
                @else
                    <p class="text-gray-500 mb-8 leading-relaxed text-sm">
                        Complete your payment to unlock the next stage of your driving course. Secure and instant.
                    </p>
                @endif

                <a href="{{ route('payment', ['payment_id' => $application->payment->payment_id]) }}"
                    class="block w-full text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 focus:ring-4 focus:ring-blue-300 font-bold rounded-2xl text-base px-5 py-4 text-center shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-0.5 transition-all duration-300">
                    Proceed to Payment
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paymentModal = document.getElementById('paymentModal');
            const paymentModalContent = document.getElementById('paymentModalContent');
            const openBtns = document.querySelectorAll('.open-payment-modal');
            const closeBtns = document.querySelectorAll('.close-payment-modal');

            function openPaymentModal() {
                paymentModal.classList.remove('hidden');
                // Trigger reflow
                void paymentModal.offsetWidth;

                paymentModal.classList.remove('opacity-0');
                paymentModalContent.classList.remove('scale-90');
                paymentModalContent.classList.add('scale-100');
            }

            function closePaymentModal() {
                paymentModal.classList.add('opacity-0');
                paymentModalContent.classList.remove('scale-100');
                paymentModalContent.classList.add('scale-90');

                setTimeout(() => {
                    paymentModal.classList.add('hidden');
                }, 300);
            }

            openBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (!btn.disabled) {
                        openPaymentModal();
                    }
                });
            });

            closeBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    closePaymentModal();
                });
            });

            paymentModal.addEventListener('click', (e) => {
                if (e.target === paymentModal) {
                    closePaymentModal();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const confirmModal = document.getElementById('confirmModal');
            const modalContent = document.getElementById('modalContent');
            const openBtns = document.querySelectorAll('.open-confirm-modal');
            const closeBtns = document.querySelectorAll('[data-modal-hide="confirmModal"]');

            // Elements to populate
            const modalType = document.getElementById('modalType');
            const modalDate = document.getElementById('modalDate');
            const modalDay = document.getElementById('modalDay');
            const modalTime = document.getElementById('modalTime');


            function openModal(btn) {
                // Ensure Single View is active
                document.getElementById('singleSlotDetails').classList.remove('hidden');
                document.getElementById('bulkSlotDetails').classList.add('hidden');
                document.getElementById('bulkInputs').innerHTML = ''; // Clear bulk inputs

                // Get data from button
                const type = btn.getAttribute('data-type');
                const date = btn.getAttribute('data-date');
                const day = btn.getAttribute('data-day');
                const start = btn.getAttribute('data-start');
                const end = btn.getAttribute('data-end');

                // Set data to modal
                modalType.textContent = type;
                modalDate.textContent = date;
                modalDay.textContent = day;
                modalTime.textContent = `${start} - ${end}`;

                // Set hidden inputs
                document.getElementById('modalScheduleId').value = btn.getAttribute('data-id');
                document.getElementById('modalPhaseTypeVal').value = type;


                confirmModal.classList.remove('hidden');
                // Trigger reflow
                void confirmModal.offsetWidth;

                confirmModal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-90');
                modalContent.classList.add('scale-100');
            }

            function closeModal() {
                confirmModal.classList.add('opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-90');

                setTimeout(() => {
                    confirmModal.classList.add('hidden');
                }, 300);
            }

            openBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openModal(btn);
                });
            });

            // Attach close listeners
            const closeConfirmBtns = document.querySelectorAll('.close-confirm-modal');
            closeConfirmBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    closeModal();
                });
            });

            // Close on backdrop click
            // Close on backdrop click
            confirmModal.addEventListener('click', (e) => {
                if (e.target === confirmModal) {
                    closeModal();
                }
            });
        });
    </script>

    <!-- Automation Logic -->
    <script>
        // Data Injection from Blade
        window.schedulesData = @json($schedules);
        window.bookedScheduleIds = @json($bookedScheduleIds);
        window.activeBookingsCount = {{ $bookings->whereIn('booking_status', ['Pending', 'Confirmed'])->count() }};

        function handleAutomation(type, count) {
            // Check max active slots limit (5)
            if (window.activeBookingsCount >= 5) {
                alert("You have already reached the maximum limit of 5 active practical slots. Please complete your existing bookings before booking more.");
                return;
            }

            // Check if adding explicitly requested count exceeds limit
            if ((window.activeBookingsCount + count) > 5) {
                const remaining = 5 - window.activeBookingsCount;
                alert(`You can only book ${remaining} more slot(s) to reach the limit of 5. Please adjust your request.`);
                return;
            }

            // Filter available schedules
            // Must have > 0 slots AND not be in bookedScheduleIds
            let available = window.schedulesData.filter(s => {
                return s.slot > 0 && !window.bookedScheduleIds.includes(s.schedule_id);
            });

            if (available.length === 0) {
                alert("No available schedules found to automate.");
                return;
            }

            let selected = [];

            if (type === 'next') {
                // Sort by date and time
                available.sort((a, b) => {
                    const dateA = new Date(a.date + ' ' + a.start_time);
                    const dateB = new Date(b.date + ' ' + b.start_time);
                    return dateA - dateB;
                });
                selected = available.slice(0, count);
            } else if (type === 'random') {
                // Shuffle array
                for (let i = available.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [available[i], available[j]] = [available[j], available[i]];
                }
                selected = available.slice(0, count);
            }

            if (selected.length === 0) {
                alert("Could not select any slots.");
                return;
            }

            openBulkConfirmModal(selected, type);
        }

        function openBulkConfirmModal(selectedSchedules, type) {
            const confirmModal = document.getElementById('confirmModal');
            const modalContent = document.getElementById('modalContent');

            // Toggle UI sections
            document.getElementById('singleSlotDetails').classList.add('hidden');
            document.getElementById('bulkSlotDetails').classList.remove('hidden');

            // Populate List
            const listContainer = document.getElementById('bulkSlotList');
            listContainer.innerHTML = '';

            selectedSchedules.forEach(sched => {
                // Create list item
                const date = new Date(sched.date).toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' });
                const startTime = sched.start_time.substring(0, 5);
                const endTime = sched.time_out.substring(0, 5);

                const item = `
                    <div class="flex justify-between items-center p-3 bg-white rounded-lg border border-gray-100 shadow-sm">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-bold text-gray-500 uppercase">${sched.day}</span>
                            <span class="font-bold text-gray-900">${date}</span>
                        </div>
                        <div class="text-right">
                             <span class="block font-mono text-sm font-semibold text-blue-600">${startTime} - ${endTime}</span>
                        </div>
                    </div>
                `;
                listContainer.insertAdjacentHTML('beforeend', item);
            });

            // Populate Hidden Inputs
            const formContainer = document.getElementById('bulkInputs');
            formContainer.innerHTML = '';
            selectedSchedules.forEach(sched => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'schedule_ids[]';
                input.value = sched.schedule_id;
                formContainer.appendChild(input);
            });

            // Clear single input just in case
            document.getElementById('modalScheduleId').value = '';

            // Show Modal
            confirmModal.classList.remove('hidden');
            void confirmModal.offsetWidth;
            confirmModal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }
    </script>

    <!-- Filter Dates & Pagination Logic -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // --- State ---
            let currentPage = 1;
            const itemsPerPage = 4;

            // Get Elements
            const monthSelect = document.getElementById("month");
            const searchBtn = document.getElementById("searchBtn");

            // Sections
            const desktopTableBody = document.getElementById("desktopTable");
            const mobileCardsContainer = document.getElementById("mobileCards");

            // Row Selectors (GET ALL rows, excluding header)
            const allDesktopRows = Array.from(document.querySelectorAll("#desktopTable > div.hover\\:border-blue-900"));
            const allMobileRows = Array.from(document.querySelectorAll("#mobileCards > div.bg-white"));

            // Pagination Elements (Class-based selection)
            // Use querySelectorAll to get collections of elements
            const paginationControlsList = document.querySelectorAll('.pagination-controls');
            const prevBtns = document.querySelectorAll('.prev-btn');
            const nextBtns = document.querySelectorAll('.next-btn');
            const currentPageSpans = document.querySelectorAll('.current-page-user');
            const totalPagesSpans = document.querySelectorAll('.total-pages-user');

            // Mark all items as matching filter by default
            allDesktopRows.forEach(row => row.dataset.filterMatch = "true");
            allMobileRows.forEach(row => row.dataset.filterMatch = "true");
            updatePagination();

            // --- Search Button Listener ---
            searchBtn.addEventListener("click", function () {
                const selectedValue = monthSelect.value; // e.g., "9-2025" or "all"
                applyFilter(selectedValue);
            });


            // --- Core Functions ---

            function applyFilter(selectedValue) {
                // Desktop
                allDesktopRows.forEach(row => {
                    const dateElem = row.querySelector("div.md\\:col-span-1 p.font-semibold");
                    if (!dateElem) return;
                    const rowDate = dateElem.getAttribute('data-date');

                    if (selectedValue === "all" || rowDate === selectedValue || rowDate.startsWith(selectedValue)) {
                        row.dataset.filterMatch = "true";
                    } else {
                        row.dataset.filterMatch = "false";
                    }
                });

                // Mobile
                allMobileRows.forEach(row => {
                    const dateElem = row.querySelector("div:nth-child(2) div p.font-semibold");
                    if (!dateElem) return;
                    const rowDate = dateElem.getAttribute('data-date');

                    if (selectedValue === "all" || rowDate === selectedValue || rowDate.startsWith(selectedValue)) {
                        row.dataset.filterMatch = "true";
                    } else {
                        row.dataset.filterMatch = "false";
                    }
                });

                // Reset to page 1
                currentPage = 1;
                updatePagination();
            }

            function updatePagination() {
                // Determine active set depending on visibility (Desktop vs Mobile)
                // For simplicity, we calculate both, but display logic handles the 'hidden' View.
                // Or better: We can assume the counts match if the DOM is synced.

                // Let's filter matches
                const matchedDesktop = allDesktopRows.filter(r => r.dataset.filterMatch === "true");
                const matchedMobile = allMobileRows.filter(r => r.dataset.filterMatch === "true"); // Should be same count

                const totalItems = matchedDesktop.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

                // Clamp page
                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                // Update UI indicators (All instances)
                currentPageSpans.forEach(span => span.innerText = currentPage);
                totalPagesSpans.forEach(span => span.innerText = totalPages);

                // Show/Hide Controls (All instances)
                paginationControlsList.forEach(controls => {
                    if (totalItems > itemsPerPage) {
                        controls.classList.remove('hidden');
                    } else {
                        controls.classList.add('hidden');
                    }
                });

                // Update Button States (All instances)
                prevBtns.forEach(btn => btn.disabled = currentPage === 1);
                nextBtns.forEach(btn => btn.disabled = currentPage === totalPages);

                // Render Active Pages
                renderRows(allDesktopRows, matchedDesktop, currentPage);
                renderRows(allMobileRows, matchedMobile, currentPage);

                // Handle "No Records"
                handleNoRecords(totalItems);
            }

            function renderRows(allRows, matchedRows, page) {
                // index range (0-based)
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;

                // 1. Hide non-matched
                allRows.forEach(row => {
                    if (row.dataset.filterMatch !== "true") {
                        row.style.display = "none";
                    }
                });

                // 2. Show matched only if in range
                matchedRows.forEach((row, index) => {
                    if (index >= startIndex && index < endIndex) {
                        row.style.removeProperty('display');

                        // Optional: Add simple fade-in animation
                        row.style.opacity = '0';
                        row.style.transition = 'opacity 0.3s ease';
                        requestAnimationFrame(() => row.style.opacity = '1');
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            function handleNoRecords(count) {
                // Check if msg exists
                let desktopMsg = document.getElementById("desktopNoRecord");
                let mobileMsg = document.getElementById("mobileNoRecord");

                const desktopHeader = document.getElementById("desktopTableHeader");

                if (count === 0) {
                    if (!desktopMsg) {
                        desktopMsg = document.createElement("div");
                        desktopMsg.id = "desktopNoRecord";
                        desktopMsg.className = "text-center text-gray-500 py-4 flex flex-col items-center justify-center";
                        desktopMsg.innerHTML = `
                            <img src="/image/icon/norecord.png" alt="No Records" class="w-80 h-auto object-contain">
                            <p class="text-base font-semibold">There are no records for this selection.</p>
                        `;
                        desktopTableBody.appendChild(desktopMsg);
                    }
                    if (!mobileMsg) {
                        mobileMsg = document.createElement("div");
                        mobileMsg.id = "mobileNoRecord";
                        mobileMsg.className = "text-center text-gray-500 py-4 flex flex-col items-center justify-center";
                        mobileMsg.innerHTML = `
                            <img src="/image/icon/norecord.png" alt="No Records" class="w-48 h-auto object-contain">
                            <p class="text-base font-semibold">There are no records for this selection.</p>
                        `;
                        mobileCardsContainer.appendChild(mobileMsg);
                    }
                    desktopMsg.style.display = "";
                    mobileMsg.style.display = "";

                    // Hide Header
                    if (desktopHeader) {
                        desktopHeader.classList.remove('md:grid');
                        desktopHeader.style.display = 'none';
                    }

                } else {
                    if (desktopMsg) desktopMsg.style.display = "none";
                    if (mobileMsg) mobileMsg.style.display = "none";
                    // Show Header
                    if (desktopHeader) {
                        desktopHeader.classList.add('md:grid');
                        desktopHeader.style.display = '';
                    }
                }
            }

            // --- Button Listeners ---
            prevBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        updatePagination();
                    }
                });
            });

            nextBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Calculate max pages based on current match
                    const matchedDesktop = allDesktopRows.filter(r => r.dataset.filterMatch === "true");
                    const totalPages = Math.ceil(matchedDesktop.length / itemsPerPage) || 1;

                    if (currentPage < totalPages) {
                        currentPage++;
                        updatePagination();
                    }
                });
            });

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @php
                $totalSlots = 5;
                $doneCount = $bookings->whereIn('booking_status', ['Done', 'Completed'])->count();
                $remainingCount = max(0, $totalSlots - $doneCount);
            @endphp

            const options = {
                series: [{{ $doneCount }}, {{ $remainingCount }}],
                chart: {
                    type: 'donut',
                    height: 240,
                    fontFamily: 'Segoe UI, sans-serif',
                },

                labels: ['Done', 'Remaining'],
                colors: ['#FACC15', '#0E1F8E'],

                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                name: {
                                    show: false
                                },
                                value: {
                                    show: true,
                                    fontSize: '28px',
                                    fontWeight: 'bold',
                                    color: '#ffffff',
                                    offsetY: 10,
                                    formatter: () => ""
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    fontSize: '28px',
                                    fontWeight: 'bold',
                                    color: '#000000',
                                    formatter: function (w) {
                                        const series = w.globals.seriesTotals;
                                        const total = series.reduce((a, b) => a + b, 0);
                                        const percent = (series[0] / total) * 100;
                                        return percent.toFixed(0) + "%";
                                    }
                                }
                            }
                        }
                    }
                },

                dataLabels: {
                    enabled: false
                },

                stroke: {
                    show: false,
                    width: 0
                },

                legend: {
                    show: false
                },

                tooltip: {
                    enabled: true,
                    theme: 'dark',
                    style: {
                        fontSize: '14px',
                        color: '#000' // <-- FIX: Tooltip text is now black
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#donut-chart"), options);
            chart.render();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterOptions = document.querySelectorAll('.filter-option');
            const historyItems = document.querySelectorAll('.history-item');

            filterOptions.forEach(option => {
                option.addEventListener('click', function (e) {
                    e.preventDefault();
                    const filterValue = this.getAttribute('data-filter');

                    historyItems.forEach(item => {
                        const status = item.getAttribute('data-status');
                        if (filterValue === 'all' || status === filterValue) {
                            item.style.removeProperty('display');
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>