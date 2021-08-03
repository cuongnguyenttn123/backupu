@include ('Modal/signup')
@include ('Modal/signin')
@include ('Modal/Verify')
<style>
    body {
        min-height: 75rem;
        padding-top: 12rem;
    }
    .navbar{
        background-color: #333;
    }
    #navbarCollapse{
        position: relative;
    }
    .navbar-nav .nav-item .nav-link{
        font-size: 18px;
        padding-right: 30px;
    }
    #navbarCollapse .nav-item{
        z-index: 10;
    }
    /*search*/
    #rightbutton .custom_search{
        background-color: #f92;
    }
    #rightbutton button{
        background-color: #f92;
        font-size: 20px;
    }
</style>
<style type="text/css">
  .modal {
  display: none;
  /*background-color: transparent;*/
  transition: all 0.25s ease;
}
.modal.open {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
}
.modal .content-wrapper {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  width: 80%;
  margin: 0;
  padding: 2.5rem;
  background-color: white;
  border-radius: 0.3125rem;
  box-shadow: 0 0 2.5rem rgba(0, 0, 0, 0.5);
}
.modal .content-wrapper .close {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 2.5rem;
  height: 2.5rem;
  border: none;
  background-color: transparent;
  font-size: 1.5rem;
  transition: 0.25s linear;
}
.modal .content-wrapper .close:before, .modal .content-wrapper .close:after {
  position: absolute;
  content: '';
  width: 1.25rem;
  height: 0.125rem;
  background-color: black;
}
.modal .content-wrapper .close:before { transform: rotate(-45deg); }
.modal .content-wrapper .close:after { transform: rotate(45deg); }
.modal .content-wrapper .close:hover { transform: rotate(360deg); }
.modal .content-wrapper .close:hover:before, .modal .content-wrapper .close:hover:after { background-color: tomato; }
.modal .content-wrapper .modal-header {
  position: relative;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin: 0;
  padding: 0 0 1.25rem;
}
.modal .content-wrapper .modal-header h2 {
  font-size: 1.5rem;
  font-weight: bold;
}
.modal .content-wrapper .content {
  position: relative;
  display: flex;
}
.modal .content-wrapper .content p {
  font-size: 0.875rem;
  line-height: 1.75;
}
.modal .content-wrapper .modal-footer {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  margin: 0;
  padding: 1.875rem 0 0;
}
.modal .content-wrapper .modal-footer > button {
  margin-left: 0.625rem;
  padding: 0.625rem 1.25rem;
  border: none;
  background-color: slategray;
  color: white;
  font-size: 0.87rem;
  font-weight: 300;
}
.modal .content-wrapper .modal-footer > button:first-child { background-color: #2ecc71; }
.modal .content-wrapper .modal-footer > button:last-child { background-color: #e74c3c; }
</style>
<style>
    /*local file-upload*/
 #local_upload form{
    background-color: rgba(150, 149, 152, 0.9);
    top: 37%;
    left: 50%;
    margin-top: 20px;
    width: 450px;
    height: 172px;
    border: 2px dashed #751f1f;
    color: #ce0f0f;
    cursor: pointer;
    text-align: center;
    line-height: 1;
}
 #local_upload form p{
  width: 100%;
  height: 100%;
  margin-top: 20%;
  text-align: center;
  /*line-height: 170px;*/
  color: #ffffff;
  font-family: Arial;
}
 #local_upload form input{
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
}
 #local_upload form button{
  margin: 0;
  color: #fff;
  background: #218ccc;
  border: none;
  width: 100%;
  height: 35px;
 margin-top:-75px;
  margin-left: -4px;
  border-radius: 4px;
  transition: all .2s ease;
  outline: none;
}
/*form button:hover{*/
/*  background: #149174;*/
/*  color: #0C5645;*/
/*      width: 100%;*/
/*      margin-top:30px;*/
/*}*/
/*.button{*/
/*  margin: 0;*/
/*  color: #fff;*/
/*  background: #218ccc;*/
/*  border: none;*/
/*  width: 250px;*/
/*  height: 35px;*/
/*  margin-top:38%;*/
/*  margin-left: -4px;*/
/*  border-radius: 4px;*/
/*  transition: all .2s ease;*/
/*  outline: none;*/
/*}*/
.button1{
  margin: 0;
  color: #fff;
  background: #37bf62;;
  border: none;
  width: 80px;
  height: 35px;
  margin-top:4%;
  margin-left: -4px;
  border-radius: 4px;
  transition: all .2s ease;
  outline: none;
}
</style>
<div data-modal="trigger-demo" class="modal">
  <article class="content-wrapper">
    <button class="close"></button>
    <header class="modal-header" style = "color: #444;display: inline-block;text-align: center;vertical-align: middle;font-family: sans-serif;letter-spacing: -.5px;color: #444;font-size: 26px;line-height: 1.2;font-weight: normal;">
      <h2 style = "font-weight: normal;"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Upload to profile</h2>
    </header>
    <div class="content" style = ""> 
      <div class = "row" style = ""> 
                <div class = "col-sm-3" id = "local" style = " width: 100%;    height: auto; margin-right: 20px;    margin-left: 10%; cursor:pointer;">  
                    <div style = "border-radius:10px; background-color: #ececec">
                        <img class="desktop" src="https://web.gurushots.com/assets/images/gsApp/components/Uploader/uploader_computer.png" alt="" style = "width: 100%;   height: auto;  border-radius:10px;">
                        <div style = "text-align:center; color: #222; font-size: 18px;padding-top:15px;padding-bottom:10px;">MY COMPUTER</div> 
                    </div>
                </div>  
                <div class = "col-sm-3" id = "instagram" style = "width:100%;height:auto;    ;margin-right: 20px; cursor:pointer;">  
                    <div style = "border-radius:10px; background-color: #ececec">   
                      <img class="desktop" src="https://web.gurushots.com/assets/images/gsApp/components/Uploader/uploader_instagram.png" alt="" style = "width: 100%;   height: auto;">
                      <div style = "text-align:center; color: #222; font-size: 18px;padding-top:20px;padding-bottom:10px;">INSTARTRAM</div>
                    </div>  
                </div> 
                <div class = "col-sm-3" id = "googlephoto" style = "width:100%;height:auto;    ;margin-right: 20px;cursor:pointer;">  
                    <div style = "border-radius:10px; background-color: #ececec">   
                      <img class="desktop" src="https://web.gurushots.com/assets/images/gsApp/components/Uploader/uploader_google.png" alt="" style = "width: 100%;   height: auto;">
                      <div style = "text-align:center; color: #222; font-size: 18px;padding-top:21px;padding-bottom:10px;">GOOGLE PHOTOS</div>
                    </div>  
                </div> 
      </div>
        <div   id = "local_upload" style = " width: 100%;    height: 235px;  cursor:pointer;display:none;">  
            <div style = "border-radius:10px; background-color: #ececec">
                <form action="{{url('/upload_image')}}" method="POST" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                      <input type="file" name="files" multiple>
                      <p><b>Drop</b> images or <b>Click</b>to upload files</p>
                      <button type="submit" style = "    float: right;">Upload</button>
                </form>
            </div>
        </div>
        <div   id = "instagram_upload" style = " width: 100%;       height: 196px;  cursor:pointer;display:none;">  
            <div style = "border-radius:10px; ">
               <a href = "https://www.instagram.com/accounts/login/" class="popup"><button class = "button" style = "      color: #fff;    background: #218ccc;    border: none;    width: 268px;    height: 35px;    margin-top: 33%;
                           border-radius: 4px;    transition: all .2s ease;    outline: none;">Contact to Instagram</button></a>
            </div>
        </div>
        <div   id = "googlephoto_upload" style = " width: 100%;      height: 196px;  cursor:pointer;display:none;">  
            <div style = "border-radius:10px; ">
             <a href="https://accounts.google.com/" class="popup"><button class = "button" style = "      color: #fff;    background: #218ccc;    border: none;    width: 268px;    height: 35px;    margin-top: 33%;
                           border-radius: 4px;    transition: all .2s ease;    outline: none;">Contact to Google Photos</button></a>
            </div> 
        </div> 
    </div>
    <footer class="modal-footer">
        <div>
             <p id = "back" style = "    position: absolute;    top: calc(50% - 7px);    left: 20px;    cursor: pointer;    color: #666;    font-size: 16px;    font-weight: normal; display:none; float:left;">back</p>
             <button id = "upload_btn" class = "button1" style = "float:right; display:none">Upload</button>
        </div>
    </footer>
  </article>
