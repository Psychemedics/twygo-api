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
public function visualizaAluno($idAluno);
public function atualizaAluno($idAluno, array $dadosAluno);
public function excluiAluno($idAluno);
public function listaInscricoesAluno($idAluno);
public function inscreveAlunoEvento($idAluno, $idEvento);
public function visualizaInscricao($idInscricao);
public function setaSituacaoInscricao($idInscricao, array $dadosInscricao);
public function linkLoginEvento($idEvento);
````