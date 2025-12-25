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
    @include('header')
    <!-- SUB NAV (tabs) -->
    <div class="bg-white border-b border-gray-200">
        <div
            class="px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">

            <!-- Navigation Links -->
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

                    <!-- Divider Arrow -->
                    <svg class="w-5 h-5 text-black hidden sm:block" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <!-- JPJ Test -->
                    <a href="{{ route('jpj') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('jpj') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('jpj') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        JPJ Test
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-32 py-6 md:py-14">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-6 lg:gap-x-20 items-start">
            <aside class="lg:col-span-4 flex flex-col">
                <div class="border-4 border-white rounded-3xl bg-[#151513] p-6 shadow-sm flex-1">
                    <div class="flex justify-between mb-3">
                        <div class="flex justify-center items-center mb-3 w-full">
                            <h5 class="text-2xl font-bold leading-none text-white text-center pe-2">
                                Your JPJ Test Slot
                            </h5>
                        </div>

                        <div>
                            <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                class="w-3.5 h-3.5 text-gray-400 hover:text-gray-200 cursor-pointer ms-1"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                            </svg>

                            <div data-popover id="chart-info" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-300 transition-opacity duration-300 bg-gray-900 border border-gray-700 rounded-lg shadow-xs opacity-0 w-72">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-white">Activity growth - Incremental</h3>
                                    <p>Report helps navigate cumulative growth of community activities. Ideally, the
                                        chart should have a growing trend, as stagnating chart signifies a significant
                                        decrease of community activity.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <!-- Indicator -->
                    <div class="flex flex-col" id="devices">
                        <div class="flex justify-center items-center text-center">
                            <span class="text-xl font-semibold text-gray-300">Total Slot:</span>
                            <span class="text-xl font-bold text-blue-500 ms-2">1</span>
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
                                    $statusColor = match ($booking->booking_status) {
                                        'Done' => 'green',
                                        'Pending' => 'gray',
                                        'Failed' => 'red',
                                        default => 'blue'
                                    };
                                    $iconColor = match ($booking->booking_status) {
                                        'Done' => 'text-green-600 bg-green-50 group-hover:bg-green-600',
                                        'Pending' => 'text-gray-600 bg-gray-50 group-hover:bg-gray-600',
                                        'Failed' => 'text-red-600 bg-red-50 group-hover:bg-red-600',
                                        default => 'text-blue-600 bg-blue-50 group-hover:bg-blue-600'
                                    };
                                @endphp

                                <div class="history-item group flex justify-between items-center p-4 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5"
                                    data-status="{{ $booking->booking_status }}">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-10 w-10 rounded-full flex items-center justify-center {{ $iconColor }} group-hover:text-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm text-gray-400 font-medium leading-none">Date</span>
                                            <span class="text-base font-bold text-gray-800 leading-tight mt-1">
                                                {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    <span
                                        class="inline-flex items-center gap-2 px-4 py-3 border-2 border-{{ $statusColor }}-{{ $booking->booking_status == 'Done' ? '800' : ($booking->booking_status == 'Failed' ? '700' : '700') }} rounded-full text-xs font-bold uppercase tracking-wider bg-{{ $statusColor }}-{{ $booking->booking_status == 'Done' ? '400' : ($booking->booking_status == 'Failed' ? '500' : '300') }} text-{{ $statusColor }}-{{ $booking->booking_status == 'Done' ? '800' : ($booking->booking_status == 'Failed' ? 'white' : '700') }}">
                                        {{ $booking->booking_status }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center text-gray-400 py-4">No history found.</div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </aside>

            <main class="lg:col-span-8 flex flex-col">
                <h1
                    class="text-xl sm:text-2xl font-bold mb-6 text-white text-center flex justify-center items-center gap-3">
                    <span>JPJ Slot</span>
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
                            <span class="font-medium">Note:</span> You currently have an active booking. You cannot book
                            another slot until your previous test is completed or failed.
                        </div>
                    </div>
                @endif

                <!-- Schedule Table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-3xl flex-1">

                    <div
                        class="bg-gray-900 px-6 sm:px-8 lg:px-12 py-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-gray-100">

                        <!-- Automate Button -->
                        <button
                            class="w-full sm:w-auto text-gray-900 bg-gradient-to-r from-yellow-400 to-amber-500 font-semibold focus:outline-none hover:from-yellow-300 hover:to-amber-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-2xl text-sm px-6 py-3 mr-auto sm:mr-0 transition-all shadow-lg shadow-yellow-400/30 hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <rect width="18" height="10" x="3" y="11" rx="2" />
                                <circle cx="12" cy="5" r="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v4M8 16h.01M16 16h.01" />
                            </svg>
                            Automate Slot
                        </button>

                        <!-- Search Group -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                            <div class="relative w-full sm:w-72">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <select id="month"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-[#0BCE83] focus:border-[#0BCE83] block w-full pl-10 pr-10 p-2.5 outline-none transition-all appearance-none cursor-pointer hover:bg-white hover:border-gray-400">
                                    <option value="all">All Months</option>
                                    @foreach($availableMonths as $month)
                                        <option value="{{ \Carbon\Carbon::parse($month)->format('n-Y') }}">{{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
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
                        class="hidden sm:block w-full text-sm text-gray-700 p-5 space-y-4 px-6 sm:px-8 lg:px-12">
                        <div
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
                                        <p class="text-sm text-gray-500">Computer Test</p>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="md:px-4 md:py-2 md:col-span-1">
                                    <p class="font-semibold text-base"
                                        data-date="{{ \Carbon\Carbon::parse($schedule->date)->format('n-Y') }}">
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
                                            data-type="{{ $schedule->schedule_type }}" data-id="{{ $schedule->schedule_id }}"
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

                    </div>

                    <!-- Pagination Controls -->
                    <div
                        class="pagination-controls px-6 sm:px-8 lg:px-12 pb-6 flex flex-col sm:flex-row justify-end items-center gap-4 hidden">
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

                    <!--  Mobile Cards -->
                    <div id="mobileCards" class="sm:hidden space-y-4 p-4">
                        @forelse($schedules as $schedule)
                            <div
                                class="bg-white p-4 rounded-lg shadow border flex flex-col gap-4 hover:border-blue-900 hover:border-[3px] transition">


                                <div class="flex items-center gap-4">
                                    <img src="/image/icon/logo.png" class="h-14 w-14" alt="MDA Logo" />
                                    <div>
                                        <p class="font-bold text-gray-800">Molek Driving Academy</p>
                                        <p class="text-sm text-gray-500">JPJ Test</p>
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
                                            class="inline-flex items-center justify-center px-4 py-2 rounded-full font-bold text-xs text-red-500 bg-red-50 border border-red-100 cursor-not-allowed uppercase tracking-wider">
                                            Booked
                                        </button>
                                    @elseif(isset($hasActiveBooking) && $hasActiveBooking)
                                        <button disabled
                                            class="inline-flex items-center justify-center px-4 py-2 rounded-full font-bold text-xs text-gray-500 bg-gray-100 border border-gray-200 cursor-not-allowed uppercase tracking-wider">
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
                                            data-type="{{ $schedule->schedule_type }}" data-id="{{ $schedule->schedule_id }}"
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
                                class="prev-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-300 bg-gray-800 border border-gray-700 rounded-xl hover:bg-gray-700 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Previous
                            </button>
                            <button
                                class="next-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-300 bg-gray-800 border border-gray-700 rounded-xl hover:bg-gray-700 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                Next
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
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

    @include('footer')

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
                <div class="bg-gray-50 rounded-xl p-4 mb-8 text-sm border border-gray-100">
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
                    <button type="submit"
                        class="w-full px-6 py-3.5 rounded-xl bg-gradient-to-r from-blue-700 to-blue-600 text-white font-bold hover:from-blue-800 hover:to-blue-700 shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40 hover:-translate-y-0.5 transition-all">
                        Confirm
                    </button>
                </form>
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

                <h3 class="text-2xl font-bold text-gray-900 mb-3">Payment Required</h3>

                <p class="text-gray-500 mb-8 leading-relaxed text-sm">
                    Complete your payment to unlock the next stage of your driving course. Secure and instant.
                </p>

                <button type="button"
                    class="close-payment-modal w-full text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 focus:ring-4 focus:ring-blue-300 font-bold rounded-2xl text-base px-5 py-4 text-center shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-0.5 transition-all duration-300">
                    Proceed to Payment
                </button>
            </div>
        </div>
    </div>

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

            // Attach open listeners
            // We use event delegation or re-attach if dynamic content,
            // but for now simple attach is fine as content is loaded on page load.
            // If filtering hides/shows them, listeners are still attached.
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
            confirmModal.addEventListener('click', (e) => {
                if (e.target === confirmModal) {
                    closeModal();
                }
            });
        });
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

                    if (selectedValue === "all" || rowDate === selectedValue) {
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

                    if (selectedValue === "all" || rowDate === selectedValue) {
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

                if (count === 0) {
                    if (!desktopMsg) {
                        desktopMsg = document.createElement("div");
                        desktopMsg.id = "desktopNoRecord";
                        desktopMsg.className = "text-center text-gray-500 py-4";
                        desktopMsg.innerText = "There are no records for this selection.";
                        desktopTableBody.appendChild(desktopMsg);
                    }
                    if (!mobileMsg) {
                        mobileMsg = document.createElement("div");
                        mobileMsg.id = "mobileNoRecord";
                        mobileMsg.className = "text-center text-gray-500 py-4";
                        mobileMsg.innerText = "There are no records for this selection.";
                        mobileCardsContainer.appendChild(mobileMsg);
                    }
                    desktopMsg.style.display = "";
                    mobileMsg.style.display = "";
                } else {
                    if (desktopMsg) desktopMsg.style.display = "none";
                    if (mobileMsg) mobileMsg.style.display = "none";
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
                $totalSlots = 1;
                $doneCount = $bookings->where('booking_status', 'Done')->count();
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