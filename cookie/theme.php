<?php
// Default theme if no cookie exists
$defaultTheme = "burlywood";
// Check if a cookie is set, else use default
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : $defaultTheme;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Selection</title>
    <style>
        body {
            transition: background-color 0.5s;
        }
        button {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .lightcoral { background-color: lightcoral; }
        .yellowgreen { background-color: yellowgreen; }
        .burlywood { background-color: burlywood; }
        .delete { background-color: black; color: white; }
    </style>
</head>
<body>

    <h1>Select Theme</h1>
    <!-- Theme selection buttons -->
    <button class="lightcoral" onclick="setTheme('lightcoral')">lightcoral</button>
    <button class="yellowgreen" onclick="setTheme('yellowgreen')">Green</button>
    <button class="burlywood" onclick="setTheme('burlywood')">burlywood</button>

    <h2>Current Theme: <span id="current-theme"></span></h2>

    <!-- Button to delete cookie -->
    <button class="delete" onclick="deleteTheme()">Reset Theme</button>

    <script>
        // Function to set theme instantly and save in a cookie
        function setTheme(color) {
            document.body.style.backgroundColor = color; // Apply theme
            document.getElementById("current-theme").innerText = color.charAt(0).toUpperCase() + color.slice(1);

            // Save theme in a cookie using PHP
            fetch('set_theme.php?theme=' + color)
                .then(response => console.log("Theme saved:", color));
        }

        // Function to delete the cookie and reset theme
        function deleteTheme() {
            fetch('set_theme.php?delete=1') // Tell PHP to delete the cookie
                .then(() => {
                    document.body.style.backgroundColor = "burlywood"; // Reset to default
                    document.getElementById("current-theme").innerText = "burlywood";
                });
        }

        // Apply theme from PHP cookie (on page load)
        function applySavedTheme() {
            let theme = "<?php echo $theme; ?>"; // Get from PHP
            document.body.style.backgroundColor = theme;
            document.getElementById("current-theme").innerText = theme.charAt(0).toUpperCase() + theme.slice(1);
        }
        
        applySavedTheme();
    </script>

</body>
</html>
