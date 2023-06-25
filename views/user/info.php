
<?php 
    $user = $this->getData['currentUser'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a OnlineCV!</title>
    <?php 
        $this->css(['root', 'default','dashboard', 'fontawesome', 'profile']);
        $this->js(['main', 'menu']);
        $this->libs(['fontawesome']);
    ?>
    <style>
        :root{
            --maxSizeBlock:800px;
        }
    </style>
</head>
<body>
    <?php $this->render('dashboard/header',['user'=>$user]);?>
    <?php $this->render('dashboard/leftMenu');?>
    <?php $this->render('dashboard/rightMenu');?>
    <section class="content-all">
        <form id="data-user"  action="">
            <h3 class="title">Completa tus datos</h3>
            <section class="card blocked">
                <h4 class="title-category">Información personal</h4>
                <div class="celda">
                    <span>Nombre</span>
                    <input type="text" placeholder="su nombre...">
                </div>
                <div class="celda">
                    <span>Profesión</span>
                    <input type="text" placeholder="profesión...">
                </div>
                <div class="celda">
                    <span>Numero de móvil</span>
                    <input type="number" placeholder="su movil...">
                </div>
                <div class="celda">
                    <span>Direccion email</span>
                    <input type="text" placeholder="su email...">
                </div>
                <div class="celda">
                    <span>Localidad</span>
                    <input type="text" placeholder="Ciudad, País">
                </div>

            </section>
            <section id="picture" class="blocked">
                <a href="#" class="picture">

                </a>

                <input type="file" style="display:none;" name="" id="">
            </section>

            <section id="myprofile" class="blocked">
                 <h4 class="title-category">Mi perfil</h4>
                <div class="celda w100">
                    <span>Descripción de mi perfil laboral</span>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
            </section>

            <section class="blocked">
                 <h4 class="title-category">Habilidades interpersonales</h4>
                 <div class="celda">
                    <input type="text" placeholder="Ej: Trabajo en equipo">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: Proactivo/a">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: Determinado/a">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: Responsable">
                </div>
            </section>

            <section class="blocked">
                 <h4 class="title-category">Competencias profesionales</h4>
                 <div class="celda">
                    <input type="text" placeholder="Ej: Office 365">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: Excel">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: Windows">
                </div>
                <div class="celda">
                    <input type="text" placeholder="Ej: PHP y Laravel">
                </div>
            </section>

            <section class="blocked">
                 <h4 class="title-category">Actividades y jornadas solidarias</h4>
                 <div class="celda">
                    <span>Nombre de la actividad</span>
                    <input type="text" placeholder="Ciudad, País">
                </div>
                <div class="celda">
                    <span>Duración</span>
                    <input type="text" placeholder="Ciudad, País">
                </div>
                <div class="celda">
                    <span>Desempeño</span>
                    <input type="text" placeholder="Ciudad, País">
                </div>
            </section>
            

            <section class="blocked">
                 <h4 class="title-category">Experiencias laborales</h4>
            </section>

            <section class="blocked">
                 <h4 class="title-category">Formación académica</h4>
            </section>

            <section class="blocked">
                 <h4 class="title-category">Cursos y pasantías</h4>
            </section>

           

            

        </form>
        
    </section>
    <?php
        $this->libs(['jquery','axios',]);
        $this->js(['default','config','main', 'menu']);

    ?>
</body>
</html>