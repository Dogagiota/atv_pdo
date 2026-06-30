<?php

require_once '../../config/Database.php';
require_once '../../dao/EmprestimoDAO.php';
require_once '../../models/Aluno.php';
require_once '../../models/Livro.php';

$conn = Database::getConnection();

$livros = $conn->query(
    "SELECT * FROM livros
     WHERE disponivel = 1"
)->fetchAll(PDO::FETCH_ASSOC);

$alunos = $conn->query(
    "SELECT * FROM alunos"
)->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['livro']) && isset($_POST['aluno']))
{
    $livro = new Livro();
    $livro->setId($_POST['livro']);

    $aluno = new Aluno();
    $aluno->setId($_POST['aluno']);

    $dao = new EmprestimoDAO();

    $dao->registrarEmprestimo(
        $aluno,
        $livro
    );

    echo "Empréstimo registrado!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Novo Empréstimo</title>
</head>
<body>

<h1>Novo Empréstimo</h1>

<form method="post">

    <label>Aluno</label>

    <select name="aluno">

        <?php foreach($alunos as $aluno): ?>

        <option value="<?= $aluno['id'] ?>">
            <?= $aluno['nome'] ?>
        </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Livro</label>

    <select name="livro">

        <?php foreach($livros as $livro): ?>

        <option value="<?= $livro['id'] ?>">
            <?= $livro['titulo'] ?>
        </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
        Registrar Empréstimo
    </button>

</form>

</body>
</html>