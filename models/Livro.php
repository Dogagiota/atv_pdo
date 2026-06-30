<?php

class Livro
{
    private $id;
    private $titulo;
    private $autor;
    private $anoPublicacao;
    private $disponivel;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getAnoPublicacao()
    {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao($ano)
    {
        $this->anoPublicacao = $ano;
    }

    public function isDisponivel()
    {
        return $this->disponivel;
    }

    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;
    }
}