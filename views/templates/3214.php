<?php 
    $user = $this->getData['currentUser'];
$this->css('3214');?>
<section id="contenedor-hojas">
    <section class="hoja a4" id="a4">
        <section class="header">
                <a href="#" class="contenedor-foto" id="contentPreviewImg">
                    <?php if(isset($user['foto']) && $user['foto'] != "empty.png"):?>
                        <!-- <img src="<?php echo constant('URL')."resource/img/users/".$user['foto'];?>" alt=""> -->
                        <?php endif;?>
                </a>
                
                <input type="text" class="name" value="<?php echo $user['nombre'];?>">
            <input type="text" class="profession" value="<?php echo $user['profesion'];?>">
            </section><!--fin header -->
            <section class="left">
                <input type="file" style="display:none;" id="faceID"  accept="image/*">
                <div id="contactos" class=" contactos">
                    <p><i class="far fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email']?>"></p>
                    <p><i class="fab fa-whatsapp"></i> <input   type="text" id="mobile" placeholder="Numero de contacto" value="<?php echo $user['movil']?>"></p>
                    <p><i class="fa fa-map-marker-alt"></i> <input   type="text" id="location" placeholder="Ciudad de recidencia" value="<?php echo $user['localidad']?>"></p>
                </div>
            <!-- <section class="profile block">
                <h4 class="titleTag"><i class="fa fa-user"></i> Perfil</h4>
                <textarea id="myprofile" placeholder="Brebe descripcion de mi actualizad y personalidad"><?php echo $user['sobremi']?> </textarea>
                
            </section> -->
            
            <!-- <section class="skills block">
                <h4 class="titleTag"><i class="fa fa-crosshairs"></i> Habilidades</h4>
                <?php foreach($user['habilidades'] as $key=>$val):?>
                        <input rel="<?php echo $key;?>" value="<?php echo $val;?>">
                    <?php endforeach;?>
            </section>

            <section class="skills block">
                <h4 class="titleTag"><i class="fa fa-laptop"></i> Competencias</h4>
                <?php foreach($user['competencias'] as $key=>$val):?>
                        <input rel="<?php echo $key;?>" value="<?php echo $val?>">
                    <?php endforeach;?>
            </section> -->
        </section><!--fin left-->
        <section class="right">
            <h3 class="titleTag"><i class="fa fa-briefcase"></i> Experiencia profesional</h3>
            <?php for($i=0; $i<count($user['experiencias']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar esta experiencia" class="trash trashExp" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['appointment']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['experiencias'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
            <h3 class="titleTag"><i class="fa fa-graduation-cap"></i> Formación académica</h3>
            <?php for($i=0; $i<count($user['formacion']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar" class="trash trashEdu" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['institution']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['formacion'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
            <h3 class="titleTag"><i class="fa fa-book"></i> Cursos y capacitaciones</h3>
            <?php for($i=0; $i<count($user['estudios']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar" class="trash trashEdu" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['estudios'][$i]['institution']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['estudios'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['estudios'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>

        </section>
    </section>
</section>