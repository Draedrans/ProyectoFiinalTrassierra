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
        {% if router.getActionName()=="verPerfil" %}
            {{ link_to("alumnos/verPerfil/"~ alumno.NIE, "Datos del alumno", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verPerfil/"~ alumno.NIE, "Datos del alumno", "class":"btn btn-default") }}
        {% endif %}
        {% if router.getActionName()=="verObservaciones" %}
            {{ link_to("alumnos/verObservaciones/"~ alumno.NIE, "Observaciones", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verObservaciones/"~ alumno.NIE, "Observaciones", "class":"btn btn-default") }}
        {% endif %}
        {% if router.getActionName()=="verIncidencias" %}
            {{ link_to("alumnos/verIncidencias/"~ alumno.NIE, "Incidencias", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verIncidencias/"~ alumno.NIE, "Incidencias", "class":"btn btn-default") }}
        {% endif %}
        {% if router.getActionName()=="verNecesidades" %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Necesidades   ", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Necesidades   ", "class":"btn btn-default") }}
        {% endif %}
        {% if router.getActionName()=="verExpediente" %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Expediente   ", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Expediente   ", "class":"btn btn-default") }}
        {% endif %}
        {% if router.getActionName()=="verFamilia" %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Familia   ", "class":"btn btn-primary") }}
        {% else %}
            {{ link_to("alumnos/verFamilia/"~ alumno.NIE, "Familia   ", "class":"btn btn-default") }}
        {% endif %}
    </h4>
    {{ content() }}
</div>