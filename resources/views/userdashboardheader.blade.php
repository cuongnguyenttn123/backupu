    <div class="account-menu">
        <a style="width:30%;" href="{{url('challenges/my')}}">Challenges</a>
        <a style="width:30%;" href="{{url('shop')}}">Buy/Sell</a>
        <a style="width:40%;" href="{{url('invite')}}">Invite Friends</a>
    </div>
    <div class="account-menu">
        <a style="width:30%;text-align:left;" href="{{url('info_page')}}">Info Page</a>
        <a style="width:40%;text-align:left;" href="{{url('best_images')}}">Best Images</a>
         <div class="dropdown">
          <a class="nav-link" onclick="myFunction()"   href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(!is_null($u_profile))
                <img src="{{asset('images/profile_pictures/'.$u_profile)}}" style="width:30px;height:30px;border-radius:50%;">
            @else
                <img src="{{asset('images/avatar.jpg')}}" style="width:30px;height:30px;border-radius:50%;">
            @endif
          </a>
          <div id="myDropdown" class="dropdown-content">
             <a href="{{url('/landing')}}" style="color:black;">Home</a>
            <a href="{{url('logout')}}" style="color:black;">Logout</a>
        </div>
       </div>
    </div>
