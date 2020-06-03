<?php
//---------------------------------------------------------------------
// Utilerias de Bases de Dato
// 
// Febrero 2020
//---------------------------------------------------------------------

try{
        $Cn = new PDO('pgsql:host=localhost;port=5432;dbname=negocios;user=postgres;password=hola');
        //$Cn = new PDO('mysql:host=localhost; dbname=bdalumnos','root','');
        $Cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $Cn->exec("SET CLIENT_ENCODING TO 'UTF8';");
        //$Cn->exec("SET CHARACTER SET utf8"); // MYSQL
}catch(Exception $e){
    die("Error: " . $e->GetMessage());
}

// Función para ejecutar consultas SELECT
function Consulta($query)
{
    global $Cn;
    try{    
        $result =$Cn->query($query);
        $resultado = $result->fetchAll(PDO::FETCH_ASSOC); 
        $result->closeCursor();
        return $resultado;
    }catch(Exception $e){
        die("Error en la LIN: " . $e->getLine() . ", MSG: " . $e->GetMessage());
    }
}

// Función que recibe un insert y regresa el consecutivo que le genero en la llave primaria
// por ejemplo: Insert Into cuerpo.clasif (nomclasif) values ('Articulo en Extenso') 
// Returning idclasif, nomclasif;
function EjecutaConsecutivo($sentencia, $llave){
    global $Cn;
    try {
        $result = $Cn->query($sentencia);
        $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
        $result->closeCursor();
        //var_dump($resultado);
       // die("AAA");
        return $resultado[0][$llave];
    } catch (Exception $e) {
        die("Error en la linea: " + $e->getLine() + " MSG: " + $e->GetMessage());
        return 0;
    }
}
// Sirve para ejecutar una sentencia INSERT, UPDATE O DELETE
function Ejecuta ($sentencia){
    global $Cn;
    try {
        $result = $Cn->query($sentencia);
        $result->closeCursor();
        return 1; // Exito  
    } catch (Exception $e) {
        //die("Error en la linea: " + $e->getLine() + " MSG: " + $e->GetMessage());
        return 0; // Fallo
    }
}

//--------------------------Regiones-------------------------------------
function consultaRegion()
{
    $query = "SELECT idreg,nomreg FROM ventas.region ORDER BY nomreg";
    return Consulta($query);
}

function InsertarRegion(&$post){
    $nom = $post['nomr'];
    $sentencia = "INSERT INTO ventas.region(nomreg) values('$nom') RETURNING idreg";
    $id = EjecutaConsecutivo($sentencia,"idreg");
    // En el idc colocamos el valor que nos regresa el Returning 
    // que es el Consecutivo que se genero por ser de tipo SERIAL
    $post['idr']=$id; 
    return $id;
}

function ActualizarRegion($post){
    $idr = $post['idr'];
    $nomr = $post['nomr'];
    $sentencia = "UPDATE ventas.region SET nomreg='$nomr' WHERE idreg=$idr";
    return Ejecuta($sentencia);
}

function EliminarRegion($post){
    $idr = $post['idr'];
    $sentencia = "DELETE FROM ventas.region WHERE idreg=$idr";
    return Ejecuta($sentencia);
}

//--------------------------Deptos-------------------------------------
function consultaDepto()
{
    $query = "SELECT iddepto,nomdepto FROM ventas.departamento ORDER BY nomdepto";
    return Consulta($query);
}

function InsertarDepto(&$post){
    $nom = $post['nomd'];
    $sentencia = "INSERT INTO ventas.departamento(nomdepto) values('$nom') RETURNING iddepto";
    $id = EjecutaConsecutivo($sentencia,"iddepto");
    // En el idc colocamos el valor que nos regresa el Returning 
    // que es el Consecutivo que se genero por ser de tipo SERIAL
    $post['idd']=$id; 
    return $id;
}

function ActualizarDepto($post){
    $idd = $post['idd'];
    $nomd = $post['nomd'];
    $sentencia = "UPDATE ventas.departamento SET nomdepto='$nomd' WHERE iddepto=$idd";
    return Ejecuta($sentencia);
}

function EliminarDepto($post){
    $idd = $post['idd'];
    $sentencia = "DELETE FROM ventas.departamento WHERE iddepto=$idd";
    return Ejecuta($sentencia);
}


//--------------------------suc-------------------------------------
function consultaSuc()
{
    $query = "SELECT a.idsuc,a.nomsuc,a.cp,a.idreg, b.nomreg FROM ventas.sucursal a inner join ventas.region b on (a.idreg = b.idreg) ORDER BY a.nomsuc";
    return Consulta($query);
}

function InsertarSuc(&$post){
    $nom = $post['noms'];
    $cp = $post['cp'];
    $idr = $post['idreg'];
    $sentencia = "INSERT INTO ventas.sucursal(nomsuc,cp,idreg) values('$nom','$cp','$idr') RETURNING idsuc";
    $id = EjecutaConsecutivo($sentencia,"idsuc");
    // En el idc colocamos el valor que nos regresa el Returning 
    // que es el Consecutivo que se genero por ser de tipo SERIAL
    $post['ids']=$id; 
    return $id;
}

function ActualizarSuc($post){
    $ids = $post['ids'];
    $noms = $post['noms'];
    $cp = $post['cp'];
    $idr = $post['idreg'];
    $sentencia = "UPDATE ventas.sucursal SET nomsuc='$noms', cp='$cp', idreg='$idr' WHERE idsuc=$ids";
    return Ejecuta($sentencia);
}

function EliminarSuc($post){
    $ids = $post['ids'];
    $sentencia = "DELETE FROM ventas.sucursal WHERE idsuc=$ids";
    return Ejecuta($sentencia);
}

