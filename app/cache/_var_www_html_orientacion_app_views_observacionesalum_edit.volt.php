<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('alumnos/verObservaciones/', 'Volver')); ?></li>
</ul>

<div class="page-header">
    <h1>
        Editar Observacion
    </h1>
</div>

<?php echo $this->tag->form(array('observacionesalum/save')); ?>

<?php foreach ($form as $element) { ?>
    <div class="form-group">
        <?php if ($element->getName() == 'ID' || $element->getName() == 'alumnos_NIE') { ?>
            <?php echo $element; ?>
        <?php } else { ?>
            <?php echo $element->label(); ?>
            <div>
                <?php echo $element; ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <?php echo $this->tag->submitButton(array('Modificar Observacion', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>