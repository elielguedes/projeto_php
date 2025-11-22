<h1>listar cliente</h1>
<?php
// Consulta básica (assume $conn está definido em outro include)
$sql = "SELECT * FROM cliente";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>E-mail</th>";
    print "<th>Telefone</th>";
    print "<th>cpf</th>";
    print "<th>Ação</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        $id = $row->id_cliente;
        $nome = $row->nome_cliente;
        $email = $row->email_cliente;
        $telefone = $row->telefone_cliente;

        print "<tr>";
        print "<td>$id</td>";
        print "<td>$nome</td>";
        print "<td>$email</td>";
        print "<td>$telefone</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-cliente&id_cliente={$id}';\">Editar</button> ";
        print "<button class='btn btn-danger' onclick=\"if (confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-cliente&acao=excluir&id_cliente={$id}';}\">Excluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>