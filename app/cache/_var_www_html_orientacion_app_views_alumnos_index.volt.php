<h2 class="page-header">
    Looking for a student?
</h2>
<?php echo $this->getContent(); ?>

<?php echo $this->tag->form(array('alumnos/search')); ?>
<?php foreach ($form as $element) { ?>
    <div class="form-group">
        <?php echo $element->label(); ?>
        <div>
            <?php echo $element; ?>
        </div>
    </div>
<?php } ?>

<div class="form-group">
    <?php echo $this->tag->submitButton(array('Search for Students', 'class' => 'btn btn-primary')); ?>
    <?php if ($admin) { ?>
    <?php echo $this->tag->linkTo(array('alumnos/new', 'Create new Student', 'class' => 'btn btn-default')); ?>
    <?php } ?>
</div>
<?php echo $this->tag->endForm(); ?>