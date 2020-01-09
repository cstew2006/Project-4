<?php

require 'inc/thegoodstuff.php';
class Phrase
{
    public $currentPhrase;
    public $selected =[];
  

    public function __construct($phrase=null, $selected= null ){
        if (!empty($phrase)) {
            $this->currentPhrase = $phrase;
        }
        if(!isset($phrase)){
            $this->currentPhrase=thegoodstuffRandomizer();
        }
        if (!empty($selected)){
            $this->selected = $selected;
    }
    }
    
    //displays the letters in the phrase
    public function addPhraseToDisplay(){
    
        $characters = str_split(strtolower($this->currentPhrase));
        $output = "<div class='section' id='phrase' >";
        $output .= "<ul>";
        foreach ($characters as $character) {
        if (in_array($character, $this->selected)) {
            $output .= "<li class='show letter'>" . $character . "</li>";
        } else if ($character == " ") {
            $output .= "<li class='space'>" . $character . "</li>";
        } else {
          $output .= "<li class='hide letter'>" . $character . "</li>";
          }
        }
        $output .= "</ul>";
        $output .= "</div>";
        return $output;
        }  
     
    public function getLetterArray() {
        return array_unique(str_split(str_replace(' ', '', strtolower($this->currentPhrase))));
        }
    public function checkLetter($letter){
        if (in_array($letter, $this->getLetterArray())) {
        return true;
        } else {
            return false;
        }
        }
    public function numberLost(){        
            return count(array_diff($this->selected, $this->getLetterArray()));
        }
    }
 
