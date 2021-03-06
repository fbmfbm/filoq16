<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
            <i class="fa fa-home"></i> Accueil</a>
    </li>
    @can('display_user')
        <li>
            <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ url('/admin/user') }}">
                <i class="fa fa-users" aria-hidden="true"></i> Utilisateurs</a>
        </li>
    @endcan
    @can('display_role')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/role') ? 'active' : '' }}" href="{{ url('/admin/role') }}">
                <i class="fa fa-cube"></i> Roles</a>
        </li>
    @endcan
    @can('display_perm')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/permission') ? 'active' : '' }}"
               href="{{ url('/admin/permission') }}">
                <i class="fa fa-clone" aria-hidden="true"></i> Permissions</a>
        </li>
    @endcan
    @can('display_file')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/file') ? 'active' : '' }}" href="{{ url('/admin/file') }}">
                <i class="fa fa-files-o" aria-hidden="true"></i> Fichiers</a>
        </li>
    @endcan
    <li role="separator" class="divider">
        <hr>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/logstat') ? 'active' : '' }}" href="{{ url('/admin/logstat') }}">
            <i class="fa fa-line-chart" aria-hidden="true"></i> Logs</a>
    </li>

</ul>

