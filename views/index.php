<div>
    <i class="bi bi-plus-circle-fill btn-add-taks" onclick="openTaskCreate()"></i>
</div> 

<form action="./create/task" class="createTaskContainer" style="display: none;" method="POST">

    <div class="divZero" >
        <div class="divUm">
            <span onclick="closeTaskCreate()" class="ButtonClose">X</span>
        </div>
      
        <div class="divDois">
            <div class="item1 divGroupItens">
                <label for="labelWorkspace">Workspace:</label>
                <select name="selectWorkspace" name="selectWorkspace" id="selectWorkspace">
                    <?php foreach(($contentWorkSpace->findAllWorkspaces()) as $workSpace): ?>
                        <option value="<?=$workSpace->nome?>"><?=$workSpace->nome?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="item3 divGroupItens">
                <label class="labelDataInicio">Data de inicio:</label>
                <input type="date" class="inputDataInicio" id="inputDataInicio" name="inputDataInicio">
            </div>

            <div class="item4 divGroupItens">
                <label class="labelTempofinalizacao">Data de Finalização:</label>
                <input type="date" class="inputTempofinalizacao" id="inputTempofinalizacao" name="inputTempofinalizacao">
            </div>

            <div class="item2 divGroupItens">
                <label class="labelTempo">Data de inicio:</label>
                <input class="inputTempo" type="time" id="inputTempo" name="inputTempo">
            </div>
        </div>
       
        <div class="divTres">
            <label id="labelDescricao" class="labelTitulo">Titulo</label>
            <input class="inputTitulo" id="inputTitulo" type="text" name="inputTitulo">
            <label id="labelDescricao" class="labelDescricao">Descriçao</label>
            <textarea class="inputDescricao" rows="4" cols="50" name="inputDescricao" id="inputDescricao"></textarea>
        </div>

        <div class="divQuatro">
            <span onclick="nextTaskCreate()" class="ButtonNext">Proximo</span>
        </div>
    </div>

    <div class="ContainerFluxo" style="display: none;">

        <span onclick="closeTaskCreate()" class="ButtonClose">X</span>
        <p class="tituloFluxo">Fluxo de trabalho</p>

        <div class="containerEtapaExecutor">
         <?php foreach($contentEtapa as $etapa): ?>
            <div class="divEtapaExecutor">  

                <div class="divEtapa">
                    <p class="Etapa">Etapa: <?=$etapa->etapa?></p>
                </div>
       
                <div class="divExecutor">
                    <label class="Executor">Executor</label>
                    <select class="Executor" name="selectExecutor">
                        <?php foreach($contentUser as $user): ?>
                                <option value="<?=$user->nome?>"><?=$user->nome?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 

                <div class="divAdicionar">
                    <label class="AdicionarEtapa">Adicionar Etapa</label>
                    <select class="AdicionarEtapa" name="AdicionarEtapa">
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                    </select>
                </div> 

                <div class="divOrdem">
                    <label class="AdicionarEtapa">Ordem Etapa</label>
                    <select class="AdicionarEtapa" name="AdicionarEtapa">
                                <option value="1">1</option>
                                <option value="2">2</option>
                    </select>
                </div> 

            </div>
        <?php endforeach; ?>

        </div>


        <div class="divBtnBackCreate">
            <span onclick="backTaskCreate()" class="btnVoltar">Voltar</span>
            <button class="btnSubmit" type="submit">Criar</button>
        </div>

    </div>

</form>

<section class="filtro">
    <div>
        <p>Responsavel</p>
        <select class="filter-item" name="responsible" id="responsible">
            <option value="João">João</option>
        </select>
    </div>

    <div>
        <p>Workspace</p>
        <select class="filter-item" name="responsible" id="responsible">
            <option value="João">Cartepilar</option>
        </select>
    </div>

    <div>
        <p>Etapa</p>
        <select class="filter-item" name="responsible" id="responsible">
            <option value="João">Front end</option>
        </select>
    </div>

    <div>
        <p>Data de inicio</p>
        <input type="date">
    </div>

    <button class="btn-filter">Filtrar</button>
    

</section>


<?php  foreach($contentTask as $task):  ?>


