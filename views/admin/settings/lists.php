<?php 
    $lists = $this->getData['components'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admninistrador</title>
    <?php $this->css(['admin/default','admin/statistics', 'admin/header', 'admin/menu', 'admin/lists','admin/forms', 'modals']);?>
</head>
<body>
    <?php $this->render('admin/header');?>
            <?php $this->render('admin/menu', ['select'=>'settings','option'=>'lists']); ?>
            <section class="content">
                <h3>Todos los componentes  <button id="newComponent"><i class="fa-solid fa-plus"></i> Agregar componente</button></h3>
               
                <section class="content-all-lists">
                    <!--List -->
                    
                    
                </section>
                <?php $this->render('admin/modals/settings/components');?>
            </section>
        



        
        <?php 
            $this->libs(['all']); $this->js(['menu']);
            $this->js(['modals']);
        ?>
        

</body>
</html>