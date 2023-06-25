<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admninistrador</title>
    <?php $this->css(['admin/default','admin/statistics', 'admin/header', 'admin/menu']); $this->libs(['all']);?>
    
</head>
<body>
    <?php
        $this->render('admin/header');
        ?>
            <?php $this->render('admin/menu', ['select'=>'settings','option'=>'lists']); ?>
            <section class="content">
                <section id="statistics">
                    <?php
                        for($i=0;$i<10;$i++):
                            createBox("Title", $i, "Description");
                        endfor;

                    ?>

                    <?php function createBox($tit, $val, $des = ""){
                        echo "<article class='collapsed'>
                            <p class='title'>$tit</p>
                            <div>$val</div>
                            <p class='descript'>$des</p>
                        </article>";
                    }?>
                    
                </section>
            </section>
        
        
        <?php $this->libs(['all']); $this->js(['menu']);?>
</body>
</html>