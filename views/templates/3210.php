<?php $user = $this->getData['currentUser'];
$lang = "es";
if(!empty($user['lang'])){
    $lang = $user['lang'];
}

$titles = json_decode(file_get_contents('config/json/titlesLang.json'), true);
$title = $titles[$lang];
?>
<section id="contenedor-hojas">
    <section class="hoja a4" id="a4">
        <section class="cabecera">
            <a href="#" class="contenedor-foto" id="contentPreviewImg">
                <?php if(isset($user['foto']) && $user['foto'] != "empty.png"):?>
                    <img src="<?php echo constant('URL').'resource/img/users/'.$user['foto'];?>" >
                <?php endif;?>
            </a>
             <div id="contenedor-nombre" data-order="1">
                <input   type="text" id="nombre" class="" value="Valeria Martínez">
                <input   type="text" id="profesion" class="profesion" value="Estudiante de Administración">
            </div>
            <input type="file" id="faceID" style="display:none;">
        </section>
        <!-- SECCION IZQUIERDA -->
        <section class="left-box">
            
            <!-- Contactos -->
            <div id="contactos" class="block contactos">
                <!-- <p><i class="fa fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="jhonDoe@email.com"></p> -->
                <p><i class="far fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="jhonDoe@email.com"></p>
                <p><i class="fab fa-whatsapp"></i> <input   type="text" id="movil" placeholder="Numero de contacto" value="+598 91 234 567"></p>
                <p><i class="fa fa-map-marker-alt"></i> <input   type="text" id="localidad" placeholder="Ciudad de recidencia" value="Montevideo, Uruguay"></p>
            </div>

            <!-- Sobre mi -->
            <div class="block  sobremi">
                <h3 class="title"><i class="fas fa-user"></i> Sobre mi</h3>
                <textarea id="sobremi" placeholder="Brebe descripcion de mi actualizad y personalidad">Descripción de mi </textarea>
            </div>

            <!-- Competencias -->
            <div id="competencias" class="block list">
                <h3 class="title"><i class="fa fa-user"></i> <?php echo $title['com']?></h3>
                <p><input   type="text" rel="0" value="PowePoint"><i class="fa fa-times trash trash-comp"></i></p>
                <p><input   type="text" rel="1" value="Word"><i class="fa fa-times trash trash-comp"></i></p>
                <p><input   type="text" rel="2" value="Excel"><i class="fa fa-times trash trash-comp"></i></p>
            </div>

            <!-- Habilidades -->
            <div id="habilidades" class="block list">
                <h3 class="title"><i class="fa fa-user"></i> <?php echo $title['des']?></h3>
                <p><input   type="text" rel="0" value="Proactiva"></p>
                <p><input   type="text" rel="1" value="Puntual "></p>
                <p><input   type="text" rel="2" value="Responsable"></p>
            </div>
        </section><!--Fin Left box-->
        

        <!-- SECCION DERECHA -->
        <section class="right-box">
            <hr class="timeline " style="height: 777.145px;">
            
            <!-- Experiencias -->
            <section class="block" id="experiencias">
                <h3 class="title block-title"><i class="fa fa-briefcase"></i> <?php echo $title['exp']?></h3>
                <div class="content-block">
                    <span class="dot"></span>
                    <button title="Eliminar esta experiencia" class="trash trash-exp" rel="0"><i class="fa fa-trash"></i></button>
                    <input   class="appointment" type="text" rel="0" value="Cajera de supermercado">
                    <input   class="tt3 date" type="text" rel="0" value="Enero de 2018 - Junio de 2022">
                    <textarea class="description" rel="0">Me deemeñaba como cajera en la cadena de supermercados Superdescuento S.A.</textarea>
                </div>
                <div class="content-block">
                    <span class="dot"></span>
                    <button title="Eliminar esta experiencia" class="trash trash-exp" rel="1"><i class="fa fa-trash"></i></button>
                    <input   class="appointment" type="text" rel="1" value=" Cajera en supermercados SuperDescuento">
                    <input   class="tt3 date" type="text" rel="1" value="Agosto 2015 - Diciembre de 2017">
                    <textarea class="description" rel="1">Me desempeñaba ocupando el cargo de cajera en Supermercados SuperDescuento. Poseo 8 años de experiencia en mi puesto, siendo capáz de poder resolver cualquier situación o imprevisto. Cabe destacar que también cuento con conocimientos en fiambrería y reposición. </textarea>
                </div>
            </section>

            <!-- FORMACION -->
            <section class="block" id="formacion">
                <h3 class="title block-title"><i class="fa fa-graduation-cap"></i> <?php echo $title['for']?></h3>
                <div class="content-block">
                    <span class="dot"></span>
                    <button title="Eliminar esta formacion" class="trash trash-for" rel="0"><i class="fa fa-trash"></i></button>
                    <input   class="institution" type="text" rel="0" value="Educación Técnico Superior de Administración">
                    <input   class="tt3 date" type="text" rel="0" value="Marzo 2023 - Actualmente cursando">
                    <textarea class="description" rel="0">Me encuentro actualmente cursando la UTU orientada a la administración de empresas.</textarea>
                </div>
            </section><!-- FIN FORMACION -->

            <!-- Estudios -->
            <section class="block" id="estudios">
                <h3 class="title block-title"><i class="fa fa-graduation-cap"></i> <?php echo $title['cur']?></h3>
                <div class="content-block">
                    <span class="dot"></span>
                    <button title="Eliminar esta actividad" class="trash trash-est" rel="0"><i class="fa fa-trash"></i></button>
                    <input   class="institution" type="text" rel="0" value="Educación Técnico Superior de Administración">
                    <input   class="tt3 date" type="text" rel="0" value="Marzo 2023 - Actualmente cursando">
                    <textarea class="description" rel="0">Me encuentro actualmente cursando la UTU orientada a la administración de empresas.</textarea>
                </div>
            </section><!-- FIN Estudios -->
        </section><!-- FIN right -->
       

    </section><!-- FIN a4 -->
    </section><!-- FIN content-hojas -->