<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Application;
use App\Models\Booking;

class UpdateApplicationStages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-stages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update application current_stage based on existing booking progress';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $applications = Application::all();
        $bar = $this->output->createProgressBar($applications->count());

        $this->info("Starting update for {$applications->count()} applications...");

        foreach ($applications as $app) {
            $updated = false;
            $newStage = null;

            // Check Phase 3: JPJ Test (Highest Priority)
            $jpjPass = Booking::where('student_id', $app->student_id)
                ->whereHas('schedule', function ($q) {
                    $q->where('phase_id', 3);
                })
                ->whereHas('attempt', function ($q) {
                    $q->where('result', 'Pass');
                })
                ->exists();

            if ($jpjPass) {
                $newStage = 'License Acquired';
            } else {
                // Check Phase 2: Practical Training
                $completedPracticals = Booking::where('student_id', $app->student_id)
                    ->whereHas('schedule', function ($q) {
                        $q->where('phase_id', 2);
                    })
                    ->where('booking_status', 'Completed')
                    ->count();

                if ($completedPracticals >= 5) {
                    $newStage = 'JPJ Test Slot';
                } else {
                    // Check Phase 1: Computer Theory
                    $theoryPass = Booking::where('student_id', $app->student_id)
                        ->whereHas('schedule', function ($q) {
                            $q->where('phase_id', 1);
                        })
                        ->whereHas('attempt', function ($q) {
                            $q->where('result', 'Pass');
                        })
                        ->exists();

                    if ($theoryPass) {
                        $newStage = 'Practical Slot';
                    }
                }
            }

            if ($newStage && $app->current_stage !== $newStage) {
                $app->update(['current_stage' => $newStage]);
                $updated = true;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Application stages updated successfully.');
    }
}
