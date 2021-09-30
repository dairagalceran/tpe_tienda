{include file="templates/header.tpl" }

<div class="card" style="width: 18rem;">
    {$titulotarea}
    <div class="card-body">
        <h5 class="card-title">{$task->titulo}</h5>
        <p class="card-text">{$task->descripcion}</p>
    </div> 
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Prioridad: {$task->prioridad}/li>
        <li class="list-group-item">Finalizada: {$task->finalizada}</li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
        <a href="home"> Volver</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
