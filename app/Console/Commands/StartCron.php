<?php

namespace App\Console\Commands;
//namespace App\Http\Controllers;

use Illuminate\Console\Command;

use App\Mail\InviteEmail;
use function foo\func;
use Mail;
use App\Mail\TestEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use DateTime;
use Carbon\Carbon;
use App\File;
use Illuminate\Http\Request;
use Request as rqest;
use Image;
use Illuminate\Support\Facades\File as LaraFile;
class StartCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:testcron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $path = base_path();
	$schedule->call(function() use($path) {
		if (file_exists($path . '/queue.pid')) {
			$pid = file_get_contents($path . '/queue.pid');
			$result = exec("ps -p $pid --no-heading | awk '{print $1}'");
			$run = $result == '' ? true : false;
		} else {
			$run = true;
		}
		if($run) {
			$command = '/usr/bin/php -c ' . $path .'/php.ini ' . $path . '/artisan queue:listen --tries=3 > /dev/null & echo $!';
			$number = exec($command);
			file_put_contents($path . '/queue.pid', $number);
		}
	})->name('monitor_queue_listener')->everyFiveMinutes();
    }
}
