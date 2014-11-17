<?php
session_start();
if (isset($SESSION)) {
    header("location:menu.php"); /* Si ha iniciado la sesion correcta, vamos a consulta.php de lo contrario emite un mensaje de error */
} else {
    /* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos ser� mas c�modo as� que metiendo echo's */
    ?>
    &nbsp;
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#enviar').click(function (event) {
                        
                        
                        if ($('#usuario').val() == '') {
                            event.preventDefault();
                            $('#usuario').parent('div').addClass('has-error');
                            $('#usuario').focus();
                        } else if ($('#clave').val() == '') {
                            event.preventDefault();
                            $('#clave').parent('div').addClass('has-error');
                            $('#clave').focus();
                        } else {
                            $.post("comprobar.php", $("#form1").serialize(), function (respuesta) {
                                if (respuesta == 0) {
                                    alert('Usuario o Clave Incorrectos');
                                    $('#usuario').val('');
                                    $('#clave').val('');
                                }else if(respuesta == 1){
                                    window.location = 'menu.php';
                                }else if(respuesta == 4){
                                    window.location = 'menu4.php';
                                }
                            });
                        }
                    });

                });
            </script>
            <style type="text/css"> 

                #bar{
                    height:30px !important;
                    background: #c03333; /* Old browsers */
                    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
                    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2MwMzMzMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2MwMzMzMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iIzk0MDAwMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM5NDAwMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
                    background: -moz-linear-gradient(top,  #c03333 0%, #c03333 50%, #940000 50%, #940000 100%); /* FF3.6+ */
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#c03333), color-stop(50%,#c03333), color-stop(50%,#940000), color-stop(100%,#940000)); /* Chrome,Safari4+ */
                    background: -webkit-linear-gradient(top,  #c03333 0%,#c03333 50%,#940000 50%,#940000 100%); /* Chrome10+,Safari5.1+ */
                    background: -o-linear-gradient(top,  #c03333 0%,#c03333 50%,#940000 50%,#940000 100%); /* Opera 11.10+ */
                    background: -ms-linear-gradient(top,  #c03333 0%,#c03333 50%,#940000 50%,#940000 100%); /* IE10+ */
                    background: linear-gradient(to bottom,  #c03333 0%,#c03333 50%,#940000 50%,#940000 100%); /* W3C */
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c03333', endColorstr='#940000',GradientType=0 ); /* IE6-8 */
                    margin:0 0 1px 0;
                    padding:8px 0 4px 12px;
                    border-top:1px solid #d35f5f;
                    border-bottom:1px solid #600606;
                    color: #FFFFFF;
                    text-shadow:#A52A2A 1px 1px 0px;
                }



                input { 
                    font-family: Tahoma; 
                    font-size: 14px; 
                    background-color: #990000; 
                    border: #FFFFFF; 
                    border-style: solid; 
                    border-top-width: 1px; 
                    border-right-width: 1px;
                    border-bottom-width: 1px; 
                    border-left-width: 1px
                } 

                body,td,th {
                    font-family: Tahoma;
                    font-size: 12px;
                }
                .Estilo1 {
                    font-size: 18px;
                    color: #333333;
                }
                a:link {
                    color: #CC0000;
                }
                a:visited {
                    color: #CC0000;
                }
                a:hover {
                    color: #CC0000;
                }
                a:active {
                    color: #CC0000;
                }
                .Estilo5 {font-size: 12px;
                          font-weight: bold;
                }
                .Estilo9 {color: #FFFFFF}
                .password {font-family : arial, sans-serif;
                }

            </style>
        </head>
        <body>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <th colspan="2" scope="col">
                        <img src="images/logo-oficial.jpg" width="100%" height="60" />
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                        // session_start();
                        include 'config.php';
                        //include 'lib/inc/database.php';
//                        include 'lib/classes/document.class.php';
//                        include 'lib/classes/messages.class.php';
//                        include 'lib/inc/functions.php';
                        include SG_TEMPLATE_URL . 'index.php';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <img src="images/titulo.jpg" width="100%" height="82" />
                    </td>
                </tr>
                <tr>
                    <td width="44%">
                        <form name="form1" id="form1" autocomplete="off" method="post" action="comprobar.php" onSubmit="return Validar(this);">
                            <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col">
                                        <div align="justify">
                                            <span class="Estilo1">Acceso al Sistema </span>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input name="usuario" class="form-control input-sm" type="text" id="usuario" size="40" style="width:280px;background:url('images/iconos/16x16/user.png')no-repeat right center">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input name="clave" class="form-control input-sm" type="password" id="clave" size="40" style="width:280px;background:url('images/iconos/16x16/lock.png')no-repeat right center">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="recuperar.php">Olvid&eacute; mi contrase&ntilde;a</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="Submit" id="enviar" type="button" class="Estilo9" value="Ingresar al Sistema">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td width="56%">
                        <div align="right">
                            <img src="images/slider/01.jpg" width="672" height="346" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
            </table>
        </body>
    </html>
    <?php
} /* Y cerramos el else */
?>