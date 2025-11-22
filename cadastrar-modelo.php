<h1>Cadastrar modelo</h1>
<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Marca
            <select name="marca_id_marca" class="form-control" required>
                <option value="">-= Escolha uma marca =-</option>
                <?php
                $sql = "SELECT * FROM marca ORDER BY nome_marca";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_object()) {
                        print "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
                    }
                } else {
                    print "<option value=''>Não há marcas cadastradas</option>";
                }
                ?>
            </select>
        </label>
    </div>
    <div class="mb-3">
        <label>Nome do Modelo
            <input type="text" name="nome_modelo" class="form-control" required>
        </label>
    </div>
    <div class="mb-3">
        <label>Cor do Modelo
            <input type="text" name="cor_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Ano do Modelo
            <input type="number" name="ano_modelo" class="form-control" min="1900" max="2100">
        </label>
        <div class="mb-3">
            <label>Tipo
                <input type="text" name="tipo_modelo" class="form-control" required>
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form>