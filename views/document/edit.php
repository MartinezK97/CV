<?php 

$user = $this->getData['currentUser'];
$template = $this->getData['template'];
$lang = $user->getData()['lang'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar template</title>
    <?php $this->libs([ 'colorpicker', 'jsPDF','fontawesome']);?>
    <?php $this->css(['root','default', 'header', $template,'modals', 'edit', 'coveringletter']);
    $this->render('document/setDocumentPropertys', ['vars'=>$user->getData()['styles']]);
    $this->js(['autosave/all'], ['type'=>'module']);
    // require "views/document/phptocss.php"?>
   <style>:root{--maxSizeBlock :var(--a4w);}</style>
</head>
<body>
    <?php 
        $this->render('dashboard/header');
        // $templateHTML = file_get_contents("views/templates/$template.php");
        ?>
        <div id="content-all">
            <?php
                $titles = json_decode(file_get_contents('config/json/titlesLang.json'),true);
                $this->render("templates/$template", ['currentUser'=>$user->getData()]);
                $this->render('document/leftMenu', ['lang'=>$lang]);
                $this->render('document/rightMenu', ['userStyles'=>$user->getData()['styles']]);
                $this->render('document/coveringletter');
            ?>
        </div>
    <?php
        
        $this->modals(['newExperience','newCourse','newEducation','loading']);
        $this->libs(['print','jquery', 'axios']);
        $this->js(['config', 'printAreaJQuery','modals','menu']);
        
        
    ?>
<!-- <script src="<?php echo constant('URL');?>resource/js/autosave.js" type="module"></script> -->
</body>
</html>