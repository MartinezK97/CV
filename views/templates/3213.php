<input type="hidden" id="templateID" value="3213">
<?php
$user = $this->getData['currentUser'];
$lang = "es";
if(!empty($user['lang'])){
    $lang = $user['lang'];
}

$titles = json_decode(file_get_contents('config/json/titlesLang.json'), true);
$title = $titles[$lang];
// $this->css(['3213']);
$this->css(['fontawesome']);
// $this->render('document/setDocumentPropertys', ["vars"=>$user['styles']]);

?>
<section id="contenedor-hojas">
    <section class="hoja a4" id="a4">
        <section class="cabecera headerColor">
            <div class="contenedor-nombre" data-order="1">
                <input   class="nameColor nombre" type="text" id="name"  value="<?php echo $user['nombre'];?>">
                <input   class="profColor profesion" type="text" id="profession" class="profesion" value="<?php echo $user['profesion'];?>">

            </div>
            <a href="#" class="contenedor-foto" id="contentPreviewImg">
                <?php if(isset($user['foto']) && $user['foto'] != "empty.png"):?>
                    <img src="<?php echo constant('URL')."resource/img/users/".$user['foto'];?>" alt="">
                    <?php else:?>
                    <img src="<?php echo constant('URL')."resource/img/users/empty.png";?>" alt="Foto">

                    <?php endif;?>
                </a>
            <input type="file" style="display:none;" id="faceID"  accept="image/*">
            <img src="<?php echo constant('URL');?>resource/img/templates/header3213.svg" alt="headerIMG">
            <!-- <svg id="visual" class="headerBG" viewBox="0 0 800 240" width="800" height="240" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><rect x="0" y="0" width="800" height="240" fill="#00000000" class="primaryColor"></rect><path d="M0 104L33.3 111.2C66.7 118.3 133.3 132.7 200 135.3C266.7 138 333.3 129 400 123.5C466.7 118 533.3 116 600 129.8C666.7 143.7 733.3 173.3 766.7 188.2L800 203L800 241L766.7 241C733.3 241 666.7 241 600 241C533.3 241 466.7 241 400 241C333.3 241 266.7 241 200 241C133.3 241 66.7 241 33.3 241L0 241Z" fill="#ffffff" stroke-linecap="round" stroke-linejoin="miter"></path></svg> -->
            <!-- <?php require "resource/img/templates/header3213.svg";?> -->
        </section>
        <section class="body">
            <section class="left">
                <section class="block" id="experiencias">
                    <h3 class="title titleColor block-title">
                        <i class="fa fa-briefcase"></i> 
                        <?php echo $title['exp'];?> 
                        <button class="openModal" id="openNewExperience">
                            <i class="fa fa-plus " id=""></i> nuevo
                        </button>
                    </h3>
                    
                    <?php for($i=0; $i<count($user['experiencias']); $i++):?>
                             <div class="content-block">
                                <span class="dot"></span>
                                <button title="Eliminar esta experiencia" class="trash trashExp" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input   class="appointment" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['appointment']?>">
                                <input   class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['experiencias'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i;?>"><?php echo $user['experiencias'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
                    <button class="add btn-size-m btn-secondary openModal notShow" rel="newexperience" style="display: none;"><i class="fa fa-plus"></i> Agregar experiencia</button>
                </section><!--fIN EXPERIENCIAS-->

                <!-- FORMACION ACADEMICA -->
                <section class="block" id="education">
                    <h3 class="title block-title"><i class="fa fa-graduation-cap"></i> <?php echo $title['for']?>  <button class="openModal" id="openNewEducation">
                            <i class="fa fa-plus " id=""></i> nuevo
                        </button></h3>
                    
                    <?php for($i=0; $i<count($user['formacion']); $i++):?>
                             <div class="content-block">
                                <!-- <span class="dot"></span> -->
                                <button title="Eliminar" class="trash trashEducation" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input class="institution" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['institution']?>">
                                <input class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['formacion'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
                </section><!--FIN FORMACION ACADEMICA-->

                <!-- Cursos y Capacitaciones -->
                <section class="block" id="course">
                    <h3 class="title block-title"><i class="fa fa-book"></i> <?php echo $title['cur']?>   <button class="openModal" id="openNewCourse">
                            <i class="fa fa-plus " id=""></i> nuevo
                        </button></h3>
                        <?php for($i=0; $i<count($user['estudios']); $i++):?>
                             <div class="content-block">
                                <!-- <span class="dot"></span> -->
                                <button title="Eliminar" class="trash trashCourse" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>
                                <input class="institution" type="text" rel="<?php echo $i?>" value="<?php echo $user['estudios'][$i]['institution']?>">
                                <input class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['estudios'][$i]['date'];?>">
                                <textarea class="description" rel="<?php echo $i?>"><?php echo $user['estudios'][$i]['description'];?></textarea>
                            </div>
                      <?php  endfor; ?>
                </section><!--Fin Formacion Academica -->

            </section><!--Fin section left-->
            <section class="division"></section><!--Fin section division-->
            <section class="right">

                <div id="contactos" class="block contactos">
                    <p><i class="far fa-envelope"></i> <input   type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email']?>"></p>
                    <p><i class="fab fa-whatsapp"></i> <input   type="text" id="mobile" placeholder="Numero de contacto" value="<?php echo $user['movil']?>"></p>
                    <p><i class="fa fa-map-marker-alt"></i> <input   type="text" id="location" placeholder="Ciudad de recidencia" value="<?php echo $user['localidad']?>"></p>
                </div>

                <div class="block  sobremi">
                    <h3 class="title"><i class="fas fa-user"></i> <?php echo $title['pro']?></h3>
                    <textarea id="myprofile" placeholder="Brebe descripcion de mi actualizad y personalidad"><?php echo $user['sobremi']?> </textarea>
                </div>

                <div class="block" id="dexterity">
                    <h3 class="title"><i class="fa fa-crosshairs"></i>  <?php echo $title['des']?> <i class="fa fa-plus newDexterity"></i></h3>
                    <?php foreach($user['competencias'] as $key=>$val):?>
                        <p>
                            <input rel="<?php echo $key;?>" value="<?php echo $val;?>">
                            <button rel="<?php echo $key;?>" class="trashDexterity"><i class="fa fa-times "></i></button>
                        </p>
                
                    <?php endforeach;?>
                    <p class="contentNewDextery" style="display:none;">
                        <input rel='new' id='newDexterityVal' placeholder='Nueva destreza..' >
                        <button  class='trashDexterityNew'>
                            <i class='fa fa-times'></i>
                        </button>
                    </p>
                </div>

                <div class="block" id="skills">
                    <h3 class="title"><i class="fa fa-laptop"></i>  <?php echo $title['com']?></h3>
                    <?php foreach($user['habilidades'] as $key=>$val):?>
                        <p>
                            <input rel="<?php echo $key;?>" value="<?php echo $val;?>">
                            <button rel="<?php echo $key;?>" class="trashSkill"><i class="fa fa-times "></i></button>
                        </p>
                    <?php endforeach;?>
                </div>

                <!-- <h4 class="title"><i class="fa fa-user"></i> Perfil</h4> -->
            </section><!--Fin section right-->
        </section><!--Fin section body-->

    </section><!--Fin section hoja-->
</section>