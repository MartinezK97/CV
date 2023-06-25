
<?php 
    $user = $this->getData['currentUser'];
    $templates = $this->getData['templates'];
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
    <section class="content-all">
        <?php $this->render('nav')?>
        <section class="content-templates">
            <?php for($i=0;$i<count($templates); $i++):?>
                <a href="<?php echo constant('URL')."templates/preview/".$templates[$i]['id'];?>"  class="box" rel="">
                    <img src="<?php echo constant('URL')."resource/img/templates/".$templates[$i]['image'];?>" alt="">
                </a>
            <?php endfor;?>
        </section>
    </section>
    <?php
        $this->libs(['jquery','axios',]);
        $this->js(['default','config','main', 'menu']);

    ?>
</body>
</html>