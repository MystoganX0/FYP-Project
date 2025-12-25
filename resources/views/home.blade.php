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
        <div id="slides"
            class="absolute top-0 left-0 w-full h-full flex transition-transform duration-[3000ms] ease-in-out z-0">
            <!-- Slide 1 -->
            <div class="slide w-full flex-shrink-0 relative">
                <!-- Background & Gradient Overlay -->
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('/image/home/banner3.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent">
                    </div>
                </div>

                <!-- Official Pattern Overlay -->
                <div class="absolute inset-0 opacity-20 pointer-events-none"
                    style="background-image: radial-gradient(#ef4444 1px, transparent 1px); background-size: 24px 24px;">
                </div>

                <!-- Content -->
                <div class="absolute inset-0 flex items-center justify-start pl-6 md:pl-20 lg:pl-32">
                    <div class="max-w-4xl text-left text-white z-10">
                        <!-- Official Badge/Header -->
                        <div class="flex items-center gap-4 mb-6">
                            <span class="h-[3px] w-16 bg-red-600 shadow-[0_0_15px_rgba(220,38,38,0.8)]"></span>
                            <span
                                class="text-white font-bold tracking-[0.2em] uppercase text-xs md:text-sm drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]">
                                ONE STOP CENTER
                            </span>
                        </div>

                        <!-- Main Title -->
                        <h1
                            class="text-4xl md:text-6xl lg:text-7xl font-black leading-[1.1] mb-8 drop-shadow-2xl font-poppins text-white">
                            WELCOME TO <br />
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">DRIVING
                                ACADEMY</span>
                        </h1>

                        <!-- Description with border -->
                        <div
                            class="flex border-l-4 border-red-600 pl-6 py-2 mb-10 bg-black/20 backdrop-blur-sm rounded-r-lg max-w-2xl">
                            <p class="text-base md:text-lg text-gray-200 font-light leading-relaxed">
                                Get your license with verified professional instructors. <br />
                                Experience top-tier safety and training standards.
                            </p>
                        </div>

                        <!-- CTAs -->
                        <div class="flex flex-wrap gap-5">
                            <a href="#features"
                                class="group relative px-10 py-4 bg-red-600 text-white font-bold uppercase tracking-wider overflow-hidden rounded-full hover:bg-red-700 transition-all shadow-lg hover:shadow-red-600/50 hover:-translate-y-1">
                                <span class="relative z-10 flex items-center gap-2">
                                    Learn More
                                </span>
                            </a>
                            <a href="{{ route('apply') }}"
                                class="px-10 py-4 border-2 border-white/20 text-white font-bold uppercase tracking-wider hover:bg-red-600 hover:border-red-600 transition-all rounded-full backdrop-blur-sm hover:-translate-y-1">
                                Apply
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Official License Website Style -->
             <div class="slide w-full flex-shrink-0 relative">
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('/image/home/banner.gif');"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="max-w-5xl px-6 text-center text-white z-10">
                        <div class="flex justify-center items-center gap-4 mb-6">
                            <span class="h-[3px] w-16 bg-red-600 shadow-[0_0_15px_rgba(220,38,38,0.8)]"></span>
                            <span
                                class="text-white font-bold tracking-[0.2em] uppercase text-xs md:text-sm drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]">
                                ONE STEP CLOSER
                            </span>
                            <span class="h-[3px] w-16 bg-red-600 shadow-[0_0_15px_rgba(220,38,38,0.8)]"></span>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-black leading-tight tracking-tight neon-white drop-shadow-2xl mb-6 uppercase">
                            " Get Your License With Us " <br class="hidden md:block" />
                        </h1>
                        
                        <div class="mt-10 flex flex-wrap justify-center gap-5">
                            <!-- <a href="#classes"
                                class="px-10 py-4 bg-red-600 text-white font-bold rounded-full hover:bg-red-700 shadow-lg shadow-red-600/40 transition-all transform hover:-translate-y-1 hover:scale-105 uppercase tracking-wider backdrop-blur-sm">
                                Learn More
                            </a> -->
                            <a href="{{ route('apply') }}"
                                class="px-10 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-red-900 transition-all transform hover:-translate-y-1 hover:scale-105 uppercase tracking-wider backdrop-blur-sm shadow-lg">
                                Apply Now
                            </a>
                        </div>
                    </div>
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
                    class="group relative flex flex-col items-center justify-center h-32 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-lg shadow-red-600/30 border border-white/20 transform transition-all duration-300 ease-out hover:-translate-y-1 hover:scale-105 hover:shadow-red-600/50 hover:from-red-500 hover:to-red-600">
                    <div class="flex items-center mb-2 transform transition-transform group-hover:scale-110">
                        <img src="/image/home/grid.png" alt="grid icon" class="h-10 w-auto drop-shadow-md">
                    </div>
                    <span
                        class="text-sm font-bold tracking-wider uppercase text-white/90 group-hover:text-white">Overview</span>
                </a>

                <!-- Button 2: Classes -->
                <a href="#classes"
                    class="group relative flex flex-col items-center justify-center h-32 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-lg shadow-red-600/30 border border-white/20 transform transition-all duration-300 ease-out hover:-translate-y-1 hover:scale-105 hover:shadow-red-600/50 hover:from-red-500 hover:to-red-600">
                    <div class="flex items-center mb-2 transform transition-transform group-hover:scale-110">
                        <img src="/image/home/car.png" alt="car icon" class="h-10 w-auto drop-shadow-md">
                    </div>
                    <span
                        class="text-sm font-bold tracking-wider uppercase text-white/90 group-hover:text-white">Class</span>
                </a>

                <!-- Button 3: Process -->
                <a href="#process"
                    class="group relative flex flex-col items-center justify-center h-32 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-lg shadow-red-600/30 border border-white/20 transform transition-all duration-300 ease-out hover:-translate-y-1 hover:scale-105 hover:shadow-red-600/50 hover:from-red-500 hover:to-red-600">
                    <div class="flex items-center mb-2 transform transition-transform group-hover:scale-110">
                        <img src="/image/home/plan.png" alt="plan icon" class="h-10 w-auto drop-shadow-md">
                    </div>
                    <span
                        class="text-sm font-bold tracking-wider uppercase text-white/90 group-hover:text-white">Process</span>
                </a>

                <!-- Button 4: Dress Code -->
                <a href="#dresscode"
                    class="group relative flex flex-col items-center justify-center h-32 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-lg shadow-red-600/30 border border-white/20 transform transition-all duration-300 ease-out hover:-translate-y-1 hover:scale-105 hover:shadow-red-600/50 hover:from-red-500 hover:to-red-600">
                    <div class="flex items-center mb-2 transform transition-transform group-hover:scale-110">
                        <img src="/image/home/shirt.png" alt="shirt icon" class="h-10 w-auto drop-shadow-md">
                    </div>
                    <span class="text-sm font-bold tracking-wider uppercase text-white/90 group-hover:text-white">Dress
                        Code</span>
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
            <div class="space-y-24">

                <!-- Block 1 -->
                <div class="grid md:grid-cols-2 gap-16 items-center fade-in">
                    <div class="order-2 md:order-1">
                        <div class="mb-6">
                            <h3 class="text-3xl font-extrabold text-gray-900 mb-4 leading-tight">
                                Leading the Way in <br>Driver Education
                            </h3>
                        </div>

                        <p class="text-gray-600 text-lg leading-relaxed mb-6 text-justify">
                            Established in 1998, Molek Driving Academy is recognized by the Road Transport Department of Malaysia as a premier driving institute.
                        </p>
                        <p class="text-gray-600 text-lg leading-relaxed text-justify mb-8">
                            With strategic campuses in Kampung Melayu Subang and Bandar Bukit Puchong 2, we are dedicated to providing top-tier professional training for both local and international candidates.
                        </p>
                    </div>
                    <div class="order-1 md:order-2 relative group">
                        <!-- Clean Design Image 1 -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100 group">
                            <div
                                class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition-colors duration-500">
                            </div>
                            <img src="/image/home/intro.png" alt="Driving Training"
                                class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <!-- Decorative Element -->
                        <div
                            class="absolute -bottom-6 -right-6 w-24 h-24 bg-red-50 rounded-full -z-10 blur-xl opacity-70">
                        </div>
                        <div class="absolute -top-6 -left-6 w-32 h-32 bg-blue-50 rounded-full -z-10 blur-xl opacity-70">
                        </div>
                    </div>
                </div>

                <!-- Block 2 -->
                <div class="grid md:grid-cols-2 gap-16 items-center fade-in">
                    <div class="relative group">
                        <!-- Clean Design Image 2 -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100 group">
                            <div
                                class="absolute inset-0 bg-yellow-500/10 group-hover:bg-transparent transition-colors duration-500">
                            </div>
                            <img src="/image/home/img1.jpg" alt="Driving Practice"
                                class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <!-- Decorative Element -->
                        <div
                            class="absolute -bottom-6 -left-6 w-24 h-24 bg-yellow-50 rounded-full -z-10 blur-xl opacity-70">
                        </div>
                        <div
                            class="absolute -top-6 -right-6 w-32 h-32 bg-gray-100 rounded-full -z-10 blur-xl opacity-70">
                        </div>
                    </div>

                    <div>
                        <div class="mb-6">
                            <h3 class="text-3xl font-extrabold text-gray-900 mb-4 leading-tight">
                                World-Class Facilities
                            </h3>
                        </div>

                        <p class="text-gray-600 text-lg leading-relaxed mb-6 text-justify">
                            We pride ourselves on our comprehensively equipped facilities, featuring professionally
                            designed driving and riding circuits that simulate real-world conditions.
                        </p>
                        <p class="text-gray-600 text-lg leading-relaxed text-justify mb-8">
                            Our curriculum emphasizes safety, discipline, and confidence. We go beyond the basics to
                            ensure every student is fully prepared to navigate any road challenge with skill and
                            assurance.
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
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl hover:border-green-600 hover:border-4 transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
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
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl hover:border-red-600 hover:border-4 transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
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
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl hover:border-blue-600 hover:border-4 transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
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
                    class="group relative bg-white rounded-[2rem] p-8 shadow-lg hover:shadow-2xl hover:border-yellow-600 hover:border-4 transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden h-full">
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
            <div class="mb-16">
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
                    @foreach($classes as $class)
                        <div class="min-w-[320px]">
                            <img src="{{ asset($class->class_image) }}" alt="{{ $class->class_code }}"
                                class="mx-auto mb-2 md:mb-4 rounded-lg w-full h-auto object-cover">
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- View All Button -->
            <div class="mt-8">
                <a href="{{ route('class') }}"
                    class="inline-block rounded-3xl bg-red-600 px-12 py-4 text-white font-bold shadow hover:bg-red-500 transition">
                    View All
                </a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="bg-white py-10">
        <div class="mx-auto max-w-screen-xl px-4 text-center">
            <div class="mb-16">
                <span class="text-red-600 font-bold tracking-wider uppercase text-sm">Overview</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    License Process
                </h2>
                <div class="w-20 h-1.5 bg-red-600 mx-auto mt-4 rounded-full"></div>
                <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
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
            <div class="mb-16">
                <span class="text-red-600 font-bold tracking-wider uppercase text-sm">Our Rules</span>
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
                            <h4 class="text-4xl font-black text-white mb-5 tracking-tight">MEN</h4>
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
                            <h4 class="text-4xl font-black text-white mb-5 tracking-tight">WOMEN</h4>
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

    <!-- Back to Top Button -->
    <button id="backToTop" title="Go to top"
        class="fixed bottom-8 right-8 z-50 p-3 bg-red-600 text-white rounded-full shadow-lg transition-all duration-300 transform translate-y-20 opacity-0 focus:outline-none hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

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
    <!-- Back to Top Script -->
    <script>
        const backToTopBtn = document.getElementById("backToTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove("translate-y-20", "opacity-0");
                backToTopBtn.classList.add("translate-y-0", "opacity-100");
            } else {
                backToTopBtn.classList.add("translate-y-20", "opacity-0");
                backToTopBtn.classList.remove("translate-y-0", "opacity-100");
            }
        });

        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
</body>

</html>