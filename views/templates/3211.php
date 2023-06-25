<?php

$user = $this->getData['currentUser'];
$this->css(['3211']);
$this->libs(['fontawesome', ]);

?>
<section id="contenedor-hojas">
    <section class="hoja a4" id="a4">
         <section class="cabecera headerColor">
            <a href="#" class="contenedor-foto" data-order="2" style="background-image:url('http://www.localhost/cv/resource/img/users/<?php echo $user['foto']?>');">
                <?php if(isset($user['foto']) && $user['foto'] != "empty.png"):?>
                    <img src="<?php echo constant('URL')."resource/img/users/".$user['foto'];?>" alt="">
                <?php endif;?>
            </a>
             <div class="contenedor-nombre" data-order="1">
                <input   class="nameColor nombre" type="text" id="name" class="" value="<?php echo $user['nombre']?>">
                <input   class="profColor profesion" type="text" id="profession" class="profesion" value="<?php echo $user['profesion'];?>">

            </div>
            
            <input type="file" style="display:none;" id="faceID"  accept="image/*">
        </section>
        <section class="body">
            <section class="left">
                <div id="contactos" class="block contactos">
                    <!-- <p><i class="fa fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="jhonDoe@email.com"></p> -->
                    <p><i class="far fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email']?>"></p>
                    <p><i class="fab fa-whatsapp"></i> <input   type="text" id="mobile" placeholder="Numero de contacto" value="<?php echo $user['movil']?>"></p>
                    <p><i class="fa fa-map-marker-alt"></i> <input   type="text" id="location" placeholder="Ciudad de recidencia" value="<?php echo $user['localidad']?>"></p>
                </div>

                <div class="block  sobremi">
                    <h3 class="title"><i class="fas fa-user"></i> Perfil</h3>
                    <textarea id="myprofile" placeholder="Brebe descripcion de mi actualizad y personalidad"><?php echo $user['sobremi']?> </textarea>
                </div>

                <div class="block  ">
                    <h3 class="title"><i class="fa fa-crosshairs"></i> Competencias</h3>
                    <?php foreach($user['competencias'] as $key=>$val):?>
                        <input rel="<?php echo $key;?>" value="<?php echo $val;?>">
                    <?php endforeach;?>
                </div>

                <div class="block  sobremi">
                    <h3 class="title"><i class="fa fa-laptop"></i> Habilidades</h3>
                    <?php foreach($user['habilidades'] as $key=>$val):?>
                        <input rel="<?php echo $key;?>" value="<?php echo $val;?>">
                    <?php endforeach;?>
                </div>

            </section><!--Fin section left-->
            <section class="right">
                <section class="block" id="experiencias">
                    <h3 class="title titleColor block-title"><i class="fa fa-briefcase"></i> Experiencia profesional </h3>
                    
                    <?php for($i=0; $i<count($user['experiencias']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar esta experiencia" class="trash trashExp" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['appointment']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['experiencias'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
                    <button class="add btn-size-m btn-secondary openModal notShow" rel="newexperience" style="display: none;"><i class="fa fa-plus"></i> Agregar experiencia</button>
                </section><!--fIN EXPERIENCIAS-->

                <!-- FORMACION ACADEMICA -->
                <section class="block" id="experiencias">
                    <h3 class="title titleColor block-title"><i class="fa fa-graduation-cap"></i> Formación académica</h3>
                    
                    <?php for($i=0; $i<count($user['formacion']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar" class="trash trashEdu" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['institution']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['formacion'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
                    <button class="add btn-size-m btn-secondary openModal notShow" rel="newexperience" style="display: none;"><i class="fa fa-plus"></i> Agregar experiencia</button>
                </section><!--FIN FORMACION ACADEMICA-->

                <!-- Cursos y Capacitaciones -->
                <section class="block" id="cursos">
                    <h3 class="title titleColor block-title"><i class="fa fa-book"></i> Cursos y Capacitaciones</h3>
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
                    <button class="add btn-size-m btn-secondary openModal notShow" rel="newexperience" style="display: none;"><i class="fa fa-plus"></i> Agregar experiencia</button>
                </section><!--Fin Formacion Academica -->

            </section><!--Fin section right-->
            <!-- <section class="division"></section>Fin section division -->
            
        </section><!--Fin section body-->

    </section><!--Fin section hoja-->
</section>