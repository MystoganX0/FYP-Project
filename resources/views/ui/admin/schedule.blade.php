<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molek Driving Academy - Schedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
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

    <div class="p-4 sm:ml-72 transition-all duration-300" x-data="{ activeTab: 'all' }">
        <div class="p-2 mt-4">
            <!-- Header -->
            <div
                class="relative bg-gradient-to-br from-[#0E1F8E] to-[#050C42] rounded-3xl p-8 mb-10 shadow-xl overflow-hidden">
                <!-- Decorative Elements -->
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="relative flex flex-col md:flex-row justify-between items-center gap-6 z-10">
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">
                            Schedule Management
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Manage driving schedules and slots.
                            <span
                                class="inline-flex items-center rounded-md bg-white/10 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-white/20 backdrop-blur-sm">Admin</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="button" onclick="openAddModal()"
                            class="group relative inline-flex items-center justify-center px-6 py-2.5 font-bold text-blue-900 transition-all duration-200 bg-white border border-transparent rounded-xl hover:bg-blue-50 hover:shadow-lg hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white shadow-md shadow-blue-900/20">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Schedule
                        </button>
                        <!-- Date Toggle (Glass on Gradient) -->
                        <div
                            class="hidden md:flex bg-white/10 backdrop-blur-md border border-white/20 p-1 rounded-xl items-center text-sm font-medium text-white/90 shadow-sm">
                            <div
                                class="bg-white/20 text-white px-4 py-1.5 rounded-lg border border-white/10 cursor-default shadow-sm font-semibold">
                                {{ date('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div x-data="{ show: true, progress: 0 }"
                    x-init="setTimeout(() => show = false, 5000); let interval = setInterval(() => { progress += 2; if (progress >= 100) clearInterval(interval); }, 100)"
                    x-show="show" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-6 bg-emerald-500 border border-emerald-600 rounded-2xl p-6 flex items-start gap-4 shadow-lg shadow-emerald-500/20 relative overflow-hidden"
                    role="alert">
                    <div class="p-3 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg mb-1">Success</h4>
                        <p class="text-emerald-50 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" type="button"
                        class="flex-shrink-0 inline-flex items-center justify-center w-8 h-8 text-emerald-100 hover:text-white rounded-lg hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Progress Bar -->
                    <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-b-2xl transition-all duration-100"
                        :style="`width: ${progress}%`"></div>
                </div>
            @endif

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Computer Card -->
                <a href="javascript:void(0)" @click="activeTab = activeTab === 'computer' ? 'all' : 'computer'"
                    :class="{ 'ring-2 ring-blue-500 ring-offset-2': activeTab === 'computer' }"
                    class="group relative overflow-hidden bg-white rounded-3xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300 border border-gray-100/50 flex flex-col items-center justify-center text-center">

                    <div class="mb-4 relative">
                        <!-- Number as Icon -->
                        <div
                            class="w-20 h-20 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-3xl font-bold transition-all duration-300 shadow-sm group-hover:scale-110">
                            {{ $computerSchedules->count() }}
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Computer
                            Theory</h3>
                        <div class="flex items-center justify-center gap-2 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            <span class="text-sm font-medium text-gray-500">Schedules</span>
                        </div>
                    </div>
                </a>

                <!-- Practical Card -->
                <a href="javascript:void(0)" @click="activeTab = activeTab === 'practical' ? 'all' : 'practical'"
                    :class="{ 'ring-2 ring-green-500 ring-offset-2': activeTab === 'practical' }"
                    class="group relative overflow-hidden bg-white rounded-3xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300 border border-gray-100/50 flex flex-col items-center justify-center text-center">

                    <div class="mb-4 relative">
                        <!-- Number as Icon -->
                        <div
                            class="w-20 h-20 bg-green-600 text-white rounded-2xl flex items-center justify-center text-3xl font-bold transition-all duration-300 shadow-sm group-hover:scale-110">
                            {{ $practicalSchedules->count() }}
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-green-600 transition-colors">
                            Practical Training</h3>
                        <div class="flex items-center justify-center gap-2 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            <span class="text-sm font-medium text-gray-500">Schedules</span>
                        </div>
                    </div>
                </a>

                <!-- JPJ Card -->
                <a href="javascript:void(0)" @click="activeTab = activeTab === 'jpj' ? 'all' : 'jpj'"
                    :class="{ 'ring-2 ring-red-500 ring-offset-2': activeTab === 'jpj' }"
                    class="group relative overflow-hidden bg-white rounded-3xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300 border border-gray-100/50 flex flex-col items-center justify-center text-center">

                    <div class="mb-4 relative">
                        <!-- Number as Icon -->
                        <div
                            class="w-20 h-20 bg-red-600 text-white rounded-2xl flex items-center justify-center text-3xl font-bold transition-all duration-300 shadow-sm group-hover:scale-110">
                            {{ $jpjSchedules->count() }}
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors">JPJ Test
                        </h3>
                        <div class="flex items-center justify-center gap-2 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            <span class="text-sm font-medium text-gray-500">Schedules</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Computer Theory Section -->
            <div id="computer-section" x-show="activeTab === 'all' || activeTab === 'computer'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Computer Theory</h3>
                        <span
                            class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $computerSchedules->count() }}
                            Schedules</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchComputer" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnComputer" data-dropdown-toggle="sortDropdownComputer"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownComputer"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnComputer">
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('date', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Newest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('date', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Oldest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('slots', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Most Slots</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead>
                            <tr class="text-gray-400 text-sm">
                                <th class="pb-2 pl-4 font-medium w-32">Date</th>
                                <th class="pb-2 font-medium w-32 text-center">Time</th>
                                <th class="pb-2 font-medium w-32 text-center">Day</th>
                                <th class="pb-2 font-medium w-40 text-center">Phase Name</th>
                                <th class="pb-2 font-medium w-32 text-center">Slot Limit</th>
                                <th class="pb-2 font-medium w-32 text-center">Duration</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="computerBody" class="text-sm transition-all duration-300 ease-in-out">
                            @foreach($computerSchedules as $schedule)
                                @include('ui.admin.schedule_row', ['schedule' => $schedule])
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="computerPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>

            <!-- Practical Training Section -->
            <div id="practical-section" x-show="activeTab === 'all' || activeTab === 'practical'"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Practical Training</h3>
                        <span
                            class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $practicalSchedules->count() }}
                            Schedules</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchPractical" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnPractical" data-dropdown-toggle="sortDropdownPractical"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownPractical"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnPractical">
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('date', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Newest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('date', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Oldest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('slots', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Most Slots</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead>
                            <tr class="text-gray-400 text-sm">
                                <th class="pb-2 pl-4 font-medium w-32">Date</th>
                                <th class="pb-2 font-medium w-32 text-center">Time</th>
                                <th class="pb-2 font-medium w-32 text-center">Day</th>
                                <th class="pb-2 font-medium w-40 text-center">Phase Name</th>
                                <th class="pb-2 font-medium w-32 text-center">Slot Limit</th>
                                <th class="pb-2 font-medium w-32 text-center">Duration</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="practicalBody" class="text-sm transition-all duration-300 ease-in-out">
                            @foreach($practicalSchedules as $schedule)
                                @include('ui.admin.schedule_row', ['schedule' => $schedule])
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="practicalPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>

            <!-- JPJ Test Section -->
            <div id="jpj-section" x-show="activeTab === 'all' || activeTab === 'jpj'"
                x-transition:enter="transition ease-out duration-500 delay-200"
                x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-red-50 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">JPJ Test</h3>
                        <span
                            class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $jpjSchedules->count() }}
                            Schedules</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchJPJ" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnJPJ" data-dropdown-toggle="sortDropdownJPJ"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownJPJ"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnJPJ">
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('date', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Newest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('date', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Oldest First</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('slots', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-50">Most Slots</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead>
                            <tr class="text-gray-400 text-sm">
                                <th class="pb-2 pl-4 font-medium w-32">Date</th>
                                <th class="pb-2 font-medium w-32 text-center">Time</th>
                                <th class="pb-2 font-medium w-32 text-center">Day</th>
                                <th class="pb-2 font-medium w-40 text-center">Phase Name</th>
                                <th class="pb-2 font-medium w-32 text-center">Slot Limit</th>
                                <th class="pb-2 font-medium w-32 text-center">Duration</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="jpjBody" class="text-sm transition-all duration-300 ease-in-out">
                            @foreach($jpjSchedules as $schedule)
                                @include('ui.admin.schedule_row', ['schedule' => $schedule])
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="jpjPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>
        </div>
    </div>

    <!-- Add Schedule Modal -->
    <div id="addModal" class="fixed inset-0 z-[70] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeAddModal()"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeAddModal()">
                <div id="addModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-lg scale-95 duration-300 ring-1 ring-black/5">
                    <form id="addScheduleForm" action="{{ route('admin.schedule.store') }}" method="POST">
                        @csrf
                        <!-- Header -->
                        <div
                            class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600">
                            <h3 class="text-lg font-bold text-white">Add Schedule</h3>
                            <button type="button" onclick="closeAddModal()"
                                class="text-white/80 hover:text-white transition-colors p-2 rounded-lg hover:bg-white/10">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <!-- Body -->
                        <div class="px-6 py-6 space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                                    <input type="date" name="date" id="add-date" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Day</label>
                                    <select name="day" id="add-day" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 pointer-events-none bg-gray-50">
                                        <option value="" disabled selected>Select Date First</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Start Time</label>
                                    <input type="time" name="start_time" id="add-start-time" value="09:00" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">End Time</label>
                                    <input type="time" name="time_out" id="add-time-out" value="11:00" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phase</label>
                                <select name="phase_id" id="add-phase-id" required
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                    <option value="" disabled selected>Select Phase</option>
                                    <option value="1">Computer Theory</option>
                                    <option value="2">Practical Training</option>
                                    <option value="3">JPJ Test</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Slot Limit</label>
                                    <input type="number" name="slot" id="add-slot" min="1" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 bg-gray-50"
                                        readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Duration</label>
                                    <input type="number" step="0.5" name="duration" id="add-duration" value="2"
                                        placeholder="e.g. 2" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                            <button type="button" onclick="resetAddForm()"
                                class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-200 transition-colors mr-auto">Reset</button>
                            <button type="button" onclick="closeAddModal()"
                                class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">Cancel</button>
                            <button type="submit"
                                class="rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all active:scale-95">Add
                                Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Schedule Modal -->
    <div id="editModal" class="fixed inset-0 z-[70] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeEditModal()"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeEditModal()">
                <div id="editModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-lg scale-95 duration-300 ring-1 ring-black/5">
                    <form action="{{ route('admin.schedule.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="schedule_id" id="edit-schedule-id">
                        <!-- Header -->
                        <div
                            class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600">
                            <h3 class="text-lg font-bold text-white">Edit Schedule</h3>
                            <button type="button" onclick="closeEditModal()"
                                class="text-white/80 hover:text-white transition-colors p-2 rounded-lg hover:bg-white/10">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <!-- Body -->
                        <div class="px-6 py-6 space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                                    <input type="date" name="date" id="edit-date" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Day</label>
                                    <select name="day" id="edit-day" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Start Time</label>
                                    <input type="time" name="start_time" id="edit-start-time" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">End Time</label>
                                    <input type="time" name="time_out" id="edit-time-out" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phase</label>
                                <select name="phase_id" id="edit-phase-id" required
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                    <option value="1">Computer Theory</option>
                                    <option value="2">Practical Training</option>
                                    <option value="3">JPJ Test</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Slot Limit</label>
                                    <input type="number" name="slot" id="edit-slot" min="1" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Duration</label>
                                    <input type="text" name="duration" id="edit-duration" required
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                            <button type="button" onclick="closeEditModal()"
                                class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">Cancel</button>
                            <button type="submit"
                                class="rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all active:scale-95">Update
                                Schedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-[70] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()">
        </div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeDeleteModal()">
                <div id="deleteModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-md scale-95 duration-300 ring-1 ring-black/5">
                    <!-- Header -->
                    <div
                        class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-red-500 to-red-600">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white">Delete Schedule</h3>
                        </div>
                        <button type="button" onclick="closeDeleteModal()"
                            class="text-white/80 hover:text-white transition-colors p-2 rounded-lg hover:bg-white/10"><svg
                                class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg></button>
                    </div>
                    <div class="px-6 py-6 text-center">
                        <p class="text-gray-600">Are you sure you want to delete this schedule? <br><span
                                class="font-semibold text-gray-900">This action cannot be undone.</span></p>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                        <button type="button" onclick="closeDeleteModal()"
                            class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">Cancel</button>
                        <form action="{{ route('admin.schedule.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="schedule_id" id="delete-schedule-id">
                            <button type="submit"
                                class="rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 transition-all active:scale-95">Delete
                                Schedule</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        class TablePagination {
            constructor(tableBodyId, paginationId, itemsPerPage = 5) {
                this.tableBody = document.getElementById(tableBodyId);
                this.paginationContainer = document.getElementById(paginationId);
                this.itemsPerPage = itemsPerPage;
                this.currentPage = 1;
                this.rows = Array.from(this.tableBody.querySelectorAll('tr'));
                this.visibleRows = [...this.rows];
                this.totalPages = Math.ceil(this.visibleRows.length / this.itemsPerPage);

                this.init();
            }

            init() {
                if (this.rows.length === 0) {
                    this.paginationContainer.innerHTML = '';
                    this.tableBody.innerHTML = '<tr><td colspan="7" class="px-6 py-8 text-center text-gray-500 italic">No schedules found in this category.</td></tr>';
                    return;
                }

                this.renderControls();
                this.showPage(1, false);
            }

            renderControls() {
                this.paginationContainer.innerHTML = `
                    <div class="pagination-controls w-full px-0 flex flex-col sm:flex-row justify-end items-center gap-4">
                        <span class="page-indicator text-sm font-medium text-gray-400 font-poppins order-2 sm:order-1">
                            Page <span class="current-page-user font-bold text-black">1</span> of <span class="total-pages-user font-bold text-black">1</span>
                        </span>

                        <div class="flex gap-2 order-1 sm:order-2">
                            <button class="prev-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                                Previous
                            </button>
                            <button class="next-btn flex items-center justify-center px-4 py-2 text-sm font-bold text-black bg-blue-100 border border-gray-700 rounded-xl hover:bg-blue-200 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-500 transition-all disabled:opacity-40 disabled:cursor-not-allowed shadow-md">
                                Next
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                `;

                this.prevBtn = this.paginationContainer.querySelector('.prev-btn');
                this.nextBtn = this.paginationContainer.querySelector('.next-btn');
                this.pageInfoSpan = this.paginationContainer.querySelector('.current-page-user');
                this.totalInfoSpan = this.paginationContainer.querySelector('.total-pages-user');

                this.prevBtn.addEventListener('click', () => this.prev());
                this.nextBtn.addEventListener('click', () => this.next());
            }

            showPage(page, animate = true) {
                if (page < 1 || page > this.totalPages) return;
                this.currentPage = page;

                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;

                if (animate) {
                    this.tableBody.style.opacity = '0';
                    this.tableBody.style.transform = 'translateY(5px)';

                    setTimeout(() => {
                        this.rows.forEach(row => row.style.display = 'none');
                        this.visibleRows.slice(start, end).forEach(row => row.style.display = '');

                        requestAnimationFrame(() => {
                            this.tableBody.style.opacity = '1';
                            this.tableBody.style.transform = 'translateY(0)';
                        });
                    }, 300);
                } else {
                    this.rows.forEach(row => row.style.display = 'none');
                    this.visibleRows.slice(start, end).forEach(row => row.style.display = '');
                }

                this.updateUI();
            }

            updateUI() {
                if (this.pageInfoSpan) this.pageInfoSpan.textContent = this.currentPage;
                if (this.totalInfoSpan) this.totalInfoSpan.textContent = this.totalPages;

                if (this.prevBtn) this.prevBtn.disabled = this.currentPage === 1;
                if (this.nextBtn) this.nextBtn.disabled = this.currentPage === this.totalPages || this.totalPages === 0;

                if (this.totalPages <= 1) {
                    this.paginationContainer.classList.add('hidden');
                } else {
                    this.paginationContainer.classList.remove('hidden');
                }
            }

            prev() {
                if (this.currentPage > 1) this.showPage(this.currentPage - 1);
            }

            next() {
                if (this.currentPage < this.totalPages) this.showPage(this.currentPage + 1);
            }

            filter(query) {
                const lowerQuery = query.toLowerCase();

                this.visibleRows = this.rows.filter(row => {
                    const date = row.querySelector('td:nth-child(1)')?.textContent.toLowerCase() || '';
                    const time = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const day = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                    const phase = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';
                    return date.includes(lowerQuery) || time.includes(lowerQuery) || day.includes(lowerQuery) || phase.includes(lowerQuery);
                });

                this.totalPages = Math.ceil(this.visibleRows.length / this.itemsPerPage);
                this.currentPage = 1;
                this.showPage(1, false);
            }

            sort(type, order) {
                this.visibleRows.sort((a, b) => {
                    let valA, valB;
                    if (type === 'slots') {
                        // Slot Limit is column 5. Format might be "10" or "10 slots" or similar.
                        // Based on usage it seems to be inside a span or direct text.
                        valA = parseInt(a.querySelector('td:nth-child(5)')?.textContent.trim()) || 0;
                        valB = parseInt(b.querySelector('td:nth-child(5)')?.textContent.trim()) || 0;
                    } else if (type === 'date') {
                        // Date is column 1. Format: DD MMM YYYY
                        const dateTextA = a.querySelector('td:nth-child(1)').textContent.trim();
                        const dateTextB = b.querySelector('td:nth-child(1)').textContent.trim();
                        valA = Date.parse(dateTextA) || 0;
                        valB = Date.parse(dateTextB) || 0;
                    }

                    if (valA < valB) return order === 'asc' ? -1 : 1;
                    if (valA > valB) return order === 'asc' ? 1 : -1;
                    return 0;
                });

                this.showPage(1, true);

                const prefix = this.tableBody.id.replace('Body', '');
                const capitalizedPrefix = prefix.charAt(0).toUpperCase() + prefix.slice(1);
                const dropdown = document.getElementById('sortDropdown' + capitalizedPrefix);
                if (dropdown) dropdown.classList.add('hidden');
            }
        }

        // Modal Functions
        const addModal = document.getElementById('addModal');
        const addModalPanel = document.getElementById('addModalPanel');
        const editModal = document.getElementById('editModal');
        const editModalPanel = document.getElementById('editModalPanel');
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalPanel = document.getElementById('deleteModalPanel');

        function openAddModal() {
            addModal.classList.remove('hidden');
            setTimeout(() => {
                addModal.classList.remove('opacity-0');
                addModalPanel.classList.remove('scale-95');
                addModalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeAddModal() {
            addModal.classList.add('opacity-0');
            addModalPanel.classList.remove('scale-100');
            addModalPanel.classList.add('scale-95');
            setTimeout(() => {
                addModal.classList.add('hidden');
            }, 300);
        }

        function openEditModal(schedule) {
            document.getElementById('edit-schedule-id').value = schedule.schedule_id;
            document.getElementById('edit-date').value = schedule.date;
            document.getElementById('edit-day').value = schedule.day;
            // Parse time format safely (assuming e.g., '10:00:00' or '10:00')
            document.getElementById('edit-start-time').value = schedule.start_time ? schedule.start_time.substring(0, 5) : '';
            document.getElementById('edit-time-out').value = schedule.time_out ? schedule.time_out.substring(0, 5) : '';
            document.getElementById('edit-phase-id').value = schedule.phase_id;
            document.getElementById('edit-slot').value = schedule.slot;
            document.getElementById('edit-duration').value = schedule.duration;

            editModal.classList.remove('hidden');
            setTimeout(() => {
                editModal.classList.remove('opacity-0');
                editModalPanel.classList.remove('scale-95');
                editModalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeEditModal() {
            editModal.classList.add('opacity-0');
            editModalPanel.classList.remove('scale-100');
            editModalPanel.classList.add('scale-95');
            setTimeout(() => {
                editModal.classList.add('hidden');
            }, 300);
        }

        function openDeleteModal(id) {
            document.getElementById('delete-schedule-id').value = id;
            deleteModal.classList.remove('hidden');
            setTimeout(() => {
                deleteModal.classList.remove('opacity-0');
                deleteModalPanel.classList.remove('scale-95');
                deleteModalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeDeleteModal() {
            deleteModal.classList.add('opacity-0');
            deleteModalPanel.classList.remove('scale-100');
            deleteModalPanel.classList.add('scale-95');
            setTimeout(() => {
                deleteModal.classList.add('hidden');
            }, 300);
        }

        const addDateInput = document.getElementById('add-date');
        const addDaySelect = document.getElementById('add-day');
        const addPhaseSelect = document.getElementById('add-phase-id');
        const addSlotInput = document.getElementById('add-slot');

        if (addDateInput && addDaySelect) {
            addDateInput.addEventListener('change', function () {
                if (!this.value) return;
                const parts = this.value.split('-');
                const year = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const day = parseInt(parts[2], 10);
                const date = new Date(year, month, day);

                if (!isNaN(date.getTime())) {
                    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    const dayName = days[date.getDay()];
                    addDaySelect.value = dayName;
                }
            });
        }

        if (addPhaseSelect && addSlotInput) {
            addPhaseSelect.addEventListener('change', function () {
                const phaseId = parseInt(this.value);
                if (phaseId === 1 || phaseId === 3) {
                    addSlotInput.value = 30;
                } else if (phaseId === 2) {
                    addSlotInput.value = 15;
                }
            });
        }

        const addStartTimeInput = document.getElementById('add-start-time');
        const addEndTimeInput = document.getElementById('add-time-out');
        const addDurationInput = document.getElementById('add-duration');

        function calculateDuration() {
            if (addStartTimeInput.value && addEndTimeInput.value) {
                const start = new Date("2000-01-01T" + addStartTimeInput.value);
                const end = new Date("2000-01-01T" + addEndTimeInput.value);

                let diff = end - start;
                if (diff < 0) {
                    // Handle overnight or invalid range? Assume invalid or ignore for now, or treat as next day? 
                    // Usually schedules are within day. If invalid, clear duration.
                    addDurationInput.value = "";
                    return;
                }

                const diffMinutes = Math.floor(diff / 60000);
                const hours = diffMinutes / 60;
                addDurationInput.value = Number.isInteger(hours) ? hours : hours.toFixed(1);
            }
        }

        if (addStartTimeInput && addEndTimeInput && addDurationInput) {
            addStartTimeInput.addEventListener('change', calculateDuration);
            addEndTimeInput.addEventListener('change', calculateDuration);
            // Make duration readonly since it's auto-calculated
            addDurationInput.setAttribute('readonly', true);
            addDurationInput.classList.add('bg-gray-50');
        }

        function resetAddForm() {
            document.getElementById('addScheduleForm').reset();
            // Reset to defaults
            if (addStartTimeInput) addStartTimeInput.value = '09:00';
            if (addEndTimeInput) addEndTimeInput.value = '11:00';
            if (addDurationInput) addDurationInput.value = '2';
            if (addSlotInput) addSlotInput.value = '';
            if (addDaySelect) addDaySelect.value = '';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const computerTable = new TablePagination('computerBody', 'computerPagination');
            const practicalTable = new TablePagination('practicalBody', 'practicalPagination');
            const jpjTable = new TablePagination('jpjBody', 'jpjPagination');

            window.computerTable = computerTable;
            window.practicalTable = practicalTable;
            window.jpjTable = jpjTable;

            const searchComputer = document.getElementById('searchComputer');
            if (searchComputer) searchComputer.addEventListener('keyup', (e) => computerTable.filter(e.target.value));

            const searchPractical = document.getElementById('searchPractical');
            if (searchPractical) searchPractical.addEventListener('keyup', (e) => practicalTable.filter(e.target.value));

            const searchJPJ = document.getElementById('searchJPJ');
            if (searchJPJ) searchJPJ.addEventListener('keyup', (e) => jpjTable.filter(e.target.value));
        });
    </script>
</body>

</html>