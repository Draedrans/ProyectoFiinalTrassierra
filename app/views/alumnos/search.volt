{% if language %}
    <ul class="pager">
        <li class="previous">{{ link_to("alumnos/index", "Go Back") }}</li>
        {% if admin %}
            <li class="next"> {{ link_to("alumnos/new", "Add Student") }}</li>
        {% endif %}
    </ul>

    <div class="page-header">
        <h1>Search results</h1>
    </div>
    {{ content() }}

    <table class="table table-bordered table-striped">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Class</th>
            <th>Management</th>
        </tr>
        {% for alumno in page.items %}
            <tr>
                <td>{{ alumno.Nombre }} </td>
                <td>
                    {{ alumno.apellidos }}
                </td>
                <td>
                    {{ alumno.CursoActual }}
                </td>
                <td>
                    {{ link_to("alumnos/verPerfil/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> View Profile", "class":"btn btn-default") }}

                </td>
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

{% else %}
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
            <th>Clase</th>
            <th>Acciones</th>
        </tr>
        {% for alumno in page.items %}
            <tr>
                <td>{{ alumno.Nombre }} </td>
                <td>
                    {{ alumno.apellidos }}
                </td>
                <td>
                    {{ alumno.CursoActual }}
                </td>
                <td>
                    {{ link_to("alumnos/verPerfil/" ~ alumno.NIE, "<i class='glyphicon glyphicon-edit'></i> Ver Perfil", "class":"btn btn-default") }}

                </td>
            </tr>
        {% endfor %}
    </table>

    <nav>
        <ul class="pagination">
            <li>{{ link_to("alumnos/search", "Primera") }}</li>
            <li>{{ link_to("alumnos/search?page=" ~ page.before, "Anterior") }}</li>
            <li>{{ link_to("alumnos/search?page=" ~ page.next, "Siguiente") }}</li>
            <li>{{ link_to("alumnos/search?page=" ~ page.last, "Última") }}</li>
        </ul>
    </nav>
    <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
        Página {{ page.current }} de {{ page.total_pages }}
    </p>

{% endif %}