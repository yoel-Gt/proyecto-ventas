<?php

/**
 * 
 */
class modelSesion_Caja extends CI_model
{
	


	public function sesion($usuario, $contraseña){
		$usuario = $usuario;
		$contraseña =  $contraseña;

		$sql = "SELECT idusuario,nombre,apellido_P,clave FROM sistema_ventas.usuario
join sistema_ventas.personal on idPersonalUsuario = idpersonal
WHERE nomUsuario = '$usuario' and clave = '$contraseña';";
		$resul = $this->db->query($sql);

		if ($resul->num_rows() > 0) {
				return $resul->row();
		}else{
			return false;
		}
 
	}

//---------VALIDA SI YA SE AGREGO DINERO ENCAJA EN EL DIA ACTUAL
	public function ValidaCaja(){
		$sql = "SELECT
		case when ( select count(fecha) from sistema_ventas.efectivoCaja where date(fecha) = date(NOW())) = 'null' 
			then '0'
			else '1'  
			end as datos;";

		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->datos;	
	}

//--------------------MODELO INGRESAR EFECTIVO
	public function dineroCaja($efectivo){
		$efectivo = $efectivo;

		$sql = "INSERT INTO sistema_ventas.efectivoCaja (cantInicial,fecha) VALUES ('$efectivo', NOW());";

		$resul = $this->db->query($sql);

		return $resul;
	}
//----------MODELO AGREGAR USUARIO
	public function Crear_Sesion_User($Nombre,$A_Paterno,$A_Materno,$edad,$imagen,$Usuario,$contraseña_A)
	{
		$sql="insert into sistema_ventas.personal (nombre,apellido_P,apellido_M,edad,fotografia)
		values ('$Nombre','$A_Paterno','$A_Materno','$edad','$imagen');";
		$query = $this->db->query($sql);
		return $this->db->insert_id();

	}

	public function Crear_Sesion_User_2($result,$Usuario,$contraseña_A){
		$sql = "insert into sistema_ventas.usuario (nomUsuario,clave,idPersonalUsuario)
		values ('$Usuario','$contraseña_A','$result');";
		$query = $this->db->query($sql);
		return $query;
	}

	public function subirArchivo($archivo){
		$sql = "insert into sistema_ventas.imagenes (nombre)
		values ('$archivo');";
		$query = $this->db->query($sql);
		return $query;

	}

}
