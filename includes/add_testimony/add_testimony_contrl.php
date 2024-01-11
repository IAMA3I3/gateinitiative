<?php

declare(strict_types=1);

// empty inputs
function empty_input(string $testimony, string $author)
{
    if (empty($testimony) || empty($author)) {
        return true;
    } else {
        return false;
    }
    
}