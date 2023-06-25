<?php
    $select = 'home';
    $options = ['profile'=>'','publications'=>'','website'=>'','settings'=>''];
    $option = '';
    if(isset($this->getData) && !empty($this->getData)):
        $select = $this->getData['select'];
        
        // Si la opcion esta en el menu, cambiamos el valor del arreglo options
        if(in_array($select, array_keys($options))){
            $options[$select] = 'expand';
            
        }


        if(isset($this->getData['option'])):
            $option = $this->getData['option'];
            $$option = 'selected';
        endif;


    endif;




?>


<section id="menu">
    <article class="<?php echo $options['profile'];?>">
        <span class="opt sortable ">
        <i class="fa-solid fa-user-shield"></i> Cuenta
        </span>
            <a class="<?php echo $options['profile']['option']?>" href="">Ver info</a>
            <a href="">Editar</a>
            <a href="">Avatar</a>
            <a href="">Eliminar cuenta</a>
            <a href="">Cerrar sesión</a>
    </article>
    <article>
        <span class="opt sortable">
            <i class="fa-solid fa-house-circle-check"></i> Publicaciones
        </span>
            <a href="<?php echo constant('URL');?>admin/publications/all">Ver todos</a>
            <a href="<?php echo constant('URL');?>admin/publications/new">Nueva</a>
            <a href="<?php echo constant('URL');?>admin/publications/update">Editar</a>
    </article>

    <article>
        <span class="opt sortable">
            <i class="fa-solid fa-globe"></i> Sitio web
        </span>
            <a href="">Horarios</a>
            <a href="">Contactos</a>
            <a href="">Tema</a>
            <a href="">Listas</a>
    </article>

    <article class="<?php echo $options['settings'];?>"> 
        <span class="opt sortable">
            <i class="fa-solid fa-gear"> </i> Ajustes
        </span>
            <a href="">Horarios</a>
            <a href="">Contactos</a>
            <a href="">Tema</a>
            <a class="<?php echo $lists ?>" href="<?php echo constant('URL')?>admin/settings/lists">Listas</a>
    </article>

    <article class="<?php echo $options['settings'];?>"> 
        <span class="opt sortable"><i class="fa-solid fa-gear"> </i> Empresa</span>
        <a href="<?php echo constant('URL')."admin/company"?>">Informacion</a>
    </article>



</section>