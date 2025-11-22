<h1>Listar modelos</h1>
<?php
$sql = "SELECT mo.*, ma.nome_marca
        FROM modelo AS mo
        LEFT JOIN marca AS ma ON ma.id_marca = mo.marca_id_marca  
        ORDER BY mo.nome_modelo";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Marca</th>";
    print "<th>Nome do Modelo</th>";
    print "<th>Cor</th>";
    print "<th>Ano</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_modelo}</td>";
        print "<td>{$row->nome_marca}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>{$row->cor_modelo}</td>";
        print "<td>{$row->ano_modelo}</td>";
        print "<td>{$row->tipo_modelo}</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-modelo&id_modelo={$row->id_modelo}';\">Еditar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-modelo&acao=excluir&id_modelo={$row->id_modelo}';}\">Еxcluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>