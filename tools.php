<?php

function sanitize(string $str): string 
{
    return htmlspecialchars(ENT_NOQUOTES,strip_tags(trim($str)));
}