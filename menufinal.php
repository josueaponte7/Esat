<!DOCTYPE html PUBLIC >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Documento sin t&iacute;tulo</title>
        <!-- Start css3menu.com HEAD section -->
        <link rel="stylesheet" href="menuadmin.css3prj_files/css3menu1/style.css" type="text/css" /><style>._css3m{display:none}</style>
        <!-- End css3menu.com HEAD section -->
    </head>

    <body>
        <ul id="css3menu1" class="topmenu" style="height: 38px;">
            <li class="topfirst">
                <a href="#" style="height:36px;line-height:17px">
                    <?php ?>
                    <span><?php if ($_SESSION["nivel"] == 2 || $_SESSION["nivel"] == 3) { ?> Registros <?php } ?></span>
                </a>
                 <ul>
                    <?php if ($_SESSION["nivel"] == 3) { ?>
                        
                        <li><a href='participantes.php'>Participantes</a></li>
                    <?php } ?>
                    <?php if ($_SESSION["nivel"] == 2) { ?>
                        <li><a href='cohorte.php'> Cohorte </a></li>
                        <li><a href='facilitadores.php'>Facilitadores</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="topmenu">
                <a href="#" style="height:36px;line-height:17px">
                    <span><?php if ($_SESSION["nivel"] == 2 || $_SESSION["nivel"] == 3) { ?> Procesos <?php } ?></span>
                </a>
                <ul>
                    <?php if ($_SESSION["nivel"] == 2) { ?>
                        <li><a href='asignacion.php'>Incorporaci&oacute;n de Asignatura</a></li>
                    <?php } ?>
                    
                    <?php if ($_SESSION["nivel"] == 3) { ?>    
                    <li><a href="#"><span>Inscripci&oacute;n</span></a>
                        <ul>
                            <li><a href='nuevoigreso.php'>Nuevo Ingreso</a></li>
                            <li><a href='alumnoregular.php'>Alumno Regular</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION["nivel"] == 2) { ?>
                        <li><a href='horario.php'>Horario</a></li>
                        <li><a href='notas.php'>Ingresar Notas</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="topmenu">
                <a href="#" style="height:36px;line-height:17px">
                    <?php if ($_SESSION["nivel"] > 1) { ?><span> Reportes </span><?php } ?>
                </a>
                <ul>
                    <li><a href='consparticipantes.php'>Participantes</a></li>

                    <li><a href='consasignaturas.php'>Asignaturas Registradas</a></li>

                    <li><a href='consfacilitadores.php'>Facilitadores Registrados</a></li>

                    <li><a href='consasignaciones.php'>Asignaciones de Asignatura</a></li>

                    <li><a href='conshorarios.php'>Horarios</a></li>

                    <li><a href='consinscripcin.php'>Inscripci&oacute;n</a></li>
                    <?php if ($_SESSION["nivel"] == 3) { ?>
                        <li><a href='consnotas.php'>Calificaciones Obtenidas</a></li>
                        <li><a href='consestudio.php'>Constancia de Estudio</a></li>
                        <li><a href='consnota.php'>Constancia de Notas</a></li>
                        <li><a href='consacademico.php'>Record Acad&eacute;mico</a></li>
                    <?php } ?>
                    <li><a href="panimal.pdf"  target="_blank">Pensum Animal</a></li>
                    <li><a href="pvegetal.pdf" target="_blank">Pensum Vegetal</a></li>
                </ul>
                
            </li>
            <li class="topmenu">
                <a href="#" style="height:36px;line-height:17px">
                    <span>Mantenimiento</span>
                </a>
                <ul>
                    <?php if ($_SESSION["nivel"] == 1) { ?><li><a href='usuario.php'> Nuevo Usuario </a></li><?php } ?> 
                    <li><a href="cambio.php">Cambio de Clave</a></li>
                    <?php if ($_SESSION["nivel"] == 1) { ?>
                        <li><a href='respaldo.php'> Respaldo B  </a></li>
                        <li><a href='consauditoria.php' > Informe de Auditor&iacute;a </a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="topmenu">
                <a href="#" style="height:36px;line-height:17px">
                    <span><?php if ($_SESSION["nivel"] == 2) { ?>Configuraci&oacute;n<?php } ?></span>
                </a>
                <?php if ($_SESSION["nivel"] == 2) { ?>
                    <ul>
                        <li><a href="mencion.php">Menci&oacute;n</a></li>
                        <li><a href='cuatrimestre.php'> Cuatrimestre </a></li>
                        <li><a href='periodo.php'> Periodo </a></li>
                        <li><a href='asignaturas.php' > Asignaturas </a></li>
                    </ul>
                <?php } ?>
            </li>
            <li class="topmenu">
                <a href="#" style="height:36px;line-height:17px">
                    <span>Ayuda</span>
                </a>
                <ul>
                    <li><a href="manual.pdf" target="_blank">Manual de Usuario</a></li>
                </ul>
            </li>
            <li class="toplast"><a href="cerrar.php" style="height:36px;line-height:17px">Salir</a></li>
        </ul>
    </body>
</html>
