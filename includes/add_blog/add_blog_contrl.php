<?php

declare(strict_types=1);

// empty inputs
function empty_input(string $title, string $body, string $author)
{
    if (empty($title) || empty($body) || empty($author)) {
        return true;
    } else {
        return false;
    }
    
}