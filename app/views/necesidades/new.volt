<ul class="pager">
    <li class="previous">{{ link_to("alumnos/verNecesidades/"~ NIE , "Volver") }}</li>
</ul>

<div class="page-header">
    <h1>
        Editar Observacion
    </h1>
</div>

{{ form("necesidades/save") }}
{% for element in form %}
<div class="form-group">
        <div>
            {{ element }}
        </div>
</div>
{% endfor %}

<div class="form-group">
    <label for="NEE">NEE</label>
    <div>
        <select id="NEE" name="NEE" class="form-control" onchange="cargarTipos()">
            <optgroup label="NEE">
                <option value="Médicas Específicas">Médicas Específicas</option>
                <option value="Recursos Específicos">Recursos Específicos</option>
            </optgroup>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="form-group">
        <label for="MedRec">MedRec</label>
        <div>
            <select id="MedRec" name="MedRec" class="form-control" onchange="cargarEspec()"></select></div>
    </div>
</div>
<div class="form-group">
    <div class="form-group">
        <label for="Tipo">Tipo</label>
        <div>
            <select id="Tipo" name="Tipo" class="form-control"></select></div>
    </div>
</div>
<div class="col-sm-8 col-sm-offset-2">
    {{ submit_button("Añadir Necesidad", "class": "btn btn-primary") }}
</div>
</div>
{{ end_form() }}
