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
            <a href="/orientacion/alumnos/verPerfil/{{ aNIE }}" class="btn btn-success" ><i class="glyphicon glyphicon-arrow-right"></i> Ir al perfil del alumno</a>
            {{ submit_button('Cambiar familiar', "class": "btn btn-primary") }}
            <a href="/orientacion/familia/delete/?NIE={{ NIE }}&aNIE={{ aNIE }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Borrar familiar</a>
        </h4>
    </div>
</div>
{{ end_form() }}