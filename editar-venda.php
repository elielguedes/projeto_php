<h1>editar venda</h1>
<h1>Cadastrar venda</h1>
<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Cliente
            <select name="id_cliente" class="form-control" required>
                <option value="">-= Escolha o Cliente -=</option>
                <?php
                $sql_cliente = "SELECT * FROM cliente";
                $res_cliente = $conn->query($sql_cliente);
                if ($res_cliente && $res_cliente->num_rows > 0) {
                    while ($row_cliente = $res_cliente->fetch_object()) {
                        print "<option value='{$row_cliente->id_cliente}'>{$row_cliente->nome_cliente}</option>";
                    }
                } else {
                    print "<option value=''>Não há clientes cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Funcionário
            <select name="id_funcionario" class="form-control" required>
                <option value="">-= Escolha o Funcionário -=</option>
                <?php
                $sql_func = "SELECT * FROM funcionario";
                $res_func = $conn->query($sql_func);
                if ($res_func && $res_func->num_rows > 0) {
                    while ($row_func = $res_func->fetch_object()) {
                        print "<option value='{$row_func->id_funcionario}'>{$row_func->nome_funcionario}</option>";
                    }
                } else {
                    print "<option value=''>Não há funcionários cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Modelo
            <select name="id_modelo" class="form-control" required>
                <option value="">-= Escolha o Modelo -=</option>
                <?php
                $sql_modelo = "SELECT mo.*, ma.nome_marca FROM modelo AS mo LEFT JOIN marca AS ma ON ma.id_marca = mo.marca_id_marca";
                $res_modelo = $conn->query($sql_modelo);
                if ($res_modelo && $res_modelo->num_rows > 0) {
                    while ($row_modelo = $res_modelo->fetch_object()) {
                        $marca = $row_modelo->nome_marca ? $row_modelo->nome_marca : 'Sem marca';
                        print "<option value='{$row_modelo->id_modelo}'>{$row_modelo->nome_modelo} ({$marca})</option>";
                    }
                } else {
                    print "<option value=''>Não há modelos cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Data da Venda
            <input type="date" name="data_venda" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Valor da Venda
            <input type="number" name="valor_venda" class="form-control" step="0.01" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>