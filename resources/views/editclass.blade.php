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

<body class="bg-gray-100 font-poppins min-h-screen">
    @include('sidebar')

    <div class="p-4 sm:ml-72 transition-all duration-300">
        <div class="p-2 mt-4">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Class Management</h1>
                <p class="text-sm text-gray-500 mt-1">Manage driving classes, prices, and packages.</p>
            </div>
        </div>

        <div class="flex flex-col xl:flex-row gap-8 items-start">

            <!-- Left Side: Stats & Table -->
            <main class="w-full xl:w-2/3 space-y-8">

                <!-- Stats Cards -->
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div
                        class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between h-32 hover:border-purple-200 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div class="p-2 bg-purple-50 rounded-lg group-hover:bg-purple-100 transition-colors">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-1 rounded-full">B &
                                B2</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900 block">Motorcycle</span>
                            <span class="text-xs text-gray-500">Categories</span>
                        </div>
                    </div>

                    <div
                        class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between h-32 hover:border-cyan-200 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div class="p-2 bg-cyan-50 rounded-lg group-hover:bg-cyan-100 transition-colors">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-cyan-600 bg-cyan-50 px-2 py-1 rounded-full">Manual/Auto</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900 block">Car</span>
                            <span class="text-xs text-gray-500">Categories</span>
                        </div>
                    </div>
                    <div
                        class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between h-32 hover:border-pink-200 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div class="p-2 bg-pink-50 rounded-lg group-hover:bg-pink-100 transition-colors">
                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-pink-600 bg-pink-50 px-2 py-1 rounded-full">GDL &
                                PSV</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900 block">Others</span>
                            <span class="text-xs text-gray-500">Categories</span>
                        </div>
                    </div>
                    <div
                        class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between h-32 hover:border-blue-200 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div class="p-2 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Total</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900 block">7</span>
                            <span class="text-xs text-gray-500">Active Classes</span>
                        </div>
                    </div>
                </section>

                <!-- Table Section -->
                <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">Class List</h2>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="relative w-full sm:w-80">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-xl bg-white focus:ring-[#0E1F8E] focus:border-[#0E1F8E] shadow-sm"
                                    placeholder="Search classes..." required />
                            </div>

                            <!-- Sort Dropdown -->
                            <button id="dropdownSortButton" data-dropdown-toggle="dropdownSort"
                                class="text-gray-900 bg-white border border-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-xl text-sm px-5 py-3 text-center inline-flex items-center shadow-sm"
                                type="button">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Sort By <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownSort"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownSortButton">
                                    <li>
                                        <a href="#" onclick="sortTable('name', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-100">Name (A-Z)</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="sortTable('name', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-100">Name (Z-A)</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="sortTable('package', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-100">Package (A-Z)</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="sortTable('payment', 'asc')"
                                            class="block px-4 py-2 hover:bg-gray-100">Payment Stage (Low-High)</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="sortTable('payment', 'desc')"
                                            class="block px-4 py-2 hover:bg-gray-100">Payment Stage (High-Low)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-base text-center text-gray-600">
                            <thead class="text-sm text-white uppercase bg-[#0E1F8E]">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium">Image</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Class Code</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Class Name</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Basic</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Premium</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Preferred</th>
                                    <th scope="col" class="px-6 py-4 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50/80 transition-colors group">
                                    <td class="p-4">
                                        <div
                                            class="h-16 w-16 mx-auto flex items-center justify-center border">
                                            <img src="/image/classes/b.png" class="h-16 object-contain" alt="Class B">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-semibold text-gray-900">DA</span>
                                        </div>
                                    </td>
                                     <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-semibold text-gray-900">Automatic Car</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-gray-900">RM 599</span>
                                            <span class="text-[10px] text-gray-400">Basic</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-[#0E1F8E]">RM 899</span>
                                            <span class="text-[10px] text-blue-400">Premium</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-purple-600">RM 1199</span>
                                            <span class="text-[10px] text-purple-400">Preferred</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="bg-blue-600 p-2 rounded-lg text-white hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button
                                                class="bg-white border border-red-100 p-2 rounded-lg text-red-500 hover:bg-red-50 transition shadow-sm hover:shadow-md">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
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
                                <tr class="hover:bg-gray-50/80 transition-colors group">
                                    <td class="p-4">
                                        <div
                                            class="h-16 w-16 mx-auto flex items-center justify-center border">
                                            <img src="/image/classes/b.png" class="h-16 object-contain" alt="Class B">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-semibold text-gray-900">DA</span>
                                        </div>
                                    </td>
                                     <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-semibold text-gray-900">Automatic Car</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-gray-900">RM 599</span>
                                            <span class="text-[10px] text-gray-400">Basic</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-[#0E1F8E]">RM 899</span>
                                            <span class="text-[10px] text-blue-400">Premium</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="font-bold text-purple-600">RM 1199</span>
                                            <span class="text-[10px] text-purple-400">Preferred</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="bg-blue-600 p-2 rounded-lg text-white hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button
                                                class="bg-white border border-red-100 p-2 rounded-lg text-red-500 hover:bg-red-50 transition shadow-sm hover:shadow-md">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
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
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-gray-100 bg-gray-50/30 text-center text-xs text-gray-400">
                        Showing all visible classes
                    </div>
                </section>
            </main>

            <!-- Right Side: Edit/Add Form -->
            <aside class="w-full xl:w-1/3">
                <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/50 p-6 sticky top-8 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Add New Class</h2>
                        <button type="add" class="text-sm text-[#0E1F8E] font-medium hover:underline">Reset
                            Form</button>
                    </div>

                    <form action="#" class="space-y-5">

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Class Icon/Image</label>
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                                    <div
                                        class="p-3 bg-white rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                    </div>
                                    <p class="mb-1 text-sm text-gray-500"><span
                                            class="font-semibold text-blue-600">Click to upload</span></p>
                                    <p class="text-xs text-gray-400">SVG, PNG, JPG (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden"
                                    onchange="displayFileName(event)" />
                            </label>
                            <p id="file-name"
                                class="mt-2 text-xs text-green-600 font-medium hidden flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="content"></span>
                            </p>
                        </div>

                        <!-- Class Name -->
                        <div>
                            <label for="class-name" class="block mb-2 text-sm font-semibold text-gray-700">Class
                                Name</label>
                            <input type="text" id="class-name"
                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-[#0E1F8E] focus:border-[#0E1F8E] block w-full p-3 transition"
                                placeholder="e.g. Manual Car Class D" required>
                        </div>

                        <!-- Pricing Section -->
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-gray-700">Pricing Packages</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 font-medium">RM</span>
                                </div>
                                <input type="number" id="price-basic"
                                    class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-[#0E1F8E] focus:border-[#0E1F8E] block w-full pl-10 p-3"
                                    placeholder="Basic Price">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded">Basic</span>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 font-medium">RM</span>
                                </div>
                                <input type="number" id="price-premium"
                                    class="bg-blue-50 border border-blue-200 text-gray-900 text-sm rounded-xl focus:ring-[#0E1F8E] focus:border-[#0E1F8E] block w-full pl-10 p-3"
                                    placeholder="Premium Price">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <span
                                        class="text-xs text-blue-600 bg-blue-100 px-2 py-1 rounded font-medium">Premium</span>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 font-medium">RM</span>
                                </div>
                                <input type="number" id="price-preferred"
                                    class="bg-purple-50 border border-purple-200 text-gray-900 text-sm rounded-xl focus:ring-purple-600 focus:border-purple-600 block w-full pl-10 p-3"
                                    placeholder="Preferred Price">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <span
                                        class="text-xs text-purple-600 bg-purple-100 px-2 py-1 rounded font-medium">Preferred</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full text-white bg-[#0E1F8E] hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-3.5 text-center transition-all shadow-lg shadow-blue-900/20 hover:shadow-blue-900/40 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>Add Class</span>
                        </button>

                    </form>
                </div>
            </aside>

        </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // --- Search Functionality ---
        document.getElementById('default-search').addEventListener('keyup', function (e) {
            const searchValue = e.target.value.toLowerCase().trim();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const className = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
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
            const fileNameDisplay = document.querySelector('#file-name .content');
            const fileNameContainer = document.getElementById('file-name');

            if (input.files.length > 0) {
                fileNameDisplay.textContent = input.files[0].name;
                fileNameContainer.classList.remove('hidden');
            } else {
                fileNameDisplay.textContent = '';
                fileNameContainer.classList.add('hidden');
            }
        }

        // --- Edit Button Handler ---
        document.querySelectorAll('tbody button.bg-blue-600').forEach(btn => {
            btn.addEventListener('click', function () {
                const row = this.closest('tr');
                const className = row.querySelector('td:nth-child(2)').textContent.trim();
                const priceBasic = row.querySelector('td:nth-child(3) span.font-bold').textContent.replace('RM', '').trim();
                const pricePremium = row.querySelector('td:nth-child(4) span.font-bold').textContent.replace('RM', '').trim();
                const pricePreferred = row.querySelector('td:nth-child(5) span.font-bold').textContent.replace('RM', '').trim();

                // Populate form
                document.getElementById('class-name').value = className;
                document.getElementById('price-basic').value = priceBasic;
                document.getElementById('price-premium').value = pricePremium;
                document.getElementById('price-preferred').value = pricePreferred;

                // Update Button
                const submitBtnSpan = document.querySelector('button[type="submit"] span');
                submitBtnSpan.textContent = "Update Class";

                // Scroll to form on mobile
                if (window.innerWidth < 1280) {
                    document.querySelector('aside').scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // --- Reset Form ---
        document.querySelector('button[type="add"]').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('form').reset();
            document.getElementById('file-name').classList.add('hidden');
            document.querySelector('button[type="submit"] span').textContent = "Add Class";
        });
    </script>
</body>

</html>