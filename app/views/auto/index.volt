<button class="btn btn-default" value="modal"
        onclick="confirmDeleteUser('{{ user.username }}')"><i
            class="glyphicon glyphicon-trash"></i> Borrar alumnos antiguos
</button>
<br>
<br>
<br>
{{ link_to("auto/add", "Añadir clases", "class":"btn btn-primary") }}