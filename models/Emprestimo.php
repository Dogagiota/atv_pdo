<?php

class Emprestimo
{
    private $id;
    private $livro;
    private $aluno;
    private $dataEmprestimo;
    private $dataDevolucao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLivro()
    {
        return $this->livro;
    }

    public function setLivro($livro)
    {
        $this->livro = $livro;
    }

    public function getAluno()
    {
        return $this->aluno;
    }

    public function setAluno($aluno)
    {
        $this->aluno = $aluno;
    }

    public function getDataEmprestimo()
    {
        return $this->dataEmprestimo;
    }

    public function setDataEmprestimo($data)
    {
        $this->dataEmprestimo = $data;
    }

    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }

    public function setDataDevolucao($data)
    {
        $this->dataDevolucao = $data;
    }
}