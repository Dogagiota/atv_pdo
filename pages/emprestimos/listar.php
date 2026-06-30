<?php

require_once '../../dao/EmprestimoDAO.php';

$dao = new EmprestimoDAO();

$emprestimos = $dao->listarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Empréstimos</title>
</head>
<body>

<h1>Lista de Empréstimos</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Livro</th>
    <th>Aluno</th>
    <th>Data Empréstimo</th>
    <th>Data Devolução</th>
</tr>

<?php foreach($emprestimos as $emprestimo): ?>

<tr>

<td><?= $emprestimo['id'] ?></td>

<td><?= $emprestimo['titulo'] ?></td>

<td><?= $emprestimo['nome'] ?></td>

<td><?= $emprestimo['dataEmprestimo'] ?></td>

<td>
<?= $emprestimo['dataDevolucao'] ?? 'Não devolvido' ?>
</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>+