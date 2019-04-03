<?php

namespace PsyTwygo;


interface PsyTwygoInterface
{

    public function listaAlunos(): array;

    public function criaAluno(array $dadosAluno);

    public function visualizaAluno(int $idAluno);

    public function atualizaAluno(int $idAluno, array $dadosAluno);

    public function excluiAluno(int $idAluno);

    public function listaInscricoesAluno(int $idAluno);

    public function inscreveAlunoEvento(int $idAluno, int $idEvento);

    public function visualizaInscricao(int $idInscricao);

    public function setaSituacaoInscricao(int $idInscricao, array $dadosInscricao);

    public function linkLoginEvento(int $idEvento);
}