<div class="tree">
    <ul>
        {% if padres==0 %}
            <li>
                <a href="#">Padres</a>
                <ul>
                    {% for element in family %}
                        {% if element.Relacion==1 %}
                            <li>
                                <a href="{{ element.Localidad }}">{{ element.Nombre }} {{ element.apellidos }}</a>
                                {% if element.Fam_ID=="alumno" and hijos>0 %}
                                    <ul>
                                        {% for element in family %}
                                            {% if element.Relacion==0 %}
                                                <li>
                                                    <a href="{{ element.Localidad }}">{{ element.Nombre }} {{ element.apellidos }}</a>
                                                </li>
                                            {% endif %}
                                        {% endfor %}
                                    </ul>
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
                        <a href="{{ element.Localidad }}">{{ element.Nombre }} {{ element.apellidos }}</a>
                    {% endif %}
                {% endfor %}
                <ul>
                    {% for element in family %}
                        {% if element.Relacion==1 %}
                            <li>
                                <a href="{{ element.Localidad }}">{{ element.Nombre }} {{ element.apellidos }}</a>
                                {% if element.Fam_ID=="alumno" and hijos>0 %}
                                    <ul>
                                        {% for element in family %}
                                            {% if element.Relacion==0 %}
                                                <li>
                                                    <a href="{{ element.Localidad }}">{{ element.Nombre }} {{ element.apellidos }}</a>
                                                </li>
                                            {% endif %}
                                        {% endfor %}
                                    </ul>
                                {% endif %}
                            </li>
                        {% endif %}
                    {% endfor %}
                </ul>
            </li>
        {% endif %}
    </ul>
</div>
<div class="clearboth">
    <a href="/orientacion/familia/create/{{ alumno.NIE }}" class="btn btn-primary"><i
                class="glyphicon glyphicon-plus"></i> Crear relacion</a>
    <a href="/orientacion/familia/new/{{ alumno.NIE }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
        Crear Familiar</a>
</div>