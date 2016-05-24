{% if observaciones|length==0 %}
    Este alumno no tiene ningún dato
    <br>
    <h1>:3</h1>
{% else %}
    <table class="table table-bordered table-striped">
        <tr>
            <th>Comentarios</th>
        </tr>
        {% for item in observaciones %}
            {% if (item.Acceso==1 and (Tutor==Profesor or admin))or item.Acceso==0 %}
                <tr>
                    <td>{{ item.Observacion }}</td>
                </tr>
            {% endif %}


        {% endfor %}
    </table>
{% endif %}
