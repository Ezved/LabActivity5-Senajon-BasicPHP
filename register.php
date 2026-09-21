<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <main>
        <h1>Create an Account</h1>
        <form id="registerForm" novalidate>
            <label for="email">Email</label><br>
            <input id="email" name="email" type="email" autocomplete="email" required>
            <p id="errorMessage" role="alert" aria-live="polite"></p>
            <button type="submit">Register</button>
        </form>
        <p>Already registered? <a href="login.php">Log in</a></p>
    </main>

    <script>
        // Send logged-in users to the home page.
        if (localStorage.getItem('isAuthenticated') === 'true') {
            window.location.replace('index.php');
        }

        // Get the form fields.
        const registerForm = document.getElementById('registerForm');
        const emailInput = document.getElementById('email');
        const errorMessage = document.getElementById('errorMessage');

        // Save the email for login.
        registerForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const email = emailInput.value.trim().toLowerCase();

            if (!emailInput.validity.valid) {
                errorMessage.textContent = 'Please enter a valid email address.';
                return;
            }

            localStorage.setItem('registeredEmail', email);
            localStorage.removeItem('registeredPassword');
            errorMessage.textContent = '';
            window.location.href = 'login.php?registered=1';
        });
    </script>
</body>
</html>
