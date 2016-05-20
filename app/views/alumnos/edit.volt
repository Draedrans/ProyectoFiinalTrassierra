<ul class="pager">
    <li class="previous">{{ link_to("alumnos/search", "Go back") }}</li>
</ul>

<div class="page-header">
    <h1>
        Edit student
    </h1>
</div>

{{ form("alumnos/save") }}

{% for element in form %}
    <div class="form-group">
        {{ element.label() }}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <?php echo $this->tag->submitButton(array("Save", "class" => "btn btn-primary form-control")) ?>
    </div>
</div>
{{ end_form() }}