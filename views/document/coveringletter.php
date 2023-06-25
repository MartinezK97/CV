<?php $this->css(['coveringletter.css']);?>
<section id="content-covering-letter" style="display:none;">
    <section class="top-buttons">
        <h4 class="titleModal">Redacta una carta de presentación</h4>
        <!-- //Buttons -->
        <div class="container-buttons fontFamily">
        <button>Fuente</button>
        <button>    
            <select name="" id="">
                <option selected >Arial</option>
            </select>
        </button>    
        
        </div>
        <div class="container-buttons textStyle">
            <button id="boldButton"><strong>N</strong></button>
            <button id="italicButton"><em>C</em></button>
            <button id="underlineButton"><u>S</u></button>
        </div>
        <div class="container-buttons textSize">
            <button id="increaseFontSizeButton">A+</button>
            <button id="decreaseFontSizeButton">A-</button>
        </div>

        <div class="container-buttons textAlign">
            <button id="textAlign-left"><i class="fa fa-align-left"></i></button>
            <button id="textAlign-left"><i class="fa fa-align-center"></i></button>
            <button id="textAlign-left"><i class="fa fa-align-right"></i></button>
            <button id="textAlign-left"><i class="fa fa-align-justify"></i></button>
        </div>
        <!-- <div class="container-buttons fontColor"> -->
            <input type="color" name="" id="inputFontColor">
        <!-- </div> -->
    </section>
    
    <div id="editor" contenteditable style="height:300px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quam, repudiandae consectetur eveniet aperiam perspiciatis non adipisci id alias tenetur delectus perferendis, dicta, unde doloribus minima repellat autem quos iste! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi iure a quo, consequuntur nostrum adipisci quidem architecto perferendis dignissimos provident aperiam quis vel iusto, vitae cumque magnam tempora dolore! Quos? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus corporis nisi minima, voluptas ea veritatis veniam eveniet consectetur quaerat tenetur reprehenderit repellendus nesciunt architecto? In aliquam quisquam ex nulla voluptatum.</div>
        
    <section class="bottom-buttons">
        <a href="#coveringLetterSave" class="closeModal"> Cancelar</a>
        <a href="#coveringLetterSave" class="saveCoveringLetter"> Guardar</a>
        <a href="#coveringLetterSaveAndAdjunt" class="saveCoveringLetterAndAdjunt"> Guardar y adjuntar</a>
    </section>
</section>