<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
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
</head>

<body class="font-poppins bg-white">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left Side -->
        <div class="w-full md:w-1/2 bg-[#0E1F8E] text-white flex items-center justify-center p-8">
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <!-- Car Image -->
                <div class="flex justify-center mb-6">
                    <img src="./image/icon/car icon.png" class="w-24 h-24" />
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-semibold text-center mb-2">Create New Account</h2>
                <p class="text-center text-sm text-gray-600 mb-6">
                    Please create an account to continue
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
                    @csrf

                    <!-- Name -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- User Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            autocomplete="name" placeholder="Username"
                            class="w-full pl-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- Email Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username" placeholder="Email"
                            class="w-full pl-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- Lock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            placeholder="Password"
                            class="w-full pl-10 pr-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                        <button type="button" onclick="changeEye('password', this)"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <!-- Eye Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                            <!-- Lock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirm Password"
                            class="w-full pl-10 pr-10 p-3 rounded-lg bg-gray-100 border border-gray-200 focus:ring-2 focus:ring-[#0E1F8E] focus:outline-none">
                        <button type="button" onclick="changeEye('password_confirmation', this)"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <!-- Eye Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Create Button -->
                    <button type="submit"
                        class="w-full bg-[#0E1F8E] text-white font-semibold py-3 rounded-md hover:bg-blue-800 transition">
                        CREATE
                    </button>
                </form>

                <!-- Terms -->
                <p class="text-xs text-center text-gray-600 mt-4">
                    By continuing, you agree to our <a href="#" class="underline">Terms</a> and
                    <a href="#" class="underline">Privacy Policy</a>.
                </p>

                <!-- Sign-in -->
                <p class="text-sm text-center mt-4">
                    Already have an account?
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Sign-in</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Password Toggle JS -->
    <script>
        function changeEye(inputId, button) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = button.querySelector("svg");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M3.98 8.223A10.477 10.477 0 0 0 1.974 12c1.75 4.118 5.964 7 
                             10.026 7 1.865 0 3.63-.47 5.155-1.297M6.228 6.228A10.45 10.45 
                             0 0 1 12 5c4.062 0 8.276 2.882 10.026 7a10.451 10.451 
                             0 0 1-4.31 5.223M6.228 6.228 3 3m0 0l18 18" />`;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 
                             7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 
                             7.178.07.207.07.431 0 .639C20.577 16.49 16.64 
                             19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>`;
            }
        }
    </script>
</body>

</html>
