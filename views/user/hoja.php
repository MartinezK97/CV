
<section id="a4" class="hoja ">
    
        <section class="cabecera">
        <?php 

            if($user['orders']['header']['name'] == "1"){?>
                <div id="contenedor-nombre" data-order="1">
                    <input type="text" id="nombre" class="" value="<?php echo $user['nombre'];?>">
                    <input type="text" id="profesion" class="profesion" value="<?php echo $user['profesion'];?>">
                </div>
            <?php } 

            if($user['orders']['header']['picture'] == "2"){?>
                <a href="#" class="contenedor-foto" data-order="2" style="background-image:url('<?php echo 'resource/img/users/'.$user['foto'] ?>');">
                    <button class="add notShow"><i class="fa fa-edit"></i> Cambiar</button>
                    <button class="edit openModal notShow" rel="adjustImage"><i class="fa fa-cog"></i> Ajustar</button>
                </a>
            <?php }
            if($user['orders']['header']['picture'] == "1"){?>
                <a href="#" class="contenedor-foto" data-order="2" style="background-image:url('<?php echo 'resource/img/users/'.$user['foto'] ?>');">
                    <button class="add notShow"><i class="fa fa-edit"></i> Cambiar</button>
                    <button class="edit openModal notShow" rel="adjustImage"><i class="fa fa-cog"></i> Ajustar</button>
                </a>
            <?php }
            
            if($user['orders']['header']['name'] == "2"){?>
                <div id="contenedor-nombre" data-order="1">
                    <input type="text" id="nombre" class="" value="<?php echo $user['nombre'];?>">
                    <input type="text" id="profesion" class="profesion" value="<?php echo $user['profesion'];?>">
                </div>
            <?php } 
             ?>

            <!-- <a href="#" class="contenedor-foto" data-order="2" style="background-image:url('<?php echo 'resource/img/users/'.$user['foto'] ?>');">
                <button class="add notShow"><i class="fa fa-edit"></i> Cambiar</button>
                <button class="edit openModal notShow" rel="adjustImage"><i class="fa fa-cog"></i> Ajustar</button>
            </a> -->
            <input type="file" id="file" style="display:none;">
            <!-- <div id="contenedor-nombre" data-order="1">
                <input type="text" id="nombre" class="" value="<?php echo $user['nombre'];?>">
                <input type="text" id="profesion" class="profesion" value="<?php echo $user['profesion'];?>">
            </div> -->
        </section>
        <!-- SECCION IZQUIERDA -->
            <section  class="left-box">
                <!-- Contactos -->
                <div id="contactos" class="block contactos">
                    <!-- <p><i class="fa fa-envelope"></i> <input type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email'];?>"></p> -->
                    <p><i class="far fa-envelope"></i> <input type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email'];?>"></p>
                    <p><i class="fab fa-whatsapp"></i> <input type="text" id="movil" placeholder="Numero de contacto" value="<?php echo $user['movil'];?>"></p>
                    <p><i class="fa fa-map-marker-alt"></i> <input type="text" id="localidad" placeholder="Ciudad de recidencia" value="<?php echo $user['localidad'];?>"></p>
                </div>
                <!-- Sobre mi -->
                <div  class="block  sobremi">
                    <h3 class="title"><i class="fas fa-user"></i> Perfil</h3>
                    <textarea id="sobremi" id="" placeholder="Brebe descripcion de mi actualizad y personalidad"><?php echo $user['sobremi'];?></textarea>
                </div>
                <div id="competencias" class="block list">
                    <h3 class="title"><i class="fa fa-user"></i> Competencias</h3>
                    <div class="content-data">

                        <?php foreach($user['competencias'] as $k=>$v):?>
                            <p><input type="text" rel="<?php echo $k; ?>" value="<?php echo $v; ?>"><i class="fa fa-times trash trash-comp"></i></p>
                        <?php endforeach; ?>
                    </div>
                        <button class="button-size-s btn-secondary add notShow"><i class="fa fa-plus"></i></button>
                </div>
                <div id="habilidades" class="block list">
                    <h3 class="title"><i class="fa fa-user"></i> Habilidades</h3>
                    <?php foreach($user['habilidades'] as $k=>$v):?>
                        <p><input type="text" rel="<?php echo $k; ?>" value="<?php echo $v; ?>"></p>
                    <?php endforeach; ?>
                </div>
            </section>
        

        <!-- SECCION DERECHA -->
        <section class="right-box">
            <hr class="timeline ">
            <section class="block" id="experiencias">
         
                <h3 class="title block-title"><i class="fa fa-briefcase"></i> Experiencias</h3>
                <?php foreach($user['experiencias'] as $key=>$val): ?>
                    <div class="content-block">
                        <span class="dot"></span>
                        <button title="Eliminar esta experiencia" class="trash trash-exp" rel="<?php echo $key;?>" ><i class="fa fa-trash"></i></button>
                        <input class="appointment" type="text" rel="<?php echo $key;?>" value="<?php echo $val['appointment'];?>">
                        <input class="tt3 date" type="text" rel="<?php echo $key;?>" value="<?php echo $val['date'];?>">
                        <textarea class="description" rel="<?php echo $key;?>"><?php echo $val['description'];?></textarea>
                    </div>
                <?php endforeach; ?>
                <button class="add btn-size-m btn-secondary openModal notShow" rel="newexperience"><i class="fa fa-plus"></i> Agregar experiencia</button>
            </section>

            <!-- FORMACION -->
            <section class="block" id="formacion">
                <h3 class="title block-title"><i class="fa fa-graduation-cap"></i> Formación académica</h3>
                <?php foreach($user['formacion'] as $key=>$val): ?>
                    <div class="content-block">
                        <span class="dot"></span>
                        <button title="Eliminar esta formacion" class="trash trash-for" rel="<?php echo $key;?>" ><i class="fa fa-trash"></i></button>
                        <input class="institution" type="text" rel="<?php echo $key;?>" value="<?php echo $val['institution'];?>">
                        <input  class="tt3 date" type="text" rel="<?php echo $key;?>" value="<?php echo $val['date'];?>">
                        <textarea class="description" rel="<?php echo $key;?>"><?php echo $val['description'];?></textarea>
                    </div>
                <?php endforeach; ?>
                <button class="add btn-size-m btn-secondary openModal notShow" rel="newTraining"><i class="fa fa-plus"></i> Agregar formación</button>
            </section>
            <!-- FIN FORMACION -->

            <!-- Estudios -->
            <section class="block" id="estudios">
                <h3 class="title block-title"><i class="fa fa-graduation-cap"></i> Cursos y actividades</h3>
                <?php foreach($user['estudios'] as $key=>$val): ?>
                    <div class="content-block">
                        <span class="dot"></span>
                        <button title="Eliminar esta actividad" class="trash trash-est" rel="<?php echo $key;?>" ><i class="fa fa-trash"></i></button>
                        <input class="institution" type="text" rel="<?php echo $key;?>" value="<?php echo $val['institution'];?>">
                        <input class="tt3 date" type="text" rel="<?php echo $key;?>" value="<?php echo $val['date'];?>">
                        <textarea class="description" rel="<?php echo $key;?>"><?php echo $val['description'];?></textarea>
                    </div>
                <?php endforeach; ?>
                <button class="add btn-size-m btn-secondary openModal notShow" rel="newstudy"><i class="fa fa-plus"></i> Agregar formación</button>
            </section>
            <!-- FIN Estudios -->
        </section>
       

    </section>