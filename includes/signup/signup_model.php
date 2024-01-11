<?php 

declare(strict_types=1);

// check if email exist in db
function search_email(object $pdo, string $email)
{
    $query = "SELECT * FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// register user
function add_user($pdo, $talent, $first_name, $last_name, $gender, $dob, $address, $city, $state, $country, $phone, $email, $education_status, $institution, $occupation, $team, $social, $interest, $photo)
{
    $query = "INSERT INTO users (talent, first_name, last_name, gender, dob, address, city, state, country, phone, email, education_status, institution, occupation, desired_team, photo, social, interest) VALUES (:talent, :first_name, :last_name, :gender, :dob, :address, :city, :state, :country, :phone, :email, :education_status, :institution, :occupation, :desired_team, :photo, :social, :interest);";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":talent", $talent);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":city", $city);
    $stmt->bindParam(":state", $state);
    $stmt->bindParam(":country", $country);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":education_status", $education_status);
    $stmt->bindParam(":institution", $institution);
    $stmt->bindParam(":occupation", $occupation);
    $stmt->bindParam(":desired_team", $team);
    $stmt->bindParam(":social", $social);
    $stmt->bindParam(":interest", $interest);
    $stmt->bindParam(":photo", $photo);

    $stmt->execute();
}