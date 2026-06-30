<?php

require_once '../../dao/AlunoDAO.php';

$dao = new AlunoDAO();

$alunos = $dao->listarTodos();
?>

<h1>Alunos</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Matrícula</th>
</tr>

<?php foreach($alunos as $aluno): ?>

<tr>

<td><?= $aluno['id'] ?></td>

<td><?= $aluno['nome'] ?></td>

<td><?= $aluno['email'] ?></td>

<td><?= $aluno['matricula'] ?></td>

</tr>

<?php endforeach; ?>

</table>