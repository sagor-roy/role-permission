@if(Auth::user()->role_id != 0)
@if(Auth::user()->sectionCheck('about'))
<li class="nav-item">
    <a class="nav-link {{request()->is('admin/about') ? 'active':''}}" href="{{route('admin.about')}}"><i class="fa fa-fw fa-rocket text-warning"></i>
        <span class="mx-2">About Page</span></a>
</li>
@endif
@if(Auth::user()->sectionCheck('contact'))
<li class="nav-item">
    <a class="nav-link {{request()->is('admin/contact') ? 'active':''}}" href="{{route('admin.contact')}}"><i class="fab fa-fw fa-wpforms text-danger"></i>
        <span class="mx-2">Contact Page</span></a>
</li>
@endif
@if(Auth::user()->sectionCheck('staff'))
<li class="nav-item">
    <a class="nav-link {{request()->is('admin/staff-manage') ? 'active':''}}" href="{{route('admin.staff')}}"><i class="fas fa-user-alt text-info"></i>
        <span class="mx-2">Staff Manage</span></a>
</li>
@endif
@if(Auth::user()->sectionCheck('role'))
<li class="nav-item">
    <a class="nav-link {{request()->is('admin/role-permission') ? 'active':''}}" href="{{route('admin.role')}}"><i class="fas fa-fw fa-table text-primary"></i>
        <span class="mx-2">Role Permission</span></a>
</li>
@endif
@endif