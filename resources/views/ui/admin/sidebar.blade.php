<!-- Mobile Toggle Button -->
<button id="sidebarToggle" type="button"
    class="fixed top-4 left-4 z-[60] inline-flex items-center justify-center p-2.5 rounded-xl sm:hidden bg-white text-[#0E1F8E] shadow-lg hover:bg-gray-50 focus:outline-none ring-1 ring-gray-900/5 transition-all active:scale-95 text-blue-900">
    <span class="sr-only">Toggle sidebar</span>

    <!-- Hamburger Icon -->
    <svg id="iconOpen" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>

    <!-- Close Icon (Hidden by default) -->
    <svg id="iconClose" class="w-6 h-6 absolute transition-transform duration-300 scale-0 opacity-0" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
</button>

<!-- Backdrop -->
<div id="sidebarBackdrop" class="fixed inset-0 bg-gray-900/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm"
    aria-hidden="true"></div>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-50 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#0E1F8E] text-white shadow-2xl"
    aria-label="Sidebar">

    <div class="h-full flex flex-col px-4 py-8 overflow-y-auto">

        <!-- Logo Section -->
        <div class="flex items-center gap-3 px-2 mb-10 pt-2">
            <div
                class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-xl backdrop-blur-sm border border-white/10">
                <img src="/image/icon/logo.png" alt="logo" class="w-8 h-8 object-contain">
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-lg font-bold text-white tracking-tight">Molek Driving</span>
                <span class="text-sm font-medium text-blue-200 uppercase tracking-widest">Academy</span>
            </div>
        </div>

        <!-- Navigation List -->
        <ul class="space-y-2 font-medium flex-1">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-3 rounded-xl group transition-all duration-200 border border-transparent {{ request()->routeIs('dashboard') ? 'bg-white text-blue-900 shadow-lg scale-[1.02]' : 'text-white hover:bg-white/10 hover:border-white/5' }}">
                    <svg class="w-6 h-6 transition-colors {{ request()->routeIs('dashboard') ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="ms-3 font-semibold">Dashboard</span>
                </a>
            </li>

            <!-- Classes -->
            <li>
                <a href="{{ route('editclass') }}"
                    class="flex items-center p-3 rounded-xl group transition-all duration-200 border border-transparent {{ request()->routeIs('editclass') ? 'bg-white text-blue-900 shadow-lg scale-[1.02]' : 'text-white hover:bg-white/10 hover:border-white/5' }}">
                    <svg class="w-6 h-6 transition-colors {{ request()->routeIs('editclass') ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    <span class="ms-3 font-bold">Classes</span>
                </a>
            </li>

            <!-- Application -->
            <li>
                <a href="{{ route('applied') }}"
                    class="flex items-center p-3 rounded-xl group transition-all duration-200 border border-transparent {{ request()->routeIs('applied') ? 'bg-white text-blue-900 shadow-lg scale-[1.02]' : 'text-white hover:bg-white/10 hover:border-white/5' }}">
                    <svg class="w-6 h-6 transition-colors {{ request()->routeIs('applied') ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="ms-3 font-semibold">Application</span>
                </a>
            </li>

            <!-- Manage Bookings -->
            <li>
                <a href="{{ route('admin.bookings.index') }}"
                    class="flex items-center p-3 rounded-xl group transition-all duration-200 border border-transparent {{ request()->routeIs('admin.bookings.index') ? 'bg-white text-blue-900 shadow-lg scale-[1.02]' : 'text-white hover:bg-white/10 hover:border-white/5' }}">
                    <svg class="w-6 h-6 transition-colors {{ request()->routeIs('admin.bookings.index') ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ms-3 font-semibold">Booking</span>
                </a>
            </li>

            <!-- Booking Dropdown -->
            <li>
                <button type="button"
                    class="flex items-center w-full p-3 rounded-xl group transition-all duration-200 border border-transparent {{ (request()->routeIs('computer') || request()->routeIs('practical') || request()->routeIs('jpj')) ? 'bg-white text-blue-900 shadow-lg' : 'text-white hover:bg-white/10 hover:border-white/5' }}"
                    aria-controls="dropdown-booking" data-collapse-toggle="dropdown-booking"
                    aria-expanded="{{ (request()->routeIs('computer') || request()->routeIs('practical') || request()->routeIs('jpj')) ? 'true' : 'false' }}">
                    <svg class="w-6 h-6 transition-colors {{ (request()->routeIs('computer') || request()->routeIs('practical') || request()->routeIs('jpj')) ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="flex-1 ms-3 text-left font-semibold whitespace-nowrap">Booking</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180 {{ (request()->routeIs('computer') || request()->routeIs('practical') || request()->routeIs('jpj')) ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <ul id="dropdown-booking"
                    class="{{ (request()->routeIs('computer') || request()->routeIs('practical') || request()->routeIs('jpj')) ? 'py-2 space-y-1 pl-4' : 'hidden py-2 space-y-1 pl-4' }}">
                    <li>
                        <a href="{{ route('computer') }}"
                            class="flex items-center w-full p-2.5 text-base transition-colors rounded-lg pl-11 group {{ request()->routeIs('computer') ? 'bg-white/10 text-white font-semibold' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                            Computer Test
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('practical') }}"
                            class="flex items-center w-full p-2.5 text-base transition-colors rounded-lg pl-11 group {{ request()->routeIs('practical') ? 'bg-white/10 text-white font-semibold' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                            Practical Slot
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jpj') }}"
                            class="flex items-center w-full p-2.5 text-base transition-colors rounded-lg pl-11 group {{ request()->routeIs('jpj') ? 'bg-white/10 text-white font-semibold' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                            JPJ Test
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Schedule -->
            <li>
                <a href="{{ route('admin.schedule') }}"
                    class="flex items-center p-3 rounded-xl group transition-all duration-200 border border-transparent {{ request()->routeIs('admin.schedule') ? 'bg-white text-blue-900 shadow-lg scale-[1.02]' : 'text-white hover:bg-white/10 hover:border-white/5' }}">
                    <svg class="w-6 h-6 transition-colors {{ request()->routeIs('admin.schedule') ? 'text-[#0E1F8E]' : 'text-blue-200 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="ms-3 font-semibold">Schedule</span>
                </a>
            </li>
        </ul>

        <!-- Footer / Sign Out -->
        <div class="mt-auto pt-6 border-t border-white/10">
            <a href="#"
                class="flex items-center p-3 text-red-300 rounded-xl hover:bg-red-500/10 hover:text-red-200 group transition-all duration-200">
                <svg class="w-6 h-6 text-red-300 group-hover:text-red-200 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="ms-3 font-semibold">Sign Out</span>
            </a>
        </div>

    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("logo-sidebar");
        const toggleBtn = document.getElementById("sidebarToggle");
        const backdrop = document.getElementById("sidebarBackdrop");
        const iconOpen = document.getElementById("iconOpen");
        const iconClose = document.getElementById("iconClose");

        // Toggle Sidebar Function
        function toggleSidebar() {
            const isClosed = sidebar.classList.contains('-translate-x-full');

            if (isClosed) {
                // Open Sidebar
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');

                // Animate Button Icon
                if (iconOpen && iconClose) {
                    iconOpen.classList.add('scale-0', 'opacity-0');
                    iconClose.classList.remove('scale-0', 'opacity-0');
                }

                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                }, 10);
            } else {
                // Close Sidebar
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('opacity-0');

                // Animate Button Icon
                if (iconOpen && iconClose) {
                    iconOpen.classList.remove('scale-0', 'opacity-0');
                    iconClose.classList.add('scale-0', 'opacity-0');
                }

                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', toggleSidebar);
        }
    });
</script>