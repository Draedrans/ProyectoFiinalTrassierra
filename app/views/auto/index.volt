{% if language %}
    <button class="btn btn-danger" value="modal"
            onclick="deleteAlumnos()"><i
                class="glyphicon glyphicon-trash"></i> Delete old students
    </button>
    <br>
    <br>
    <br>
    {{ link_to("auto/add", "<i class='glyphicon glyphicon-plus'></i> Add class", "class":"btn btn-primary") }}
{% else %}
    <button class="btn btn-danger" value="modal"
            onclick="deleteAlumnos()"><i
                class="glyphicon glyphicon-trash"></i> Borrar alumnos antiguos
    </button>
    <br>
    <br>
    <br>
    {{ link_to("auto/add", "<i class='glyphicon glyphicon-plus'></i> Añadir clases", "class":"btn btn-primary") }}
{% endif %}