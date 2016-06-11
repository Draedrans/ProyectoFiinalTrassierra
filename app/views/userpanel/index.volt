{% if language %}
    <div class="page-header">
        <h1>User panel</h1>
    </div>
    {{ link_to('userpanel/changepassword', "Change password", "class":"btn btn-primary col-sm-12") }}
{% else %}
    <div class="page-header">
        <h1>User panel</h1>
    </div>
    {{ link_to('userpanel/changepassword', "Cambiar Contraseña", "class":"btn btn-primary col-sm-12") }}
{% endif %}