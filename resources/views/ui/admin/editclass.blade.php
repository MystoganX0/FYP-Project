<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molek Driving Academy</title>
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
                            License Classes Management
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Manage driving classes, prices, and packages.
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

            <!-- Flash Messages -->
            @if(session('success'))
                <div x-data="{ show: true, progress: 0 }" x-init="setTimeout(() => show = false, 5000); let interval = setInterval(() => { progress += 2; if (progress >= 100) clearInterval(interval); }, 100)" x-show="show" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" 
                    class="mb-6 bg-emerald-500 border border-emerald-600 rounded-2xl p-6 flex items-start gap-4 shadow-lg shadow-emerald-500/20 relative overflow-hidden" 
                    role="alert">
                    <div class="p-3 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg mb-1">Success</h4>
                        <p class="text-emerald-50 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" type="button" class="flex-shrink-0 inline-flex items-center justify-center w-8 h-8 text-emerald-100 hover:text-white rounded-lg hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Progress Bar -->
                    <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-b-2xl transition-all duration-100" :style="`width: ${progress}%`"></div>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true, progress: 0 }" x-init="setTimeout(() => show = false, 5000); let interval = setInterval(() => { progress += 2; if (progress >= 100) clearInterval(interval); }, 100)" x-show="show" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" 
                    class="mb-6 bg-rose-500 border border-rose-600 rounded-2xl p-6 flex items-start gap-4 shadow-lg shadow-rose-500/20 relative overflow-hidden" 
                    role="alert">
                    <div class="p-3 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg mb-1">Error</h4>
                        <p class="text-rose-50 text-sm font-medium">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" type="button" class="flex-shrink-0 inline-flex items-center justify-center w-8 h-8 text-rose-100 hover:text-white rounded-lg hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Progress Bar -->
                    <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-b-2xl transition-all duration-100" :style="`width: ${progress}%`"></div>
                </div>
            @endif

            <div class="flex flex-col xl:flex-row gap-8 items-start">
                <!-- Left Side: Stats & Table -->
                <main class="w-full xl:w-2/3 space-y-8">
                    
                    <!-- Table Section -->
                    <div id="mainApplicationCard"
                    class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8 flex flex-col w-full">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Available License Classes</h2>
                            <p class="text-sm text-gray-500 mt-1">Detailed license classes history</p>
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
                                                class="block px-4 py-2 hover:bg-gray-50">Name (A-Z)</a></li>
                                        <li><a href="#" onclick="sortTable('name', 'desc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Name (Z-A)</a></li>
                                        <li><a href="#" onclick="sortTable('code', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Code (A-Z)</a></li>
                                        <li><a href="#" onclick="sortTable('price', 'asc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Price (Low-High)</a></li>
                                        <li><a href="#" onclick="sortTable('price', 'desc')"
                                                class="block px-4 py-2 hover:bg-gray-50">Price (High-Low)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-4 table-fixed min-w-[800px]">
                            <thead>
                                <tr class="text-gray-400 text-sm">
                                    <th class="pb-2 pl-4 font-medium text-center w-32">Classes Image</th>
                                    <th class="pb-2 pl-4 font-medium text-center w-24">Class Code</th>
                                    <th class="pb-2 pl-4 font-medium text-center w-48">Class Name</th>
                                    <th class="pb-2 font-medium text-center w-32">Price</th>
                                    <th class="pb-2 font-medium text-center pr-2 w-24">Action</th>
                                </tr>
                            </thead>
                            <tbody id="classListBody" class="transition-all duration-300 ease-in-out pb-2">
                                @forelse($classes as $class)
                                    <tr class="group">
                                        <td
                                            class="bg-white border-b border-gray-50 py-4 pl-4 first:rounded-l-2xl shadow-sm">
                                            <div
                                                class="h-32 w-48 flex-shrink-0 flex items-center justify-center p-1">
                                                <img src="{{ $class->class_image ? asset($class->class_image) : asset('image/classes/b.png') }}"
                                                    class="h-full object-contain" alt="{{ $class->class_name }}">
                                            </div>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 pl-4 text-center">
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-50 px-3 py-1.5 text-base font-bold text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $class->class_code }}</span>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 pl-4 text-center">
                                            <div class="text-gray-900 font-bold text-sm">{{ $class->class_name }}</div>
                                        </td>
                                        <td class="bg-white border-b border-gray-50 py-4 text-center">
                                            <div class="flex flex-col gap-1 items-center">
                                                <span class="font-bold text-green-600">RM {{ number_format($class->class_price, 2) }}</span>
                                            </div>
                                        </td>
                                        <td
                                            class="bg-white border-b border-gray-50 py-4 text-center pr-2 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
                                            <div class="flex items-center justify-center gap-2">
                                                <button
                                                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors js-edit-btn"
                                                    data-id="{{ $class->class_id }}"
                                                    data-name="{{ $class->class_name }}"
                                                    data-code="{{ $class->class_code }}"
                                                    data-price="{{ $class->class_price }}">
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
                                                <button onclick="confirmDelete({{ $class->class_id }})"
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
                                        <td colspan="5" class="text-center py-6 text-gray-500">
                                            No classes found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                    <!-- Pagination Controls -->
                    <div
                        class="pagination-controls px-0 flex flex-col sm:flex-row justify-end items-center gap-4 hidden">
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
                </main>

                <!-- Right Side: Edit/Add Form -->
                <aside class="w-full xl:w-1/3">
                    <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Pricing Card -->
                        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Pricing Packages</h2>

                            <div class="space-y-4">
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <span class="text-green-400 font-semibold text-sm">RM</span>
                                    </div>
                                    <input type="number" id="price-basic"
                                        class="w-full rounded-xl border-gray-200 pl-11 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm py-3 transition-colors bg-gray-50 text-gray-500"
                                        placeholder="0.00" readonly>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span
                                            class="text-[10px] font-bold text-gray-500 bg-green-100 px-2 py-1 rounded-md uppercase tracking-wider">Basic</span>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <span class="text-blue-300 font-semibold text-sm">RM</span>
                                    </div>
                                    <input type="number" id="price-premium"
                                        class="w-full rounded-xl border-blue-200/60 bg-blue-50/30 pl-11 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 transition-colors"
                                        placeholder="0.00" readonly>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span
                                            class="text-[10px] font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded-md uppercase tracking-wider">Premium</span>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <span class="text-purple-300 font-semibold text-sm">RM</span>
                                    </div>
                                    <input type="number" id="price-preferred"
                                        class="w-full rounded-xl border-purple-200/60 bg-purple-50/30 pl-11 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm py-3 transition-colors"
                                        placeholder="0.00" readonly>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span
                                            class="text-[10px] font-bold text-purple-600 bg-purple-100 px-2 py-1 rounded-md uppercase tracking-wider">Preferred</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Class Details Card -->
                        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between mb-8 border-b border-gray-100 pb-4">
                                <h2 class="text-xl font-bold text-gray-900">Class Details</h2>
                                <button type="button" id="resetFormBtn"
                                    class="text-sm text-blue-600 font-medium hover:text-blue-700 hover:bg-blue-50 px-3 py-1.5 rounded-lg transition-colors">
                                    Reset
                                </button>
                            </div>

                            <div class="space-y-6">
                                <!-- Image Upload -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Class
                                        Icon/Image</label>
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-200 rounded-2xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition-all group overflow-hidden relative">
                                        
                                        <!-- Placeholder Content -->
                                        <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                                            <div class="p-3 bg-white rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                                <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="mb-1 text-sm text-gray-500"><span
                                                    class="font-bold text-blue-600">Click to upload</span> or drag and drop
                                            </p>
                                            <p class="text-xs text-gray-400">SVG, PNG, JPG (MAX. 800x400px)</p>
                                        </div>

                                        <!-- Image Preview -->
                                        <img id="image-preview" src="#" alt="Preview" class="hidden absolute inset-0 w-full h-full object-contain p-2 bg-white">
                                        
                                        <input id="dropzone-file" type="file" name="class_image" class="hidden" accept="image/*"
                                            onchange="displayFileName(event)" required />
                                    </label>
                                </div>

                                <!-- Class Name -->
                                <div class="space-y-1">
                                    <label for="class-name"
                                        class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Class
                                        Name</label>
                                    <input type="text" name="class_name" id="class-name"
                                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 transition-colors placeholder-gray-300"
                                        placeholder="e.g. Manual Car Class D" required>
                                </div>

                                <!-- Class Code -->
                                <div class="space-y-1">
                                    <label for="class-code"
                                        class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Class
                                        Code</label>
                                    <input type="text" name="class_code" id="class-code"
                                        class="w-full uppercase rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 transition-colors placeholder-gray-300"
                                        placeholder="e.g. D" required>
                                </div>

                                <!-- Base Price -->
                                <div class="space-y-1">
                                    <label for="class-price"
                                        class="block text-xs font-bold text-gray-500 uppercase tracking-wide ml-1">Class
                                        Price (Base)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <span class="text-gray-400 font-semibold text-sm">RM</span>
                                        </div>
                                        <input type="number" name="class_price" id="class-price"
                                            class="w-full rounded-xl border-gray-200 pl-11 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 transition-colors placeholder-gray-300"
                                            placeholder="0.00" oninput="calculatePrices()" required step="0.01">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-[#0E1F8E] to-[#050C42] hover:from-blue-900 hover:to-blue-900 text-white font-bold rounded-xl text-sm px-5 py-3.5 text-center shadow-lg shadow-blue-900/20 hover:shadow-xl transition-all active:scale-95 flex items-center justify-center gap-2 mt-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <span id="submitBtnText">Add New Class</span>
                                </button>
                            </div>
                        </div>
                        @csrf
                        <input type="hidden" name="class_id" id="class-id">
                    </form>
                </aside>

            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300"
        aria-labelledby="delete-modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 transition-opacity backdrop-blur-sm" onclick="closeDeleteModal()">
        </div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
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
                            <h3 class="text-lg font-bold text-white" id="delete-modal-title">Delete Class</h3>
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
                        <div class="text-center">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Are you sure you want to delete this class?
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
                        <form action="{{ route('classes.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="class_id" id="deleteClassId">
                            <button type="submit"
                                class="inline-flex justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 transition-all hover:shadow-md active:scale-95">
                                Delete Class
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // --- Package Prices from Backend ---
        const packagePrices = {
            @foreach($packages as $package)
                '{{ strtolower($package->package_type) }}': {{ $package->package_price ?? 0 }},
            @endforeach
        };

        // --- Calculate Prices ---
        function calculatePrices() {
            const classPriceInput = document.getElementById('class-price');
            const basicPriceInput = document.getElementById('price-basic');
            const premiumInput = document.getElementById('price-premium');
            const preferredInput = document.getElementById('price-preferred');

            const basePrice = parseFloat(classPriceInput.value) || 0;

            // Update Basic Price (Read-only) to match Base Price
            basicPriceInput.value = basePrice.toFixed(2);

            // Premium = Base + Premium Package Price
            const premiumPrice = basePrice + (packagePrices['premium'] || 0);
            
            // Preferred = Base + Preferred Package Price
            const preferredPrice = basePrice + (packagePrices['preferred'] || 0);

            premiumInput.value = premiumPrice.toFixed(2);
            preferredInput.value = preferredPrice.toFixed(2);
        }

        // --- Sort Functionality ---
        function sortTable(column, direction) {
            const tbody = document.getElementById('classListBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                let valA, valB;

                if (column === 'class' || column === 'name') {
                    valA = a.querySelector('td:nth-child(3) .text-gray-900').textContent.trim().toLowerCase();
                    valB = b.querySelector('td:nth-child(3) .text-gray-900').textContent.trim().toLowerCase();
                } else if (column === 'code') { // class code
                     valA = a.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
                     valB = b.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
                } else if (column === 'price') {
                    // Extract number from "RM 1,200.00"
                    const textA = a.querySelector('td:nth-child(4)').textContent.replace(/[^\d.-]/g, '');
                    const textB = b.querySelector('td:nth-child(4)').textContent.replace(/[^\d.-]/g, '');
                    valA = parseFloat(textA) || 0;
                    valB = parseFloat(textB) || 0;
                }

                if (valA < valB) return direction === 'asc' ? -1 : 1;
                if (valA > valB) return direction === 'asc' ? 1 : -1;
                return 0;
            });

            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));
        }

        // --- Search Functionality ---
        document.getElementById('searchInput').addEventListener('keyup', function (e) {
            const searchValue = e.target.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#classListBody tr');

            rows.forEach(row => {
                const nameCell = row.querySelector('td:nth-child(3)'); 
                const className = nameCell ? nameCell.textContent.toLowerCase() : '';
                
                if (className.includes(searchValue) || searchValue === "") {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        // --- File Upload Display ---
        function displayFileName(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('upload-placeholder');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        // --- Edit Button Handler ---
        document.querySelectorAll('.js-edit-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const code = this.dataset.code;
                const price = this.dataset.price;

                // Populate form
                document.getElementById('class-id').value = id;
                document.getElementById('class-name').value = name;
                document.getElementById('class-code').value = code;
                document.getElementById('class-price').value = price;
                
                // Remove required from image input when editing
                document.getElementById('dropzone-file').removeAttribute('required');
                
                // Update Form Action
                const form = document.querySelector('form');
                form.action = "{{ route('classes.update') }}";
                document.getElementById('class-code').value = code;
                document.getElementById('class-price').value = price;
                
                // Set Image Preview
                // Find the image src from the row
                const row = this.closest('tr');
                const imgSrc = row.querySelector('img').src;
                
                const preview = document.getElementById('image-preview');
                const placeholder = document.getElementById('upload-placeholder');
                
                preview.src = imgSrc;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
                
                // Trigger calculation
                calculatePrices();

                // Update Button
                const submitBtnSpan = document.getElementById('submitBtnText');
                submitBtnSpan.textContent = "Update Class";

                // Scroll to form on mobile
                if (window.innerWidth < 1280) {
                    document.querySelector('aside').scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // --- Reset Form ---
        document.getElementById('resetFormBtn').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('form').reset();
            document.getElementById('class-id').value = '';
            
            // Re-add required to image input
            document.getElementById('dropzone-file').setAttribute('required', 'required');
            
            // Reset Action
            document.querySelector('form').action = "{{ route('classes.store') }}";
            
            // Reset Image Preview
            document.getElementById('image-preview').classList.add('hidden');
            document.getElementById('image-preview').src = '#';
            document.getElementById('upload-placeholder').classList.remove('hidden');
            
            // Reset Prices
            document.getElementById('price-basic').value = '';
            document.getElementById('price-premium').value = '';
            document.getElementById('price-preferred').value = '';
            
            document.getElementById('submitBtnText').textContent = "Add New Class";
        });

        // --- Delete Confirmation ---
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalPanel = document.getElementById('deleteModalPanel');

        function confirmDelete(id) {
            document.getElementById('deleteClassId').value = id;
            
            // Show modal
            deleteModal.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                deleteModal.classList.remove('opacity-0');
                deleteModalPanel.classList.remove('scale-95');
                deleteModalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeDeleteModal() {
            // Hide transitions
            deleteModal.classList.add('opacity-0');
            deleteModalPanel.classList.remove('scale-100');
            deleteModalPanel.classList.add('scale-95');
            
            // Wait for transition to finish
            setTimeout(() => {
                deleteModal.classList.add('hidden');
            }, 300);
        }

        // --- Pagination Logic ---
        document.addEventListener('DOMContentLoaded', function() {
            const rowsPerPage = 4;
            const tableBody = document.getElementById('classListBody');
            const rows = Array.from(tableBody.querySelectorAll('tr'));
            const paginationControls = document.querySelector('.pagination-controls');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const currentPageSpan = document.querySelector('.current-page-user');
            const totalPagesSpan = document.querySelector('.total-pages-user');

            let currentPage = 1;
            let totalPages = Math.ceil(rows.length / rowsPerPage);


            function showPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                // Animate out
                tableBody.style.opacity = '0';
                tableBody.style.transform = 'translateY(10px)';

                setTimeout(() => {
                    rows.forEach((row, index) => {
                        if (index >= start && index < end) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    currentPageSpan.textContent = page;
                    totalPagesSpan.textContent = totalPages;
                    
                    prevBtn.disabled = page === 1;
                    nextBtn.disabled = page === totalPages;

                    // Animate in
                    requestAnimationFrame(() => {
                        tableBody.style.opacity = '1';
                        tableBody.style.transform = 'translateY(0)';
                    });
                }, 300); // Wait for fade out
            }

            function updatePagination() {
                // hide pagination if single page
                if (totalPages <= 1) {
                    paginationControls.classList.add('hidden');
                } else {
                    paginationControls.classList.remove('hidden');
                }
                
                // Initial load - no delay
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                currentPageSpan.textContent = currentPage;
                totalPagesSpan.textContent = totalPages;
                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages;
            }

            if (rows.length > 0) {
                updatePagination();

                prevBtn.addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                    }
                });

                nextBtn.addEventListener('click', () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        showPage(currentPage);
                    }
                });
            }
        });

    </script>
</body>

</html>