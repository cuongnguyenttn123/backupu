
@include ('Modal/send_message_dlg')

<html>
<head>
    @include('Layout/head')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<header>
    @include('Layout.smenu')
</header>
<div class="container-fuild">
    @php
        //echo var_dump($data);
        $c=json_decode(json_encode($challenge), true);
        $url=$c['image-url'];
            //echo var_dump($c);

                //echo var_dump($image);
    @endphp
    <section>
        <!--<div class="contentcenter  backgroundimage " style="background-image: url('{{$url}}')">-->
        <div class="contentcenter  backgroundimage " style="background-image: url('{{$url}}')">
            <div class="p-invite-page__cover__text">
                <div class="title">Invite Friends to "{{$c['title']}}"</div>
                <span id="cid" style="display: none;">{{$c['id']}}</span>
                <!-- Fixed icon -->
                <i class="icon-spread-the-love"></i>
            </div>
            <div class="p-invite-page__cover__links">
                <div class="p-invite-page__cover__links__link" onclick="google_signin()" role="button" tabindex="0"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span>e-mail</span></div>
                <!--<div class="p-invite-page__cover__links__link--facebook" gs-share="fb" gs-share-code="url" gs-share-url="$ctrl.page.urls.facebook" ng-click="$ctrl.trackClick('facebook')" role="button" tabindex="0"><i class="fa fa-facebook" aria-hidden="true"></i><span>invite</span></div>-->
                <!--<div class="p-invite-page__cover__links__link--twitter" gs-share="twitter" gs-share-code="url" gs-share-url="$ctrl.page.urls.twitter" ng-click="$ctrl.trackClick('twitter')" role="button" tabindex="0"><i class="fa fa-twitter" aria-hidden="true"></i><span>invite</span></div>-->
            </div>



        </div>
        <div class="contentcenter " style="padding-top: 20px">

        </div>

        <div class="contentcenter paddingtop-50">
            <!-- <div class="p-invite-page__view__stat__number">
                <img src="https://web.gurushots.com/assets/images/gsApp/pages/challenges/get_swap_key_autofill.png" style=" height: 40px;">
                <span ng-bind="'x' + $ctrl.page.granted">x4</span>
            </div> -->
            <div><h1>My Friends</h1></div>
            <table id="myfriend" class="p-invite-page__view__table" title="Please click row">
                <thead>
                <tr>
                    <th>
                        <span>Invited</span>
                        <i class="icon-question-sign" ng-click="$ctrl.help()" role="button" tabindex="0"></i>
                    </th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data))
                @for($i=0;$i<count($data);$i++)
                    @php
                        $item = $data[$i];
                        if($item->state == 'false') $status = 'False';
                        else $status = 'Sign Up';
                    @endphp
                    <tr >
                        <td class="pointer">{{$item->friend_email}}</td>
                        <td class="pointer">{{$item->datetime}}</td>
                        <td class="pointer">{{$item->state}}</td>
                    </tr>
                @endfor
                @endif
                </tbody>
            </table>
            <div><h1 id="friend_email"></h1></div>
            <table id="friend_table" class="p-invite-page__view__table">

            </table>
        </div>





    </section>
