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
            {% if language %}
                <a href="/orientacion/alumnos/verPerfil/{{ aNIE }}" class="btn btn-success" ><i class="glyphicon glyphicon-arrow-right"></i> Go to the Student's profile</a>
                {{ submit_button('Edit', "class": "btn btn-primary") }}
                <a href="/orientacion/familia/delete/?NIE={{ NIE }}&aNIE={{ aNIE }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Delete family member</a>
            {% else %}
                <a href="/orientacion/alumnos/verPerfil/{{ aNIE }}" class="btn btn-success" ><i class="glyphicon glyphicon-arrow-right"></i> Ir al perfil del alumno</a>
                {{ submit_button('Cambiar familiar', "class": "btn btn-primary") }}
                <a href="/orientacion/familia/delete/?NIE={{ NIE }}&aNIE={{ aNIE }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Borrar familiar</a>
            {% endif %}
        </h4>
    </div>
</div>
{{ end_form() }}