$(init);

function init(){
    $("#tablita").load("cargaTabla.php");
    $("#vtaModal").modal();
    validaFormulario();

    $("#btnAgregar").on("click", function(){
        $("#ids").val("");
        $("#noms").val("");
        $("#cp").val("");
        $("#idreg").val("1");
        //mueve a la region seleccionada
        $("#idreg").formSelect();
        $("#vtaModal").modal('open');
        $("#noms").focus();
    });
    $(document).on("click",'.editar', function(){
        var id = $(this).attr("data-id");
        var nom = $(this).attr("data-nom");
        var cp = $(this).attr("data-cp");
        var idr = $(this).attr("data-idr");
        $("#ids").val(id);
        $("#noms").val(nom);
        $("#idreg").val(idr);
        $("#cp").val(cp);
        M.updateTextFields();
        $("#vtaModal").modal('open');
    });

    $(document).on("click",".eliminar",function()
    {
        var id = $(this).attr("data-id");
        var sURL = "Eliminar.php";
        var formul = "ids=" + id;
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
                   M.toast({html: 'Sucursal Eliminado', classes:'rounded blue lighten 2'});
                }
            }
        });
    
        
    });

    $("#btnGuardar").on("click", function(){
        $("#frm-suc").submit();
    });
}


//jquery validate
function validaFormulario(){
    $("#frm-suc").validate({
        rules:{
            'noms':{required:true,minlength:3, maxlength:100},
            'cp':{required:true ,maxlength:5}
        },
        messages:{
            'noms':{required:'Campo Requerido',digits:true ,minlength:'Minimo de caracteres 3', maxlength:'Maximo 100 caracteres'},
            'cp':{required:'Campo reuqerido',digits:'Solo numeros' ,maxlength:'maximo 5 caracteres'},
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
    var formulario = $("#frm-suc").serialize();
    var idd = $("#ids").val();
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
                $("#ids").val("");
                $("#noms").val("");
                $("#cp").val("");
                $("#idreg").val("1");
                //mueve a la region seleccionada
                $("#idreg").formSelect();
                $("#vtaModal").modal('close');
                $("#tablita").load("cargaTabla.php");
                M.toast({html: 'Sucursal Guardado', classes:'rounded blue lighten 2'});
            }
        }
    });

}