/**
 * Created by alumno on 10/06/16.
 */
$(document).ready(function () {
cargarTipos();
});


function cargarTipos() {
    if ($("#NEE option:selected").val() == "Médicas Específicas") {
        $("#MedRec").html("");
        $("#MedRec").append("<option value='Educativas'>Educativas</option>");
        $("#MedRec").append("<option value='Asistenciales'>Asistenciales</option>");
    } else {
        $("#MedRec").html("");
        $("#MedRec").append("<option value='Personales'>Personales</option>");
        $("#MedRec").append("<option value='Materiales'>Materiales</option>");
    }
    cargarEspec();
}
function cargarEspec() {
    $.ajax({
        type: "GET",
        url: "/orientacion/xml/form.xml",
        dataType: "xml",
        success: function (xml) {
            $("#Tipo").html("");
            var Tipo = [];
            $(xml).find($("#MedRec option:selected").val()+ "> tipo").each(function () {
                Tipo[Tipo.length] = $(this).text();
            });
            for (i = 0; i < Tipo.length; i++) {
                $("#Tipo").append("<option value='" + Tipo[i] + "'>" + Tipo[i] + "</option>");
            }
        }
    });
}