//------------------------------------------producto----------------------------------------------------------
function consultaProd()
{
    $query = "SELECT a.idprod, a.nomprod, a.unidadmed, a.iddepto, b.nomdepto FROM ventas.producto a inner join 
    ventas.departamento b on (a.iddepto = b.iddepto) ORDER BY a.nomprod";
    return Consulta($query);
}

function InsertarProd(&$post){
    $nom = $post['nomp'];
    $um = $post['um'];
    $idp = $post['iddep'];
    $sentencia = "INSERT INTO ventas.producto(nomprod,unidadmed,iddepto) values('$nom','$um','$idp') RETURNING idprod";
    $id = EjecutaConsecutivo($sentencia,"idprod");
    // En el idc colocamos el valor que nos regresa el Returning 
    // que es el Consecutivo que se genero por ser de tipo SERIAL
    $post['idp']=$id; 
    return $id;
}

function ActualizarProd($post){
    $idp = $post['idp'];
    $nomp = $post['nomp'];
    $um = $post['um'];
    $idd = $post['iddep'];
    $sentencia = "UPDATE ventas.producto SET nomprod='$nomp', unidadmed='$um', iddepto=$idd WHERE idprod=$idp";
    //die($sentencia);
    return Ejecuta($sentencia);
}

function EliminarProd($post){
    $idp = $post['idp'];
    $sentencia = "DELETE FROM ventas.producto WHERE idprod=$idp";
    return Ejecuta($sentencia);
}
//-----------------------------Grafica Region------------------------------
function CargaVtasXRegion($idreg){
    $query = "SELECT a.nomsuc x, sum(b.importe) y
    FROM ventas.sucursal a inner join ventas.detalleventa b on (a.idsuc = b.idsuc)
    where a.idreg = $idreg Group by a.nomsuc";
    return Consulta($query);

}

function CargaTodasRegion(){
    $query = "SELECT c.nomreg x, sum(b.importe) y
    FROM ventas.sucursal a inner join ventas.detalleventa b on (a.idsuc = b.idsuc) inner join ventas.region c on (a.idreg = c.idreg)
     Group by c.nomreg";
    return Consulta($query);

}

function rptVtasXRegion($idreg){
    $query = "select nomreg,nomsuc,nomcte, sum(importe) total
    from ventas.region a inner join 
    ventas.sucursal b on (a.idreg = b. idreg)
    inner join ventas.cliente c on (b.idsuc = c.idsuc)
    inner join ventas.venta d on (c.idcte = d.idcte)
    inner join ventas.detalleventa e on 
    (d.foliovta = e.foliovta)
    where a.idreg = $idreg
    Group by nomreg, nomsuc, nomcte";
    return Consulta($query);
}


//-----------------------------Grafica Departamento------------------------------
function CargaVtasXDepto($iddepto){
    $query = "SELECT b.nomprod x, sum(d.importe) y
    FROM ventas.departamento a inner join ventas.producto b on (a.iddepto = b.iddepto)
    inner join ventas.inventario c on (b.idprod = c.idprod) inner join 
    ventas.detalleventa d on (c.idprod = d.idprod and c.idsuc = d.idsuc)
    where a.iddepto = $iddepto 
    Group by b.nomprod";
    return Consulta($query);

}

function CargaTodosDeptos(){
    $query = "SELECT a.nomdepto x, sum(d.importe) y
    FROM ventas.departamento a inner join ventas.producto b on (a.iddepto = b.iddepto)
    inner join ventas.inventario c on (b.idprod = c.idprod) inner join 
    ventas.detalleventa d on (c.idprod = d.idprod and c.idsuc = d.idsuc)
     Group by a.nomdepto";
    return Consulta($query);

}



//----------------------------------Acceso----------------------------------------------
function InsertarUsr($post){
    $corr = $post['corru'];
    $nom = $post['nomu'];
    $cont = $post['contu'];
    $contEnt = password_hash($cont, PASSWORD_DEFAULT);
    $sentencia = "INSERT INTO ventas.usuario(correousr,nomusr,contrasena) values ('$corr','$nom','$contEnt')";
    $id = Ejecuta($sentencia);
    return $id;
}

function validaUser($post,$ids){
    $corr = $post['corr'];
    $cont = $post['cont'];
    $query = "select * from ventas.usuario where correousr='$corr'";
    $res = Consulta($query);
    if ($res){

        $pwd = $res[0]['contrasena'];
        if (password_verify($cont, $pwd)){
            $sentencia = "update ventas.usuario set sesion = '$ids' where correousr='$corr' "; 
            $result = Ejecuta($sentencia);
            return 1;
        }else{
            return 0;
        }
    }
    else{
        return 0;
    }
}

//valida opcion
function validaOpcion(){
    if(!isset($_SESSION)){
        session_start();
        $idSess = session_id();
        $corr = $_SESSION["correo"];
        $query = "SELECT sesion FROM ventas.usuario WHERE correousr='$corr'";
        $res = Consulta($query);

        $sess = $res[0]['sesion'];
        if($sess == $idSess){
            return 2710;
        }
        return"";
    }

}

//recive el contenido de la caja de tecto
//elimina espacios al principio y final
function val_input($data){
    $data = trim($data);
    $data = str_replace("'", "",$data);
    $data = str_replace("select", "",$data);
    $data = str_replace("Select", "",$data);
    $data = str_replace("SELECT", "",$data);
    $data = str_replace("drop", "",$data);
    $data = str_replace("Drop", "",$data);
    $data = str_replace("DROP", "",$data);
    $data = str_replace("delete", "",$data);
    $data = str_replace("Delete", "",$data);
    $data = str_replace("DELETE", "",$data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



