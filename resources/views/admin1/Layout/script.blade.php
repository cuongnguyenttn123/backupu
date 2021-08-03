<!-- jquery
    ============================================ -->
<script src="{{asset('adminp/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{asset('adminp/js/bootstrap.min.js')}}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{asset('adminp/js/wow.min.js')}}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{asset('adminp/js/jquery-price-slider.js')}}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{asset('adminp/js/jquery.meanmenu.js')}}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{asset('adminp/js/owl.carousel.min.js')}}"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{asset('adminp/js/jquery.sticky.js')}}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{asset('adminp/js/jquery.scrollUp.min.js')}}"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{asset('adminp/js/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('adminp/js/counterup/waypoints.min.js')}}"></script>
<script src="{{asset('adminp/js/counterup/counterup-active.js')}}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{asset('adminp/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('adminp/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{asset('adminp/js/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{asset('adminp/js/metisMenu/metisMenu-active.js')}}"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="{{asset('adminp/js/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('adminp/js/sparkline/jquery.charts-sparkline.js')}}"></script>
<script src="{{asset('adminp/js/sparkline/sparkline-active.js')}}"></script>
<!-- calendar JS
    ============================================ -->
<script src="{{asset('adminp/js/calendar/moment.min.js')}}"></script>
<script src="{{asset('adminp/js/calendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('adminp/js/calendar/fullcalendar-active.js')}}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{asset('adminp/js/plugins.js')}}"></script>
<!-- main JS
    ============================================ -->
<script src="{{asset('adminp/js/main.js')}}"></script>
<!-- tawk chat JS
    ============================================ -->
{{--
<script src="{{asset('adminp/js/tawk-chat.js')}}"></script>--}}

{{--<script src="{{asset('../resources/assets/js/app.js') }}"></script>--}}
{{--<script src="{{asset('js/app.js') }}"></script>--}}
<!-- input-mask JS
		============================================ -->
<script src="{{asset('adminp/js/input-mask/jasny-bootstrap.min.js')}}"></script>
<!-- touchspin JS
		============================================ -->
<script src="{{asset('adminp/js/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('adminp/js/touchspin/touchspin-active.js')}}"></script>
<!-- summernote JS
		============================================ -->
<script src="{{asset('adminp/js/summernote/summernote.min.js')}}"></script>
<script src="{{asset('adminp/js/summernote/summernote-active.js')}}"></script>
<script type="text/javascript">

    /*$(function () {
        $('#markasread').click(function () {
            alert('clicked');
        });

    })*/


    $(document).ready(function() {
        // setInterval(getNotification, 5000);
//        getNotification();
        function formatDate(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
        }

        //var d = new Date('2019-3-4 12:2:0.123');
        //var e = formatDate(d);
        {{--function getNotification() {--}}
            {{--///alert('sdf');--}}
            {{--var user_id='{{auth('admin')->user()->id}}';--}}
            {{--$.ajax({--}}
                {{--url: 'https://oddsexch.com/api/getNotification',--}}
                {{--type: 'post',--}}
                {{--data: {user_id:user_id},--}}
                {{--beforeSend: function (request) {--}}
                    {{--return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));--}}
                {{--},--}}
                {{--success: function (response) {--}}
                    {{--//console.log(response);--}}
                    {{--var obj = JSON.parse(response);--}}
                    {{--//console.log(obj);--}}
                    {{--$('#noti_count span').text(obj.data.length);--}}
                    {{--if (obj.data.length==0){--}}
                        {{--$('#noti_count').css('color','white');--}}
                    {{--}--}}
                    {{--else {--}}
                        {{--$('#noti_count').css('color','wheat');--}}
                    {{--}--}}
                    {{--$('#notification').html('');--}}
                    {{--obj.data.forEach(function(item, index) {--}}
                        {{--//console.log(item);--}}
                        {{--var id='asdfasdf';--}}
                        {{--var html='<li id="'+item['id']+'" style="display: list-item" class="noti_item">' +--}}
                                {{--'<a href="#">' +--}}
                                    {{--'<div class="notification-icon">' +--}}
                                        {{--'<i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>' +--}}
                                    {{--'</div>' +--}}
                                    {{--' <div class="notification-content">' +--}}
                                        {{--'<span class="notification-date">' +formatDate(new Date(item['data']['repliedTime']['date']))+--}}
                                        {{--'</span>' +--}}
                                        {{--'<h2>' +item['data']['sender']['name']+--}}
                                        {{--'</h2>' +--}}
                                        {{--'<p>' +item['data']['content']['message']+--}}
                                        {{--'</p>' +--}}
                                    {{--'</div>' +--}}
                                {{--'</a>' +--}}
                            {{--'</li>';--}}
                        {{--$('#notification').append(html);--}}
                        {{--$('.noti_item').click(function () {--}}
                            {{--var id = $(this).attr("id");--}}
                            {{--console.log(id);--}}
                            {{--$.get('/admin/markAsRead/'+id);--}}
                        {{--});--}}
                    {{--});--}}

                {{--},--}}
                {{--error: function (response) {--}}
                    {{--console.log(response);--}}
                    {{--//alert('error');--}}
                {{--}--}}
            {{--});--}}


        {{--}--}}
        $('.preloader-single').css('display','none');
    });
    function myajax(url,data,reload){
        $.ajax({
            url: url,
            type: 'post',
            data: {parameter:JSON.stringify(data)} ,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                //console.log(response);
                var obj = JSON.parse(response);
                console.log(obj);
                if (reload==true){
                    location.reload();
                }

            },
            error: function(response){
                console.log(response);
                //alert('error');
            }
        });
    }
</script>
