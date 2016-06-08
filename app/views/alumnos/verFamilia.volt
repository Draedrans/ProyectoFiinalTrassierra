<div class="tree">
    <ul>
        {% if padres==0 %}
            <li>
                <a href="#">Padres</a>
                <ul>
                    {% for element in family %}
                        {% if element.Relacion==1 %}
                            <li>
                                <a href="#" id="{{ element.Localidad }}" onclick="familyTree()">{{ element.Nombre }} {{ element.apellidos }}</a>
                                {% if element.Fam_ID!="hola" %}
                                    <br> {{ element.Fam_ID }}
                                {% else %}
                                    <br>{{ element.alumnos_NIE }}
                                {% endif %}
                            </li>
                        {% endif %}
                    {% endfor %}
                </ul>

            </li>
        {% else %}
            <li>
                {% for element in family %}
                    {% if element.Relacion==2 %}
                        <a href="#" id="{{ element.Localidad }}" onclick="familyTree()">{{ element.Nombre }} {{ element.apellidos }}</a>
                        {% if element.Fam_ID!="hola" %}
                            <br> {{ element.Fam_ID }}
                        {% else %}
                            <br>{{ element.alumnos_NIE }}
                        {% endif %}
                        <ul>
                            {% for element in family %}
                                {% if element.Relacion==1 %}
                                    <li>
                                        <a href="#" id="{{ element.Localidad }}" onclick="familyTree()">{{ element.Nombre }} {{ element.apellidos }}</a>
                                        {% if element.Fam_ID!="hola" %}
                                        {% else %}
                                        {% endif %}
                                    </li>
                                {% endif %}
                            {% endfor %}
                        </ul>
                    {% endif %}
                {% endfor %}
            </li>
        {% endif %}
    </ul>
</div>