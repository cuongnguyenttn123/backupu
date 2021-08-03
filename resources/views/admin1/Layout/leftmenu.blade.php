<div class="left-sidebar-pro">
    <nav id="sidebar" class="action">
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="">
                        {{--<a  href="{{url('admin/dashboard')}}">--}}
                            {{--<span class="icon-wrap"><i class="fas fa-home"></i></span>--}}
                            {{--<span class="mini-click-non">Dashboard</span>--}}
                        {{--</a>--}}

                    </li>
                    @if($per != '1')
                    <li id="client_list1">
                        <a title="Master" class="has-arrow" href="all-professors.html" aria-expanded="false">
                            <span class="icon-wrap">
                                <i class="fas fa-list-ul"></i>
                            </span> <span class="mini-click-non">ClientList</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            @if($per == '2')
                                <li id="master_item"><a title="Sports List" href="{{url('admin/admin')}}"><span class="mini-sub-pro">Admins</span></a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <li id="subadmin">
                        <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="icon-wrap"><i class="fas fa-user-tie"></i></span> <span class="mini-click-non">Customers</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li id="all_subadmin"><a title="All Professors" href="{{url('customer/all_customer')}}"><span class="mini-sub-pro">All Customers</span></a></li>
                            {{--<li id="add_subadmin"><a title="Add Subadmin" href="{{url('customer/add_customer')}}"><span class="mini-sub-pro">Add Customers</span></a></li>--}}
                        </ul>
                    </li>
                    <li id="player">
                        <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="icon-wrap"><i class="fas fa-landmark"></i></span> <span class="mini-click-non">Restaurants</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li id="all_player"><a title="All Player" href="{{url('all_restaurant')}}"><span class="mini-sub-pro">All Restaurants</span></a></li>
                            @if($per == 2 || $per == 0)
                            <li><a title="Add Player" href="{{url('add/restaurant')}}"><span class="mini-sub-pro">Add Restaurants</span></a></li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Reservations</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href=""><span class="mini-sub-pro">Inbox</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>