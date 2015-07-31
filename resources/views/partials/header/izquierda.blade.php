<div class="navbar-header">
    <button type="button"
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#navbar"
            aria-expanded="false"
            aria-controls="navbar">

        <span class="sr-only">Toggle Navigation</span>
    </button>

        <a href="/" class="navbar-brand">Deportes</a>


</div>{{-- navbar-header--}}
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @if (Auth::check())

            <ul class="nav navbar-nav">
                <li><a href="actividad"> Actividades </a>
                </li>
            </ul>
    @endif
