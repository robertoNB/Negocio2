$(init);

function init(){
    $("#tablita").load("cargaTabla.php");
    $("#vtaModal").modal();
    validaFormulario();

    $("#btnAgregar").on("click", function(){
        $("#idd").val("");
        $("#nomd").val("");
        $("#vtaModal").modal('open');
        $("#nomd").focus();
    });
    $(document).on("click",'.editar', function(){
        var id = $(this).attr("data-id");
        var nom = $(this).attr("data-nom");
        $("#idd").val(id);
        $("#nomd").val(nom);
        M.updateTextFields();
        $("#vtaModal").modal('open');
    });

    $(document).on("click",".eliminar",function()
    {
        var id = $(this).attr("data-id");
        var sURL = "Eliminar.php";
        var formul = "idd=" + id;
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
                   M.toast({html: 'Departamento Eliminado', classes:'rounded blue lighten 2'});
                }
            }
        });
    
        
    });

    $("#btnGuardar").on("click", function(){
        $("#frm-depto").submit();
    });
}


//jquery validate
function validaFormulario(){
    $("#frm-depto").validate({
        rules:{
            'nomd':{required:true,minlength:3, maxlength:50},
        },
        messages:{
            'nomd':{required:'Campo Requerido',minlength:'Minimo de caracteres 3', maxlength:'Maximo 50 caracteres'},
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
    var formulario = $("#frm-depto").serialize();
    var idd = $("#idd").val();
    if (idd != "")
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
                M.toast({html: 'Depto Guardado', classes:'rounded blue lighten 2'});
            }
        }
    });

}