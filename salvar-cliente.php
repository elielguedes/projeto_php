<?php
// Salvar/editar/excluir cliente
// Observação: assume que $conn (mysqli) já está disponível via include (ex.: config.php)
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $conn->real_escape_string($_POST['nome_cliente']);
        $email = $conn->real_escape_string($_POST['email_cliente']);
        $telefone = $conn->real_escape_string($_POST['telefone_cliente']);

        $sql = "INSERT INTO cliente (nome_cliente, email_cliente, telefone_cliente) 
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }
        break;
    case 'editar':
        $nome = $conn->real_escape_string($_POST['nome_cliente']);
        $email = $conn->real_escape_string($_POST['email_cliente']);
        $telefone = $conn->real_escape_string($_POST['telefone_cliente']);

        $id = (int) $_REQUEST['id_cliente'];
        $sql = "UPDATE cliente SET nome_cliente='{$nome}', email_cliente='{$email}', telefone_cliente='{$telefone}' WHERE id_cliente={$id}";
        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }
        break;

    case 'excluir':
        $id = (int) $_REQUEST['id_cliente'];
        $sql = "DELETE FROM cliente WHERE id_cliente={$id}";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }
        break;
}
?>