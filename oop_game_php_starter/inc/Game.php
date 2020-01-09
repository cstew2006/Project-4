<?php
class Game
{
    public $phrase;
    //number of wrong guess you get to have
    public $lives = 5;
    public function __construct($phrase)
    {
      $this->phrase = $phrase;
    }

    public function displayScore(){
            $score = '';
        for ($i=1; $i <= $this->phrase->numberLost(); $i++) {
            $score .= '<li class="tries"><img src="images/lostHeart.png" height="35px" width="30px"></li>';
        }
        for ($i = 1; $i <= ($this->lives - $this->phrase->numberLost()); $i++) {
            $score .= '<li class="tries"><img src="images/liveHeart.png" height="35px" width="30px"></li>';
        }
        return $score;
    }

    //Used Seans displayKeyboard function
    public function displayKeyboard(){
            $buttons = [
            ['q','w','e','r','t','y','u','i','o','p'],
            ['a','s','d','f','g','h','j','k','l'],
            ['z','x','c','v','b','n','m', '-', '\'']
        ];

        $keyboard = '<form method="POST" action="play.php">';
        $keyboard .= '<div id="qwerty" class="section">';
        foreach ($buttons as $rows){
            $keyboard .= '<div class="keyrow">';

            foreach($rows as $letter){
                if(!in_array($letter, $this->phrase->selected)){
                    $keyboard .= '<button name="key" class="key" id="'.$letter.'" value="'.$letter.'">' . $letter . '</button>';
                }
                else{
                    if($this->phrase->checkLetter($letter)){
                        $keyboard .= '<button name="key" value="'.$letter.'" class="key" style="background-color: green" id="'.$letter.'" disabled>' . $letter  . '</button>';
                    }
                    else{
                        $keyboard .= '<button name="key" value="'.$letter.'" class="key" style="background-color: red" id="'.$letter.'" disabled>' . $letter  . '</button>';
                    }
                }
            }
            $keyboard.='</div>';
        }
        $keyboard.='</div>';
        $keyboard.='</form>';
        return $keyboard;
    }
    
   //This is for seeing if you have picked too many incorrect letters.
    public function checkForLose(){
  
        if ($this->phrase->numberLost() == $this->lives) {
            return true;
        } else {
        return false;
        }
    }
    
    //This is for seeing if you have picked all of the letters.
    public function checkForWin(){
        if (count(array_intersect($this->phrase->selected, $this->phrase->getLetterArray())) == count($this->phrase->getLetterArray())) {
            return true;
        } else {
            return false;
          }
    } 
    
    //displays if you have won or lost
    public function gameOver(){
        if ($this->checkForLose() == true) {
            return '<h1>The phrase was: "' . $this->phrase->currentPhrase . '". Train your mind some more and try again!</h1>
        <form action="play.php" method="POST">
        <input id="btn__reset" type="submit" name="start" value="Start Game" />
        </form>';
        } elseif ($this->checkForWin() == true) {
            return '<h1>Congratulations on guessing: "' . $this->phrase->currentPhrase . '"</h1>
        <form action="play.php" method="POST">
        <input id="btn__reset" type="submit" name="start" value="Start Game" />
        </form>';
        } else {
        return false;
    }
}
}               
                
  
