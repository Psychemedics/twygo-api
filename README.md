# Twygo API para Laravel

##### _Versão: v1_

## Sobre

Pacote para comunicação com a API do sistema Twygo

## Instalação

### Composer
````
composer require psychemedics/twygo-api
````

##### `config/app.php` para Laravel < 5.5
````
'providers' => [
    ...
    PsyTwygo\ServiceProvider::class,
],
````

### Publicação de configuração

Utilize o comando abaixo para publicar o aruqivo de configuração `config/psytwygo.php`:
````
php artisan vendor:publish --provider="PsyTwygo\ServiceProvider"
````

### ENV
````
TWYGOAPI_URL=http://localhost/
TWYGOAPI_VERSAO=v1
TWYGOAPI_ORGID=0
TWYGOAPI_GRANTTYPE=password
TWYGOAPI_USERNAME=email@example.com
TWYGOAPI_PASSWORD=secret
````

### Métodos

#### Documentação de informações enviadas e recebidas estão na documentação do prestador de serviço

````
public function listaAlunos();
public function criaAluno(array $dadosAluno);
public function visualizaAluno(int $idAluno);
public function atualizaAluno(int $idAluno, array $dadosAluno);
public function excluiAluno(int $idAluno);
public function listaInscricoesAluno(int $idAluno);
public function inscreveAlunoEvento(int $idAluno, int $idEvento);
public function visualizaInscricao(int $idInscricao);
public function setaSituacaoInscricao(int $idInscricao, array $dadosInscricao);
public function linkLoginEvento(int $idEvento);
````