<!-- Sidebar -->
<div class="bg-primary shadow" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action  border-bottom border-danger">Dashboard</a>
        <a href="{{route('letters.index')}}" class="list-group-item list-group-item-action  border-bottom border-danger">Mes messages</a>
       @role('Admin')
        <a href="{{route("users.index")}}" class="list-group-item list-group-item-action  border-bottom border-danger">Utilisateurs</a>
        @endrole
    </div>
</div>
<!-- /#sidebar-wrapper -->
