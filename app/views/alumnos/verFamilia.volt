{% for element in familia %}
    {{ element.Nombre }} {{ element.apellidos }}
    <br>
    {{ element.Relacion}}
    <br>
{% endfor %}
{% for element in family %}
    {{ element.Nombre }} {{ element.apellidos }}
    <br>
    {{ element.Relacion}}
    <br>
{% endfor %}