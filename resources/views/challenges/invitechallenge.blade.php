
@include ('Modal/send_message_dlg')

<html>
<head>
    @include('Layout/head')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<header>
    @include('Layout.smenu')
    <style>
.p-invite-landing__cover__image--mobile:before {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    height: 100%;
    content: '';
    background-color: rgba(0,0,0,0.2);
}
*, *:before, *:after {
    outline: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
@media screen and (max-width: 1000px)
.p-invite-landing__cover {
    height: 100vh;
}
@media screen and (max-width: 1000px)
.p-invite-landing__cover__image {
    display: none;
}
@media screen and (max-width: 1000px)
.p-invite-landing__cover__image--mobile {
    display: block;
}
@media screen and (max-width: 961px)
.p-invite-landing__cover__image--mobile {
    top: 0;
    height: calc(100vh - 44px);
}
.p-invite-landing__cover__image--mobile {
    position: fixed;
    top: 67px;
    left: 0;
    display: none;
    width: 100%;
    height: calc(100vh - 67px);
    padding: 20px;
    background-image: url(https://gurushots.com/assets/images/pages/inviteLanding/coverMobile.jpg);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    background-size: cover;
    will-change: transform;
}
@media screen and (max-width: 1000px)
.p-invite-landing__cover__avatar {
    width: 60px;
    height: 60px;
    border-width: 2px;
}
@media screen and (max-width: 1000px)
.p-invite-landing__cover__title {
    font-size: 16px;
}

@media screen and (max-width: 1000px)
.p-invite-landing__cover .p-invite-landing__cover__text {
    display: block;
}

@media screen and (max-width: 1000px)
.p-invite-landing__cover__btn {
    font-size: 20px;
}

@media screen and (max-width: 1000px)
.p-invite-landing__cover .p-invite-landing__cover__text {
    display: block;
}

@media screen and (max-width: 1000px)
.p-invite-landing__cover__btn {
    font-size: 20px;
}
#page {
    position: relative;
    min-height: 90vh;
    margin: 0 auto;
    background-color: #fff;
}
.p-invite-landing__cover__image {
    position: fixed;
    /*top: 67px;*/
    top: 125px;
    left: 0;
    width: 100%;
    height: 460px;
    padding: 20px;
    /* background-repeat: no-repeat; */
    background-position: 50% 32%;
    background-size: cover;
    /* will-change: transform; */
}
invite-landing-page {
    display: block;
    background-color: #f1f1f1;
}
.p-invite-landing__cover {
    position: relative;
    overflow: hidden;
    width: 100%;
    /*height: 460px;*/
    height:358px;
    text-align: center;
    background-color: #f1f1f1;
}

.p-invite-landing__cover__avatar {
    position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto ;
    border: 4px solid #fff;
    border-radius: 50%;
    background-color: #ccc;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    background-size: cover;
}
.p-invite-landing__cover__title {
    position: relative;
    margin-top: 5px;
    text-align: center;
    color: #fff;
    text-shadow: 0 2px 8px rgba(0,0,0,0.33);
    font-size: 50px;
    font-weight: 600;
    line-height: 1.1;
}
.p-invite-landing__cover__text {
    position: relative;
    display: none;
    max-width: 320px;
    margin: 0 auto 10px;
    margin-top: 25px;
    letter-spacing: -.7px;
    opacity: .9;
    color: #fff;
    border-radius: 7px;
    text-shadow: 0 0 20px #000;
    font-size: 16px;
}
.gs-btn--blue, .gs-btn--red, .gs-btn--grey, .gs-btn--instagram {
    display: inline-block;
    min-width: 90px;
    margin: 0;
    padding: 10px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-transition: .1s ease-in-out;
    -o-transition: .1s ease-in-out;
    transition: .1s ease-in-out;
    text-align: center;
    vertical-align: middle;
    text-decoration: none;
    color: #fff;
    border: none;
    border-radius: 5px;
    background-color: #218ccc;
    font-size: 14px;
    font-weight: 600;
    line-height: 1;
}
.p-invite-landing__cover__btn {
    position: relative;
    margin: 40px auto 0;
    padding: 11px 20px;
    -webkit-box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2), 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.12);
    box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2), 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.12);
    font-size: 23px;
    font-weight: 600;
}
.p-invite-landing-page__view {
    position: relative;
    width: 100%;
    min-height: 40vh;
    background-color: #f1f1f1;
}
.p-invite-landing-page__view__banner {
    min-height: 100px;
    padding: 55px 0;
    text-align: center;
    color: #fff;
    background-color: #333;
    font-size: 0;
}
.p-invite-landing-page__view__banner__item--left {
    width: 440px;
    padding: 0 32px;
    text-align: left;
    display: inline-block;
    min-height: 100px;
    vertical-align: middle;
}
.p-invite-landing-page__view__banner__item__title {
    min-height: 110px;
    font-size: 24px;
    font-weight: 600;
    line-height: 1.1;
    
    
    
}
.p-invite-landing-page__view__banner__item__tools {
    min-height: 132px;
    text-align: center;
    font-size: 0;
}

