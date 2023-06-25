<?php 
$userStyles = $this->getData['userStyles'];

$this->css('rightMenu');?>
<section id="rightMenu">
    <button class="acc" rel="paper"><i class="far fa-file"></i> Tamaño de papel <i class="fa fa-sort-down contract"></i></button>
    <section class="slid paper">
        <button rel="a4"class="paper selected">A4</button>
        <button rel="letter"class="paper papeA4">Letter</button>
        <button rel="legal" class="paper papeA4">Legal</button>

    </section>
    <!-- Colors -->
    <button class="acc" rel="colors"><i class="fa fa-palette"></i> Colores <i class="fa fa-sort-down contract"></i></button>
    <section class="slid colors ">
        <p><span>Cabecera</span><input type="color" value="<?php echo $userStyles['headerColor']?>" id="headerColor"></p>
        <p><span>Nombre</span><input type="color"  value="<?php echo $userStyles['nameColor']?>" id="nameColor"></p>
        <p><span>Profesion</span><input type="color"  value="<?php echo $userStyles['profColor']?>" id="profColor"></p>
        <p><span>Títulos</span><input type="color"  value="<?php echo $userStyles['titleColor']?>" id="titleColor"></p>
        <p><span>Subtítulos</span><input type="color"  value="<?php echo $userStyles['subtitleColor']?>" id="subtitleColor"></p>
    </section>
    
    <button class="acc img-set" rel="image-setting" ><i class="fas fa-user-circle"></i> Imagen <i class="fa fa-sort-down contract"></i></button>
    <section class="slid image-setting ">
        <ul class="ui-helper-reset">
            <li id="event-start" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-play"></span>&quot;start&quot; invoked <span class="count">0</span>x</li>
            <li id="event-drag" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-arrow-4"></span>&quot;drag&quot; invoked <span class="count">0</span>x</li>
            <li id="event-stop" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-stop"></span>&quot;stop&quot; invoked <span class="count">0</span>x</li>
        </ul>    
    
    
    <p><i class="fa fa-arrows-alt"></i> Zoom</p>
        <p><i class="fa fa-arrows-alt-h"></i> Horizontal</p>
        <p><i class="fa fa-arrows-alt-v"></i>  Vertical</p>
        <p>Voltear verticalmente</p>
        <p>Voltear horizontalmente</p>
    </section>


    <button class="acc"><i class="sombra"></i> Sombras <i class="fa fa-sort-down contract"></i></button>
    <button class="acc"> <i class="fa fa-font"></i> Fuente <i class="fa fa-sort-down contract"></i></button>

    <button class="acc" rel="margins"><i class="fa fa-ruler-combined"></i> Márgenes <i class="fa fa-sort-down contract"></i></button>
    <section class="slid margins">
            <p>superior 
                <input rel="top"  id="document_margin_top" type="number" value="0">
                <select id="document_margin_top_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>inferior 
                <input rel="bottom" id="document_margin_bottom" type="number" value="0">
                <select  id="document_margin_bottom_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>derecho 
                <input rel="right" id="document_margin_right" type="number" value="0">
                <select id="document_margin_right_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>izquierdo 
                <input rel="left" id="document_margin_left" type="number" value="0">
                <select id="document_margin_left_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
    </section>
    <button rel="header" class="acc"><i class="cabezera"></i> Cabecera <i class="fa fa-sort-down contract"></i></button>
    <section class="slid header">
        <p>
            <span>Color de fondo</span>
            <input type="color" name="" id="" value="#eee">
            <input type="checkbox" name="" id="">
        </p>
        <p>Color titulo</p>
        <p>Color subtitulo</p>

    </section>
</section>

