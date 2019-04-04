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

    public function visualizaAluno($idAluno)
    {

        return $this->executaGet($this->urlBase . 'students/' . $idAluno);
    }

    public function atualizaAluno($idAluno, array $dadosAluno)
    {

        return $this->executaPut($this->urlBase . 'students/' . $idAluno, $dadosAluno);
    }

    public function excluiAluno($idAluno)
    {

        return $this->executaDelete($this->urlBase . 'students/' . $idAluno);
    }

    public function listaInscricoesAluno($idAluno)
    {

        return $this->executaGet($this->urlBase . 'students/' . $idAluno . '/events');
    }

    public function inscreveAlunoEvento($idAluno, $idEvento)
    {

        $dados = [
            'student_id' => $idAluno,
            'event_id' => $idEvento,
        ];

        return $this->executaPost($this->urlBase . 'students_events', $dados);
    }

    public function visualizaInscricao($idInscricao)
    {

        return $this->executaGet($this->urlBase . 'students_events/' . $idInscricao);
    }

    public function setaSituacaoInscricao($idInscricao, array $dadosInscricao)
    {

        return $this->executaPut($this->urlBase . 'students_events/' . $idInscricao . '/update_status', $dadosInscricao);
    }

    public function linkLoginEvento($idEvento)
    {

        return $this->executaGet($this->urlBase . 'students_events/' . $idEvento . '/link_to_learn');
    }
}
