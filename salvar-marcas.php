<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $conn->real_escape_string($_POST['nome_marca']);

        // Pega o primeiro modelo disponível
        $modelo_query = $conn->query("SELECT id_modelo FROM modelo LIMIT 1");
        if ($modelo_query && $modelo_query->num_rows > 0) {
            $modelo_row = $modelo_query->fetch_object();
            $modelo_id = $modelo_row->id_modelo;
        } else {
            print "<script>alert('Erro: Cadastre um modelo primeiro!');</script>";
            print "<script>location.href='?page=cadastrar-modelo';</script>";
        }

        $sql = "INSERT INTO marca (nome_marca, modelo_id_modelo) VALUES ('{$nome}', {$modelo_id})";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        }
        break;
    case 'editar':
        $nome = $conn->real_escape_string($_POST['nome_marca']);

        $id = (int) $_REQUEST['id_marca'];
        $sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca={$id}";
        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        } else {
            print "<script>alert('Não editou');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        }
        break;

    case 'excluir':
        $id = $_REQUEST['id_marca'];
        $sql = "DELETE FROM marca WHERE id_marca={$id}";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
            print "<script>location.href='?page=listar-marcas';</script>";
        }
        break;
}


