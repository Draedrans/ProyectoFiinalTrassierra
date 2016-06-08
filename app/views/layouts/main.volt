<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">
            Notebook
        </h3>
        {{ elements.getMenu() }}
    </div>
</div>
<div class="inner cover">
    {{ content() }}
    <div class="mastfoot">
        <div class="inner">
            <p>
                &copy; <a href="{{ url("index/easteregg") }}">Greg Bueno</a> 2016 - Built with Phalcon {{ version() }}
            </p>
        </div>
    </div>
</div>
