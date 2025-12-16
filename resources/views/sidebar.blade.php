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
</head>

<body class="font-poppins">

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" data-drawer-backdrop="false"
        aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="flex flex-col h-full px-3 py-6 overflow-y-auto bg-blue-50 dark:bg-blue-900">
            <section class="flex py-6">
                <a href="#" class="flex items-center ps-2.5 space-x-3">
                    <img src="/image/icon/logo.png" alt="logo" class="h-16 w-16 object-contain">
                    <div class="flex flex-col justify-center leading-tight">
                        <span class="text-base font-semibold text-gray-900 dark:text-white">Molek Driving</span>
                        <span class="text-base font-semibold text-gray-900 dark:text-white">Academy</span>
                    </div>
                </a>
            </section>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-white transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('editclass') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Classes</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Registration</span>
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition duration-75"
                        aria-controls="dropdown-booking" data-collapse-toggle="dropdown-booking">
                        <svg class="shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                            <path fill-rule="evenodd"
                                d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Booking</span>
                        <svg class="w-3 h-3 ms-auto text-white transition-transform duration-200 group-[aria-expanded=true]:rotate-180"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="dropdown-booking" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#upcoming"
                                class="flex items-center w-full p-3 ps-11 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                Computer Test 
                            </a>
                        </li>
                        <li>
                            <a href="#history"
                                class="flex items-center w-full p-3 ps-11 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                Practical Slot 
                            </a>
                        </li>
                        <li>
                            <a href="#new"
                                class="flex items-center w-full p-3 ps-11 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                JPJ Test 
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-white transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15v3c0 .5523.4477 1 1 1h9.5M3 15v-4m0 4h9m-9-4V6c0-.5523.4477-1 1-1h16c.5523 0 1 .4477 1 1v5H3Zm5 0v8m4-8v8m7.0999-1.0999L21 16m0 0-1.9001-1.9001M21 16h-5" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Schedule</span>
                    </a>
                </li>



            </ul>
            <div class="mt-auto pt-4 font-medium">
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="shrink-0 w-5 h-5 text-white transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8H6m0 0 4-4m-4 4 4 4m-4-11H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                </a>
            </div>

        </div>
    </aside>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("logo-sidebar");
            const toggleBtn = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
            const links = sidebar.querySelectorAll("a");

            // --- Handle Flowbite toggle manually ---
            toggleBtn.addEventListener("click", () => {
                const isOpen = !sidebar.classList.contains("-translate-x-full");
                if (isOpen) {
                    sidebar.classList.add("-translate-x-full");
                } else {
                    sidebar.classList.remove("-translate-x-full");
                }
            });

            // --- Close sidebar on link click (mobile only) ---
            links.forEach(link => {
                link.addEventListener("click", () => {
                    if (window.innerWidth < 640) {
                        sidebar.classList.add("-translate-x-full");
                    }
                });
            });

            // --- Close sidebar when clicking outside (mobile only) ---
            document.addEventListener("click", (event) => {
                const isClickInside = sidebar.contains(event.target) || toggleBtn.contains(event.target);
                if (!isClickInside && window.innerWidth < 640 && !sidebar.classList.contains(
                        "-translate-x-full")) {
                    sidebar.classList.add("-translate-x-full");
                }
            });

            // --- Close on ESC key (optional) ---
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && window.innerWidth < 640) {
                    sidebar.classList.add("-translate-x-full");
                }
            });
        });
    </script>
</body>

</html>
