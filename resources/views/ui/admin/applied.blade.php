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
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Application Management</h1>
                    <p class="text-gray-500 text-sm mt-1">Manage applications for all license classes.</p>
                </div>
            </div>

            <!-- Content Grid: Table -->
            <div class="grid grid-cols-1 gap-8 mb-4">
                <!-- Main Table (Recent Registrations) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold text-gray-900">Recent Registrations</h2>
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

                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-sm text-white uppercase bg-[#0E1F8E]">
                                <tr>
                                    <th scope="col" class="px-4 py-3 font-medium rounded-l-lg">Student Name</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium">Classes</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium">Package</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium">Payment Method</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium">Payment Stage</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium">License Status</th>
                                    <th scope="col" class="px-4 py-3 text-center font-medium rounded-r-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody id="registrationsTableBody" class="divide-y divide-gray-100">
                                <!-- Row 1 -->
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                            AH</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Ali Hassan</div>
                                            <div class="text-xs text-gray-400">ali.hassan@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            DA
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-white text-purple-800 px-2 py-3 rounded-full border border-purple-700 gap-2">
                                            <span class="w-3 h-3 rounded-full bg-purple-700"></span>
                                            Preffered
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2 justify-center ">
                                            Installment
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            1
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-blue-400 text-white px-2 py-3 rounded-full gap-2">
                                            JPJ Test
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
                                <!-- Row 2 -->
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                            AH</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Ali Hassan</div>
                                            <div class="text-xs text-gray-400">ali.hassan@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            DA
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-white text-green-800 px-2 py-3 rounded-full border border-green-500 gap-2">
                                            <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                            Basic
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2 justify-center ">
                                            Installment
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            1
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-blue-200 text-blue-800 px-2 py-3 rounded-full gap-2">
                                            Computer Test
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
                                <!-- Row 3 -->
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                            AH</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Ali Hassan</div>
                                            <div class="text-xs text-gray-400">ali.hassan@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            D
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-white text-yellow-600 px-2 py-3 rounded-full border border-yellow-500 gap-2">
                                            <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                            Premium
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2 justify-center ">
                                            Full Payment
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            -
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div
                                            class="flex items-center justify-center bg-blue-300 text-blue-800 px-2 py-3 rounded-full gap-2">
                                            Pratical Slot
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
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function sortTable(key, order) {
            const tbody = document.getElementById("registrationsTableBody");
            const rows = Array.from(tbody.querySelectorAll("tr"));

            rows.sort((a, b) => {
                let valA, valB;

                if (key === 'name') {
                    // Name is in the 2nd div inside the 1st td
                    valA = a.cells[0].querySelector('div:last-child .text-gray-900').innerText.trim().toLowerCase();
                    valB = b.cells[0].querySelector('div:last-child .text-gray-900').innerText.trim().toLowerCase();
                } else if (key === 'package') {
                    // Package is in 3rd column (index 2) -> Preffered
                    valA = a.cells[2].innerText.trim().toLowerCase();
                    valB = b.cells[2].innerText.trim().toLowerCase();
                } else if (key === 'payment') {
                    // Payment Stage is in 5th column (index 4) -> 1
                    valA = parseFloat(a.cells[4].innerText.trim()) || 0;
                    valB = parseFloat(b.cells[4].innerText.trim()) || 0;
                }

                if (a === b) return 0;

                if (order === 'asc') {
                    return valA > valB ? 1 : -1;
                } else {
                    return valA < valB ? 1 : -1;
                }
            });

            // Re-append rows in sorted order
            rows.forEach(row => tbody.appendChild(row));
        }
    </script>
</body>

</html>