</div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>
<style>
    .pointer {cursor: pointer;}
    .p-invite-page__cover__text .title, .p-invite-page__cover__text body.challenges .challengeToggle .title-mobile, body.challenges .challengeToggle .p-invite-page__cover__text .title-mobile {
        letter-spacing: -1.1px;
        font-size: 56px;
        line-height: 1.3;
    }
    .p-invite-page__cover__text .desc span {
        font-weight: 700;
    }
    .p-invite-page__cover__text .desc {
        letter-spacing: -.6px;
        font-size: 32px;
    }
    .p-invite-page__cover__text img {
        display: block;
        height: 55px;
        margin: 0 auto;
    }
    .p-invite-page__cover__text {
        position: relative;
        width: 100%;
        max-width: 1600px;
        margin: auto;
        text-align: center;
        color: #fff;
        text-shadow: 0 2px 8px rgba(0,0,0,0.33);
        font-size: 40px;
        line-height: 1.1;
    }
    .vc_single_image-img{
        margin-top: 10px;
        margin-bottom: 30px;
    }
    .backgroundimage h3,h5{
        color: white;
        line-height: 35px;

    }

    section{
        min-height: 500px;

    }
    .contentcenter{
        text-align: center;

    }
    .paddingtop-50{
        padding-top: 50px;
        padding-bottom: 10px;
        background-color: #f2f2f2
    }
    h4{
        color: rgba(0,0,0,0.5);
    }
    .backgroundimage{
        margin-top: -67px;
        padding-top: 130px;
        /*background-image: url(https://photos.gurushots.com/unsafe/0x0/61f1a195dc421d20ef4ae7798ac2624c/8e3ddeaff994b4d784e25f1020987a59.jpg) !important;*/
        height:460px;
        background-position: 50% 32%;
        width: 100%;
        background-size: cover;

    }
    table {
        /*border-collapse: collapse;*/
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        text-align: center;
    }

    th, td {
        text-align: center;
        padding: 16px;
        background: white;
        border-bottom: 1px solid #ccc;
        border-left: 5px solid #f1f1f1;
    }
    th{
        background: black;
        color: white;
    }
    th:first-child, td:first-child {
        border-left: none;
    }

    tr:nth-child(even) {

    }

    .p-invite-page__view__table {
        overflow: hidden;
        width: 100%;
        max-width: 600px;
        margin: 0 auto 60px;
        padding: 2px;
        /*border-collapse: separate;*/
        border-radius: 5px;
    }
    .p-invite-page__view__stat__number {
        display: inline-block;
        margin-left: 15px;
        padding: 5px 10px;
        vertical-align: middle;
        color: #218ccc;
        border: 1px solid #ccc;
        border-radius: 7px;
        background-color: #fff;
        -webkit-box-shadow: inset 0 0 5px 0 rgba(0,0,0,0.25);
        box-shadow: inset 0 0 5px 0 rgba(0,0,0,0.25);
        font-weight: 600;
        line-height: 1;

    }
    .p-invite-page__view__stat__number span {
        margin-left: 5px;
        vertical-align: middle;
        font-size: 21px;
    }
    .p-invite-page__view__stat__number img {
        display: inline-block;
        height: 40px;
        vertical-align: middle;
    }
    .p-invite-page__view__stat {
        display: block;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 15px 10px;
        cursor: default;
        text-align: center;
        background-position: 0 0;
        background-size: contain;
        font-size: 0;
        line-height: 90px;
    }
    .p-invite-page__view__stat__label {
        display: inline-block;
        text-align: center;
        vertical-align: middle;
        letter-spacing: -.5px;
        color: #777;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.4;
    }
    .p-invite-page__cover__links {
        position: relative;
        margin-top: 25px;
        text-align: center;
        font-size: 0;
    }
    .p-invite-page__cover__links__link, .p-invite-page__cover__links__link--facebook, .p-invite-page__cover__links__link--twitter {
        display: inline-block;
        width: 105px;
        padding: 5px 0;
        cursor: pointer;
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
        color: #fff;
        border-radius: 4px;
        background-color: #444;
        font-size: 20px;
        font-weight: 600;
        line-height: 1;
    }
    .p-invite-page__cover__links__link--facebook {
        background-color: #3b5999;
        margin-left: 15px;
    }
    .p-invite-page__cover__links__link--twitter {
        background-color: #47B7FF;
        margin-left: 15px;
    }
    i{
        font-size: 20px!important;
        width: 20px;
    }

</style>
<script>
    $(document).ready(function(){
        $('#myfriend tbody td').click(function(){
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());
            var femail=$('#myfriend tbody tr').eq(row).find('td').eq(0).text();
            $('#friend_email').html(femail);
            $.ajax({
                url: '{{url('getfriendlist1')}}',
                type: 'post',
                data: { email:femail} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
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
                },
                error: function(response){
                     console.log(response);
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
        $('#send_message_dlg').toggle();
        $('#preloader').css('display','block');
        var email = $('#to_email').val();
        //console.log(email);
        if(!email) {
            alert("Input your Friend");
            return;
        }
        //alert("correctly");
        var request = $.ajax({
            url: '{{url('challenge/invite')}}',
            type: 'post',
            data: { f_email:email,cid:$('#cid').text()} ,

            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                //alert('success');
                console.log(response);
                var obj = JSON.parse(response);
                location.reload();

            },
            error: function(response){
                console.log(response);
                $('#preloader').css('display','none');
                $('#send_message_dlg').toggle();
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
