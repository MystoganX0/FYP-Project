<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molek Driving Academy</title>
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
        html {
            scroll-behavior: smooth;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .neon-white {
            color: #fff;
            /* White text */
            text-shadow:
                0 0 8px #fff;
        }
    </style>

</head>

<body class="font-poppins">
    @include('header')

    <section id="hero-banner" class="relative overflow-hidden h-[700px]">
        <!-- Slides container (behind everything) -->
        <div id="slides"
            class="absolute top-0 left-0 w-full h-full flex transition-transform duration-[3000ms] ease-in-out z-0">
            <!-- Slide 1 -->
            <div class="slide w-full flex-shrink-0 relative">
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('/image/home/banner.gif');"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="max-w-3xl px-6 text-center text-white">
                        <h1 class="text-4xl font-extrabold sm:text-6xl leading-tight neon-white">
                            Welcome to Driving Academy
                        </h1>
                        <p class="mt-5 text-lg">
                            <span class="font-semibold">One Stop Center</span> to get your license.
                        </p>
                        <div class="mt-6 space-x-4">
                            <a href="#classes"
                                class="inline-block rounded-full bg-red-600 px-8 py-3 text-white font-medium transition">Learn
                                More</a>
                            <a href="{{ route('apply') }}"
                                class="inline-block rounded-full border border-red-600 px-8 py-3 text-red-600 font-medium transition hover:bg-red-600 hover:text-white">Apply</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide w-full flex-shrink-0 relative">
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('/image/home/banner3.png');"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <!-- Optional: add content for this slide or leave empty -->
                </div>
            </div>
        </div>

        <!-- Carousel indicators -->
        <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
            <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" data-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" data-slide-to="1"></button>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="bg-white py-5">
        <div class="mx-auto max-w-screen-md px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <!-- Button 1: Features -->
                <a href="#features"
                    class="flex flex-col items-center justify-center h-32 text-white border-[2px] border-white rounded-lg bg-red-500 hover:bg-gray-400 hover:text-black transition">
                    <div class="flex items-center">
                        <img src="/image/home/grid.png" alt="grid icon" class="h-12 w-auto">
                    </div>
                    <span class="text-sm font-extrabold font-medium">Overview</span>
                </a>

                <!-- Button 2: Classes -->
                <a href="#classes"
                    class="flex flex-col items-center justify-center h-32 text-white border-[2px] border-white rounded-lg bg-red-500 hover:bg-gray-400 hover:text-black transition">
                    <div class="flex items-center">
                        <img src="/image/home/car.png" alt="car icon" class="h-12 w-auto">
                    </div>
                    <span class="text-sm font-extrabold font-medium">Class</span>
                </a>

                <!-- Button 3: Process -->
                <a href="#process"
                    class="flex flex-col items-center justify-center h-32 text-white border-[2px] border-white rounded-lg bg-red-500 hover:bg-gray-400 hover:text-black transition">
                    <div class="flex items-center">
                        <img src="/image/home/plan.png" alt="plan icon" class="h-12 w-auto">
                    </div>
                    <span class="text-sm font-extrabold font-medium">Process</span>
                </a>

                <!-- Button 4: Dress Code -->
                <a href="#dresscode"
                    class="flex flex-col items-center justify-center h-32 text-white border-[2px] border-white rounded-lg bg-red-500 hover:bg-gray-400 hover:text-black transition">
                    <div class="flex items-center">
                        <img src="/image/home/shirt.png" alt="shirt icon" class="h-12 w-auto">
                    </div>
                    <span class="text-sm font-extrabold font-medium">Dress Code</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section id="intro" class="bg-white py-20">
        <div class="mx-auto max-w-screen-xl px-4">

            <!-- Section Header -->
            <div class="mb-16 text-center">
                <span class="text-red-600 font-bold tracking-wider uppercase text-sm">About Us</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Who We Are
                </h2>
                <div class="w-20 h-1.5 bg-red-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Content Grid -->
            <div class="space-y-20">

                <!-- Block 1 -->
                <div class="grid md:grid-cols-2 gap-12 items-center fade-in">
                    <div class="order-2 md:order-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Leading the Way in Driver Education</h3>
                        <div class="w-12 h-1 bg-red-600 mb-6 rounded-full"></div>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            Established in 1998, <span class="font-semibold text-gray-900">Molek Driving Academy</span>
                            is recognized by the Road Transport Department of Malaysia as a premier driving institute.
                        </p>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            With strategic campuses in <span class="font-semibold text-gray-900">Kampung Melayu
                                Subang</span> and <span class="font-semibold text-gray-900">Bandar Bukit Puchong
                                2</span>, we are dedicated to providing top-tier professional training for both local
                            and international candidates.
                        </p>
                    </div>
                    <div class="order-1 md:order-2 group relative">
                        <div
                            class="absolute -inset-4 bg-red-50 rounded-[2rem] transform rotate-3 transition-transform duration-300 group-hover:rotate-6">
                        </div>
                        <img src="/image/home/intro.png" alt="Driving Training"
                            class="relative rounded-[1.5rem] shadow-2xl w-full h-auto object-cover transform transition-transform duration-300 group-hover:-translate-y-2">
                    </div>
                </div>

                <!-- Block 2 -->
                <div class="grid md:grid-cols-2 gap-12 items-center fade-in">
                    <div class="group relative">
                        <div
                            class="absolute -inset-4 bg-blue-50 rounded-[2rem] transform -rotate-3 transition-transform duration-300 group-hover:-rotate-6">
                        </div>
                        <img src="/image/home/img1.jpg" alt="Driving Practice"
                            class="relative rounded-[1.5rem] shadow-2xl w-full h-auto object-cover transform transition-transform duration-300 group-hover:-translate-y-2">
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">World-Class Facilities</h3>
                        <div class="w-12 h-1 bg-blue-600 mb-6 rounded-full"></div>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            We pride ourselves on our comprehensively equipped facilities, featuring professionally
                            designed driving and riding circuits that simulate real-world conditions.
                        </p>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Our curriculum emphasizes <span class="font-semibold text-gray-900">safety, discipline, and
                                confidence</span>. We go beyond the basics to ensure every student is fully prepared to
                            navigate any road challenge with skill and assurance.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section id="features" class="bg-white py-20">
        <div class="mx-auto max-w-screen-xl px-4 text-center">
            <div class="mb-16">
                <span class="text-red-600 font-bold tracking-wider uppercase text-sm">Why Choose Us</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Key Features
                </h2>
                <div class="w-20 h-1.5 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
                    We prioritize your comfort and safety with premium services designed for the best learning
                    experience.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 fade-in">

                <!-- Feature 1 (Green) -->
                <div
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
                    <div class="relative z-10 flex flex-col items-center h-full">
                        <div
                            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-green-50 text-green-600 mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300 shadow-sm group-hover:shadow-green-200">
                            <span class="font-black text-2xl">10h</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-xl leading-tight mb-2">Extended Operation</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            10-hour daily operation for flexible driving lessons.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 (Red) -->
                <div
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
                    <div class="relative z-10 flex flex-col items-center h-full">
                        <div
                            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-red-50 text-red-600 mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300 shadow-sm group-hover:shadow-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <circle cx="12" cy="12" r="9" />
                                <circle cx="12" cy="12" r="3" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v6m0 6v6m9-6h-6m-6 0H3" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-xl leading-tight mb-2">Modern Fleet</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Train with modern vehicles kept in excellent condition.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 (Blue) -->
                <div
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
                    <div class="relative z-10 flex flex-col items-center h-full">
                        <div
                            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 shadow-sm group-hover:shadow-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-xl leading-tight mb-2">Premium Packages</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            All driving classes come with premium package benefits.
                        </p>
                    </div>
                </div>

                <!-- Feature 4 (Yellow) -->
                <div
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
                    <div class="relative z-10 flex flex-col items-center h-full">
                        <div
                            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-yellow-50 text-yellow-600 mb-6 group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300 shadow-sm group-hover:shadow-yellow-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-xl leading-tight mb-2">Flexible Schedule</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Customizable scheduling for both training and tests.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="classes" class="bg-white py-20 overflow-hidden">
        <div class="mx-auto max-w-screen-xl px-4 text-center">
            <!-- Section Header -->
            <div class="mb-12">
                <span class="text-red-600 font-bold tracking-wider uppercase text-sm">Our Courses</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Explore Our License Classes
                </h2>
                <div class="w-20 h-1.5 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
                    Choose the right license class for your needs. We offer comprehensive training for all vehicle
                    types.
                </p>
            </div>

            <!-- Controls -->
            <div class="flex justify-end mb-8 space-x-4 px-4">
                <button id="prev"
                    class="p-4 rounded-full bg-white text-gray-800 shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300 focus:outline-none group">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <button id="next"
                    class="p-4 rounded-full bg-white text-gray-800 shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300 focus:outline-none group">
                    <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Carousel Container -->
            <div class="overflow-hidden max-w-[1340px] mx-auto duration-300 hover:scale-105">
                <!-- 4 cards * 320px + gaps -->
                <!-- Slider Wrapper -->
                <div id="slider" class="flex transition-transform duration-500 ease-in-out space-x-6">
                    <!-- Slides -->
                    <div class="min-w-[320px]">
                        <img src="/image/class1.png" class="w-[320px] h-[320px] rounded-lg shadow-md object-cover"
                            alt="Class 1">
                    </div>
                    <div class="min-w-[320px]">
                        <img src="/image/class1.png" class="w-[320px] h-[320px] rounded-lg shadow-md object-cover"
                            alt="Class 2">
                    </div>
                    <div class="min-w-[320px]">
                        <img src="/image/class1.png" class="w-[320px] h-[320px] rounded-lg shadow-md object-cover"
                            alt="Class 3">
                    </div>
                    <div class="min-w-[320px]">
                        <img src="/image/class1.png" class="w-[320px] h-[320px] rounded-lg shadow-md object-cover"
                            alt="Class 4">
                    </div>
                    <div class="min-w-[320px]">
                        <img src="/image/class1.png" class="w-[320px] h-[320px] rounded-lg shadow-md object-cover"
                            alt="Class 5">
                    </div>

                </div>
            </div>

            <!-- View All Button -->
            <div class="mt-8">
                <a href="{{ route('class') }}"
                    class="inline-block rounded-full bg-red-600 px-6 py-3 text-white font-medium shadow hover:bg-red-700 transition">
                    View All
                </a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="bg-white py-10">
        <div class="mx-auto max-w-screen-xl px-4 text-center">
            <div class="mb-12">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    License Process
                </h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    We are all about our client’s comfort and safety. That’s why we provide the best service you can
                    imagine.
                </p>
            </div>
            <div class="flex justify-center items-stretch border-blue-800 hover:scale-105">
                <img src="/image/home/process.png" alt="Process image"
                    class="w-full h-full rounded-lg shadow-md object-contain" />
            </div>
        </div>
    </section>

    <!-- Dress Code Section -->
    <section id="dresscode" class="relative py-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 text-center relative z-10">

            <!-- Section Header -->
            <div class="mb-12">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Dress Code
                </h2>
                <div class="w-24 h-1.5 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
                    Professionalism starts with appearance. Please adhere to the following dress code guidelines for
                    your classes and tests.
                </p>
            </div>

            <!-- Dress Code Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10  mx-auto fade-in">

                <!-- Men -->
                <div
                    class="group relative rounded-[2.5rem] overflow-hidden shadow-2xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] transition-all duration-500 h-full">
                    <!-- Background Image with Zoom Effect -->
                    <div
                        class="absolute inset-0 bg-[url('/image/home/men.png')] bg-cover bg-center transition-transform duration-700 group-hover:scale-110">
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/60 to-transparent">
                    </div>

                    <!-- Content -->
                    <div class="relative p-8 md:p-12 h-full flex flex-col justify-end text-left min-h-[500px]">
                        <div
                            class="mb-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h4 class="text-4xl font-black text-white mb-2 tracking-tight">MEN</h4>
                            <div class="w-12 h-1 bg-blue-500 rounded-full mb-6"></div>
                        </div>

                        <div class="space-y-3 opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                            <ul class="space-y-3 text-gray-100 text-sm md:text-base font-medium">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Collared Shirt / Collared T-Shirt
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Long Pants or Jeans
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Shorts (knee-length or longer)
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Closed Shoes (sneakers, loafers)
                                </li>
                                <li class="flex items-start gap-3 text-red-300">
                                    <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    No slippers or sandals
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Women -->
                <div
                    class="group relative rounded-[2.5rem] overflow-hidden shadow-2xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] transition-all duration-500 h-full">
                    <!-- Background Image with Zoom Effect -->
                    <div
                        class="absolute inset-0 bg-[url('/image/home/women.png')] bg-cover bg-center transition-transform duration-700 group-hover:scale-110">
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/60 to-transparent">
                    </div>

                    <!-- Content -->
                    <div class="relative p-8 md:p-12 h-full flex flex-col justify-end text-left min-h-[500px]">
                        <div
                            class="mb-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h4 class="text-4xl font-black text-white mb-2 tracking-tight">WOMEN</h4>
                            <div class="w-12 h-1 bg-pink-500 rounded-full mb-6"></div>
                        </div>

                        <div class="space-y-3 opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                            <ul class="space-y-3 text-gray-100 text-sm md:text-base font-medium">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-pink-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    No Revealing Attire
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-pink-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Collared Shirt / T-Shirt
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-pink-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Long Skirt or Pants
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-pink-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Closed Shoes
                                </li>
                                <li class="flex items-start gap-3 text-red-300">
                                    <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    No heels or sandals
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('footer')

    <script>
        const slidesContainer = document.getElementById("slides");
        const indicators = document.querySelectorAll("[data-slide-to]");
        const slides = document.querySelectorAll("#slides .slide");
        let index = 0;

        function showSlide(i) {
            slidesContainer.style.transform = `translateX(-${i * 100}%)`;

            // Update indicators
            indicators.forEach((btn, j) => {
                btn.classList.toggle("bg-white", i === j);
                btn.classList.toggle("bg-white/50", i !== j);
                btn.setAttribute("aria-current", i === j ? "true" : "false");
            });

            index = i;
        }

        // Show first slide immediately
        showSlide(0);

        // Auto slide every 5 seconds
        setInterval(() => {
            showSlide((index + 1) % slides.length);
        }, 6000);

        // Click indicators
        indicators.forEach((btn, i) => {
            btn.addEventListener("click", () => showSlide(i));
        });
    </script>

    <!-- Scroll Animation Script -->
    <script>
        const faders = document.querySelectorAll('.fade-in');

        const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show'); // 👈 removes class when out of view
                }
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>

    <!-- Slide Animation -->
    <script>
        const slider = document.getElementById("slider");
        const next = document.getElementById("next");
        const prev = document.getElementById("prev");

        let scrollAmount = 0;
        const scrollStep = 270; // width of card + gap
        const maxScroll = slider.scrollWidth - slider.clientWidth;

        next.addEventListener("click", () => {
            if (scrollAmount < maxScroll) {
                scrollAmount += scrollStep;
                slider.style.transform = `translateX(-${scrollAmount}px)`;
            }
        });

        prev.addEventListener("click", () => {
            if (scrollAmount > 0) {
                scrollAmount -= scrollStep;
                slider.style.transform = `translateX(-${scrollAmount}px)`;
            }
        });
    </script>
</body>

</html>