
    <ul class="pager">
    <li class="previous">{{ link_to("alumnos/verIncidencias/"~ NIE , "Volver") }}</li>
</ul>

<div class="page-header">
    <h1>
        Crear Incidencia
    </h1>
</div>

{{ form("observacionesalum/create") }}

{% for element in form %}
    <div class="form-group">
        {% if element.getName()=="ID" or element.getName()=="alumnos_NIE" %}
            {{ element }}
        {% else %}
            {{ element.label() }}
            <div>
                {{ element }}
            </div>
        {% endif %}
    </div>
{% endfor %}
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        {{ submit_button("Añadir Observacion", "class": "btn btn-primary") }}
    </div>
</div>
{{ end_form() }}