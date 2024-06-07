<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];




    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;
    $root = $xml->createElement('formData');
    $xml->appendChild($root);

    $user = $xml->createElement('user');
    $user->appendChild($xml->createElement('email', $email));
    $user->appendChild($xml->createElement('password', $password));
    $root->appendChild($user);

    $xml->save('form_data.xml'); // Save to an XML file


    echo "Form data saved successfully!";
} else {

    echo "Error: Invalid request method";
}

?>
