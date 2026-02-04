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
    @include('ui.user.header')

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-8 md:py-12 flex items-center justify-between">
        <a href="{{ route('class') }}" class="text-blue-900 hover:text-blue-900 flex items-center">
            <div
                class="group flex items-center justify-center w-12 h-12 bg-white rounded-full shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 ring-1 ring-gray-100/50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-blue-900 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </div>
        </a>
        <div class="flex-1 flex justify-start min-w-0 px-4">
            <h1 class="text-xl md:text-2xl font-bold text-black">Package Details</h1>
        </div>
        <div class="w-10 md:w-12 flex-shrink-0"></div>
    </div>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-2">
        <div
            class="relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 shadow-2xl p-8 md:p-12 lg:p-16 text-white isolate">
            <div class="grid md:grid-cols-2 gap-12 items-center relative z-10">
                <!-- Image Column -->
                <div class="flex justify-center">
                    <div class="relative group">
                        <img src="{{ asset($class->class_image) }}" alt="{{ $class->class_code }}"
                            class="relative w-64 md:w-80 lg:w-96 rounded-2xl shadow-2xl object-cover">
                    </div>
                </div>

                <!-- Content Column -->
                <div class="space-y-8 text-center md:text-left">
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight mb-4">
                            Class <span class="text-white">{{ $class->class_code }}</span>
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
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">Level 5:
                        JPJ Test</h3>
                    <p class="text-green-600 font-medium">Final Assessment</p>
                </div>

                <div
                    class="relative z-10 w-12 h-12 rounded-full bg-green-500 border-4 border-green-100 text-white font-black flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform flex-shrink-0 mx-0 md:mx-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <div class="flex-1 md:hidden pl-4 -mt-14 mb-4 ml-12">
                    <h3 class="text-xl font-bold text-gray-900">Level 5: JPJ Test</h3>
                    <p class="text-green-600 font-medium">Final Assessment</p>
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
            </div>

        </div>
    </section>

    <!-- Packages -->
    <section class="max-w-7xl mx-auto px-4 py-16 mb-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Choose Your Package</h2>
            <p class="text-gray-500 mt-4 text-md">Select the best driving package that fits your needs.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 items-start">
            @foreach ($packages as $package)
                @php
                    $totalPrice = $class->class_price + $package->package_price;
                    $formattedPrice = number_format($totalPrice);

                    $theme = 'blue';
                    if (Str::contains(strtolower($package->package_type), 'premium')) {
                        $theme = 'amber';
                    } elseif (Str::contains(strtolower($package->package_type), 'basic')) {
                        $theme = 'green';
                    }

                    if ($theme === 'blue') {
                        $borderColor = 'border-blue-200 hover:border-blue-700';
                        $textColor = 'text-blue-900';
                        $priceColor = 'text-gray-900';
                        $badgeBg = 'bg-blue-900 text-white border-blue-100';
                        $btnBg = 'bg-blue-800 hover:bg-blue-900 text-white';
                        $iconColor = 'text-blue-700';
                        $dividerBg = 'bg-blue-700';
                    } elseif ($theme === 'green') {
                        $borderColor = 'border-green-200 hover:border-green-500';
                        $textColor = 'text-green-700';
                        $priceColor = 'text-gray-900';
                        $badgeBg = 'bg-green-600 text-white border-green-100';
                        $btnBg = 'bg-green-600 hover:bg-green-700 text-white';
                        $iconColor = 'text-green-600';
                        $dividerBg = 'bg-green-500';
                    } elseif ($theme === 'amber') {
                        $borderColor = 'border-amber-200 hover:border-amber-500';
                        $textColor = 'text-amber-500';
                        $priceColor = 'text-gray-900';
                        $badgeBg = 'bg-amber-500 text-white border-amber-100';
                        $btnBg = 'bg-amber-500 hover:bg-amber-600 text-white';
                        $iconColor = 'text-amber-500';
                        $dividerBg = 'bg-amber-500';
                    }

                    // Define labels
                    $label = '';
                    if ($theme === 'blue') {
                        $label = 'Most Popular';
                    } elseif ($theme === 'amber') {
                        $label = 'Best Value';
                    } elseif ($theme === 'green') {
                        $label = 'Most Affordable';
                    }
                @endphp

                <div
                    class="group relative bg-white rounded-[2rem] p-8 border-2 {{ $borderColor }} transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">

                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold {{ $textColor }} uppercase tracking-wide">
                                {{ $package->package_type }}
                            </h3>
                            @if ($label)
                                <span
                                    class="px-4 py-2 rounded-full text-[10px] font-bold uppercase tracking-wider border {{ $badgeBg }}">
                                    {{ $label }}
                                </span>
                            @endif
                        </div>

                        <div class="flex items-baseline gap-1 mt-2">
                            <span class="text-sm font-medium text-gray-500">RM</span>
                            <span
                                class="text-5xl font-extrabold {{ $priceColor }} tracking-tight">{{ $formattedPrice }}</span>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="w-full h-px {{ $dividerBg }} mb-6"></div>

                    <!-- Features -->
                    <div class="flex-1">
                        <div
                            class="prose prose-sm text-gray-600 prose-ul:p-0 prose-li:list-none prose-li:flex prose-li:items-start prose-li:gap-6 prose-li:mb-10 prose-li:text-[0.8rem] prose-li:leading-relaxed last:prose-li:mb-0">
                            <div class="package-desc-{{ $package->id }}">
                                {!! $package->package_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('ui.user.footer')

</body>

</html>