<h6 class="navbar-heading text-muted">GESTIONAR DATOS</h6>
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="./home">
        <i class="ni ni-tv-2 text-primary"></i> Dashboard
    </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./specialties">
            <i class="ni ni-planet text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./doctors">
            <i class="ni ni-single-02 text-orange"></i> Médicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./patients">
            <i class="ni ni-satisfied text-blue"></i> Pacientes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="ni ni-button-power text-info"></i> Cerrar sesión
        </a>
        <form action=" {{ route('logout') }}" method="POST" style="display:none;" id="formLogout">
        @csrf
        </form>
    </li>
</ul>
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">REPORTES</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
        <i class="ni ni-sound-wave text-yellow"></i> Frecuencia de citas
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-palette text-red"></i> Médicos más activos
    </a>
</ul>