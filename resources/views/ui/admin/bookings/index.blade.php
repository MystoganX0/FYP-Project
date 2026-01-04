<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

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
                            Bookings Management
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Manage student booking for computer test, practical slot, jpj test.
                            <span
                                class="inline-flex items-center rounded-md bg-white/10 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-white/20 backdrop-blur-sm">Admin</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Date Toggle (Glass on Gradient) -->
                        <div
                            class="hidden md:flex bg-white/10 backdrop-blur-md border border-white/20 p-1 rounded-xl items-center text-sm font-medium text-white/90 shadow-sm">
                            <div
                                class="bg-white/20 text-white px-4 py-1.5 rounded-lg border border-white/10 cursor-default shadow-sm font-semibold">
                                {{ date('d M Y') }}
                            </div>
                            <div class="px-4 py-1.5 cursor-default hover:bg-white/5 rounded-lg transition-colors">
                                Today
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            @endif

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Computer Card -->
                <a href="#computer-section" class="group relative overflow-hidden bg-white rounded-[2rem] p-6 shadow-sm border-2 border-blue-500 hover:shadow-md transition-all duration-300">
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Computer Theory</p>
                            <h3 class="text-3xl font-bold text-gray-900">{{ $computerBookings->count() }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Practical Card -->
                <a href="#practical-section" class="group relative overflow-hidden bg-white rounded-[2rem] p-6 shadow-sm border-2 border-green-500 hover:shadow-md transition-all duration-300">
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Practical Training</p>
                            <h3 class="text-3xl font-bold text-gray-900">{{ $practicalBookings->count() }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- JPJ Card -->
                <a href="#jpj-section" class="group relative overflow-hidden bg-white rounded-[2rem] p-6 shadow-sm border-2 border-red-500 hover:shadow-md transition-all duration-300">
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">JPJ Test</p>
                            <h3 class="text-3xl font-bold text-gray-900">{{ $jpjBookings->count() }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Computer Theory Table -->
            <div id="computer-section" class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Computer Theory</h3>
                        <span class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $computerBookings->count() }} Bookings</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchComputer" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnComputer" data-dropdown-toggle="sortDropdownComputer"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownComputer" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnComputer">
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('date', 'desc')" class="block px-4 py-2 hover:bg-gray-50">Latest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('date', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Earliest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('status', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Status: Pending</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('result', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Result: Pass</a></li>
                                    <li><a href="javascript:void(0)" onclick="computerTable.sort('name', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Student Name (A-Z)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead class="text-gray-400 text-sm">
                            <tr>
                                <th class="pb-2 pl-4 font-medium w-1/4">Student Details</th>
                                <th class="pb-2 font-medium text-center w-32">Phase</th>
                                <th class="pb-2 font-medium text-center w-40">Date & Time</th>
                                <th class="pb-2 font-medium text-center w-32">Status</th>
                                <th class="pb-2 font-medium text-center w-24">Attempt</th>
                                <th class="pb-2 font-medium text-center w-32">Result</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="computerBody" class="text-sm transition-all duration-300 ease-in-out">
                            @include('ui.admin.bookings.rows', ['bookings' => $computerBookings])
                        </tbody>
                    </table>
                </div>
                <div id="computerPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>

            <!-- Practical Training Table -->
            <div id="practical-section" class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Practical Training</h3>
                        <span class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $practicalBookings->count() }} Bookings</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchPractical" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnPractical" data-dropdown-toggle="sortDropdownPractical"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownPractical" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnPractical">
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('date', 'desc')" class="block px-4 py-2 hover:bg-gray-50">Latest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('date', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Earliest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('status', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Status: Pending</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('result', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Result: Pass</a></li>
                                    <li><a href="javascript:void(0)" onclick="practicalTable.sort('name', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Student Name (A-Z)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead class="text-gray-400 text-sm">
                            <tr>
                                <th class="pb-2 pl-4 font-medium w-1/4">Student Details</th>
                                <th class="pb-2 font-medium text-center w-32">Phase</th>
                                <th class="pb-2 font-medium text-center w-40">Date & Time</th>
                                <th class="pb-2 font-medium text-center w-32">Status</th>
                                <th class="pb-2 font-medium text-center w-24">Attempt</th>
                                <th class="pb-2 font-medium text-center w-32">Result</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="practicalBody" class="text-sm transition-all duration-300 ease-in-out">
                            @include('ui.admin.bookings.rows', ['bookings' => $practicalBookings])
                        </tbody>
                    </table>
                </div>
                <div id="practicalPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>

            <!-- JPJ Test Table -->
            <div id="jpj-section" class="bg-white rounded-[2rem] shadow-sm border-2 border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full mb-8 scroll-mt-24">
                <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-red-50 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">JPJ Test</h3>
                        <span class="px-3 py-2 rounded-full bg-white border border-gray-200 text-gray-500 text-xs font-medium shadow-sm">{{ $jpjBookings->count() }} Bookings</span>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <!-- Search -->
                        <div class="relative w-full md:w-48">
                            <input type="text" id="searchJPJ" placeholder="Search..."
                                class="pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-blue-500 w-full transition-all hover:bg-gray-50 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <!-- Sort -->
                        <div class="relative">
                            <button id="sortBtnJPJ" data-dropdown-toggle="sortDropdownJPJ"
                                class="flex items-center gap-2 bg-white shadow-sm border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort
                            </button>
                            <!-- Dropdown -->
                            <div id="sortDropdownJPJ" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortBtnJPJ">
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('date', 'desc')" class="block px-4 py-2 hover:bg-gray-50">Latest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('date', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Earliest Bookings</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('status', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Status: Pending</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('result', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Result: Pass</a></li>
                                    <li><a href="javascript:void(0)" onclick="jpjTable.sort('name', 'asc')" class="block px-4 py-2 hover:bg-gray-50">Student Name (A-Z)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[1000px]">
                        <thead class="text-gray-400 text-sm">
                            <tr>
                                <th class="pb-2 pl-4 font-medium w-1/4">Student Details</th>
                                <th class="pb-2 font-medium text-center w-32">Phase</th>
                                <th class="pb-2 font-medium text-center w-40">Date & Time</th>
                                <th class="pb-2 font-medium text-center w-32">Status</th>
                                <th class="pb-2 font-medium text-center w-24">Attempt</th>
                                <th class="pb-2 font-medium text-center w-32">Result</th>
                                <th class="pb-2 font-medium text-center pr-4 w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody id="jpjBody" class="text-sm transition-all duration-300 ease-in-out">
                            @include('ui.admin.bookings.rows', ['bookings' => $jpjBookings])
                        </tbody>
                    </table>
                </div>
                <div id="jpjPagination" class="pagination-controls pt-4 flex justify-end gap-2"></div>
            </div>

            <!-- Modals Loop (Iterate over ALL bookings for all categories) -->
            @include('ui.admin.bookings.modals', ['bookings' => $computerBookings->merge($practicalBookings)->merge($jpjBookings)])
        </div>
    </div>
