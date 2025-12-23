<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Molek Driving Academy</title>
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
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .credit-card-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }

        /* Success Animation */
        .checkmark-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
            position: relative;
            background: #4ade80;
            box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7);
            animation: pulse-green 2s infinite;
        }

        .checkmark {
            width: 44px;
            height: 44px;
            border-radius: 5px;
            display: block;
            stroke-width: 4;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: inset 0px 0px 0px #4ade80;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: translate(-50%, -50%) scale(1);
            }

            50% {
                transform: translate(-50%, -50%) scale(1.1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 50px #4ade80;
            }
        }

        @keyframes pulse-green {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 20px rgba(74, 222, 128, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0);
            }
        }
    </style>
</head>

<body class="font-poppins bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
            <div
                class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
            </div>
            <div
                class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute bottom-[-20%] left-[20%] w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Order Summary -->
            <div class="space-y-6">
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Summary</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                            <span class="text-gray-600">License Class</span>
                            <span class="font-semibold text-gray-900">Class D (Car)</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                            <span class="text-gray-600">Package</span>
                            <span class="font-semibold text-gray-900">Preferred++</span>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-lg font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-extrabold text-blue-600">RM 3,899.00</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 rounded-3xl p-6 border border-blue-100 flex items-start gap-4">
                    <div class="p-3 bg-blue-100 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Secure Payment</h4>
                        <p class="text-sm text-blue-700 mt-1">Your payment information is encrypted and secure. We do
                            not store your credit card details.</p>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="glass-card rounded-3xl shadow-2xl p-8 relative">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    Payment Details
                </h2>

                <!-- Credit Card Preview -->
                <div
                    class="credit-card-bg rounded-2xl p-6 text-white mb-8 shadow-lg relative overflow-hidden transform transition-transform hover:scale-105 duration-300">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 -ml-4 -mb-4 w-32 h-32 bg-white opacity-10 rounded-full blur-xl">
                    </div>

                    <div class="flex justify-between items-start mb-8">
                        <div class="opacity-80">
                            <svg class="w-12 h-8" viewBox="0 0 48 32" fill="none">
                                <rect x="0" y="0" width="48" height="32" rx="4" fill="currentColor"
                                    fill-opacity="0.1" />
                                <circle cx="14" cy="16" r="10" fill="#EB001B" fill-opacity="0.8" />
                                <circle cx="34" cy="16" r="10" fill="#F79E1B" fill-opacity="0.8" />
                            </svg>
                        </div>
                        <img src="https://img.icons8.com/color/48/000000/chip-card.png" class="w-10 h-10 opacity-80"
                            alt="chip" />
                    </div>

                    <div class="mb-6">
                        <div class="text-xs opacity-75 mb-1">Card Number</div>
                        <div class="text-xl font-mono tracking-widest" id="card-display">#### #### #### ####</div>
                    </div>

                    <div class="flex justify-between">
                        <div>
                            <div class="text-xs opacity-75 mb-1">Card Holder</div>
                            <div class="font-medium tracking-wide uppercase text-sm" id="name-display">YOUR NAME</div>
                        </div>
                        <div>
                            <div class="text-xs opacity-75 mb-1">Expires</div>
                            <div class="font-medium tracking-wide text-sm" id="expiry-display">MM/YY</div>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                            <input type="text" id="card-number" placeholder="0000 0000 0000 0000" maxlength="19"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none bg-white/50 backdrop-blur-sm" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Card Holder Name</label>
                            <input type="text" id="card-name" placeholder="John Doe"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none bg-white/50 backdrop-blur-sm uppercase" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                                <input type="text" id="expiry-date" placeholder="MM/YY" maxlength="5"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none bg-white/50 backdrop-blur-sm" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                                <input type="password" placeholder="123" maxlength="3"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none bg-white/50 backdrop-blur-sm" />
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-600/30 transform hover:-translate-y-0.5 transition-all duration-200 mt-4 flex items-center justify-center gap-2 group">
                            <span>Pay RM 3,899.00</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Success Modal -->
    <div id="success-modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full mx-4 transform scale-90 transition-transform duration-300"
            id="modal-content">
            <div class="text-center">
                <div class="mb-6 relative">
                    <div class="checkmark-circle">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-2">Payment Successful!</h3>
                <p class="text-gray-500 mb-8">Thank you for your payment. Your registration has been confirmed.</p>

                <div class="space-y-3">
                    <a href="#"
                        class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-600/30 transition-all duration-200">
                        Download Receipt
                    </a>
                    <a href="/"
                        class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition-all duration-200">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form Submission & Success Modal
        const paymentForm = document.querySelector('form');
        const successModal = document.getElementById('success-modal');
        const modalContent = document.getElementById('modal-content');
        const payButton = paymentForm.querySelector('button[type="submit"]');

        paymentForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Validate inputs here if needed

            // Show loading state
            const originalBtnContent = payButton.innerHTML;
            payButton.innerHTML = `<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg> Processing...`;
            payButton.disabled = true;

            // Simulate API call delay
            setTimeout(() => {
                // Hide modal loading, show success
                payButton.innerHTML = originalBtnContent;
                payButton.disabled = false;

                successModal.classList.remove('hidden');
                // Trigger reflow
                void successModal.offsetWidth;

                successModal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-90');
                modalContent.classList.add('scale-100');
            }, 2000);
        });

        // Simple input formatting script
        const cardNumberInput = document.getElementById('card-number');
        const cardDisplay = document.getElementById('card-display');

        const cardNameInput = document.getElementById('card-name');
        const nameDisplay = document.getElementById('name-display');

        const expiryInput = document.getElementById('expiry-date');
        const expiryDisplay = document.getElementById('expiry-display');

        cardNumberInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '').substring(0, 16);
            value = value != '' ? value.match(/.{1,4}/g).join(' ') : '';
            e.target.value = value;
            cardDisplay.innerText = value || '#### #### #### ####';
        });

        cardNameInput.addEventListener('input', (e) => {
            nameDisplay.innerText = e.target.value.toUpperCase() || 'YOUR NAME';
        });

        expiryInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '').substring(0, 4);
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
            expiryDisplay.innerText = value || 'MM/YY';
        });
    </script>
</body>

</html>