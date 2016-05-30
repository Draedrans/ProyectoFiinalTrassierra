<ul class="pager">
    <li class="previous">{{ link_to("alumnos/verObservaciones/"~ NIE , "Volver") }}</li>
</ul>

<div class="page-header">
    <h1>
        Editar Observacion
    </h1>
</div>

{{ form("observacionesalum/save") }}

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