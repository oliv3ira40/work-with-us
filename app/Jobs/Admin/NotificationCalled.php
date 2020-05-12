<?php

namespace App\Jobs\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin\Calleds\Called;

class NotificationCalled implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $called;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Called $called)
    {
        $this->called = $called;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd('...');
    }
}
