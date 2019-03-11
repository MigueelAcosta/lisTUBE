/*$(document).ready(function () {
    $('#uploadForm').submit(function (e) {
        if ($('#uploadForm').val()){
            e.preventDefault();
            $('#loader-icon').show()
            $(this).ajaxSubmit({
                target: "#targetLayer",
                beforeSubmit: function () {
                $('.progress-bar').width('0%')
            },
            uploadProgress:function (event, position, total, percentComplete ) {
                $('.progress-bar').width(percentComplete+'%')
                $('.progress-bar').html('<div id="progress-status">'+percentComplete+'%</div>')
            },
                success:function () {
                    $('#loader-icon').hide()
                },
                resetForm:true
        })
            return false
        }
    })
})
*/
function crearPeticion() {
    var peticion = null;
    try{
        peticion = new XMLHttpRequest();
    }catch (peticion2){
        try {
            peticion=new ActiveXObject("Msxml12.XMLHTTP");
        }catch (peticion3) {
            try {
                peticion= new ActiveXObject("Microsoft.XMLHTTP");
            }catch (fallo){
                return peticion;
            }
        }

    }
    return peticion;
}

window.onload = function (ev) {
    var video = document.getElementById("video");
    var submit = document.getElementById("submit");
    var barra = document.getElementById("progressBar");
    var progreso = document.getElementById("progress-bar");
    var cancelar = document.getElementById("cancelar");
    cancelar.style.display='none';
    progreso.style.display="none";

    video.addEventListener("change",function () {

        var informacion = new FormData();
        informacion.append("video",video.files[0]);
        console.log(video.files[0]);

        var peticion = crearPeticion();
        console.log(peticion);
        if(peticion == null){
            alert("Navegador no compatible");
            return;
        }

        peticion.addEventListener("load",function () {
            alert("Video cargado");
        });
        peticion.upload.addEventListener("progress",function (e) {
            var porcentaje = Math.round((e.loaded/e.total)*100);
            console.log(porcentaje);
            cancelar.style.display='block';
            progreso.style.display="block"
            barra.value=porcentaje;
        });
        peticion.addEventListener("error",function () {

        });
        peticion.addEventListener("abort",function () {

        });
        cancelar.addEventListener("click",function () {
            peticion.abort();
            barra.value=0;
            cancelar.style.display='none';
            progreso.style.display='none';
        })
        peticion.open("POST",'video');
        peticion.send(informacion);
    });
}
