<?php echo $this->getContent(); ?>
<div class="page-header">
    <h1>User panel</h1>
</div>
<?php echo $this->tag->linkTo(array('userpanel/changepassword', 'Change password', 'class' => 'btn btn-primary col-sm-12')); ?>