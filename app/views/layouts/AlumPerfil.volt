<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">
            Notebook
        </h3>
        {{ elements.getMenu() }}
    </div>

</div>
<div class="inner cover">
    <h1>{{ alumno.Nombre }}  {{ alumno.apellidos }}</h1>
        <h4>
            {{ link_to("alumnos/verPerfil/"~ alumno.NIE, "Datos del alumno", "class":"btn btn-default") }}
            {{ link_to("alumnos/verObservaciones/"~ alumno.NIE, "Observaciones", "class":"btn btn-default") }}
            {{ link_to("alumnos/verPerfil/"~ alumno.NIE, "Incidencias", "class":"btn btn-default") }}
            {{ link_to("alumnos/verPerfil/"~ alumno.NIE, "Familia   ", "class":"btn btn-default") }}
        </h4>
    {{ content() }}
</div>