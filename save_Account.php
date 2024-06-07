<?php
/*/ Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define XML file path
    $xmlFilePath = "XML/usersAccount.xml";

    // Get form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $barangay = $_POST["Barangay"];
    $municipality = $_POST["Municipality"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Create SimpleXMLElement object if file exists, otherwise create new XML
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
    } else {
        $xml = new SimpleXMLElement("<users></users>");
    }

    // Add new user to XML
    $user = $xml->addChild("user");
    $user->addChild("fname", $fname);
    $user->addChild("lname", $lname);
    $user->addChild("barangay", $barangay);
    $user->addChild("municipality", $municipality);
    $user->addChild("phone", $phone);
    $user->addChild("email", $email);
    $user->addChild("password", $password);

    // Save XML file
    $xml->asXML($xmlFilePath);

    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header("Location: signup.html");
    exit();
}*/
?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define XML file path
    $xmlFilePath = "XML/usersAccount.xml";

    // Get form data
    $userData = array(
        "fname" => $_POST["fname"],
        "lname" => $_POST["lname"],
        "barangay" => $_POST["Barangay"],
        "municipality" => $_POST["Municipality"],
        "phone" => $_POST["phone"],
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    );

    // Create SimpleXMLElement object if file exists, otherwise create new XML
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
    } else {
        $xml = new SimpleXMLElement("<users></users>");
    }

    // Add new user to XML
    $user = $xml->addChild("user");
    foreach ($userData as $key => $value) {
        $user->addChild($key, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    // Save XML file
    $xml->asXML($xmlFilePath);

    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header("Location: signup.html");
    exit();
}
?>
