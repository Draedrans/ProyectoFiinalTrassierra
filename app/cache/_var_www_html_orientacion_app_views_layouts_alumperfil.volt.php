<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">
            Notebook
        </h3>
        <?php echo $this->elements->getMenu(); ?>
    </div>

</div>
<div class="inner cover">
    <h1><?php echo $alumno->Nombre; ?>  <?php echo $alumno->apellidos; ?></h1>
    <h4>
        <?php if ($this->router->getActionName() == 'verPerfil') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verPerfil/' . $alumno->NIE, 'Datos del alumno', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verPerfil/' . $alumno->NIE, 'Datos del alumno', 'class' => 'btn btn-default')); ?>
        <?php } ?>
        <?php if ($this->router->getActionName() == 'verObservaciones') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verObservaciones/' . $alumno->NIE, 'Observaciones', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verObservaciones/' . $alumno->NIE, 'Observaciones', 'class' => 'btn btn-default')); ?>
        <?php } ?>
        <?php if ($this->router->getActionName() == 'verIncidencias') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verIncidencias/' . $alumno->NIE, 'Incidencias', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verIncidencias/' . $alumno->NIE, 'Incidencias', 'class' => 'btn btn-default')); ?>
        <?php } ?>
        <?php if ($this->router->getActionName() == 'verNecesidades') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Necesidades   ', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Necesidades   ', 'class' => 'btn btn-default')); ?>
        <?php } ?>
        <?php if ($this->router->getActionName() == 'verExpediente') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Expediente   ', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Expediente   ', 'class' => 'btn btn-default')); ?>
        <?php } ?>
        <?php if ($this->router->getActionName() == 'verFamilia') { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Familia   ', 'class' => 'btn btn-primary')); ?>
        <?php } else { ?>
            <?php echo $this->tag->linkTo(array('alumnos/verFamilia/' . $alumno->NIE, 'Familia   ', 'class' => 'btn btn-default')); ?>
        <?php } ?>
    </h4>
    <?php echo $this->getContent(); ?>
</div>