<?php

class Thesaurus
{
  private $thesaurus;

  public function __construct($thesaurus)
  {
    $this->thesaurus = $thesaurus;
  }

  public function getSynonyms($word)
  {
    if (array_key_exists($word, $this->thesaurus))
    {
      $synonyms = $this->thesaurus[$word];
    }
    else
    {
      $synonyms = array();
    }

    $result = array(
      'word' => $word,
      'synonyms' => $synonyms
    );

    return json_encode($result);
  }
}

$thesaurusData = array(
  "market" => array("trade"),
  "small" => array("little", "compact")
);

$thesaurus = new Thesaurus($thesaurusData);

echo $thesaurus->getSynonyms("small");
echo '</br>';
echo $thesaurus->getSynonyms("asleast");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>php z4</title>
</head>
<body>


</body>
</html>