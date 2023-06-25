<?php $getData = $this->getData;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admninistrador</title>
    <?php $this->css(['admin/default', 'admin/header', 'admin/menu', 'admin/forms']);?>
</head>
<body>
    <?php
        $this->render('admin/header');
        ?>
            <?php $this->render('admin/menu'); ?>
            <section class="content">
                <h3 class="title">Crear nueva publicación</h3>
                <form id="newpublication" action="<?php echo constant('URL');?>admin/propertys/new/save" method="post" enctype="multipart/form-data">
                    <section class="content-left">
                        <article class="celda">
                            <span>Titulo</span>
                            <input type="text" name="projectname" id="">
                        </article>
                        <article class="celda">
                            <span>Tipo de propiedad</span>
                            <select name="" id="">
                                <option value="1" selected disabled></option>
                                <option value="1" >Apartamento</option>
                                <option value="1" >Casa</option>
                                <option value="1" >Terreno</option>
                            </select>
                        </article>
                        <article class="celda">
                            <span>Titulo</span>
                            <input type="text" name="" id="">
                        </article>
                    </section>
                    <section class="content-right">
                        <input type="file" name="" id="">
                    </section>
                    <section class="buttons">
                        <button class="submit"><i class="fa-solid fa-check"></i> Publicar</button>
                    </section>
                </form>
            </section>
        
        
        <?php $this->libs(['all']); $this->js(['menu']);?>
</body>
</html>