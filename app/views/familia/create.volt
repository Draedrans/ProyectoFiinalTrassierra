{{ form("familia/save") }}
{% for element in form %}
    <div class="form-group">
        {% if element.getName()!="" %}
            {{ element.label() }}
        {% endif %}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <h4>
            {{ submit_button("Cambiar familiar", "class": "btn btn-primary") }}
        </h4>
    </div>
</div>
{{ end_form() }}