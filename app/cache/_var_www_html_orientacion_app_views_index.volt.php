<!DOCTYPE html>
<!--suppress HtmlUnknownTarget -->
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php echo $this->tag->getTitle(); ?>
    <?php echo $this->tag->stylesheetLink('css/fontello.css'); ?>
    <?php echo $this->tag->stylesheetLink('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?php if ($fondo) { ?>
        <?php echo $this->tag->stylesheetLink('css/bootstrap-themecloud.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/clarito.css'); ?>
    <?php } else { ?>
        <?php echo $this->tag->stylesheetLink('css/bootstrap-theme.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/notebook.css'); ?>
    <?php } ?>
    <?php echo $this->tag->stylesheetLink('css/familytree.css'); ?>
    <?php echo $this->tag->stylesheetLink('bower_components/animate.css/animate.min.css'); ?>
    <?php echo $this->tag->stylesheetLink('bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css'); ?>
</head>
<body id="clouds">
<?php if ($fondo) { ?>
        <div class="cloud x1"></div>
        <!-- Time for multiple clouds to dance around -->
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
<?php } ?>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <?php echo $this->getContent(); ?>

        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo $this->tag->javascriptInclude('bower_components/jquery/dist/jquery.min.js'); ?>
<!-- Latest compiled and minified JavaScript -->
<?php echo $this->tag->javascriptInclude('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
<?php echo $this->tag->javascriptInclude('bower_components/bootbox.js/bootbox.js'); ?>
<?php echo $this->tag->javascriptInclude('bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js'); ?>
<?php echo $this->assets->outputJs(); ?>
<?php echo $this->flash->output(); ?>
</body>
</html>
