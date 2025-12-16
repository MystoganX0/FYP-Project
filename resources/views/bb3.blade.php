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
        /* Loader */
        .loader {
            width: 24px;
            aspect-ratio: 1;
            border-radius: 50%;
            border: 4px solid #0000;
            border-right-color: #ffa50097;
            position: relative;
            animation: l24 1s infinite linear;
        }

        .loader:before,
        .loader:after {
            content: "";
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: inherit;
            animation: inherit;
            animation-duration: 2s;
        }

        .loader:after {
            animation-duration: 4s;
        }

        @keyframes l24 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>
</head>

<body class="font-poppins bg-gray-100 text-white">
    @include('header')

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-8 flex items-center justify-between">
        <a href="{{ url()->previous() }}" class="text-blue-900 hover:text-blue-900 flex items-center">
            <div
                class="inline-flex items-center justify-center w-12 h-12 bg-blue-900 border-2 border-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 text-white">
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
        <div class="flex-[4] min-w-0 bg-white rounded-3xl p-8 text-black shadow-2xl ">

            <form id="registrationForm" class="space-y-5 text-base px-2 md:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-center md:justify-between py-3 px-4">
                    <img src="/image/icon/logo.png" alt="logo" class="h-16 w-auto mb-2 md:mb-0">
                    <div class="flex flex-col items-center text-center md:flex-1">
                        <span class="text-xl font-semibold">MOLEK DRIVING ACADEMY SDN BHD</span>
                        <span class="text-2xl font-bold">PERMOHONAN PENDAFTARAN LESEN MEMANDU</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- IC Number -->
                    <div class="relative">
                        <label for="icNumber" class="block mb-2 font-semibold">IC Number</label>
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

                    <!-- Full Name -->
                    <div class="relative">
                        <label for="fullName" class="block mb-2 font-medium">Full Name</label>
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
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Phone -->
                    <div class="relative">
                        <label for="phoneNumber" class="block mb-1 font-medium text-black">Phone Number</label>
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
                    <label for="address" class="block mb-1 font-medium">Address</label>
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- License Class -->
                    <div class="relative">
                        <label for="licenseClass" class="block mb-1 font-medium">License Class</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                        <label for="package" class="block mb-1 font-medium">License Package</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                    <ul class="grid w-full gap-4 md:grid-cols-2">
                        <li class="relative">
                            <input type="radio" id="payment-full" name="payment_type" value="full"
                                class="hidden peer" required>
                            <label for="payment-full"
                                class="inline-flex items-center justify-between w-full p-4 text-base text-gray-800 bg-white border-4 border-gray-200 rounded-xl cursor-pointer transition-all duration-200
peer-checked:border-3 peer-checked:border-blue-500 peer-checked:bg-blue-100 hover:border-blue-300 hover:bg-white relative">

                                <span class="absolute top-3 right-3 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                    </svg>
                                </span>

                                <div class="block">
                                    <div class="w-full text-base font-medium">Full Payment</div>
                                    <div class="w-full text-base text-gray-500">Pay the full amount at once.</div>
                                    <div class="w-full text-base font-semibold pt-2">First Payment : RM 1599</div>
                                    <div class="w-full text-base font-semibold">Second Payment : RM 0</div>
                                    <div class="w-full text-base font-semibold">Third Payment : RM 0</div>
                                </div>
                            </label>
                        </li>

                        <li class="relative">
                            <input type="radio" id="payment-installment" name="payment_type" value="installment"
                                class="hidden peer" checked>
                            <label for="payment-installment"
                                class="inline-flex items-center justify-between w-full p-4 text-base text-gray-800 bg-white border-4 border-gray-200 rounded-xl cursor-pointer transition-all duration-200
