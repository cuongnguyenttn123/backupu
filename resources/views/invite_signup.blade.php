  <html>
  <head>
      @include('Layout/head')
  </head>
  <body>
  <header>
  @if(Session::get('login_flag') != 'login')
      @include('Layout.gmenu')
   @else
      @include('Layout.smenu')
  @endif
  <link rel="stylesheet" type="text/css" href="https://urpixpays.com/public/css/flags.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
  <style>
        /* Tomorrow Theme */
        /* Original theme - https://github.com/chriskempson/tomorrow-theme */
        .prettyprint {
            background: white;
            font-family: Menlo, 'Bitstream Vera Sans Mono', 'DejaVu Sans Mono', Monaco, Consolas, monospace;
            font-size: 12px;
            line-height: 1.5;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .pln {
            color: #4d4d4c;
        }

        @media screen {
            .str {
                color: #718c00;
            }

            .kwd {
                color: #8959a8;
            }

            .com {
                color: #8e908c;
            }

            .typ {
                color: #4271ae;
            }

            .lit {
                color: #f5871f;
            }

            .pun {
                color: #4d4d4c;
            }

            .opn {
                color: #4d4d4c;
            }

            .clo {
                color: #4d4d4c;
            }

            .tag {
                color: #c82829;
            }

            .atn {
                color: #f5871f;
            }

            .atv {
                color: #3e999f;
            }

            .dec {
                color: #f5871f;
            }

            .var {
                color: #c82829;
            }

            .fun {
                color: #4271ae;
            }
        }
        @media print, projection {
            .str {
                color: #006600;
            }

            .kwd {
                color: #006;
                font-weight: bold;
            }

            .com {
                color: #600;
                font-style: italic;
            }

            .typ {
                color: #404;
                font-weight: bold;
            }

            .lit {
                color: #004444;
            }

            .pun, .opn, .clo {
                color: #444400;
            }

            .tag {
                color: #006;
                font-weight: bold;
            }

            .atn {
                color: #440044;
            }

            .atv {
                color: #006600;
            }
        }
        /* Specify class=linenums on a pre to get line numbering */
        ol.linenums {
            margin-top: 0;
            margin-bottom: 0;
        }

        /* IE indents via margin-left */
        li.L0,
        li.L1,
        li.L2,
        li.L3,
        li.L4,
        li.L5,
        li.L6,
        li.L7,
        li.L8,
        li.L9 {
            /* */
        }

        /* Alternate shading for lines */
        li.L1,
        li.L3,
        li.L5,
        li.L7,
        li.L9 {
            /* */
        }
    </style>
  </header>
  <div class="info-cn desktop_view">
    <div class="agileits-top">
            <div class="form" style="max-width: 500px;margin: 50px auto;">
                <input class="text" type="text" id="invitename" name="Username" placeholder="Full Name" style="width:100%;background:none;color:black;" required="">
                <input type="hidden" id="inviterefer_id" name="inviterefeYou have to Agree terms and conditionsr_id" value="{{$cid}}">
            <input class="text email" id="inviteemail" style="width:100%;color:black;" type="email" name="email0" placeholder="Email" required="">

            <input class="phone" id="invitephone" type="text" name="Phonenumber" placeholder="Phone Number" style="width:100%;margin-bottom: 1.5em;color:black;" required="">
            <div class="example" style="width:100%;">
              <div class="date-dropdowns"><input type="text" id="inviteexample4" style="background:none;color:black;" name="example4" readonly="readonly" placeholder="Min. Age 18"><select class="day" name="example4_[day]"><option value="">Day</option><option value="01">1st</option><option value="02">2nd</option><option value="03">3rd</option><option value="04">4th</option><option value="05">5th</option><option value="06">6th</option><option value="07">7th</option><option value="08">8th</option><option value="09">9th</option><option value="10">10th</option><option value="11">11th</option><option value="12">12th</option><option value="13">13th</option><option value="14">14th</option><option value="15">15th</option><option value="16">16th</option><option value="17">17th</option><option value="18">18th</option><option value="19">19th</option><option value="20">20th</option><option value="21">21st</option><option value="22">22nd</option><option value="23">23rd</option><option value="24">24th</option><option value="25">25th</option><option value="26">26th</option><option value="27">27th</option><option value="28">28th</option><option value="29">29th</option><option value="30">30th</option><option value="31">31st</option></select><select class="month" name="example4_[month]"><option value="">Month</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select><select class="year" name="example4_[year]"><option value="">Year</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option></select></div>
            </div>
              <div class="form-group" style="width:170px;float: left;background:none;color:black">
                  <div id="origin" data-input-name="origin"></div>
              </div>
              <input class="city" id="invitecity" type="text" name="City" placeholder="City" style="width: calc(100% - 180px);margin-left: 10px;float: left;padding: 0.65em;background:none;color:black;" required="" autocomplete="off">                    
            <input class="text" type="password" id="invitepass1" name="password" placeholder="Password (At Least 8 Characters)" style="width:100%;background:none;color:black;" required="" autocomplete="off">
            <input class="text w3lpass" id="invitepass2" type="password" name="password" style="width:100%;background:none;color:black;" placeholder="Confirm Password" required="" autocomplete="off">
    
              <div class="wthree-text">
              <label class="anim">
                <input type="checkbox" id="terms_conditions" class="checkbox" style="float: left;position: relative;top: 1px!important;left:-10px;" required="">
                <a href="https://urpixpays.com/term_conditions" style="color:black;font-weight:500;" target="_blank">Agree To The Terms &amp; Conditions</a>
              </label>
              <div class="clear"> </div>
            </div>
            <input type="submit" id="submit_btn" style="color:black;font-weight:600;background:orange;" value="SIGN UP">
          <p style="color:black;font-weight:500;">Have An Account?<a id="second" href="signin" data-toggle="modal" data-target="#signindlg" style="color:black;margin-left:10px;">Log In Now!</a></p>
        </div>
      </div>
  </div>
  <footer class="bg-dark">
      @include('Layout/footer')
  </footer>
    <script type="text/javascript" src="https://urpixpays.com/public/js/jquery.flagstrap.js"></script>
    <script>
      var name;
      var refer_id;
      var mobile_number;
      var email ;
      var password ;
      var age;
      var vc;
      // var login=function(){
      //     var request=$.ajax({
      //         url: '{{url('register1')}}',
      //         type: 'post',
      //         data: { vc: vc, email:email} ,

      //         beforeSend: function (request) {
      //             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
      //         },
      //         success: function(response){
      //             console.log(obj);
      //             var obj = JSON.parse(response);
      //             alert(obj.message);
      //             switch (obj.state) {
      //                 case 1:
      //                     $('#verifydlg').modal('toggle');
      //                     //$('#verifydlg').modal('show');
      //                     break;
      //                 default:
      //                     break;
      //             }
      //             console.log(response);
      //         },
      //         error: function(response){
      //             console.log(response);
      //             alert('error');
      //         }
      //     });

      //     request.done(function(data) {
      //         // your success code here
      //     });
      //     request.fail(function(jqXHR, textStatus) {
      //         // your failure code here
      //     });
      // };
$('#origin').flagStrap({
        placeholder: {
            value: "",
            text: "Country of origin"
        }
    });
$(document).ready(function(){
   $(document).on('click', '#submit_btn', function() {
      //alert('abc');
        //alert($('#origin span').text());
        name = $('#invitename').val();
        refer_id = $('#inviterefer_id').val();
        mobile_number = $('#invitephone').val();
        email = $('#inviteemail').val();
        country=$('#origin span').text();
        city=$('#invitecity').val();
        password =$('#invitepass1').val();
        password2 =$('#invitepass2').val();
        age =$('#inviteexample4').val();
        // alert(name);
        if((password != password2) || password.length < 8){
            alert('Incorrect password.');return;
        }
        if(!name || !refer_id || !mobile_number || !email || !password ||  !country || !city) {
            alert("Input your information correctly");
            return;
        }
        if( ! $('#terms_conditions').prop('checked', true)){
          alert('You have to Agree terms and conditions');
          return;
        }
        sendvc_invite();
        
    });
})
      
     
      
      var sendvc_invite=function(){
          var request=$.ajax({
              url: '{{url('sendvc1')}}',
              type: 'post',
              data: { name: name, refer_id:refer_id, mobile_number : mobile_number ,email:email,password:password,age:'20',country:country,city:city} ,

              beforeSend: function (request) {
                  return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              },
              success: function(response){
                  console.log(obj);
                  var obj = JSON.parse(response);
                  alert(obj.message);
                  switch (obj.state) {
                      case 1:
                          //$('#signupdlg').modal('toggle');
                          // $('#verifydlg').modal('show');
                          $('#alertmessage').attr('value', "Success Signup");
                          // $('#signindlg').modal('toggle');
                          $('#alert_message_dlg').attr('class', 'modal fade animate');
                          // $('#alert_message_dlg').modal('show');
                          // setTimeout(function() {
                          //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                          //     $('#alert_message_dlg').modal('toggle');
                          // }, 1000);
                          break;                    
                      case 200:
                          //$('#signupdlg').modal('toggle');
                          // $('#verifydlg').modal('show');
                          $('#alertmessage').attr('value', "Email in use");
                          // $('#signindlg').modal('toggle');
                          $('#alert_message_dlg').attr('class', 'modal fade animate');
                          // $('#alert_message_dlg').modal('show');
                          // setTimeout(function() {
                          //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                          //     $('#alert_message_dlg').modal('toggle');
                          // }, 1000);
                          break;
                      case 202:
                           //$('#signupdlg').modal('toggle');
                          // $('#verifydlg').modal('show');
                          $('#alertmessage').attr('value', "Failed:The age must be more than 18");
                          // $('#signindlg').modal('toggle');
                          $('#alert_message_dlg').attr('class', 'modal fade animate');
                          // $('#alert_message_dlg').modal('show');
                          // setTimeout(function() {
                          //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                          //     $('#alert_message_dlg').modal('toggle');
                          // }, 1000);
                          break;                           
                      default:
                          break;
                  }
                    window.location.href = 'https://www.urpixpays.com';
                  console.log(response);


              },
              error: function(response){
                  
                  // console.log(response);
                   alert('error');
                  //$('#signupdlg').modal('toggle');
                  // $('#verifydlg').modal('show');
                  $('#alertmessage').attr('value', "Error");
                  // $('#signindlg').modal('toggle');
                  $('#alert_message_dlg').attr('class', 'modal fade animate');
                  // $('#alert_message_dlg').modal('show');
                  setTimeout(function() {
                      $('#alert_message_dlg').attr('class', 'modal fade animateout');
                      $('#alert_message_dlg').modal('toggle');
                  }, 1500);
              }
          });

          request.done(function(data) {
              // your success code here
          });

          request.fail(function(jqXHR, textStatus) {
              // your failure code here
          });
      };
  </script>
  </body>
  </html>
