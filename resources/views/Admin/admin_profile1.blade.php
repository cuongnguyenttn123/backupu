
@extends('Admin.Layout.dashboard1')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_icon.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
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
    }
    
    td, th {
      border: 1px solid black;
      text-align: center;
      padding: 3px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }	
</style>
 <style>
            @media only screen and (max-width: 991px) {
                  #sidebar{
                   display:none;
                  }
                }
        </style>
@stop
@include ('Admin.Modal.add_challenge')
@section('content')
 <nav style="width:100px;height:50px;float:right;">



         <div class="dropdown">
          <a class="nav-link" onclick="myFunction()"   href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </a>
          <div id="myDropdown" class="dropdown-content">
             <a href="{{url('/landing')}}">Home</a>
            <a href="{{url('logout')}}">Logout</a>
        </div>
</nav>      <!--------------------->    
 <div class="container portfolio" style="clear:right;width:60%; height:auto;">
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
                        <form id="form" method="post" action="{{url("adminsaveProfile1")}}" enctype="multipart/form-data">
                            @csrf                       
                        <div class="bio-image">
                        <label for="profile_picture"  style="display:block;    padding: 80px 0px 47px 0px;">
                        @if(!is_null($a_image))
                            <img src="{{asset('images/profile_pictures/'.$a_image)}}" class="profile-pic" id="profile-pic" style = " border-radius: 50%;  border: 2px solid #73AD21;  padding: 0px;  width: 220px; height: 220px;">
                            <img src="{{asset('images/upload_icon.png')}}" id="upload-icon" style = "margin-top: 60px;">
                        @else
                            <img src="{{asset('images/avatar.jpg')}}" class="profile-pic" id="profile-pic">
                            <img src="{{asset('images/upload_icon.png')}}" id="upload-icon" style = "border-radius: 25px;  border: 2px solid #73AD21;  padding: 20px;   width: 200px;  height: 150px;  ">
                        @endif
                        <div id="image-overlay" style="border-radius: 50%;    width: 350px;margin-left: -50px;height:350px;display:none;"></div>
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" class="form-control" style="display:none;" disabled/>
                        </div>
                   
                        <div class="profile-detial-container" >
                            <button type="Submit" class="form-control submit-btn btn btn-primary" id="edit1"style="font-size: 16px;font-family:Montserrat,sans-serif;width:200px;">CHANGE PHOTO</button>
                            <button type="Submit" class="form-control submit-btn btn btn-primary" id="update" style="display:none;font-size: 16px;font-family:Montserrat,sans-serif;width:200px;">UPLOAD PHOTO</button>
                        </div>
                                
                    </div>
                </div>  
            </div>
            <div class="col-md-6" style="padding-top:0;" >
  
                        <table>
                          <tr>
                            <td>Name</td>
                            <td style='padding:0;'><input type='text' name='name' value='{{$a_name}}' style='width:150px;border:none;text-align: center;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>
                          <tr>
                            <td>Age</td>
                            <td style='padding:0;'><input type='text' name='age' value='{{$a_age}}' style='width:150px;border:none;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>
                          <tr>
                            <td>Country</td>
                            <td style='padding:0;'><input type='text' name='country' value='{{$a_country}}' style='width:150px;border:none;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td style='padding:0;'><input type='text' name='city' value='{{$a_city}}' style='width:150px;border:none;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>                          
                          <tr>
                            <td>Email</td>
                            <td style='padding:0;'><input type='email' name='email' value='{{$a_email}}' style='width:150px;border:none;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>
                          <tr>
                            <td>Phone Number</td>
                            <td style='padding:0;'><input type='text' name='phone' value='{{$a_phone}}' style='border:none;width:150px;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>                            
                          </tr>
                          <tr style="height:40px;">
                            <td>Wallet</td>
                            <td style='padding:0;'><input type='text' name='walet' value='{{$a_walet}}' style='border:none;width:150px;text-align: center;background:none;margin-bottom:0px !important;height:40px;'></input></td>
                          </tr>
                          <tr style="height:40px;">
                            <td>Register Date</td>
                            <td>{{$a_date}}</td>
                          </tr>                              
                     </table> 
      
                        <button type="submit" style="width:200px; background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;margin-top:47px;" id="submit">Update Profile</button>
                    </form>    
                </div>
            </div>
        </div>  
    </div>
</div>  
@stop
@section('script')
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
