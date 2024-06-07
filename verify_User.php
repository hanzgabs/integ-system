<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define XML file path
    $xmlFilePath = "XML/usersAccount.xml";

    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if XML file exists
    if (file_exists($xmlFilePath)) {
        // Load XML file
        $xml = simplexml_load_file($xmlFilePath);

        // Flag to check if user is found
        $userFound = false;

        // Iterate through each user in the XML
        foreach ($xml->user as $user) {
            if ($user->email == $email && $user->password == $password) {
                $userFound = true;
                break;
            }
        }

        // Verify user credentials
        if ($userFound) {
            // Credentials are correct, redirect to index.html
            header("Location: index.html");
            exit();
        } else {
            // Credentials are incorrect, redirect back to login with error
            echo "<script>alert('Login failed. Please try again.'); window.history.back();</script>";
            //header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } else {
        // XML file not found, redirect back to login with error
        echo "<script>alert('Login failed. Please try again.'); window.history.back();</script>";
        //header("Location: login.php?error=file_not_found");
        exit();
    }
} else {
    // If form is not submitted, redirect to login page
    header("Location: login.php");
    exit();
}
?>