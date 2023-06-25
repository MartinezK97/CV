<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo constant('CompanyName');?></title>
    <?php $this->css(['default', 'home','login']);?>
    <?php $this->libs(['jquery','axios','all']);?>
    <?php $this->js(['config','login']);?>
</head>
<body>
    <?php $this->render('header');?>
    <section class="content-all">
        <section>
            <a href="#"> Registrarme</a>            
        </section>
        <section id="box">
            <h3>Login</h3>
            <form action="<?php echo constant('URL');?>login/authenticate" method='post'>
                <p class="username line">
                    <input type="text" name="username" id="username" autocomplete="off">
                    <span class="placeholder">Usuario:</span>
                </p>
                <p class="line">
                    <input type="password" name="password" id="password" >
                    <span class="placeholder">Contraseña:</span>
                    <span class="view"><i class="fa fa-eye"></i></span>
                </p>
                <button id="authenticate" type="submit">Acceder</button>
            </form>
        </section>
    </section>
    
</body>
</html>