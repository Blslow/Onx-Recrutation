<?php

class RankingTable
{
  private $players = array();

  public function __construct($players)
  {
    $this->players = array_fill_keys($players, array('score' => 0, 'games' => 0));
  }

  public function recordResult($player, $score)
  {
    $this->players[$player]['score'] += $score;
    $this->players[$player]['games']++;

    $this->sortPlayers();
  }

  public function playerRank($rank)
  {
    $this->sortPlayers();

    $playerByRank = array_keys($this->players);
    return $playerByRank[$rank];
  }

  public function getTable()
  {
    return $this->players;
  }

  private function sortPlayers()
  {
    uasort($this->players, function($a, $b)
    {
      if ($a['score'] < $b['score'])
      {
        return -1;
      }
      elseif ($a['score'] > $b['score'])
      {
        return 1;
      }
      elseif ($a['games'] < $b['games'])
      {
        return -1;
      }
      elseif ($a['games'] > $b['games'])
      {
        return 1;
      }
      else
      {
        return 0;
      }
    });
  }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);

$table->recordResult('Jan', 1);
$table->recordResult('Jan', 1);
$table->recordResult('Jan', 4);
$table->recordResult('Maks', 5);
$table->recordResult('Monika', 1);
$table->recordResult('Monika', 2);

echo $table->playerRank(1);
echo '</br>';

$tableData = $table->getTable();
print_r($tableData);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>php z3</title>
</head>
<body>


</body>
</html>