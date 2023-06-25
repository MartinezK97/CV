
<?php 
    $user = $this->getData['currentUser'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a OnlineCV!</title>
    <?php 
        $this->css(['root', 'default','dashboard', 'fontawesome']);
        $this->js(['main', 'menu']);
        $this->libs(['fontawesome']);
    ?>
    <style>
        :root{
            --maxSizeBlock:800px;
        }
    </style>
</head>
<body>
    <?php $this->render('dashboard/header',['user'=>$user]);?>
    <?php $this->render('dashboard/leftMenu');?>
    <?php $this->render('dashboard/rightMenu');?>
    <section class="content-all">
        
        
    

    <?php $this->render('nav')?>
        
    </section>
    <?php
        $this->libs(['jquery','axios',]);
        $this->js(['default','config','main', 'menu']);

    ?>
</body>
</html>