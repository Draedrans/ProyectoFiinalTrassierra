<h1><?php echo $alumno->Nombre; ?> <?php echo $alumno->apellidos; ?> </h1>
<table class="table table-bordered table-striped">
    <tr>
        <td>NIE</td>
        <td><?php echo $alumno->NIE; ?></td>
    </tr>
    <tr>
        <td>DNI</td>
        <td><?php echo $alumno->DNI; ?></td>
    </tr>
    <tr>
        <td>Pasaporte</td>
        <td><?php echo $alumno->Pasaporte; ?></td>
    </tr>
    <tr>
        <td>Provincia</td>
        <td><?php echo $alumno->Provincia; ?></td>
    </tr>
    <tr>
        <td>Localidad</td>
        <td><?php echo $alumno->Localidad; ?></td>
    </tr>
    <tr>
        <td>Direccion</td>
        <td><?php echo $alumno->Direccion; ?></td>
    </tr>
    <tr>
        <td>Telefono</td>
        <td><?php echo $alumno->Tlf; ?></td>
    </tr>
    <tr>
        <td>Telefono de Urgencia</td>
        <td><?php echo $alumno->TlfUrg; ?></td>
    </tr>
    <tr>
        <td>Fecha de Nacimiento</td>
        <td><?php echo $alumno->Fecna; ?></td>
    </tr>
    <tr>
        <td>Lugar de Nacimiento</td>
        <td><?php echo $alumno->Lugna; ?></td>
    </tr>
    <tr>
        <td>Tutor</td>
        <td><?php echo $alumno->Tutor; ?></td>
    </tr>
</table>


<?php if ($admin) { ?>
    <?php echo $this->tag->linkTo(array('alumnos/edit/' . $alumno->NIE, '<i class=\'glyphicon glyphicon-edit\'></i> Modificar Datos', 'class' => 'btn btn-default')); ?>
<?php } ?>
