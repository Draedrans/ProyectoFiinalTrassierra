<h1>{{ alumno.Nombre }} {{ alumno.apellidos }} </h1>
<table class="table table-bordered table-striped">
    <tr>
        <td>NIE</td>
        <td>{{ alumno.NIE }}</td>
    </tr>
    <tr>
        <td>DNI</td>
        <td>{{ alumno.DNI }}</td>
    </tr>
    <tr>
        <td>Pasaporte</td>
        <td>{{ alumno.Pasaporte }}</td>
    </tr>
    <tr>
        <td>Provincia</td>
        <td>{{ alumno.Provincia }}</td>
    </tr>
    <tr>
        <td>Localidad</td>
        <td>{{ alumno.Localidad }}</td>
    </tr>
    <tr>
        <td>Direccion</td>
        <td>{{ alumno.Direccion }}</td>
    </tr>
    <tr>
        <td>Telefono</td>
        <td>{{ alumno.Tlf }}</td>
    </tr>
    <tr>
        <td>Telefono de Urgencia</td>
        <td>{{ alumno.TlfUrg }}</td>
    </tr>
    <tr>
        <td>Fecha de Nacimiento</td>
        <td>{{ alumno.Fecna }}</td>
    </tr>
    <tr>
        <td>Lugar de Nacimiento</td>
        <td>{{ alumno.Lugna }}</td>
    </tr>
    <tr>
        <td>Tutor</td>
        <td>{{ alumno.Tutor }}</td>
    </tr>
</table>


{% if admin %}
    {{ link_to("alumnos/edit/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar Datos", "class":"btn btn-default") }}
{% endif %}
