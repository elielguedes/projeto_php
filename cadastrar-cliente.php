<h1>Cadastrar cliente</h1>
<form action="?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>cliente
            <input type="text" name="nome_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>E-mail
            <input type="email" name="email_cliente" class="form-control">
        </label>
    </div>
    <div claass="mb-3">
        <label>Telefone
            <input type="text" name="telefone_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Cpf
            <input type="text" name="cpf_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>enderco_cliente</label>
        <input type="text" name="endereco_cliente" class="form-control">
    </div>
    <div>
        <button type="submit" class="bnt bnt-primary">Enviar</button>
    </div>
</form>