</div>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="margin-bottom:0px;">
    <a class="navbar-brand" href="{{url('challenges/my')}}">
        <img src={{asset("images/lg1.gif")}} style="width:230px;height:120px;"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto" style="width: 700px;">
           <li class="nav-item {{ Request::is('landing') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/landing')}}">Home</a>
            </li> 
            <li class="nav-item {{ Request::is('gallary_images') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/gallary_images')}}">Gallery Images</a>
            </li> 
            <li class="nav-item {{ Request::is('info_page') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/info_page')}}">Info Page</a>
            </li>
            <li class="nav-item {{ Request::is('best_images') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/best_images')}}">Best Images</a>
            </li>
             <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/blog')}}">Blog</a>
            </li>
<!--
            <li class="nav-item">
                <a class="nav-link" href="{{url('/bids_to_accept')}}"> Bids to accept </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/bids_to_pay')}}">Bids to Pay</a>
            </li> -->
        </ul>
        <div id="rightbutton" class="form-inline mt-2 mt-md-0" >
       <!--      <div class="input-group">
                <input class="form-control border-secondary py-2 custom_search" type="search" value="" placeholder="Search member">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div> -->
            <div class="dropdown dropleft ">
                <div class="dropdown-menu">
                    <a class="dropdown-item" href={{url('/landing')}}>Home</a> 
                    <a class="dropdown-item" href={{url('/myprofile')}}>Account Setting</a> 
                    <a class="dropdown-item" href={{url('logout')}}>Log Out</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
