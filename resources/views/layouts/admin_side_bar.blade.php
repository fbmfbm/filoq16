
 <ul class="nav nav-sidebar sidebar-nav">
    <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-home"></i> Accueil</a></li>
    <li><a href="thema"><i class="fa fa-dashboard"></i> Rapports</a></li>
    @can('display_role')
        <li><a href="{{ url('/admin/role') }}"><i class="fa fa-cube"></i> Roles</a></li>
    @endcan
    @can('users_add')
        <li><a href="{{ url('/admin/user') }}"><i class="fa fa-users" aria-hidden="true"></i> Utilisateurs</a></li>
    @endcan
    <li role="separator" class="divider"><hr></li>
    <li><a href="{{ url('/admin/logstat') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> Logs</a></li>

 </ul>

