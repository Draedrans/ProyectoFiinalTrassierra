<div class="tree">
    <ul>
        {% if padres==0 %}
            <li>
            <a href="#">Padres</a>
            <ul>
                {% for element in family %}
                    {% if element.Relacion==1 %}
                        <li>
                            <a href="#">{{ element.Nombre }} {{ element.apellidos }}</a>
                            {% if element.Fam_ID!="hola" %}
                                <br> {{ element.Fam_ID  }}
                            {% else %}
                                <br>{{ element.alumnos_NIE }}
                            {% endif %}
                        </li>
                    {% endif %}
                {% endfor %}
            </ul>
        {% else %}
            </li>
        {% endif %}
    </ul>
</div>