.p-invite-landing-page__view__banner__item__tools__tool {
    display: inline-block;
}

.p-invite-landing-page__view__banner__item__tools__tool .responsive-sprites {
    width: 65px;
}

.responsive-sprites {
    height: auto;
    overflow: hidden;
}
.responsive-sprites>img {
    display: block;
}

img.sprite-game-banner-vote {
    width: 202.38095%;
    margin-top: -102.38095%;
    margin-bottom: 0%;
    margin-left: -102.38095%;
}
img.sprite-game-banner-vote {
    width: 202.38095%;
    margin-top: -102.38095%;
    margin-bottom: 0%;
    margin-left: -102.38095%;
}
.responsive-sprites>img {
    display: block;
}
img.sprite-game-banner-ranking {
    width: 202.38095%;
    margin-top: 0%;
    margin-bottom: -102.38095%;
    margin-left: -102.38095%;
}
img.sprite-game-banner-swap {
    width: 202.38095%;
    margin-top: -102.38095%;
    margin-bottom: 0%;
    margin-left: 0%;
}
img.sprite-game-banner-boost {
    width: 202.38095%;
    margin-top: 0%;
    margin-bottom: -102.38095%;
    margin-left: 0%;
}
.p-invite-landing-page__view__banner__item__tools__tool+.p-invite-landing-page__view__banner__item__tools__tool {
    margin-left: 80px;
}
.p-invite-landing-page__view__banner__item__tools__tool__text {
    margin-top: 5px;
    font-size: 18px;
    line-height: 1;
}

.p-invite-landing-page__view__banner__item__tools__tool__text span {
    display: block;
    font-weight: 600;
}


.p-invite-landing-page__view__banner__item--left{
    
}
.p-invite-landing-page__view__banner__item__title__label {
    margin-bottom: 20px;
    color: #fff;
    font-size: 30px;
    font-weight: 300;
}
.p-invite-landing-page__view__banner__item__desc {
    margin-top: 10px;
    font-size: 18px;
    font-weight: 300;
    line-height: 1.3;
}



.p-invite-landing-page__view__banner__item__number {
    margin-top: 15px;
    font-size: 36px;
    font-weight: 300;
    line-height: 1;
}

.p-invite-landing-page__view__banner__item__number span {
    color: #218ccc;
    font-size: 40px;
    font-weight: 600;
}


.p-invite-landing-page__view__banner__item--right {
    width: calc(100% - 440px);
    padding: 0 25px;
    text-align: center;
    border-left: 1px solid #ccc;
    display: inline-block;
    min-height: 100px;
    vertical-align: middle;
}
.p-invite-landing-page__view__banner__item--right {
    
}

.p-invite-landing-page__view__banner__wrap {
    max-width: 1600px;
    margin: 0 auto;
    font-size: 0;
}
.p-invite-landing-page__view__challenges {
    width: 100%;
    max-width: 1700px;
    margin: 0 auto;
    padding: 0 2.5%;
}


</style>
</header>
<div id="page" ui-view="page" autoscroll="false" class="" style=""><invite-landing-page><!-- loader -->
<!---->
<!-- cover -->
<!----><div class="p-invite-landing__cover" ng-if="!$ctrl.busy" style="">
    <div class="p-invite-landing__cover__image" bg-image="$ctrl.bgImage.url" style="background-image:url('https://photos.gurushots.com/unsafe/0x0/61f1a195dc421d20ef4ae7798ac2624c/8e3ddeaff994b4d784e25f1020987a59.jpg');">
        <div class="p-invite__cover__image__by" ui-sref="gs.profile({cUserName:$ctrl.bgImage.user_name})" ng-bind="'@'+$ctrl.bgImage.user_name" href="/JaredHersch">@JaredHersch</div>
    </div>
    <div class="p-invite-landing__cover__image--mobile"></div>
    <i class="icon-gurushots-full-logo"></i>

    <div class="p-invite-landing__cover__avatar" bg-image="$ctrl.page.member.avatar" style="background-image:url('https://photos.gurushots.com/unsafe/500x500/9df93beb4e62d747d2d55fc7c006c21c/3_6be8ee05a5509eff4033a8a0037b0e6c.jpg')"></div>
    <div class="p-invite-landing__cover__title">
        <span ng-bind="$ctrl.page.member.name">jasobhani</span> thinks you've<br>got what it takes!
    </div>
    <div class="p-invite-landing__cover__text">
        THE WORLD'S GREATEST
        <span>PHOTOGRAPHY GAME</span>
    </div>

    <div class="p-invite-landing__cover__btn gs-btn--blue" open-modal="login" modal-data="{&quot;signUp&quot;: true}">JOIN THE GAME</div>
