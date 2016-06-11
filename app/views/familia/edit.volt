{{ form("familia/savefamiliar") }}
{% for element in form %}
    <div class="form-group">
        {% if element.getName()!="Fam_ID" %}
            {{ element.label() }}
        {% endif %}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <h4>
            {% if language %}
                {{ submit_button("Edit", "class": "btn btn-primary") }}
                <a href="/orientacion/familia/deletefamiliar/{{ ID }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Delete Member</a>
            {% else %}
                {{ submit_button("Cambiar familiar", "class": "btn btn-primary") }}
                <a href="/orientacion/familia/deletefamiliar/{{ ID }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Borrar familiar</a>
            {% endif %}
        </h4>
    </div>
</div>
{{ end_form() }}