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

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-8 flex items-center justify-between">
        <a href="{{ route('class') }}" class="text-blue-900 hover:text-blue-900 flex items-center">
            <div
                class="inline-flex items-center justify-center w-12 h-12 bg-white border-2 border-blue-900 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-blue-900"
                    stroke="currentColor" stroke-width="2" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </a>
        <div class="flex-1 flex justify-center">
            <div class="flex items-center space-x-3 border-2 border-blue-900 rounded-xl bg-blue-100 px-6 py-3">
                <h2 class="text-xl font-bold text-blue-900">LICENSE CLASS DETAILS</h2>
            </div>
        </div>
        <div class="w-12"></div>
    </div>

    <!-- Title & Image -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row items-center justify-center gap-6">

            <img src="{{ asset($class->image) }}" alt="{{ $class->name }}" class="w-60 hover:scale-110 transition">

            <div class="flex flex-col items-center gap-4">
                <a href="#"
                    class="rounded-full border-2 border-red-600 text-red-600 bg-transparent font-bold px-8 py-4 w-72 text-center hover:scale-110 transition">
                    Class {{ $class->name }}
                </a>
                <a href="{{ route('apply') }}"
                    class="rounded-full border-2 border-white text-white bg-red-600 font-bold px-8 py-4 w-72 text-center hover:scale-110 transition">
                    APPLY
                </a>
                <a href="#" data-collapse-toggle="details-section"
                    class="rounded-full border-2 border-red-600 text-red-600 bg-transparent font-bold px-8 py-4 w-72 text-center hover:scale-110 transition">
                    MORE INFO
                </a>
            </div>
        </div>
    </div>

    <section id="details-section" class="hidden max-w-7xl mx-auto px-4 py-8">
        <div class="bg-blue-900 p-6 rounded-3xl shadow-md border-4 border-blue-900 space-y-6">

            <!-- 1st Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">1</span>
                </div>
                <div>
                    <h4 class="font-bold">1st Level – KPP01 – Highway Code Class (6 Hours)</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Duration: 6 Hours (9.00 AM – 3.30 PM)
                            including breaktime</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Registration: 1 IC copy & Thumbprint
                            Counter</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Availability: Bahasa Malaysia (Every
                            Saturday / Sunday)</li>
                    </ul>
                </div>
            </div>

            <!-- 2nd Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">2</span>
                </div>
                <div>
                    <h4 class="font-bold">2nd Level – KPP01 – Computer Test</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Duration: 1 Hour</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Mandatory Document: IC/Passport, RM10.00
                            digital photo</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Results: 42/50</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Submission to JPJ within 14 working days
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 3rd Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">3</span>
                </div>
                <div>
                    <h4 class="font-bold">3rd Level – KPP02 – Maintenance and Circuit Driving</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Availability: Weekdays & Weekends, 1
                            Hour every session</li>
                    </ul>
                </div>
            </div>

            <!-- 4th Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">4</span>
                </div>
                <div>
                    <h4 class="font-bold">4th Level – KPP03 – Road and Driving</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Availability: Weekdays & Weekends, 12
                            Hours in total (1 hour every session)</li>
                    </ul>
                </div>
            </div>

            <!-- 5th Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">5</span>
                </div>
                <div>
                    <h4 class="font-bold">5th Level – QTI</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Availability: Weekdays & Weekends, 1
                            Hour</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">KPP02 Route Maintenance Check & KPP03
                            Safety Routine Check and Internal Road Riding</li>
                    </ul>
                </div>
            </div>

            <!-- 6th Level -->
            <div class="border-2 bg-white border-blue-900 p-4 rounded-3xl flex items-start gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-green-300 text-green-700 flex-shrink-0">
                    <span class="font-bold">6</span>
                </div>
                <div>
                    <h4 class="font-bold">6th Level – JPJ Practical Test</h4>
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li class="border border-blue-900 rounded-lg px-3 py-1">Availability: Every Monday and Selected
                            Wednesday (except public holidays)</li>
                        <li class="border border-blue-900 rounded-lg px-3 py-1">KPP02 Route Maintenance Check & KPP03
                            Safety Routine Check and Internal Road Riding</li>
                    </ul>
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

            <!-- Preferred++ -->
            <div
                class="group relative bg-purple-200 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-purple-100 flex flex-col h-full">
                <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl">
                    </div>
                    <h3 class="text-xl font-semibold opacity-90 mb-1">Preferred++</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-sm font-light">RM</span>
                        <span class="text-4xl font-bold">3,799</span>
                    </div>
                    <div
                        class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                        Most Popular
                    </div>
                    <div
                        class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                        More Flexible
                    </div>
                    <div
                        class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                        Many Benefits
                    </div>
                </div>

                <div class="p-8 flex-1">
                    <ul class="space-y-4 text-gray-600 text-sm leading-relaxed">
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
                    </ul>
                </div>
            </div>

            <!-- Premium+ -->
            <div
                class="group relative bg-yellow-100 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-yellow-100 flex flex-col h-full">
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl">
                    </div>
                    <h3 class="text-xl font-semibold opacity-90 mb-1">Premium+</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-sm font-light">RM</span>
                        <span class="text-4xl font-bold">3,499</span>
                    </div>
                    <div
                        class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                        Most Suitable
                    </div>
                </div>

                <div class="p-8 flex-1">
                    <ul class="space-y-4 text-gray-600 text-sm leading-relaxed">
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
                    </ul>
                </div>
            </div>

            <!-- Basic -->
            <div
                class="group relative bg-green-100 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-green-100 flex flex-col h-full">
                <div class="bg-gradient-to-br from-green-500 to-green-700 p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl">
                    </div>
                    <h3 class="text-xl font-semibold opacity-90 mb-1">Basic</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-sm font-light">RM</span>
                        <span class="text-4xl font-bold">3,499</span>
                    </div>
                    <div
                        class="mt-4 inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm border border-white/10">
                        Most Affordable
                    </div>
                </div>

                <div class="p-8 flex-1">
                    <ul class="space-y-4 text-gray-600 text-sm leading-relaxed">
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
                    </ul>
                </div>
            </div>

        </div>
    </section>

    @include('footer')

</body>

</html>