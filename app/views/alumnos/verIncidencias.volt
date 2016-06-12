{% if language %}
    {% if page.items|length==0 %}
        There are no reccords
        <br>
    {% else %}
        {% for item in page.items %}
            {% if item.acceso==1 and alumno.Tutor!=Profesor and not admin and item.users_username|lower!=Profesor %}
                Access Denied
            {% else %}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>
                            User : {{ item.users_username }}
                        </th>
                        <th>
                            {{ item.date }}
                        </th>
                        <th>
                            Intervention : {{ item.Incidencia }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Description
                        </td>
                        <td colspan="2">
                            {{ item.Moitivo }}
                        </td>
                    </tr>
                    <tr>
                        {% if not item.Asistentes|length==0 %}
                        <td>
                            Atendants
                        </td>
                        <td colspan="2">
                            {{ item.Asistentes }}
                        </td>
                    </tr>
                    {% endif %}
                    <tr>
                        {% if not item.Acuerdos|length==0 %}
                            <td>
                                Arrangements
                            </td>
                            <td colspan="2">
                                {{ item.Acuerdos }}
                            </td>
                        {% endif %}
                    </tr>
                </table>
            {% endif %}

        {% endfor %}
        {% if item.users_username|lower==Profesor %}
            {{ link_to("comentarios/edit/"~ item.date, "<i class='glyphicon glyphicon-edit'></i> Edit", "class":"btn btn-primary") }}
        {% endif %}
        <nav>
            <ul class="pagination">
                <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE, "First") }}</li>
                <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.before, "Previous") }}</li>
                <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.next, "Next") }}</li>
                <li>{{ link_to("alumnos/verIncidencias/"~alumno.NIE~"?page=" ~ page.last, "Last") }}</li>
            </ul>
        </nav>
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            Page {{ page.current }} of {{ page.total_pages }}
        </p>
        <br>
    {% endif %}
        {{ link_to("comentarios/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Add", "class":"btn btn-primary") }}

{% else %}
    {% if page.items|length==0 %}
        Este alumno no tiene ninguna incidencia
        <br>
    {% else %}
        {% for item in page.items %}
            {% if item.acceso==1 and alumno.Tutor!=Profesor and not admin and item.users_username|lower!=Profesor %}
                Su nivel de acceso no es el adecuado para ver esta incidencia
            {% else %}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>
                            Usuario : {{ item.users_username }}
                        </th>
                        <th>
                            {{ item.date }}
                        </th>
                        <th>
                            Intervención : {{ item.Incidencia }}
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
                </table>
            {% endif %}

        {% endfor %}
        {% if item.users_username|lower==Profesor %}
            {{ link_to("comentarios/edit/"~ item.date, "<i class='glyphicon glyphicon-edit'></i> Editar", "class":"btn btn-primary") }}
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
    {{ link_to("comentarios/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir", "class":"btn btn-primary") }}
{% endif %}