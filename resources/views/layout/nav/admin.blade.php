<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-files"></i>
            <span>{{__('Setting')}}</span>
        </a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
            {{--  <li class="py-1"><a href="{{route(currentUser().'.terms.index')}}">{{__('Terms & Condition')}}</a></li>  --}}
            <li class="py-1"><a href="{{route(currentUser().'.settings.index')}}">{{__('Website Settings')}}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.booking.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Booking') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.seat_detail.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Seat Detail') }}</span>
        </a>
    </li>
    {{-- <li class="sidebar-item">
        <a href="{{route(currentUser().'.category.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Category') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.post.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Post') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.page.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Page') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.about_setting.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('About') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.advertisement.index')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('Advertisement') }}</span>
        </a>
    </li> --}}
    
</ul>
