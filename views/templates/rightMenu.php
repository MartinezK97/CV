<?php 
    $this->css('rightMenu');
    $template = "";
    if(isset($this->getData['template'])):
        $template = $this->getData['template'];
    endif;
    ?>
<section id="rightMenu">
    <a class="submit-button" href="<?php echo constant('URL');?>document/edit/<?php echo $template; ?>"><i class="fa fa-check"></i> Usar template</a>
</section>