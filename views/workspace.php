
<section class="sectionForms">
    <form action="./create/workspace" class="form" method="POST">
        <div class="divNome">
            <label for="nome">Nome</label>
            <input type="text" name="nome">
        </div>
        <div class="divFoto">
            <label for="foto">Foto</label>
            <input type="file" name="foto">
        </div>
        <div class="btnSubmitForm">
            <button class="submit" type="submit">Criar</button>
        </div>
    </form>

    <div class="containerItems">
        <?php foreach($AllWorkspaces as $Workspace):?>
        <div class="items">
            <p><?= $Workspace->nome ?></p>
            <img src="./banco-Imagens/<?= $Workspace->foto ?>.jpeg" alt="imgUser">
            <button onclick="excluirWorkspace(<?= $Workspace->idworkspace ?>)">Excluir</button>
        </div>
        <?php endforeach;?>

    </div>
</section>
    
