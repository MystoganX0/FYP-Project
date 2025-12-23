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

<body class="font-poppins">
    <!-- SUB NAV (tabs) -->
    <div class="bg-white border-b border-gray-200">
        <div
            class="px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">

            <!-- Navigation Links -->
            <nav class="flex-1 w-full md:w-auto overflow-x-auto no-scrollbar">
                <div class="flex items-center gap-2 p-1">

                    <!-- Label -->
                    <span
                        class="font-medium text-base font-bold text-gray-400 uppercase tracking-widest mr-4 hidden md:block">
                        License Checkpoints
                    </span>

                    <!-- Computer Test -->
                    <a href="{{ route('computer') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('computer') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('computer') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        Computer Test
                    </a>

                    <!-- Divider Arrow -->
                    <svg class="w-5 h-5 text-black hidden sm:block" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <!-- Practical Slot -->
                    <a href="{{ route('practical') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('practical') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('practical') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8h3c0 2.76 2.24 5 5 5s5-2.24 5-5h3c0 4.41-3.59 8-8 8z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v-5">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l4 4">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l-4 4">
                                </path>
                            </svg>
                        </div>
                        Practical Slot
                    </a>

                    <!-- Divider Arrow -->
                    <svg class="w-5 h-5 text-black hidden sm:block" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <!-- JPJ Test -->
                    <a href="{{ route('jpj') }}"
                        class="group relative flex items-center px-4 py-2.5 rounded-full font-medium text-base font-semibold transition-all duration-300 {{ request()->routeIs('jpj') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent text-gray-500 hover:bg-gray-50 hover:text-blue-600' }}">
                        <div
                            class="mr-2.5 {{ request()->routeIs('jpj') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        JPJ Test
                    </a>
                </div>
            </nav>

            <button
                class="open-payment-modal flex items-center justify-center gap-2 px-5 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm sm:text-base font-medium rounded-2xl w-full md:w-auto shadow-sm hover:shadow-md transition-all active:scale-95">
                <span>Next Payment</span>
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </button>

        </div>
    </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-gray-900/60 backdrop-blur-md hidden opacity-0 transition-opacity duration-300">
        <div id="paymentModalContent"
            class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-md p-8 text-center transform scale-90 transition-transform duration-300 overflow-hidden">

            <!-- Decorative circle -->
            <div
                class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>

            <!-- Close Button -->
            <button type="button"
                class="close-payment-modal absolute top-4 right-4 text-gray-400 hover:text-gray-600 bg-transparent hover:bg-gray-50 rounded-full p-2 transition-colors z-10">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- Modal Content -->
            <div class="relative z-10 mt-2">
                <div
                    class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6 shadow-inner ring-4 ring-white">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-3">Payment Required</h3>

                <p class="text-gray-500 mb-8 leading-relaxed text-sm">
                    Complete your payment to unlock the next stage of your driving course. Secure and instant.
                </p>

                <button type="button"
                    class="close-payment-modal w-full text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 focus:ring-4 focus:ring-blue-300 font-bold rounded-2xl text-base px-5 py-4 text-center shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-0.5 transition-all duration-300">
                    Proceed to Payment
                </button>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paymentModal = document.getElementById('paymentModal');
            const paymentModalContent = document.getElementById('paymentModalContent');
            const openBtns = document.querySelectorAll('.open-payment-modal');
            const closeBtns = document.querySelectorAll('.close-payment-modal');

            function openPaymentModal() {
                paymentModal.classList.remove('hidden');
                // Trigger reflow
                void paymentModal.offsetWidth;

                paymentModal.classList.remove('opacity-0');
                paymentModalContent.classList.remove('scale-90');
                paymentModalContent.classList.add('scale-100');
            }

            function closePaymentModal() {
                paymentModal.classList.add('opacity-0');
                paymentModalContent.classList.remove('scale-100');
                paymentModalContent.classList.add('scale-90');

                setTimeout(() => {
                    paymentModal.classList.add('hidden');
                }, 300);
            }

            openBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openPaymentModal();
                });
            });

            closeBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    closePaymentModal();
                });
            });

            paymentModal.addEventListener('click', (e) => {
                if (e.target === paymentModal) {
                    closePaymentModal();
                }
            });
        });
    </script>
</body>

</html>