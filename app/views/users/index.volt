<h2 class="page-header">
    Search users
</h2>
{{ content() }}

{{ form("users/search") }}
{% for element in form %}
    <div class="form-group">
        {{ element.label() }}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}

<div class="form-group">
    {{ submit_button("Search for users", "class": "btn btn-primary") }}
    {% if admin %}
    {{ link_to("users/new", "Create new user", "class": "btn btn-default") }}
    {% endif %}
</div>
{{ end_form() }}
