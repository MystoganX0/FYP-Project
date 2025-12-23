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

<body class="font-poppins bg-gray-100 text-gray-800">
    @include('header')

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-4 md:py-8 flex items-center justify-between gap-2">
        <a href="{{ route('class') }}" class="text-blue-900 hover:text-blue-900 flex items-center">
            <div
                class="inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-white border-2 border-blue-900 rounded-full flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 md:w-6 md:h-6 text-blue-900"
                    stroke="currentColor" stroke-width="2" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </a>
        <div class="flex-1 flex justify-center min-w-0">
            <div
                class="flex items-center space-x-2 md:space-x-3 border-2 border-blue-900 rounded-xl bg-blue-100 px-4 py-2 md:px-6 md:py-3 truncate max-w-full">
                <h2 class="text-sm sm:text-lg md:text-xl font-bold text-blue-900 truncate">LICENSE CLASS DETAILS</h2>
            </div>
        </div>
        <div class="w-10 md:w-12 flex-shrink-0"></div>
    </div>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div
            class="relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 shadow-2xl p-8 md:p-12 lg:p-16 text-white isolate">
            <!-- Decorative blobs -->
            <div
                class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse">
            </div>
            <div
                class="absolute -bottom-24 -right-24 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-700">
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center relative z-10">
                <!-- Image Column -->
                <div class="flex justify-center">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-3xl transform rotate-3 scale-105 transition-transform duration-500 group-hover:rotate-6">
                        </div>
                        <img src="{{ asset($class->class_image) }}" alt="{{ $class->class_code }}"
                            class="relative w-64 md:w-80 lg:w-96 rounded-2xl shadow-2xl transform transition-transform duration-500 group-hover:scale-105 group-hover:-rotate-3 object-cover">
                    </div>
                </div>

                <!-- Content Column -->
                <div class="space-y-8 text-center md:text-left">
                    <div>
                        <span
                            class="inline-block px-6 py-3 rounded-full bg-blue-500/30 border border-blue-400/30 text-blue-200 text-sm font-medium mb-4 backdrop-blur-sm">
                            {{ $class->class_name }}
                        </span>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight mb-4">
                            Class <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">{{ $class->class_code }}</span>
                        </h1>
                        <p class="text-lg text-blue-100/80 max-w-lg mx-auto md:mx-0 leading-relaxed">
                            Start your journey with our comprehensive driving course designed for safety and confidence.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @auth
                            <a href="{{ route('apply') }}"
                                class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-blue-900 transition-all duration-200 bg-white rounded-full hover:bg-blue-50 hover:scale-105 hover:shadow-lg focus:outline-none ring-offset-2 focus:ring-2">
                                <span>APPLY NOW</span>
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @else
                            <button type="button" onclick="openLoginModal()"
                                class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-blue-900 transition-all duration-200 bg-white rounded-full hover:bg-blue-50 hover:scale-105 hover:shadow-lg focus:outline-none ring-offset-2 focus:ring-2">
                                <span>APPLY NOW</span>
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                        @endauth

                        <button data-collapse-toggle="details-section"
                            class="inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 border-2 border-white/30 rounded-full hover:bg-white/10 hover:border-white hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                            MORE INFO
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section id="details-section" class="hidden max-w-5xl mx-auto px-4 py-12 md:py-20 relative">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Roadmap to Success</span>
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2">Course Curriculum</h2>
        </div>

        <div class="relative space-y-12">
            <!-- Vertical Connecting Line -->
            <div
                class="absolute left-6 md:left-1/2 top-4 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 via-blue-400 to-transparent -translate-x-1/2 block">
            </div>

            <!-- Level 1 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="hidden md:block flex-1 text-right">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">Level 1:
                        KPP01</h3>
                    <p class="text-blue-600 font-medium">Highway Code Class</p>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-white border-4 border-blue-500 text-blue-900 font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 mx-0 md:mx-0">
                    1
                </div>

                <div class="flex-1 md:hidden pl-4 -mt-14 mb-4 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 1: KPP01</h3>
                    <p class="text-blue-600 font-medium">Highway Code Class</p>
                </div>

                <div class="flex-1 pl-12 md:pl-0">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -left-2 w-4 h-4 bg-white transform rotate-45 border-l border-b border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>6 Hours (9.00 AM – 3.30 PM)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <span>1 IC Copy & Thumbprint</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Malay (Sat/Sun)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Level 2 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="flex-1 text-right order-3 md:order-1 md:text-left pl-16 md:pl-0 w-full">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -right-2 w-4 h-4 bg-white transform rotate-45 border-r border-t border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Duration: 1 Hour</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                    </path>
                                </svg>
                                <span>IC/Passport & RM10 Photo</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Pass Score: 42/50</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-white border-4 border-blue-500 text-blue-900 font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 order-1 md:order-2 mx-0 md:mx-0">
                    2
                </div>

                <div class="hidden md:block flex-1 md:order-3 pl-8">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">Level 2:
                        KPP01</h3>
                    <p class="text-blue-600 font-medium">Computer Test</p>
                </div>
                <div class="md:hidden flex-1 pl-4 -mt-14 mb-4 order-2 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 2: KPP01</h3>
                    <p class="text-blue-600 font-medium">Computer Test</p>
                </div>
            </div>

            <!-- Level 3 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="hidden md:block flex-1 text-right">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">Level 3:
                        KPP02</h3>
                    <p class="text-blue-600 font-medium">Maintenance & Circuit</p>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-white border-4 border-blue-500 text-blue-900 font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 mx-0 md:mx-0">
                    3
                </div>

                <div class="flex-1 md:hidden pl-4 -mt-14 mb-4 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 3: KPP02</h3>
                    <p class="text-blue-600 font-medium">Maintenance & Circuit</p>
                </div>

                <div class="flex-1 pl-16 md:pl-0 w-full">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -left-2 w-4 h-4 bg-white transform rotate-45 border-l border-b border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Weekdays & Weekends</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>1 Hour per session</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Level 4 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="flex-1 text-right order-3 md:order-1 md:text-left pl-16 md:pl-0 w-full">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -right-2 w-4 h-4 bg-white transform rotate-45 border-r border-t border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Weekdays & Weekends</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>12 Hours Total (1hr/session)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-white border-4 border-blue-500 text-blue-900 font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 order-1 md:order-2 mx-0 md:mx-0">
                    4
                </div>

                <div class="hidden md:block flex-1 md:order-3 pl-8">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">Level 4:
                        KPP03</h3>
                    <p class="text-blue-600 font-medium">Road Driving</p>
                </div>
                <div class="md:hidden flex-1 pl-4 -mt-14 mb-4 order-2 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 4: KPP03</h3>
                    <p class="text-blue-600 font-medium">Road Driving</p>
                </div>
            </div>

            <!-- Level 5 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="hidden md:block flex-1 text-right">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">Level 5: QTI
                    </h3>
                    <p class="text-blue-600 font-medium">Pre-Test Assessment</p>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-white border-4 border-blue-500 text-blue-900 font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 mx-0 md:mx-0">
                    5
                </div>

                <div class="flex-1 md:hidden pl-4 -mt-14 mb-4 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 5: QTI</h3>
                    <p class="text-blue-600 font-medium">Pre-Test Assessment</p>
                </div>

                <div class="flex-1 pl-16 md:pl-0 w-full">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -left-2 w-4 h-4 bg-white transform rotate-45 border-l border-b border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Duration: 1 Hour</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Route & Safety Check</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Level 6 -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start md:items-center group">
                <div class="flex-1 text-right order-3 md:order-1 md:text-left pl-16 md:pl-0 w-full">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 group-hover:shadow-lg transition-shadow relative">
                        <div
                            class="absolute top-6 -right-2 w-4 h-4 bg-white transform rotate-45 border-r border-t border-gray-100 hidden md:block">
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Mon & Wed (Selected)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Final Practical Test</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-green-500 border-4 border-green-100 text-white font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 order-1 md:order-2 mx-0 md:mx-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <div class="hidden md:block flex-1 md:order-3 pl-8">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">Level 6:
                        JPJ Test</h3>
                    <p class="text-green-600 font-medium">Final Assessment</p>
                </div>
                <div class="md:hidden flex-1 pl-4 -mt-14 mb-4 order-2 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 6: JPJ Test</h3>
                    <p class="text-green-600 font-medium">Final Assessment</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Packages -->
    <section class="max-w-7xl mx-auto px-4 py-16 mb-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Choose Your Package</h2>
            <p class="text-gray-500 mt-4 text-lg">Select the best driving course that fits your schedule.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 items-start">
            @foreach ($packages as $package)
                @php
                    $totalPrice = $class->class_price + $package->package_price;
                    $formattedPrice = number_format($totalPrice);

                    // Determine color theme based on package type
                    $theme = 'purple'; // Default
                    if (Str::contains(strtolower($package->package_type), 'premium')) {
                        $theme = 'yellow';
                    } elseif (Str::contains(strtolower($package->package_type), 'basic')) {
                        $theme = 'green';
                    }

                    // Define colors
                    $bgClass = "bg-{$theme}-100 border-{$theme}-100";
                    $gradientClass = "from-{$theme}-400 to-{$theme}-600";
                    if ($theme === 'purple') {
                        $bgClass = "bg-purple-200 border-purple-100";
                        $gradientClass = "from-purple-600 to-purple-800";
                    } elseif ($theme === 'green') {
                        $bgClass = "bg-green-100 border-green-100";
                        $gradientClass = "from-green-500 to-green-700";
                    }

                    // Define labels
                    $label = '';
                    if ($theme === 'purple') {
                        $label = 'Most Popular';
                    } elseif ($theme === 'yellow') {
                        $label = 'Most Suitable';
                    } elseif ($theme === 'green') {
                        $label = 'Most Affordable';
                    }
                @endphp

                <div
                    class="group relative {{ $bgClass }} rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border flex flex-col h-full">
                    <div class="bg-gradient-to-br {{ $gradientClass }} p-8 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl">
                        </div>
                        <h3 class="text-xl font-semibold opacity-90 mb-1">{{ $package->package_type }}</h3>
                        <div class="flex items-baseline gap-1">
                            <span class="text-sm font-light">RM</span>
                            <span class="text-4xl font-bold">{{ $formattedPrice }}</span>
                        </div>
                        @if ($label)
                            <div
                                class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                                {{ $label }}
                            </div>
                        @endif
                        @if ($theme === 'purple')
                            <div
                                class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                                More Flexible</div>
                            <div
                                class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                                Many Benefits</div>
                        @endif
                    </div>

                    <div class="p-8 flex-1">
                        <!-- Since specific benefits might be static per package type or stored in DB, keeping static for now but loop structure ready. 
                                  Ideally, package benefits should be in a separate table or json column. 
                                  For now, I will use the existing static lists mapped by theme/type logic for demonstration if needed, 
                                  or just reuse the list layout with generic text if dynamic data isn't available for benefits.
                                  Given user request "retrieve data from database package_type and total", I will assume benefits are standard for now or hardcoded based on type.
                             -->
                        <ul class="space-y-4 text-gray-600 text-sm leading-relaxed">
                            @if ($theme === 'purple')
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Duration: <span class="font-semibold text-gray-900">3 – 4 Months</span></span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Theory Test: <span class="text-green-600 font-semibold">First Free</span></span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Theory Re-test: <span class="font-semibold text-gray-900">3 Free</span> (Save
                                        RM180)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Schedule: Weekdays & Weekends</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Classes: <span class="font-semibold text-gray-900">Unlimited Weekly</span></span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>WhatsApp Notification</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>KPP2 + KPP3 (18 Hours)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>QTI & JPJ Re-test: <span class="font-bold text-purple-700">Unlimited Free</span> + 2hr
                                        Training</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>SDC Portal Access</span>
                                </li>

                            @elseif ($theme === 'yellow')
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Duration: 8 – 10 Months</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Theory Test: <span class="text-green-600 font-semibold">First Free</span></span>
                                </li>
                                <li class="flex items-start gap-3 text-gray-400">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Theory Re-test: Pay per attempt</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Schedule: Weekdays Only</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Classes: Max 2 per week</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>WhatsApp Notification</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>KPP2 + KPP3 (18 Hours)</span>
                                </li>
                                <li class="flex items-start gap-3 text-gray-400">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>QTI & JPJ Re-test: Pay per attempt</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>SDC Portal Access</span>
                                </li>
                            @else
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Duration: 8 – 10 Months</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Theory Test: <span class="text-green-600 font-semibold">First Free</span></span>
                                </li>
                                <li class="flex items-start gap-3 text-gray-400">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Theory Re-test: Pay per attempt</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Schedule: Weekdays Only</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Classes: Max 2 per week</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>WhatsApp Notification</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>KPP2 + KPP3 (18 Hours)</span>
                                </li>
                                <li class="flex items-start gap-3 text-gray-400">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>QTI & JPJ Re-test: Pay per attempt</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>SDC Portal Access</span>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('footer')

</body>

</html>