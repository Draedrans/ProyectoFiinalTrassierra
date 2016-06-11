{% if language %}
    {% if Necesidades|length==0 %}
        There are no records
        <br>
    {% else %}
        <table class="table table-bordered table-striped">
            <tr>
                <th>NEE</th>
                <td>Medidas/Recursos</td>
                <td>Necesidad</td>
                <td>Acciones</td>
            </tr>
            {% for item in Necesidades %}
            <tr>
                <td>{{ item.NEE }}</td>
                <td>{{ item.MedRec }}</td>
                <td>{{ item.Tipo }}</td>
                <td>{{ link_to("necesidades/delete?alumnos_NIE="~item.alumnos_NIE~"&NEE="~item.NEE~"&MedRec="~item.MedRec~"&Tipo="~item.Tipo, "<i class='glyphicon glyphicon-trash'></i> Delete", "class":"btn btn-danger") }}</td>
                {% endfor %}
        </table>
    {% endif %}
    <br>
    {{ link_to("necesidades/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Add", "class":"btn btn-primary") }}

{% else %}
    {% if Necesidades|length==0 %}
        Este alumno no tiene ningún dato
        <br>
    {% else %}
        <table class="table table-bordered table-striped">
            <tr>
                <th>NEE</th>
                <td>Medidas/RecUrsos</td>
                <td>Necesidad</td>
                <td>Acciones</td>
            </tr>
            {% for item in Necesidades %}
            <tr>
                <td>{{ item.NEE }}</td>
                <td>{{ item.MedRec }}</td>
                <td>{{ item.Tipo }}</td>
                <td>{{ link_to("necesidades/delete?alumnos_NIE="~item.alumnos_NIE~"&NEE="~item.NEE~"&MedRec="~item.MedRec~"&Tipo="~item.Tipo, "<i class='glyphicon glyphicon-trash'></i> Borrar Necesidad", "class":"btn btn-danger") }}</td>
                {% endfor %}
        </table>
    {% endif %}
    <br>
    {{ link_to("necesidades/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir Necesidad", "class":"btn btn-primary") }}

{% endif %}