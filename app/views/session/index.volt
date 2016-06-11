{% if language %}
    {{ form('session/start', 'role': 'form') }}
    <fieldset>
        <div class="form-group">
            <label for="username">Username</label>
            <div class="controls">
                {{ text_field('username', 'class': "form-control", 'autofocus':'true') }}
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="controls">
                {{ password_field('password', 'class': "form-control") }}
            </div>
        </div>
        <div class="form-group">
            {{ submit_button('Login', 'class': 'btn btn-primary btn-lg') }}
        </div>
    </fieldset>
    {{ end_form() }}
{% else %}
    {{ form('session/start', 'role': 'form') }}
    <fieldset>
        <div class="form-group">
            <label for="username">Username</label>
            <div class="controls">
                {{ text_field('Usuario', 'class': "form-control", 'autofocus':'true') }}
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="controls">
                {{ password_field('Contraseña', 'class': "form-control") }}
            </div>
        </div>
        <div class="form-group">
            {{ submit_button('Login', 'class': 'btn btn-primary btn-lg') }}
        </div>
    </fieldset>
    {{ end_form() }}
{% endif %}
