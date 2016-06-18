{{ form("familia/save") }}
<b>Familiar</b>
<select name="alumnos_NIE_Familiar" class="form-control">
    {% for alumno in alumnos %}
        <option value="{{ alumno.NIE }}">{{ alumno.Nombre }} {{ alumno.apellidos }}, {{ alumno.CursoActual }}</option>
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
                {{ submit_button("Add", "class": "btn btn-primary") }}
            {% else %}
                {{ submit_button("Crear familiar", "class": "btn btn-primary") }}
            {% endif %}
        </h4>
    </div>
</div>
{{ end_form() }}