peer-checked:border-3 peer-checked:border-blue-500 peer-checked:bg-blue-100 hover:border-blue-300 hover:bg-white">

                                <span class="absolute top-3 right-3 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </span>

                                <div class="block">
                                    <div class="w-full text-base font-medium">Installments (3 Stage)</div>
                                    <div class="w-full text-base text-gray-500">Pay in three smaller stages.</div>
                                    <div class="w-full text-base font-semibold pt-2">First Payment : RM 800</div>
                                    <div class="w-full text-base font-semibold">Second Payment : RM 500</div>
                                    <div class="w-full text-base font-semibold">Third Payment : RM 500</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Upload Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Upload MyKad -->
                    <div class="w-full">
                        <label for="myKad" class="block mb-2 text-base font-medium text-black">Upload MyKad</label>
                        <input id="myKad" type="file" aria-describedby="myKad_help"
                            class="block w-full text-base font-medium text-black border border-gray-300 rounded-xl cursor-pointer 
      bg-transparent focus:outline-none focus:ring-4 focus:ring-blue-900 
      file:bg-black file:text-white file:border-none file:rounded-md file:px-4 file:py-2.5 file:mr-3">
                        <p id="myKad_help" class="mt-1 text-sm text-gray-600">
                            JPG, PNG, or PDF (MAX. 2MB)
                        </p>
                        <p id="myKadICNotification" class="text-red-500 text-base mt-1 hidden">
                            IC number not found in the uploaded file. Please check your document.
                        </p>

                        <p id="myKadError" class="text-red-500 text-base mt-1 hidden">Please upload your MyKad.</p>
                    </div>

                    <!-- Upload Photo -->
                    <div class="w-full">
                        <label for="photoUpload" class="block mb-2 text-base font-medium text-black">Upload
                            Photo</label>
                        <input id="photoUpload" type="file" aria-describedby="photo_help"
                            class="block w-full text-base font-medium text-black border border-gray-300 rounded-xl cursor-pointer 
      bg-transparent focus:outline-none focus:ring-4 focus:ring-blue-900 
      file:bg-black file:text-white file:border-none file:rounded-md file:px-4 file:py-2.5 file:mr-3">
                        <p id="photo_help" class="mt-1 text-sm text-gray-600">
                            JPG, PNG, or GIF (MAX. 800×400px)
                        </p>
                        <p id="photoError" class="text-red-500 text-base mt-1 hidden">Please upload your photo.</p>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="agreeTerms" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-xl focus:ring-blue-500 focus:ring-2">
                    </div>
                    <div class="ms-2 text-base font-medium text-gray-900">
                        <label for="agreeTerms">
                            Agree with our terms & conditions
                        </label>
                        <p id="termsHelper" class="text-sm font-normal text-gray-500">
                            Please read our <a href="#" class="text-blue-600 hover:underline">terms and
                                conditions</a> before proceeding.
                        </p>
                    </div>
                </div>
                <p id="termsError" class="text-red-500 text-base mt-1 hidden">
                    You must agree to the terms.
                </p>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="apply"
                        class="w-full bg-blue-900 text-white font-semibold py-6 rounded-xl hover:bg-blue-700 transition-colors duration-200 hidden">
                        CHECK APPLICATION
                    </button>
                </div>
            </form>
        </div>

        <div class="flex-[1] min-w-0 space-y-6">
            <div class="bg-blue-100 rounded-3xl border-4 border-blue-400 p-6">

                <button id="verify" type="verify"
                    class="w-full bg-blue-900 text-white py-3 rounded-3xl border-2 border-white font-bold hover:scale-110 transition flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                    <span id="btnText">VERIFY INFO</span>
                </button>

                <div id="verifyResults"
     class="mt-4 p-4 bg-white border-2 border-gray-300 rounded-xl text-black text-base hidden">
