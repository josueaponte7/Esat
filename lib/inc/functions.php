<?php

    function add_event($file,$action,$return = 'Exito'){
       $link = connect();
       $ip  = $_SERVER["REMOTE_ADDR"];
       $uid = $_SESSION["admin.id"];
       $date = date("Y-m-d");
       $time = date("h:i:s",time());
       $sql = "INSERT INTO auditoria SET
                fecha = '$date',
                hora = '$time',
                archivo = '$file',
                accion = '$action',
                resultado = '$return',
                ip = '$ip',
                usuario = '$uid'";
       mysql_query($sql,$link);
    }

    //SQL
    function _SQL($sql){

        $link = connect();
        $cta = mysql_query($sql,$link);
        while($fila = mysql_fetch_array($cta)){

            $reg[] = $fila;

        }

        return $reg;
    }

    //Contar Registros
    function _count($sql){

        $cnn = connect();
        $cta = mysql_query($sql,$cnn);
        $num = mysql_num_rows($cta);

        return $num;
    }

    function _info($tabla,$campo,$valor){

        $cnn = connect();
        $sql = "SELECT * FROM $tabla WHERE `$campo` = '$valor'";
        $cta = mysql_query($sql,$cnn);
        $reg = mysql_fetch_array($cta);
        return $reg;

    }


    function info_user($uid){

        $cnn = connect();
        $sql = "SELECT * FROM `usuarios` WHERE `cod_usu` = '$uid'";
        $cta = mysql_query($sql,$cnn);
        $reg = mysql_fetch_array($cta);
        return $reg;

    }
    
    function info_subject($cod_asi,$fld='cod_asi'){

        $cnn = connect();
        $sql = "SELECT * FROM `asignaturas` WHERE `$fld` = '$cod_asi'";
        $cta = mysql_query($sql,$cnn);
        $reg = mysql_fetch_array($cta);
        return $reg;

    }
    
    function info_student($sid, $fld = 'cod_par'){

        $cnn = connect();
        $sql = "SELECT * FROM `participantes` WHERE `$fld` = '$sid'";
        $cta = mysql_query($sql,$cnn);
        $reg = mysql_fetch_array($cta);
        return $reg;

    }
    
    

    function _uid($user){

        $cnn = connect();
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user'";
        $cta = mysql_query($sql,$cnn);
        $reg = mysql_fetch_array($cta);
        return $reg['id'];

    }


    function login_fails(){

           $cnn = connect();
           $ip  = $_SERVER["REMOTE_ADDR"];
           $fecha = date("Y-m-d");
           $sql = "SELECT * FROM auditoria WHERE ip = '$ip' AND fecha = '$fecha' AND archivo = 'Sistema' AND accion = 'Ingresar' AND resultado = 'Error' ";
           $qry = mysql_query($sql,$cnn);
           //$row = mysql_fetch_array($qry);

           return mysql_num_rows($qry);


    }

    //Non Banned : Permitir el acceso luego de 24hrs
    function non_banned(){

           $cnn = connect();
           $ip  = $_SERVER["REMOTE_ADDR"];
           $fecha = date("Y-m-d");
           $sql = "SELECT * FROM auditoria WHERE ip = '$ip' AND fecha = '$fecha' AND archivo = 'Sistema' AND accion = 'Ingresar' AND resultado = 'Error' ";
           $qry = mysql_query($sql,$cnn);
           $row = mysql_fetch_array($qry);

           if($row["fecha"] < date("Y-m-d")){
             return true;
           }else{
             return false;
           }

    }

    function _area_code_select($name='codigo'){

        echo '<select>';
        $options = array('0212','0243','0241','0246','0247','0248','0251','0271','0281','0282','0283','0412','0414','0416','0424','0426');
        foreach($options as $option):
            echo '<option>'.$option.'</option>';
        endforeach;
        echo '</select>';

    }


    function _convert_date($date, $to = 'es_ES'){

        if($to == 'es_ES'){
          $date = explode('-',$date);
          $date = $date[2].'/'.$date[1].'/'.$date[0];
        }
        if($to == 'en_US'){
          $date = explode('/',$date);
          $date = $date[2].'-'.$date[1].'-'.$date[0];
        }

        return $date;
    }

    function _states(){
      $cnn = connect();
      $sql = "SELECT * FROM estados ORDER BY nombre";
      $qry = mysql_query($sql,$cnn);
      while($reg = mysql_fetch_array($qry)){
        echo '<option value="'.$reg["id"].'">'.$reg["nombre"].'</option>';
      }

    }

    function _towns(){
      $cnn = connect();
      $sql = "SELECT * FROM municipios ORDER BY nombre";
      $qry = mysql_query($sql,$cnn);
      while($reg = mysql_fetch_array($qry)){
        echo '<option value="'.$reg["id"].'">'.$reg["nombre"].'</option>';
      }

    }

  
    
	function _p($var){
		
		return $_POST["$var"];
		
	}
	
	// Verificar asignaturas disponibles
	
	function ofertas($cod_par,$ct =1){
		
		$cnn = connect();
		$sql = "SELECT * FROM `asignaturas` LEFT JOIN `asignaturas_inscritas` ON asignaturas.cod_asi = asignaturas_inscritas.cod_ins WHERE `cod_par` = '$cod_par' "; //AND `asginaturas.cuatrimestre` <= '$ct'
		$qry = mysql_query($sql,$cnn);
		$row = mysql_fetch_array($qry);
		
		return $row;
		
	}
	
	

?>
