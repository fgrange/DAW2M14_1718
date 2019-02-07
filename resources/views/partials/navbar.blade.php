<nav class="navbar navbar-inverse navbar-static-top" id="topNavBar">

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand" href="#">Home</a>
    <!--
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    -->
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li>
                <!-- class="active" -->
                <a class="nav-link" href="{{url('/abrirCarpeta/public')}}">Public<span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a href="{{url('/editarPerfil/')}}">Editar perfil</a>
            </li>
            <li>
                <a href="{{url('/CU_51/')}}">Logout</a>
            </li>
        </ul>
        <!--
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
        -->
        <form class="navbar-form navbar-right" method="GET" action="{{url('/resultadoBusqueda/')}}" style="margin-right: 0px;">
            <div class="form-group">
                <input type="text"  name="cadena" id="cadena"  class="form-control" placeholder="Buscar Documents">
            </div>
            <button class="btn btn-default">Buscar</button>
        </form>
    </div>
</nav>
<div id="mySidenav" class="sidenav">
    <a href="{{url('/abrirCarpeta/personal')}}">Personal</a>
    <a href="{{url('/CU_42_GestionarUsuaris')}}">Gestionar Usuaris</a>
    <a href="{{url('/CU_36_GestionarGrups')}}">Gestionar Grups</a>
    <a href="{{url('/mostar_workflows')}}">Workflows</a>
    <a href="{{url('/consultarLogs')}}">Consultar Logs</a>
    <a href="#">Notificacions</a>
    <a href="#">Contact</a>
</div>

<script>
    <!--
            Posar funció window.width per a obrir o tancar la navbar
            Evitar que el main es "caigui"
            -- >
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>