<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Molek Driving Academy</title>
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
                            Application Management
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Manage and track student applications.
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

            <!-- Content Grid: Table -->
            <div class="flex flex-col gap-8 mb-8 relative">
                <!-- Student Profile Side Panel -->
                <div id="paymentProfileSection"
                    class="hidden opacity-0 transition-all duration-500 ease-in-out overflow-hidden w-full">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full">
                        <!-- Header -->
                        <div
                            class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-600">
                            <div>
                                <h2 class="text-lg font-bold text-white">Student Profile</h2>
                                <p class="text-sm text-white mt-1">Details for <span id="profileStudentName"
                                        class="font-bold text-white">Student Name</span></p>
                            </div>
                            <button onclick="hidePaymentDetails()"
                                class="text-white hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="p-4 sm:p-6 lg:p-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                                <!-- Student Details Section -->
                                <div class="relative pl-6 border-l-4 border-blue-500 h-full">
                                    <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wide mb-6">Student
                                        Details</h3>

                                    <div class="mb-6">
                                        <div id="profileAvatar"
                                            class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl shadow-sm border-2 border-white ring-1 ring-blue-50">
                                            --
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Full
                                                Name</label>
                                            <p class="text-sm font-semibold text-gray-900 break-words"
                                                id="profileFullName">-</p>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">IC
                                                Number</label>
                                            <p class="text-sm font-mono font-semibold text-gray-900" id="profileIc">-
                                            </p>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Email</label>
                                            <p class="text-sm font-semibold text-gray-900" id="profileEmail">-</p>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Phone</label>
                                            <p class="text-sm font-semibold text-gray-900" id="profilePhone">-</p>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Address</label>
                                            <p class="text-sm text-gray-600 font-semibold leading-snug"
                                                id="profileAddress">-</p>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">IC
                                                Document</label>
                                            <a id="profileIcFileLink" href="#" target="_blank"
                                                class="text-sm text-blue-600 hover:underline font-medium inline-flex items-center gap-1">
                                                View File
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                            <span id="profileIcFileMissing"
                                                class="text-xs text-gray-400 italic hidden">Not uploaded</span>
                                        </div>
                                    </div>

                                    <!-- Edit Button -->
                                    <div class="mt-8">
                                        <button onclick="openEditStudentModal()"
                                            class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold uppercase tracking-wider rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                            Edit Details
                                        </button>
                                    </div>
                                </div>

                                <!-- Payment Stats & History -->
                                <div>
                                    <h3
                                        class="font-bold text-gray-900 text-sm uppercase tracking-wide mb-4 flex items-center gap-2">
                                        <span>Payment History</span>
                                        <div class="h-px bg-gray-100 flex-1"></div>
                                    </h3>

                                    <!-- Stats Row -->
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                                            <p class="text-xs font-bold text-blue-400 uppercase tracking-wider">Total
                                                Amount</p>
                                            <p class="text-lg font-bold text-blue-700 mt-1" id="profileTotalAmount">RM
                                                0.00</p>
                                        </div>
                                        <div class="grid grid-cols-1 gap-2">
                                            <div
                                                class="bg-gray-50 rounded-lg px-3 py-2 flex justify-between items-center border border-gray-100">
                                                <span class="text-xs font-bold text-gray-400 uppercase">Type</span>
                                                <span class="text-sm font-bold text-gray-900"
                                                    id="profilePaymentType">-</span>
                                            </div>
                                            <div
                                                class="bg-gray-50 rounded-lg px-3 py-2 border border-gray-100 relative overflow-hidden group">
                                                <div id="profileCompletionBar"
                                                    class="absolute left-0 top-0 bottom-0 bg-blue-50 transition-all duration-1000 ease-out"
                                                    style="width: 0%"></div>
                                                <div class="relative flex justify-between items-center z-10">
                                                    <span
                                                        class="text-xs font-bold text-gray-500 uppercase">Progress</span>
                                                    <span class="text-sm font-bold text-gray-900"
                                                        id="profileCompletion">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div
                                        class="bg-white rounded-xl border border-gray-100 overflow-hidden overflow-x-auto">
                                        <table class="w-full text-sm text-left min-w-[600px]">
                                            <thead class="bg-gray-50/50 border-b border-gray-50 text-gray-500">
                                                <tr>
                                                    <th class="px-4 py-3 font-medium">Stage</th>
                                                    <th class="px-4 py-3 font-medium">Amount</th>
                                                    <th class="px-4 py-3 font-medium">Status</th>
                                                    <th class="px-4 py-3 font-medium text-right">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody id="profilePaymentDetailsBody" class="divide-y divide-gray-50">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Table -->
                <div id="mainApplicationCard"
                    class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">All Applications</h2>
                            <p class="text-sm text-gray-500 mt-1">Detailed applications history</p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <!-- Search -->
                            <div class="relative w-full sm:w-64">
                                <input type="text" id="searchInput" onkeyup="filterApplications()"
                                    placeholder="Search..."
                                    class="pl-10 pr-4 py-2.5 rounded-xl border-none bg-gray-50 text-sm focus:ring-0 w-full transition-all hover:bg-gray-100 placeholder-gray-400">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <!-- Sort Button -->
                            <div class="relative">
                                <button id="dropdownSortButton" data-dropdown-toggle="dropdownSort"
                                    class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-900 px-5 py-2.5 rounded-xl text-sm font-medium transition-colors">
                                    <svg class="w-4 h-4 text-gray-900" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                    </svg>
                                    Sort
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownSort"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-100 w-56 mt-2">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownSortButton">
                                        <li><a href="#" onclick="sortTable('name', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Student Name (A-Z)</a></li>
                                        <li><a href="#" onclick="sortTable('status', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Status (Pending First)</a></li>
                                        <li><a href="#" onclick="sortTable('phase', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Current Phase</a></li>
                                        <li><a href="#" onclick="sortTable('class', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">License Class</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-4 min-w-[1000px]">
                            <thead>
                                <tr class="text-gray-400 text-sm">
                                    <th class="pb-2 pl-2 font-medium w-[280px]">Student Details</th>
                                    <th class="pb-2 pl-4 font-medium text-center">Classes</th>
                                    <th class="pb-2 font-medium text-center">Package</th>
                                    <th class="pb-2 font-medium text-center">Payment Method</th>
                                    <th class="pb-2 font-medium text-center">Stage</th>
                                    <th class="pb-2 font-medium text-center">Current Phase</th>
                                    <th class="pb-2 font-medium text-center">Status</th>
                                    <th class="pb-2 font-medium text-center pr-2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="registrationsTableBody">
                                @forelse($applications as $app)
                                    <tr class="group">
                                        <td
                                            class="bg-white border-b border-gray-50 py-4 pl-4 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm">
                                                    {{ strtoupper(substr($app->student->full_name ?? $app->student->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <div class="text-gray-900 font-bold text-sm student-name">
                                                        {{ $app->student->full_name ?? $app->student->name }}
                                                    </div>
                                                    <div class="text-xs text-gray-400 mt-0.5">{{ $app->student->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 pl-4 text-center">
                                            <span
                                                class="font-semibold text-gray-700 text-sm">{{ $app->class->class_code }}</span>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 text-center">
                                            @php
                                                $pkgColor = match (strtolower($app->package->package_type)) {
                                                    'premium' => 'yellow',
                                                    'preferred' => 'purple',
                                                    'basic' => 'emerald',
                                                    default => 'gray'
                                                };
                                            @endphp
                                            <span
                                                class="bg-{{ $pkgColor }}-50 text-{{ $pkgColor }}-700 px-3 py-1 rounded-full text-xs font-bold ring-1 ring-{{ $pkgColor }}-100">
                                                {{ ucfirst($app->package->package_type) }}
                                            </span>
                                        </td>
                                        <td
                                            class="bg-white border-b border-gray-50 py-4 text-center text-sm text-gray-500 font-medium">
                                            {{ ucfirst($app->payment->payment_type) }}
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 text-center">
                                            @php
                                                $paidStages = $app->payment->details->where('status', 'paid')->count();
                                                $totalStages = $app->payment->details->count();
                                            @endphp
                                            <span
                                                class="w-8 h-8 inline-flex items-center justify-center bg-gray-100 rounded-full text-xs font-bold text-gray-600">
                                                {{ $paidStages }}/{{ $totalStages }}
                                            </span>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 text-center">
                                            <span class="bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold border border-gray-700 shadow-sm">
                                                {{ $app->current_stage }}
                                            </span>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 text-center">
                                            @php
                                                $statusColor = match ($app->app_status) {
                                                    'Completed' => 'green',
                                                    'In-Progress' => 'blue',
                                                    'Pending' => 'orange',
                                                    default => 'gray'
                                                };
                                            @endphp
                                            <div class="flex justify-center">
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-full text-xs font-bold bg-{{ $statusColor }}-100 text-{{ $statusColor }}-700 ring-1 ring-inset ring-{{ $statusColor }}-600/20">
                                                    <span class="w-2 h-2 rounded-full bg-{{ $statusColor }}-600"></span>
                                                    {{ $app->app_status }}
                                                </span>
                                            </div>
                                        </td>
                                        <td
                                            class="bg-white border-b border-gray-50 py-4 text-center pr-2 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
                                            <div class="flex items-center justify-center gap-2">
                                                <button
                                                    onclick='showPaymentDetails({{ json_encode($app->payment->load("details")) }}, {{ json_encode($app->student) }})'
                                                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <button onclick="openDeleteModal('{{ $app->app_id }}')"
                                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-6 text-gray-500">
                                            No applications found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="editStudentModal" class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 transition-opacity backdrop-blur-sm" onclick="closeEditStudentModal()">
        </div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeEditStudentModal()">
                <div id="editStudentModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-lg scale-95 duration-300 ring-1 ring-black/5">

                    <!-- Header -->
                    <div
                        class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white" id="modal-title">Edit Student Details</h3>
                        </div>
                        <button type="button" onclick="closeEditStudentModal()"
                            class="text-white/80 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-2 -mr-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6 space-y-6">
                        <input type="hidden" id="editStudentId">

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Full
                                Name</label>
                            <input type="text" id="editFullName"
                                class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                            <div class="space-y-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">IC
                                    Number <span
                                        class="text-[10px] font-normal text-gray-400 lowercase">(read-only)</span></label>
                                <input type="text" id="editIc" disabled
                                    class="w-full rounded-xl border-gray-100 bg-gray-50 text-gray-500 shadow-sm sm:text-sm py-2.5 cursor-not-allowed">
                            </div>
                            <div class="space-y-1">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Phone</label>
                                <input type="text" id="editPhone"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Email</label>
                            <input type="email" id="editEmail"
                                class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors">
                        </div>

                        <div class="space-y-1">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Address</label>
                            <textarea id="editAddress" rows="3"
                                class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                        <button type="button" onclick="closeEditStudentModal()"
                            class="inline-flex justify-end rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-all active:scale-95">
                            Cancel
                        </button>
                        <button type="button" id="saveStudentBtn" onclick="updateStudentDetails()"
                            class="inline-flex justify-end rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-blue-500 transition-all hover:shadow-md active:scale-95">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPaymentDetails(paymentData, student) {
            const mainCard = document.getElementById('mainApplicationCard');
            const section = document.getElementById('paymentProfileSection');

            // Populate Student Details
            const fullName = student.full_name || student.name || '-';
            const initials = fullName !== '-' ? fullName.substring(0, 2).toUpperCase() : '--';

            document.getElementById('profileAvatar').innerText = initials;
            document.getElementById('profileStudentName').innerText = fullName;
            document.getElementById('profileFullName').innerText = fullName;
            document.getElementById('profileIc').innerText = student.ic || '-';
            document.getElementById('profilePhone').innerText = student.phone || '-';
            document.getElementById('profileEmail').innerText = student.email || '-';
            document.getElementById('profileAddress').innerText = student.address || '-';

            // Store student data for edit modal
            window.currentStudentData = student;

            // Handle IC File
            const icLink = document.getElementById('profileIcFileLink');
            const icMissing = document.getElementById('profileIcFileMissing');

            if (student.ic_file) {
                // Assuming path is relative to storage or straight URL. Adjust logic if needed.
                icLink.href = student.ic_file.includes('http') ? student.ic_file : `/storage/${student.ic_file}`;
                icLink.classList.remove('hidden');
                icLink.classList.add('inline-flex');
                icMissing.classList.add('hidden');
            } else {
                icLink.classList.add('hidden');
                icLink.classList.remove('inline-flex');
                icMissing.classList.remove('hidden');
            }

            // Populate Payment Data
            document.getElementById('profileTotalAmount').innerText = 'RM ' + parseFloat(paymentData.total_amount).toFixed(2);
            document.getElementById('profilePaymentType').innerText = (paymentData.payment_type || '-').charAt(0).toUpperCase() + (paymentData.payment_type || '').slice(1);

            // Calculate Completion
            const details = paymentData.details || [];
            const paidCount = details.filter(d => d.status === 'paid').length;
            const totalCount = details.length;
            const percentage = totalCount > 0 ? Math.round((paidCount / totalCount) * 100) : 0;
            document.getElementById('profileCompletion').innerText = percentage + '%';
            document.getElementById('profileCompletionBar').style.width = percentage + '%';

            // Populate Table
            const tbody = document.getElementById('profilePaymentDetailsBody');
            tbody.innerHTML = '';

            if (details.length === 0) {
                tbody.innerHTML = '<tr><td colspan="3" class="px-4 py-3 text-center text-gray-400 italic">No transaction history.</td></tr>';
            } else {
                details.forEach(detail => {
                    const statusColor = detail.status === 'paid' ? 'emerald' : 'orange';
                    const dateStr = detail.updated_at ? new Date(detail.updated_at).toLocaleDateString() : '-';
                    const row = `
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-4 py-3 font-medium text-gray-900">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-${statusColor}-500"></div>
                                    ${detail.stage}
                                </div>
                            </td>
                            <td class="px-4 py-3 font-semibold text-gray-700">RM ${parseFloat(detail.amount).toFixed(2)}</td>
                            <td class="px-4 py-3">
                                <span class="uppercase text-[10px] font-bold tracking-wider px-2 py-1 rounded bg-${statusColor}-100 text-${statusColor}-700 border border-${statusColor}-200">
                                    ${detail.status}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right text-gray-400 font-medium">${dateStr}</td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            }

            // Animate View
            section.classList.remove('hidden', 'opacity-0');
            section.classList.add('opacity-100');

            // Scroll to section
            setTimeout(() => {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }

        function hidePaymentDetails() {
            const section = document.getElementById('paymentProfileSection');

            // Revert View
            section.classList.remove('opacity-100');
            section.classList.add('opacity-0');

            // Wait for transition to finish before hiding
            setTimeout(() => {
                section.classList.add('hidden');
            }, 500);
        }

        function sortTable(key, order) {
            const tbody = document.getElementById("registrationsTableBody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const phaseOrder = {
                'computer test': 1,
                'practical training': 2,
                'practical slot': 2,
                'jpj test': 3,
                'completed': 4,
                'pending': 0
            };

            const statusOrder = {
                'pending': 1,
                'in-progress': 2,
                'completed': 3
            };

            rows.sort((a, b) => {
                if (a.cells.length < 2 || b.cells.length < 2) return 0; // Skip headers or empty

                let valA, valB;

                if (key === 'name') {
                    // Name is in 1st column (index 0), inside .student-name
                    valA = a.querySelector('.student-name').innerText.trim().toLowerCase();
                    valB = b.querySelector('.student-name').innerText.trim().toLowerCase();
                } else if (key === 'class') {
                    // Class is in 2nd column (index 1)
                    valA = a.cells[1].innerText.trim().toLowerCase();
                    valB = b.cells[1].innerText.trim().toLowerCase();
                } else if (key === 'status') {
                    // Status is in 7th column (index 6)
                    const textA = a.cells[6].innerText.trim().toLowerCase();
                    const textB = b.cells[6].innerText.trim().toLowerCase();
                    valA = statusOrder[textA] || 99;
                    valB = statusOrder[textB] || 99;
                } else if (key === 'phase') {
                    // Phase is in 6th column (index 5)
                    const textA = a.cells[5].innerText.trim().toLowerCase();
                    const textB = b.cells[5].innerText.trim().toLowerCase();
                    valA = phaseOrder[textA] || 0;
                    valB = phaseOrder[textB] || 0;
                }

                if (valA === valB) return 0;
                return (valA > valB ? 1 : -1) * (order === 'desc' ? -1 : 1);
            });

            // Re-append rows
            rows.forEach(row => tbody.appendChild(row));

            // Close dropdown
            const dropdown = document.getElementById('dropdownSort');
            if (dropdown && !dropdown.classList.contains('hidden')) {
                // Usually handled by Flowbite, but we can force hide or leave to user
            }
        }

        // --- Edit Student Modal Functions ---
        function openEditStudentModal() {
            const student = window.currentStudentData;
            if (!student) return;

            document.getElementById('editStudentId').value = student.id; // OR student.student_id depending on model
            document.getElementById('editFullName').value = student.full_name || student.name || '';
            document.getElementById('editIc').value = student.ic || '';
            document.getElementById('editPhone').value = student.phone || '';
            document.getElementById('editEmail').value = student.email || '';
            document.getElementById('editAddress').value = student.address || '';

            const modal = document.getElementById('editStudentModal');
            const panel = document.getElementById('editStudentModalPanel');

            modal.classList.remove('hidden');
            // Force reflow
            void modal.offsetWidth;

            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if (panel) {
                    panel.classList.remove('scale-95');
                    panel.classList.add('scale-100');
                }
            }, 10);
        }

        function closeEditStudentModal() {
            const modal = document.getElementById('editStudentModal');
            const panel = document.getElementById('editStudentModalPanel');

            modal.classList.add('opacity-0');
            if (panel) {
                panel.classList.remove('scale-100');
                panel.classList.add('scale-95');
            }

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function updateStudentDetails() {
            const btn = document.getElementById('saveStudentBtn');
            const originalText = btn.innerText;
            btn.innerText = 'Saving...';
            btn.disabled = true;

            const data = {
                student_id: document.getElementById('editStudentId').value,
                full_name: document.getElementById('editFullName').value,
                phone: document.getElementById('editPhone').value,
                email: document.getElementById('editEmail').value,
                address: document.getElementById('editAddress').value,
            };

            fetch('{{ route("admin.student.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to update'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating.');
                })
                .finally(() => {
                    btn.innerText = originalText;
                    btn.disabled = false;
                });
        }
    </script>

    <script>
        function filterApplications() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('registrationsTableBody');
            const rows = table.getElementsByTagName('tr');
            let hasVisibleRow = false;

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                if (row.getElementsByTagName('td').length < 2) continue; // Skip empty/no-data rows

                const text = row.textContent || row.innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    row.style.display = "";
                    hasVisibleRow = true;
                } else {
                    row.style.display = "none";
                }
            }

            // Optional: Handle "No applications found" message if all hidden
        }
    </script>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="delete-modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 transition-opacity backdrop-blur-sm" onclick="closeDeleteModal()">
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
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white" id="delete-modal-title">Delete Application</h3>
                        </div>
                        <button type="button" onclick="closeDeleteModal()"
                            class="text-white/80 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-2 -mr-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6">
                        <input type="hidden" id="deleteAppId">

                        <div class="text-center">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Are you sure you want to delete this application?
                                <span class="block mt-2 text-gray-900 font-semibold">This action cannot be
                                    undone.</span>
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                        <button type="button" onclick="closeDeleteModal()"
                            class="inline-flex justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-all active:scale-95">
                            Cancel
                        </button>
                        <button type="button" id="confirmDeleteBtn" onclick="confirmDelete()"
                            class="inline-flex justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 transition-all hover:shadow-md active:scale-95">
                            Delete Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(appId) {
            document.getElementById('deleteAppId').value = appId;
            const modal = document.getElementById('deleteModal');
            const panel = document.getElementById('deleteModalPanel');

            modal.classList.remove('hidden');
            void modal.offsetWidth;

            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if (panel) {
                    panel.classList.remove('scale-95');
                    panel.classList.add('scale-100');
                }
            }, 10);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const panel = document.getElementById('deleteModalPanel');

            modal.classList.add('opacity-0');
            if (panel) {
                panel.classList.remove('scale-100');
                panel.classList.add('scale-95');
            }

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function confirmDelete() {
            const btn = document.getElementById('confirmDeleteBtn');
            const originalText = btn.innerText;
            btn.innerText = 'Deleting...';
            btn.disabled = true;

            const appId = document.getElementById('deleteAppId').value;

            fetch('{{ route("admin.application.delete") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ app_id: appId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to delete'));
                        btn.innerText = originalText;
                        btn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting.');
                    btn.innerText = originalText;
                    btn.disabled = false;
                });
        }
    </script>
</body>

</html>