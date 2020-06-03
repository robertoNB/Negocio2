$(init);

function init(){
    $("#tablita").load("cargaTabla.php");
    $("#vtaModal").modal();
    validaFormulario();

    $("#btnAgregar").on("click", function(){
        $("#idr").val("");
        $("#nomr").val("");
        $("#vtaModal").modal('open');
        $("#nomr").focus();
    });
    $(document).on("click",'.editar', function(){
        var id = $(this).attr("data-id");
        var nom = $(this).attr("data-nom");
        $("#idr").val(id);
        $("#nomr").val(nom);
        M.updateTextFields();
        $("#vtaModal").modal('open');
    });

    $(document).on("click",".eliminar",function()
    {
        var id = $(this).attr("data-id");
        var sURL = "Eliminar.php";
        var formul = "idr=" + id;
        $.ajax({
            type: 'post',
            url: sURL,
            dataType: 'json',
            data:formul,
            success: function (respuesta)
            {
                if (respuesta['status']==1)
                {
                   $("#tablita").load("cargaTabla.php");
                   M.toast({html: 'Region Eliminada', classes:'rounded blue lighten 2'});
                }
            }
        });
    
        
    });

    $("#btnGuardar").on("click", function(){
        $("#frm-regiones").submit();
    });
}

function validaFormulario(){
    $("#frm-regiones").validate({
        rules:{
            'nomr':{required:true,minlength:3, maxlength:40},
        },
        messages:{
            'nomr':{required:'Campo Requerido',minlength:'Minimo de caracteres 3', maxlength:'Maximo 40 caracteres'},
        },
        errorElement:"div",
        errorClass:"invalid",
        errorPlacement: function(error, element){
            error.insertAfter(element)
        },
        submitHandler: function(form){
            guardarDatos();
        }
    });
}

function guardarDatos(){
    var sURL = ""
    var formulario = $("#frm-regiones").serialize();
    var idr = $("#idr").val();
    if (idr != "")
        sURL = "Actualizar.php";
    else
        sURL = "Insertar.php";
    $.ajax({
        type: 'post',
        url: sURL,
        dataType: 'json',
        data:formulario,
        success: function (respuesta)
        {
            if (respuesta['status']==1)
            {
                $("#idd").val("");
                $("#nomd").val("");
                $("#vtaModal").modal('close');
                $("#tablita").load("cargaTabla.php");
                M.toast({html: 'Region Guardado', classes:'rounded blue lighten 2'});
            }
        }
    });

}