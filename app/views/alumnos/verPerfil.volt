
{% if language %}
    <table class="table table-bordered table-striped">
        {% if foto and foto!=alumno.NIE %}
            <tr>
                <td>Photo</td>
                <td><img src="/orientacion/public/photos/{{ foto }}" height="100" width="100"></td>
            </tr>
        {% endif %}
        <tr>
            <td>NIE</td>
            <td>{{ alumno.NIE }}</td>
        </tr>
        <tr>
            <td>DNI/Passport</td>
            <td>{{ alumno.DNI }}</td>
        </tr>
        <tr>
            <td>Last Year</td>
            <td>{{ alumno.CursoActual }}</td>
        </tr>

        <tr>
            <td>Age</td>
            <td>{{ edad }}</td>
        </tr>
        <tr>
            <td>Birthdate</td>
            <td>{{ alumno.Fecna }}</td>
        </tr>
        <tr>
            <td>Province</td>
            <td>{{ alumno.Provincia }}</td>
        </tr>
        <tr>
            <td>City</td>
            <td>{{ alumno.Localidad }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ alumno.Direccion }}</td>
        </tr>
        <tr>
            <td>BirthPlace</td>
            <td>{{ alumno.Lugna }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ alumno.Tlf }}</td>
        </tr>
        <tr>
            <td>Emergency Phone</td>
            <td>{{ alumno.TlfUrg }}</td>
        </tr>
        <tr>
            <td>Teacher</td>
            <td>{{ terminator.Nombre }}</td>
        </tr>
    </table>


    {% if admin or alumno.Tutor|lower==Profesor|lower %}
        <h4>
            {{ link_to("auto/addphoto/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Edit/Add Photo", "class":"btn btn-primary") }}
            {{ link_to("alumnos/edit/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Edit Data", "class":"btn btn-primary") }}
        </h4>
    {% endif %}

{% else %}
    <table class="table table-bordered table-striped">
        {% if foto and foto!=alumno.NIE %}
            <tr>
                <td>Foto</td>
                <td><img src="/orientacion/public/photos/{{ foto }}" height="100" width="100"></td>
            </tr>
        {% endif %}
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
            <td>Edad</td>
            <td>{{ edad }}</td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td>{{ alumno.Fecna }}</td>
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
            <td>Lugar de Nacimiento</td>
            <td>{{ alumno.Lugna }}</td>
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
            <td>Tutor</td>
            <td>{{ alumno.Tutor }}</td>
        </tr>
    </table>


    {% if admin or alumno.Tutor|lower==Profesor|lower %}
        <h4>
            {{ link_to("auto/addphoto/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar/Añarir Foto", "class":"btn btn-primary") }}
            {{ link_to("alumnos/edit/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar Datos", "class":"btn btn-primary") }}
        </h4>
    {% endif %}

{% endif %}