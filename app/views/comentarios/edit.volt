{% if language %}
    <ul class="pager">
        <li class="previous">{{ link_to("alumnos/verIncidencias/"~ NIE , "Go Back") }}</li>
    </ul>

    <div class="page-header">
        <h1>
            Edit Intervention
        </h1>
    </div>


    {{ form("comentarios/save") }}

    {% for element in form %}
        <div class="form-group">
            {% if element.getName()=="users_username" or element.getName()=="alumnos_NIE" %}
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
            {{ submit_button("Edit", "class": "btn btn-primary") }}
        </div>
    </div>
    {{ end_form() }}
{% else %}
    <ul class="pager">
        <li class="previous">{{ link_to("alumnos/verIncidencias/"~ NIE , "Volver") }}</li>
    </ul>

    <div class="page-header">
        <h1>
            Editar Intervencion
        </h1>
    </div>


    {{ form("comentarios/save") }}

    {% for element in form %}
        <div class="form-group">
            {% if element.getName()=="users_username" or element.getName()=="alumnos_NIE" %}
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
            {{ submit_button("Editar Inctervencion", "class": "btn btn-primary") }}
        </div>
    </div>
    {{ end_form() }}
{% endif %}