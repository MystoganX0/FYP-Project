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
        /* Hide scrollbar for mobile horizontal sidebar */
        @media (max-width: 1023px) {
            .overflow-x-auto::-webkit-scrollbar {
                display: none;
            }

            .overflow-x-auto {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        }
    </style>
</head>

<body class="font-poppins bg-gray-100 text-gray-800">
    @include('ui.user.header')

    <div class="px-4 md:px-8 lg:px-12 xl:px-48 py-8 md:py-12 flex items-center justify-between">
        <a href="{{ route('home') }}"
            class="group flex items-center justify-center w-12 h-12 bg-white rounded-full shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 ring-1 ring-gray-100/50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-blue-900 transition-colors">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <div class="flex-1 flex justify-start min-w-0 pl-4">
            <h1 class="text-xl md:text-2xl font-bold text-black text-center">License Classes</h1>
        </div>
        <div class="w-10 md:w-12 flex-shrink-0"></div>
    </div>

    <section class="w-full flex flex-col lg:flex-row gap-4 md:gap-8 py-4 md:py-6 px-4 md:px-8 lg:px-12 xl:px-48">
        <!-- Sidebar -->
        <div class="lg:flex-shrink-0 lg:w-64 w-full mb-6 lg:mb-0">
            <!-- Mobile Filter Label -->
            <div
                class="flex flex-row lg:flex-col items-center lg:items-start bg-white py-4 md:py-6 px-4 md:px-4 rounded-3xl shadow-lg space-x-3 md:space-x-0 lg:space-y-3.5 lg:space-x-0 lg:sticky lg:top-24 lg:self-start overflow-x-auto lg:overflow-x-visible">
                <!-- All Icon -->
                <button
                    class="filter-btn group flex items-center justify-start gap-2 md:gap-3 min-w-[100px] lg:w-full px-4 md:px-5 py-3 md:py-4 rounded-2xl bg-blue-900 text-white shadow-md transition-all duration-300 transform hover:scale-105 flex-shrink-0 lg:flex-shrink"
                    data-filter="all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>

                    <span class="font-medium text-sm md:text-base whitespace-nowrap">All</span>
                </button>

                <!-- Refresher Icon -->
                <button
                    class="filter-btn group flex items-center justify-start gap-2 md:gap-3 min-w-[120px] lg:w-full px-4 md:px-5 py-3 md:py-4 rounded-2xl bg-gray-50 text-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 flex-shrink-0 lg:flex-shrink"
                    data-filter="DA,D,B2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-gray-400 group-hover:text-blue-900">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                    <span class="font-medium text-sm md:text-base whitespace-nowrap">Refresher</span>
                </button>

                <!-- Heavy Vehicle Icon -->
                <button
                    class="filter-btn group flex items-center justify-start gap-2 md:gap-3 min-w-[140px] lg:w-full px-4 md:px-5 py-3 md:py-4 rounded-2xl bg-gray-50 text-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 flex-shrink-0 lg:flex-shrink"
                    data-filter="heavy">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-gray-400 group-hover:text-blue-900">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>


                    <span class="font-medium text-sm md:text-base whitespace-nowrap">Heavy Vehicle</span>
                </button>

                <!-- Combo Icon -->
                <button
                    class="filter-btn group flex items-center justify-start gap-2 md:gap-3 min-w-[100px] lg:w-full px-4 md:px-5 py-3 md:py-4 rounded-2xl bg-gray-50 text-black hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 flex-shrink-0 lg:flex-shrink"
                    data-filter="B2 + DA,B2 + D">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-gray-400 group-hover:text-blue-900">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>

                    <span class="font-medium text-sm md:text-base whitespace-nowrap">Combo</span>
                </button>
            </div>
        </div>

        <!-- License Class Grid -->
        <div id="class-grid"
            class="flex-1 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6 justify-center text-center">

            <div id="no-classes-message" class="hidden col-span-full py-10">
                <p class="text-gray-900 text-md">No classes available</p>
            </div>

            @foreach ($classes as $class)
                <a href="{{ route('package', $class->class_code) }}"
                    class="class-item group bg-transparent rounded-3xl transition-all duration-300 transform hover:-translate-y-1 block"
                    data-name="{{ $class->class_code }}" data-status="available">
                    <div class="relative overflow-hidden rounded-3xl mb-4 bg-gray-50 border-[4px] border-transparent group-hover:border-red-600 transition-colors duration-300">
                        <img src="{{ asset($class->class_image) }}" alt="{{ $class->class_code }}"
                            class="w-full h-auto transform transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="space-y-1">
                        <p
                            class="font-bold text-gray-900 text-2xl md:text-xl tracking-tight group-hover:text-red-600 transition-colors">
                            {{ $class->class_code }}
                        </p>
                        <!-- <p class="text-xs text-gray-500 uppercase tracking-wider font-medium">Driving License</p> -->
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <footer class="text-center text-black py-6 text-sm">
        © 2025 Molek Driving Academy. All rights reserved.
    </footer>

    @include('ui.user.footer')

    <script>
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.class-item');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;
                const noClassesMsg = document.getElementById('no-classes-message');

                // Remove active state from all buttons
                buttons.forEach(b => {
                    b.classList.remove('bg-blue-900', 'text-white', 'shadow-md');
                    b.classList.add('bg-gray-50', 'text-black', 'hover:bg-gray-100');
                    // Reset SVG color to gray
                    const svg = b.querySelector('svg');
                    if(svg) {
                        svg.classList.remove('text-white');
                        svg.classList.add('text-gray-400');
                    }
                });

                // Add active state to clicked button
                btn.classList.add('bg-blue-900', 'text-white', 'shadow-md');
                btn.classList.remove('bg-gray-50', 'text-black', 'hover:bg-gray-100');
                
                // Set active SVG color to white
                const activeSvg = btn.querySelector('svg');
                if(activeSvg) {
                    activeSvg.classList.remove('text-gray-400');
                    activeSvg.classList.add('text-white');
                }

                // Handle Heavy/No Classes case
                const isHeavy = filter === 'heavy';
                
                if (isHeavy) {
                    noClassesMsg.classList.remove('hidden');
                } else {
                    noClassesMsg.classList.add('hidden');
                }

                // Filter items with transition
                items.forEach(item => {
                    const name = item.dataset.name;
                    let shouldShow = false;

                    if (isHeavy) {
                        shouldShow = false;
                    } else if (filter === 'all') {
                        shouldShow = true;
                    } else {
                        const filterArr = filter.split(',').map(f => f.trim());
                        shouldShow = filterArr.includes(name);
                    }

                    if (shouldShow) {
                        item.classList.remove('hidden');
                        item.style.display = 'block';
                        // Small delay to ensure display:block takes effect before opacity transition
                        setTimeout(() => {
                            item.classList.remove('opacity-0', 'scale-95');
                            item.classList.add('opacity-100', 'scale-100');
                        }, 10);
                    } else {
                        item.classList.remove('opacity-100', 'scale-100');
                        item.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => {
                            // Only hide if it hasn't been re-shown in the meantime
                            if (item.classList.contains('opacity-0')) {
                                item.classList.add('hidden');
                                item.style.display = 'none';
                            }
                        }, 300);
                    }
                });
            });
        });
    </script>
</body>

</html>