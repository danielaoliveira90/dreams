<?php

function validate($country, $age, $gender, $dream_type, $dream_description) {
    $errors = [];

    if (empty($country)) {
        $errors[] = 'Country is required.';
    }

    if (empty($age)) {
        $errors[] = 'Age is required.';
    } elseif (!is_numeric($age) || $age <= 0) {
        $errors[] = 'Age must be a positive number.';
    }

    if (empty($gender)) {
        $errors[] = 'Gender is required.';
    }

    if (empty($dream_type)) {
        $errors[] = 'Dream type is required.';
    }

    if (empty($dream_description)) {
        $errors[] = 'Dream description is required.';
    }

    return $errors;
}

?>
