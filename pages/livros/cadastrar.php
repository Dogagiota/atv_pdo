<?php

require_once '../../models/Livro.php';
require_once '../../dao/LivroDAO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $livro = new Livro();

    $livro->setTitulo($_POST['titulo']);
    $livro->setAutor($_POST['autor']);
    $livro->setAnoPublicacao(
        $_POST['anoPublicacao']
    );

    $dao = new LivroDAO();

    $dao->inserir($livro);

    echo "Livro cadastrado!";
}
?>

<form method="post">

    <label>Título</label>
    <br>

    <input type="text" name="titulo">

    <br><br>

    <label>Autor</label>
    <br>

    <input type="text" name="autor">

    <br><br>

    <label>Ano</label>
    <br>

    <input type="number"
           name="anoPublicacao">

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>