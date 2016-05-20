<ul class="pager">
    <li class="previous">{{ link_to("alumnos/index", "Go back") }}</li>
</ul>

<div class="page-header">
    <h1>
        Introducir Alumno
    </h1>
</div>
{{ form("alumnos/create") }}

    {% for element in form %}
        <div class="form-group">
            {{ element.label() }}
            <div>
                {{ element }}
            </div>
        </div>
    {% endfor %}


    <div class="form-group">
        {{ submit_button("Introducir Alumno", "class": "btn btn-primary") }}
    </div>
{{ end_form() }}