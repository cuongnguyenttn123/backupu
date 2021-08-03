
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
<style type="text/css">
.mobile-social-share {
    margin: 35px auto;
    max-width: 700px;
}
.bannifit{
    width: 24%;
    border: 1px solid #52bde1;
    border-radius: 20px;
    padding-right: 1px;
    color: #52bde1;
}
    .mobile-social-share h3 {
        /* color: inherit; */
    /* float: left; */
    font-size: 20px;
    line-height: 20px;
    margin: 5px auto !important;
    /* width: 100%;
}

/*.share-group {
    float: right;
    margin: 18px 25px 0 0;
}*/

.btn-group {
    display: inline-block;
    font-size: 0;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
}

.mobile-social-share ul {
    float: right;
    list-style: none outside none;
    margin: 0;
    min-width: 61px;
    padding: 0;
}

.share {
    min-width: 17px;
}

.mobile-social-share li {
    display: block;
    font-size: 18px;
    list-style: none outside none;
    margin-bottom: 3px;
    margin-left: 4px;
    margin-top: 3px;
}

.btn-share {
    background-color: #BEBEBE;
    border-color: #CCCCCC;
    color: #333333;
}

.btn-twitter {
    background-color: #3399CC !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-facebook {
    background-color: #3D5B96 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-facebook {
    background-color: #3D5B96 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-google {
    background-color: #DD3F34 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-linkedin {
    background-color: #1884BB !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-pinterest {
    background-color: #CC1E2D !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-mail {
    background-color: #FFC90E !important;
    width: 51px;
    color:#FFFFFF!important;
}

.caret {
    border-left: 4px solid rgba(0, 0, 0, 0);
    border-right: 4px solid rgba(0, 0, 0, 0);
    border-top: 4px solid;
    display: inline-block;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    width: 0;
}

#socialHolder {
    padding: 0px;
}

#socialShare{
    width: 100%;
}
#socialShare > a{
    padding: 6px 10px 6px 10px;
    width: 100%;
    background: #0099cc;
}

@media (max-width : 320px) {
    #socialHolder{
        padding-left:5px;
        padding-right:5px;
    }
    
    .mobile-social-share h3 {
        margin-left: 0;
        margin-right: 0;
    }
    
    #socialShare{
        margin-left:5px;
        margin-right:5px;
    }
    
    .mobile-social-share h3 {
        font-size: 15px;
    }
}

@media (max-width : 238px) {
    .mobile-social-share h3 {
        font-size: 12px;
    }
}
</style>
<div class="container-fuild">

    <section>
        <div class="contentcenter  backgroundimage " style = " padding-top: 90px;">
            <div class="p-invite-page__cover__text">
                <div id="text-box">
                    <div ><b>MEMBERSHIP PLAN</b></div><br>
                    <div class="title"><b>Super 9</b></div><br>
                    <b><span>1.</span> 9 Charges worth $3.99</b><br></br>
                    <b><span>2.</span> 9 Flips worth $3.99</b><br></br>
                    <b><span>3.</span> 9 Wands worth $3.99</b><br></br>
                    <b><span>4.</span> Join paid challenges for free for 9 months</b><br></br>
                    <b><span>5.</span> Exhibition entries are free </b><br></br>
                </div>
                <i class="icon-spread-the-love"></i>
            </div>
        </div>
        <div class="contentcenter " style="position:relative;">
            <div >
                <div class="row mobile-social-share">
                    <div class="bannifit">
                        <h3>Referral Income</h3>
                    </div>
                    <div class="bannifit">
                        <h3>Team Income</h3>
                    </div>
                    <div class="bannifit">
                        <h3>Cash Rewards</h3>
                    </div>
                    <div class="bannifit">
                        <h3>Gift Rewards</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="contentcenter paddingtop-50">
            <div><h1 class="friends-title">Team Rewards</h1></div>
            <table id="myfriend" class="p-invite-page__view__table" title="Please click row">
                <thead>
                <tr>
                    <th>
                        <span>Team</span>
                        <i class="icon-question-sign" ng-click="$ctrl.help()" role="button" tabindex="0"></i>
                    </th>
                    <th>Cash</th>
                    <th>Gift</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5</td>
                        <td>$1</td>
                        <td>3 Wands</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>$5</td>
                        <td>6 Wands</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>$10</td>
                        <td>9 Wands</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>$15</td>
                        <td>15 Wands</td>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>$25</td>
                        <td>20 Wands</td>
                    </tr>
                    <tr>
                        <td>500</td>
                        <td>$50</td>
                        <td>25 Wands</td>
                    </tr>
                    <tr>
                        <td>1000</td>
                        <td>$100</td>
                        <td>Nikon D3500</td>
                    </tr>
                    <tr>
                        <td>5000</td>
                        <td>$500</td>
                        <td>Nikon D5600</td>
                    </tr>
                    <tr>
                        <td>10000</td>
                        <td>$1000</td>
                        <td>Nikon D750</td>
                    </tr>
                </tbody>
            </table>
            <div><h1 id="friend_email"></h1></div>
            <table id="friend_table" class="p-invite-page__view__table">

            </table>
        </div> -->





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
     color:#5c97d2;
     /*text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;  */
     font-family:arial;  
     text-align:left;
    }
    #text-box{
     font-size: 21px;
     width: 68%;
     color: white;
     list-style-type: none;
     text-align: left;
     font-family: arial;
     /*text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff; */
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
        background: #52bde1;
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
        margin-top: -10px;
        padding-top: 130px;
        background-image: url({{asset('images/membership.jpg')}}) !important;
        height:540px;
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
    #send_email{
        position:relative;
        top:40px;
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
                    // $('#friend_email').html('There is no anyone');
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
        var name = $('#to_name').val();
        //console.log(email);
        if(!email) {
            alert("Enter Your Friend's Email");
            return;
        }
        if(!name){
            alert("Enter Your Friend's Name");
        }
        //alert("correctly");
        var request = $.ajax({
            url: '{{url('friend/invite')}}',
            type: 'post',
            data: { f_email:email,f_name:name} ,

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
