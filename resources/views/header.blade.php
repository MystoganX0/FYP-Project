<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
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

<body class="font-poppins">
    <!-- Navbar -->
    <nav x-data="{ open: false }">
        <div class="w-full px-4 sm:px-6 lg:px-8 bg-gray-900 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)]">
            <div class="flex justify-between items-center h-24">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="/image/icon/logo.png" alt="logo" class="h-12 w-auto">
                    <span class="text-lg pl-3 font-bold text-white">Molek Driving Academy</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">

                    @guest
                        <a href="{{ route('class') }}" class="text-white hover:text-red-500 px-3 py-2">
                            Classes
                        </a>
                        <a href="{{ route('practical') }}" class="text-white hover:text-red-500 px-3 py-2">
                            About Us
                        </a>
                        <a href="#" class="text-white hover:text-red-500 px-3 py-2">
                            Contact
                        </a>

                        <button id="openLoginModal"
                            class="ml-4 px-4 py-2 bg-[#0E1F8E] text-white font-medium rounded-full hover:bg-indigo-700 transition">
                            Sign In
                        </button>
                    @endguest

                    @auth
                        <a href="{{ route('class') }}" class="text-white hover:text-red-500 px-3 py-2">
                            Classes
                        </a>
                        <a href="{{ route('practical') }}" class="text-white hover:text-red-500 px-3 py-2">
                            Booking
                        </a>
                        <a href="#" class="text-white hover:text-red-500 px-3 py-2">
                            About Us
                        </a>
                        <a href="#" class="text-white hover:text-red-500 px-3 py-2">
                            Contact
                        </a>

                        <!-- User Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-2 px-3 py-2">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>

                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-40 bg-red-600 rounded-xl shadow-lg py-2 z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-base font-bold text-white">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-gray-100">
                        <svg x-show="!open" class="w-6 h-6 text-white" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" class="w-6 h-6 text-white" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden absolute top-24 left-0 w-full bg-gray-900/95 backdrop-blur-lg border-t border-gray-800 shadow-xl z-50">
            <div class="px-6 py-6 space-y-2">
                @guest
                    <a href="{{ route('class') }}"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">Classes</a>
                    <a href="{{ route('practical') }}"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">About
                        Us</a>
                    <a href="#"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">Contact</a>

                    <div class="pt-4 mt-4 border-t border-gray-800">
                        <button id="openLoginModalMobile"
                            class="w-full py-3.5 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl hover:from-red-500 hover:to-red-600 shadow-lg shadow-red-900/20 transition-all flex items-center justify-center gap-2">
                            <span>Sign In</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endguest

                @auth
                    <div class="flex items-center gap-3 px-4 py-3 mb-4 bg-gray-800/50 rounded-xl border border-gray-700">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-bold text-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-white font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-gray-400 text-sm">Member</p>
                        </div>
                    </div>

                    <a href="{{ route('class') }}"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">Classes</a>
                    <a href="{{ route('practical') }}"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">Booking</a>
                    <a href="#"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">About
                        Us</a>
                    <a href="#"
                        class="block text-lg font-medium text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors">Contact</a>

                    <div class="pt-4 mt-4 border-t border-gray-800">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full py-3.5 bg-red-600/10 text-red-500 font-semibold rounded-xl hover:bg-red-600 hover:text-white transition-all flex items-center justify-center gap-2 border border-red-900/30">
                                <span>Logout</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 hidden overflow-y-auto">
        <div class="bg-white p-8 rounded-3xl shadow-lg w-[90%] sm:w-11/12 md:max-w-xl relative mx-4 my-8">
            <!-- Close Button -->
            <button id="closeLoginModal" class="absolute top-6 right-8 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Logo and Title -->
            <div class="text-center max-w-md mx-auto">
                <img src="{{ asset('/image/icon/logo.png') }}" alt="logo" class="w-20 sm:w-28 md:w-32 mx-auto">
                <h2 class="text-lg sm:text-xl font-bold mt-6">Welcome to Molek Driving Academy</h2>
                <p class="text-sm text-gray-600 mt-1">Sign-in to enjoy experience with us</p>

                <!-- Error Notification -->
                @if ($errors->any())
                    <div class="mt-2 text-sm text-red-600 font-medium">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>

            <!-- Form with padding -->
            <div class="px-4 sm:px-6 md:px-8 max-w-md mx-auto">
                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- User Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" required placeholder="Email"
                            class="w-full pl-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- Lock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required placeholder="Password"
                            class="w-full pl-10 pr-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                        <button type="button" onclick="changeEye()"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <!-- Eye Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 bg-[#0E1F8E] text-white w-full py-3 rounded-lg font-medium hover:bg-blue-900 transition">
                        LOGIN
                    </button>
                </form>

                <!-- Footer -->
                <p class="text-center text-sm text-gray-600 mt-10">
                    No Account?
                    <a href="{{ route('register') }}" class="text-[#0E1F8E] font-medium hover:underline">Create
                        Now</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle modal open/close
        const openBtn = document.getElementById("openLoginModal");
        const openBtnMobile = document.getElementById("openLoginModalMobile");
        const closeBtn = document.getElementById("closeLoginModal");
        const loginModal = document.getElementById("loginModal");
        const modalContent = loginModal.querySelector("div"); // inner content box

        if (openBtn) {
            openBtn.addEventListener("click", () => {
                loginModal.classList.remove("hidden");
                loginModal.classList.add("flex");
            });
        }

        if (openBtnMobile) {
            openBtnMobile.addEventListener("click", () => {
                loginModal.classList.remove("hidden");
                loginModal.classList.add("flex");
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                loginModal.classList.add("hidden");
                loginModal.classList.remove("flex");
            });
        }

        // Close modal when clicking outside the content
        loginModal.addEventListener("click", (e) => {
            if (!modalContent.contains(e.target)) {
                loginModal.classList.add("hidden");
                loginModal.classList.remove("flex");
            }
        });

        // Toggle password visibility
        function changeEye() {
            const passwordInput = document.getElementById("password");
            const eyeButton = passwordInput.nextElementSibling; // The button right after input
            const eyeIcon = eyeButton.querySelector("svg");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Change to "eye-slash" icon
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M3.98 8.223A10.477 10.477 0 0 0 1.974 12c1.75 4.118 5.964 7 
                     10.026 7 1.865 0 3.63-.47 5.155-1.297M6.228 6.228A10.45 10.45 
                     0 0 1 12 5c4.062 0 8.276 2.882 10.026 7a10.451 10.451 
                     0 0 1-4.31 5.223M6.228 6.228 3 3m0 0l18 18" />
        `;
            } else {
                passwordInput.type = "password";
                // Change back to "eye" icon
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 
                     7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 
                     7.178.07.207.07.431 0 .639C20.577 16.49 16.64 
                     19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        `;
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            @if ($errors->any())
                const loginModal = document.getElementById("loginModal");
                loginModal.classList.remove("hidden");
                loginModal.classList.add("flex");
            @endif
        });
    </script>

</body>

</html>