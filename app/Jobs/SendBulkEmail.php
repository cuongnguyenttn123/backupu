<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBulkEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         
                $headers = "From: urpixpays@gmail.com" . "\r\n";
                $to = 'asadragepote812@gmail.com';
                $subject = '$request->Subject';
                $txt = '$request->description';
                $headers = "From: urpixpays@gmail.com" . "\r\n";
                // $user=User::find($request->user_id);
                  mail($to,$subject,$txt,$headers);
                // $user = User::findOrFail($request->user_id);
    }
}
