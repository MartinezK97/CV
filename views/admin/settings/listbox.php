
<article class="content-list" id="">
    <p class="title">Estados</p>
    <div class="data">
        <?php 
            for($i=1;$i<11;$i++){
                $line = "<p>
                <input type='number' value='$i'>
                <input type='text'  value='Estado $i'>
                <i class='fa-solid fa-check'></i>
                </p>";
                echo $line;
            }
        ?>
    </div>
    <button class="mini-list-button"><i class="fa-solid fa-edit"></i> Editar</button>
</article>