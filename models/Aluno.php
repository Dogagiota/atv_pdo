<?php

require_once 'Pessoa.php';

class Aluno extends Pessoa
{
    private $matricula;

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function getIdentificacao()
    {
        return $this->matricula;
    }
}