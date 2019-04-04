<?php

namespace PsyTwygo;


interface PsyTwygoInterface
{

    public function listaAlunos();

    public function criaAluno(array $dadosAluno);

    public function visualizaAluno($idAluno);

    public function atualizaAluno($idAluno, array $dadosAluno);

    public function excluiAluno($idAluno);

    public function listaInscricoesAluno($idAluno);

    public function inscreveAlunoEvento($idAluno, $idEvento);

    public function visualizaInscricao($idInscricao);

    public function setaSituacaoInscricao($idInscricao, array $dadosInscricao);

    public function linkLoginEvento($idEvento);
}