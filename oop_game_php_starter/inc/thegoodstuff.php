<?php
$thegoodstuff=[
    'Autobots lets roll out',
    'Thank You Goku',
    'teamwork makes the dream work',
    'Do you smell what The Rock is cookin',
    'Avengers Assemble',
    'Hakuna Matata',
    'Dont worry be happy',
    
];
//Choosing random phrases
function thegoodstuffRandomizer(){
    global $thegoodstuff;
    return $thegoodstuff[rand(0,count($thegoodstuff) - 1)];
}
