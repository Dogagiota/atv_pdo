<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Aluno.php';
require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../models/Emprestimo.php';

class EmprestimoDAO
{
    public function registrarEmprestimo(
        Aluno $aluno,
        Livro $livro
    )
    {
        $conn = Database::getConnection();

        try
        {
            $conn->beginTransaction();

            $sql = "
                INSERT INTO emprestimos
                (
                    livro_id,
                    aluno_id,
                    dataEmprestimo
                )
                VALUES
                (
                    :livro,
                    :aluno,
                    CURDATE()
                )
            ";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(
                ':livro',
                $livro->getId()
            );

            $stmt->bindValue(
                ':aluno',
                $aluno->getId()
            );

            $stmt->execute();

            $update = $conn->prepare(
                "UPDATE livros
                 SET disponivel = 0
                 WHERE id = :id"
            );

            $update->bindValue(
                ':id',
                $livro->getId()
            );

            $update->execute();

            $conn->commit();
        }
        catch(Exception $e)
        {
            $conn->rollBack();

            throw $e;
        }
    }

    public function listarTodos()
    {
        $sql = "
            SELECT
                e.id,
                l.titulo,
                a.nome,
                e.dataEmprestimo,
                e.dataDevolucao
            FROM emprestimos e
            INNER JOIN livros l
                ON l.id = e.livro_id
            INNER JOIN alunos a
                ON a.id = e.aluno_id
        ";

        return Database::getConnection()
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $stmt = Database::getConnection()->prepare(
            "SELECT * FROM emprestimos
             WHERE id = :id"
        );

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrarDevolucao(
        Emprestimo $emprestimo
    )
    {
        $stmt = Database::getConnection()->prepare(
            "UPDATE emprestimos
             SET dataDevolucao = CURDATE()
             WHERE id = :id"
        );

        $stmt->bindValue(
            ':id',
            $emprestimo->getId()
        );

        $stmt->execute();
    }
}