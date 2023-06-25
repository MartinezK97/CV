<?php $this->css(['test']); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Mi Currículum</title>
  <style>

    :root{
      --bodyC:#eee;
      --primaryColor:#ff5500;
    }
    body {
      background:var(--bodyC);
    }

    .header{
      position:relative;
      border:solid 1px;
      width:100%;
    }

    .header img{
      position:absolute;
      top:0;
      left:0;
      right:0;
      width:100%;
      
    }

    rect.headerColor{
      fill:var(--primaryColor);
    }
    
  </style>
</head>
<body>
    <div class="header">
     <?php 
      print_r($this->getData['test']);
    ?>

    </div>
</body>
</html>