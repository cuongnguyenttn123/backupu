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
    </style>

  </header>

  <div class="page-cn">
    <section>
      <div style = "margin-top:-85px;background-color:#fff;">

        <div style = "background-color: #FFf; margin-top:-85px;width:85%;margin:auto;">

          <div class="row pt-5 pb-4" style="margin-top: 96px;">
            <div class="col-12 info_container text-center">
              <div class="row">
              	<div class="column">
              	 	@foreach ($site_images as $key => $value)
              	 	@if($key%4==0)

              			 <div class="grid-item">
                                <a href="{{$value->url}}"><img src="{{asset("uploads/info_images/$value->imgname ")}}" class="info_page"></a>
                                <p class="mt-3 mb-5"><a href="{{$value->url}}">{{$value->imgtitle}}</a></p>
                                <a class="btn btn-warning show_images" data-imge="{{asset("uploads/info_images/$value->imgname")}}" target="_blank"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                              </div>
                        @endif
              		@endforeach

              		</div>

              		<div class="column">
              	 	@foreach ($site_images as $key => $value)
              	 	@if($key%4==1)

              			 <div class="grid-item">
                                <a href="{{$value->url}}"><img src="{{asset("uploads/info_images/$value->imgname ")}}" class="info_page"></a>
                                <p class="mt-3 mb-5"><a href="{{$value->url}}">{{$value->imgtitle}}</a></p>
                                <a class="btn btn-warning show_images" data-imge="{{asset("uploads/info_images/$value->imgname")}}" target="_blank"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                              </div>
                        @endif
              		@endforeach

              		</div>
              		<div class="column">
              	 	@foreach ($site_images as $key => $value)
              	 	@if($key%4==2)

              			 <div class="grid-item">
                                <a href="{{$value->url}}"><img src="{{asset("uploads/info_images/$value->imgname ")}}" class="info_page"></a>
                                <p class="mt-3 mb-5"><a href="{{$value->url}}">{{$value->imgtitle}}</a></p>
                                <a class="btn btn-warning show_images" data-imge="{{asset("uploads/info_images/$value->imgname")}}" target="_blank"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                              </div>
                        @endif
              		@endforeach

              		</div>

              		<div class="column">
              	 	@foreach ($site_images as $key => $value)
              	 	@if($key%4==3)

              			 <div class="grid-item">
                                <a href="{{$value->url}}"><img src="{{asset("uploads/info_images/$value->imgname ")}}" class="info_page"></a>
                                <p class="mt-3 mb-5"><a href="{{$value->url}}">{{$value->imgtitle}}</a></p>
                                <a class="btn btn-warning show_images" data-imge="{{asset("uploads/info_images/$value->imgname")}}" target="_blank"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                              </div>
                        @endif
              		@endforeach

              		</div>

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