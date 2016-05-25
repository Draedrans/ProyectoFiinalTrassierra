<?php if ($this->length($observaciones) == 0) { ?>
    Este alumno no tiene ningún dato
    <br>
    <h1>:3</h1>
<?php } else { ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Observaciones</th>
            <?php if ($admin) { ?>
                <td>Acciones</td>
            <?php } ?>
        </tr>
        <?php foreach ($observaciones as $item) { ?>
            <?php if (($item->Acceso == 1 && ($Tutor == $Profesor || $admin)) || $item->Acceso == 0) { ?>
                <tr>
                    <td><?php echo $item->Observacion; ?></td>
                    <?php if ($admin) { ?>
                        <td><?php echo $this->tag->linkTo(array('observacionesalum/edit/' . $item->ID, 'Editar', 'class' => 'btn btn-primary')); ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
<?php } ?>
<br>
<?php if ($Tutor == $Profesor || $admin) { ?>
    <?php echo $this->tag->linkTo(array('observacionesalum/new/' . $alumno->NIE, 'Añadir Observación', 'class' => 'btn btn-primary')); ?>
<?php } ?>