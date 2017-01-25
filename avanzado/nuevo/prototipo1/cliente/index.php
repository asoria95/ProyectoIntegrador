<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>SICMA Información Sistema Médico</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link  rel="stylesheet" href="banner_animado/estilo_banner.css">  
<link rel="stylesheet" href="estilos_menu1.css">    
</head>
<body>

<?php
 include '/../conectar.php';
    
session_start(); // inicio de sesion y si esta iniciada     
  if(!$_SESSION){
      header("location: /avanzado/nuevo/prototipo1/registro_login/login.php");
  }  
    
?>




<table width="881" border="0" align="center" cellpadding="0" cellspacing="0" class="white">
	<tr>
		<td width="292"><img src="images/logo.jpg" width="292" height="79" alt=""/></td>
		<td width="500" align="right" valign="top" style="padding-top:5px; padding-right:10px;">|	 <a href="/../../../avanzado/nuevo/prototipo1/registro_login/desconectar_usuario.php" class="small">Cerrar Sesión </a></td>
        <td width="500" align="right" valign="top" style="padding-top:5px; padding-right:10px;">| <?php 
            echo $_SESSION['NOMBRES'] . " " . $_SESSION['APELLIDOS'];
            ?> </td>
	</tr>
	<tr>
		<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="tab"><a href="index.html" class="top">INICIO</a></td>
				<td class="tab"><a href="quienes_somos.html" class="top">QUIENES SOMOS</a></td>
				<td class="tab"><a href="doctor.html" class="top">DOCTOR</a></td>
				<td class="tab"><a href="contacto.html" class="top">CONTACTO</a></td>
				
				<td>&nbsp;</td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td colspan="2" style="border-top:2px solid #10ADBE;"  class="banner"></td>
	</tr>
	<tr>
		<td colspan="2" style="padding-top:8px; padding-left:4px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><div class="inner_copy"></div>
				<td width="225" valign="top">
                    <div class="heading_2">Menú</div>
                    <div id="menu">
<ul>
    <li class="has-sub"><a title="" href="#">Datos Personales</a>
        <ul>
            <li><a title="" href="modificar paciente/modificar_paciente.html">Modificar Datos Personales</a></li>
             <li><a title="" href="#">Visualizar Datos Personales</a></li>
              <li><a title="" href="eliminar paciente/eliminar_paciente.html">Solicitar eliminación de Datos Personales</a></li>
         </ul>
    </li>
    <li class="has-sub"><a title="" href="#">Consultas</a>
        <ul>
             <li><a title="" href="mostrar_consultas_paciente/mostrar_consultas_paciente.html">Listado de Consultas</a></li>
        </ul>
    </li>
    <li class="has-sub"><a title="" href="#">Cita Médica</a>
        <ul>
            <li><a title="" href="insertar reserva/insertar_reserva.html">Reservar Cita Médica</a></li>
             <li><a title="" href="eliminar reserva/eliminar_reserva.html">Cancelar Cita Médica</a></li>
             <li><a title="" href="mostrar_cita_paciente/mostrar_cita.html">Listado de Citas Médicas</a></li>
         </ul>
    </li>
    <li class="has-sub"><a title="" href="#">Facturación</a>
        <ul>
             <li><a title="" href="#">Listado de Facturas</a></li>
         </ul>
    </li>
    <li><a title="" href="#">Chat en Linea</a></li>
</div>
                </td>
				<td align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="heafing">Bienvenidos</td>
					</tr>
					<tr>
						<td class="text"><strong>Medicina Familiar</strong><br>
						La medicina familiar trata de mantener un buen estado de salud en todo el nucleo familiar, es necesario tener conocimiento sobre esta medicina e implementarla en nuestro núcleo familiar, con el fin de mejorar el estilo de vida de toda nuestra familia, además de cumplir con un principio adoptado recientemente que es la medicina preventiva, ya que es mejor prevenir que lamentar.
                            
                        </td>
					</tr>
					<tr>
						<td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="50%" class="heafing3">Proyecto SICMA</td>
								<td width="50%" class="heafing3">Proyecto SICMA</td>
							</tr>
							<tr>
								<td class="text"><strong>Servicios</strong><br />
								Este proyecto esta enfocado en el cuidado de la familia con el servico de medicina familiar, donde se trata de crear un ambiente agradable entre médico y pacientes en el desenvolvimiento de nuestras funciones, consta de un médico con gran experiencia y gustoso de atenderlos a ustedes y a toda su familia.
                                El doctor estará gustoso de atenderlo en su consultorio.    
                            
                                </td>
								<td class="text"><strong>Utilidades del Sitio</strong><br />
								En este sitio usted podrá establecer un chat en línea con el doctor para poder satisfacer pequeñas dudas que se le puedan presentar, además permite la reservación de citas médicas de acuerdo a la agenda del médico, dandole a usted la facilidad de evitar cualquier incoveniente con los tiempos, tambien usted podrá acceder a sus recetas y/o tratamientos de sus consultas.	
                                
                                </td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		
        
    <!---    <td colspan="2" class="copy_bg" style="padding-top:8px;padding-left:4px">
			<a href="#" class="s_link">Cutomer Service</a>
			<a href="#" class="s_link">Create Account</a>
			<a href="#" class="s_link">Career</a>
			<a href="#" class="s_link">Contact Us</a>
		</td>
    -->    
	</tr>
	<tr>
		<td colspan="2" class="copy_bg" style="padding:11px">
			<center>
				<div class="fleft">Copyright MLA desarroladores web </div>
				<div class="fright">Design by <a href="·">billsstudio.com</a></div>
				
				</div class="fclear"></div>
			</center>
		</td>
	</tr>
</table>
</body>
</html>