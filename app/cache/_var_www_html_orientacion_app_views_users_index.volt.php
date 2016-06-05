<h2 class="page-header">
    Search users
</h2>
<?php echo $this->getContent(); ?>

<?php echo $this->tag->form(array('users/search')); ?>
<?php foreach ($form as $element) { ?>
    <div class="form-group">
        <?php echo $element->label(); ?>
        <div>
            <?php echo $element; ?>
        </div>
    </div>
<?php } ?>

<div class="form-group">
    <?php echo $this->tag->submitButton(array('Search for users', 'class' => 'btn btn-primary')); ?>
    <?php if ($admin) { ?>
    <?php echo $this->tag->linkTo(array('users/new', 'Create new user', 'class' => 'btn btn-default')); ?>
    <?php } ?>
</div>
<?php echo $this->tag->endForm(); ?>