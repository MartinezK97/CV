
<?php 
    $this->css('leftMenu');
    $lang = $this->getData['lang'];
?>
<section id="leftMenu">
    <button class="acc" rel="document-options"><i class="fa fa-file-alt"></i> Documento <i class="fa fa-sort-down contract"></i></button>
    <section class="slid document-options">
        <a href="#print"><i class="fa fa-print"></i>Imprimir</a>
        <a href="#export" id="exportPDF"><i class="fa fa-file-pdf"></i>Exportar a PDF</a>
        <a href="#export"><i class="fa fa-file-download"></i> Descargar</a>
    </section>
    <button class="acc" rel="external-files"><i class="fa fa-link"></i> Archivos externos <i class="fa fa-sort-down contract"></i></button>
    <section class="slid external-files">
        <a  href="#coveringletter" id="openCoveringLetter"><i class="fa fa-file-upload"></i>Carta de presentación</a>
        <input type="file" accept="application/pdf"  id="presentacion"  style="display:none">
        
        <a  href="#" class="addCertificated"><i class="fa fa-file-upload"></i> Adjuntar escolaridad 
            <label class="switch">
                <input type="checkbox">
                <div class="slider"></div>
                <div class="slider-card">
                    <div class="slider-card-face slider-card-front"></div>
                    <div class="slider-card-face slider-card-back"></div>
                </div>
            </label>
        </a>
        <input type="file" accept="image/*, application/pdf"  id="escolaridad" style="display:none">
        
        <a href="#diploma" id="addDiploma"><i class="fa fa-file-alt"></i>Adjuntar diplomas</a>
        <input type="file" accept="image/*, application/pdf"  id="inputFileDiplomas" name="diplomas[]"  style="display:none">
    </section> 
    <button class="acc" rel="lang"><i class="fa fa-language"></i> Lenguaje <i class="fa fa-sort-down contract"></i></button>
    <section class="slid lang">    
        <?php 
            $json = json_decode(file_get_contents('config/json/titlesLang.json'),true);
           foreach($json['lang'] as $key=>$val){
            if($key == $lang){?>
                <a href="#" rel="<?php echo $key?>" > <?php echo $val?> <input type="checkbox" checked ></a>
            <?php }else{?>
                <a href="#" rel="<?php echo $key?>"> <?php echo $val?> <input type="checkbox"  ></a>
            <?php }
            } ?>
        <!-- <a href="#spanish" > Español <input type="checkbox"  ></a> -->
        <!-- <a href="#inglish"> Ingles <input type="checkbox"></a> -->
    </section>
    <button class="acc"><i class="fa fa-copy"></i> Páginas <i class="fa fa-sort-down contract"></i></button>

</section>