</div><!---->
<!-- challenges -->
<!----><div class="p-invite-landing-page__view" ng-if="!$ctrl.busy" style="">
    <div class="p-invite-landing-page__view__banner">
        <div class="p-invite-landing-page__view__banner__wrap">
            <div class="p-invite-landing-page__view__banner__item--left">
                <div class="p-invite-landing-page__view__banner__item__title">
                    <div class="p-invite-landing-page__view__banner__item__title__label">The world's greatest
                        photography game
                    </div>
                    <div class="p-invite-landing-page__view__banner__item__desc">
                        Share your photos, track ranking,<br>improve skills &amp; win awards.
                    </div>
                </div>
                <div class="p-invite-landing-page__view__banner__item__number">
                    <span ng-bind="'$'+$ctrl.totalPrize">$829,325</span> IN PRIZES
                </div>
            </div>
            <div class="p-invite-landing-page__view__banner__item--right">
                <div class="p-invite-landing-page__view__banner__item__tools">
                    <div class="p-invite-landing-page__view__banner__item__tools__tool">
                        <div class="responsive-sprites">
                            <img class="sprite-game-banner-vote" src="https://web.gurushots.com/assets/images/sprites/game-banner-sprite.png" alt="">
                        </div>
                        <div class="p-invite-landing-page__view__banner__item__tools__tool__text">PEER<span>VOTES</span>
                        </div>
                    </div>
                    <div class="p-invite-landing-page__view__banner__item__tools__tool">
                        <div class="responsive-sprites">
                            <img class="sprite-game-banner-ranking" src="https://web.gurushots.com/assets/images/sprites/game-banner-sprite.png" alt="">
                        </div>
                        <div class="p-invite-landing-page__view__banner__item__tools__tool__text"> LIVE<span>RANK</span>
                        </div>
                    </div>
                    <div class="p-invite-landing-page__view__banner__item__tools__tool">
                        <div class="responsive-sprites">
                            <img class="sprite-game-banner-swap" src="https://web.gurushots.com/assets/images/sprites/game-banner-sprite.png" alt="">
                        </div>
                        <div class="p-invite-landing-page__view__banner__item__tools__tool__text">PHOTO<span>SWAP</span>
                        </div>
                    </div>
                    <div class="p-invite-landing-page__view__banner__item__tools__tool">
                        <div class="responsive-sprites">
                            <img class="sprite-game-banner-boost" src="https://web.gurushots.com/assets/images/sprites/game-banner-sprite.png" alt="">
                        </div>
                        <div class="p-invite-landing-page__view__banner__item__tools__tool__text">
                            EXPOSURE<span>BOOST</span></div>
                    </div>
                </div>
                <div class="p-invite-landing-page__view__banner__item__number">
                    <span>100M</span> PEER VOTES A MONTH
                </div>
            </div>
        </div>
    </div>
   
</div><!----></invite-landing-page></div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>


<script>
    $(document).ready(function(){
        $('#myfriend tbody td').click(function(){
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());
            var femail=$('#myfriend tbody tr').eq(row).find('td').eq(0).text();
            $('#friend_email').html(femail);
            $.ajax({
                url: '{{url('getfriendlist')}}',
                type: 'post',
                data: { email:femail} ,

                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //alert('success');
                    //console.log(response);
                    var obj = JSON.parse(response);
                    console.log(obj);
                    $('#friend_table').html('');
                    $('#friend_table').append('<thead>\n' +
                        '<tr>' +
                        '<th>' +
                        '<span>Invited</span>' +
                        '<i class="icon-question-sign" ng-click="$ctrl.help()" role="button" tabindex="0"></i>' +
                        '</th>' +
                        '<th>Date</th>' +
                        '<th>Status</th>' +
                        '</tr>' +
                        '</thead>');
                    var html='<tbody>';
                    for (var i=0;i<obj['data'].length;i++){
                        html+='<tr>';
                        html+=
                            '<td>'+obj['data'][i]['friend_email']+'</td>'+
                            '<td>'+obj['data'][i]['datetime']+'</td>'+
                            '<td>'+obj['data'][i]['state']+'</td>';
                        html+='</tr>';
                        console.log(obj['data'][i]);
                    }
                    html+='</tbody>';
                    $('#friend_table').append(html);
                    location.reload();
                },
                error: function(response){
                    $('#friend_table').html('');
                    $('#friend_email').html('There is no anyone');
                    // console.log(response);
                    //alert('error');

                }
            });
        });
    });
    function google_signin(){
        // $('#google_sign_dlg').modal('show');
        $('#send_message_dlg').modal('show');

    }
    $('#send_email').click(function(){
        //alert("correctly");
        var email = $('#to_email').val();
        //console.log(email);
        if(!email) {
            alert("Input your Friend");
            return;
        }
        //alert("correctly");
        var request = $.ajax({
            url: '{{url('friend/invite')}}',
            type: 'post',
            data: { f_email:email} ,

            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                //alert('success');
                //console.log(response);
                var obj = JSON.parse(response);
                location.reload();

            },
            error: function(response){

                // console.log(response);
                alert('error');

            }
        });

        request.done(function(data) {
            // your success code here
        });

        request.fail(function(jqXHR, textStatus) {
            // your failure code here
        });
    });

</script>
