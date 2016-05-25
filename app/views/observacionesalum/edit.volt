<ul class="pager">
    <li class="previous">{{ link_to("observacionesalum/search", "Go back") }}</li>
</ul>

<div class="page-header">
    <h1>
        Editar Observacion
    </h1>
</div>

{{ form("observacionesalum/save") }}

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
        {{ submit_button("Modificar Alumno", "class": "btn btn-primary") }}
    </div>
</div>
{{ end_form() }}