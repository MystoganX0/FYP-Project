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
    @include('ui.user.header')

    @if(isset($hasActiveApplication) && $hasActiveApplication)
        <!-- Application Exists Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/80 backdrop-blur-sm">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 text-center m-4 animate-fadeIn">
                <div class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-2">Application Exists</h3>

                <p class="text-gray-500 mb-8 leading-relaxed">
                    You can apply again until you have completed the license that you applied for previously.
                </p>

                <a href="{{ route('home') }}"
                    class="block w-full text-white bg-blue-800 hover:bg-blue-800 font-bold rounded-2xl text-lg px-5 py-4 text-center shadow-lg transition-all transform hover:-translate-y-0.5">
                    Back to Home
                </a>
            </div>
        </div>
    @endif

    <section
        class="w-full flex flex-col lg:flex-row lg:items-stretch gap-6 py-4 px-2 md:px-4 lg:px-6 xl:px-8 mb-10 bg-gray-50">

        <!-- Form and Summary Container -->
        <div class="flex-1 flex flex-col lg:flex-row lg:items-stretch gap-6">
            <div id="formSection" class="flex-1 bg-gray-50">

                <form id="registrationForm" action="{{ route('apply.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Question 1: IC Number & Full Name (Short Text) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200">
                        <div class="flex items-start gap-3 mb-6">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    1
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-base font-semibold text-gray-900">Personal Information</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                        SHORT TEXT
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-4">Please provide your IC number and full name as per
                                    IC
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">IC Number</label>
                                        <input id="icNumber" name="ic" type="text" inputmode="numeric" pattern="[0-9]*"
                                            placeholder="012345678901" maxlength="12"
                                            class="w-full rounded-lg px-4 py-3 bg-gray-50 border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 text-sm">
                                        <p id="icError" class="text-red-500 text-xs mt-1 hidden">IC must be numeric, 12
                                            digits.</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                                        <input id="age" name="age" type="text" readonly
                                            class="w-full rounded-lg px-4 py-3 bg-gray-100 border border-gray-200 text-gray-500 cursor-not-allowed text-sm">
                                        <p id="ageError" class="text-green-600 text-xs mt-1 hidden font-medium">You are
                                            eligible to take the license class.</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                        <input id="fullName" name="full_name" type="text" pattern="[A-Za-z\s]+"
                                            placeholder="Based on IC"
                                            class="w-full rounded-lg px-4 py-3 bg-gray-50 border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 text-sm">
                                        <p id="nameError" class="text-red-500 text-xs mt-1 hidden">Name should contain
                                            only
                                            letters and spaces.</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input id="phoneNumber" name="phone" type="text" inputmode="numeric"
                                            pattern="[0-9]*" placeholder="0123456789" maxlength="11"
                                            class="w-full rounded-lg px-4 py-3 bg-gray-50 border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 text-sm">
                                        <p id="phoneError" class="text-red-500 text-xs mt-1 hidden">Phone number must be
                                            9–11 digits.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2: Address (Long Text) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200 my-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    2
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class=" text-base font-semibold text-gray-900">What is your residential
                                        address?</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        LONG TEXT
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-4">Please provide your full residential address</p>

                                <textarea id="address" name="address" rows="3"
                                    placeholder="Enter your full residential address"
                                    class="w-full rounded-lg px-4 py-3 bg-gray-50 border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 text-sm resize-none"></textarea>
                                <p id="addressError" class="text-red-500 text-xs mt-1 hidden">Address must be at least 5
                                    characters.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3: License Class (Multiple Choice) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200 my-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    3
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-base font-semibold text-gray-900">Which license class are you
                                        applying for?</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        MULTIPLE CHOICE
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-4">Select the type of license you wish to obtain</p>

                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach ($classes as $index => $class)
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="class_id" value="{{ $class->class_id }}"
                                                data-price="{{ $class->class_price }}" data-name="{{ $class->class_code }}"
                                                id="licenseClass" class="peer sr-only">
                                            <div
                                                class="flex flex-col items-center justify-center p-4 bg-gray-50 border-2 border-gray-200 rounded-xl hover:border-blue-500 peer-checked:bg-gradient-to-br peer-checked:from-blue-600 peer-checked:to-blue-700 peer-checked:border-blue-700 peer-checked:[&_*]:text-white transition-all h-full shadow-sm">
                                                <span
                                                    class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">{{ $class->class_code }}</span>
                                                <span class="text-xs font-semibold text-gray-500">RM
                                                    {{ $class->class_price }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 4: Package Selection (Multiple Choice) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200  my-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    4
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-base font-semibold text-gray-900">Which package would you
                                        prefer?</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        MULTIPLE CHOICE
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-4">Choose the package that best suits your needs</p>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    @foreach ($packages as $pkg)
                                        @php
                                            $type = strtolower($pkg->package_type);
                                            $borderColor = 'border-gray-200';
                                            $hoverColor = 'hover:border-blue-500';

                                            if (Str::contains($type, 'premium')) {
                                                $hoverColor = 'hover:border-blue-500';
                                                $iconColor = 'text-yellow-500';
                                            } elseif (Str::contains($type, 'basic')) {
                                                $hoverColor = 'hover:border-blue-500';
                                                $iconColor = 'text-green-500';
                                            } else {
                                                $hoverColor = 'hover:border-blue-500';
                                                $iconColor = 'text-purple-500';
                                            }
                                        @endphp
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="package_id" value="{{ $pkg->package_id }}"
                                                data-type="{{ $type }}" data-name="{{ $pkg->package_type }}"
                                                data-price="{{ $pkg->package_price }}" class="peer sr-only">
                                            <div
                                                class="p-5 bg-gray-50 border-2 {{ $borderColor }} rounded-xl {{ $hoverColor }} peer-checked:bg-gradient-to-br peer-checked:from-blue-600 peer-checked:to-blue-700 peer-checked:border-blue-700 peer-checked:[&_*]:text-white transition-all h-full flex flex-col justify-between shadow-sm">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <h4 class="font-bold text-gray-900 text-md">
                                                            {{ $pkg->package_type }}
                                                        </h4>
                                                    </div>

                                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                        <svg class="w-5 h-5 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                <div>
                                                    <span class="text-xl font-black text-gray-900 block text-right">
                                                        <span class="text-xs font-medium text-gray-500">RM</span>
                                                        <span class="dynamic-package-price">{{ $pkg->package_price }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 5: Payment Type (Multiple Choice) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200  my-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    5
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-base font-semibold text-gray-900">Select your payment
                                        method</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        MULTIPLE CHOICE
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-4">Choose between full payment or installment plan
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Full Payment Option -->
                                    <label class="relative cursor-pointer group">
                                        <input type="radio" id="payment-full" name="payment_type" value="full"
                                            class="peer sr-only" required>
                                        <div
                                            class="p-5 bg-gray-50 border-2 border-gray-200 rounded-xl hover:border-blue-500 peer-checked:bg-gradient-to-br peer-checked:from-blue-600 peer-checked:to-blue-700 peer-checked:border-blue-700 peer-checked:[&_*]:text-white transition-all h-full shadow-sm">
                                            <div class="flex justify-between items-start mb-1">
                                                <h4 class="font-bold text-gray-900 text-md">Full
                                                    Payment</h4>
                                                <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-500 peer-checked:!text-white mb-3">Single
                                                payment for the complete
                                                package
                                            </p>
                                            <div class="bg-white rounded-lg p-3 border border-gray-200">
                                                <div class="flex justify-between items-center">
                                                    <span
                                                        class="text-xs font-medium text-gray-600 !text-gray-600">Total</span>
                                                    <span id="fullPaymentDisplay"
                                                        class="text-base font-bold text-blue-900 !text-blue-900">RM
                                                        0.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- Installment Option -->
                                    <label class="relative cursor-pointer group">
                                        <input type="radio" id="payment-installment" name="payment_type"
                                            value="installment" class="peer sr-only">
                                        <div
                                            class="p-5 bg-gray-50 border-2 border-gray-200 rounded-xl hover:border-blue-500 peer-checked:bg-gradient-to-br peer-checked:from-blue-600 peer-checked:to-blue-700 peer-checked:border-blue-700 peer-checked:[&_*]:text-white transition-all h-full shadow-sm">
                                            <div class="flex justify-between items-start mb-1">
                                                <h4 class="font-bold text-gray-900 text-md">
                                                    Installment Plan</h4>
                                                <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-500 peer-checked:!text-white mb-3">Flexible
                                                payment in 3 stages</p>
                                            <div class="space-y-1.5">
                                                <div
                                                    class="bg-white rounded-lg p-3 border border-gray-200 flex justify-between items-center">
                                                    <span class="text-xs font-medium text-gray-600 !text-gray-600">Stage
                                                        1</span>
                                                    <span id="installmentStage1Display"
                                                        class="text-sm font-bold text-blue-900 !text-blue-900">RM
                                                        0.00</span>
                                                </div>
                                                <div
                                                    class="bg-white rounded-lg p-3 border border-gray-200 flex justify-between items-center">
                                                    <span class="text-xs font-medium text-gray-600 !text-gray-600">Stage
                                                        2</span>
                                                    <span id="installmentStage2Display"
                                                        class="text-sm font-bold text-blue-900 !text-blue-900">RM
                                                        0.00</span>
                                                </div>
                                                <div
                                                    class="bg-white rounded-lg p-3 border border-gray-200 flex justify-between items-center">
                                                    <span class="text-xs font-medium text-gray-600 !text-gray-600">Stage
                                                        3</span>
                                                    <span id="installmentStage3Display"
                                                        class="text-sm font-bold text-blue-900 !text-blue-900">RM
                                                        0.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 6: Upload MyKad (Upload) -->
                    <div
                        class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-gray-300 transition-all duration-200  my-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    6
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-base font-semibold text-gray-900">Upload your MyKad
                                        document</label>
                                    <span
                                        class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        UPLOAD
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mb-6">Please upload a clear scan of your MyKad
                                    (PDF ONLY, MAX. 2MB)</p>

                                <div class="flex items-center justify-center w-full">
                                    <label for="myKad"
                                        class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100/80 hover:border-gray-400 transition-all duration-300 group relative overflow-hidden">

                                        <!-- Hover Effect Background -->
                                        <div
                                            class="absolute inset-0 bg-gray-200/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                        </div>

                                        <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10">
                                            <div
                                                class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                                                <svg class="w-7 h-7 text-gray-500 group-hover:text-gray-700 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </div>
                                            <p
                                                class="mb-2 text-sm text-gray-500 group-hover:text-gray-700 transition-colors">
                                                <span class="font-bold text-gray-700">Click to upload</span> or drag and
                                                drop
                                            </p>
                                            <p class="text-xs text-gray-400">PDF ONLY (MAX. 2MB)</p>
                                        </div>
                                        <input id="myKad" name="ic_file" type="file" class="hidden" accept=".pdf" />
                                    </label>
                                </div>

                                <!-- File Name Display & View Link -->
                                <div id="myKadFileDisplay"
                                    class="hidden mt-4 p-3 bg-blue-50 border border-blue-200 rounded-xl flex items-center justify-between">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col min-w-0">
                                            <span id="myKadFileName"
                                                class="text-sm font-medium text-blue-900 truncate block max-w-xs"></span>
                                            <span id="myKadFileSize" class="text-xs text-blue-500"></span>
                                        </div>
                                    </div>
                                    <a id="myKadFileView" href="#" target="_blank"
                                        class="px-3 py-1.5 text-xs font-semibold text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors whitespace-nowrap">
                                        View File
                                    </a>
                                </div>

                                <p id="myKadICNotification" class="text-red-500 text-xs mt-2 hidden">IC number not found
                                    in
                                    the uploaded file. Please check your document.</p>
                                <p id="myKadError" class="text-red-500 text-xs mt-2 hidden">Please upload your MyKad.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="bg-white border-2 border-gray-200 rounded-2xl p-6 my-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                                    7
                                </div>
                            </div>
                            <input id="agreeTerms" type="checkbox" class="peer sr-only" />
                            <label for="agreeTerms"
                                class="cursor-pointer h-7 w-7 border-2 border-gray-300 rounded-lg bg-gray-50 peer-checked:bg-green-400 peer-checked:border-green-400 transition-all duration-300 ease-in-out flex items-center justify-center hover:border-green-400 hover:shadow-md shrink-0 mt-0.5 peer-focus:ring-4 peer-focus:ring-green-100 peer-checked:scale-105">
                                <svg class="w-5 h-5 text-white opacity-0 peer-checked:opacity-100 transition-all duration-300 transform scale-50 peer-checked:scale-100"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </label>
                            <div class="flex-1">
                                <label for="agreeTerms"
                                    class="cursor-pointer text-sm font-medium text-gray-900 flex items-center gap-2">
                                    I agree to the <a href="#" class="text-blue-600 hover:underline font-semibold">terms
                                        and
                                        conditions</a>
                                </label>
                                <p class="text-xs text-gray-500 mt-1">I confirm that I have read, understood, and agree
                                    to the Terms and Conditions of the Driving License Application System, and that all
                                    information provided is true and accurate.</p>
                            </div>
                        </div>
                        <p id="termsError" class="text-red-500 text-xs mt-2 hidden">You must agree to the terms.</p>
                    </div>

                </form>
            </div>

            <!-- Summary Section (Right) -->
            <div id="verifySection" class="w-full lg:w-80 xl:w-96 min-w-0 space-y-4 lg:sticky lg:top-0 lg:self-start">
                <!-- Invoice Summary Card -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl shadow-sm p-6 md:p-8 transition-all duration-300 border-2 border-gray-200 hover:border-gray-300">

                    <div class="relative flex flex-col gap-6">
                        <!-- Header -->
                        <div class="flex items-center gap-3 border-b border-gray-200 pb-4">
                            <div>
                                <h3 class="text-lg font-bold uppercase tracking-wider text-gray-900">Summary
                                </h3>
                                <p class="text-xs text-gray-500 font-light">Invoice Breakdown</p>
                            </div>
                        </div>

                        <!-- Line Items -->
                        <div class="space-y-3 text-sm">
                            <!-- Class Item -->
                            <div class="flex justify-between items-start">
                                <div class="flex flex-col">
                                    <span class="text-gray-500">License Class</span>
                                    <span id="summaryClassName" class="font-medium text-gray-900 text-base">Select a
                                        class</span>
                                </div>
                                <span id="summaryClassPrice" class="font-semibold text-gray-900">RM 0.00</span>
                            </div>

                            <!-- Package Item -->
                            <div class="flex justify-between items-start">
                                <div class="flex flex-col">
                                    <span class="text-gray-500">Package Type</span>
                                    <span id="summaryPackageName" class="font-medium text-gray-900 text-base">Select a
                                        package</span>
                                </div>
                                <span id="summaryPackagePrice" class="font-semibold text-gray-900">RM 0.00</span>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t-2 border-dashed border-gray-200"></div>

                        <!-- Total -->
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2 md:gap-0">
                            <div class="flex flex-col">
                                <span class="text-gray-700 text-sm uppercase tracking-wider font-semibold">Total
                                    Payable</span>
                                <span class="text-xs text-gray-500 font-light" id="paymentTypeLabel">Full Payment</span>
                            </div>
                            <div class="flex items-baseline">
                                <span class="text-base md:text-lg font-medium text-gray-700 mr-1">RM</span>
                                <span id="summaryAmount"
                                    class="text-xl md:text-xl font-extrabold text-gray-900 tracking-tight">0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="apply" type="submit" form="registrationForm" disabled
                    class="w-full group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-[#0E1F8E] to-blue-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 hover:shadow-lg hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 disabled:hover:shadow-none">

                    <svg id="applyLockIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>

                    <span id="btnText">Apply Now</span>
                </button>

                <p class="text-xs text-center text-gray-400 mt-4 flex items-center justify-center gap-1.5 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                        <path fill-rule="evenodd"
                            d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                            clip-rule="evenodd" />
                    </svg>
                    Secure payment via Credit Card
                </p>

            </div>
        </div>
        </div>
        <!-- Right Sidebar - Form Field Types -->
        <aside
            class="w-full lg:w-96 xl:w-[28rem] bg-white rounded-2xl p-6 shadow-sm border border-gray-200 lg:sticky lg:top-4 h-full order-last">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0">
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transform transition-transform group-hover:scale-110 duration-200">
                        8
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <label class=" text-base font-semibold text-gray-900">Verify Application</label>
                        <span
                            class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-semibold text-gray-600 shadow-sm flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            VERIFICATION
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Verify requirements for license application </p>
                </div>
            </div>

            <button id="verify" type="button"
                class="w-full mb-6 relative group overflow-hidden bg-gradient-to-br from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 text-white font-bold rounded-2xl text-base px-6 py-6 transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 flex flex-col items-center justify-center gap-2 focus:ring-4 focus:ring-red-400/50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-14 h-14">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <span id="btnText" class="text-base">VERIFICATION</span>
            </button>

            <ul class="space-y-3">
                <!-- 1. Format Validation Summary -->
                <li id="formatValidationCard">
                    <div class="group p-4 bg-white border-2 border-gray-200 rounded-xl transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 text-gray-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900 mb-1">Format Validation</h4>
                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Scanning format of information
                                    entered</p>
                                <div id="formatValidationStatus" class="text-xs font-medium text-gray-400">
                                    Pending verification...
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 2. Document Integrity Summary -->
                <li id="documentIntegrityCard">
                    <div class="group p-4 bg-white border-2 border-gray-200 rounded-xl transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 text-gray-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900 mb-1">Document Integrity</h4>
                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Checking uploaded IC document</p>
                                <div id="documentIntegrityStatus" class="text-xs font-medium text-gray-400">
                                    Pending verification...
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 3. Identity Matching (OCR) Summary -->
                <li id="identityMatchingCard">
                    <div class="group p-4 bg-white border-2 border-gray-200 rounded-xl transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 text-gray-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900 mb-1">Identity Matching (OCR)</h4>
                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Verifying IC & Name via OCR</p>
                                <div id="identityMatchingStatus" class="text-xs font-medium text-gray-400">
                                    Pending verification...
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 4. Age Eligibility Summary -->
                <li id="ageEligibilityCard">
                    <div class="group p-4 bg-white border-2 border-gray-200 rounded-xl transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 text-gray-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900 mb-1">Age Eligibility</h4>
                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Checking minimum age requirement
                                </p>
                                <div id="ageEligibilityStatus" class="text-xs font-medium text-gray-400">
                                    Pending verification...
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- Verify Results Section -->
            <div class="mt-6 pt-6 border-t border-gray-200">

                <div id="verifyResults" class="flex flex-col gap-3 hidden opacity-0 transition-all duration-500">
                </div>
            </div>
        </aside>
    </section>

    @include('ui.user.footer')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const packageRadios = document.querySelectorAll('input[name="package_id"]');
            const classRadios = document.querySelectorAll('input[name="class_id"]');
            const summaryAmount = document.getElementById('summaryAmount');
            const fullPaymentAmount = document.getElementById('fullPaymentDisplay');

            // Installment elements
            const installmentStage1 = document.getElementById('installmentStage1Display');
            const installmentStage2 = document.getElementById('installmentStage2Display');
            const installmentStage3 = document.getElementById('installmentStage3Display');

            const paymentRadios = document.querySelectorAll('input[name="payment_type"]');

            const summaryClassName = document.getElementById('summaryClassName');
            const summaryClassPrice = document.getElementById('summaryClassPrice');
            const summaryPackageName = document.getElementById('summaryPackageName');
            const summaryPackagePrice = document.getElementById('summaryPackagePrice');
            const paymentTypeLabel = document.getElementById('paymentTypeLabel');

            function calculateTotal() {
                const selectedClassRadio = document.querySelector('input[name="class_id"]:checked');
                const selectedPackageRadio = document.querySelector('input[name="package_id"]:checked');

                // ---------------------------------------------------------
                // 1. Process Class Selection
                // ---------------------------------------------------------
                let classPrice = 0;
                let className = 'Select a class';

                if (selectedClassRadio) {
                    classPrice = parseFloat(selectedClassRadio.getAttribute('data-price')) || 0;
                    className = selectedClassRadio.getAttribute('data-name') || selectedClassRadio.value;
                }

                // Update Class Summary Display regardless of other selections
                if (summaryClassName) summaryClassName.textContent = className;
                if (summaryClassPrice) summaryClassPrice.textContent = 'RM ' + classPrice.toFixed(2);


                // ---------------------------------------------------------
                // 2. Process Package Selection
                // ---------------------------------------------------------
                let packagePrice = 0;
                let packageName = 'Select a package';

                if (selectedPackageRadio) {
                    packagePrice = parseFloat(selectedPackageRadio.getAttribute('data-price')) || 0;
                    packageName = selectedPackageRadio.getAttribute('data-name') || 'Unknown Package';
                }

                // Update Package Summary Display regardless of other selections
                if (summaryPackageName) summaryPackageName.textContent = packageName;
                if (summaryPackagePrice) summaryPackagePrice.textContent = 'RM ' + packagePrice.toFixed(2);


                // ---------------------------------------------------------
                // 3. Update Package Cards (Dynamic Pricing)
                // ---------------------------------------------------------
                // Total displayed in package cards = Package Price + Class Price
                updatePackageCards(classPrice);


                // ---------------------------------------------------------
                // 4. Calculate Grand Total & Installments
                // ---------------------------------------------------------
                // We only show the final Total Payable if BOTH are selected
                if (!selectedClassRadio || !selectedPackageRadio) {
                    // Start resetting totals if selections are incomplete
                    if (summaryAmount) summaryAmount.textContent = "0.00";
                    if (fullPaymentAmount) fullPaymentAmount.textContent = "RM 0.00";
                    if (installmentStage1) installmentStage1.textContent = "RM 0.00";
                    if (installmentStage2) installmentStage2.textContent = "RM 0.00";
                    if (installmentStage3) installmentStage3.textContent = "RM 0.00";
                    return;
                }

                const total = classPrice + packagePrice;

                // Calculate Installment Stages (25% / 25% / 50%)
                const stage1 = total * 0.25;
                const stage2 = total * 0.25;
                const stage3 = total * 0.5;

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
                console.log('Class:', className, 'Price:', classPrice);
                console.log('Package:', packageName, 'Price:', packagePrice);
                console.log('Total:', total);

                // Update Payment Type Label in Summary
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

            function updatePackageCards(classPrice) {
                const packageInputs = document.querySelectorAll('input[name="package_id"]');
                packageInputs.forEach(input => {
                    const packagePrice = parseFloat(input.getAttribute('data-price')) || 0;
                    const total = classPrice + packagePrice;

                    // Find the label wrapper (grandparent/parent)
                    const label = input.closest('label');
                    if (label) {
                        const priceDisplay = label.querySelector('.dynamic-package-price');
                        if (priceDisplay) {
                            priceDisplay.textContent = total.toFixed(2);
                        }
                    }
                });
            }

            // Attach Listeners
            if (classRadios) {
                classRadios.forEach(radio => {
                    radio.addEventListener('change', calculateTotal);
                });
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
            const formSection = document.getElementById("formSection");
            const verifySection = document.getElementById("verifySection");
            const applyBtn = document.getElementById("apply");
            const licenseClass = document.getElementById("licenseClass");

            const ageInput = document.getElementById("age");

            ic.addEventListener("input", (e) => {
                // 1. Enforce numeric input
                let val = ic.value.replace(/[^0-9]/g, '');
                ic.value = val;

                // 2. Helper Elements
                const icError = document.getElementById('icError');

                // 3. Validation Message Logic
                if (val.length > 0 && val.length !== 12) {
                    icError.classList.remove('hidden');
                } else {
                    icError.classList.add('hidden');
                }

                // 4. Age Calculation Logic
                if (val.length >= 2) {
                    const firstTwo = val.substring(0, 2);
                    const yearPart = parseInt(firstTwo, 10);

                    if (!isNaN(yearPart)) {
                        const currentYearShort = 26; // 2026
                        let age = 0;

                        if (yearPart <= currentYearShort) {
                            age = currentYearShort - yearPart;
                        } else {
                            // 1900s (e.g. 90 -> 1990)
                            // Age = (2026 - 1900 - yearPart) = 126 - yearPart
                            age = 126 - yearPart;
                        }
                        ageInput.value = age;
                    } else {
                        ageInput.value = "";
                    }
                } else {
                    ageInput.value = "";
                }
            });

            // Phone Validation
            phone.addEventListener("input", (e) => {
                let val = phone.value.replace(/[^0-9]/g, '');
                phone.value = val;

                const phoneError = document.getElementById('phoneError');
                // Check length for Malaysian format (usually 9 to 11 digits excluding country code)
                if (val.length > 0 && (val.length < 9 || val.length > 11)) {
                    phoneError.classList.remove('hidden');
                } else {
                    phoneError.classList.add('hidden');
                }
            });

            // Prevent non-alphabetic input (except spaces) for full name
            // Name Validation
            nameInput.addEventListener("input", (e) => {
                let val = nameInput.value;
                // Only allow letters and spaces
                val = val.replace(/[^A-Za-z\s]/g, '');
                nameInput.value = val;

                const nameError = document.getElementById('nameError');
                // Simple check: fail if empty or very short? 
                // Using regex test similar to pattern="[A-Za-z\s]+"
                if (val.length > 0 && !/^[A-Za-z\s]+$/.test(val)) {
                    nameError.classList.remove('hidden');
                } else {
                    nameError.classList.add('hidden');
                }
            });


            async function validateICWithOCR(file, icNumber, userName) {
                const validTypes = ["application/pdf", "image/jpeg", "image/png"];
                if (!validTypes.includes(file.type)) {
                    return {
                        valid: false,
                        message: "MyKad must be PDF, JPG or PNG."
                    };
                }

                // Normalize user input IC: keep digits only
                const normalizedUserIC = String(icNumber || "").replace(/\D/g, "");
                // Removed early return to allow Name matching even if IC is missing
                // if (normalizedUserIC.length !== 12) ...

                // Normalize user input name (remove extra spaces, convert to uppercase)
                const normalizedUserName = String(userName || "")
                    .trim()
                    .toUpperCase()
                    .replace(/\s+/g, " ");

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

                    // 1. KEYWORD CHECK (Enforce it is a MyKad)
                    const upperText = text.toUpperCase();
                    const keywords = ["MALAYSIA", "KAD", "PENGENALAN", "MYKAD", "WARGANEGARA"];

                    const keywordCount = keywords.reduce((count, word) => {
                        return upperText.includes(word) ? count + 1 : count;
                    }, 0);

                    if (keywordCount < 1) {
                        return {
                            valid: false,
                            message: "Document does not look like a MyKad (missing keywords)."
                        };
                    }

                    // 2. CLEAN & NORMALIZE OCR TEXT for IC matching
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

                    // 3. CHECK IC MATCH
                    // 3. CHECK IC MATCH
                    let icMatched = false;

                    // Only check IC match if the user provided a valid 12-digit IC
                    if (normalizedUserIC.length === 12) {
                        if (cleaned.includes(normalizedUserIC)) {
                            icMatched = true;
                        } else if (cleaned.length >= 12) {
                            const first12 = cleaned.substring(0, 12);
                            if (first12 === normalizedUserIC) {
                                icMatched = true;
                            }
                        }
                    }

                    // 4. CHECK NAME MATCH
                    // Remove special characters from OCR text for better matching
                    const normalizedOcrText = upperText.replace(/[^A-Z\s]/g, " ").replace(/\s+/g, " ");
                    let nameMatched = false;

                    if (normalizedUserName.length > 0) {
                        // Split name into parts and filter out common Malay words
                        const nameParts = normalizedUserName.split(" ").filter(part =>
                            part.length >= 2 && !["BIN", "BINTI", "A/L", "A/P"].includes(part)
                        );

                        console.log("Name parts to match:", nameParts);
                        console.log("OCR text (normalized):", normalizedOcrText.substring(0, 300));

                        // Fuzzy matching function - checks if at least 80% of characters match
                        // Fuzzy matching function - checks against tokens (words) to avoid partial substring false positives
                        const fuzzyMatch = (searchTerm, text) => {
                            // Split text into tokens (words)
                            const tokens = text.split(/\s+/);

                            // 1. Exact Token Match
                            if (tokens.includes(searchTerm)) return true;

                            // 2. Strict Prefix Match (only for long words > 4 chars)
                            // Require at least 80% match AND matching prefix
                            // HAKIMI (6) vs HAKIM (5) = 83% -> PASS
                            // ROSLI (5) vs ROSL (4) = 80% -> PASS
                            if (searchTerm.length > 4) {
                                const minLength = Math.ceil(searchTerm.length * 0.8);
                                const prefix = searchTerm.substring(0, minLength);

                                return tokens.some(token => {
                                    if (!token.startsWith(prefix)) return false;

                                    // Check if token is substring of searchTerm OR searchTerm is substring of token
                                    return token.includes(searchTerm) || searchTerm.includes(token);
                                });
                            }

                            return false;
                        };

                        // Count how many significant parts are found (fuzzy match)
                        const matchedParts = nameParts.filter(part =>
                            fuzzyMatch(part, normalizedOcrText)
                        );

                        console.log("Matched parts:", matchedParts);

                        // Strict Matching Logic
                        // 1. If 3 parts or fewer (e.g. "Ali bin Ahmad"), require 100% match.
                        // 2. If > 3 parts, allow modest fuzzy tolerance (e.g. 3/4 passed).

                        const matchRate = nameParts.length > 0 ? matchedParts.length / nameParts.length : 0;

                        if (nameParts.length <= 3) {
                            nameMatched = matchRate === 1.0;
                        } else {
                            nameMatched = matchRate >= 0.75;
                        }

                        console.log("Match rate:", matchRate, "Total matched:", matchedParts.length, "/", nameParts.length);
                    }

                    console.log("IC Matched:", icMatched, "Name Matched:", nameMatched);

                    // 5. RETURN RESULTS BASED ON MATCHES
                    const resultData = {
                        valid: icMatched && nameMatched,
                        icMatched: icMatched,
                        nameMatched: nameMatched
                    };

                    if (icMatched && nameMatched) {
                        return { ...resultData, message: "MyKad valid — IC and Name matched." };
                    } else if (icMatched && !nameMatched) {
                        return { ...resultData, message: "IC matched but Name does not match." };
                    } else if (!icMatched && nameMatched) {
                        return { ...resultData, message: "Name matched but IC does not match." };
                    } else {
                        return { ...resultData, message: "Neither IC nor Name found in document." };
                    }

                } catch (err) {
                    console.error(err);
                    return {
                        valid: false,
                        message: "Error processing MyKad file."
                    };
                }
            }



            // File Upload UI Handler
            const myKadInput = document.getElementById('myKad');
            const fileDisplay = document.getElementById('myKadFileDisplay');
            const fileNameSpan = document.getElementById('myKadFileName');
            const fileSizeSpan = document.getElementById('myKadFileSize');
            const fileViewLink = document.getElementById('myKadFileView');

            if (myKadInput) {
                console.log("MyKad input found, attaching listener.");
                myKadInput.addEventListener('change', function (e) {
                    console.log("File changed");
                    if (this.files && this.files[0]) {
                        console.log("File selected:", this.files[0].name);
                        const file = this.files[0];

                        // Update File Name
                        fileNameSpan.textContent = file.name;

                        // Update File Size
                        const size = (file.size / 1024 / 1024).toFixed(2);
                        fileSizeSpan.textContent = `${size} MB`;

                        // Create View Link
                        const objectUrl = URL.createObjectURL(file);
                        fileViewLink.href = objectUrl;

                        // Show Display
                        fileDisplay.classList.remove('hidden');
                    } else {
                        console.log("No file selected");
                        fileDisplay.classList.add('hidden');
                    }
                });
            } else {
                console.error("MyKad input NOT found in DOM");
            }

            // VERIFY BUTTON CLICK
            verifyBtn.addEventListener("click", async () => {
                const originalContent = verifyBtn.innerHTML;
                const setButtonLoading = (isLoading, text = "PROCESSING...") => {
                    verifyBtn.disabled = isLoading;
                    if (isLoading) {
                        verifyBtn.innerHTML = `
                            <div class="relative flex items-center justify-center w-16 h-16 mb-1">
                                <div class="loader" style="color: white; --d: 24px"></div>
                            </div>
                            <span class="text-base font-bold text-white tracking-wide">${text}</span>
                        `;
                    } else {
                        verifyBtn.innerHTML = originalContent;
                    }
                };

                // Start loading
                setButtonLoading(true);

                // Show processing for better UX (3 seconds)
                await new Promise(r => setTimeout(r, 3000));

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

                // Age eligibility check
                const calculatedAge = parseInt(ageInput.value) || 0;
                if (calculatedAge >= 17) {
                    messages.push({
                        type: "success",
                        text: `Age requirement met (${calculatedAge} years).`
                    });
                } else {
                    messages.push({
                        type: "error",
                        text: `Age must be at least 17 years. Current age: ${calculatedAge}.`
                    });
                }

                // Check if any license class radio button is selected
                const selectedLicenseClass = document.querySelector('input[name="class_id"]:checked');
                if (selectedLicenseClass)
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
                    const file = myKad.files[0];

                    // STRICT CHECK: Only PDF allowed
                    if (file.type !== "application/pdf") {
                        messages.push({
                            type: "error",
                            text: "Invalid MyKad file format. Only PDF allowed.",
                            details: { icMatched: false, nameMatched: false }
                        });
                    } else {
                        // Update button text for OCR
                        setButtonLoading(true, "OCR SCANNING...");

                        // Show OCR processing animation (3 seconds)
                        await new Promise(r => setTimeout(r, 3000));

                        const icNumber = ic.value.trim();

                        // Always run OCR if file exists (even if IC input is incomplete) 
                        // validateICWithOCR handles the logic of matching what is provided
                        // WRAP IN TIMEOUT: Prevent hanging on "Processing..." if Tesseract fails silently
                        const ocrTimeout = new Promise(resolve =>
                            setTimeout(() => resolve({
                                valid: false,
                                message: "Error processing MyKad: Timed out. Please try a clearer image.",
                                details: { icMatched: false, nameMatched: false }
                            }), 15000) // 15 seconds
                        );

                        const result = await Promise.race([
                            validateICWithOCR(file, icNumber, nameInput.value.trim()),
                            ocrTimeout
                        ]);

                        // Add OCR result message (success or error)
                        messages.push({
                            type: result.valid ? "success" : "error",
                            text: result.message,
                            details: result // Pass full result object including icMatched/nameMatched
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
                        ,
                        category: "format"
                    });
                else
                    messages.push({
                        type: "error",
                        text: "You must accept the terms.",
                        category: "format"
                    });

                // UPDATE VERIFICATION SUMMARY CARDS
                // UPDATE VERIFICATION SUMMARY CARDS
                const updateSummaryCard = (cardId, statusId, passed, summary) => {
                    const card = document.getElementById(cardId);
                    const statusDiv = document.getElementById(statusId);
                    const cardDiv = card.querySelector('div');
                    const icon = card.querySelector('svg');

                    // Reset all color classes
                    cardDiv.classList.remove('border-gray-200', 'bg-white', 'border-green-500', 'bg-green-50', 'border-red-300', 'bg-red-50');
                    icon.classList.remove('text-gray-400', 'text-green-600', 'text-red-500');

                    if (passed) {
                        cardDiv.classList.add('border-green-500', 'bg-green-50');
                        icon.classList.add('text-green-600');
                        statusDiv.className = 'text-xs font-semibold text-green-700';
                        statusDiv.innerHTML = summary;
                    } else {
                        cardDiv.classList.add('border-red-300', 'bg-red-50');
                        icon.classList.add('text-red-500');
                        statusDiv.className = 'text-xs font-semibold text-red-700';
                        statusDiv.innerHTML = summary;
                    }
                };

                // Categorize messages with robust string matching
                const formatChecks = messages.filter(m =>
                    m.text.includes('IC number') || m.text.includes('IC must be') || // Catch both IC messages
                    m.text.includes('Full name') ||
                    m.text.includes('Phone') ||
                    m.text.includes('Address') ||
                    m.text.includes('License Class') || m.text.includes('Package') ||
                    m.text.includes('Payment Type') ||
                    m.text.toLowerCase().includes('terms') // Case insensitive for Terms
                );

                // Catch ALL MyKad errors (missing file, invalid type, missing keywords, processing error)
                const documentChecks = messages.filter(m =>
                    m.text.includes('MyKad') && !m.text.includes('IC and Name') && !m.text.includes('IC matched')
                );

                // Catch ALL identity related messages including generic failures
                const ocrChecks = messages.filter(m =>
                    m.text.includes('IC and Name') || m.text.includes('IC matched') ||
                    m.text.includes('Name matched') || m.text.includes('Neither IC') ||
                    m.text.includes('Provided IC') || m.text.includes('Identity matching') ||
                    m.text.includes('Error processing') // Catch "Error processing MyKad file"
                );

                const ageChecks = messages.filter(m => m.text.includes('Age'));

                // Update Format Validation Card
                // Update Format Validation Card
                const formatPassed = formatChecks.every(m => m.type === 'success');

                let formatSummaryHtml = '<div class="flex flex-col gap-1 mt-1">';
                if (formatChecks.length > 0) {
                    formatChecks.forEach(m => {
                        const isSuccess = m.type === 'success';
                        const icon = isSuccess
                            ? '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>'
                            : '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>';
                        const colorClass = isSuccess ? 'text-green-600' : 'text-red-500';

                        formatSummaryHtml += `
                            <div class="flex items-center gap-1 ${colorClass}">
                                ${icon} ${m.text}
                            </div>
                        `;
                    });
                } else {
                    formatSummaryHtml += '<div class="text-gray-500">Pending validation...</div>';
                }
                formatSummaryHtml += '</div>';

                updateSummaryCard(
                    'formatValidationCard',
                    'formatValidationStatus',
                    formatPassed,
                    formatSummaryHtml
                );

                // Update Document Integrity Card
                const docPassed = documentChecks.length === 0 || documentChecks.every(m => m.type === 'success');
                updateSummaryCard(
                    'documentIntegrityCard',
                    'documentIntegrityStatus',
                    docPassed,
                    docPassed ? '✓ Document verified as valid MyKad' : '✗ Document verification failed'
                );

                // Update Identity Matching (OCR) Card
                // Fix: empty array.every() returns true, so check length first
                const ocrPassed = ocrChecks.length > 0 && ocrChecks.every(m => m.type === 'success');

                // Construct detailed HTML summary
                let ocrSummaryHtml = '';
                const ocrDetailCheck = ocrChecks.find(m => m.details); // Find the one with detailed results

                // Fallback: Default to "failed" state for both if no details exist but we want split view
                // This ensures UI consistency requested by user (always show NAME and IC status)
                const d = ocrDetailCheck ? ocrDetailCheck.details : { icMatched: false, nameMatched: false };

                // If we ran any OCR checks, show the split view. 
                // OR if messages.length > 0 (meaning we clicked verify), but ocrChecks is empty (e.g. invalid IC skipped OCR),
                // we should still show the split view (as failed) rather than "Pending".
                if (ocrChecks.length > 0 || messages.length > 0) {
                    ocrSummaryHtml = `
                        <div class="flex flex-col gap-1 mt-1">
                            <div class="flex items-center gap-1 ${d.icMatched ? 'text-green-600' : 'text-red-500'}">
                                ${d.icMatched ? '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>' : '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>'} IC Number ${d.icMatched ? 'matched' : 'not matched'}
                            </div>
                            <div class="flex items-center gap-1 ${d.nameMatched ? 'text-green-600' : 'text-red-500'}">
                                ${d.nameMatched ? '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>' : '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>'} Name ${d.nameMatched ? 'matched' : 'not matched'}
                            </div>
                        </div>
                    `;
                } else {
                    ocrSummaryHtml = 'Pending verification...';
                }

                updateSummaryCard(
                    'identityMatchingCard',
                    'identityMatchingStatus',
                    ocrPassed,
                    ocrSummaryHtml
                );

                updateSummaryCard(
                    'identityMatchingCard',
                    'identityMatchingStatus',
                    ocrPassed,
                    ocrSummaryHtml
                );

                // Update Age Eligibility Card
                const agePassed = ageChecks.every(m => m.type === 'success');
                const ageValue = ageChecks.find(m => m.text.includes('Age')) ?
                    ageChecks.find(m => m.text.includes('Age')).text.match(/\d+/) : null;
                updateSummaryCard(
                    'ageEligibilityCard',
                    'ageEligibilityStatus',
                    agePassed,
                    agePassed ?
                        `✓ Age requirement met (${ageValue ? ageValue[0] + ' years' : 'verified'})` :
                        `✗ Minimum age is 17 years`
                );

                // Stop loading
                setButtonLoading(false);
                const loader = document.getElementById("loader");
                if (loader) loader.classList.add("hidden");

                // ENABLE/DISABLE APPLY BUTTON
                const allPassed = formatPassed && docPassed && ocrPassed && agePassed;

                // Toggle Lock Icon
                const lockIcon = document.getElementById("applyLockIcon");

                if (allPassed) {
                    applyBtn.disabled = false;
                    applyBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-gray-400');
                    applyBtn.classList.add('bg-primary', 'hover:bg-blue-800', 'transform', 'hover:scale-[1.02]');
                    if (lockIcon) lockIcon.classList.add("hidden");
                } else {
                    applyBtn.disabled = true;
                    applyBtn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-gray-400');
                    applyBtn.classList.remove('bg-primary', 'hover:bg-blue-800', 'transform', 'hover:scale-[1.02]');
                    if (lockIcon) lockIcon.classList.remove("hidden");
                }

                // -------------------------------------------------------------
                // PERCENTAGE CALCULATION & UI UPDATE
                // -------------------------------------------------------------
                const totalChecks = messages.length;
                const passedChecks = messages.filter(m => m.type === 'success').length;
                const percentage = totalChecks > 0 ? Math.round((passedChecks / totalChecks) * 100) : 0;

                // Color Logic: passed 100% -> Green, otherwise -> Red
                const isPerfect = percentage === 100;
                const colorText = isPerfect ? 'text-green-600' : 'text-red-500';
                const colorBg = isPerfect ? 'bg-green-500' : 'bg-red-500';
                const containerStyle = isPerfect ? 'border-green-200 bg-green-50/50' : 'border-red-100 bg-red-50/50';
                const labelColor = isPerfect ? 'text-green-800' : 'text-red-800';

                // Generate HTML for Percentage Display
                resultsDiv.innerHTML = `
                    <div class="p-5 rounded-xl border ${containerStyle} transition-all duration-500 animate-fade-in-up">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-widest ${labelColor} mb-1">Verification Score</h4>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-4xl font-extrabold ${colorText}">${percentage}%</span>
                                    <span class="text-sm font-medium text-gray-400">passed</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="px-3 py-1 rounded-full text-xs font-bold ${isPerfect ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                                    ${passedChecks}/${totalChecks} Criteria
                                </span>
                            </div>
                        </div>
                        
                        <!-- Progress Bar Container -->
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden shadow-inner">
                            <div class="${colorBg} h-full rounded-full transition-all duration-1000 ease-out relative" style="width: ${percentage}%">
                                <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Status Message -->
                        <div class="mt-4 flex items-center gap-2 text-sm ${isPerfect ? 'text-green-700' : 'text-red-600'} font-medium">
                            ${isPerfect
                        ? '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> <span>All requirements met. You can now apply!</span>'
                        : '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg> <span>Please resolve remaining issues.</span>'}
                        </div>
                    </div>
                `;

                resultsDiv.classList.remove("hidden", "opacity-0");
                resultsDiv.classList.add("flex", "opacity-100");
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
        });
    </script>
</body>

</html>