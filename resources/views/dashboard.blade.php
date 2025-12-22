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
    @include('sidebar')

    <div class="p-4 sm:ml-72 transition-all duration-300">
        <div class="p-2 mt-4">

            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
                    <p class="text-gray-500 text-sm mt-1">Welcome back, Admin! Here's what's happening today.</p>
                </div>
                <div class="flex items-center gap-3">
                    <span
                        class="text-sm text-gray-500 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ date('d M Y') }}
                    </span>
                    <button
                        class="bg-[#0E1F8E] text-white px-5 py-2 rounded-xl text-sm font-medium hover:bg-blue-900 transition shadow-lg shadow-blue-900/20 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        New Registration
                    </button>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1: Total Students -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -mr-16 -mt-16 opacity-50 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10 flex justify-between items-start mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl text-blue-600 shadow-inner group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            +12%
                        </span>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 tracking-tight">1,257</h3>
                    <p class="text-sm font-medium text-gray-500 mt-1">Total Students</p>

                    <!-- Sparkline -->
                    <div class="mt-4 flex items-end gap-1 h-8 opacity-50 group-hover:opacity-100 transition-opacity">
                        <div class="w-1/6 bg-blue-100 rounded-t h-[40%]"></div>
                        <div class="w-1/6 bg-blue-200 rounded-t h-[60%]"></div>
                        <div class="w-1/6 bg-blue-300 rounded-t h-[50%]"></div>
                        <div class="w-1/6 bg-blue-400 rounded-t h-[80%]"></div>
                        <div class="w-1/6 bg-blue-500 rounded-t h-[70%]"></div>
                        <div class="w-1/6 bg-blue-600 rounded-t h-full"></div>
                    </div>
                </div>

                <!-- Card 2: Total Revenue -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full blur-3xl -mr-16 -mt-16 opacity-50 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10 flex justify-between items-start mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl text-purple-600 shadow-inner group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            +5.4%
                        </span>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 tracking-tight">RM 48.2k</h3>
                    <p class="text-sm font-medium text-gray-500 mt-1">Total Revenue</p>
                    <!-- Sparkline -->
                    <div class="mt-4 flex items-end gap-1 h-8 opacity-50 group-hover:opacity-100 transition-opacity">
                        <div class="w-1/6 bg-purple-100 rounded-t h-[30%]"></div>
                        <div class="w-1/6 bg-purple-200 rounded-t h-[50%]"></div>
                        <div class="w-1/6 bg-purple-300 rounded-t h-[40%]"></div>
                        <div class="w-1/6 bg-purple-400 rounded-t h-[90%]"></div>
                        <div class="w-1/6 bg-purple-500 rounded-t h-[60%]"></div>
                        <div class="w-1/6 bg-purple-600 rounded-t h-full"></div>
                    </div>
                </div>

                <!-- Card 3: New Applications -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full blur-3xl -mr-16 -mt-16 opacity-50 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10 flex justify-between items-start mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-2xl text-cyan-600 shadow-inner group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full border border-orange-100">
                            Action
                        </span>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 tracking-tight">24</h3>
                    <p class="text-sm font-medium text-gray-500 mt-1">New Applications</p>
                    <div
                        class="mt-4 w-full bg-cyan-100 rounded-full h-1.5 opacity-50 group-hover:opacity-100 transition-opacity">
                        <div class="bg-cyan-500 h-1.5 rounded-full" style="width: 70%"></div>
                    </div>
                </div>

                <!-- Card 4: Overall Pass Rate -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-pink-50 rounded-full blur-3xl -mr-16 -mt-16 opacity-50 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative z-10 flex justify-between items-start mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl text-pink-600 shadow-inner group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center gap-1 text-xs font-bold text-gray-600 bg-gray-100 px-2.5 py-1 rounded-full border border-gray-200">
                            Target: 90%
                        </span>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 tracking-tight">92%</h3>
                    <p class="text-sm font-medium text-gray-500 mt-1">Passing Rate</p>
                    <div
                        class="mt-4 w-full bg-pink-100 rounded-full h-1.5 opacity-50 group-hover:opacity-100 transition-opacity">
                        <div class="bg-pink-500 h-1.5 rounded-full" style="width: 92%"></div>
                    </div>
                </div>
            </div>

            <!-- Content Grid: Table & Visuals -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-4">

                <!-- Main Table (Recent Registrations) -->
                <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold text-gray-900">Recent Registrations</h2>
                        <a href="#"
                            class="text-sm text-blue-600 hover:text-blue-700 font-medium hover:underline flex items-center gap-1">
                            View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 font-medium rounded-l-lg">Student Name</th>
                                    <th scope="col" class="px-4 py-3 font-medium">Package</th>
                                    <th scope="col" class="px-4 py-3 font-medium">Date</th>
                                    <th scope="col" class="px-4 py-3 font-medium">Status</th>
                                    <th scope="col" class="px-4 py-3 font-medium rounded-r-lg text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                            AH</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Ali Hassan</div>
                                            <div class="text-xs text-gray-400">ali.hassan@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                                            Car (Auto)
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-gray-400">{{ date('M d, Y') }}</td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-green-200">Active</span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <button
                                            class="text-gray-400 hover:text-blue-600 transition p-1 hover:bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold text-xs">
                                            SK</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Siti Khadijah</div>
                                            <div class="text-xs text-gray-400">siti.k@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                                            Motorcycle (B2)
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-gray-400">{{ date('M d, Y', strtotime('-1 day')) }}</td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-yellow-200">Pending</span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <button
                                            class="text-gray-400 hover:text-blue-600 transition p-1 hover:bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-4 font-medium text-gray-900 flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-xs">
                                            MC</div>
                                        <div>
                                            <div class="text-gray-900 font-semibold">Muthu Chandran</div>
                                            <div class="text-xs text-gray-400">muthu.c@example.com</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                                            Combo (Car+Motor)
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-gray-400">{{ date('M d, Y', strtotime('-2 days')) }}</td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-blue-200">Processing</span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <button
                                            class="text-gray-400 hover:text-blue-600 transition p-1 hover:bg-blue-50 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Right Side: Upcoming Tests / Quick Actions -->
                <div class="space-y-6">

                    <!-- Upcoming Tests List -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold text-gray-900">Upcoming JPJ Tests</h2>
                            <button class="text-sm text-gray-400 hover:text-gray-600"><svg class="w-5 h-5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg></button>
                        </div>

                        <div class="space-y-4">
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors group cursor-pointer border border-transparent hover:border-blue-100">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-white border border-gray-200 flex flex-col items-center justify-center text-center leading-none shadow-sm group-hover:border-blue-200 group-hover:shadow-md transition-all">
                                        <span class="text-[10px] text-red-500 uppercase font-bold">Oct</span>
                                        <span class="text-lg font-bold text-gray-900">25</span>
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm font-bold text-gray-900 group-hover:text-blue-700 transition-colors">
                                            Group A - Car</p>
                                        <p class="text-xs text-gray-500 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            08:00 AM • 12 Candidates
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors group cursor-pointer border border-transparent hover:border-blue-100">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-white border border-gray-200 flex flex-col items-center justify-center text-center leading-none shadow-sm group-hover:border-blue-200 group-hover:shadow-md transition-all">
                                        <span class="text-[10px] text-red-500 uppercase font-bold">Oct</span>
                                        <span class="text-lg font-bold text-gray-900">28</span>
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm font-bold text-gray-900 group-hover:text-blue-700 transition-colors">
                                            Motorcycle Test</p>
                                        <p class="text-xs text-gray-500 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            09:30 AM • 8 Candidates
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div
                        class="bg-[#0E1F8E] rounded-2xl shadow-lg shadow-blue-900/20 p-6 text-white overflow-hidden relative">
                        <!-- Decor -->
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-0 right-0 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>

                        <h2 class="text-lg font-bold mb-4 relative z-10">Quick Actions</h2>
                        <div class="grid grid-cols-2 gap-3 relative z-10">
                            <button
                                class="bg-white/10 hover:bg-white/20 p-3 rounded-xl border border-white/5 text-center transition backdrop-blur-sm group">
                                <div
                                    class="bg-white/10 w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium">Add User</span>
                            </button>
                            <button
                                class="bg-white/10 hover:bg-white/20 p-3 rounded-xl border border-white/5 text-center transition backdrop-blur-sm group">
                                <div
                                    class="bg-white/10 w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-cyan-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium">Reports</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>