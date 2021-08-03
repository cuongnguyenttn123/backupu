<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $date=Carbon::now();
    DB::statement("UPDATE `image` SET  `image`.`boosttime` =`image`.`boosttime`-TIMESTAMPDIFF(SECOND,`image`.`boostdate`, '".$date."') where `image`.`booststate`='1'");
    DB::table('image')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);

    DB::statement("UPDATE `ujoinc` SET  `ujoinc`.`datetime` =  `ujoinc`.`datetime`-TIMESTAMPDIFF(SECOND,`ujoinc`.`exposure`, '".$date."') where `ujoinc`.`exposurestate`='1'");
    DB::table('ujoinc')->where('datetime',"<",0)->update(['exposurestate'=>0,'datetime'=>0]);

    DB::table('image')->where('booststate','>',0)->update(['boostdate'=>$date]);

    DB::table('ujoinc')->where('datetime','>',0)->update(['exposure'=>$date]);

    DB::statement("UPDATE `challenge` SET `state`='complete' WHERE TIMESTAMPDIFF(HOUR ,`start-time`, '".$date."')>`timeline`");

    $score_board_list = DB::select("SELECT id,vote_count,FIND_IN_SET( vote_count, (
                    SELECT GROUP_CONCAT( vote_count
                    ORDER BY vote_count DESC, `c-id` DESC ) 
                    FROM ujoinc where `c-id`='46')
                    ) AS rank
                    FROM ujoinc where `c-id`='46'");
    foreach ($score_board_list as $entry) {
        $array = json_decode(json_encode($entry), True);
        DB::statement("UPDATE ujoinc SET rank=".$array['rank']." WHERE id=".$array['id']);
        // execute $query ...
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
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
