{% if observaciones|length==0 %}
    Este alumno no tiene ningún dato
    <br>
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
                        <td>{{ link_to("observacionesalum/edit/"~ item.ID, "<i class='glyphicon glyphicon-edit'></i> Editar", "class":"btn btn-primary") }}</td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
    </table>
{% endif %}
<br>
{% if Tutor==Profesor or admin %}
    {{ link_to("observacionesalum/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir Observación", "class":"btn btn-primary") }}
{% endif %}