{% if language %}
    <ul class="pager">
        <li class="previous">{{ link_to("users/index", "Go back") }}</li>
        {% if admin %}
            <li class="next"> {{ link_to("users/new", "New user") }}</li>
        {% endif %}
    </ul>

    <div class="page-header">
        <h1>Search results</h1>
    </div>
    {{ content() }}

    <table class="table table-bordered table-striped">
        <tr>
            <th>Username</th>
            <th>Access Level</th>
            {% if admin %}
                <th>Management</th>
            {% endif %}
        </tr>
        {% for user in page.items %}
            {% if user.username == actual_user %}
                <tr>
                    <td>{{ user.username }} (You)</td>
                    <td>
                        {% if user.is_admin %}
                            Head of the school
                        {% else %}
                            Teacher
                        {% endif %}
                    </td>
                    {% if admin %}
                        <td>
                            {{ link_to("userpanel/link", "<i class='glyphicon glyphicon-edit'></i> Go to User Panel", "class":"btn btn-default") }}

                        </td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
        {% for user in page.items %}
            {% if user.username != actual_user %}
                <tr>
                    <td>{{ user.username }}</td>
                    <td>
                        {% if user.is_admin %}
                            Head of the school
                        {% else %}
                            Teacher
                        {% endif %}
                    </td>
                    {% if admin %}
                        <td>
                            {% if user.username != actual_user %}
                                {{ link_to("users/edit/" ~ user.username, '<i class="glyphicon glyphicon-edit"></i> Edit', "class": "btn btn-default") }}
                                <button class="btn btn-default" value="modal"
                                        onclick="confirmDeleteUser('{{ user.username }}')"><i
                                            class="glyphicon glyphicon-trash"></i> Delete
                                </button>
                            {% endif %}
                        </td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
    </table>

    <nav>
        <ul class="pagination">
            <li>{{ link_to("users/search", "First") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.before, "Previous") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.next, "Next") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.last, "Last") }}</li>
        </ul>
    </nav>
    <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
        Page {{ page.current }} of {{ page.total_pages }}
    </p>

{% else %}
    <ul class="pager">
        <li class="previous">{{ link_to("users/index", "Volver") }}</li>
        {% if admin %}
            <li class="next"> {{ link_to("users/new", "Nuevo usuario") }}</li>
        {% endif %}
    </ul>

    <div class="page-header">
        <h1>Resultados</h1>
    </div>
    {{ content() }}

    <table class="table table-bordered table-striped">
        <tr>
            <th>Usuario</th>
            <th>Nivel de Acceso</th>
            {% if admin %}
                <th>Acciones</th>
            {% endif %}
        </tr>
        {% for user in page.items %}
            {% if user.username == actual_user %}
                <tr>
                    <td>{{ user.username }} (You)</td>
                    <td>
                        {% if user.is_admin %}
                            Dirección/Orientación
                        {% else %}
                            Profesor
                        {% endif %}
                    </td>
                    {% if admin %}
                        <td>
                            {{ link_to("userpanel/link", "<i class='glyphicon glyphicon-edit'></i> Ir a User Panel", "class":"btn btn-default") }}

                        </td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
        {% for user in page.items %}
            {% if user.username != actual_user %}
                <tr>
                    <td>{{ user.username }}</td>
                    <td>
                        {% if user.is_admin %}
                            Dirección/Orientación
                        {% else %}
                            Profesor
                        {% endif %}
                    </td>
                    {% if admin %}
                        <td>
                            {% if user.username != actual_user %}
                                {{ link_to("users/edit/" ~ user.username, '<i class="glyphicon glyphicon-edit"></i> Editar', "class": "btn btn-default") }}
                                <button class="btn btn-default" value="modal"
                                        onclick="confirmDeleteUser('{{ user.username }}')"><i
                                            class="glyphicon glyphicon-trash"></i> Borrar
                                </button>
                            {% endif %}
                        </td>
                    {% endif %}
                </tr>
            {% endif %}
        {% endfor %}
    </table>

    <nav>
        <ul class="pagination">
            <li>{{ link_to("users/search", "Primera") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.before, "Anterior") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.next, "Siguiente") }}</li>
            <li>{{ link_to("users/search?page=" ~ page.last, "Última") }}</li>
        </ul>
    </nav>
    <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
        Página {{ page.current }} de {{ page.total_pages }}
    </p>

{% endif %}