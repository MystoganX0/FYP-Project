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

<body class="font-poppins bg-gray-50 text-gray-800">
    <!-- HEADER -->
    @include('header')

    <div class="flex flex-col md:flex-row">
        @include('sidebar')

        <!-- MAIN CONTENT -->
        <main class="flex-1 px-5 sm:px-10 lg:px-20 py-6 md:py-10">
            <h1 class="text-2xl font-bold mb-6 text-center md:text-left">Pratical </h1>

            <!-- Search + Table Block -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <!-- Search Bar -->
                <div
                    class="bg-blue-600 px-4 py-4 flex flex-col sm:flex-row justify-center items-center gap-3 rounded-t-lg">
                    <select id="month"
                        class="w-full sm:w-64 px-4 py-2 rounded-md border border-gray-300 text-gray-700 focus:ring-2 focus:ring-blue-500">
                        <option>September 2025</option>
                        <option>October 2025</option>
                        <option>November 2025</option>
                    </select>
                    <button id="searchBtn"
                        class="w-full sm:w-auto bg-blue-900 text-white font-medium px-6 py-2 rounded-md hover:bg-blue-800 transition">
                        SEARCH
                    </button>
                </div>

                <!-- Desktop Table -->
                <table id="desktopTable" class="hidden sm:table w-full text-sm text-center text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 sm:px-6 py-3">No</th>
                            <th class="px-4 sm:px-6 py-3">Date</th>
                            <th class="px-4 sm:px-6 py-3">Day</th>
                            <th class="px-4 sm:px-6 py-3">Time</th>
                            <th class="px-4 sm:px-6 py-3">Slots</th>
                            <th class="px-4 sm:px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 sm:px-6 py-4">1</td>
                            <td class="px-4 sm:px-6 py-4">4/9/2025</td>
                            <td class="px-4 sm:px-6 py-4">Sunday</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-normal break-words">8 a.m – 12 p.m</td>
                            <td class="px-4 sm:px-6 py-4">-</td>
                            <td class="px-4 sm:px-6 py-4">
                                <button class="px-4 py-2 bg-green-500 text-white rounded-md font-medium">BOOKED</button>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 sm:px-6 py-4">2</td>
                            <td class="px-4 sm:px-6 py-4">11/9/2025</td>
                            <td class="px-4 sm:px-6 py-4">Saturday</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-normal break-words">8 a.m – 12 p.m</td>
                            <td class="px-4 sm:px-6 py-4">-</td>
                            <td class="px-4 sm:px-6 py-4">
                                <button
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium">BOOK</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 sm:px-6 py-4">3</td>
                            <td class="px-4 sm:px-6 py-4">18/9/2025</td>
                            <td class="px-4 sm:px-6 py-4">Saturday</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-normal break-words">8 a.m – 12 p.m</td>
                            <td class="px-4 sm:px-6 py-4">-</td>
                            <td class="px-4 sm:px-6 py-4">
                                <button
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium">BOOK</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Mobile Card Layout -->
                <div id="mobileCards" class="sm:hidden space-y-4 p-4">
                    <div class="card bg-white p-4 rounded-lg shadow border">
                        <p class="text-sm font-medium text-gray-500">Date</p>
                        <p class="font-semibold">4/9/2025 (Sunday)</p>
                        <p class="text-sm font-medium text-gray-500 mt-2">Time</p>
                        <p class="font-semibold">8 a.m – 12 p.m</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-gray-500">Slots: -</span>
                            <button class="px-4 py-2 bg-green-500 text-white rounded-md font-medium">BOOKED</button>
                        </div>
                    </div>

                    <div class="card bg-white p-4 rounded-lg shadow border">
                        <p class="text-sm font-medium text-gray-500">Date</p>
                        <p class="font-semibold">11/9/2025 (Saturday)</p>
                        <p class="text-sm font-medium text-gray-500 mt-2">Time</p>
                        <p class="font-semibold">8 a.m – 12 p.m</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-gray-500">Slots: -</span>
                            <button
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium">BOOK</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div class="mt-6 text-sm text-gray-700">
                <p class="font-semibold">IMPORTANT NOTES*</p>
                <ul class="list-disc ml-5 mt-2 space-y-1">
                    <li>Original MyKad must be carried at all times during your test.</li>
                    <li>Dress Code Semi Formal with shoes.</li>
                </ul>
            </div>
        </main>
    </div>

    <!-- ✅ JS to Filter Dates -->
    <script>
        document.getElementById("searchBtn").addEventListener("click", function() {
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

            // ✅ Filter Desktop Table Rows
            document.querySelectorAll("#desktopTable tbody tr").forEach(row => {
                const dateText = row.cells[1].innerText; // e.g., "4/9/2025"
                const monthInRow = dateText.split("/")[1]; // "9"
                if (monthInRow === targetMonth) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });

            // ✅ Filter Mobile Cards
            document.querySelectorAll("#mobileCards .card").forEach(card => {
                const dateText = card.querySelector("p.font-semibold")
                .innerText; // e.g., "4/9/2025 (Sunday)"
                const monthInCard = dateText.split("/")[1]; // "9"
                if (monthInCard === targetMonth) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
