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
                colors: {
                        primary: "#0E1F8E",
                        secondary: "#D11515", // Red accent
                    }
                },
            },
        };
    </script>
    <style>
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            background-color: #fff;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 80%;
        }
    </style>
</head>

<body class="font-poppins">
    <!-- Navbar -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{ 'bg-primary/95 shadow-md backdrop-blur-md': scrolled, 'bg-primary/90 backdrop-blur-sm': !scrolled }"
         class="fixed w-full top-0 z-50 transition-all duration-300">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group">
                    <div class="relative w-10 h-10 mr-3 transition-transform group-hover:scale-110">
                        <img src="/image/icon/logo.png" alt="logo" class="w-full h-full object-contain">
                    </div>
                    <span class="text-lg md:text-xl font-bold text-white tracking-wide">Molek Driving Academy</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">

                    @guest
                        <div class="flex items-center space-x-6">
                            <a href="{{ route('class') }}" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                CLASSES
                            </a>
                            <a href="{{ route('practical') }}" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                ABOUT US
                            </a>
                            <a href="#" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                CONTACT
                            </a>
                        </div>

                        <button id="openLoginModal"
                            class="ml-6 px-6 py-2.5 bg-[#0E1F8E] text-primary font-bold rounded-full hover:bg-gray-100 hover:-translate-y-0.5 transition-all shadow-lg text-sm">
                            SIGN IN
                        </button>
                    @endguest

                    @auth
                        <div class="flex items-center space-x-6">
                            <a href="{{ route('class') }}" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                CLASSES
                            </a>
                            <a href="{{ route('practical') }}" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                BOOKING
                            </a>
                            <a href="#" class="nav-link text-white/90 hover:text-white font-medium text-sm transition-colors">
                                HISTORY
                            </a>
                        </div>

                        <!-- User Dropdown with Glass effect -->
                        <div x-data="{ open: false }" class="relative ml-4">
                            <button @click="open = !open" @click.away="open = false" 
                                class="flex items-center space-x-3 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-all border border-white/10">
                                <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold ring-2 ring-white/30">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-white font-semibold text-sm pr-1">{{ explode(' ', Auth::user()->name)[0] }}</span>
                                <svg class="w-4 h-4 text-white/70 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-2xl py-1 z-50 ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                                    <p class="text-xs text-gray-500 uppercase font-semibold">Signed in as</p>
                                    <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">Settings</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium transition-colors">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:bg-white/10 transition-colors focus:outline-none">
                        <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" 
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" 
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden absolute top-20 left-0 w-full bg-primary/95 backdrop-blur-xl border-t border-white/10 shadow-xl overflow-hidden rounded-b-2xl">
            <div class="px-6 py-8 space-y-4">
                @guest
                    <a href="{{ route('class') }}" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        Classes
                    </a>
                    <a href="{{ route('practical') }}" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        About Us
                    </a>
                    <a href="#" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        Contact
                    </a>

                    <div class="pt-6 mt-4 border-t border-white/10">
                        <button id="openLoginModalMobile"
                            class="w-full py-4 bg-white text-primary font-bold rounded-xl shadow-lg hover:shadow-xl hover:bg-gray-50 transition-all flex items-center justify-center gap-2">
                            <span>SIGN IN</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endguest

                @auth
                    <div class="flex items-center gap-4 px-4 py-4 mb-4 bg-white/5 rounded-2xl border border-white/10">
                        <div class="w-12 h-12 rounded-full bg-indigo-500 ring-2 ring-white/20 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-white font-bold text-lg leading-tight">{{ Auth::user()->name }}</p>
                            <p class="text-indigo-200 text-sm">Member Account</p>
                        </div>
                    </div>

                    <a href="{{ route('class') }}" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        Classes
                    </a>
                    <a href="{{ route('practical') }}" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        Booking
                    </a>
                    <a href="#" class="block text-lg font-medium text-white/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-all">
                        History
                    </a>

                    <div class="pt-6 mt-4 border-t border-white/10">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full py-4 bg-red-600/90 text-white font-bold rounded-xl hover:bg-red-500 shadow-lg shadow-red-900/30 transition-all flex items-center justify-center gap-2">
                                <span>LOGOUT</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
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
        class="fixed inset-0 z-[60] flex items-center justify-center bg-black/60 backdrop-blur-sm hidden overflow-y-auto transition-opacity duration-300">
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl w-[90%] sm:w-11/12 md:max-w-md relative mx-4 my-8 animate-[fadeIn_0.3s_ease-out]">
            <!-- Close Button -->
            <button id="closeLoginModal" class="absolute top-5 right-5 text-gray-400 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-full p-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Logo and Title -->
            <div class="text-center">
                <div class="inline-block p-4 rounded-full bg-blue-50 mb-4">
                     <img src="{{ asset('/image/icon/logo.png') }}" alt="logo" class="w-16 h-16 object-contain">
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Welcome Back</h2>
                <p class="text-gray-500 mt-2 text-sm">Please sign in to continue your journey</p>

                @if ($errors->any())
                    <div class="mt-4 p-3 bg-red-50 text-red-600 rounded-lg text-sm font-medium border border-red-100 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf

                <!-- Email -->
                <div class="group">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" required placeholder="name@example.com"
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-medium placeholder-gray-400">
                    </div>
                </div>

                <!-- Password -->
                <div class="group">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required placeholder="••••••••"
                            class="w-full pl-11 pr-12 py-3.5 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-medium placeholder-gray-400">
                        <button type="button" onclick="changeEye()"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-900 hover:shadow-lg transform active:scale-[0.98] transition-all flex justify-center items-center gap-2 group">
                    <span>LOGIN</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account yet?
                    <a href="{{ route('register') }}" class="text-primary font-bold hover:underline hover:text-blue-700 ml-1">Create Account</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Padding for Body due to Fixed Header -->
    <div class="h-20"></div>

    <script>
        // Modal Logic
        const openBtn = document.getElementById("openLoginModal");
        const openBtnMobile = document.getElementById("openLoginModalMobile");
        const closeBtn = document.getElementById("closeLoginModal");
        const loginModal = document.getElementById("loginModal");
        const modalContent = loginModal.querySelector("div");

        function toggleModal(show) {
            if (show) {
                loginModal.classList.remove("hidden");
                loginModal.classList.add("flex");
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            } else {
                loginModal.classList.add("hidden");
                loginModal.classList.remove("flex");
                document.body.style.overflow = '';
            }
        }

        if (openBtn) openBtn.addEventListener("click", () => toggleModal(true));
        if (openBtnMobile) openBtnMobile.addEventListener("click", () => toggleModal(true));
        if (closeBtn) closeBtn.addEventListener("click", () => toggleModal(false));
        
        loginModal.addEventListener("click", (e) => {
            if (!modalContent.contains(e.target)) toggleModal(false);
        });

        // Toggle Password Visibility
        function changeEye() {
            const passwordInput = document.getElementById("password");
            const eyeButton = passwordInput.nextElementSibling;
            const eyeIcon = eyeButton.querySelector("svg");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.974 12c1.75 4.118 5.964 7 10.026 7 1.865 0 3.63-.47 5.155-1.297M6.228 6.228A10.45 10.45 0 0 1 12 5c4.062 0 8.276 2.882 10.026 7a10.451 10.451 0 0 1-4.31 5.223M6.228 6.228 3 3m0 0l18 18" />`;
                eyeButton.classList.add("text-gray-600");
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
                eyeButton.classList.remove("text-gray-600");
            }
        }

        // Show modal if errors exist
        document.addEventListener("DOMContentLoaded", () => {
            @if ($errors->any())
                toggleModal(true);
            @endif
        });
    </script>
</body>
</html>