{% if language %}
    <ul class="pager">
        <li class="previous">{{ link_to("alumnos/search", "Go back") }}</li>
    </ul>

    <div class="page-header">
        <h1>
            Edit Student
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
            {{ submit_button("Edit", "class": "btn btn-primary") }}
        </div>
    </div>
    {{ end_form() }}
{% else %}
    <ul class="pager">
    <li class="previous">{{ link_to("alumnos/search", "Volver") }}</li>
    </ul>

    <div class="page-header">
        <h1>
            Editar alumno
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
            {{ submit_button("Modificar Alumno", "class": "btn btn-primary") }}
        </div>
    </div>
    {{ end_form() }}
{% endif %}