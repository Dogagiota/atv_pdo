<?php

require_once '../../dao/LivroDAO.php';

$dao = new LivroDAO();

$livros = $dao->listarTodos();
?>

<h1>Livros</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Ano</th>
    <th>Disponível</th>
</tr>

<?php foreach($livros as $livro): ?>

<tr>

<td><?= $livro['id'] ?></td>

<td><?= $livro['titulo'] ?></td>

<td><?= $livro['autor'] ?></td>

<td><?= $livro['anoPublicacao'] ?></td>

<td>
<?= $livro['disponivel']
    ? 'Sim'
    : 'Não'
?>
</td>

</tr>

<?php endforeach; ?>

</table>