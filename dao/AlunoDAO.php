<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Aluno.php';

class AlunoDAO
{
    public function inserir(Aluno $aluno)
    {
        $sql = "
            INSERT INTO alunos
            (nome, email, matricula)
            VALUES
            (:nome, :email, :matricula)
        ";

        $stmt = Database::getConnection()->prepare($sql);

        $stmt->bindValue(':nome', $aluno->getNome());
        $stmt->bindValue(':email', $aluno->getEmail());
        $stmt->bindValue(':matricula', $aluno->getMatricula());

        $stmt->execute();
    }

    public function listarTodos()
    {
        return Database::getConnection()
            ->query("SELECT * FROM alunos")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $stmt = Database::getConnection()->prepare(
            "SELECT * FROM alunos WHERE id = :id"
        );

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}