<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $date=Carbon::now();
            DB::statement("UPDATE `image` SET  `image`.`boosttime` =`image`.`boosttime`-TIMESTAMPDIFF(SECOND,`image`.`boostdate`, '".$date."') where `image`.`booststate`='1'");
            DB::table('image')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);

            DB::statement("UPDATE `social_posts` SET  `social_posts`.`boosttime` =`social_posts`.`boosttime`-TIMESTAMPDIFF(SECOND,`image`.`boostdate`, '".$date."') where `social_posts`.`booststate`='1'");
            DB::table('social_posts')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);

            DB::statement("UPDATE `ujoinc` SET  `ujoinc`.`datetime` =  `ujoinc`.`datetime`-TIMESTAMPDIFF(SECOND,`ujoinc`.`exposure`, '".$date."') where `ujoinc`.`exposurestate`='1'");
            DB::table('ujoinc')->where('datetime',"<",0)->update(['exposurestate'=>0,'datetime'=>0]);

            DB::table('image')->where('booststate','>',0)->update(['boostdate'=>$date]);

            DB::table('ujoinc')->where('datetime','>',0)->update(['exposure'=>$date]);

            DB::statement("UPDATE `challenge` SET `state`='completed' WHERE TIMESTAMPDIFF(HOUR ,`start-time`, '".$date."')>`timeline`");
            $c_ids=DB::table('challenge')->pluck('id');
            for ($i=0;$i<count($c_ids);$i++) {
                $score_board_list = DB::select("SELECT id,vote_count,FIND_IN_SET( vote_count, (
                    SELECT GROUP_CONCAT( vote_count
                    ORDER BY vote_count DESC, `c-id` DESC )
                    FROM ujoinc WHERE `c-id`=".$c_ids[$i].")
                    ) AS rank
                    FROM ujoinc WHERE `c-id`=".$c_ids[$i]);
                foreach ($score_board_list as $entry) {
                    $array = json_decode(json_encode($entry), True);
                    DB::statement("UPDATE ujoinc SET rank=" . $array['rank'] . " WHERE id=" . $array['id']);
                    // execute $query ...
                }
            }
            DB::table('userpix')->where('Points','<',1000)->update(['rank'=>'1']);
            DB::table('userpix')->where('Points','>',1000)->update(['rank'=>'2']);
            DB::table('userpix')->where('Points','>',2000)->update(['rank'=>'3']);
            DB::table('userpix')->where('Points','>',4000)->update(['rank'=>'4']);
            DB::table('userpix')->where('Points','>',9000)->update(['rank'=>'5']);
            DB::table('userpix')->where('Points','>',15000)->update(['rank'=>'6']);
            DB::table('userpix')->where('Points','>',25000)->update(['rank'=>'7']);
            DB::table('userpix')->where('Points','>',50000)->update(['rank'=>'8']);
            DB::table('userpix')->where('Points','>',1250000)->update(['rank'=>'9']);


            //---------------add---------------//
       $completed_cid=DB::table('challenge')->where('state','completed')->pluck('id');
        $completed_prize=DB::table('challenge')->where('state','completed')->pluck('prize');
        $completed_price=DB::table('challenge')->where('state','completed')->pluck('price');

        for ($i=0;$i<count($completed_cid);$i++)
        {
             $prize = explode(',',$completed_prize[$i]);
            $price=floatval(rtrim($completed_price[$i], "$"));
            $userpix_id=DB::table('ujoinc')->where([['c-id',$completed_cid[$i]],['rank','1'],])->pluck('u-id');

            for($ii=0;$ii<count($userpix_id);$ii++){
                    $userpix=DB::table('userpix')->where('u-id',$userpix_id[$ii])->get();
                    foreach($userpix as $userpixs)
                    {
                         $Flip0=$userpixs->Flip;
                         $Charge0=$userpixs->Charge;
                         $Wand0=$userpixs->Wand;
                         $walet0=$userpixs->walet;
                    }
                    $Flip=0;$Charge=0;$wand=0;$walet=0;
                    $Flip=$Flip0+$prize[0];
                    $Charge=$Charge0+$prize[1];
                    $Wand=$Wand0+$prize[2];
                    $walet=$walet0+$price;

                    DB::table('userpix')
                        ->where('u-id', $userpix_id[$ii])
                        ->update([
                            'Flip' => $Flip,
                            'Charge' => $Charge,
                            'Wand'=>$Wand,
                            'walet'=>$walet
                        ]);


                      DB::table('challenge')
                        ->where('state', 'completed')
                        ->update([
                            'state' => 'ended'
                        ]);

                }

            }
            //---------------------------------//


        })->everyminute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
