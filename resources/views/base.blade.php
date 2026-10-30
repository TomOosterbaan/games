<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Game Collection</title>
</head>
<body>
    <div class="container" style="margin:40px;">
        <h1 class="display-4">@yield('title')</h1>
        @role('admin')
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item"><a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">Permissions</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->is('role-permissions*') ? 'active' : '' }}" href="{{ route('role-permissions.index') }}">Role-Permissions</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->is('user-roles*') ? 'active' : '' }}" href="{{ route('user-roles.index') }}">Role-Users</a></li>
        </ul>
        @endrole

        @yield('content')
    </div>
</body>
</html>