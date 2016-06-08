<!DOCTYPE html>
<!--suppress HtmlUnknownTarget -->
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {{ get_title() }}
    {{ stylesheet_link("css/fontello.css") }}
    {{ stylesheet_link("bower_components/bootstrap/dist/css/bootstrap.min.css") }}
    {{ stylesheet_link("css/bootstrap-theme.css") }}
    {{ stylesheet_link("css/familytree.css") }}
    {{ stylesheet_link("bower_components/animate.css/animate.min.css") }}
    {{ stylesheet_link("bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css") }}
    {{ stylesheet_link("css/cupo.css") }}
</head>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            {{ content() }}

        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ javascript_include("bower_components/jquery/dist/jquery.min.js") }}
<!-- Latest compiled and minified JavaScript -->
{{ javascript_include("bower_components/bootstrap/dist/js/bootstrap.min.js") }}
{{ javascript_include("bower_components/bootbox.js/bootbox.js") }}
{{ javascript_include("bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js") }}
{{ assets.outputJs() }}
{{ flash.output() }}
</body>
</html>
