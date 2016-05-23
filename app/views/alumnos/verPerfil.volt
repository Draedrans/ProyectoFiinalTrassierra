<h1>{{alumno.Nombre}} {{alumno.apellidos}} </h1>
<br>
<h2>Datos Personales</h2>
<table class="table table-bordered table-striped"><tr><th>NIE</th><th>DNI</th><th>Pasaporte</th></tr><tr><td>{{alumno.NIE}}</td><td>{{alumno.DNI}}</td><td>{{alumno.Pasaporte}}</td></tr></table>
<h2>Datos de Nacimiento</h2>
<table class="table table-bordered table-striped"><tr><th>Fecha de Nacimiento</th><th>Lugar de Nacimiento:</th></tr><tr><td>{{alumno.Fecna}}</td><td>{{alumno.Lugna}}</td></tr></table>
<h2>Direccion</h2>
<table class="table table-bordered table-striped"><tr><th>Provincia</th><th>Localidad</th><th>Direccion</th></tr><tr><td>{{alumno.Provincia}}</td><td>{{alumno.Localidad}}</td><td>{{alumno.Direccion}}</td></tr></table>
<h2>Contacto</h2>
<table class="table table-bordered table-striped"><tr><th>Telefono</th><th>Telefono de Urgencia</th></tr><tr><td>{{alumno.Tlf}}</td><td>{{alumno.TlfUrg}}</td></tr></table>
{% if admin %}
{{ link_to("alumnos/edit/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar Datos", "class":"btn btn-default") }}
{% endif %}
<br>
{{ observaciones.ID }}

<h1>Comentarios</h1>