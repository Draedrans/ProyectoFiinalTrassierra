<h1><?php echo $alumno->Nombre; ?> <?php echo $alumno->apellidos; ?> </h1>
<br>
<h2>Datos Personales</h2>
<table class="table table-bordered table-striped"><tr><th>NIE</th><th>DNI</th><th>Pasaporte</th></tr><tr><td><?php echo $alumno->NIE; ?></td><td><?php echo $alumno->DNI; ?></td><td><?php echo $alumno->Pasaporte; ?></td></tr></table>
<h2>Datos de Nacimiento</h2>
<table class="table table-bordered table-striped"><tr><th>Fecha de Nacimiento</th><th>Lugar de Nacimiento:</th></tr><tr><td><?php echo $alumno->Fecna; ?></td><td><?php echo $alumno->Lugna; ?></td></tr></table>
<h2>Direccion</h2>
<table class="table table-bordered table-striped"><tr><th>Provincia</th><th>Localidad</th><th>Direccion</th></tr><tr><td><?php echo $alumno->Provincia; ?></td><td><?php echo $alumno->Localidad; ?></td><td><?php echo $alumno->Direccion; ?></td></tr></table>
<h2>Contacto</h2>
<table class="table table-bordered table-striped"><tr><th>Telefono</th><th>Telefono de Urgencia</th></tr><tr><td><?php echo $alumno->Tlf; ?></td><td><?php echo $alumno->TlfUrg; ?></td></tr></table>
<?php if ($admin) { ?>
<?php echo $this->tag->linkTo(array('alumnos/edit/' . $alumno->NIE, '<i class=\'glyphicon glyphicon-edit\'></i> Modificar Datos', 'class' => 'btn btn-default')); ?>
<?php } ?>
<br>
<?php echo $observaciones->ID; ?>

<h1>Comentarios</h1>