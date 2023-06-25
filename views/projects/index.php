<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos mis proyectos</title>
    <?php
        $this->css(['root','default','header','dashboard','fontawesome']);
    ?>
</head>
<body>
    <?php 
        $this->render('dashboard/header');
        $this->render('dashboard/leftMenu');
        $this->render('dashboard/rightMenu');
    ?>

    <?php
        $this->js(['jquery','main', ]);
    ?>
</body>
</html>