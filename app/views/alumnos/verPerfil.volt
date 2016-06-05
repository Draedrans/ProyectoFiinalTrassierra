
<table class="table table-bordered table-striped">
    <tr>
        <td>NIE</td>
        <td>{{ alumno.NIE }}</td>
    </tr>
    <tr>
        <td>DNI/Pasaporte</td>
        <td>{{ alumno.DNI }}</td>
    </tr>
    <tr>
        <td>Curso Actual/Ultimo Curso</td>
        <td>{{ alumno.CursoActual }}</td>
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


{% if admin or alumno.Tutor|lower==Profesor|lower %}
    {{ link_to("alumnos/edit/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar Datos", "class":"btn btn-primary") }}
{% endif %}
