<?php

class TextInput 
{
  private $value;
  public function add($text)
  {
    $this->value .= $text;
  }

  public function getValue()
  {
    return $this->value;
  }
}

class NumericInput extends TextInput
{
  public function add($text)
  {
    if (is_numeric($text))
    {
      parent::add($text);
    }
  }
}

$textInput = new TextInput();
$textInput->add("Hi ");
$textInput->add("hello ");
$textInput->add("10001");
echo $textInput->getValue();

echo '</br>';

$numericInput = new NumericInput();
$numericInput->add("0111");
$numericInput->add("0000");
$numericInput->add("0001");
$numericInput->add("a0011");
echo $numericInput->getValue();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>php z2</title>
</head>
<body>

  

</body>
</html>