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

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-8 flex items-center justify-between">
        <a href="{{ url()->previous() }}" class="text-blue-900 hover:text-blue-900 flex items-center">
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
                <h2 class="text-xl font-bold text-blue-900">APPLICATION FORM</h2>
            </div>
        </div>
        <div class="w-12"></div>
    </div>

    <section class="w-full flex flex-col lg:flex-row gap-4 md:gap-8 py-4 md:py-6 px-4 md:px-8 lg:px-12 xl:px-48 mb-10">
        <div id="formSection" class="w-full min-w-0 bg-white rounded-3xl p-8 text-black hover:shadow-2xl">

            <form id="registrationForm" class="space-y-5 text-base px-2 md:px-6 lg:px-8">
                <div class="relative flex flex-col md:flex-row items-center justify-center py-3 px-4">
                    <div class="md:absolute md:left-4">
                        <img src="/image/icon/logo.png" alt="logo" class="h-16 w-auto mb-2 md:mb-0">
                    </div>
                    <div class="flex flex-col items-center text-center w-full">
                        <span class="text-xl font-semibold">MOLEK DRIVING ACADEMY SDN BHD</span>
                        <span class="text-2xl font-bold">PERMOHONAN PENDAFTARAN LESEN MEMANDU</span>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="border border-blue-900 rounded-lg px-10 py-1 bg-blue-100 text-blue-900 text-center">
                        You need to verify the information first before you can proceed
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- IC Number -->
                    <div class="relative">
                        <label for="icNumber" class="block mb-2 text-base font-medium text-gray-800">IC Number</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7">
                                    <path fill-rule="evenodd"
                                        d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                            <input id="icNumber" type="text"
                                class="w-full rounded-xl pl-14 p-3 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none">
                        </div>
                        <p id="icError" class="text-red-500 text-base mt-1 hidden">IC must be numeric, 12 digits.</p>
                    </div>

                    <!-- Age -->
                    <div class="relative">
                        <label for="age" class="block mb-2 text-base font-medium text-gray-800">Age</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="size-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="age" type="text" readonly
                                class="w-full rounded-xl pl-14 p-3 bg-gray-100 border-2 border-gray-200 cursor-not-allowed focus:outline-none">
                        </div>
                        <p id="ageError" class="text-red-500 text-base mt-1 hidden">
                            You eligable to take the license class.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Full Name -->
                    <div class="relative">
                        <label for="fullName" class="block mb-2 text-base font-medium text-gray-800">Full Name</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="fullName" type="text"
                                class="w-full rounded-xl pl-14 p-3 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none">
                        </div>
                        <p id="nameError" class="text-red-500 text-base mt-1 hidden">
                            Name should contain only letters and spaces.
                        </p>
                    </div>

                    <!-- Phone -->
                    <div class="relative">
                        <label for="phoneNumber" class="block mb-2 text-base font-medium text-gray-800">Phone
                            Number</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="phoneNumber" type="text"
                                class="w-full rounded-xl pl-14 p-3 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none">
                        </div>
                        <p id="phoneError" class="text-red-500 text-base mt-1 hidden">
                            Phone number must be 9–11 digits.
                        </p>
                    </div>
                </div>

                <!-- Address -->
                <div class="relative">
                    <label for="address" class="block mb-2 text-base font-medium text-gray-800">Address</label>
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

                        <input id="address" type="text"
                            class="w-full rounded-xl pl-14 p-3 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none">
                    </div>
                    <p id="addressError" class="text-red-500 text-base mt-1 hidden">
                        Address must be at least 5 characters.
                    </p>
                </div>

                <!-- License Class -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <label for="licenseClass" class="block mb-2 text-base font-medium text-gray-800">License
                            Class</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M4 7h16M4 12h16M4 17h16" />
                                </svg>
                            </span>
                            <select id="licenseClass" name="licenseClass"
                                class="w-full rounded-xl p-3 pl-16 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none appearance-none">
                                <option value="" disabled selected>Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->name }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-600 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Package -->
                    <div class="relative">
                        <label for="package" class="block mb-2 text-base font-medium text-gray-800">License
                            Package</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M4 7h16M4 12h16M4 17h16" />
                                </svg>
                            </span>
                            <select id="package"
                                class="w-full rounded-xl p-3 pl-16 bg-white border-2 border-gray-200 focus:border-4 focus:border-blue-900 focus:outline-none appearance-none">
                                <option value="" disabled selected>Select Package</option>
                                <option value="preffered">Package Preffered</option>
                                <option value="premium">Package Premium</option>
                                <option value="basic">Package Basic</option>
                            </select>
                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-600 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Payment Type -->
                <div>
                    <span class="block mb-2 font-medium text-base text-black">Payment Type</span>

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
                                            <span class="text-base font-bold text-blue-900">RM 1599</span>
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
                                                <span class="text-base font-bold text-blue-900">RM 1000</span>
                                            </div>
                                        </div>
                                        <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-semibold text-gray-600">Stage 2</span>
                                                <span class="text-base font-bold text-blue-900">RM 600</span>
                                            </div>
                                        </div>
                                        <div class="w-full py-2 px-3 bg-gray-50 rounded-lg border border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-semibold text-gray-600">Stage 3</span>
                                                <span class="text-base font-bold text-blue-900">RM 500</span>
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
                        <label for="myKad" class="block mb-2 text-base font-medium text-gray-800">Upload MyKad</label>
                        <input id="myKad" type="file" aria-describedby="myKad_help" class="block w-full text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-xl cursor-pointer 
                            focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent accent-blue-900 shadow-sm
                            file:mr-4 file:py-3 file:px-6
                            file:rounded-l-xl file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-900 file:text-white
                            hover:file:bg-blue-800 transition-all duration-200">
                        <p id="myKad_help" class="mt-1 text-sm text-gray-600">
                            JPG, PNG, or PDF (MAX. 2MB)
                        </p>
                        <p id="myKadICNotification" class="text-red-500 text-base mt-1 hidden">
                            IC number not found in the uploaded file. Please check your document.
                        </p>

                        <p id="myKadError" class="text-red-500 text-base mt-1 hidden">Please upload your MyKad.</p>
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
            <!-- Summary Total -->
            <div
                class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-blue-950 to-blue-900 text-white rounded-2xl shadow-2xl p-6 md:p-8 transform transition-all hover:scale-[1.01] duration-300">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-5 rounded-full blur-2xl">
                </div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-blue-500 opacity-5 rounded-full blur-3xl">
                </div>

                <div class="relative flex flex-col items-center justify-center gap-6 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div>
                            <h3 id="summaryLabel" class="text-xl font-semibold text-gray-100 uppercase tracking-wider">
                                Payment type</h3>
                            <p class="text-sm text-blue-200/80 font-light">Total Amount Need to Pay</p>
                        </div>
                    </div>

                    <div class="flex items-start justify-center">
                        <span class="text-2xl font-medium text-blue-300 mt-2 mr-1">RM</span>
                        <span id="summaryAmount"
                            class="text-6xl font-extrabold tracking-tighter text-white drop-shadow-lg">0</span>
                    </div>
                    <div class="ext-sm font-medium text-blue-200/60 uppercase tracking-widest">
                        Pay with Online Banking
                    </div>
                </div>
            </div>

            <button id="apply" type="button" disabled
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
        const packageSelect = document.getElementById('package');
        packageSelect.addEventListener('change', function () {
            this.style.backgroundColor = '';
            this.style.color = '';
            switch (this.value) {
                case 'preffered':
                    this.style.backgroundColor = '#3f0275';
                    this.style.color = 'white';
                    break;
                case 'premium':
                    this.style.backgroundColor = '#facc15';
                    this.style.color = 'black';
                    break;
                case 'basic':
                    this.style.backgroundColor = '#3bce6d';
                    this.style.color = 'black';
                    break;
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
            const licensePackage = document.getElementById("package");
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

                if (licensePackage.value !== "")
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

            function updateSummary() {
                const selectedPayment = document.querySelector('input[name="payment_type"]:checked')?.value;
                const selectedPackage = packageSelect ? packageSelect.value : 'preferred';

                // Update Label
                if (summaryLabel) {
                    if (selectedPayment === 'full') {
                        summaryLabel.textContent = 'Total';
                    } else if (selectedPayment === 'installment') {
                        summaryLabel.textContent = 'Stage 1';
                    }
                }

                // Update Amount
                let amount = 0;
                if (selectedPayment === 'full') {
                    if (selectedPackage === 'preferred') amount = 3799;
                    else if (selectedPackage === 'premium') amount = 3499;
                    else if (selectedPackage === 'basic') amount = 3499;
                    else amount = 3799;
                } else if (selectedPayment === 'installment') {
                    amount = 1000;
                }

                if (selectedPayment && summaryAmount) {
                    summaryAmount.textContent = amount;
                }
            }

            // Listeners
            if (paymentRadios) paymentRadios.forEach(radio => radio.addEventListener('change', updateSummary));
            if (packageSelect) packageSelect.addEventListener('change', updateSummary);

        });
    </script>
</body>

</html>