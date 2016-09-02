 <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                    <li class="sidebar-brand"> <a href="#"> Filocom au quartier </a> </li>

                    <li class="active"><a href="/"><i class="fa fa-home"></i> Accueil</a></li>
                    <li role="separator" class="divider"><hr></li>
                    <li><a href="thema"><i class="fa fa-dashboard"></i> Rapports</a></li>
                    <li role="separator" class="divider"><hr></li>
                    @can('display_role')
                    <li><a href="/admin/role"><i class="fa fa-cube"></i> Roles</a></li>
                    <li role="separator" class="divider"><hr></li>
                    @endcan
                     @can('users_add')
                    <li><a href="/admin/user"><i class="fa fa-users" aria-hidden="true"></i> Utilisateurs</a></li>
                    <li role="separator" class="divider"><hr></li>
                    @endcan
                 </ul>
             </div>
<!-- /#sidebar-wrapper -->