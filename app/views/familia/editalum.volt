{{ form("familia/save") }}
<b>Familiar</b>
<select name="alumnos_NIE_Familiar" class="form-control">
    {% for alumno in alumnos %}
        {% if aNIE==alumno.NIE %}
        <option value="{{ alumno.NIE }}">{{ alumno.Nombre }} {{ alumno.apellidos }}, {{ alumno.CursoActual }}</option>
    {% else %}
    {% endif %}
    {% endfor %}
</select>
{% for element in form %}
    <div class="form-group">
        {% if element.getName()!="alumnos_NIE" %}
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
                <a href="/orientacion/familia/delete/?NIE={{ NIE }}&aNIE={{ aNIE }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Delete family member</a>
            {% else %}
                <a href="/orientacion/alumnos/verPerfil/{{ aNIE }}" class="btn btn-success" ><i class="glyphicon glyphicon-arrow-right"></i> Ir al perfil del alumno</a>
                <a href="/orientacion/familia/delete/?NIE={{ NIE }}&aNIE={{ aNIE }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Borrar familiar</a>
            {% endif %}
        </h4>
    </div>
</div>
{{ end_form() }}