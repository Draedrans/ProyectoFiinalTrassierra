/**
 * Created by pedro on 31/01/16.
 */

function confirmDeleteUser(username) {
    bootbox.confirm("Confirm deleting user: " + username + "?", function (result) {
        if (result) {
            window.location.href = "/orientacion/users/delete/" + username;
        }
    })
}

function confirmDeleteDepartment(deptId) {
    bootbox.confirm("Confirm deleting department: " + deptId + "?", function (result) {
        if (result) {
            window.location.href = "/orientacion/departments/delete/" + deptId;
        }
    })
}
function confirmDeleteCourse(CourId) {
    bootbox.confirm("Confirm deleting level: " + CourId + "?", function (result) {
        if (result) {
            window.location.href = "/orientacion/courses/delete/" + CourId;
        }
    })
}
function deleteAlumnos() {
    window.location.href = "/orientacion/alumnos/delete";
}
function confirmChangeMaxHours(horas) {
    alert(horas);
    var sliderHtml = "<input id='ex1' data-slider-id='ex1Slider' type='text' data-slider-min='15' data-slider-max='35' data-slider-step='1' data-slider-value='" + Number(horas) + "'/>";
    //TODO bug del tooltip. Solucionar. Ver https://github.com/seiyria/bootstrap-slider/issues/523
    bootbox.confirm({
        message: sliderHtml,
        title: 'Adjust the slider to the desired value',
        callback: confirm
    });
    var slider = $('#ex1').slider({
        formatter: function (value) {
            return value + " hours";
        },
        tooltip: "always"
    });

    function confirm() {
        var a = slider.slider("getValue");
        bootbox.confirm("New value: " + a + ".<br>Are you totally sure?", function (result) {
            if (result) window.location.href = "/orientacion/configuration/update/" + a;
        })
    }
}