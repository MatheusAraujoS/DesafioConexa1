<?php
class PacoteHora
{
  // ID do Pacote
  public int $id;
  // Nome do Pacote
  public string $nome;
  // Array contendo IDs das salas em que o pacote é válido
  public array $salasValido;
  // Quantidade de horas total do pacote
  public int $qtdHoras;
  // Quantidade de horas já utilizadas do pacote
  public int $qtdUtilizada;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->nome = $data['nome'];
    $this->salasValido = $data['salasValido'];
    $this->qtdHoras = $data['qtdHoras'];
    $this->qtdUtilizada = $data['qtdUtilizada'];
  }
}

$pacote1 = new PacoteHora(['id' => 1, 'nome' => 'Pacote 10Hrs', 'salasValido' => [1, 2, 3], 'qtdHoras' => 10, 'qtdUtilizada' => 2]);
$pacote2 = new PacoteHora(['id' => 2, 'nome' => 'Pacote 100Hrs', 'salasValido' => [1], 'qtdHoras' => 100, 'qtdUtilizada' => 0]);
$pacote3 = new PacoteHora(['id' => 3, 'nome' => 'Pacote 5Hrs', 'salasValido' => [4, 5], 'qtdHoras' => 5, 'qtdUtilizada' => 4]);


$pacotes = [$pacote1, $pacote2, $pacote3];

function getPacotesValidos($pacotes, $idSala, $qtdHoras)
{
  $pacotesAptos = array();
  foreach ($pacotes as $pacote) {
    if (in_array($idSala, $pacote->salasValido)) {
      $totalHoras = $qtdHoras + $pacote->qtdUtilizada;
      if ($qtdHoras <= $pacote->qtdHoras && $totalHoras <= $pacote->qtdHoras) {
        $pacotesAptos[] = $pacote;
      }
    }
  }
  return var_dump($pacotesAptos);
}
getPacotesValidos($pacotes, 5, 1);
echo "<hr>";
getPacotesValidos($pacotes, 1, 8);
echo "<hr>";
getPacotesValidos($pacotes, 1, 70);
echo "<hr>";
getPacotesValidos($pacotes, 3, 12);