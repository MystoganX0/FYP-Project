<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
        <div class="p-2 mt-4 space-y-8">

            <!-- Header -->
            <div
                class="relative bg-gradient-to-br from-[#0E1F8E] to-[#050C42] rounded-3xl p-8 shadow-xl overflow-hidden">
                <!-- Decorative Elements -->
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="relative flex flex-col md:flex-row justify-between items-center gap-6 z-10">
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">
                            Admin Dashboard
                        </h1>
                        <p class="text-blue-100 font-medium mt-2 text-sm flex items-center gap-2">
                            Monitor applications, bookings, schedules, and revenue.
                            <span
                                class="inline-flex items-center rounded-md bg-white/10 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-white/20 backdrop-blur-sm">Control
                                Center</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Date Toggle (Simple Pill) -->
                        <div
                            class="hidden md:flex bg-white/10 backdrop-blur-md border border-white/20 p-1 rounded-xl items-center text-sm font-medium text-white/90 shadow-sm">
                            <div
                                class="bg-white/20 text-white px-4 py-1.5 rounded-lg border border-white/10 cursor-default shadow-sm font-semibold">
                                {{ date('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Insights -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Revenue Card -->
                <div
                    class="lg:col-span-1 bg-gradient-to-br from-sky-400 to-blue-500 rounded-[2rem] p-6 text-white shadow-lg shadow-sky-400/20 flex flex-col justify-between">
                    <div>
                        <p class="text-blue-50 font-bold text-sm uppercase tracking-wide">Total Revenue</p>
                        <p class="text-xs text-blue-100 mt-1">All Time</p>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold mt-4">RM {{ number_format($totalRevenueMonth, 2) }}</h3>
                        <div
                            class="mt-4 inline-flex items-center gap-1 bg-white/20 px-3 py-1 rounded-lg text-xs font-medium backdrop-blur-sm border border-white/20">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span>Financial Performance</span>
                        </div>
                    </div>
                </div>

                <!-- Package Analysis Section (iOS Style Widgets) -->
                <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Popularity Widget -->
                    <div
                        class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900 tracking-tight">Popularity</h3>
                                <p class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">Packages</p>
                            </div>
                            <div class="bg-gray-50 p-1.5 rounded-full">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center justify-center relative">
                            <div id="chart-package-pop" class="w-full"></div>
                        </div>
                    </div>

                    <!-- Revenue Widget -->
                    <div
                        class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900 tracking-tight">Revenue</h3>
                                <p class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">By Source</p>
                            </div>
                            <div class="bg-gray-50 p-1.5 rounded-full">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div id="chart-revenue-package" class="w-full"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Application Status (Donut) -->
                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 tracking-tight">Status</h3>
                            <p class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">Applications</p>
                        </div>
                        <div class="bg-gray-50 p-1.5 rounded-full">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                        <div id="chart-app-status" class="w-full"></div>
                    </div>
                </div>

                <!-- Bookings Bar Chart -->
                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 tracking-tight">Bookings</h3>
                            <p class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">By Phase</p>
                        </div>
                        <div class="bg-gray-50 p-1.5 rounded-full">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="flex-1 flex items-end justify-center pb-4">
                        <div id="chart-bookings-phase" class="w-full"></div>
                    </div>
                </div>

                <!-- Recent Activity Feed -->
                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 flex flex-col">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 tracking-tight">Activity</h3>
                            <p class="text-[11px] font-medium text-gray-400 uppercase tracking-wider">Recent Events</p>
                        </div>
                        <div class="bg-gray-50 p-1.5 rounded-full">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-4 overflow-y-auto max-h-[350px] custom-scrollbar pr-2">
                        @forelse($activityFeed as $activity)
                            <div class="flex gap-3 items-start">
                                <div class="flex-shrink-0 mt-0.5">
                                    <div
                                        class="w-2 h-2 rounded-full bg-{{ $activity['icon_color'] }}-500 mt-2 ring-4 ring-{{ $activity['icon_color'] }}-50">
                                    </div>
                                </div>
                                <div class="flex-1 pb-4 border-b border-gray-50 last:border-0 last:pb-0">
                                    <p class="text-sm font-medium text-gray-800">{{ $activity['message'] }}</p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ \Carbon\Carbon::parse($activity['timestamp'])->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-400 italic text-sm">No recent activity</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart Scripts -->
    <script>
        // 1. Application Status Donut
        const statusOptions = {
            series: {!! json_encode($appStatusData) !!},
            labels: {!! json_encode($statusKeys) !!},
            chart: {
                type: 'donut',
                height: 280,
                fontFamily: 'SF Pro Display, -apple-system, BlinkMacSystemFont, Segoe UI, sans-serif'
            },
            colors: ['#3B82F6', '#60A5FA'], // Blue Theme
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    donut: {
                        size: '60%', // Making it "fatter" (smaller hole)
                        labels: {
                            show: true,
                            name: { show: true, fontSize: '12px', fontWeight: 600, color: '#9CA3AF', offsetY: -5 },
                            value: { show: true, fontSize: '32px', fontWeight: 800, color: '#1F2937', offsetY: 10 },
                            total: {
                                show: true,
                                label: 'Total',
                                color: '#9CA3AF',
                                fontSize: '13px',
                                fontWeight: 600,
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 0, colors: ['transparent'] },
            legend: {
                position: 'bottom',
                fontSize: '14px',
                fontWeight: 500,
                markers: { radius: 12, width: 12, height: 12 },
                itemMargin: { horizontal: 20, vertical: 5 }
            },
            tooltip: {
                theme: 'light',
                style: { fontSize: '13px' },
                y: { formatter: function (val) { return val + " Students" } }
            }
        };
        new ApexCharts(document.querySelector("#chart-app-status"), statusOptions).render();

        // 2. Bookings by Phase Bar
        const bookingOptions = {
            series: [{ name: 'Bookings', data: {!! json_encode($bookingPhaseData) !!} }],
            chart: { type: 'bar', height: 250, toolbar: { show: false }, fontFamily: 'Poppins, sans-serif' },
            colors: ['#BFDBFE', '#60A5FA', '#1E40AF'], // Pale Blue, Light Blue, Dark Blue
            plotOptions: { bar: { borderRadius: 8, columnWidth: '85%', distributed: true, dataLabels: { position: 'top' } } },
            dataLabels: { enabled: true, offsetY: -20, style: { fontSize: '12px', colors: ["#304758"] } },
            xaxis: { categories: ['Computer', 'Practical', 'JPJ'], axisBorder: { show: false }, axisTicks: { show: false }, labels: { show: true } },
            yaxis: { show: false },
            grid: { show: false },
            legend: { show: false }
        };
        new ApexCharts(document.querySelector("#chart-bookings-phase"), bookingOptions).render();

        // 3. Package Popularity Pie (iOS Style)
        const packageColors = {!! json_encode($packageLabels) !!}.map(label => {
            if (label.toLowerCase() === 'basic') return '#BFDBFE'; // Pale Blue
            if (label.toLowerCase() === 'premium') return '#60A5FA'; // Light Blue
            if (label.toLowerCase() === 'preferred') return '#1E40AF'; // Dark Blue
            return '#93C5FD'; // Blue Gray/Default
        });

        const packageData = {!! json_encode($packageData) !!};

        const packageOptions = {
            series: packageData,
            labels: {!! json_encode($packageLabels) !!},
            chart: { type: 'pie', height: 260, fontFamily: 'SF Pro Display, -apple-system, BlinkMacSystemFont, Segoe UI, sans-serif' },
            colors: packageColors,
            dataLabels: { enabled: false },
            legend: {
                position: 'bottom',
                fontSize: '12px',
                fontFamily: 'inherit',
                fontWeight: 500,
                markers: { radius: 12 },
                itemMargin: { horizontal: 10, vertical: 5 }
            },
            tooltip: {
                theme: 'light',
                style: { fontSize: '12px', fontFamily: 'inherit' },
                y: { formatter: function (val) { return val + " applications" } }
            }
        };
        new ApexCharts(document.querySelector("#chart-package-pop"), packageOptions).render();

        // 4. Revenue by Package Bar (iOS Style)
        const revenueColors = {!! json_encode($revenueLabels) !!}.map(label => {
            if (label.toLowerCase() === 'basic') return '#BFDBFE'; // Pale Blue
            if (label.toLowerCase() === 'premium') return '#60A5FA'; // Light Blue
            if (label.toLowerCase() === 'preferred') return '#1E40AF'; // Dark Blue
            return '#93C5FD'; // Blue Gray/Default
        });

        const revenueOptions = {
            series: [{ name: 'Revenue', data: {!! json_encode($revenueData) !!} }],
            chart: { type: 'bar', height: 260, toolbar: { show: false }, fontFamily: 'SF Pro Display, -apple-system, BlinkMacSystemFont, Segoe UI, sans-serif' },
            colors: revenueColors,
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    horizontal: true,
                    barHeight: '85%',
                    distributed: true // Apply colors to each bar individually
                }
            },
            states: {
                hover: { filter: { type: 'none' } },
                active: { filter: { type: 'none' } }
            },
            dataLabels: {
                enabled: true,
                textAnchor: 'middle', // Center the value
                style: {
                    colors: [function ({ seriesIndex, dataPointIndex, w }) {
                        // Assuming 'Basic' is the first category (index 0) or checking label
                        let label = w.config.xaxis.categories[dataPointIndex];
                        return (label && label.toLowerCase() === 'basic') ? '#000000' : '#ffffff';
                    }],
                    fontSize: '11px',
                    fontWeight: 600,
                    fontFamily: 'inherit'
                },
                formatter: function (val, opt) { return 'RM ' + val.toLocaleString() }
            },
            xaxis: {
                categories: {!! json_encode($revenueLabels) !!},
                labels: { show: false },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    style: { fontSize: '12px', fontWeight: 500, fontFamily: 'inherit', colors: ['#8E8E93'] }
                }
            },
            grid: { show: false, padding: { top: 0, right: 30, bottom: 0, left: 10 } },
            legend: { show: false }, // Hide legend as categories are on Y-axis
            tooltip: {
                theme: 'light',
                style: { fontSize: '12px' },
                y: { formatter: function (val) { return "RM " + val.toLocaleString() } }
            }
        };
        new ApexCharts(document.querySelector("#chart-revenue-package"), revenueOptions).render();

    </script>
</body>

</html>