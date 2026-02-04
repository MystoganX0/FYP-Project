<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                        primary: '#1e40af', // Approximating blue-800 from the snippet
                    }
                },
            },
        };
    </script>
</head>

<body class="bg-blue-800 font-poppins min-h-screen flex items-center justify-center p-4">

    <!-- Card Container (formerly modal content) -->
    <div
        class="relative bg-white rounded-3xl sm:rounded-[2rem] shadow-2xl w-full max-w-xl p-6 sm:p-8 text-center overflow-hidden">

        <!-- Logo and Title -->
        <div class="text-center max-w-md mx-auto">
            <img src="{{ asset('/image/icon/logo.png') }}" alt="logo" class="w-20 sm:w-28 md:w-32 mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold mt-3 text-blue-900 tracking-tight">LOGIN AS ADMINISTRATOR</h2>
            <p class="text-sm text-gray-500 mt-2 font-medium">Login as Staff of Molek Driving Academy Shd Bhd</p>
        </div>

        <!-- Form with padding -->
        <div class="px-4 sm:px-6 md:px-8 max-w-md mx-auto">
            <form method="POST" action="{{ route('admin.login.store') }}" class="mt-6 space-y-4">
                @csrf

                <!-- Email -->
                <div class="group text-left">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Admin
                        Email</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="admin_email" required placeholder="name@example.com"
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-medium placeholder-gray-400">
                    </div>
                    @error('admin_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="group text-left">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Admin
                        Password</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="admin_pass" required placeholder="••••••••"
                            class="w-full pl-11 pr-12 py-3.5 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 focus:bg-white focus:border-primary focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-medium placeholder-gray-400">
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors cursor-pointer">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-4 bg-blue-800 text-white font-bold rounded-xl hover:bg-blue-900 hover:shadow-lg transform active:scale-[0.98] transition-all flex justify-center items-center gap-2 group">
                    <span>LOGIN</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Manage the driving license application system
                </p>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
</body>

</html>