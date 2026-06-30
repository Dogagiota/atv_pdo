<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../traits/Loggable.php';

class LivroDAO
{
    use Loggable;

    public function inserir(Livro $livro)
    {
        $sql = "
            INSERT INTO livros
            (titulo, autor, anoPublicacao, disponivel)
            VALUES
            (:titulo, :autor, :ano, :disponivel)
        ";

        $conn = Database::getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':titulo', $livro->getTitulo());
        $stmt->bindValue(':autor', $livro->getAutor());
        $stmt->bindValue(':ano', $livro->getAnoPublicacao());
        $stmt->bindValue(':disponivel', 1);

        $stmt->execute();

        $this->log("Livro cadastrado");
    }

    public function listarTodos()
    {
        $conn = Database::getConnection();

        return $conn
            ->query("SELECT * FROM livros")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM livros WHERE id = :id";

        $stmt = Database::getConnection()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}