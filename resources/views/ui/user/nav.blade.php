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
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>

<body class="font-poppins bg-transparent">
    <!-- SUB NAV (floating) -->
    <div class="px-4 pb-2 pt-2 flex flex-col md:flex-row items-center justify-center gap-4 relative z-40">

        <!-- Floating Navigation Menu -->
        <nav class="bg-[#151513] rounded-full px-2 py-2 flex items-center shadow-2xl overflow-x-auto no-scrollbar max-w-full">
            <div class="flex items-center gap-1">

                <!-- Computer Test -->
                <a href="{{ route('computer') }}"
                    class="relative whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->routeIs('computer') ? 'bg-[#2C2C2A] text-white shadow-inner ring-1 ring-white/10' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                   Computer Test
                </a>

                <!-- Practical Slot -->
                <a href="{{ route('practical') }}"
                    class="relative whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->routeIs('practical') ? 'bg-[#2C2C2A] text-white shadow-inner ring-1 ring-white/10' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                   Practical Slot
                </a>

                <!-- JPJ Test -->
                <a href="{{ route('jpj') }}"
                    class="relative whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->routeIs('jpj') ? 'bg-[#2C2C2A] text-white shadow-inner ring-1 ring-white/10' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                    JPJ Test
                </a>
            </div>
        </nav>

        <!-- Next Phase Button (Beside the menu) -->
            @php
                $studentId = \Illuminate\Support\Facades\Auth::id();

                // Get Application to check payment type
                $application = \App\Models\Application::where('student_id', $studentId)
                    ->with('payment')
                    ->latest()
                    ->first();

                $paymentType = $application && $application->payment ? $application->payment->payment_type : null;

                // Check if user has passed Computer Test
                $isComputerTestDone = \App\Models\Booking::whereHas('application', function ($q) use ($studentId) {
                    $q->where('student_id', $studentId);
                })
                    ->whereHas('schedule', function ($q) {
                        $q->where('phase_id', 1);
                    })
                    ->whereHas('attempt', function ($q) {
                        $q->where('result', 'Pass');
                    })
                    ->exists();
            @endphp

            @if($isComputerTestDone)
                @if($paymentType === 'full')
                    <a href="{{ route('practical') }}"
                        class="flex shrink-0 items-center gap-2 px-6 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm font-bold rounded-full shadow-lg shadow-green-900/20 transition-all active:scale-95">
                        <span>Next Phase</span>
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                @else
                    <button
                        class="open-payment-modal shrink-0 flex items-center gap-2 px-6 py-3 bg-[#0BCE83] hover:bg-green-400 text-black text-sm font-bold rounded-full shadow-lg shadow-green-900/20 transition-all active:scale-95">
                        <span>Next Phase</span>
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                @endif
            @else
                <button disabled title="Complete Computer Test to unlock"
                    class="flex shrink-0 items-center gap-2 px-6 py-3 bg-[#151513] border border-white/10 text-gray-500 cursor-not-allowed text-sm font-bold rounded-full shadow-lg transition-all opacity-50">
                    <span>Next Phase</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </button>
            @endif

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
                    if (!btn.disabled) {
                        openPaymentModal();
                    }
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