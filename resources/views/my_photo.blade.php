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

    <style>
      .page-cn{min-height:100vh}
      /* clear fix */
      .grid:after {content:'';display:block;clear:both}
      /* ---- .grid-item ---- */
      .grid-item{margin:5px;position:relative}
      .grid-item a{display:block}
      .grid-item--width2 {width:200px}
      .grid-item--height2 {height:200px}
      .info_container{margin-bottom:28px}
      .info_container img{width:100%}
      .show_images{position:absolute;top:18px;right:8px;transition:all ease .3s;opacity:0;visibility:hidden;border-radius:2px;padding:10px;background:rgba(255,255,255,.3);width:40px}
      body .grid-item:hover > .show_images{opacity:1;visibility:visible}
      .img-cn{transition:all ease .3s}
      .img-cn:hover img{transform:scale(1.3)}
      .btn-fix{position:absolute;z-index:999;color:#fff;right:-30px;font-size:40px;top:4px;opacity:.8}

      .row {display: -ms-flexbox; /* IE10 */display: flex;-ms-flex-wrap: wrap; /* IE10 */flex-wrap: wrap;padding: 0 4px}
      /* Create four equal columns that sits next to each other */
      .column{-ms-flex: 25%; /* IE10 */flex: 25%;max-width: 25%;padding: 0 4px}
      .column img {margin-top: 8px;vertical-align: middle;width: 100%}

      @media (max-width:991px) {
          #myModal .modal-content{width: auto!important}
      }

      /* Responsive layout - makes a two column-layout instead of four columns */
      @media screen and (max-width: 800px) {
        .column {
          -ms-flex: 50%;
          flex: 50%;
          max-width: 50%;
        }
      }

      @media (max-width:767px) {
        .grid-item .show_images{opacity:1;visibility:visible;}
        .btn-fix{right:-59px;top:53px}
      }

      /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
      
      @media screen and (max-width: 600px) {
        .column {
          -ms-flex: 100%;
          flex: 100%;
          max-width: 100%;
        }
      }
      #photos .image {
            /* Just in case there are inline attributes */
            width: auto !important;
            height: 200px !important;
            border: solid 4px grey;
            max-width: 600px;
        }
      .image-card{
            position: relative;
            flex: auto;
            max-width: 600px;
        }
        .image-card .number{
            font-size: 30px;
            color: white;
            position: absolute;
            top: 10px;
            left: 30px;
            text-shadow: 2px 2px 5px black;

        }
        .image-card .vote{
            font-size: 30px;
            color: white;
            position: absolute;
            bottom: 10px;
            right: 30px;
            text-shadow: 2px 2px 5px black;
        }
        .image-card .user{
            display: table-cell;
            vertical-align: middle;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            text-align: center;
            font-size: 30px;
            color: white;
            position: absolute;
            text-shadow: 2px 2px 5px black;
            transform: scale(0);
        }
        .image-card:hover .user {
            transform: scale(1);
            transition: transform .5s;
        }
        @media screen and (max-width: 480px) {
      
              #photos .image{
                  max-width:100% !important;
              }
          }

    </style>

  </header>

  <div class="page-cn">
    <section>
      <div style = "margin-top:-85px;background-color:#fff;">

        <div style = "background-color: #FFf; margin-top:-85px;width:85%;margin:auto;">

          <div class="row pt-5 pb-4">
            <div class="col-12 info_container text-center">
              <div id="photos" class="d-flex flex-wrap bg-light" style = "margin-bottom: 90px;">
                @for($i=0; $i<count($site_images); $i++)
                    @php
                        //echo count($data);
                        $item = json_decode(json_encode($site_images[$i]), true);
                    @endphp
                    <div class="image-card p-2" >
                        <div style="background-image: url('{{$item['url']}}');background-size: cover;background-position: center;width: 100%">
                            <img class="image"  src="{{$item['url']}}" style="opacity: 0"/>
                            {{--<img id="vmid{{$item['id']}}" class="votingmark" src="{{asset('img/voting.png')}}"/>--}}
                        </div>

                        <!--<span class="number" aria-hidden="true" >#{{$i+1}}</span>-->
                        <span class="vote" aria-hidden="true" ><i class="fas fa-vote-yea"></i>{{$item['vote']}}</span>
                        

                    </div>


                @endfor
            </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content w-100 d-block text-center border-0 img-cn" style="background:none;max-height:90%;">
        <button class="btn btn-fix" id="closeIcon">
          <i class="far fa-times-circle"></i>
        </button><!--// btn-fix -->
        <img src="" class="img-fluid h-100" style="object-fit:contain" alt="Responsive image">
      </div>
    </div>
  </div>
@include ('Modal/alert_message_dlg')

@php
if(Request::segment(2) == 'success'){
@endphp
    <script>
    $('#alertmessage').attr('value', 'Your photo has been uploaded successfully!');
    $('#alert_message_dlg').attr('class', 'modal fade animate');
    $('#alert_message_dlg').modal('show');
    </script>
@php
}
@endphp
  <script type="text/javascript">
    $(document).ready(function(){
      $('.show_images').on('click',function(){
        var image_url = $(this).data('imge');
        $('#myModal .modal-content img').attr('src',image_url);
        //   $('#myModal').toggle();
        $('#myModal').modal('show');
      });
      $("#closeIcon").on('click',function(){
        $('#myModal').modal('hide');  
      })
      

      $('.img-cn').on('mousemove', function(e){
        $(this).children('img').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
      });

    });
  </script>
  <footer class="bg-dark">
    @include('Layout/footer')
  </footer>
</body>
</html> 