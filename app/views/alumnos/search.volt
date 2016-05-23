<ul class="pager">
    <li class="previous">{{ link_to("alumnos/index", "Volver") }}</li>
    {% if admin %}
        <li class="next"> {{ link_to("alumnos/new", "Nuevo alumno") }}</li>
    {% endif %}
</ul>

<div class="page-header">
    <h1>Resultados de busqueda</h1>
</div>
{{ content() }}

<table class="table table-bordered table-striped">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        {% if admin %}
            <th>Management</th>
        {% endif %}
    </tr>
    {% for alumno in page.items %}
            <tr>
                <td>{{ alumno.Nombre }} </td>
                <td>
{{ alumno.apellidos }}
                </td>
                {% if admin %}
                    <td>
                        {{ link_to("alumnos/verPerfil/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Modificar", "class":"btn btn-default") }}

                    </td>
                {% endif %}
            </tr>
    {% endfor %}
</table>

<nav>
    <ul class="pagination">
        <li>{{ link_to("alumnos/search", "First") }}</li>
        <li>{{ link_to("alumnos/search?page=" ~ page.before, "Previous") }}</li>
        <li>{{ link_to("alumnos/search?page=" ~ page.next, "Next") }}</li>
        <li>{{ link_to("alumnos/search?page=" ~ page.last, "Last") }}</li>
    </ul>
</nav>
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
    Page {{ page.current }} of {{ page.total_pages }}
</p>
