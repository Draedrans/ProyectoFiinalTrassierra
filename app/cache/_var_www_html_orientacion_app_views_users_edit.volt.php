<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('users/search', 'Go back')); ?></li>
</ul>

<div class="page-header">
    <h1>
        Edit user
    </h1>
</div>

<?php echo $this->tag->form(array('users/save')); ?>

<?php foreach ($form as $element) { ?>
    <div class="form-group">
        <?php echo $element->label(); ?>
        <?php if (strpos(strtoupper($element->label()), 'PASSWORD')) { ?>
            <p class="help-block">Leave untouched to avoid changing user password</p>
        <?php } ?>
        <div>
            <?php echo $element; ?>
        </div>
    </div>
<?php } ?>
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <?php echo $this->tag->submitButton(array("Save", "class" => "btn btn-primary form-control")) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>