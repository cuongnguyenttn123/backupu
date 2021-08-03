@extends('admin1.Layout.pagetemplate')
@section('head')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_icon.css')}}">
    <style type="text/css">
    body{
    		background: linear-gradient(90deg, #e8e8e8 50%);
    	}
    	.portfolio{
    		padding:6%;
    		text-align:center;
    	}
    	.heading{
    		background: #fff;
    		padding: 1%;
    		text-align: left;
    		box-shadow: 0px 0px 4px 0px #545b62;
    	}
    	.heading img{
    		width: 10%;
    	}
    	.bio-info{
    		padding: 5%;
    		background:#fff;
    		box-shadow: 0px 0px 4px 0px #b0b3b7;
    	}
    	.name{
    		font-family: 'Charmonman', cursive;
    		font-weight:600;
    	}
    	.bio-image{
    		text-align:center;
    	}
    	.bio-image img{
    		border-radius:50%;
    	}
    	.bio-content{
    		text-align:left;
    	}
    	.bio-content p{
    		font-weight:600;
    		font-size:30px;
    	}

        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          margin-top:30px;
          box-shadow: 0 0 4px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);
        }

        td, th {
          border: 1px solid lightgray;
          text-align: center;
          padding: 2px;
        }
</style>
    @stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="{{asset('adminp/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('admin1.Layout.header')
 <div class="container portfolio" style="clear:right;width:80%; height:auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <img src="https://image.ibb.co/cbCMvA/logo.png" />
            </div>
        </div>
    </div>
    <div class="bio-info">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" id="profile-pic-container">
                        <form id="form" method="post" action="{{url("adminsavebanner")}}" enctype="multipart/form-data">
                                @csrf
                            <div class="bio-image">
                            <label for="profile_picture"  style="display:block;    padding: 80px 0px 47px 0px;">
                            @if(!is_null($a_image))
                                <img src="{{asset('defaultbanner/'.$a_image)}}" class="profile-pic" id="profile-pic" style = " border-radius: 50%;  border: 2px solid #73AD21;  padding: 0px;  width: 220px; height: 220px;">
                                <img src="{{asset('images/upload_icon.png')}}" id="upload-icon" style = "margin-top: 60px;">
                            @else
                                <img src="{{asset('images/avatar.jpg')}}" class="profile-pic" id="profile-pic" style="border-radius: 50%; height:220px; width:220px;">
                                <img src="{{asset('images/upload_icon.png')}}" id="upload-icon" style = "border-radius: 25px;  border: 2px solid #73AD21;  padding: 20px;   width: 200px;  height: 150px;  ">
                            @endif
                            <div id="image-overlay" style="border-radius: 50%;    width: 220px;margin-left: 15px;height:220px;display:none;margin-top:80px;"></div>
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control" style="display:none;" disabled/>
                            </div>
                            <input type="text" id="id" name="id" class="form-control" value="1" style="display:none;" disabled/>
                            <div class="profile-detial-container" style="margin-top: 0px;">
                                <button type="Submit" class="form-control submit-btn btn btn-primary" id="edit1"style="font-size: 16px;font-family:Montserrat,sans-serif;width:200px;margin:auto;margin-top:25px;">CHANGE PHOTO</button>
                                <button type="Submit" class="form-control submit-btn btn btn-primary" id="update" style="display:none;font-size: 16px;font-family:Montserrat,sans-serif;width:200px;margin:auto;margin-top:-130px;">UPLOAD PHOTO</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
    @include('admin1.Layout.footer')
    @stop
@section('script')
    <!-- morrisjs JS
    ============================================ -->
    <script src="{{asset('adminp/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('adminp/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('adminp/js/morrisjs/morris-active.js')}}"></script>

        <script type="text/javascript">
            //console.log("{/{json_encode($users)}}");
            Morris.Area({
                element: 'extra-area-chart',
                data: [{
                    period: "2019-5-14",
                    Soccer: "123",
                    Cricket: "103",
                    Tennis: "73"
                }, {
                    period: "2019-5-15",
                    Soccer: "162",
                    Cricket: "84",
                    Tennis: "43"
                }, {
                    period: "2019-5-16",
                    Soccer: "133",
                    Cricket: "105",
                    Tennis: "35"
                }, {
                    period: "2019-5-17",
                    Soccer: "173",
                    Cricket: "123",
                    Tennis: "56"
                }, {
                    period: "2019-5-18",
                    Soccer: "148",
                    Cricket: "103",
                    Tennis: "42"
                }, {
                    period: "2019-5-19",
                    Soccer: "197",
                    Cricket: "162",
                    Tennis: "31"
                },{
                    period: "2019-5-20",
                    Soccer: "186",
                    Cricket: "165",
                    Tennis: "22"
                },{
                    period: "2019-5-21",
                    Soccer: "209",
                    Cricket: "175",
                    Tennis: "31"
                }],
                xkey: 'period',
                ykeys: ['Soccer', 'Cricket', 'Tennis'],
                labels: ['Reservation', 'Visitors', 'Average'],
                pointSize: 3,
                fillOpacity: 0,
                pointStrokeColors:['#006DF0', '#933EC5', '#65b12d'],
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                lineWidth: 1,
                hideHover: 'auto',
                lineColors: ['#006DF0', '#933EC5', '#65b12d'],
                resize: true

            });
        </script>
   <script>
        $(document).ready(function () {
            // $("#close").click(function(){
            //  $(".sidebar-content").hide();
            // });


            $('#edit1').click(function (e) {
                $(this).hide();
                $('#update').show(1000);
                $('.information-item').addClass('editable');
                $('#profile_picture').prop('disabled',false);
                $('#profile_picture').css('cursor','pointer');
                $('#image-overlay').show();
                $('#image-overlay').css('height',$('.profile-pic').css('height'));
                $('#upload-icon').show();
                $('.profile-pic-container').addClass('upload-hover');
                $('#zip').attr('placeholder','Optional');
                $('#school').attr('placeholder','Optional');
                e.preventDefault();
            });
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);

            }
        }

        $("#profile_picture").change(function(){

            readURL(this);
        });

    </script>
@stop

