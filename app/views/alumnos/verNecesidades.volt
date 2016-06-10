{% if Necesidades|length==0 %}
    Este alumno no tiene ningún dato
    <br>
{% else %}
    <table class="table table-bordered table-striped">
        <tr>
            <th>Necesidades</th>
            <td>MedRec</td>
            <td></td>
        </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    </table>
{% endif %}
<br>
{{ link_to("necesidades/new/"~ alumno.NIE, "<i class='glyphicon glyphicon-plus'></i> Añadir Necesidad", "class":"btn btn-primary") }}
