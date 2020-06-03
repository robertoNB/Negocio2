$(init);

function init(){
    $("#tablita").load("cargaTabla.php");
    $("#vtaModal").modal();
    validaFormulario();

    $("#btnAgregar").on("click", function(){
        $("#idp").val("");
        $("#nomp").val("");
        $("#um").val("");
        $("#iddep").val("1");
        //mueve a la region seleccionada
        $("#iddep").formSelect();
        $("#vtaModal").modal('open');
        $("#nomp").focus();
    });
    $(document).on("click",'.editar', function(){
        var id = $(this).attr("data-id");
        var nom = $(this).attr("data-nom");
        var um = $(this).attr("data-um");
        var idd = $(this).attr("data-iddep");
        $("#idp").val(id);
        $("#nomp").val(nom);
        $("#iddep").val(idd);
        $("#um").val(um);
        M.updateTextFields();
        $("#vtaModal").modal('open');
    });

    $(document).on("click",".eliminar",function()
    {
        var id = $(this).attr("data-id");
        var sURL = "Eliminar.php";
        var formul = "idp=" + id;
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
                   M.toast({html: 'producto Eliminado', classes:'rounded blue lighten 2'});
                }
            }
        });
    
        
    });

    $("#btnGuardar").on("click", function(){
        $("#frm-prod").submit();
    });
}


//jquery validate
function validaFormulario(){
    $("#frm-prod").validate({
        rules:{
            'nomp':{required:true,minlength:3, maxlength:100},
            'um':{required:true ,maxlength:20}
        },
        messages:{
            'nomp':{required:'Campo Requerido',minlength:'Minimo de caracteres 3', maxlength:'Maximo 100 caracteres'},
            'um':{required:'Campo reuqerido' ,maxlength:'maximo 20 caracteres'},
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
    var formulario = $("#frm-prod").serialize();
    var idd = $("#idp").val();
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
                $("#idp").val("");
                $("#nomp").val("");
                $("#um").val("");
                $("#iddep").val("1");
                //mueve a la region seleccionada
                $("#iddep").formSelect();
                $("#vtaModal").modal('close');
                $("#tablita").load("cargaTabla.php");
                M.toast({html: 'Producto Guardado', classes:'rounded blue lighten 2'});
            }
        }
    });

}