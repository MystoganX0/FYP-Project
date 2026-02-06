<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Receipt - Molek Driving Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
                margin: 0;
                padding: 0;
            }

            .receipt-container {
                box-shadow: none !important;
                max-width: 100% !important;
                padding: 20px !important;
            }

            @page {
                margin: 1cm;
                size: A4 landscape;
            }

            /* Smaller fonts for print */
            table {
                font-size: 11px;
            }

            .receipt-container {
                font-size: 12px;
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .receipt-border {
            border: 2px solid #000;
        }

        /* Table column widths */
        table {
            table-layout: fixed;
            width: 100%;
        }

        table th:nth-child(1),
        table td:nth-child(1) {
            width: 10%;
        }

        /* Date */
        table th:nth-child(2),
        table td:nth-child(2) {
            width: 10%;
        }

        /* Our ref */
        table th:nth-child(3),
        table td:nth-child(3) {
            width: 30%;
        }

        /* Description */
        table th:nth-child(4),
        table td:nth-child(4) {
            width: 12%;
        }

        /* Amount */
        table th:nth-child(5),
        table td:nth-child(5) {
            width: 8%;
        }

        /* Cur */
        table th:nth-child(6),
        table td:nth-child(6) {
            width: 12%;
        }

        /* Rate */
        table th:nth-child(7),
        table td:nth-child(7) {
            width: 18%;
        }

        /* Amount MYR */

        /* Prevent text overflow */
        table td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
    </style>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-[29.7cm] mx-auto bg-white p-12 receipt-container shadow-lg min-h-[21cm]">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Official Receipt</h1>
        </div>

        <!-- Info Grid -->
        <div class="grid grid-cols-2 gap-8 mb-6">
            <!-- Left Column -->
            <div class="space-y-3">
                <div class="flex">
                    <span class="font-semibold w-24">Paid by</span>
                    <span class="flex-1">: {{ $paymentDetail->payment->application->student->full_name }}</span>
                </div>
                <div class="flex">
                    <span class="font-semibold w-24">Address</span>
                    <span class="flex-1">: {{ $paymentDetail->payment->application->student->address }}</span>
                </div>
                <div class="flex">
                    <span class="font-semibold w-24">Remark</span>
                    <span class="flex-1">: {{ $paymentDetail->stage }}</span>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-3">
                <div class="flex items-center">
                    <span class="font-semibold w-32">Receipt number</span>
                    <span class="flex-1">
                        <span class="border-2 border-black px-4 py-1 inline-block">
                            {{ str_pad($paymentDetail->detail_id, 8, '0', STR_PAD_LEFT) }}
                        </span>
                    </span>
                </div>
                <div class="flex">
                    <span class="font-semibold w-32">Ref no</span>
                    <span class="flex-1">:
                        {{ str_pad($paymentDetail->payment->application->app_id, 3, '0', STR_PAD_LEFT) }} /
                        {{ str_pad($paymentDetail->detail_id, 8, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="flex">
                    <span class="font-semibold w-32">Date</span>
                    <span class="flex-1">:
                        {{ \Carbon\Carbon::parse($paymentDetail->updated_at)->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="receipt-border mt-8">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="text-left p-2 font-semibold border-r border-black text-xs">Date</th>
                        <th class="text-left p-2 font-semibold border-r border-black text-xs">Our ref.</th>
                        <th class="text-left p-2 font-semibold border-r border-black text-xs">Description</th>
                        <th class="text-right p-2 font-semibold border-r border-black text-xs">Amount</th>
                        <th class="text-center p-2 font-semibold border-r border-black text-xs">Cur.</th>
                        <th class="text-right p-2 font-semibold border-r border-black text-xs">Rate</th>
                        <th class="text-right p-2 font-semibold text-xs">Amount MYR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border-r border-black align-top text-xs whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($paymentDetail->updated_at)->format('d/m/Y') }}
                        </td>
                        <td class="p-2 border-r border-black align-top text-xs whitespace-nowrap">
                            {{ str_pad($paymentDetail->detail_id, 8, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="p-2 border-r border-black align-top text-xs">{{ $paymentDetail->stage }}</td>
                        <td class="p-2 text-right border-r border-black align-top text-xs whitespace-nowrap">
                            {{ number_format($paymentDetail->amount, 2) }}
                        </td>
                        <td class="p-2 text-center border-r border-black align-top text-xs whitespace-nowrap">MYR</td>
                        <td class="p-2 text-right border-r border-black align-top text-xs whitespace-nowrap">1.000000
                        </td>
                        <td class="p-2 text-right align-top text-xs whitespace-nowrap">
                            {{ number_format($paymentDetail->amount, 2) }}</td>
                    </tr>
                    <!-- Empty rows for spacing -->
                    <tr style="height: 150px;">
                        <td class="border-r border-black"></td>
                        <td class="border-r border-black"></td>
                        <td class="border-r border-black"></td>
                        <td class="border-r border-black"></td>
                        <td class="border-r border-black"></td>
                        <td class="border-r border-black"></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="border-t-2 border-black">
                        <td colspan="5" class="p-3 font-semibold border-r border-black uppercase">
                            @php
                                $amount = $paymentDetail->amount;
                                $ringgit = floor($amount);
                                $cents = round(($amount - $ringgit) * 100);

                                $words = 'RINGGIT MALAYSIA ';
                                if ($ringgit > 0) {
                                    $words .= number_format($ringgit, 0);
                                }
                                if ($cents > 0) {
                                    $words .= ' AND ' . $cents . ' CENTS';
                                }
                                $words .= ' ONLY';
                            @endphp
                            {{ $words }}
                        </td>
                        <td class="p-3 text-right font-semibold border-r border-black">Total amount:</td>
                        <td class="p-3 text-right font-semibold">MYR {{ number_format($paymentDetail->amount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Course Details (Additional Info) -->
        <div class="mt-8 pt-6 border-t border-gray-300">
            <div class="text-sm text-gray-700">
                <p><span class="font-semibold">Course:</span>
                    {{ $paymentDetail->payment->application->class->class_code }} -
                    {{ $paymentDetail->payment->application->class->class_name }}
                </p>
                <p><span class="font-semibold">Package:</span>
                    {{ $paymentDetail->payment->application->package->package_type }}</p>
                <p><span class="font-semibold">Student Email:</span>
                    {{ $paymentDetail->payment->application->student->email }}</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 space-y-3 no-print">
            <button onclick="window.print()"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                    </path>
                </svg>
                Print Receipt
            </button>
            <a href="{{ route('history') }}"
                class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition-all duration-200 text-center">
                Back to History
            </a>
        </div>

    </div>

</body>

</html>