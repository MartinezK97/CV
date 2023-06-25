<?php 
    $this->css('header');
?>
<section id="header">
    <a href="<?php echo constant('URL');?>" class="home_link">
        <img src="<?php echo constant('CompanyIcon');?>">
    </a>
    <section class="buttons">
        <form action="<?php echo constant('URL')?>search/" method="post" id="searcher">
            <input type="text" name="search" placeholder="Buscar...">
            <button type="submit" class="submit"><i class="fa fa-search"></i></button>
        </form>
        <a href="<?php echo constant('URL');?>acceder" class="acceder">Acceder</a>
        <a href="<?php echo constant('URL');?>acceder" class="">Registrarme</a>
        <a href="<?php echo constant('URL');?>acceder" class="">Menu</a>
    </section>
</section>