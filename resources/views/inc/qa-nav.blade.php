<div class="main-header">
    <div class="logo">
        <img src="{{ asset('global/img/sidebarlogo.png') }}" alt="{{ config('app.name') }}">
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="d-flex align-items-center">
        <!-- / Mega menu -->
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <i class="search-icon text-muted i-Magnifi-Glass1"></i>
        </div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->
        <!-- Notificaiton -->
        <div class="dropdown">
            <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-primary">{{count(auth()->user()->unreadNotifications)}}</span>
                <i class="i-Bell text-muted header-icon"></i>
            </div>
            <!-- Lead Notification dropdown -->
            <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                @php
                $k = 0;
                @endphp
                @foreach(auth()->user()->unreadnotifications()->latest()->take(10)->get() as $notifications)
                @if($notifications->type == 'App\Notifications\TaskNotification')
                <a href="{{ route('qa.task.show', ['id' => $notifications->data['task_id'], 'notify' => $notifications->id]) }}" class="dropdown-item d-flex">
                @endif
                    <div class="notification-icon">
                        <i class="i-Speach-Bubble-8 text-primary mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span class="lead-heading">{{$notifications->data['text']}}</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-3">{{ $notifications->created_at->diffForHumans() }}</span>
                        </p>
                        <p class="text-small text-muted m-0">{{$notifications->data['details']}}</p>
                    </div>
                </a>
                @if($loop->last)
                    
                @endif
                @php
                    $k++;
                @endphp
                @endforeach
                <a href="{{ route('notification.all.read') }}" class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Check text-primary mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span class="lead-heading">Mark All As Read</span>
                            <span class="flex-grow-1"></span>
                        </p>
                    </div>
                </a>
                <a href="{{ route('qa.my-notifications') }}" class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Check text-primary mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span class="lead-heading">View all</span>
                            <span class="flex-grow-1"></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- Notificaiton End -->
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <span class="auth-name">{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
                @if(Auth::user()->image != '')
                <img src="{{ asset(Auth::user()->image) }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @else
                <img src="{{ asset('global/img/user.png') }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @endif
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }} {{ Auth::user()->last_name}}
                    </div>
                    <!--<a class="dropdown-item" href="{{ route('production.profile') }}">Edit Profile</a>-->
                    <!--<a class="dropdown-item" href="#">Change Password</a>-->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            @if(Auth::user()->status == 0)
            <li class="nav-item active">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">No Option Available</span>
                </a>
                <div class="triangle"></div>
            </li>
            @else
{{--            <li class="nav-item {{ (request()->routeIs('production.dashboard'))? 'active' : '' }}">--}}
{{--                <a class="nav-item-hold" href="{{ route('production.dashboard') }}">--}}
{{--                    <i class="nav-icon i-Bar-Chart"></i>--}}
{{--                    <span class="nav-text">Dashboard</span>--}}
{{--                </a>--}}
{{--                <div class="triangle"></div>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ (request()->routeIs('production.notification'))? 'active' : '' }}">--}}
{{--                <a class="nav-item-hold" href="{{ route('production.notification') }}">--}}
{{--                    <i class="nav-icon i-Bell"></i>--}}
{{--                    <span class="nav-text">Notification</span>--}}
{{--                </a>--}}
{{--                <div class="triangle"></div>--}}
{{--            </li>--}}
            <li class="nav-item {{ (request()->routeIs('qa.dashboard'))? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('qa.dashboard') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ ( request()->routeIs('qa.home') || request()->routeIs('qa.task.show') )? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('qa.home') }}">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Tasks</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ ( request()->routeIs('qa.completed_tasks') )? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('qa.completed_tasks') }}">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Completed Tasks</span>
                </a>
                <div class="triangle"></div>
            </li>
            @if(auth()->user()->is_support_head)
                <li class="nav-item {{ ( request()->routeIs('qa.user.qa') ) || ( request()->routeIs('qa.user.qa.edit') ) || ( request()->routeIs('qa.user.qa.create') )  ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('qa.user.qa') }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">QA</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
{{--            <li class="nav-item {{ ( request()->routeIs('production.subtask.assigned') || request()->routeIs('production.subtask.show') ) ? 'active' : '' }}">--}}
{{--                <a class="nav-item-hold" href="{{ route('production.subtask.assigned') }}">--}}
{{--                    <i class="nav-icon i-Receipt-4"></i>--}}
{{--                    <span class="nav-text">Sub Tasks</span>--}}
{{--                </a>--}}
{{--                <div class="triangle"></div>--}}
{{--            </li>--}}
            @endif
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>