<div class="tree">
    <ul>
    {% for element in family %}
        {% if element.Relacion==2 %}
        {% endif %}
    {% endfor %}
    {% for element in family %}
        {% if element.Relacion==1 %}
        {% endif %}
    {% endfor %}
    </ul>
</div>