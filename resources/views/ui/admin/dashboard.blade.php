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

            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Dashboard</h1>
                
                <div class="flex items-center gap-4">
                    <!-- Date Toggle (Simulated Style) -->
                    <div class="hidden md:flex bg-gray-100 p-1 rounded-xl items-center text-sm font-medium text-gray-500">
                        <div class="bg-white text-gray-900 shadow-sm px-4 py-1.5 rounded-lg cursor-default">
                            {{ date('d M Y') }}
                        </div>
                        <div class="px-4 py-1.5 cursor-default">
                            Overview
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Add Button -->
                        <button class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-xl hover:bg-gray-200 text-gray-900 transition-colors" title="New Registration">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>

                        <!-- Profile Avatar -->
                        <div class="w-10 h-10 rounded-full bg-blue-100 border-2 border-white shadow-sm overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=0E1F8E&color=fff" alt="Admin" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1: Total Students -->
                <div
                    class="bg-blue-50 rounded-2xl p-6 border-2 border-blue-100 hover:border-blue-400 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-white text-blue-600 rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-blue-600 bg-white px-2 py-1 rounded-lg shadow-sm">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            12%
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-blue-600/70 mb-1">Total Students</p>
                        <h3 class="text-2xl font-bold text-gray-900">1,257</h3>
                    </div>
                </div>

                <!-- Card 2: Total Revenue -->
                <div
                    class="bg-purple-50 rounded-2xl p-6 border-2 border-purple-100 hover:border-purple-400 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-white text-purple-600 rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-purple-600 bg-white px-2 py-1 rounded-lg shadow-sm">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            5.4%
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-purple-600/70 mb-1">Total Revenue</p>
                        <h3 class="text-2xl font-bold text-gray-900">RM 48.2k</h3>
                    </div>
                </div>

                <!-- Card 3: New Applications -->
                <div
                    class="bg-cyan-50 rounded-2xl p-6 border-2 border-cyan-100 hover:border-cyan-400 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-white text-cyan-600 rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-orange-600 bg-white px-2 py-1 rounded-lg shadow-sm">
                            Pending
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-cyan-600/70 mb-1">New Applications</p>
                        <h3 class="text-2xl font-bold text-gray-900">24</h3>
                    </div>
                </div>

                <!-- Card 4: Passing Rate -->
                <div
                    class="bg-pink-50 rounded-2xl p-6 border-2 border-pink-100 hover:border-pink-400 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 bg-white text-pink-600 rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-blue-600 bg-white px-2 py-1 rounded-lg shadow-sm">
                            Target: 90%
                        </span>
                    </div>
                    <div>
                        <div class="flex justify-between items-end">
                            <p class="text-sm font-medium text-pink-600/70 mb-1">Passing Rate</p>
                            <span class="text-xs font-semibold text-pink-600/50 mb-1">All Time</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">92%</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>