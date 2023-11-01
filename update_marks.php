<!DOCTYPE html>
<html>
<head>
    <title>JavaScript to PHP Example</title>
</head>
<body>
    <h1>Enter a value:</h1>
    <input type="text" id="inputValue">
    <button id="submitButton">Submit</button>
    
    <div id="result"></div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function() {
            var inputValue = document.getElementById('inputValue').value;
            
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();
            
            // Configure the request
            xhr.open('POST', 'update_marks.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Define a callback function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
            };
            
            // Send the data to the server
            xhr.send('inputValue=' + inputValue);
        });
    </script>
</body>
</html>



<?php

if (isset($_POST['inputValue'])) {
    $inputValue = $_POST['inputValue'];
    
    // Do something with the input, for example, you can echo it back
    echo 'You entered: ' . $inputValue;
} else {
    echo 'No input received.';
}
?>
