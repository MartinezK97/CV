<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo constant('CompanyName');?></title>
    <?php $this->css(['default', 'home', 'parallax']);?>
    <?php $this->libs(['all']);?>
</head>
<body>
    <!-- Header -->
    <?php $this->render('header');?>
    <div class="content-all">
    <section id="banner">Esto es el banner </section>
    <section class="full b01"></section>
    <section class="full b02"></section>
    <section class="full b03"></section>
    </div>
    <?php 
        $this->libs(['jquery']);
    $this->js(['jquery', 'main']);?>

</body>
</html>