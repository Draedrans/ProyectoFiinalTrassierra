{{ form("auto/uploadexpediente",'enctype': 'multipart/form-data') }}
{% for element in form %}
    <div class="form-group">
        {% if element.getName()!="NIE" %}
            {{ element.label() }}
        {% endif %}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        {{ submit_button("Actualizar expediente", "class": "btn btn-primary") }}
    </div>
</div>
{{ end_form() }}