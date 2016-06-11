{{ form("auto/upload",'enctype': 'multipart/form-data') }}
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
        {% if language %}
            {{ submit_button("Add class", "class": "btn btn-primary") }}
        {% else %}
            {{ submit_button("Insertar clase", "class": "btn btn-primary") }}
        {% endif %}
    </div>
</div>
{{ end_form() }}