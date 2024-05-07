
<section class="sectionForms">
    <form onsubmit="return validacaoFormularioUser()" class="form" method="POST">
        <div class="divEmail">
            <label for="email">E-mail</label>
            <input id="email" type="e-mail" name="email" required>
        </div>
        <div class="divNome">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" required>
        </div>
        <div class="divSenha">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha" required>
        </div>
        <div class="divTipoDeConta">
            <label for="tipoDeConta">Tipo de conta</label>
            <select name="tipoDeConta">
                <option value="Adiminstrador">Adiminstrador</option>
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <p class="mensagemFormUser"></p>
        <div class="btnSubmitForm">
            <button class="submit" type="submit">Criar</button>
        </div>
    </form>



    <div class="containerItems">

    <?php  foreach($allUsers as $user): ?>

        <div class="items">

            <p><?=$user->nome?></p>
            <img src="./banco-Imagens/<?=$user->foto?>.jpeg" alt="imgUser">
            <p><?=$user->tipoconta?></p>

            <button class="buttonExcluir" onclick="excluirUsuario(<?=$user->idusuario?>)">Excluir</button>
            
        </div>

    <?php endforeach;?>
    </div>
</section>
