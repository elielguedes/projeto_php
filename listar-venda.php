<h1>Listar Vendas</h1>
<?php
$sql = "SELECT v.*, c.nome_cliente, f.nome_funcionario, mo.nome_modelo, ma.nome_marca 
        FROM venda AS v 
        LEFT JOIN cliente AS c ON c.id_cliente = v.cliente_id_cliente1 
        LEFT JOIN funcionario AS f ON f.id_funcionario = v.funcionario_id_funcionario1 
        LEFT JOIN modelo AS mo ON mo.id_modelo = v.modelo_id_modelo1 
        LEFT JOIN marca AS ma ON ma.id_marca = mo.marca_id_marca 
        ORDER BY v.data_venda DESC";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Data</th>";
    print "<th>Cliente</th>";
    print "<th>Funcionário</th>";
    print "<th>Modelo</th>";
    print "<th>Valor</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_venda}</td>";
        $data = date('d/m/Y', strtotime($row->data_venda));
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_funcionario}</td>";
        print "<td>{$row->nome_modelo}</td>";
        $valor = number_format($row->valor_venda, 2, ',', '.');
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-venda&id_venda={$row->id_venda}';\">Editar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}\">Excluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhuma venda encontrada.</p>";
}
?>