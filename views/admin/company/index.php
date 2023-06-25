<?php $getData = $this->getData;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admninistrador</title>
    <?php $this->css(['admin/default','admin/statistics', 'admin/header', 'admin/menu', 'admin/forms']);?>
</head>
<body>
    <?php
        $this->render('admin/header');
        ?>
            <?php $this->render('admin/menu'); ?>
            <section class="content">
                <h3 class="title">Información de la compañía</h3>
                <form action="<?php echo constant('URL');?>admin/company/update" method="post">
                    <div class="celda">
                        <span>Dirección:</span>
                        <input type="text" name="location">
                    </div>
                    
                    <div class="celda">
                        <span>Direccion email:</span>
                        <input type="email" name="location">
                    </div>
                    <button class="submit"><i class="fa-solid fa-check"></i> Actualizar información</button>
        
                </form>
            </section>
        
        
        <?php $this->libs(['all']); $this->js(['menu']);?>
</body>
</html>