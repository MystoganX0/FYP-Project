<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Required - Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
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
                    },
                },
            },
        };
    </script>
</head>

<body class="font-poppins bg-gray-50 flex flex-col min-h-screen">
    @include('ui.user.header')

    <main class="flex-grow flex items-center justify-center p-4">
        <div
            class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden text-center p-8 border border-gray-100 relative">
            <!-- Decorative Background Circle -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
            <div
                class="absolute -top-10 -right-10 w-40 h-40 bg-blue-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -left-10 w-40 h-40 bg-purple-50 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>

            <div class="relative z-10">
                <div
                    class="mx-auto flex items-center justify-center w-24 h-24 rounded-full bg-blue-50 mb-6 shadow-inner ring-4 ring-white">
                    <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-2">Application Required</h2>
                <p class="text-gray-500 mb-8 leading-relaxed">
                    You haven't applied for a driving license yet. Please complete your application to start booking
                    slots.
                </p>

                <div class="space-y-3">
                    <a href="{{ route('apply') }}"
                        class="block w-full text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-xl text-base px-5 py-3.5 text-center shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                        Apply Now
                    </a>
                    <a href="{{ route('home') }}"
                        class="block w-full text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-semibold rounded-xl text-base px-5 py-3.5 text-center transition-all">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>