<section>

    <div onclick="openTask(<?=$task->idtarefa?>)" class="task-container">

        <div>
            <p class="task-title"><?= $task->titulo?></p>

            <div class="task-main-content">


                <div class="task-workspace">
                    <p class="task-title-itens">Workspace</p>
                    <img class="taks-img-itens" src="./banco-Imagens/<?= $contentWorkSpace->findWorkSpaceById($task->idworkspace)->foto;?>.jpeg" alt="PhotoWorkspace">
                    <p class="task-type-itens"> <?= $contentWorkSpace->findWorkSpaceById($task->idworkspace)->nome;  ?> </p>
                </div>

                <div class="task-responsible">
                    <p class="task-title-itens">Responsavel</p>
                    <img class="taks-img-itens" src="./banco-Imagens/download.jpeg" alt="PhotoResponsible">
                    <p class="task-type-itens"><?= $contentEtapaTarefa->findEtapaById($task->idetapatarefa)->executor;?></p>
                </div>

                <div class="task-stage">
                    <p class="task-title-itens">Etapa</p>
                    <p class="task-type-itens"><?=$contentEtapaTarefa->findEtapaById($task->idetapatarefa)->etapa;?></p>
                </div>

                <div class="task-time-start">
                    <p>Data de inicio</p>
                    <p><?=$task->inicio?></p>
                </div>

                <div class="task-time-end">
                    <p>Data de entrega</p>
                    <p><?=$task->fim?></p>
                </div>

                <div class="task-time-foreseen">
                    <p class="task-progress-time"><?=$task->tempo?> previsto</p>
                    
                    <div>
                        <input class="task-progress-bar" type="text" disabled>
                        <input class="task-progress-bar-static" type="text" disabled>
                    </div>
                </div>
            

            </div>

        </div>

    </div>

    <div class="task-container-open-<?=$task->idtarefa?>" style="display: none">

        <div class="task-details">
            <i onclick="closeTask(<?=$task->idtarefa?>)" class="bi bi-arrow-left task-arrow-back"></i>

            <div>
                <p class="task-title"><?=$task->titulo?></p>

                <div class="task-main-content">


                    <div class="task-workspace">
                        <p class="task-title-itens">Workspace</p>
                        <img class="taks-img-itens" src="./banco-Imagens/<?= $contentWorkSpace->findWorkSpaceById($task->idworkspace)->foto;?>.jpeg" alt="PhotoWorkspace">
                        <p class="task-type-itens"><?= $contentWorkSpace->findWorkSpaceById($task->idworkspace)->nome;  ?></p>
                    </div>

                    <div class="task-responsible">
                        <p class="task-title-itens">Responsavel</p>
                        <img class="taks-img-itens" src="./banco-Imagens/download.jpeg" alt="PhotoResponsible">
                        <p class="task-type-itens"><?= $contentEtapaTarefa->findEtapaById($task->idworkspace)->executor;  ?></p>
                    </div>

                    <div class="task-stage">
                        <p class="task-title-itens">Etapa</p>
                        <p class="task-type-itens"><?=$contentEtapaTarefa->findEtapaById($task->idetapatarefa)->etapa;?></p>
                    </div>

                    <div class="task-time-start">
                        <p>Data de inico</p>
                        <p><?=$task->inicio?></p>
                    </div>

                    <div class="task-time-end">
                        <p>Data de entrega</p>
                        <p><?=$task->fim?></p>
                    </div>

                    <div class="task-time-foreseen">
                        <p class="task-progress-time"><?=$task->tempo?> previstas</p>
                        
                        <div>
                            <input class="task-progress-bar" type="text" disabled>
                            <input class="task-progress-bar-static" type="text" disabled>
                        </div>
                    </div>
                

                </div>

            </div>

        </div>

        <div class="task-description">
            <p>Descrição</p>
            <p><?= $task->descricao ?></p>
        </div>

        <div class="task-flow">
            <div>
                <div class="task-flow-stage">
                    <p><i class="bi bi-caret-left-fill task-flow-arrows"></i></p>
                    <img class="taks-img-flow" src="./banco-Imagens/download.jpeg" alt="PhotoFlow">
                    <p><i class="bi bi-caret-right-fill task-flow-arrows"></i></p>
                </div>
                <p><?=$contentEtapaTarefa->findEtapaById($task->idetapatarefa)->etapa;?></p>
            </div>

            <div class="task-flow-description">
                <div>
                    <label for="comment">Adicionar comentario</label>
                    <input name="comment" id="comment" type="text">
                </div>
                <button type="submit">Enviar</button>
            </div>
        </div>
    
    </div>


</section>

<?php endforeach;  ?>


<div id="overlay" class="overlay" style="display: none"></div>


