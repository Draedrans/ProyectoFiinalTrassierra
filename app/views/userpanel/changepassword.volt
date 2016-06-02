<div class="page-header">
    <h1>Change password</h1>
</div>
{{ form('userpanel/savepass') }}
{% for element in form %}
    <div class="form-group">
        {{ element.label() }}
        <div>
            {{ element }}
        </div>
    </div>
{% endfor %}
<div class="form-group">
    {{ submit_button("Save", "class":"btn btn-primary") }}
    {{ link_to("userpanel/index", "Cancel", "class":"btn btn-default") }}
</div>
{{ end_form() }}