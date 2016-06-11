{% if language %}
    <h2 class="page-header">
        Looking for a student?
    </h2>
    {{ content() }}

    {{ form("alumnos/search") }}
    {% for element in form %}
        <div class="form-group">
            {{ element.label() }}
            <div>
                {{ element }}
            </div>
        </div>
    {% endfor %}

    <div class="form-group">
        {{ submit_button("Search for Students", "class": "btn btn-primary") }}
        {% if admin %}
            {{ link_to("alumnos/new", "Create new Student", "class": "btn btn-default") }}
        {% endif %}
    </div>
    {{ end_form() }}
{% else %}
    <h2 class="page-header">
        Buscar alumnos
    </h2>
    {{ content() }}

    {{ form("alumnos/search") }}
    {% for element in form %}
        <div class="form-group">
            {{ element.label() }}
            <div>
                {{ element }}
            </div>
        </div>
    {% endfor %}

    <div class="form-group">
        {{ submit_button("Buscar", "class": "btn btn-primary") }}
        {% if admin %}
            {{ link_to("alumnos/new", "Crear Alumno", "class": "btn btn-default") }}
        {% endif %}
    </div>
    {{ end_form() }}
{% endif %}
