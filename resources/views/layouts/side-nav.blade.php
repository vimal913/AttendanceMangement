<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="{{route('dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="" /></a>
                <h2>{{Auth::user()->name}}</h2>
            </div>

        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a class="has-arrow">
                                <i class="fa-solid fa-person-chalkboard"></i>&nbsp;
                               <span class="mini-click-non">TEACHER</span>
                            </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Dashboard v.1" href="{{url('/teacher')}}"><span class="mini-sub-pro">Teachers-List</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-sharp fa-solid fa-graduation-cap"></i> <span class="mini-click-non">STUDENT</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="{{url('/student')}}"><span class="mini-sub-pro">Student-List</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-sharp fa-solid fa-chalkboard"></i> <span class="mini-click-non">CLASSES</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="{{url('/class')}}"><span class="mini-sub-pro">Class-List</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-clipboard-user"></i>&nbsp; <span class="mini-click-non">ATTENDANCE</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Data Maps" href="{{url('/attendance')}}"><span class="mini-sub-pro">Attendance</span></a></li>
                            <li><a title="Google Map" href="{{url('/attendanceview')}}"><span class="mini-sub-pro">Attendance-History</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
