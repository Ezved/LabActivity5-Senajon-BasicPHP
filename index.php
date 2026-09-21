<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <main id="protectedContent" hidden>
        <h1>Welcome</h1>
        <p id="welcomeMessage"></p>
        <button id="logoutButton" type="button">Log out</button>
    </main>

    <script>
        // Send guests to the login page.
        if (localStorage.getItem('isAuthenticated') !== 'true') {
            window.location.replace('login.php');
        } else {
            // Get the saved email.
            const registeredEmail = localStorage.getItem('registeredEmail');
            // Show the page content.
            document.getElementById('protectedContent').hidden = false;
            // Show the user email.
            document.getElementById('welcomeMessage').textContent = `You are logged in as ${registeredEmail}.`;
        }

        // Log the user out.
        document.getElementById('logoutButton').addEventListener('click', function () {
            localStorage.removeItem('isAuthenticated');
            window.location.replace('login.php');
        });
    </script>
</body>
</html>
