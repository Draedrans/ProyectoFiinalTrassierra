<ul class="pager">
    <li class="previous">{{ link_to("users/index", "Go back") }}</li>
</ul>

<div class="page-header">
    <h1>
        Create new user
    </h1>
</div>
{{ form("users/create") }}

    {% for element in form %}
        <div class="form-group">
            {{ element.label() }}
            <div>
                {{ element }}
            </div>
        </div>
    {% endfor %}


    <div class="form-group">
        {{ submit_button("Create user", "class": "btn btn-primary") }}
    </div>
{{ end_form() }}