<h1>Cadastrar marca</h1>
<form action="?page=salvar-marcas" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>nome
            <input type="text" name="nome_marca" class="form-control" required>
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>  
    </div>
</form>