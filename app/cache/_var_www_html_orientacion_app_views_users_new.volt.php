<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('users/index', 'Go back')); ?></li>
</ul>

<div class="page-header">
    <h1>
        Create new user
    </h1>
</div>
<?php echo $this->tag->form(array('users/create')); ?>

    <?php foreach ($form as $element) { ?>
        <div class="form-group">
            <?php echo $element->label(); ?>
            <div>
                <?php echo $element; ?>
            </div>
        </div>
    <?php } ?>


    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Create user', 'class' => 'btn btn-primary')); ?>
    </div>
<?php echo $this->tag->endForm(); ?>