<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        $this->job = $jobListing;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('tatatatatat : ' . $this->jobListing->title . 'translate to dododod');
    }
}