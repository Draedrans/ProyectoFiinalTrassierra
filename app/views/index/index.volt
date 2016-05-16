{% if language %}
<div class="page-header">
    <h1>Welcome</h1>
</div>

<p>You're now using Notebook. Great things are about to happen!</p>

Before you start you may have to log in :3
<p>
    {{ link_to('session', 'Login here', 'class': 'btn btn-default btn-lg') }}
</p>

</p>
    {% else %}
        <h2>Holi</h2>
{% endif %}