{% if page.items|length==0 %}
    Este alumno no tiene ninguna incidencia
    <br>
    <h1>:3</h1>
{% else %}
    <table class="table table-bordered table-striped">
        <tr>
            {% for item in page.items %}
            <th>
                Usuario : {{ item.users_username }}
            </th>
            <th>
                {{ item.date }}
            </th>
            <th>
                Tipo de incidencia : {{ item.Incidencia }}
            </th>
        </tr>
        <tr>
            <td>
                Descripcion
            </td>
            <td colspan="2">
                {{ item.Moitivo }}
            </td>
        </tr>
        <tr>
            {% if not item.Asistentes|length==0 %}
            <td>
                Asistentes
            </td>
            <td colspan="2">
                {{ item.Asistentes }}
            </td>
        </tr>
        {% endif %}
        <tr>
            {% if not item.Acuerdos|length==0 %}
                <td>
                    Acuerdos
                </td>
                <td colspan="2">
                    {{ item.Acuerdos }}
                </td>
            {% endif %}
        </tr>
        {% endfor %}
    </table>
    {% if item.users_username|lower==Profesor %}
        {{ link_to("comentarios/edit/"~ item.date, "Editar Incidencia", "class":"btn btn-primary") }}
    {% endif %}
    <nav>
        <ul class="pagination">
            <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE, "Primero") }}</li>
            <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.before, "Anterior") }}</li>
            <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.next, "Siguiente") }}</li>
            <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.last, "Ultimo") }}</li>
        </ul>
    </nav>
    <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
        Page {{ page.current }} of {{ page.total_pages }}
    </p>
    <br>
{% endif %}
{% if Tutor==Profesor or admin %}
    {{ link_to("comentarios/new/"~ alumno.NIE, "Añadir Incidencias", "class":"btn btn-primary") }}
{% endif %}