</body>

    <script>
        class TablePagination {
            constructor(tableBodyId, paginationId, itemsPerPage = 5) {
                this.tableBody = document.getElementById(tableBodyId);
                this.paginationContainer = document.getElementById(paginationId);
                this.rows = Array.from(this.tableBody.querySelectorAll('tr'));
                this.itemsPerPage = itemsPerPage;
                this.currentPage = 1;
                this.totalPages = Math.ceil(this.rows.length / this.itemsPerPage);
                this.visibleRows = this.rows; // Initially all are "visible" to the pager (unless filtered)

                this.init();
            }

            init() {
                if (this.rows.length === 0) {
                    this.paginationContainer.innerHTML = '';
                    this.tableBody.innerHTML = '<tr><td colspan="7" class="px-6 py-8 text-center text-gray-500 italic">No bookings found in this category.</td></tr>';
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
                if(page < 1 || page > this.totalPages) return;
                this.currentPage = page;

                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;

                if (animate) {
                    // 1. Fade out current content
                    this.tableBody.style.opacity = '0';
                    this.tableBody.style.transform = 'translateY(5px)';
                    
                    // 2. Wait for fade out to complete (matching duration-300)
                    setTimeout(() => {
                        // 3. Swap rows while invisible
                        this.rows.forEach(row => row.style.display = 'none');
                        this.visibleRows.slice(start, end).forEach(row => row.style.display = '');

                        // 4. Fade in new content
                        requestAnimationFrame(() => {
                            this.tableBody.style.opacity = '1';
                            this.tableBody.style.transform = 'translateY(0)';
                        });
                    }, 300);
                } else {
                    // Instant swap for initial load or filter
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
                
                // Reset visible rows based on search
                this.visibleRows = this.rows.filter(row => {
                    const name = row.querySelector('td:nth-child(1) .flex-col span:nth-child(1)')?.textContent.toLowerCase() || '';
                    const ic = row.querySelector('td:nth-child(1) .flex-col span:nth-child(2)')?.textContent.toLowerCase() || '';
                    return name.includes(lowerQuery) || ic.includes(lowerQuery);
                });

                this.totalPages = Math.ceil(this.visibleRows.length / this.itemsPerPage);
                this.currentPage = 1;
                
                // If query is empty, show all. If query has matches, show them.
                this.showPage(1, false);
            }

            sort(type, order) {
                this.visibleRows.sort((a, b) => { // Sort visibleRows instead of this.rows
                     let valA, valB;
                    if (type === 'name') {
                        valA = a.querySelector('td:nth-child(1) .flex-col span:nth-child(1)')?.textContent.trim().toLowerCase();
                        valB = b.querySelector('td:nth-child(1) .flex-col span:nth-child(1)')?.textContent.trim().toLowerCase();
                    } else if (type === 'status') {
                        const statusOrder = { 'pending': 1, 'confirmed': 2, 'completed': 3, 'failed': 4, 'absent': 5 };
                        valA = statusOrder[a.querySelector('td:nth-child(4)').textContent.trim().toLowerCase()] || 99;
                        valB = statusOrder[b.querySelector('td:nth-child(4)').textContent.trim().toLowerCase()] || 99;
                    } else if (type === 'result') {
                        const resOrder = { 'pending': 1, 'pass': 2, 'failed': 3 };
                        valA = resOrder[a.querySelector('td:nth-child(6)').textContent.trim().toLowerCase()] || 99;
                        valB = resOrder[b.querySelector('td:nth-child(6)').textContent.trim().toLowerCase()] || 99;
                    } else if (type === 'date') {
                        // Date parsing logic
                        // Format is DD MMM YYYY (e.g. 12 Jan 2024)
                        const dateTextA = a.querySelector('td:nth-child(3) div:nth-child(1)').textContent.trim();
                        const dateTextB = b.querySelector('td:nth-child(3) div:nth-child(1)').textContent.trim();
                        
                        // Parse manually since JS Date parsing can be fickle with formats
                        valA = Date.parse(dateTextA) || 0;
                        valB = Date.parse(dateTextB) || 0;
                    }

                    if (valA < valB) return order === 'asc' ? -1 : 1;
                    if (valA > valB) return order === 'asc' ? 1 : -1;
                    return 0;
                });

                this.showPage(1, true);

                // Auto-close specific dropdown for this table
                const prefix = this.tableBody.id.replace('Body', '');
                const capitalizedPrefix = prefix.charAt(0).toUpperCase() + prefix.slice(1);
                const dropdown = document.getElementById('sortDropdown' + capitalizedPrefix);
                if (dropdown) dropdown.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const computerTable = new TablePagination('computerBody', 'computerPagination');
            const practicalTable = new TablePagination('practicalBody', 'practicalPagination');
            const jpjTable = new TablePagination('jpjBody', 'jpjPagination');

            // Expose for inline onclicks
            window.computerTable = computerTable;
            window.practicalTable = practicalTable;
            window.jpjTable = jpjTable;

            // Wire up independent search inputs
            const searchComputer = document.getElementById('searchComputer');
            if(searchComputer) searchComputer.addEventListener('keyup', (e) => computerTable.filter(e.target.value));

            const searchPractical = document.getElementById('searchPractical');
            if(searchPractical) searchPractical.addEventListener('keyup', (e) => practicalTable.filter(e.target.value));

            const searchJPJ = document.getElementById('searchJPJ');
            if(searchJPJ) searchJPJ.addEventListener('keyup', (e) => jpjTable.filter(e.target.value));
        });
    </script>

</html>