$(document).ready(function(){
  $("#local").click(function(){
     $("#local").hide();
     $("#instagram").hide();
     $("#googlephoto").hide();
     $("#local_upload").show();
     $("#back").show();
  });
  $("#instagram").click(function(){
     $("#local").hide();
     $("#instagram").hide();
     $("#googlephoto").hide();
     $("#instagram_upload").show();
     $("#google_upload").hide();
     $("#back").show();
     $("#upload_btn").show();
  });
  $("#googlephoto").click(function(){
     $("#local").hide();
     $("#instagram").hide();
     $("#googlephoto").hide();
     $("#local_upload").hide();
     $("#instagram_upload").hide();
     $("#googlephoto_upload").show();
     $("#back").show();
     $("#upload_btn").show();
  });
  $("#back").click(function(){
     $("#local").show();
     $("#instagram").show();
     $("#googlephoto").show();
     $("#local_upload").hide();
     $("#instagram_upload").hide();
     $("#googlephoto_upload").hide();
     $("#upload_btn").hide();
     $("#back").hide();
  });
$(function(){
  var
  w       = 770,
  h       = 600,
  l       = (screen.availWidth - w) / 2,
  t       = (screen.availHeight - h) / 2,
  popPage = '.popup';
  $(popPage).on('click',function(event){
    window.open(this.href,"window","width= "+ w + ",height=" + h + ",left=" + l + ",top=" + t + ", scrollbars = yes, location = no, toolbar = no, menubar = no, status = no");
     return false;
  });
});
});
$(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });
});
</script>
<script>
    $(document).ready(function() {
        setInterval(getnotification, 10000);
        getnotification();
        function getnotification() {
            $.ajax({
                url: '{{url('getNotification')}}',
                type: 'post',
                data: {} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
                    //alert(obj.message);
                    //console.log(obj);
                    var note=obj.data;
                    $('#notification_count').text(note.length);
                    if (note.length==0) {
                        $('#notification_count').css('background-color','grey');
                    }
                    else{
                        $('#notification_count').css('background-color','red');
                        $('#notification_item').html('');
                        for (var i=0;i<note.length;i++){
                            //<div class="dropdown-item" >You have 5 new tasks</div>
                            $('#notification_item').append('<div class="dropdown-item" >' +
                                note[i]['msg'] +
                                '<span style="display: none" >' +
                                    i+
                                '</span>' +
                                '</div>');
                        }
                    }
                    $('.dropdown-item').click(function () {
                        var noteid=$(this).children(' span').html();
                        //alert(noteid);
                        $.ajax({
                            url: '{{url('processNotification')}}',
                            type: 'post',
                            data: {note:note[noteid]} ,
                            beforeSend: function (request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(response){
                                var obj = JSON.parse(response);
                                //alert(obj.message);
                                console.log(obj);
                                var state=obj.state;
                                switch (state) {
                                    case 1:
                                        window.location.replace(obj.data);
                                        break;
                                    case 2:
                                        //window.location.replace(obj.data);
                                        break;
                                    default:
                                        break;
                                }
                            },
                            error: function (response) {
                                console.log(response);
                                // alert('error');
                            }
                        });
                    });
                    //console.log(obj['data']['exposure']);
                    // var count=obj['data']['exposure'];
                    // for (var jj=0;jj<=count;jj++){
                    //     // console.log(jj);
                    //     if((14-jj)<4)
                    //         $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','green');
                    //     else if((14-jj)<9)
                    //         $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','yellow');
                    //     else
                    //         $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','red');
                    // }
                },
                error: function (response) {
                    console.log(response);
                    //alert('error');
                }
            });
        }
    });
</script>
<script type="text/javascript">
  const buttons = document.querySelectorAll(`button[data-modal-trigger]`);
for(let button of buttons) {
  modalEvent(button);
}
function modalEvent(button) {
  button.addEventListener('click', () => {
    const trigger = button.getAttribute('data-modal-trigger');
    const modal = document.querySelector(`[data-modal=${trigger}]`);
    const contentWrapper = modal.querySelector('.content-wrapper');
    const close = modal.querySelector('.close');
    close.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', () => modal.classList.remove('open'));
    contentWrapper.addEventListener('click', (e) => e.stopPropagation());
    modal.classList.toggle('open');
  });
}
</script>
<script type="text/javascript">
$('#okey').modal('hide'); 
</script>
