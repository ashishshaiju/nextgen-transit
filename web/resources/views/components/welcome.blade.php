
    @if (Auth::user()->hasRole('student'))
        @include('roles.student.dashboard')
    @elseif(Auth::user()->hasRole('staff'))
        @include('roles.staff.dashboard')
    @elseif(Auth::user()->hasRole('parent'))
        @include('roles.parent.dashboard')
    @elseif(Auth::user()->hasRole('driver'))
        @include('roles.driver.dashboard')
    @elseif(Auth::user()->hasRole('admin'))
        @include('roles.admin.dashboard')
    @endif
