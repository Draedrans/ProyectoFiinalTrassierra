<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('alumnos/index', 'Go back')); ?></li>
</ul>

<div class="page-header">
    <h1>
        Introducir Alumno
    </h1>
</div>
<?php echo $this->tag->form(array('alumnos/create')); ?>

    <?php foreach ($form as $element) { ?>
        <div class="form-group">
            <?php echo $element->label(); ?>
            <div>
                <?php echo $element; ?>
            </div>
        </div>
    <?php } ?>


    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Introducir Alumno', 'class' => 'btn btn-primary')); ?>
    </div>
<?php echo $this->tag->endForm(); ?>