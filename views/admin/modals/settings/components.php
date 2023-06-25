
<div id="newComponentsModal" class="modal">
    <i class="close fa-solid fa-times"></i>
    <h3>Nuevo componente</h3>
    <form action="<?php echo constant('URL');?>admin/components/new" method="post">
    <article class="celda">
        <span>Nombre del componente</span>
        <input type="text" name="component_name" id="component_name" placeholder="Escribir...">
    </article>
    <button type="submit" class="submit"> <i class="fa-solid fa-check" ></i> Crear componente</button>
</form>


</div>