<?php

declare(strict_types=1);

// empty inputs
function empty_input($talent, $first_name, $last_name, $gender, $dob, $address, $city, $state, $country, $phone, $email, $education_status, $team)
{
    if (empty($talent) || empty($first_name) || empty($last_name) || empty($gender) || empty($dob) || empty($address) || empty($city) || empty($state) || empty($country) || empty($phone) || empty($email) || empty($education_status) || empty($team)) {
        return true;
    } else {
        return false;
    }
    
}

// name must be letters only
function not_alpha(string $name)
{
    if (!ctype_alpha($name)) {
        return true;
    } else {
        return false;
    }
    
}

// invalid email
function invalid_email(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
    
}

// email taken
function email_registered(object $pdo, string $email)
{
    // check if email exist in db
    if (search_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
    
}