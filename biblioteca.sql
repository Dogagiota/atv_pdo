CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    anoPublicacao INT NOT NULL,
    disponivel BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    matricula VARCHAR(50) NOT NULL
);

CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT NOT NULL,
    aluno_id INT NOT NULL,
    dataEmprestimo DATE NOT NULL,
    dataDevolucao DATE DEFAULT NULL,

    CONSTRAINT fk_livro
        FOREIGN KEY (livro_id)
        REFERENCES livros(id),

    CONSTRAINT fk_aluno
        FOREIGN KEY (aluno_id)
        REFERENCES alunos(id)
);