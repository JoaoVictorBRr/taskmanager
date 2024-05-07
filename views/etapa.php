<section class="sectionForms">
    <form action="./create/etapa" class="form" method="POST">
        <div class="divEtapaItem">
            <label for="etapa">Etapa</label>
            <input type="text" name="etapa" required>
        </div>

        <div class="btnSubmitForm">
            <button class="submit" type="submit">Criar</button>
        </div>
    </form>

    

    <div class="containerItems">
    <?php foreach($AllEtapas as $etapa):?>
        <div class="items">
            <p><?=$etapa->etapa?></p>
            <button class="buttonExcluir" onclick="excluirEtapa(<?=$etapa->idetapa?>)">Excluir</button>
        </div>
    <?php endforeach; ?>
    </div>

</section>
