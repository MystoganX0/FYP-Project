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

<body class="bg-blue-200 font-poppins min-h-screen">
    @include('sidebar')
    <div class="sm:ml-72 p-4 sm:p-6 pt-4 transition-all duration-300">
        <div class="flex flex-col lg:flex-row gap-6 min-h-[calc(100vh-4rem)]">
            <main class="flex-2 w-full lg:w-2/3 space-y-6 h-full">

                <form class="w-full">
                    <label for="default-search" class="mb-2 text-base font-medium text-black sr-only">Search</label>
                    <div class="flex w-full items-center bg-white border border-gray-300 rounded-full px-4">
                        <!-- Icon -->
                        <div class="flex items-center justify-center text-gray-500">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>

                        <!-- Input -->
                        <input type="search" id="default-search"
                            class="flex-1 py-4 text-sm text-blue-900 bg-white focus:outline-none"
                            placeholder="Type here" required />

                        <!-- Button -->
                        <button type="submit"
                            class="ml-2 px-8 py-2 text-sm text-white bg-blue-700 rounded-full hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Search
                        </button>
                    </div>
                </form>
                <!-- Category -->
                <section>
                    <h2 class="text-lg font-semibold mb-2">Categories</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-purple-500 text-white rounded-xl p-4">
                            <div class="font-bold">Motorcycle</div>
                            <div class="text-sm">B & B2</div>
                        </div>
                        <div class="bg-cyan-500 text-white rounded-xl p-4">
                            <div class="font-bold">Car</div>
                            <div class="text-sm">Manual & Auto</div>
                        </div>
                        <div class="bg-pink-500 text-white rounded-xl p-4">
                            <div class="font-bold">Others</div>
                            <div class="text-sm">GDL & PSV</div>
                        </div>
                        <div class="bg-blue-700 text-white rounded-xl p-4">
                            <div class="font-bold">Combo</div>
                            <div class="text-sm">Motorcycle & Car</div>
                        </div>
                    </div>
                </section>

                <!-- Files -->
                <section>
                    <h2 class="text-lg font-semibold mb-2">Details</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-white shadow rounded-xl p-4 text-center">
                            <div class="font-semibold">Total Classes</div>
                            <div class="text-sm text-gray-500">7</div>
                        </div>
                        <button type="add"
                            class="group w-full bg-blue-400 text-white hover:text-white hover:bg-blue-500 font-medium py-3 px-4 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center gap-2 transition">

                            <svg class="w-6 h-6 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>

                            <span>Add Classes</span>
                        </button>
                    </div>
                </section>

                <!-- Table -->
                <section>
                    <h2 class="text-lg font-semibold mb-2">Recent Classes</h2>
                    <div class="space-y-3">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
                            <table class="w-full text-sm text-center text-gray-700">
                                <thead class="text-sm bg-blue-50 text-blue-700">
                                    <tr>
                                        <th scope="col" class="px-16 py-3">Image</th>
                                        <th scope="col" class="px-6 py-3">
                                            <button type="button"
                                                class="flex items-center justify-center gap-1 group w-full"
                                                data-sort="classes">
                                                Classes
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="w-4 h-4 opacity-60 group-hover:opacity-100 transition">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 0 1 .832.445l3.25 4.5A1 1 0 0 1 13.25 9H6.75a1 1 0 0 1-.832-1.555l3.25-4.5A1 1 0 0 1 10 3zm0 14a1 1 0 0 1-.832-.445l-3.25-4.5A1 1 0 0 1 6.75 11h6.5a1 1 0 0 1 .832 1.555l-3.25 4.5A1 1 0 0 1 10 17z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            <button type="button"
                                                class="flex items-center justify-center gap-1 group w-full"
                                                data-sort="basic">
                                                Basic (RM)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="w-4 h-4 opacity-60 group-hover:opacity-100 transition">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 0 1 .832.445l3.25 4.5A1 1 0 0 1 13.25 9H6.75a1 1 0 0 1-.832-1.555l3.25-4.5A1 1 0 0 1 10 3zm0 14a1 1 0 0 1-.832-.445l-3.25-4.5A1 1 0 0 1 6.75 11h6.5a1 1 0 0 1 .832 1.555l-3.25 4.5A1 1 0 0 1 10 17z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            <button type="button"
                                                class="flex items-center justify-center gap-1 group w-full"
                                                data-sort="premium">
                                                Premium (RM)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="w-4 h-4 opacity-60 group-hover:opacity-100 transition">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 0 1 .832.445l3.25 4.5A1 1 0 0 1 13.25 9H6.75a1 1 0 0 1-.832-1.555l3.25-4.5A1 1 0 0 1 10 3zm0 14a1 1 0 0 1-.832-.445l-3.25-4.5A1 1 0 0 1 6.75 11h6.5a1 1 0 0 1 .832 1.555l-3.25 4.5A1 1 0 0 1 10 17z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            <button type="button"
                                                class="flex items-center justify-center gap-1 group w-full"
                                                data-sort="preferred">
                                                Preferred (RM)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="w-4 h-4 opacity-60 group-hover:opacity-100 transition">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 0 1 .832.445l3.25 4.5A1 1 0 0 1 13.25 9H6.75a1 1 0 0 1-.832-1.555l3.25-4.5A1 1 0 0 1 10 3zm0 14a1 1 0 0 1-.832-.445l-3.25-4.5A1 1 0 0 1 6.75 11h6.5a1 1 0 0 1 .832 1.555l-3.25 4.5A1 1 0 0 1 10 17z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </th>

                                        <th scope="col" class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <!-- Row 1 -->
                                    <tr class="hover:bg-blue-50 transition">
                                        <td class="p-4">
                                            <img src="/image/classes/b.png" class="w-24 mx-auto" alt="Apple Watch">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">Apple Watch</td>
                                        <td class="px-6 py-4 font-semibold text-gray-800">RM 599</td>
                                        <td class="px-6 py-4 font-semibold text-gray-800">RM 899</td>
                                        <td class="px-6 py-4 font-semibold text-gray-800">RM 1199</td>
                                        <td class="px-6 py-4 text-center align-middle">
                                            <div class="inline-flex items-center justify-center gap-2">
                                                <!-- Edit button -->
                                                <button
                                                    class="inline-flex items-center justify-center p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487a2.25 2.25 0 0 1 3.182 3.182L8.25 19.463l-4.5 1.5 1.5-4.5 11.612-11.976z" />
                                                    </svg>
                                                </button>

                                                <!-- Delete button -->
                                                <button
                                                    class="inline-flex items-center justify-center p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </main>

            <aside class="flex-1 w-full lg:w-1/3 h-full">

                <div class="bg-white rounded-xl shadow p-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">Upload Image</h2>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer bg-blue-50 hover:bg-blue-100 transition">

                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Click to upload</span> or drag and drop
                                </p>
                                <p class="text-xs text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>

                        </label>

                    </div>

                    <div class="space-y-4">
                        <p id="file-name" class="mt-3 text-sm text-gray-600 font-normal hidden"></p>
                        <input id="dropzone-file" type="file" class="hidden" onchange="displayFileName(event)" />

                        <div>
                            <label for="class-name" class="block mb-1 text-sm font-medium text-gray-700">Class
                                Name</label>
                            <input type="text" id="class-name" name="class_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                placeholder="Eg : Class - Manual Car" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Package Prices (RM)</label>

                            <!-- Basic Package -->
                            <div class="mb-3">
                                <label for="price-basic" class="block mb-1 text-sm text-gray-600">Basic</label>
                                <input type="number" id="price-basic" name="price_basic"
                                    class="w-full bg-green-200 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none text-sm"
                                    placeholder="Enter price for Basic package" />
                            </div>

                            <!-- Premium Package -->
                            <div class="mb-3">
                                <label for="price-premium" class="block mb-1 text-sm text-gray-600">Premium</label>
                                <input type="number" id="price-premium" name="price_premium"
                                    class="w-full bg-blue-200 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                    placeholder="Enter price for Premium package" />
                            </div>

                            <!-- Preferred Package -->
                            <div>
                                <label for="price-preferred"
                                    class="block mb-1 text-sm text-gray-600">Preferred</label>
                                <input type="number" id="price-preferred" name="price_preferred"
                                    class="w-full bg-purple-200 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none text-sm"
                                    placeholder="Enter price for Preferred package" />
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="group w-full bg-white hover:bg-blue-700 text-blue-700 hover:text-white border-2 border-blue-700 font-medium py-3 px-4 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center gap-2 transition">

                            <svg class="w-6 h-6 text-blue-700 group-hover:text-white transition-colors"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>

                            <span>Add Classes</span>
                        </button>

                    </div>

                </div>
            </aside>
        </div>
    </div>

    {{-- Search --}}
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            const searchValue = document.getElementById('default-search').value.toLowerCase().trim();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const className = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (className.includes(searchValue) || searchValue === "") {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
    <!-- File name -->
    <script>
        function displayFileName(event) {
            const input = event.target;
            const fileNameDisplay = document.getElementById('file-name');
            if (input.files.length > 0) {
                fileNameDisplay.textContent = `Selected file: ${input.files[0].name}`;
                fileNameDisplay.classList.remove('hidden');
            } else {
                fileNameDisplay.textContent = '';
                fileNameDisplay.classList.add('hidden');
            }
        }
    </script>
    <!-- Sorting -->
    <script>
        document.querySelectorAll('[data-sort]').forEach(button => {
            button.addEventListener('click', () => {
                const table = button.closest('table');
                const tbody = table.querySelector('tbody');
                const index = Array.from(button.parentNode.parentNode.children).indexOf(button.parentNode);
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const asc = !button.classList.contains('asc');

                // remove sort classes from all buttons
                document.querySelectorAll('[data-sort]').forEach(b => b.classList.remove('asc', 'desc'));

                button.classList.toggle('asc', asc);
                button.classList.toggle('desc', !asc);

                rows.sort((a, b) => {
                    const aText = a.children[index].textContent.trim().replace(/RM\s*/g, '');
                    const bText = b.children[index].textContent.trim().replace(/RM\s*/g, '');
                    const aNum = parseFloat(aText);
                    const bNum = parseFloat(bText);

                    if (!isNaN(aNum) && !isNaN(bNum)) {
                        return asc ? aNum - bNum : bNum - aNum;
                    }
                    return asc ? aText.localeCompare(bText) : bText.localeCompare(aText);
                });

                rows.forEach(row => tbody.appendChild(row));
            });
        });
    </script>
    <!-- Edit -->
    <script>
        document.querySelectorAll('tbody tr').forEach(row => {
            const editBtn = row.querySelector('button.bg-blue-600'); // Edit button selector

            editBtn.addEventListener('click', function() {
                // Get data from the clicked row
                const imageSrc = row.querySelector('img').getAttribute('src');
                const imageName = imageSrc.split('/').pop(); // extract file name only (e.g. b.png)
                const className = row.querySelector('td:nth-child(2)').textContent.trim();
                const priceBasic = row.querySelector('td:nth-child(3)').textContent.replace('RM', '')
                    .trim();
                const pricePremium = row.querySelector('td:nth-child(4)').textContent.replace('RM', '')
                    .trim();
                const pricePreferred = row.querySelector('td:nth-child(5)').textContent.replace('RM', '')
                    .trim();

                // Fill the aside form fields
                document.getElementById('class-name').value = className;
                document.getElementById('price-basic').value = priceBasic;
                document.getElementById('price-premium').value = pricePremium;
                document.getElementById('price-preferred').value = pricePreferred;

                // Show image file name in the file-name paragraph
                const fileNameDisplay = document.getElementById('file-name');
                fileNameDisplay.textContent = `Selected file: ${imageName}`;
                fileNameDisplay.classList.remove('hidden');

                // Change button label to "Update Class"
                const submitBtn = document.querySelector('button[type="submit"] span');
                submitBtn.textContent = "Update Class";
            });
        });
    </script>
    <!-- Added -->
    <script>
        // Reset Aside Form when "Add Classes" button is clicked
        document.querySelector('button[type="add"]').addEventListener('click', function() {
            // Clear input fields
            document.getElementById('class-name').value = '';
            document.getElementById('price-basic').value = '';
            document.getElementById('price-premium').value = '';
            document.getElementById('price-preferred').value = '';
            document.getElementById('dropzone-file').value = '';

            // Hide and clear the file name display
            const fileNameDisplay = document.getElementById('file-name');
            fileNameDisplay.textContent = '';
            fileNameDisplay.classList.add('hidden');

            // Reset submit button text back to "Add Classes"
            const submitBtn = document.querySelector('button[type="submit"] span');
            submitBtn.textContent = "Add Classes";
        });
    </script>




</body>

</html>
