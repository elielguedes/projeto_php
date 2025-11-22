<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $id_cliente = $_POST['id_cliente'];
        $id_funcionario = $_POST['id_funcionario'];
        $id_modelo = $_POST['id_modelo'];
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];

        $sql = "INSERT INTO venda (cliente_id_cliente1, funcionario_id_funcionario1, modelo_id_modelo1, data_venda, valor_venda) VALUES ({$id_cliente}, {$id_funcionario}, {$id_modelo}, '{$data}', {$valor})";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-venda';</script>";
        break;

    case 'editar':
        $id_cliente = $_POST['id_cliente'];
        $id_funcionario = $_POST['id_funcionario'];
        $id_modelo = $_POST['id_modelo'];
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];

        $sql = "UPDATE venda SET cliente_id_cliente1={$id_cliente}, funcionario_id_funcionario1={$id_funcionario}, modelo_id_modelo1={$id_modelo}, data_venda='{$data}', valor_venda={$valor} WHERE id_venda=" . $_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-venda';</script>";
        break;

    case 'excluir':
        $sql = "DELETE FROM venda WHERE id_venda=" . $_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
        }
        print "<script>location.href='?page=listar-venda';</script>";
        break;


}


