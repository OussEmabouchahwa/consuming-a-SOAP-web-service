<?php
// Initialize variables for the result display
$a = "";
$b = "";
$error = "";
$result = "";
$submitted = false;

if (isset($_POST['calculer'])) {
    $submitted = true;
    $a = $_POST['a'];
    $b = $_POST['b'];

    // Validate inputs
    if (is_numeric($a) && is_numeric($b)) {
        try {
            // URL of your WSDL service (Replace with your actual local/remote URL)
            $wsdl = "http://localhost:8081/CalculatriceWS?wsdl"; 
            
            // Step 2: Create the SoapClient instance
            $client = new SoapClient($wsdl);
            
            // Call the web service operation (adjust method name 'add' if different in your WSDL)
            // Most JAX-WS services expect parameters wrapped in an array/object matching the schema
            $params = array("arg0" => $a, "arg1" => $b); 
            
            $response = $client->somme($params);
            
            // Extract return value (JAX-WS typically returns an object with a 'return' property)
            $result = $response->return;
            
        } catch (SoapFault $e) {
            $error = "SOAP Error: " . $e->getMessage();
        }
    } else {
        $error = "Please enter valid numbers.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consommation SOAP Web Service</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 20px; }
        input[type="text"] { width: 150px; }
        .result-box { margin-top: 15px; font-weight: bold; }
        .error { color: red; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div class="form-group">
            <label for="a">a:</label>
            <input type="text" id="a" name="a" value="<?php echo htmlspecialchars($a); ?>">
        </div>
        
        <div class="form-group">
            <label for="b">b:</label>
            <input type="text" id="b" name="b" value="<?php echo htmlspecialchars($b); ?>">
        </div>
        
        <input type="submit" name="calculer" value="calculer">
    </form>

    <div class="result-box">
        <?php 
        if ($submitted) {
            if (!empty($error)) {
                echo "<span class='error'>$error</span>";
            } else {
                echo "la somme de $a et de $b est égale à $result";
            }
        } else {
            echo "la somme de et de est égale à";
        }
        ?>
    </div>

</body>
</html>
