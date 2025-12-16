<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Molek Driving Academy</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brandBlue: '#174aa6',
                        softBlue: '#1f6fd8'
                    }
                }
            }
        }
    </script>
    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body class="font-poppins bg-blue-900">
    <!-- SUB NAV (tabs) -->
    <div class="bg-[#e9e9e9] border-b border-gray-200">
        <div
            class="px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">

            <!-- Responsive Breadcrumb with Horizontal Scroll -->
            <nav class="flex-1 overflow-x-auto pb-2 md:pb-0" aria-label="Breadcrumb">
                <ol
                    class="flex items-center gap-3 sm:gap-4 px-3 py-2 text-blue-700 bg-white md:bg-[#e9e9e9] border border-gray-200 rounded-lg min-w-max">
                    <li class="flex items-center text-lg font-bold text-black mr-4">
                        Booking
                    </li>

                    <!-- Computer Test -->
                    <li class="flex items-center">
                        <a href="{{ route('computer') }}"
                            class="inline-flex items-center text-sm sm:text-base font-medium whitespace-nowrap border-b-[6px] py-1 transition-all duration-300 ease-in-out {{ request()->routeIs('computer') ? 'text-black border-blue-600' : 'text-gray-700 border-transparent hover:text-blue-600 hover:border-blue-200' }}">
                            Computer Test
                        </a>
                    </li>

                    <!-- Practical Slot -->
                    <li class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('practical') }}"
                            class="ms-1 text-sm sm:text-base font-medium md:ms-2 whitespace-nowrap border-b-[6px] py-1 transition-all duration-300 ease-in-out {{ request()->routeIs('practical') ? 'text-black border-blue-600' : 'text-gray-700 border-transparent hover:text-blue-600 hover:border-blue-200' }}">
                            Practical Slot
                        </a>
                    </li>

                    <!-- JPJ Test -->
                    <li class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('jpj') }}"
                            class="ms-1 text-sm sm:text-base font-medium md:ms-2 whitespace-nowrap border-b-[6px] py-1 transition-all duration-300 ease-in-out {{ request()->routeIs('jpj') ? 'text-black border-blue-600' : 'text-gray-700 border-transparent hover:text-blue-600 hover:border-blue-200' }}">
                            JPJ Test
                        </a>
                    </li>
                </ol>
            </nav>

            <button data-modal-target="paymentModal" data-modal-toggle="paymentModal"
                class="flex items-center justify-center gap-2 px-5 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm sm:text-base font-medium rounded-2xl w-full md:w-auto shadow-sm hover:shadow-md transition-all active:scale-95">
                <span>Next Payment</span>
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </button>

        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm bg-black/30 p-4 sm:p-6">
        <div
            class="relative bg-white rounded-3xl shadow-xl w-full max-w-md p-6 text-center transform transition-all scale-100">

            <!-- Close Button -->
            <button type="button" data-modal-hide="paymentModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 rounded-lg p-1.5 hover:bg-gray-100 transition-colors">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- Modal Content -->
            <div class="mt-4">
                <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">Next Payment Required</h3>

                <p class="text-gray-500 mb-8 leading-relaxed">
                    Please proceed to complete your next payment to unlock more slots and features.
                </p>

                <button data-modal-hide="paymentModal" type="button"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-xl text-base px-5 py-3.5 text-center transition-colors">
                    Proceed
                </button>
            </div>
        </div>
    </div>
</body>

</html>