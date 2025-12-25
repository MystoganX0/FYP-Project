<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Application History | Molek Driving Academy</title>

    <!-- Tailwind -->
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
</head>

<body class="font-poppins bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    @include('header')

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex items-center justify-between gap-4 mb-8">
            <a href="{{ route('home') }}" class="group flex items-center outline-none">
                <div
                    class="inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-white border-2 border-blue-900 rounded-full group-hover:bg-blue-50 transition-colors duration-200 shadow-sm flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="w-5 h-5 md:w-6 md:h-6 text-blue-900" stroke="currentColor" stroke-width="2"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
            <h1 class="text-2xl md:text-3xl font-bold text-blue-900 text-center">History</h1>
            <div class="w-10 md:w-12 flex-shrink-0"></div>
        </div>

        @if($application)
            @php
                $isPaid = false;
                if ($application->payment) {
                    // Check if main payment is completed
                    if ($application->payment->status == 'completed' || $application->payment->status == 'paid') {
                        $isPaid = true;
                    } else {
                        // Check if Stage 1 or Full Payment is paid
                        $paidDetail = $application->payment->details->whereIn('stage', ['Stage 1', 'Full Payment'])
                            ->where('status', 'paid')
                            ->first();
                        if ($paidDetail) {
                            $isPaid = true;
                        }
                    }
                }

                // Generate Dynamic Class Date (1 week after application)
                $classDate = $application->created_at->copy()->addWeek();
            @endphp

            <!-- JPJ Test Status Card -->
            @if(isset($jpjTest) && $jpjTest)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 border border-gray-100 mt-8">
                    <!-- Header Status Banner -->
                    <div class="p-6 md:p-8 bg-green-50 border-b border-green-100">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="p-3 bg-green-100 text-green-600 rounded-full w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-green-800">
                                    License Completed!
                                </h2>
                                <p class="text-green-700 mt-1">
                                    Congratulations! You have passed the JPJ Test and officially acquired your driving license.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:divide-x divide-gray-100">
                        <!-- Left: Test Details -->
                        <div class="p-6 md:p-8 lg:col-span-1 space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-2">Student Details
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Student Name</label>
                                    <p class="font-medium text-gray-900">{{ $application->full_name }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">MyKad / IC</label>
                                    <p class="font-medium text-gray-900">{{ $application->ic }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">License Class</label>
                                    <p class="font-medium text-gray-900">
                                        {{ optional($application->class)->class_name ?? 'N/A' }}
                                        ({{ optional($application->class)->class_code ?? 'N/A' }})
                                    </p>
                                </div>
                            </div>


                            <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-2">Test Details
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Test Type</label>
                                    <p class="font-medium text-gray-900">{{ $jpjTest->phase_type }} (KPP03)</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Attempt Number</label>
                                    <p class="font-medium text-gray-900">{{ $jpjTest->attempt_no }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Date Test</label>
                                    <p class="font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($jpjTest->schedule->date)->format('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Result / Action -->
                        <div
                            class="p-6 md:p-8 lg:col-span-2 bg-gray-50/50 flex flex-col justify-center items-center text-center">
                            <div
                                class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-3xl font-extrabold text-gray-900 mb-2">LICENSE ACQUIRED</h3>
                            <p class="text-gray-600 mb-8 max-w-md">
                                You have successfully passed the test. Your digital license will be available in the next week.
                            </p>
                            <div
                                class="px-6 py-3 bg-blue-50 border border-blue-100 rounded-lg text-blue-700 text-sm font-medium animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2 -mt-0.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Digital License Availability: Next Week
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Practical Training Status Card -->
            @if(isset($practicalBookings) && $practicalBookings->count() >= 5)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 border border-gray-100 mt-8">
                    <!-- Header Status Banner -->
                    <div class="p-6 md:p-8 bg-green-50 border-b border-green-100">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="p-3 bg-green-100 text-green-600 rounded-full w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-green-800">
                                    Practical Training Completed!
                                </h2>
                                <p class="text-green-700 mt-1">
                                    Congratulations! You have successfully completed all required practical training sessions.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:divide-x divide-gray-100">
                        <!-- Left: Course Details -->
                        <div class="p-6 md:p-8 lg:col-span-1 space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-2">Training Details
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Training Type</label>
                                    <p class="font-medium text-gray-900">Practical Training (KPP02)</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Sessions Completed</label>
                                    <p class="font-medium text-gray-900">{{ $practicalBookings->count() }} / 5</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Location</label>
                                    <p class="font-medium text-gray-900">Molek Driving Academy Circuit</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Session History -->
                        <div class="p-6 md:p-8 lg:col-span-2 bg-gray-50/50">
                            <div
                                class="mb-8 flex flex-col justify-center items-center text-center pb-6 border-b border-gray-100">
                                <h3 class="text-3xl font-extrabold text-black mb-2">COMPLETED</h3>
                                <p class="text-gray-600 mb-6 max-w-md text-base">
                                    You have fulfilled the practical training requirements. You are now ready for the JPJ Test.
                                </p>
                                @if(Route::has('jpj'))
                                    <a href="{{ route('jpj') }}"
                                        class="inline-flex items-center justify-center gap-2 px-8 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 transition shadow-lg shadow-green-600/30 transform hover:-translate-y-1">
                                        Proceed to JPJ Booking
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-4 mb-4">Completed
                                Sessions History</h3>

                            <div class="space-y-3">
                                @foreach($practicalBookings as $index => $booking)
                                    <div
                                        class="bg-white border border-gray-100 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-sm hover:border-green-200 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-8 h-8 rounded-full bg-green-50 text-green-600 flex items-center justify-center font-bold text-sm shrink-0">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900">
                                                    {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d F Y') }}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    {{ $booking->schedule->day }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-6 text-sm">
                                            <div>
                                                <p class="text-gray-400 text-xs uppercase font-semibold">Time</p>
                                                <p class="font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('h:i A') }} -
                                                    {{ \Carbon\Carbon::parse($booking->schedule->time_out)->format('h:i A') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Done
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Computer Test Status Card -->
            @if(isset($computerTest) && $computerTest)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 border border-gray-100 mt-8">
                    <!-- Header Status Banner -->
                    <div class="p-6 md:p-8 bg-green-50 border-b border-green-100">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="p-3 bg-green-100 text-green-600 rounded-full w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-green-800">
                                    Computer Test Passed!
                                </h2>
                                <p class="text-green-700 mt-1">
                                    Congratulations! You have successfully passed the Computer Theory Test.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:divide-x divide-gray-100">
                        <!-- Left: Test Details -->
                        <div class="p-6 md:p-8 lg:col-span-1 space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-2">Test Details
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Test Type</label>
                                    <p class="font-medium text-gray-900">{{ $computerTest->phase_type }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Attempt Number</label>
                                    <p class="font-medium text-gray-900">{{ $computerTest->attempt_no }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Date</label>
                                    <p class="font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($computerTest->schedule->date)->format('d F Y') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Time</label>
                                    <p class="font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($computerTest->schedule->start_time)->format('h:i A') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Venue</label>
                                    <p class="font-medium text-gray-900">Molek Driving Academy Computer Lab</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Result / Action -->
                        <div
                            class="p-6 md:p-8 lg:col-span-2 bg-gray-50/50 flex flex-col justify-center items-center text-center">
                            <div
                                class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-3xl font-extrabold text-gray-900 mb-2">PASSED</h3>
                            <p class="text-gray-600 mb-8 max-w-md">
                                You have successfully completed this phase. You are now eligible to proceed to the next
                                stage of your driving course.
                            </p>
                            @if(Route::has('practical'))
                                <a href="{{ route('practical') }}"
                                    class="inline-flex items-center justify-center gap-2 px-8 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 transition shadow-lg shadow-green-600/30 transform hover:-translate-y-1">
                                    Proceed to Practical Training
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Application Status Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 border border-gray-100">
                <!-- Header Status Banner -->
                <div
                    class="p-6 md:p-8 {{ $isPaid ? 'bg-green-50 border-b border-green-100' : 'bg-yellow-50 border-b border-yellow-100' }}">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div
                            class="p-3 {{ $isPaid ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }} rounded-full w-fit">
                            @if($isPaid)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold {{ $isPaid ? 'text-green-800' : 'text-yellow-800' }}">
                                {{ $isPaid ? 'Application Successful!' : 'Application Pending' }}
                            </h2>
                            <p class="{{ $isPaid ? 'text-green-700' : 'text-yellow-700' }} mt-1">
                                {{ $isPaid ? 'Congratulations! Your application has been approved and processed successfully.' : 'Your application is currently being processed. Please complete your payment if you haven\'t.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:divide-x divide-gray-100">

                    <!-- Left: Application Details -->
                    <div class="p-6 md:p-8 lg:col-span-1 space-y-6">
                        <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider border-b pb-2">Application
                            Details</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-semibold text-gray-500 uppercase">Applicant Name</label>
                                <p class="font-medium text-gray-900">{{ $application->full_name }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 uppercase">MyKad / IC</label>
                                <p class="font-medium text-gray-900">{{ $application->ic }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 uppercase">Applied Date</label>
                                <p class="font-medium text-gray-900">{{ $application->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">License Class</label>
                                    <p class="font-semibold text-blue-900">
                                        {{ optional($application->class)->class_name ?? 'N/A' }}
                                    </p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-500 uppercase">Package</label>
                                    <p class="font-semibold text-blue-900">
                                        {{ optional($application->package)->package_type ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Schedule / Action -->
                    <div class="p-6 md:p-8 lg:col-span-2 bg-gray-50/50">
                        @if($isPaid)
                            <!-- Theory Class Schedule Card -->
                            <div
                                class="bg-white border border-blue-100 rounded-xl shadow-sm p-6 relative overflow-hidden group hover:border-blue-300 transition-all duration-300">
                                <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>

                                <div class="relative z-10">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div class="p-2 bg-blue-600 rounded-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900">Theory License Class (KPP01)</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                                        <!-- Date -->
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 font-medium">Date & Day</p>
                                                <p class="text-lg font-bold text-gray-900">{{ $classDate->format('d F Y') }}</p>
                                                <p class="text-sm font-medium text-blue-600">{{ $classDate->format('l') }}</p>
                                            </div>
                                        </div>

                                        <!-- Time -->
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 font-medium">Time</p>
                                                <p class="text-lg font-bold text-gray-900">09:00 AM - 04:00 PM</p>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 font-medium">Location</p>
                                                <p class="text-base font-bold text-gray-900">Molek Driving Academy HQ</p>
                                                <p class="text-sm text-gray-500">Main Lecture Hall, Level 2</p>
                                            </div>
                                        </div>

                                        <!-- Notes -->
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 font-medium">Important Note</p>
                                                <p class="text-sm text-gray-700">Please bring your original MyKad and dress
                                                    smartly (Collared shirt/t-shirt, long pants, covered shoes).</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="h-full flex flex-col items-center justify-center text-center p-6 bg-yellow-50 rounded-xl border border-yellow-100 border-dashed">
                                <div
                                    class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-500 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Pending Action</h3>
                                <p class="text-gray-600 mb-6 max-w-sm">Your application is still pending payment. Please
                                    complete the payment to view your schedule.</p>
                                <a href="{{ route('payment') }}"
                                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
                                    Go to Payment
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @else
            <!-- No Application Found State -->
            <div
                class="flex flex-col items-center justify-center py-20 bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="bg-blue-50 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">No Application Found</h2>
                <p class="text-gray-500 mb-6">You haven't submitted any driving license application yet.</p>
                <a href="{{ route('class') }}"
                    class="px-6 py-2 bg-blue-900 text-white font-medium rounded-lg hover:bg-blue-800 transition shadow-lg shadow-blue-900/20">
                    Apply Now
                </a>
            </div>
        @endif

    </main>

    @include('footer')

</body>

</html>