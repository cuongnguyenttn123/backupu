
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

    <section>
        <div class="contentcenter  backgroundimage " style = " padding-top: 90px;">
            <div class="p-invite-page__cover__text">
                <div id="text-box">
                    <div class="title"><b>INVITE FRIENDS AND GET CASH REWARDS!</b></div><br></br>
                    <b><span>1.</span> If your friends sign up and join a free challenge on your invitation link you will get cash in your wallet.</b><br></br>
                    <b>2. You will get lifetime earnings from your sponsored members all incoming transactions.</b><br></br>
                    <b>3. You will also get 2 Flips + 2 Charges + 2 Magic Wands.</b>
                </div>
                <i class="icon-spread-the-love"></i>
            </div>
        </div>
        <div class="contentcenter " style="position:relative;top:-150px;">
            <div class="p-invite-page__cover__links">
                <div class="p-invite-page__cover__links__link" onclick="google_signin()" role="button" tabindex="0"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:30px;"></i>
                    <span>e-mail</span>
                </div>
            </div>
        </div>

        <div class="contentcenter paddingtop-50">
            <div><h1 class="friends-title">My Friends</h1></div>
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
                @for($i=0;$i<count($data);$i++)
                    @php
                        $item = $data[$i];
                        if($item->state == 'false') $status = 'invited';
                        else $status = 'Joined';
                    @endphp
                    <tr >
                        <td class="pointer">{{$item->friend_email}}</td>
                        <td class="pointer">{{$item->datetime}}</td>
                        <td class="pointer">{{$status}}</td>
                    </tr>
                @endfor

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
    .title{
     color:black;
     font-size:30px!important;
     color:#003366;
     text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;  
     font-family:arial;  
     text-align:left;
    }
    #text-box{
     font-size: 21px;
     width: 68%;
     color: #004d00;
     list-style-type: none;
     text-align: left;
     font-family: arial;
     text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff; 
     margin-left:10%;
    }
    .p-invite-page__cover__links__link, .p-invite-page__cover__links__link--facebook, .p-invite-page__cover__links__link--twitter {
        display: inline-block;
        width: 130px;
        padding: 7px 0;
        cursor: pointer;
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
        color: #fff;
        border-radius: 4px;
        background-color: #444;
        font-size: 20px;
        font-weight: 400;
        line-height: 1;
        position:relative;
        top:135px;
    }
    th, td {
        text-align: center;
        padding: 16px;
        background: white;
        border-bottom: 1px solid #ccc;
        border-left: 5px solid #f1f1f1;
    }
    th{
        background: #004d00;
        color: white;
    }
    .friends-title{
        font-size:30px!important;
        font-family:arial!important;
    }
    #friend_email{
        font-size:30px!important;
        font-family:arial!important;
    }
    @media screen and (max-width: 500px) {
        #text-box{
            width:90%;
            font-size:18px;
        }
        .title{
            font-size:20px!important;
            text-align:center;
        }
        th,td{
            padding:2px;
        }
        th{
            padding-top:3px;
            padding-bottom:3px;
        }
        .friends-title{
            font-size:25px!important;
        }
        #friend_email{
            font-size:25px!important;
        }
    }      
    @media screen and (max-width: 800px) {
    #text-box{
        width:80%;
    }
    .title{
        text-align:center;
        font-size:25px!important;
    }

    }
  
    
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
        color: black;
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
        background-image: url({{asset('images/invitef.jpg')}}) !important;
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
                url: '{{url('getfriendlist')}}',
                type: 'post',
                data: { email:femail} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
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
                            '<td>'+'Joined'+'</td>';
                        html+='</tr>';
                        console.log(obj['data'][i]);
                    }
                    html+='</tbody>';
                    $('#friend_table').append(html);
                },
                error: function(response){
                    $('#friend_table').html('');
                    $('#friend_email').html('There is no anyone');
                }
            });
        });
    });
    function google_signin(){
        // $('#google_sign_dlg').modal('show');
        $('#send_message_dlg').modal('show');

    }
    $('#send_email').click(function(e){
        e.preventDefault();
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
                console.log(response);
                var obj = JSON.parse(response);
                location.reload();

            },
            error: function(response){
                console.log(response);
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
