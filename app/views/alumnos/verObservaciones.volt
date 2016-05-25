{% if observaciones|length==0 %}
    Este alumno no tiene ningún dato
    <br>
    <h1>:3</h1>
{% else %}
    <table class="table table-bordered table-striped">
        <tr>
            <th>Observaciones</th>
            {% if admin %}
                <td>Acciones</td>
            {% endif %}
        </tr>
        {% for item in observaciones %}
            {% if (item.Acceso==1 and (Tutor==Profesor or admin))or item.Acceso==0 %}
                <tr>
                    <td>{{ item.Observacion }}</td>
                    {% if admin %}
                        <td>{{ link_to("ObservacionesAlum/edit/"~ item.ID, "Editar", "class":"btn btn-primary") }}</td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
    </table>
{% endif %}
<br>
{% if Tutor==Profesor or admin %}
    {{ link_to("ObservacionesAlum/new/"~ alumno.NIE, "Añadir Observación", "class":"btn btn-primary") }}
{% endif %}