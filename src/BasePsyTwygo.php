<?php

namespace PsyTwygo;


final class BasePsyTwygo extends AbstractPsyTwygo
{


    public function listaAlunos()
    {

        return $this->executaGet($this->urlBase . 'students');
    }

    public function criaAluno(array $dadosAluno)
    {

        return $this->executaPost($this->urlBase . 'students', $dadosAluno);
    }

    public function visualizaAluno(int $idAluno)
    {

        return $this->executaGet($this->urlBase . 'students/' . $idAluno);
    }

    public function atualizaAluno(int $idAluno, array $dadosAluno)
    {

        return $this->executaPut($this->urlBase . 'students/' . $idAluno, $dadosAluno);
    }

    public function excluiAluno(int $idAluno)
    {

        return $this->executaDelete($this->urlBase . 'students/' . $idAluno);
    }

    public function listaInscricoesAluno(int $idAluno)
    {

        return $this->executaGet($this->urlBase . 'students/' . $idAluno . '/events');
    }

    public function inscreveAlunoEvento(int $idAluno, int $idEvento)
    {

        $dados = [
            'student_id' => $idAluno,
            'event_id' => $idEvento,
        ];

        return $this->executaPost($this->urlBase . 'students_events', $dados);
    }

    public function visualizaInscricao(int $idInscricao)
    {

        return $this->executaGet($this->urlBase . 'students_events/' . $idInscricao);
    }

    public function setaSituacaoInscricao(int $idInscricao, array $dadosInscricao)
    {

        return $this->executaPut($this->urlBase . 'students_events/' . $idInscricao . '/update_status', $dadosInscricao);
    }

    public function linkLoginEvento(int $idEvento)
    {

        return $this->executaGet($this->urlBase . 'students_events/' . $idEvento . '/link_to_learn');
    }
}
