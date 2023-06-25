<?php $this->css('leftMenu');?>
<section id="leftMenu" class="accordion">
    <h4><i class="fa fa-user"></i> Mi Perfil</h4>
    <div>
        <a href="<?php echo constant('URL');?>user/info" class="info">Informacion pública</a>
        <a href="<?php echo constant('URL');?>" class="info">Información privada</a>
    </div>

    <h4><i class="fa fa-file-pdf"></i> Mis proyectos</h4>
    <div>
        <a href="<?php echo constant('URL');?>" class="info">Borradores</a>
        <a href="<?php echo constant('URL');?>" class="info">Terminados</a>
    </div>

    <h4><i class="fa fa-archive"></i> Archivos guardados</h4>
    <div>
        <a href="<?php echo constant('URL');?>" class="info">PDF</a>
        <a href="<?php echo constant('URL');?>" class="info">Editables</a>
    </div>
    
    <a href="<?php echo constant('URL');?>logout" class="info"> <i class="fa fa-log-out"></i>Cerrar</a>

    <!-- <h4><i class="fa fa-user"></i> Sesión</h4>
    <div>
    </div> -->

</section>