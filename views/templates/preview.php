<?php
    //Data required to run file
    if(!$this->getData['template']){
        echo "views/templates/preview/ → No se ha especificado el id del template";
        exit;
    }
    $template = $this->getData['template'];
    $user = $this->getData['currentUser'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista previa</title>

    <?php
        $this->css(['root','default','fontawesome','header', $template]);
        $this->libs(['fontaewsome']);
        ?>
        <style> :root{--maxSizeBlock: var(--a4w);}</style>
        <?php $this->render('document/setDocumentPropertys', ['vars'=>$user['styles']]); ?>
</head>
<body>
    <?php
        $this->render('dashboard/header');
        $this->render('templates/leftMenu');
        $this->render('templates/rightMenu', ['template'=>$template]);
        $this->render("templates/$template", ['currentUser'=>$user]);
        // $this->render('dashboard/header');
    ?>
</body>
</html>