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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4.1.3/dist/tesseract.min.js"></script>
    <style>
        .loader {
            --d: 22px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            color: #25b09b;
            box-shadow:
                calc(1*var(--d)) calc(0*var(--d)) 0 0,
                calc(0.707*var(--d)) calc(0.707*var(--d)) 0 1px,
                calc(0*var(--d)) calc(1*var(--d)) 0 2px,
                calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
                calc(-1*var(--d)) calc(0*var(--d)) 0 4px,
                calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
                calc(0*var(--d)) calc(-1*var(--d)) 0 6px;
            animation: l27 1s infinite steps(8);
        }

        @keyframes l27 {
            100% {
                transform: rotate(1turn)
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }
    </style>
</head>

<body class="font-poppins bg-gray-100 text-white">
    @include('header')

    @if(isset($hasActiveApplication) && $hasActiveApplication)
        <!-- Application Exists Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/80 backdrop-blur-sm">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 text-center m-4 animate-fadeIn">
                <div class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Application Exists</h3>
                
                <p class="text-gray-500 mb-8 leading-relaxed">
                    You can apply again until you have completed the license that you applied for previously.
                </p>

                <a href="{{ route('home') }}" class="block w-full text-white bg-blue-800 hover:bg-blue-800 font-bold rounded-2xl text-lg px-5 py-4 text-center shadow-lg transition-all transform hover:-translate-y-0.5">
                    Back to Home
                </a>
            </div>
        </div>
    @endif

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-4 md:py-8 flex items-center justify-between gap-2">
        <a href="{{ url()->previous() }}" class="text-blue-900 hover:text-blue-900 flex items-center">
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
                <h2 class="text-sm sm:text-lg md:text-xl font-bold text-blue-900 truncate">APPLICATION FORM</h2>
            </div>
        </div>
        <div class="w-10 md:w-12 flex-shrink-0"></div>
    </div>

    <section class="w-full flex flex-col lg:flex-row gap-4 md:gap-8 py-4 md:py-6 px-4 md:px-8 lg:px-12 xl:px-48 mb-10">
        <div id="formSection" class="w-full min-w-0 bg-white rounded-3xl p-8 text-black hover:shadow-2xl">

            <form id="registrationForm" action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5 text-base px-2 md:px-6 lg:px-8">
                @csrf
                <div class="relative flex flex-col md:flex-row items-center justify-center py-3 px-4 gap-2 md:gap-0">
                    <div class="md:absolute md:left-4">
                        <img src="/image/icon/logo.png" alt="logo" class="h-14 md:h-16 w-auto">
                    </div>
                    <div class="flex flex-col items-center text-center w-full">
                        <span class="text-xs sm:text-base md:text-xl font-semibold text-gray-800 tracking-wide">MOLEK
                            DRIVING ACADEMY SDN BHD</span>
                        <span class="text-sm sm:text-lg md:text-2xl font-bold text-gray-900 mt-1 md:mt-0">PERMOHONAN
                            PENDAFTARAN LESEN MEMANDU</span>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div
                        class="flex items-center gap-3 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-r shadow-sm max-w-2xl w-full">
                        <svg class="w-6 h-6 flex-shrink-0 text-yellow-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="font-medium text-sm md:text-base">
                            Note: You need to verify the information first before you can proceed with the application.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- IC Number -->
                    <div class="relative">
                        <label for="icNumber" class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">IC
                            Number</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7">
                                    <path fill-rule="evenodd"
                                        d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="icNumber" name="ic" type="text" placeholder="e.g. 990101011234"
                                class="w-full rounded-lg pl-14 p-3 bg-white border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all shadow-sm text-gray-900 placeholder-gray-400 font-medium text-base">
                        </div>
                        <p id="icError" class="text-red-500 text-xs mt-1 hidden">IC must be numeric, 12 digits.</p>
                    </div>

                    <!-- Age -->
                    <div class="relative">
                        <label for="age"
                            class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Age</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="size-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="age" name="age" type="text" readonly
                                class="w-full rounded-lg pl-14 p-3 bg-gray-50 border border-gray-300 text-gray-500 cursor-not-allowed focus:outline-none shadow-sm text-base font-medium">
                        </div>
                        <p id="ageError" class="text-green-600 text-xs mt-1 hidden font-medium">
                            You eligible to take the license class.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Full Name -->
                    <div class="relative">
                        <label for="fullName" class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Full
                            Name</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="fullName" name="full_name" type="text" placeholder="As per IC"
                                class="w-full rounded-lg pl-14 p-3 bg-white border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all shadow-sm text-gray-900 placeholder-gray-400 font-medium text-base">
                        </div>
                        <p id="nameError" class="text-red-500 text-xs mt-1 hidden">
                            Name should contain only letters and spaces.
                        </p>
                    </div>

                    <!-- Phone -->
                    <div class="relative">
                        <label for="phoneNumber"
                            class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Phone
                            Number</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="phoneNumber" name="phone" type="text" placeholder="0123456789"
                                class="w-full rounded-lg pl-14 p-3 bg-white border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all shadow-sm text-gray-900 placeholder-gray-400 font-medium text-base">
                        </div>
                        <p id="phoneError" class="text-red-500 text-xs mt-1 hidden">
                            Phone number must be 9–11 digits.
                        </p>
                    </div>
                </div>

                <!-- Address -->
                <div class="relative">
                    <label for="address"
                        class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Address</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-7">
                                <path
                                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                <path
                                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                            </svg>
                        </span>

                        <input id="address" name="address" type="text" placeholder="Full residential address"
                            class="w-full rounded-lg pl-14 p-3 bg-white border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all shadow-sm text-gray-900 placeholder-gray-400 font-medium text-base">
                    </div>
                    <p id="addressError" class="text-red-500 text-xs mt-1 hidden">
                        Address must be at least 5 characters.
                    </p>
                </div>

                <!-- License Class -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <label for="licenseClass"
                            class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">License
                            Class</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M4 7h16M4 12h16M4 17h16" />
                                </svg>
                            </span>
                            <select id="licenseClass" name="class_id"
                                class="w-full rounded-lg p-3 pl-14 bg-white border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none appearance-none transition-all shadow-sm text-gray-900 font-medium text-base cursor-pointer">
                                <option value="" disabled selected>Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->class_id }}" data-price="{{ $class->class_price }}">
                                        {{ $class->class_code }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Package Selection (Cards) -->
                    <div class="col-span-1 md:col-span-2">
                        <span class="block mb-3 text-base font-semibold text-gray-700 uppercase">Select Package</span>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($packages as $pkg)
                                @php
                                    $type = strtolower($pkg->package_type);
                                    // Default styles
                                    $borderColor = 'border-gray-200';
                                    $checkedBorder = 'peer-checked:border-blue-900';
                                    $checkedBg = 'peer-checked:bg-blue-50';
                                    $iconColor = 'text-gray-400';
                                    $checkedIconColor = 'peer-checked:text-blue-900';
                                    $hoverBorder = 'hover:border-blue-400';

                                    // Validation/Theme logic based on type name (Basic, Premium, Preferred etc)
                                    if (Str::contains($type, 'premium')) {
                                        $checkedBorder = 'peer-checked:border-yellow-500';
                                        $checkedBg = 'peer-checked:bg-yellow-50';
                                        $checkedIconColor = 'peer-checked:text-yellow-600';
                                        $hoverBorder = 'hover:border-yellow-400';
                                    } elseif (Str::contains($type, 'basic')) {
                                        $checkedBorder = 'peer-checked:border-green-500';
                                        $checkedBg = 'peer-checked:bg-green-50';
                                        $checkedIconColor = 'peer-checked:text-green-600';
                                        $hoverBorder = 'hover:border-green-400';
                                    } elseif (Str::contains($type, 'preferred') || Str::contains($type, 'preffered')) {
                                        $checkedBorder = 'peer-checked:border-purple-500';
                                        $checkedBg = 'peer-checked:bg-purple-50';
                                        $checkedIconColor = 'peer-checked:text-purple-600';
                                        $hoverBorder = 'hover:border-purple-400';
                                    }
                                @endphp
                                <label class="cursor-pointer group relative">
                                    <input type="radio" name="package_id" value="{{ $pkg->package_id }}"
                                        data-type="{{ $type }}" data-name="{{ $pkg->package_type }}"
                                        data-price="{{ $pkg->package_price }}" class="peer sr-only">

                                    <div
                                        class="p-5 rounded-2xl border {{ $borderColor }} bg-white transition-all duration-300 shadow-sm 
                                                                                        {{ $hoverBorder }} hover:shadow-md 
                                                                                        {{ $checkedBorder }} {{ $checkedBg }} peer-checked:shadow-lg h-full flex flex-col justify-between">

                                        <div class="flex justify-between items-start mb-3">
                                            <div class="p-2 rounded-lg bg-gray-50 group-hover:bg-white transition-colors">
                                                <!-- Dynamic Icon based on type -->
                                                @if (Str::contains($type, 'premium'))
                                                    <svg class="w-6 h-6 {{ $iconColor }} group-hover:text-yellow-500 {{ $checkedIconColor }} transition-colors"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                    </svg>
                                                @elseif (Str::contains($type, 'basic'))
                                                    <svg class="w-6 h-6 {{ $iconColor }} group-hover:text-green-500 {{ $checkedIconColor }} transition-colors"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-6 h-6 {{ $iconColor }} group-hover:text-purple-500 {{ $checkedIconColor }} transition-colors"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                <div
                                                    class="w-6 h-6 rounded-full bg-current text-current flex items-center justify-center {{ $checkedIconColor }}">
                                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h4
                                                class="font-bold text-gray-900 text-lg mb-1 group-hover:text-blue-900 transition-colors">
                                                {{ $pkg->package_type }}
                                            </h4>
                                            <span
                                                class="block text-2xl font-black text-gray-900 group-hover:scale-105 origin-left transition-transform">
                                                <span
                                                    class="text-sm font-medium text-gray-500 align-top mr-1">RM</span>{{ $pkg->package_price }}
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <!-- Hidden input to maintain compatibility if logic expects specific select/input behavior elsewhere, though radios usually standard -->
                    </div>
                </div>

                <!-- Payment Type -->
                <div>
                    <span class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Payment Type</span>

                    <ul class="grid w-full gap-4 md:grid-cols-2 items-stretch">

                        <!-- FULL PAYMENT -->
                        <li class="relative">
                            <input type="radio" id="payment-full" name="payment_type" value="full" class="hidden peer"
                                required>

                            <label for="payment-full" class="h-full flex flex-col justify-start w-full p-5 bg-white border border-gray-200 rounded-2xl cursor-pointer 
                            transition-all duration-300 ease-out shadow-sm peer-checked:shadow-lg peer-checked:border-blue-900 peer-checked:bg-blue-50/50 
                            hover:border-blue-400 hover:shadow-md group relative overflow-hidden">

                                <div
                                    class="absolute top-0 right-0 w-16 h-16 bg-blue-900/5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110">
                                </div>

                                <div class="flex justify-between items-start mb-4 relative z-10">
                                    <div
                                        class="p-2 bg-blue-100 rounded-lg text-blue-900 group-peer-checked:bg-blue-900 group-peer-checked:text-white transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                        </svg>
                                    </div>
                                    <div class="hidden peer-checked:block text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="block relative z-10">
                                    <div class="w-full text-lg font-bold text-gray-900 mb-1">Full Payment</div>
                                    <div class="w-full text-sm text-gray-500 mb-3 leading-relaxed">Single payment for
                                        the complete package.</div>
                                    <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-semibold text-gray-600">Total</span>
                                            <span class="text-base font-bold text-blue-900">RM 0</span>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <!-- INSTALLMENT -->
                        <li class="relative">
                            <input type="radio" id="payment-installment" name="payment_type" value="installment"
                                class="hidden peer">

                            <label for="payment-installment" class="h-full flex flex-col justify-between w-full p-5 bg-white border border-gray-200 rounded-2xl cursor-pointer 
                            transition-all duration-300 ease-out shadow-sm peer-checked:shadow-lg peer-checked:border-blue-900 peer-checked:bg-blue-50/50 
                            hover:border-blue-400 hover:shadow-md group relative overflow-hidden">

                                <div
                                    class="absolute top-0 right-0 w-16 h-16 bg-blue-900/5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110">
                                </div>

                                <div class="flex justify-between items-start mb-4 relative z-10">
                                    <div
                                        class="p-2 bg-blue-100 rounded-lg text-blue-900 group-peer-checked:bg-blue-900 group-peer-checked:text-white transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    <div class="hidden peer-checked:block text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="block relative z-10">
                                    <div class="w-full text-lg font-bold text-gray-900 mb-1">Installment Plan</div>
                                    <div class="w-full text-sm text-gray-500 mb-3 leading-relaxed">Flexible payment in 3
                                        stages.</div>
                                    <div class="space-y-2">
                                        <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-semibold text-gray-600">Stage 1</span>
                                                <span class="text-base font-bold text-blue-900">RM 0</span>
                                            </div>
                                        </div>
                                        <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-semibold text-gray-600">Stage 2</span>
                                                <span class="text-base font-bold text-blue-900">RM 0</span>
                                            </div>
                                        </div>
                                        <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-semibold text-gray-600">Stage 3</span>
                                                <span class="text-base font-bold text-blue-900">RM 0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </li>

                    </ul>
                </div>

                <!-- Upload Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Upload MyKad -->
                    <div class="w-full">
                        <label for="myKad" class="block mb-1.5 text-base font-semibold text-gray-700 uppercase">Upload
                            MyKad</label>
                        <input id="myKad" name="ic_file" type="file" aria-describedby="myKad_help"
                            class="block w-full text-base text-gray-500
                            file:mr-4 file:py-3 file:px-4
                            file:rounded-l-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700
                            hover:file:bg-blue-100
                            bg-white border border-gray-300 rounded-lg cursor-pointer 
                            focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm transition-all duration-200">
                        <p id="myKad_help" class="mt-1 text-sm text-gray-600">
                            JPG, PNG, or PDF (MAX. 2MB)
                        </p>
                        <p id="myKadICNotification" class="text-red-500 text-xs mt-1 hidden font-medium">
                            IC number not found in the uploaded file. Please check your document.
                        </p>

                        <p id="myKadError" class="text-red-500 text-xs mt-1 hidden font-medium">Please upload your
                            MyKad.</p>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start relative">
                    <input id="agreeTerms" type="checkbox" class="peer sr-only" />

                    <label for="agreeTerms"
                        class="cursor-pointer w-6 h-6 border-2 border-gray-300 rounded-lg bg-white 
                               peer-checked:bg-blue-900 peer-checked:border-blue-900 
                               transition-all duration-200 flex items-center justify-center hover:border-blue-500 shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </label>

                    <div class="ms-3 peer-checked:[&_#rightIcon]:opacity-100 peer-checked:[&_#rightIcon]:translate-x-0">
                        <label for="agreeTerms"
                            class="cursor-pointer select-none flex items-center gap-2 text-base font-medium text-gray-900 group">
                            Agree with our terms & conditions
                            <svg id="rightIcon"
                                class="w-5 h-5 text-green-600 opacity-0 -translate-x-2 transition-all duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </label>
                        <p id="termsHelper" class="text-sm font-normal text-gray-500 mt-1">
                            Please read our <a href="#" class="text-blue-600 hover:underline">terms and
                                conditions</a> before proceeding.
                        </p>
                    </div>
                </div>
                <p id="termsError" class="text-red-500 text-base mt-1 hidden">
                    You must agree to the terms.
                </p>

                <!-- Next Button -->
                <div class="flex justify-end">
                    <button id="nextBtn" type="button"
                        class="group relative inline-flex items-center justify-center px-8 py-3 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-blue-900 to-blue-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 hover:from-blue-800 hover:to-blue-700 hover:shadow-lg hover:-translate-y-0.5">
                        Next
                        <svg class="w-5 h-5 ml-2 -mr-1 transition-transform duration-200 group-hover:translate-x-1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div id="verifySection"
            class="w-0 flex-[0] min-w-0 space-y-4 opacity-0 overflow-hidden transition-all duration-[3000ms] ease-in-out z-0">
            <!-- Invoice Summary Card -->
            <div
                class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-blue-950 to-blue-900 text-white rounded-2xl shadow-2xl p-6 md:p-8 transform transition-all hover:scale-[1.01] duration-300 border border-blue-800/50">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-blue-400 opacity-10 rounded-full blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-0 -mb-8 -ml-8 w-40 h-40 bg-purple-500 opacity-10 rounded-full blur-3xl">
                </div>

                <div class="relative flex flex-col gap-6">
                    <!-- Header -->
                    <div class="flex items-center gap-3 border-b border-blue-700/50 pb-4">
                        <div class="p-2 bg-blue-800/30 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold uppercase tracking-wider text-gray-100">Application Summary
                            </h3>
                            <p class="text-xs text-blue-300/80 font-light">Invoice Breakdown</p>
                        </div>
                    </div>

                    <!-- Line Items -->
                    <div class="space-y-3 text-sm">
                        <!-- Class Item -->
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <span class="text-gray-300">License Class</span>
                                <span id="summaryClassName" class="font-medium text-white text-base">Select a
                                    class</span>
                            </div>
                            <span id="summaryClassPrice" class="font-semibold text-blue-200">RM 0.00</span>
                        </div>

                        <!-- Package Item -->
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <span class="text-gray-300">Package Type</span>
                                <span id="summaryPackageName" class="font-medium text-white text-base">Select a
                                    package</span>
                            </div>
                            <span id="summaryPackagePrice" class="font-semibold text-blue-200">RM 0.00</span>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t-2 border-dashed border-blue-800/50"></div>

                    <!-- Total -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2 md:gap-0">
                        <div class="flex flex-col">
                            <span class="text-blue-300 text-sm uppercase tracking-wider font-semibold">Total
                                Payable</span>
                            <span class="text-xs text-blue-400 font-light" id="paymentTypeLabel">Full Payment</span>
                        </div>
                        <div class="flex items-baseline">
                            <span class="text-base md:text-lg font-medium text-blue-300 mr-1">RM</span>
                            <span id="summaryAmount"
                                class="text-xl md:text-xl font-extrabold text-white tracking-tight drop-shadow-md">0.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <button id="apply" type="submit" form="registrationForm" disabled
                class="w-full group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-blue-500 to-blue-400 rounded-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:shadow-lg hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 disabled:hover:shadow-none">
                <span id="btnText">Apply Now</span>
            </button>

            <button id="verify" type="button"
                class="w-full group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-blue-900 to-blue-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 hover:shadow-lg hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <span id="btnText">Auto Verify</span>
            </button>

            <div id="verifyLoader" class="w-full flex justify-center mt-6 py-8 hidden">
                <div class="loader"></div>
            </div>
            <div id="verifyResults" class="mt-6 flex flex-col gap-3 hidden opacity-0 transition-all duration-500">
            </div>
        </div>
    </section>

    @include('footer')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const packageRadios = document.querySelectorAll('input[name="package_id"]');
            const classSelect = document.getElementById('licenseClass');
            const summaryAmount = document.getElementById('summaryAmount');
            const fullPaymentAmount = document.querySelector('label[for="payment-full"] .text-blue-900.font-bold'); // Selects the RM 1599

            // Installment elements
            const installmentStage1 = document.querySelector('label[for="payment-installment"] .space-y-2 > div:nth-child(1) .text-blue-900');
            const installmentStage2 = document.querySelector('label[for="payment-installment"] .space-y-2 > div:nth-child(2) .text-blue-900');
            const installmentStage3 = document.querySelector('label[for="payment-installment"] .space-y-2 > div:nth-child(3) .text-blue-900');

            const paymentRadios = document.querySelectorAll('input[name="payment_type"]');

            const summaryClassName = document.getElementById('summaryClassName');
            const summaryClassPrice = document.getElementById('summaryClassPrice');
            const summaryPackageName = document.getElementById('summaryPackageName');
            const summaryPackagePrice = document.getElementById('summaryPackagePrice');
            const paymentTypeLabel = document.getElementById('paymentTypeLabel');

            function calculateTotal() {
                const classOption = classSelect.options[classSelect.selectedIndex];
                const selectedPackageRadio = document.querySelector('input[name="package_id"]:checked');

                // Check if options are valid (disabled 'Select Class' has no data-price)
                if (!classOption || classOption.disabled || !selectedPackageRadio) {
                    return; // Don't calculate if valid options aren't selected
                }

                const classPrice = parseFloat(classOption.getAttribute('data-price')) || 0;
                const packagePrice = parseFloat(selectedPackageRadio.getAttribute('data-price')) || 0;
                const packageName = selectedPackageRadio.getAttribute('data-name') || 'Unknown Package';

                const total = classPrice + packagePrice;

                // Calculate Installment Stages (50% / 30% / 20%)
                const stage1 = total * 0.5;
                const stage2 = total * 0.3;
                const stage3 = total * 0.2;

                // Determine which amount to show in Summary Box
                const selectedPaymentType = document.querySelector('input[name="payment_type"]:checked');
                let displayAmount = 0;
                let paymentLabelText = "Full Payment";

                if (selectedPaymentType) {
                    if (selectedPaymentType.value === 'installment') {
                        displayAmount = stage1;
                        paymentLabelText = "Installment (Stage 1)";
                    } else {
                        displayAmount = total;
                        paymentLabelText = "Full Payment";
                    }
                }

                // Debugging Logs
                console.log('Class:', classOption.text, 'Price:', classPrice);
                console.log('Package:', packageName, 'Price:', packagePrice);
                console.log('Total:', total);

                // Update Invoice Line Items
                if (summaryClassName) summaryClassName.textContent = classOption.text;
                if (summaryClassPrice) summaryClassPrice.textContent = 'RM ' + classPrice.toFixed(2);

                if (summaryPackageName) summaryPackageName.textContent = packageName;
                if (summaryPackagePrice) summaryPackagePrice.textContent = 'RM ' + packagePrice.toFixed(2);

                if (paymentTypeLabel) paymentTypeLabel.textContent = paymentLabelText;

                // Update Summary Box Total
                if (summaryAmount) summaryAmount.textContent = displayAmount.toFixed(2);

                // Update Full Payment Display
                if (fullPaymentAmount) {
                    fullPaymentAmount.textContent = 'RM ' + total.toFixed(2);
                }

                // Update Installment Display
                if (installmentStage1) installmentStage1.textContent = 'RM ' + stage1.toFixed(2);
                if (installmentStage2) installmentStage2.textContent = 'RM ' + stage2.toFixed(2);
                if (installmentStage3) installmentStage3.textContent = 'RM ' + stage3.toFixed(2);


            }

            // Attach Listeners
            if (classSelect) {
                classSelect.addEventListener('change', calculateTotal);
            }

            if (paymentRadios) {
                paymentRadios.forEach(radio => {
                    radio.addEventListener('change', calculateTotal);
                });
            }

            if (packageRadios) {
                packageRadios.forEach(radio => {
                    radio.addEventListener('change', calculateTotal);
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const verifyBtn = document.getElementById("verify");
            const resultsDiv = document.getElementById("verifyResults");
            const ic = document.getElementById("icNumber");
            const nameInput = document.getElementById("fullName");
            const phone = document.getElementById("phoneNumber");
            const address = document.getElementById("address");
            const myKad = document.getElementById("myKad");
            const terms = document.getElementById("agreeTerms");
            const nextBtn = document.getElementById("nextBtn");
            const formSection = document.getElementById("formSection");
            const verifySection = document.getElementById("verifySection");
            const applyBtn = document.getElementById("apply");
            const licenseClass = document.getElementById("licenseClass");

            const ageInput = document.getElementById("age");

            ic.addEventListener("input", () => {
                const val = ic.value.trim();
                if (val.length >= 2) {
                    const firstTwo = val.substring(0, 2);
                    const yearPart = parseInt(firstTwo, 10);

                    if (!isNaN(yearPart)) {
                        const currentYearShort = 25; // 2025
                        let age = 0;

                        if (yearPart <= currentYearShort) {
                            age = currentYearShort - yearPart;
                        } else {
                            // 1900s (e.g. 90 -> 1990)
                            // Age = (2025 - 1900 - yearPart) = 125 - yearPart
                            age = 125 - yearPart;
                        }
                        ageInput.value = age;
                    } else {
                        ageInput.value = "";
                    }
                } else {
                    ageInput.value = "";
                }
            });

            //  NEXT BUTTON TRANSITION
            nextBtn.addEventListener("click", () => {
                // 1. Shrink form section width
                formSection.classList.remove("w-full");
                formSection.classList.add("flex-[4]");

                // 2. Show verify section
                verifySection.classList.remove("w-0", "flex-[0]", "opacity-0");
                verifySection.classList.add("flex-[1]", "opacity-100");

                // 3. Hide Next button (optional, or change text)
                nextBtn.parentElement.classList.add("hidden");
            });

            async function validateICWithOCR(file, icNumber) {
                const validTypes = ["application/pdf", "image/jpeg", "image/png"];
                if (!validTypes.includes(file.type)) {
                    return {
                        valid: false,
                        message: "MyKad must be PDF, JPG or PNG."
                    };
                }

                // Normalize user input IC: keep digits only
                const normalizedUserIC = String(icNumber || "").replace(/\D/g, "");
                if (normalizedUserIC.length !== 12) {
                    return {
                        valid: false,
                        message: "Provided IC must be 12 digits."
                    };
                }

                try {
                    let text = "";

                    // ---------------------- PDF HANDLING ----------------------
                    if (file.type === "application/pdf") {
                        const arrayBuffer = await file.arrayBuffer();
                        const pdfjsLib = window["pdfjs-dist/build/pdf"];
                        pdfjsLib.GlobalWorkerOptions.workerSrc =
                            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

                        const pdf = await pdfjsLib.getDocument({
                            data: arrayBuffer
                        }).promise;
                        for (let i = 1; i <= pdf.numPages; i++) {
                            const page = await pdf.getPage(i);
                            const content = await page.getTextContent();
                            text += content.items.map(item => item.str).join(" ");
                        }

                        // If PDF has no text layer → use OCR on first page
                        if (text.trim() === "") {
                            const canvas = document.createElement("canvas");
                            const page = await pdf.getPage(1);
                            const viewport = page.getViewport({
                                scale: 2
                            });
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;
                            await page.render({
                                canvasContext: canvas.getContext("2d"),
                                viewport
                            }).promise;
                            const img = canvas.toDataURL("image/png");
                            const result = await Tesseract.recognize(img, "eng");
                            text = result.data.text;
                        }
                    }
                    // ---------------------- IMAGE HANDLING ----------------------
                    else {
                        const reader = new FileReader();
                        await new Promise(resolve => {
                            reader.onload = async () => {
                                const result = await Tesseract.recognize(reader.result, "eng");
                                text = result.data.text;
                                resolve();
                            };
                        });
                        reader.readAsDataURL(file);
                    }

                    // CLEAN & NORMALIZE OCR TEXT -> keep digits only, fix common confusions
                    let cleaned = String(text || "")
                        .replace(/O/g, "0")
                        .replace(/o/g, "0")
                        .replace(/I/g, "1")
                        .replace(/l/g, "1")
                        .replace(/S/g, "5")
                        .replace(/s/g, "5")
                        .replace(/G/g, "6")
                        .replace(/B/g, "8")
                        .replace(/[^0-9]/g, "")
                        .trim();

                    console.log("OCR cleaned digits:", cleaned);

                    if (cleaned.includes(normalizedUserIC)) {
                        return {
                            valid: true,
                            message: "MyKad is valid — IC number detected."
                        };
                    }

                    // ---------------------- FIRST-12 CHECK (common case for MyKad) ----------------------
                    // If OCR produced e.g. 16 digits like 0306120103630201, first 12 might be IC
                    if (cleaned.length >= 12) {
                        const first12 = cleaned.substring(0, 12);
                        if (first12 === normalizedUserIC) {
                            return {
                                valid: true,
                                message: "MyKad is valid — IC number detected."
                            };
                        }
                    }

                    // Nothing matched
                    return {
                        valid: false,
                        message: "IC number not found or does not match the IC you entered."
                    };

                } catch (err) {
                    console.error(err);
                    return {
                        valid: false,
                        message: "Error processing MyKad file."
                    };
                }
            }

            // VERIFY BUTTON CLICK
            verifyBtn.addEventListener("click", async () => {

                const loader = document.getElementById("verifyLoader");
                loader.classList.remove("hidden");
                verifyBtn.disabled = true;

                await new Promise(r => setTimeout(r, 1000));

                loader.classList.add("hidden");
                verifyBtn.disabled = false;

                let messages = [];

                if (/^\d{12}$/.test(ic.value.trim()))
                    messages.push({
                        type: "success",
                        text: "IC number is valid."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "IC must be 12 digits."
                    });

                if (/^[A-Za-z\s]+$/.test(nameInput.value.trim()))
                    messages.push({
                        type: "success",
                        text: "Full name is valid."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Full name invalid."
                    });

                if (/^\d{9,11}$/.test(phone.value.trim()))
                    messages.push({
                        type: "success",
                        text: "Phone number valid."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Phone number must be 9–11 digits."
                    });

                if (address.value.trim().length >= 5)
                    messages.push({
                        type: "success",
                        text: "Address valid."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Address too short."
                    });

                if (licenseClass.value !== "")
                    messages.push({
                        type: "success",
                        text: "License Class selected."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Please select a License Class."
                    });

                const selectedPackage = document.querySelector('input[name="package_id"]:checked');
                if (selectedPackage)
                    messages.push({
                        type: "success",
                        text: "License Package selected."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Please select a License Package."
                    });

                const paymentType = document.querySelector('input[name="payment_type"]:checked');
                if (paymentType)
                    messages.push({
                        type: "success",
                        text: "Payment Type selected."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "Please select a Payment Type."
                    });

                // OCR VALIDATION
                if (myKad.files.length) {
                    // Show loader animation below button
                    const loader = document.getElementById("verifyLoader");
                    loader.classList.remove("hidden");
                    verifyBtn.disabled = true;

                    resultsDiv.innerHTML = `<div class="flex flex-col items-center gap-2 py-3 mt-4"><div class="loader"></div><span class="mt-8 text-green-600">Checking MyKad with OCR...</span></div>`;

                    resultsDiv.classList.remove("hidden");
                    resultsDiv.classList.remove("opacity-0");

                    // Wait while OCR loads
                    await new Promise(r => setTimeout(r, 2000));

                    // Hide loader and allow button again
                    loader.classList.add("hidden");
                    verifyBtn.disabled = false;


                    const icNumber = ic.value.trim();

                    if (icNumber.length === 12) {
                        const result = await validateICWithOCR(myKad.files[0], icNumber);

                        // Add OCR result message (success or error)
                        messages.push({
                            type: result.valid ? "success" : "error",
                            text: result.message
                        });
                    }
                } else {
                    messages.push({
                        type: "error",
                        text: "MyKad file is missing."
                    });
                }

                if (terms.checked)
                    messages.push({
                        type: "success",
                        text: "Terms accepted."
                    });
                else
                    messages.push({
                        type: "error",
                        text: "You must accept the terms."
                    });

                // SHOW RESULTS
                resultsDiv.innerHTML = messages.map((msg, index) => {
                    const isSuccess = msg.type === "success";
                    const isError = msg.type === "error";

                    const bgColor = isSuccess ? "bg-green-50 border-green-200" : (isError ? "bg-red-50 border-red-200" :
                        "bg-blue-50 border-blue-200");
                    const textColor = isSuccess ? "text-green-800" : (isError ? "text-red-800" : "text-blue-800");
                    const iconColor = isSuccess ? "text-green-600" : (isError ? "text-red-600" : "text-blue-600");

                    // Icons (SVG)
                    const iconSvg = isSuccess ?
                        `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>` :
                        (isError ?
                            `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>` :
                            `<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`
                        );

                    return `
                        <div class="flex items-center gap-3 p-4 rounded-xl border ${bgColor} ${textColor} shadow-sm transition-all duration-300 hover:shadow-md animate-fadeIn" style="animation-delay: ${index * 100}ms">
                            <div class="flex-shrink-0 ${iconColor}">
                                ${iconSvg}
                            </div>
                            <span class="font-medium text-sm">${msg.text}</span>
                        </div>
                    `;
                }).join("");

                // ENABLE/DISABLE APPLY BUTTON
                const hasErrors = messages.some(msg => msg.type === "error");
                applyBtn.disabled = hasErrors;

                resultsDiv.classList.remove("hidden");
                resultsDiv.classList.remove("opacity-0");
            });

            // Dynamic Summary Logic
            const summaryLabel = document.getElementById('summaryLabel');
            const summaryAmount = document.getElementById('summaryAmount');
            const paymentRadios = document.querySelectorAll('input[name="payment_type"]');
            const packageSelect = document.getElementById('package');

            // Legacy code removed to allow calculateTotal() to work correctly

            // REDIRECT TO PAYMENT PAGE
            applyBtn.addEventListener("click", () => {
                window.location.href = "{{ route('payment') }}";
            });

            // REDIRECT TO PAYMENT PAGE
            applyBtn.addEventListener("click", () => {
                window.location.href = "{{ route('payment') }}";
            });

        });
    </script>
</body>

</html>