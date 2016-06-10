{% if Necesidades|length==0 %}
    Este alumno no tiene ningún dato
    <br>
{% else %}
    <table class="table table-bordered table-striped">
        <tr>
            <th>Necesidades</th>
                <td>Tipo</td>
            <td></td>
        </tr>
        {% for item in observaciones %}
            {% if (item.Acceso==1 and (Tutor==Profesor or admin))or item.Acceso==0 %}
                <tr>
                    <td></td>

                </tr>
            {% endif %}
        {% endfor %}
    </table>
{% endif %}
<br>
{% if Tutor==Profesor or admin %}
    {{ link_to("necesidades/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir Necesidad", "class":"btn btn-primary") }}
{% endif %}