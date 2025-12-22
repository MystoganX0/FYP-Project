<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Molek Driving Academy- Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"],
                    },
                    colors: {
                        primary: "#0E1F8E",
                        secondary: "#1E3A8A",
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                },
            },
        };
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .bg-pattern {
            background-color: #0E1F8E;
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
        }
    </style>
</head>

<body class="font-poppins bg-pattern min-h-screen flex items-center justify-center p-4">
    <!-- Background Decor Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s"></div>
    </div>

    <!-- Main Container -->
    <div class="glass-card w-full max-w-[1000px] rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row relative z-10 animate-fade-in">
        
        <!-- Left Side: Visual -->
        <div class="hidden md:flex md:w-5/12 bg-gradient-to-br from-primary to-blue-900 p-8 flex-col justify-between relative overflow-hidden text-white">
            <div class="absolute inset-0 opacity-20">
                 <!-- Grid Pattern or Image -->
                 <svg class="w-full h-full" width="100%" height="100%" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M0 40L40 0H20L0 20M40 40V20L20 40" stroke="currentColor" stroke-width="2" stroke-opacity="0.1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid-pattern)"/>
                </svg>
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Welcome Back!</h1>
                <p class="text-blue-100/80 text-sm">Join our driving academy and start your journey towards safe driving.</p>
            </div>

            <div class="relative z-10 flex justify-center py-10">
                <!-- Enlarged/Modernized Car Icon or Illustration -->
                 <div class="bg-white/10 p-6 rounded-full backdrop-blur-sm shadow-inner border border-white/20">
                     <img src="./image/icon/car icon.png" class="w-24 h-24 object-contain drop-shadow-2xl translate-x-1" alt="Car Icon" />
                 </div>
            </div>

            <div class="relative z-10 text-center">
                <p class="text-xs text-blue-200">Already a member?</p>
                <a href="{{ route('home') }}" class="inline-block mt-2 px-6 py-2 rounded-full border border-white/30 hover:bg-white hover:text-primary transition-all duration-300 text-sm font-medium">
                    Sign In instead
                </a>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="w-full md:w-7/12 p-8 md:p-12 bg-white/50 md:bg-white">
            <div class="md:hidden flex justify-center mb-6">
                <img src="./image/icon/car icon.png" class="w-16 h-16" />
            </div>

            <div class="text-center md:text-left mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <p class="text-sm text-gray-500 mt-1">Fill in your details to register</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <!-- Name -->
                <div class="group">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Username</label>
                    <div class="relative transition-all duration-300 focus-within:transform focus-within:-translate-y-1">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-800 placeholder-gray-400"
                            placeholder="Enter your username">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 animate-pulse">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="group">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Email Address</label>
                    <div class="relative transition-all duration-300 focus-within:transform focus-within:-translate-y-1">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-800 placeholder-gray-400"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 animate-pulse">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="group">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Password</label>
                        <div class="relative transition-all duration-300 focus-within:transform focus-within:-translate-y-1">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full pl-10 pr-10 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-800 placeholder-gray-400"
                                placeholder="••••••••">
                            <button type="button" onclick="changeEye('password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Confirm Password</label>
                        <div class="relative transition-all duration-300 focus-within:transform focus-within:-translate-y-1">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full pl-10 pr-10 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-800 placeholder-gray-400"
                                placeholder="••••••••">
                             <button type="button" onclick="changeEye('password_confirmation', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1 animate-pulse">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-primary to-blue-700 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 mt-4 flex items-center justify-center gap-2 group">
                    <span>CREATE ACCOUNT</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>

                <!-- Footer Links -->
                <div class="text-center mt-6">
                    <p class="text-xs text-gray-400">
                        By registering, you agree to our 
                        <a href="#" class="text-primary hover:underline hover:text-blue-700">Terms of Service</a> & 
                        <a href="#" class="text-primary hover:underline hover:text-blue-700">Privacy Policy</a>
                    </p>
                    
                    <div class="mt-6 md:hidden">
                        <p class="text-sm text-gray-600">
                            Already have an account? <br/>
                            <a href="{{ route('home') }}" class="text-primary font-semibold hover:underline">Sign In</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function changeEye(inputId, button) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = button.querySelector("svg");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Crossed Eye
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
            } else {
                passwordInput.type = "password";
                // Normal Eye
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
</body>
</html>
