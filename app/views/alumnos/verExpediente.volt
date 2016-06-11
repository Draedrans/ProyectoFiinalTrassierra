{% if language %}
    <h2>
        Years at IES Trassierra
    </h2>

    {% if trassierra|length==0 %}
        <h3>There are no records </h3>
    {% else %}
        <table class="table table-bordered table-striped">
            <tr>
                <th>
                    Year
                </th>
                <th>
                    Grade
                </th>
                <th>
                    Grade Retention
                </th>
            </tr>
            {% for element in trassierra %}
                <tr>
                    <td>
                        {{ element.Year }}
                    </td>
                    <td>
                        {{ element.Curso }}
                    </td>
                    <td>
                        {% if element.Repite==0 %}
                            No
                        {% else %}
                            Yes
                        {% endif %}
                    </td>
                </tr>
            {% endfor %}
        </table>
    {% endif %}

    {% if admin %}
        {% if expediente|length!=0 %}
            <h2>
                Matriculas Anteriores
            </h2>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>
                        School
                    </th>
                    <th>
                        Year
                    </th>
                    <th>
                        Grade
                    </th>
                    <th>
                        Subject
                    </th>
                    <th>
                        Mark
                    </th>
                </tr>
                {% for element in expediente %}
                    <tr>
                        <td>
                            {{ element.centro }}
                        </td>
                        <td>
                            {{ element.year }}
                        </td>
                        <td>
                            {{ element.asignatura }}
                        </td>
                        <td>
                            {{ element.curso }}
                        </td>
                        <td>
                            {{ element.calificacion }}
                        </td>
                    </tr>
                {% endfor %}
            </table>
        {% endif %}
        {{ link_to("auto/addexpediente/" ~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Add file", "class":"btn btn-primary") }}
    {% endif %}
{% else %}
    <h2>
        Matriculas IES Trassierra
    </h2>

    {% if trassierra|length==0 %}
        <h3>No hay registros </h3>
    {% else %}
        <table class="table table-bordered table-striped">
            <tr>
                <th>
                    Año
                </th>
                <th>
                    Curso
                </th>
                <th>
                    Repite
                </th>
            </tr>
            {% for element in trassierra %}
                <tr>
                    <td>
                        {{ element.Year }}
                    </td>
                    <td>
                        {{ element.Curso }}
                    </td>
                    <td>
                        {% if element.Repite==0 %}
                            No
                        {% else %}
                            Sí
                        {% endif %}
                    </td>
                </tr>
            {% endfor %}
        </table>
    {% endif %}

    {% if admin %}
        {% if expediente|length!=0 %}
            <h2>
                Matriculas Anteriores
            </h2>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>
                        Centro
                    </th>
                    <th>
                        Año
                    </th>
                    <th>
                        Curso
                    </th>
                    <th>
                        Asignatura
                    </th>
                    <th>
                        Calificación
                    </th>
                </tr>
                {% for element in expediente %}
                    <tr>
                        <td>
                            {{ element.centro }}
                        </td>
                        <td>
                            {{ element.year }}
                        </td>
                        <td>
                            {{ element.asignatura }}
                        </td>
                        <td>
                            {{ element.curso }}
                        </td>
                        <td>
                            {{ element.calificacion }}
                        </td>
                    </tr>
                {% endfor %}
            </table>
        {% endif %}
        {{ link_to("auto/addexpediente/" ~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir expediente", "class":"btn btn-primary") }}
    {% endif %}
{% endif %}