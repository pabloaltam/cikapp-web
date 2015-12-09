<?php include 'structure/navbarFinSession.php'; ?>


<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

        <!--
    
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
    
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="panel-empresa.php" class="simple-text">
                    Panel de Empresa
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="panel-empresa.php">
                        <i class="pe-7s-home"></i>
                        <p>Control Panel</p>
                    </a>
                </li>
                <li>
                    <a href="publicaciones.php">
                        <i class="pe-7s-portfolio"></i>
                        <p>Ofertas publicadas por mi</p>
                    </a>
                </li>
                <li>
                    <a href="filtro-usuarios.php">
                        <i class="pe-7s-folder"></i>
                        <p>Buscar postulantes</p>
                    </a>
                </li>

                <li>
                    <a href="edit-enterprise-profile.php">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Editar perfil</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                    <a class="navbar-brand" href="#">Usuario</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <b class="caret"></b>
                                <span class="notification">1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mensaje 1</a></li>
                                <li><a href="#">Mensaje 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-8">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Noticias</h4>
                                <p class="category">Diario financiero RSS</p>
                            </div>
                            <div class="container-fluid"  style="height:300px; overflow-x: hidden;">
                                <?php
                                include "structure/rss/lastRSS.php";
                                $rss = new lastRSS;
                                $rss->cache_dir = './temp';
                                $rss->cache_time = 1200;
                                // cargar archivo RSS
                                $rs = $rss->get('https://www.df.cl/noticias/site/list/port/rss.xml');
                                // Muestra titulo y enlace
                                echo "<dl>\n";
                                foreach ($rs['items'] as $item) {
                                    ?>
                                    <dt><a href='<?php echo $item['link'] ?> '><?php echo $item['title'] ?> </a>
                                        <p><?php echo $item['description'] ?></p>
                                        <p><label>Categoria</label><?php echo $item['category'] ?><label>Fecha</label><?php echo $item['pubDate'] ?> </p>
                                    </dt>
                                    <?php
                                }
                                echo "</dl>\n";
                                ?>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Cikapp noticias
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Publicar Aviso</h4>
                            </div>
                            <div class="content">
                                    
                                       
                                            <form class="form form-vertical" action="publicaciones.php" method="post">
                                                <div class="control-group">
                                                    <label>Titulo del aviso</label>
                                                    <div class="controls">
                                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo del aviso">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label>Nombre del Cargo</label>
                                                    <div class="controls">
                                                        <input type="text" name="nombreCargo" class="form-control" placeholder="Nombre Puesto o Cargo del Trabajo">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Ubicación</label>
                                                    <div class="controls">
                                                        <select id="txtCiudad" class="form-control" name="COMUNA_ID">
                                                            <option value="-1">Seleccione...</option>
                                                            <?php
                                                            require 'include/conexion.php';
                                                            $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
                                                            $resultado = $mysqli->query($query);
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Tipo de Contrato</label>
                                                    <div class="controls">
                                                        <select name="tipoContrato" class="form-control">
                                                            <option value="1">A Plazo Fijo </option>
                                                            <option value="2">A Plazo Indefinido</option>
                                                            <option value="3">Por Faena</option>
                                                        </select>
                                                    </div>

                                                    <div class="control-group">
                                                        <label>Tipo de Jornada Laboral</label>
                                                        <div class="controls">
                                                            <select name="tipoJornadaLaboral" class="form-control">
                                                                <option value="1">Free lance</option>
                                                                <option value="2">Part time (20 hrs semanales)</option>
                                                                <option value="3">Part time (30 hrs semanales)</option>
                                                                <option value="4">Full time (45 ó mas horas semanales)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label>Fecha de Inicio</label>
                                                        <div class="controls">
                                                            <input type="date" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d"); ?>" max="2015-12-31" value="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                    </div>      
                                                    <div class="control-group">
                                                        <label>Publicación</label>
                                                        <div class="controls">
                                                            <textarea name="publicacion" class="form-control" placeholder="Descripcion breve y funciones"></textarea>
                                                        </div>
                                                    </div> 

                                                    <div class="control-group">
                                                        <label>Tipo del Plan de Publicacion</label>
                                                        <div class="controls">
                                                            <select name="tipoPublicacion" class="form-control"><option>A</option></option><option>AA</option><option>AAA</option><option>Nicho</option></select>
                                                        </div>
                                                    </div>    

                                                    <div class="control-group">
                                                        <label>Contraseña</label>
                                                        <div class="controls">
                                                            <input type="password" name="pass" class="form-control" placeholder="Clave">

                                                        </div>

                                                        <div class="control-group">
                                                            <label></label>
                                                            <div class="controls">
                                                                <input type="hidden" name="rut" value="<?php $idEmpresa; ?>"/>
                                                                <input type="hidden" name="accion" value="agregar"/>
                                                                <button type="submit" class="btn btn-primary btn-fill">
                                                                    Publicar
                                                                </button>
                                                            </div>

                                                        </div>   



                                                        <!-- FORMULARIO -->


                                                    </div><!--/panel content-->
                                                </div><!--/panel-->
                                            </form>
                                      



                                        <div class="footer">
                                            <hr>
                                            <div class="stats">
                                                <i class="fa fa-history"></i> Actualizado hace 3 minutos
                                            </div>
                                        </div>
                             
                            </div>
                        </div>
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; 2015 <a href="http://www.creative-tim.com">Cikapp</a>
                        </p>
                    </div>
                </footer>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {

                demo.initChartist();

                $.notify({
                    icon: 'pe-7s-gift',
                    message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

                }, {
                    type: 'info',
                    timer: 4000
                });

            });
        </script>
        <?php include 'structure/footer.php'; ?>
