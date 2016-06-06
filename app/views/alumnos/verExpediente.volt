<h1>
    Matriculas IES Trassierra
</h1>

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
        <table class="table table-bordered table-striped">
            <tr>
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

                </td>
            </tr>
        {% endfor %}
        </table>
    {% endif %}
{% endif %}