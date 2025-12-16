<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brandBlue: '#174aa6',
                        softBlue: '#1f6fd8'
                    }
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite-charts@1.0.0/dist/flowbite-charts.min.js"></script>

</head>

<body class="font-poppins bg-[#002D81]">
    @include('header')
    @include('nav')

    <div class="px-4 sm:px-6 lg:px-32 py-6 md:py-14">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-6 lg:gap-x-20 items-start">
            <aside class="lg:col-span-4 flex flex-col">
                <div class="border-4 border-white rounded-3xl bg-[#151513] p-6 shadow-sm flex-1">
                    <div class="flex justify-between mb-3">
                        <div class="flex justify-center items-center mb-3 w-full">
                            <h5 class="text-2xl font-bold leading-none text-white text-center pe-2">
                                Your Training Slot
                            </h5>
                        </div>

                        <div>
                            <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                class="w-3.5 h-3.5 text-gray-400 hover:text-gray-200 cursor-pointer ms-1"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                            </svg>

                            <div data-popover id="chart-info" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-300 transition-opacity duration-300 bg-gray-900 border border-gray-700 rounded-lg shadow-xs opacity-0 w-72">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-white">Activity growth - Incremental</h3>
                                    <p>Report helps navigate cumulative growth of community activities. Ideally, the
                                        chart should have a growing trend, as stagnating chart signifies a significant
                                        decrease of community activity.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <!-- Indicator -->
                    <div class="flex flex-col" id="devices">
                        <div class="flex justify-center items-center text-center">
                            <span class="text-xl font-semibold text-gray-300">Total Slot:</span>
                            <span class="text-xl font-bold text-blue-500 ms-2">5</span>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="py-4" id="donut-chart"></div>

                    <div class="flex flex-col" id="devices">
                        <div class="flex items-center justify-center space-x-6 py-2">
                            <!-- Done -->
                            <div
                                class="flex items-center gap-3 bg-gray-800/50 px-4 py-2 rounded-full border border-gray-700">
                                <span
                                    class="w-3 h-3 rounded-full bg-yellow-400 shadow-[0_0_10px_rgba(250,204,21,0.5)]"></span>
                                <span class="text-sm font-medium text-gray-300">Done</span>
                            </div>

                            <!-- Remaining -->
                            <div
                                class="flex items-center gap-3 bg-gray-800/50 px-4 py-2 rounded-full border border-gray-700">
                                <span
                                    class="w-3 h-3 rounded-full bg-[#0E1F8E] shadow-[0_0_10px_rgba(14,31,142,0.5)]"></span>
                                <span class="text-sm font-medium text-gray-300">Remaining</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status booked -->
                    <div class="border-t border-white mt-4 pt-5 pb-6">
                        <div class="flex justify-center items-center gap-3 mb-6">
                            <h5 class="text-2xl font-bold text-white">History</h5>
                            <button id="historyDropdownButton" data-dropdown-toggle="historyDropdown"
                                class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-2 focus:ring-blue-500 font-medium rounded-lg text-sm px-3 py-1.5 inline-flex items-center">
                                Filter
                                <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="historyDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li><a href="#" data-filter="all"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">All</a></li>
                                    <li><a href="#" data-filter="Done"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Done</a></li>
                                    <li><a href="#" data-filter="Pending"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Pending</a></li>
                                    <li><a href="#" data-filter="Failed"
                                            class="filter-option block px-4 py-2 hover:bg-gray-100">Failed</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- History List -->
                        <div id="historyList" class="space-y-4">

                            <!-- ITEM: Done -->
                            <div class="history-item group flex justify-between items-center p-4 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5"
                                data-status="Done">
                                <div class="flex items-center gap-4">
                                    <div class="h-11 w-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Date</span>
                                        <span class="text-base font-bold text-gray-800">4/9/2025</span>
                                    </div>
                                </div>

                                <span
                                    class="px-4 py-3 border-2 border-green-800 rounded-full text-xs font-bold uppercase tracking-wider bg-green-400 text-green-800">
                                    Done
                                </span>
                            </div>

                            <!-- ITEM: Pending -->
                            <div class="history-item group flex justify-between items-center p-4 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5"
                                data-status="Pending">
                                <div class="flex items-center gap-4">
                                    <div class="h-11 w-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Date</span>
                                        <span class="text-base font-bold text-gray-800">5/9/2025</span>
                                    </div>
                                </div>

                                <span
                                    class="px-4 py-3 border-2 border-gray-700 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-300 text-gray-700">
                                    Pending
                                </span>
                            </div>

                            <!-- ITEM: Failed -->
                            <div class="history-item group flex justify-between items-center p-4 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5"
                                data-status="Failed">
                                <div class="flex items-center gap-4">
                                    <div class="h-11 w-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Date</span>
                                        <span class="text-base font-bold text-gray-800">6/9/2025</span>
                                    </div>
                                </div>

                                <span
                                    class="px-4 py-3 border-2 border-red-700 rounded-full text-xs font-bold uppercase tracking-wider bg-red-500 text-white">
                                    Failed
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
            </aside>

            <main class="lg:col-span-8 flex flex-col">
                <h1
                    class="text-xl sm:text-2xl font-bold mb-6 text-white text-center flex justify-center items-center gap-3">
                    <span>Practical Driving Slot</span>
                    <span class="w-0.5 h-6 bg-white/30 hidden sm:block"></span>
                    <span class="hidden sm:block">D - Manual Car</span>
                    <span class="sm:hidden block">- D (Manual)</span>
                </h1>
                <div class="overflow-x-auto bg-white shadow-md rounded-3xl flex-1">
                    <!-- Search Bar -->
                    <div
                        class="bg-black px-6 sm:px-8 lg:px-12 py-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-gray-100">

                        <!-- Automate Button -->
                        <button
                            class="w-full sm:w-auto text-gray-900 bg-yellow-400 font-semibold focus:outline-none hover:bg-yellow-300 focus:ring-4 focus:ring-yellow-300 font-medium rounded-xl text-sm px-6 py-3 mr-auto sm:mr-0 transition-all shadow-sm flex items-center gap-2">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <rect width="18" height="10" x="3" y="11" rx="2" />
                                <circle cx="12" cy="5" r="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v4M8 16h.01M16 16h.01" />
                            </svg>
                            Automate Slot
                        </button>

                        <!-- Search Group -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                            <div class="relative w-full sm:w-72">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <select id="month"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-[#0BCE83] focus:border-[#0BCE83] block w-full pl-10 pr-10 p-2.5 outline-none transition-all appearance-none cursor-pointer hover:bg-white hover:border-gray-400">
                                    <option>September 2025</option>
                                    <option>October 2025</option>
                                    <option>November 2025</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <button id="searchBtn"
                                class="w-full sm:w-auto text-white bg-[#0E1F8E] hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-xl text-sm px-7 py-3 text-center inline-flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg transform active:scale-95">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div id="desktopTable"
                        class="hidden sm:block w-full text-sm text-gray-700 p-5 space-y-4 px-6 sm:px-8 lg:px-12">
                        <div
                            class="hidden md:grid md:grid-cols-7 bg-blue-100 rounded-lg px-4 py-2 text-sm font-semibold text-gray-500 uppercase tracking-wider text-center">
                            <div class="md:col-span-2 text-left md:px-4"></div>
                            <div class="md:col-span-1 md:px-4">Date</div>
                            <div class="md:col-span-1 md:px-4">Start Time</div>
                            <div class="md:col-span-1 md:px-4">End Time</div>
                            <div class="md:col-span-1 md:px-4">Duration</div>
                            <div class="md:col-span-1 md:px-4">Slots</div>
                        </div>

                        <div
                            class="bg-white border rounded-lg shadow p-4 px-4 md:grid md:grid-cols-7 md:items-center md:text-center hover:border-blue-900 hover:border-[3px]">
                            <!-- Academy -->
                            <div class="flex items-center gap-4 md:px-4 text-left md:col-span-2">
                                <img src="/image/icon/logo.png" class="h-14" alt="MDA Logo" />
                                <div>
                                    <p class="font-bold text-gray-800 text-base">Molek Driving Academy</p>
                                    <p class="text-sm text-gray-500">Practical Slot</p>
                                </div>
                            </div>

                            <!-- Date -->
                            <div class="md:px-4 md:py-2 md:col-span-1">
                                <p class="font-semibold text-base">5/9/2025</p>
                                <p class="text-sm text-gray-500">Sunday</p>
                            </div>

                            <!-- Time Start -->
                            <div class="md:px-4 md:py-2 md:col-span-1">
                                <p class="font-semibold text-base">09:00</p>
                                <p class="text-sm text-gray-500">Start</p>
                            </div>

                            <!-- Time End -->
                            <div class="md:px-4 md:py-2 md:col-span-1">
                                <p class="font-semibold text-base">16:00</p>
                                <p class="text-sm text-gray-500">End</p>
                            </div>

                            <!-- Duration -->
                            <div class="md:px-4 md:py-2 md:col-span-1">
                                <p class="font-semibold text-base">2h</p>
                                <p class="text-sm text-gray-500">Each Slot</p>
                            </div>

                            <!-- Slots -->
                            <div class="md:px-4 md:py-2 md:col-span-1 text-right">
                                <p class="text-black text-sm font-semibold">Slots</p>
                                <p class="text-gray-600 text-sm mb-2">10 Slots Available</p>
                                <button data-modal-target="confirmModal" data-modal-toggle="confirmModal"
                                    class="bg-[#0E1F8E] hover:bg-indigo-700 text-white px-9 py-2 rounded-xl font-medium hover:bg-[#0abc76] transition">
                                    BOOK
                                </button>
                            </div>

                        </div>

                    </div>

                    <!--  Mobile Cards -->
                    <div id="mobileCards" class="sm:hidden space-y-4 p-4">
                        <div
                            class="bg-white p-4 rounded-lg shadow border flex flex-col gap-4 hover:border-blue-900 hover:border-[3px] transition">


                            <div class="flex items-center gap-4">
                                <img src="/image/icon/logo.png" class="h-14 w-14" alt="MDA Logo" />
                                <div>
                                    <p class="font-bold text-gray-800">Molek Driving Academy</p>
                                    <p class="text-sm text-gray-500">Practical Slot</p>
                                </div>
                            </div>


                            <div class="flex flex-col gap-2 text-sm">
                                <div>
                                    <p class="text-gray-500 font-medium">Date</p>
                                    <p class="font-semibold">5/9/2025 (Sunday)</p>
                                </div>

                                <div>
                                    <p class="text-gray-500 font-medium">Time</p>
                                    <p class="font-semibold">09:00 – 16:00</p>
                                </div>

                                <div>
                                    <p class="text-gray-500 font-medium">Duration</p>
                                    <p class="font-semibold">2 Hours (each slot)</p>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 text-sm">Slots: 10</span>
                                <button data-modal-target="confirmModal" data-modal-toggle="confirmModal"
                                    class="px-4 py-2 bg-[#0E1F8E] text-white rounded-xl font-medium hover:bg-[#0abc76] transition">
                                    BOOK
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Notes -->
                <div class="mt-10 text-sm text-white">
                    <p class="font-semibold">IMPORTANT NOTES*</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Original MyKad must be carried at all times during your test.</li>
                        <li>Dress Code Semi Formal with shoes.</li>
                    </ul>
                </div>
            </main>
        </div>
    </div>

    @include('footer')

    <!-- Popup Modal -->
    <div id="confirmModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-opacity-80 p-4 sm:p-6">
        <div
            class="relative bg-white rounded-2xl shadow-lg w-[90%] sm:w-[70%] md:w-[50%] lg:w-[40%] max-w-lg p-6 sm:p-8 text-center">

            <button type="button" data-modal-hide="confirmModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 rounded-full p-1.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" class="w-4 h-4">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 12 12M13 1 1 13" />
                </svg>
            </button>

            <div class="mt-2 sm:mt-4">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-3">
                    Booking Confirmation
                </h3>
                <p class="text-sm sm:text-base text-gray-500 mb-8">
                    You can cancel this slot through contacting the customer service.
                </p>
            </div>

            <div class="flex justify-center items-center gap-3">
                <button data-modal-hide="confirmModal"
                    class="w-1/2 px-5 sm:px-6 py-4 rounded-full bg-gray-200 text-red-500 font-medium hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button data-modal-hide="confirmModal"
                    class="w-1/2 px-5 sm:px-6 py-4 rounded-full bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <script>
        // Get the dropdown element
        const dropdownEl = document.getElementById("historyDropdown");

        // Get the Flowbite-generated dropdown instance
        const historyDropdown = window.FlowbiteInstances.getInstance(
            "Dropdown",
            dropdownEl
        );

        document.querySelectorAll(".filter-option").forEach(option => {
            option.addEventListener("click", function (e) {
                e.preventDefault();

                const filter = this.getAttribute("data-filter");
                const items = document.querySelectorAll(".history-item");

                items.forEach(item => {
                    const status = item.getAttribute("data-status");

                    item.style.display =
                        filter === "all" || filter === status ? "flex" : "none";
                });

                historyDropdown.hide();
            });
        });
    </script>

    <!-- Filter Dates -->
    <script>
        document.getElementById("searchBtn").addEventListener("click", function () {
            const selectedMonth = document.getElementById("month").value.split(" ")[0]; // e.g., "September"
            const monthMap = {
                "January": "1",
                "February": "2",
                "March": "3",
                "April": "4",
                "May": "5",
                "June": "6",
                "July": "7",
                "August": "8",
                "September": "9",
                "October": "10",
                "November": "11",
                "December": "12"
            };

            const targetMonth = monthMap[selectedMonth];

            // --- Desktop Filtering ---
            let desktopCount = 0;
            const desktopRows = document.querySelectorAll("#desktopTable > div.bg-white");
            desktopRows.forEach(row => {
                const dateText = row.querySelector("div.md\\:col-span-1 p.font-semibold").innerText;
                const monthInRow = dateText.split("/")[1];
                if (monthInRow === targetMonth) {
                    row.style.display = "";
                    desktopCount++;
                } else {
                    row.style.display = "none";
                }
            });

            // Show "No records" message if none
            let desktopMsg = document.getElementById("desktopNoRecord");
            if (!desktopMsg) {
                desktopMsg = document.createElement("div");
                desktopMsg.id = "desktopNoRecord";
                desktopMsg.className = "text-center text-gray-500 py-4";
                desktopMsg.innerText = "There are no records.";
                document.getElementById("desktopTable").appendChild(desktopMsg);
            }
            desktopMsg.style.display = (desktopCount === 0) ? "" : "none";


            // --- Mobile Filtering ---
            let mobileCount = 0;
            const mobileCards = document.querySelectorAll("#mobileCards > div");
            mobileCards.forEach(card => {
                const dateText = card.querySelector("div:nth-child(2) div p.font-semibold").innerText;
                const monthInCard = dateText.split("/")[1];
                if (monthInCard === targetMonth) {
                    card.style.display = "";
                    mobileCount++;
                } else {
                    card.style.display = "none";
                }
            });

            // Show "No records" message if none
            let mobileMsg = document.getElementById("mobileNoRecord");
            if (!mobileMsg) {
                mobileMsg = document.createElement("div");
                mobileMsg.id = "mobileNoRecord";
                mobileMsg.className = "text-center text-gray-500 py-4";
                mobileMsg.innerText = "There are no records.";
                document.getElementById("mobileCards").appendChild(mobileMsg);
            }
            mobileMsg.style.display = (mobileCount === 0) ? "" : "none";
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const options = {
                series: [1, 4],
                chart: {
                    type: 'donut',
                    height: 240,
                    fontFamily: 'Segoe UI, sans-serif',
                },

                labels: ['Done', 'Remaining'],
                colors: ['#FACC15', '#0E1F8E'],

                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                name: {
                                    show: false
                                },
                                value: {
                                    show: true,
                                    fontSize: '28px',
                                    fontWeight: 'bold',
                                    color: '#ffffff',
                                    offsetY: 10,
                                    formatter: () => ""
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    fontSize: '28px',
                                    fontWeight: 'bold',
                                    color: '#000000',
                                    formatter: function (w) {
                                        const series = w.globals.seriesTotals;
                                        const total = series.reduce((a, b) => a + b, 0);
                                        const percent = (series[0] / total) * 100;
                                        return percent.toFixed(0) + "%";
                                    }
                                }
                            }
                        }
                    }
                },

                dataLabels: {
                    enabled: false
                },

                stroke: {
                    show: false,
                    width: 0
                },

                legend: {
                    show: false
                },

                tooltip: {
                    enabled: true,
                    theme: 'dark',
                    style: {
                        fontSize: '14px',
                        color: '#000' // <-- FIX: Tooltip text is now black
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#donut-chart"), options);
            chart.render();
        });
    </script>

</body>

</html>