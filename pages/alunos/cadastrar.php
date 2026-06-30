<?php

require_once '../../models/Aluno.php';
require_once '../../dao/AlunoDAO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $aluno = new Aluno();

    $aluno->setNome(
        $_POST['nome']
    );

    $aluno->setEmail(
        $_POST['email']
    );

    $aluno->setMatricula(
        $_POST['matricula']
    );

    $dao = new AlunoDAO();

    $dao->inserir($aluno);

    echo "Aluno cadastrado!";
}
?>

<form method="post">

    <label>Nome</label>

    <br>

    <input type="text" name="nome">

    <br><br>

    <label>Email</label>

    <br>

    <input type="email" name="email">

    <br><br>

    <label>Matrícula</label>

    <br>

    <input type="text"
           name="matricula">

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>