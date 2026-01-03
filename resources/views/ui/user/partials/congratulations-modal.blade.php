@if(Auth::check())
    @php
        // Check if user has a completed application that hasn't shown congratulations yet
        $completedApplication = \App\Models\Application::where('student_id', Auth::id())
            ->where('app_status', 'Completed')
            ->where('congratulations_shown', false)
            ->with('class')
            ->first();
        
        $shouldShowCongratulations = $completedApplication !== null;
        
        // Debug: Log to Laravel log
        \Log::info('Congratulations Modal Check', [
            'user_id' => Auth::id(),
            'has_completed_app' => $completedApplication ? 'yes' : 'no',
            'should_show' => $shouldShowCongratulations ? 'yes' : 'no',
            'app_id' => $completedApplication ? $completedApplication->app_id : 'N/A'
        ]);
        
        // Mark as shown immediately to prevent showing again
        if ($shouldShowCongratulations) {
            $completedApplication->update(['congratulations_shown' => true]);
            \Log::info('Congratulations flag set to true for app_id: ' . $completedApplication->app_id);
        }
    @endphp

    @if($shouldShowCongratulations)
        <!-- Congratulations Modal -->
        <div x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 100)"
             x-show="show"
             x-cloak
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
            
            <div @click.away="show = false"
                 x-transition:enter="transition ease-out duration-600 delay-100"
                 x-transition:enter-start="opacity-0 transform scale-90 -translate-y-4"
                 x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="relative bg-gradient-to-br from-green-50 via-white to-blue-50 rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden">
                
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-green-400 opacity-10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-64 h-64 bg-blue-400 opacity-10 rounded-full blur-3xl"></div>
                
                <!-- Confetti Animation -->
                <div class="absolute inset-0 pointer-events-none overflow-hidden">
                    <div class="confetti-piece" style="left: 10%; animation-delay: 0s;"></div>
                    <div class="confetti-piece" style="left: 20%; animation-delay: 0.2s;"></div>
                    <div class="confetti-piece" style="left: 30%; animation-delay: 0.4s;"></div>
                    <div class="confetti-piece" style="left: 40%; animation-delay: 0.6s;"></div>
                    <div class="confetti-piece" style="left: 50%; animation-delay: 0.8s;"></div>
                    <div class="confetti-piece" style="left: 60%; animation-delay: 1s;"></div>
                    <div class="confetti-piece" style="left: 70%; animation-delay: 1.2s;"></div>
                    <div class="confetti-piece" style="left: 80%; animation-delay: 1.4s;"></div>
                    <div class="confetti-piece" style="left: 90%; animation-delay: 1.6s;"></div>
                </div>

                <div class="relative p-8 md:p-12">
                    <!-- Close Button -->
                    <button @click="show = false" type="button"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <!-- Success Icon with Animation -->
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg animate-bounce-slow">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <!-- Pulse Ring -->
                            <div class="absolute inset-0 w-24 h-24 bg-green-400 rounded-full animate-ping opacity-20"></div>
                        </div>
                    </div>

                    <!-- Title -->
                    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-900 mb-3">
                        Congratulations!
                    </h2>

                    <!-- Subtitle -->
                    <p class="text-center text-lg text-gray-600 mb-8">
                        You have successfully completed all license requirements!
                    </p>

                    <!-- License Info Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-green-200 mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-green-100 rounded-xl">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">License Acquired</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $completedApplication->class->class_name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Class</p>
                                <p class="text-3xl font-black text-green-600">{{ $completedApplication->class->class_code ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex items-center justify-center gap-2 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">All phases completed successfully</span>
                            </div>
                        </div>
                    </div>

                    <!-- Achievement Stats -->
                    <!-- <div class="grid grid-cols-3 gap-4 mb-8">
                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                            <div class="text-3xl font-black text-blue-600 mb-1">✓</div>
                            <p class="text-xs font-semibold text-blue-900">Computer Test</p>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                            <div class="text-3xl font-black text-purple-600 mb-1">✓</div>
                            <p class="text-xs font-semibold text-purple-900">Practical Training</p>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                            <div class="text-3xl font-black text-green-600 mb-1">✓</div>
                            <p class="text-xs font-semibold text-green-900">JPJ Test</p>
                        </div>
                    </div> -->

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('history') }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-xl hover:from-green-700 hover:to-green-800 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            View Certificate
                        </a>
                        <a href="{{ route('apply') }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 bg-white border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all shadow hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Apply New License
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            [x-cloak] {
                display: none !important;
            }

            @keyframes bounce-slow {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-10px);
                }
            }

            .animate-bounce-slow {
                animation: bounce-slow 2s infinite;
            }

            @keyframes confetti-fall {
                0% {
                    transform: translateY(-100%) rotate(0deg);
                    opacity: 1;
                }
                100% {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }

            .confetti-piece {
                position: absolute;
                width: 10px;
                height: 10px;
                background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f7b731);
                animation: confetti-fall 3s linear infinite;
                top: -10%;
            }

            .confetti-piece:nth-child(2n) {
                background: linear-gradient(45deg, #a8e6cf, #ffd3b6, #ffaaa5, #ff8b94);
            }

            .confetti-piece:nth-child(3n) {
                width: 8px;
                height: 8px;
            }

            .confetti-piece:nth-child(4n) {
                width: 12px;
                height: 12px;
            }
        </style>
    @endif
@endif