<div class="page-header">
    <h1>Change password</h1>
</div>
<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('userpanel/savepass')); ?>
<?php foreach ($form as $element) { ?>
    <div class="form-group">
        <?php echo $element->label(); ?>
        <div>
            <?php echo $element; ?>
        </div>
    </div>
<?php } ?>
<div class="form-group">
    <?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-primary')); ?>
    <?php echo $this->tag->linkTo(array('userpanel/index', 'Cancel', 'class' => 'btn btn-default')); ?>
</div>
<?php echo $this->tag->endForm(); ?>