 
 
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
 
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " >
    <div class="container-fluid">
        <div class="navbar-wrapper">
            {{--<a class="navbar-brand" href="#pablo"></a>--}}
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            {{--<form class="navbar-form">--}}
                {{--<div class="input-group no-border">--}}
                    {{--<input type="text" value="" class="form-control" placeholder="Search...">--}}
                    {{--<button type="submit" class="btn btn-white btn-round btn-just-icon">--}}
                        {{--<i class="material-icons">search</i>--}}
                        {{--<div class="ripple-container"></div>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</form>--}}
            <ul class="navbar-nav">
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#pablo">--}}
                        {{--<i class="material-icons">dashboard</i>--}}
                        {{--<p class="d-lg-none d-md-block">--}}
                            {{--Stats--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                 
                <li class="nav-item dropdown">
                    <div class="container">
                     <div class="dropdown">
                      <a class="nav-link" onclick="myFunction()"   href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(!is_null($a_image))
                            <img src="{{asset('images/profile_pictures/'.$a_image)}}" style="height:30px;width:30px;border-radius:50%;">
                        @else
                            <img src="{{asset('images/avatar.jpg')}}" style="height:30px;width:30px;border-radius:50%;">
                        @endif                           
                      </a>
                      <div id="myDropdown" class="dropdown-content" style="width:200px;margin-left:-50px;">
                        <a href={{url('/landing')}}>Home</a>
                        <a href={{url('/logout')}}>Logout</a>
                      </div>
                    </div>
                    
                   
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
