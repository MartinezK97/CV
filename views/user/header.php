<?php 
    $this->css('header');
    $user = $this->getData['user'];
?>

<section id="header">
    <a href="<?php echo constant('URL')?>admin">Administración</a>
    <section class="buttons">
        <!-- Formulario de busqueda -->
        <form action="*" id="searcher">
            <input type="text" name="search" placeholder="Buscar...">
            <button class="submit" type="submit"><i class="fa-solid fa-search"></i></button>
        </form>
        <div class="profile">
            <img src="<?php echo $user['json']['foto']?>" alt="">
            <i class="fa-solid fa-angle-down"></i>
        </div>
    </section>
    
</section>