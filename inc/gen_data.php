<?php

function generateData($num = null) {

  include('arrays.php');

    //get random number from nouns array
    $n1 = array_rand($nouns);
    $n2 = array_rand($nouns);
    //if the same number is picked for both add 1 to n2
    if($n1 == $n2) {
      $n2 = ($n1 + 1);
    }
    //get random number from with array
    $w1 = array_rand($with);
    $w2 = array_rand($with);
    //if the same number is picked for both add 1 to w2
    if($w1 == $w2) {
      $w2 = ($w1 + 1);
    }

    $noun1 = $nouns[$n1];
    $noun2 = $nouns[$n2];

    $with1 = $with[$w1];
    $with2 = $with[$w2];
    $d = array_rand($descriptives);

    $s = array_rand($story);
    $a = array_rand($adj);

    //list the vowels
    $vowels = array('a' , 'e' ,'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');


    /* If second word ($descriptives[n]) starts with any of the vowels from
    the vowels array then the first word will be "An" otherwise first word
    will be "A"*/
    if(in_array(substr($descriptives[$d], 0, 1) , $vowels)) {
      $firstword = "An ";
    }
    else $firstword = "A ";

    /* Check to see if the word following "about" starts with a vowel and if
    so then use "an" otherwise use "a"   */
    if(in_array(substr($adj[$a], 0, 1) , $vowels)) {
      $prep = " about an ";
    }
    else $prep = " about a ";


    /* Check to see if the word following "and" starts with a vowel and if
    so then use "an" otherwise use "a"   */
    if(in_array(substr($noun2, 0, 1) , $vowels)) {
      $conjunctive = " and an ";
    }
    else $conjunctive = " and a ";

    //The title
    $title = "The " . $noun1 . " and the " . $noun2;
    //The description
    $description = $firstword . $descriptives[$d] . " " . $story[$s];
    $description .= $prep . $adj[$a] . " " . $noun1;
    $description .= " with " . $with1;
    $description .= $conjunctive . $noun2 . " with " . $with2 . ".";


    //echo the title and the description
    $result = "<h2>" . ucwords($title) . "</h2>" ;
    $result .= "<h3>$description </h3>";
    // $result .= "<br>";

    //set default value of $num to 10
    if ($num == null) {
        $num = 10;
    }
    /*Filler... repeat description $num times (number can be changed to more or
    less as needed)  */
    for($i=0; $i<$num; $i++) {
      $result .= $description;
    }
    return $result;
}
