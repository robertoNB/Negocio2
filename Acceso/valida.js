$(init);

function init(){
    $("#vtaModal").modal();

    validaFormulario();

    $("#btnRegistrar").on("click", function(){
        $("#vtaModal").modal('open');
    });
    
    $("#btnGuardar").on("click", function(){
        $("#frm-registro").submit();
    });

    $("#btnEntrar").on("click", function(){
        $("#frm").submit();
    });
    
    
}


//jquery validate
function validaFormulario(){
    $("#frm").validate({
        rules:{
            'corr':{required:true,email:true, minlength:3, maxlength:100},
            'cont':{required:true,minlength:3, maxlength:32},
        },
        messages:{
            'corr':{required:'Campo Requerido',email:'Correo electronico invalido' ,minlength:'Minimo de caracteres 3', maxlength:'Maximo 100 caracteres'},
            'cont':{required:'Campo Requerido',minlength:'Minimo de caracteres 3', maxlength:'Maximo 32 caracteres'},
        },
        errorElement:"div",
        errorClass:"invalid",
        errorPlacement: function(error, element){
            error.insertAfter(element)
        },
        submitHandler: function(form){
            validamosDatos();
        }
    });

    $("#frm-registro").validate({
        rules:{
            'corru':{required:true,email:true, minlength:3, maxlength:100},
            'nomu':{required:true, minlength:3, maxlength:100},
            'contu':{required:true,minlength:3, maxlength:32},
        },
        messages:{
            'corru':{required:'Campo Requerido',email:'Correo electronico invalido' ,minlength:'Minimo de caracteres 3', maxlength:'Maximo 100 caracteres'},
            'nomu':{required:'Campo Requerido', minlength:'Minimo de caracteres 3', maxlength:'Maximo 100 caracteres'},
            'contu':{required:'Campo Requerido',minlength:'Minimo de caracteres 3', maxlength:'Maximo 32 caracteres'},
        },
        errorElement:"div",
        errorClass:"invalid",
        errorPlacement: function(error, element){
            error.insertAfter(element)
        },
        submitHandler: function(form){
            Registrar();
        }
    });
}

function Registrar (){
    var sURL = sURL = "Insertar.php";
    var formulario = $("#frm-registro").serialize();
    $.ajax({
        type: 'post',
        url: sURL,
        dataType: 'json',
        data:formulario,
        success: function (respuesta)
        {
            if (respuesta['status']==1)
            {
                $("#vtaModal").modal('close');
                M.toast({html: 'Usuario Registrado', classes:'rounded blue lighten 2'});
            }
        }
    });
}

function validamosDatos(){
    var formulario = $("#frm").serialize();
    $.ajax({
        type: 'post',
        url: "valida.php",
        dataType: 'json',
        data:formulario,
        success: function (respuesta)
        {
            if (respuesta['status']==1)
            {
                
                M.toast({html: 'usuario valido', classes:'rounded blue lighten 2'});
                document.location.href="../Home/"
            }else{
                M.toast({html: 'usuario o contraseña invalida', classes:'rounded blue lighten 2'});
                $("#corr").focus();
            }
        }
    });

}