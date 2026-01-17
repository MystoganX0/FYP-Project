<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molek Driving Academy - Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
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

<body class="bg-gray-50 font-poppins min-h-screen">
    @include('ui.admin.sidebar')

    <div class="p-4 sm:ml-72 transition-all duration-300">
        <div class="p-2 mt-4">
            <!-- Header -->
            <div
                class="relative bg-gradient-to-br from-[#0E1F8E] to-[#050C42] rounded-3xl p-8 mb-10 shadow-xl overflow-hidden">
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="relative flex flex-col md:flex-row justify-between items-center gap-6 z-10">
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">
                            Package Management
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Manage license package available.
                            <span
                                class="inline-flex items-center rounded-md bg-white/10 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-white/20 backdrop-blur-sm">Admin</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div
                            class="hidden md:flex bg-white/10 backdrop-blur-md border border-white/20 p-1 rounded-xl items-center text-sm font-medium text-white/90 shadow-sm">
                            <div
                                class="bg-white/20 text-white px-4 py-1.5 rounded-lg border border-white/10 cursor-default shadow-sm font-semibold">
                                {{ date('d M Y') }}
                            </div>
                            <div class="px-4 py-1.5 cursor-default hover:bg-white/5 rounded-lg transition-colors">
                                Today
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div x-data="{ show: true, progress: 0 }"
                    x-init="setTimeout(() => show = false, 5000); let interval = setInterval(() => { progress += 2; if (progress >= 100) clearInterval(interval); }, 100)"
                    x-show="show" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-6 bg-emerald-500 border border-emerald-600 rounded-2xl p-6 flex items-start gap-4 shadow-lg shadow-emerald-500/20 relative overflow-hidden"
                    role="alert">
                    <div class="p-3 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg mb-1">Success</h4>
                        <p class="text-emerald-50 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" type="button"
                        class="flex-shrink-0 inline-flex items-center justify-center w-8 h-8 text-emerald-100 hover:text-white rounded-lg hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Progress Bar -->
                    <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-b-2xl transition-all duration-100"
                        :style="`width: ${progress}%`"></div>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true, progress: 0 }"
                    x-init="setTimeout(() => show = false, 5000); let interval = setInterval(() => { progress += 2; if (progress >= 100) clearInterval(interval); }, 100)"
                    x-show="show" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-6 bg-rose-500 border border-rose-600 rounded-2xl p-6 flex items-start gap-4 shadow-lg shadow-rose-500/20 relative overflow-hidden"
                    role="alert">
                    <div class="p-3 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg mb-1">Error</h4>
                        <p class="text-rose-50 text-sm font-medium">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" type="button"
                        class="flex-shrink-0 inline-flex items-center justify-center w-8 h-8 text-rose-100 hover:text-white rounded-lg hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Progress Bar -->
                    <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-b-2xl transition-all duration-100"
                        :style="`width: ${progress}%`"></div>
                </div>
            @endif

            <!-- Content -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Available Packages</h2>
                        <p class="text-sm text-gray-500 mt-1">List of pricing packages</p>
                    </div>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full min-w-[800px] text-left border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-gray-400 text-sm">
                                <th class="pb-2 pl-4 font-medium whitespace-nowrap">Package Type</th>
                                <th class="pb-2 font-medium whitespace-nowrap">Fee</th>
                                <th class="pb-2 font-medium whitespace-nowrap">Description</th>
                                <th class="pb-2 font-medium text-center pr-4 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody class="transition-all duration-300 ease-in-out">
                            @forelse($packages as $package)
                                                    <tr class="group hover:bg-gray-50/50 transition-colors">
                                                        <td class="bg-white border-b border-gray-50 py-4 pl-4 first:rounded-l-2xl shadow-sm">
                                                            <div class="flex items-center gap-3">
                                                                <div
                                                                    class="w-10 h-10 rounded-full flex items-center justify-center 
                                                                                                                                            {{ strtolower($package->package_type) == 'premium' ? 'bg-amber-100 text-amber-600' :
                                (strtolower($package->package_type) == 'basic' ? 'bg-green-100 text-green-600' :
                                    (strtolower($package->package_type) == 'preferred' ? 'bg-purple-100 text-purple-600' : 'bg-gray-100 text-gray-600')) }}">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                                    </svg>
                                                                </div>
                                                                <span
                                                                    class="font-bold text-gray-900 capitalize">{{ $package->package_type }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="bg-white border-b border-gray-50 py-4">
                                                            <span class="font-bold text-green-600">RM
                                                                {{ number_format($package->package_price, 2) }}</span>
                                                        </td>
                                                        <td class="bg-white border-b border-gray-50 py-4 max-w-xs">
                                                            <div class="line-clamp-2 text-sm text-gray-500"
                                                                title="{{ strip_tags(str_replace(['<li', '>'], ["\n", ''], $package->package_desc)) }}">
                                                                {{ Str::limit(strip_tags(str_replace('</li>', ' • ', $package->package_desc)), 100) }}
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="bg-white border-b border-gray-50 py-4 text-center pr-4 first:rounded-l-2xl last:rounded-r-2xl shadow-sm">
                                                            <div class="flex items-center justify-center gap-2">
                                                                <button onclick="openEditModal({{ json_encode($package) }})"
                                                                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                                                    title="Edit Package">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                                <button onclick="openDeleteModal({{ $package->package_id ?? $package->id }})"
                                                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                                                    title="Delete Package">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">No packages found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-[70] hidden opacity-0 transition-opacity duration-300 z-50"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeEditModal()"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeEditModal()">
                <div id="editModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-lg scale-95 duration-300 ring-1 ring-black/5">

                    <form action="{{ route('package.update') }}" method="POST" onsubmit="prepareDescriptionData()">
                        @csrf

                        <!-- Modal Header -->
                        <div
                            class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-blue-600 to-indigo-600">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-white" id="modal-title">Edit Package</h3>
                            </div>
                            <button type="button" onclick="closeEditModal()"
                                class="text-white/80 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-2 -mr-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="px-6 py-6 space-y-4">
                            <input type="hidden" name="package_id" id="edit-package-id">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Package Type</label>
                                <input type="text" id="edit-package-type" name="package_type" required
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors">
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label class="block text-sm font-semibold text-gray-700">Description Points</label>
                                    <button type="button" onclick="addDescriptionPoint()"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        Add Point
                                    </button>
                                </div>
                                <div id="description-container"
                                    class="space-y-3 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                                    <!-- Dynamic Inputs will be injected here -->
                                </div>
                                <!-- Hidden input to store the final HTML string -->
                                <input type="hidden" id="edit-package-desc" name="package_desc">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Price (RM)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">RM</span>
                                    </div>
                                    <input type="number" step="0.01" name="package_price" id="edit-package-price"
                                        required
                                        class="w-full rounded-xl border-gray-200 pl-10 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5">
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                            <button type="button" onclick="closeEditModal()"
                                class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all active:scale-95">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-[70] hidden opacity-0 transition-opacity duration-300 z-50"
        aria-labelledby="delete-modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()">
        </div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4"
                onclick="if(event.target === this) closeDeleteModal()">
                <div id="deleteModalPanel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-md scale-95 duration-300 ring-1 ring-black/5">

                    <!-- Header -->
                    <div
                        class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-red-500 to-red-600">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white" id="delete-modal-title">Delete Package</h3>
                        </div>
                        <button type="button" onclick="closeDeleteModal()"
                            class="text-white/80 hover:text-white transition-colors rounded-lg hover:bg-white/10 p-2 -mr-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6">
                        <div class="text-center">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Are you sure you want to delete this package?
                                <span class="block mt-2 text-gray-900 font-semibold">This action cannot be
                                    undone.</span>
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                        <button type="button" onclick="closeDeleteModal()"
                            class="inline-flex justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-all active:scale-95">
                            Cancel
                        </button>
                        <form action="{{ route('package.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package_id" id="deletePackageId">
                            <button type="submit"
                                class="inline-flex justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 transition-all hover:shadow-md active:scale-95">
                                Delete Package
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editModal = document.getElementById('editModal');
        const editModalPanel = document.getElementById('editModalPanel');
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalPanel = document.getElementById('deleteModalPanel');
        const descriptionContainer = document.getElementById('description-container');

        function openEditModal(packageData) {
            document.getElementById('edit-package-id').value = packageData.id || packageData.package_id;
            document.getElementById('edit-package-type').value = packageData.package_type;
            document.getElementById('edit-package-price').value = packageData.package_price;

            // Clear previous inputs
            descriptionContainer.innerHTML = '';

            // Parse description (handle both HTML list and plain text/commas)
            const rawDesc = packageData.package_desc || '';
            let points = [];

            if (rawDesc.includes('<li')) {
                // Extract content between <li> tags
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = rawDesc;
                const lis = tempDiv.getElementsByTagName('li');
                for (let li of lis) {
                    if (li.textContent.trim()) points.push(li.textContent.trim());
                }
            } else if (rawDesc) {
                // Fallback for plain text, split by newline
                points = rawDesc.split('\n').filter(p => p.trim());
            }

            // Populate inputs
            if (points.length > 0) {
                points.forEach(point => addDescriptionPoint(point));
            } else {
                addDescriptionPoint(); // Add at least one empty
            }

            editModal.classList.remove('hidden');
            setTimeout(() => {
                editModal.classList.remove('opacity-0');
                editModalPanel.classList.remove('scale-95');
                editModalPanel.classList.add('scale-100');
            }, 10);
        }

        function addDescriptionPoint(value = '') {
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-2 group';

            wrapper.innerHTML = `
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                    </div>
                    <input type="text" value="${value.replace(/"/g, '&quot;')}" 
                        class="desc-point-input w-full rounded-xl border-gray-200 pl-8 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 transition-colors" 
                        placeholder="Enter description point">
                </div>
                <button type="button" onclick="removeDescriptionPoint(this)" 
                    class="p-2 text-red-500 bg-red-50 hover:bg-red-100 rounded-lg transition-colors shadow-sm"
                    title="Remove point">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;

            descriptionContainer.appendChild(wrapper);
        }

        function removeDescriptionPoint(btn) {
            const inputs = descriptionContainer.querySelectorAll('.desc-point-input');
            if (inputs.length > 1) {
                btn.closest('div.flex').remove();
            } else {
                // If it's the last one, just clear it
                btn.closest('div.flex').querySelector('input').value = '';
            }
        }

        function prepareDescriptionData() {
            const inputs = descriptionContainer.querySelectorAll('.desc-point-input');
            let htmlList = '';

            inputs.forEach(input => {
                const val = input.value.trim();
                if (val) {
                    htmlList += `<li>${val}</li>`;
                }
            });

            // If parsed content was wrapped in <ul>, we could wrap it here too, 
            // but strict request implied <li> items. I'll maintain raw <li> sequence 
            // conforming to what was seen in str_replace previously.
            // If the original data had <ul>, the parser handles it via tempDiv.

            document.getElementById('edit-package-desc').value = htmlList;
            return true;
        }

        function closeEditModal() {
            editModal.classList.add('opacity-0');
            editModalPanel.classList.remove('scale-100');
            editModalPanel.classList.add('scale-95');
            setTimeout(() => {
                editModal.classList.add('hidden');
            }, 300);
        }

        function openDeleteModal(id) {
            document.getElementById('deletePackageId').value = id;
            deleteModal.classList.remove('hidden');
            setTimeout(() => {
                deleteModal.classList.remove('opacity-0');
                deleteModalPanel.classList.remove('scale-95');
                deleteModalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeDeleteModal() {
            deleteModal.classList.add('opacity-0');
            deleteModalPanel.classList.remove('scale-100');
            deleteModalPanel.classList.add('scale-95');
            setTimeout(() => {
                deleteModal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>

</html>