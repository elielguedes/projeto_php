<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $conn->real_escape_string($_POST['nome_funcionario']);
        $email = $conn->real_escape_string($_POST['email_funcionario']);
        $telefone = $conn->real_escape_string($_POST['telefone_funcionario']);

        $sql = "INSERT INTO funcionario (nome_funcionario, email_funcionario, telefone_funcionario) 
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
        break;
    case 'editar':
        $nome = $conn->real_escape_string($_POST['nome_funcionario']);
        $email = $conn->real_escape_string($_POST['email_funcionario']);
        $telefone = $conn->real_escape_string($_POST['telefone_funcionario']);

        $id = (int) $_REQUEST['id_funcionario'];
        $sql = "UPDATE funcionario SET nome_funcionario='{$nome}', email_funcionario='{$email}', telefone_funcionario='{$telefone}' WHERE id_funcionario={$id}";
        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
        break;

    case 'excluir':
        $id = (int) $_REQUEST['id_funcionario'];
        $sql = "DELETE FROM funcionario WHERE id_funcionario={$id}";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
            print "<script>location.href='?page=listar-funcionario';</script>";
        }
        break;
}
?>