</div>

            </div>
        </div>

    </section>

    @include('footer')

    <script>
        const packageSelect = document.getElementById('package');
        packageSelect.addEventListener('change', function() {
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
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("registrationForm");

            const ic = document.getElementById("icNumber");
            const icError = document.getElementById("icError");

            const name = document.getElementById("fullName");
            const nameError = document.getElementById("nameError");

            const phone = document.getElementById("phoneNumber");
            const phoneError = document.getElementById("phoneError");

            const address = document.getElementById("address");
            const addressError = document.getElementById("addressError");

            const myKad = document.getElementById("myKad");
            const myKadError = document.getElementById("myKadError");

            const photo = document.getElementById("photoUpload");
            const photoError = document.getElementById("photoError");

            const terms = document.getElementById("agreeTerms");
            const termsError = document.getElementById("termsError");


            // SUBMIT VALIDATION
            form.addEventListener("verify", function(e) {
                let valid = true;

                // IC validation
                if (!/^\d{12}$/.test(ic.value.trim())) {
                    icError.classList.remove("hidden");
                    valid = false;
                } else {
                    icError.classList.add("hidden");
                }

                // Name validation
                if (!/^[A-Za-z\s]+$/.test(name.value.trim())) {
                    nameError.classList.remove("hidden");
                    valid = false;
                } else {
                    nameError.classList.add("hidden");
                }

                // Phone validation
                if (!/^\d{9,11}$/.test(phone.value.trim())) {
                    phoneError.classList.remove("hidden");
                    valid = false;
                } else {
                    phoneError.classList.add("hidden");
                }

                // Address validation
                if (address.value.trim().length < 5) {
                    addressError.classList.remove("hidden");
                    valid = false;
                } else {
                    addressError.classList.add("hidden");
                }

                // MyKad upload validation
                if (!myKad.files.length) {
                    myKadError.classList.remove("hidden");
                    valid = false;
                } else {
                    myKadError.classList.add("hidden");
                }

                // Photo upload validation
                if (!photo.files.length) {
                    photoError.classList.remove("hidden");
                    valid = false;
                } else {
                    photoError.classList.add("hidden");
                }

                // Terms
                if (!terms.checked) {
                    termsError.classList.remove("hidden");
                    valid = false;
                } else {
                    termsError.classList.add("hidden");
                }

                // Prevent submit if invalid
                if (!valid) {
                    e.preventDefault();
                }
            });


            // LIVE VALIDATION (optional but nice UX)
            ic.addEventListener("input", () => {
                /^\d{12}$/.test(ic.value.trim()) ?
                    icError.classList.add("hidden") :
                    icError.classList.remove("hidden");
            });

            name.addEventListener("input", () => {
                /^[A-Za-z\s]+$/.test(name.value.trim()) ?
                    nameError.classList.add("hidden") :
                    nameError.classList.remove("hidden");
            });

            phone.addEventListener("input", () => {
                /^\d{9,11}$/.test(phone.value.trim()) ?
                    phoneError.classList.add("hidden") :
                    phoneError.classList.remove("hidden");
            });

            address.addEventListener("input", () => {
                address.value.trim().length >= 5 ?
                    addressError.classList.add("hidden") :
                    addressError.classList.remove("hidden");
            });

        });
    </script>

    <script>
        const pdfInput = document.getElementById("myKad");

        async function validateICWithOCR(file, icNumber) {
            const validTypes = ["application/pdf", "image/jpeg", "image/png"];
            if (!validTypes.includes(file.type)) {
                alert("Please upload a PDF, JPG, or PNG file.");
                return false;
            }

            try {
                let text = "";

                if (file.type === "application/pdf") {
                    // Extract text from PDF
                    const arrayBuffer = await file.arrayBuffer();
                    const pdfjsLib = window['pdfjs-dist/build/pdf'];
                    pdfjsLib.GlobalWorkerOptions.workerSrc =
                        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
                    const pdf = await pdfjsLib.getDocument({
                        data: arrayBuffer
                    }).promise;

                    for (let i = 1; i <= pdf.numPages; i++) {
                        const page = await pdf.getPage(i);
                        const content = await page.getTextContent();
                        text += content.items.map(item => item.str).join(' ');
                    }

                    // If no text, run OCR on first page
                    if (text.trim() === "") {
                        const canvas = document.createElement("canvas");
                        const page = await pdf.getPage(1);
                        const viewport = page.getViewport({
                            scale: 2
                        });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        const context = canvas.getContext("2d");
                        await page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise;
                        const imgData = canvas.toDataURL("image/png");

                        const result = await Tesseract.recognize(imgData, "eng");
                        text = result.data.text;
                    }

                } else {
                    // Image: run OCR directly
                    const reader = new FileReader();
                    const promise = new Promise(resolve => {
                        reader.onload = async function() {
                            const result = await Tesseract.recognize(reader.result, "eng");
                            text = result.data.text;
                            resolve();
                        };
                    });
                    reader.readAsDataURL(file);
                    await promise;
                }

                // Check IC number
                if (!text.includes(icNumber)) {
                    alert("IC number not found in the uploaded file. Please check your document.");
                    return false;
                }

                return true;

            } catch (error) {
                console.error(error);
                alert("Error reading the file. Please try again.");
                return false;
            }
        }

        // Event listener for file upload
        pdfInput.addEventListener("change", async function(e) {
            const file = e.target.files[0];
            const icNumber = document.getElementById("icNumber").value.trim();

            if (file && icNumber.length === 12) {
                await validateICWithOCR(file, icNumber);
            }
        });

        // Prevent form submission if IC not found
        const form = document.getElementById("registrationForm");
        form.addEventListener("verify", async function(e) {
            const file = pdfInput.files[0];
            const icNumber = document.getElementById("icNumber").value.trim();

            if (file && icNumber.length === 12) {
                const validIC = await validateICWithOCR(file, icNumber);
                if (!validIC) {
                    e.preventDefault(); // stop form submission
                }
            }
        });
    </script>
</body>

</html>
