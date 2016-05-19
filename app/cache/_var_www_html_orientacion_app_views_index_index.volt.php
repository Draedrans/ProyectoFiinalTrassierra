<?php if ($language) { ?>
<div class="page-header">
    <h1>Welcome</h1>
</div>

<p>You're now flying with Notebook. Great things are about to happen!</p>

You may want to log in before you start.
<p>
</p>

</p>
    <?php } else { ?>
        <div class="page-header">
            <h1>Bienvenido</h1>
        </div>
    <p>Para comenzar, por favor logueate</p>
<?php } ?>

    <?php echo $this->tag->linkTo(array('session', 'Login', 'class' => 'btn btn-default btn-lg')); ?>