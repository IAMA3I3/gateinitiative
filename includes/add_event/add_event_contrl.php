<?php

declare(strict_types= 1);

// empty input
function empty_input(string $title, string $description)
{
    if (empty($title) || empty($description)) {
        return true;
    } else {
        return false;
    }
    
}