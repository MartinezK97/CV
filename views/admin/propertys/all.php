<?php $getData = $this->getData;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admninistrador</title>
    <?php $this->css(['admin/default','admin/statistics', 'admin/header', 'admin/menu']);?>
</head>
<body>
    <?php
        $this->render('admin/header');
        ?>
            <?php $this->render('admin/menu'); ?>
            <section class="content">
                All publications
            </section>
        
        
        <?php $this->libs(['all']); $this->js(['menu']);?>
</body>
</html>