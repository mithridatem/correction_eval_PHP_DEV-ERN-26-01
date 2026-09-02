<?php

//Méthode pour sanitizer une chaîne de caractères
function sanitize(string $str): string 
{
    return htmlspecialchars(strip_tags(trim($str)), ENT_NOQUOTES);
}

//méthode pour sanitizer un tableau de chaînes de caractères
function sanitize_array(array $arr): array 
{
    return array_map('sanitize', $arr);
}
