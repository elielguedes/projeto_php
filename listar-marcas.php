<h1>Listar marcas</h1>
<?php
// Consulta básica
$sql = "SELECT * FROM marca ORDER BY nome_marca";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome da Marca</th>";
    print "<th>Ação</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        $id = $row->id_marca;
        $nome = $row->nome_marca;

        print "<tr>";
        print "<td>$id</td>";
        print "<td>$nome</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-marcas&id_marca={$id}';\">Editar</button> ";
        print "<button class='btn btn-danger' onclick=\"if (confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-marcas&acao=excluir&id_marca={$id}';}\">Excluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>