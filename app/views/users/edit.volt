<ul class="pager">
    <li class="previous">{{ link_to("users/search", "Go back") }}</li>
</ul>

<div class="page-header">
    <h1>
        Edit user
    </h1>
</div>

{{ form("users/save") }}

{% for element in form %}
    <div class="form-group">
        {{ element.label() }}
        {% if strpos(strtoupper(element.label()), "PASSWORD") %}
            <p class="help-block">Leave untouched to avoid changing user password</p>
        {% endif %}
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