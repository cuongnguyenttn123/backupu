<?php

namespace App\Http\Controllers;
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
class CronJobController extends Controller
{
    public function startcron()
    {
        $date=Carbon::now();
        DB::statement("UPDATE `image` SET  `image`.`boosttime` =`image`.`boosttime`-TIMESTAMPDIFF(SECOND,`image`.`boostdate`, '".$date."') where `image`.`booststate`='1'");
        DB::table('image')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);

        DB::statement("UPDATE `social_posts` SET  `social_posts`.`boosttime` =`social_posts`.`boosttime`-TIMESTAMPDIFF(SECOND,`image`.`boostdate`, '".$date."') where `social_posts`.`booststate`='1'");
        DB::table('social_posts')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);

        DB::statement("UPDATE `ujoinc` SET  `ujoinc`.`datetime` =  `ujoinc`.`datetime`-TIMESTAMPDIFF(SECOND,`ujoinc`.`exposure`, '".$date."') where `ujoinc`.`exposurestate`='1'");

        DB::statement("UPDATE `ujoinc` SET  `ujoinc`.`wanddatetime` =  `ujoinc`.`wanddatetime`-TIMESTAMPDIFF(SECOND,`ujoinc`.`wandexposure`, '".$date."') where `ujoinc`.`wandexposurestate`='1'");

        DB::table('ujoinc')->where('datetime',"<",0)->update(['exposurestate'=>0,'datetime'=>0]);

        DB::table('ujoinc')->where('datetime',"<",0)->update(['wandexposurestate'=>0,'datetime'=>0]);

        DB::table('image')->where('booststate','>',0)->update(['boostdate'=>$date]);

        DB::table('ujoinc')->where('datetime','>',0)->update(['exposure'=>$date]);

        DB::table('ujoinc')->where('datetime','>',0)->update(['wandexposure'=>$date]);

        DB::statement("UPDATE `challenge` SET `state`='completed' WHERE TIMESTAMPDIFF(SECOND ,`start-time`, '".$date."')>`timeline1` AND state='start'");

        DB::table('image')->where('url',Null)->delete();

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

        $uid=DB::table('userpix')->pluck('u-id');
        for($i=0;$i<count($uid);$i++)
        {
            if($uid[$i]<>0){
            $points=DB::table('userpix')->where('u-id',$uid[$i])->pluck('Points')[0];
            DB::table('userpix')->where('u-id',$uid[$i])->update(['pixpoint'=>intdiv($points, 50)]);
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

   //--------------add_challenge-------------------//
        $completed_cid=DB::table('challenge')->where('state','completed')->pluck('id');

        if(count($completed_cid)>0){

        $completed_prize=DB::table('challenge')->where('state','completed')->pluck('prize');
        $completed_price=DB::table('challenge')->where('state','completed')->pluck('price');
        for ($i=0;$i<count($completed_cid);$i++)
        {
            $prize = explode(',',$completed_prize[$i]);
            $price=floatval(ltrim($completed_price[$i], "$"));
            $userpix_id=DB::table('ujoinc')->where([['c-id',$completed_cid[$i]],['rank','1'],])->pluck('u-id');
            $pic=DB::table('challenge')->where('id',$completed_cid[$i])->pluck('photocount')[0];
                // $uid=$_COOKIE['id'];
                // $inserarr=[
                //     'u_id'=>$uid,
                //     'increase_wallet'=>$price,
                //     'c_id'=>$completed_cid[$i],
                //     'rank'=>1,
                //     'pic_count'=>$pic,
                //     'flip'=>0,
                //     'wand'=>0,
                //     'charge'=>0
                // ];

                // DB::table('winner')->insert($inserarr);
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
                    // DB::table('userpix')
                    //     ->where('u-id', $userpix_id[$ii])
                    //     ->update([
                    //         'Flip' => $Flip,
                    //         'Charge' => $Charge,
                    //         'Wand'=>$Wand,
                    //         'walet'=>$walet
                    // ]);
                    DB::table('challenge')
                         ->where('state', 'completed')
                         ->update([
                         'state' => 'ended'
                    ]);

                }

            }
        }


        $images=DB::table('image')->get();
        foreach($images as $row){
            $img0=DB::table('image')->where('id',$row->id)->pluck('imgname')[0];
            $img=DB::table('image')->where([['id','<>',$row->id],['imgname',$img0]])->delete();
        }
//--------------add_challenge_end-------------------//
        // $ujoincs=DB::table('ujoinc')->get();
        // $ujoinc=json_decode(json_encode($ujoincs), true);
        // for ($j=0;$j<count($ujoinc);$j++){
        //     $uid=$ujoinc[$j]['u-id'];$cid=$ujoinc[$j]['c-id'];
        //     $image=DB::table('image')->where([['u-id',$uid],['c-id',$cid]])->pluck('vote');$v=0;
        //     for($i=0;$i<count($image);$i++){
        //         $v=$v+$image[$i];
        //     }
        //     DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])->update([
        //         'vote_count'=>$v
        //         ]);
        // }
   }
}
