<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Log In</h1>
        <p id="statusMessage" role="status" aria-live="polite"></p>
        <form id="loginForm" novalidate>
            <label for="email">Email</label><br>
            <input id="email" name="email" type="email" autocomplete="email" required>
            <p id="errorMessage" role="alert" aria-live="polite"></p>
            <button type="submit">Log in</button>
        </form>
        <p>Need an account? <a href="register.php">Register</a></p>
    </main>

    <script>
        // Send logged-in users to the home page.
        if (localStorage.getItem('isAuthenticated') === 'true') {
            window.location.replace('index.php');
        }

        // Get the form fields.
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const errorMessage = document.getElementById('errorMessage');
        const statusMessage = document.getElementById('statusMessage');
        const registeredEmail = localStorage.getItem('registeredEmail');

        // Show a message after registration.
        if (new URLSearchParams(window.location.search).get('registered') === '1') {
            statusMessage.textContent = 'Registration successful. Please log in.';
        }

        // Check the login details.
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const email = emailInput.value.trim().toLowerCase();

            if (!emailInput.validity.valid) {
                errorMessage.textContent = 'Please enter a valid email address.';
                return;
            }

            if (!registeredEmail) {
                errorMessage.textContent = 'No account was found. Please register first.';
                return;
            }

            if (email !== registeredEmail) {
                errorMessage.textContent = 'Incorrect email address. Please use the email you registered with.';
                return;
            }

            localStorage.setItem('isAuthenticated', 'true');
            errorMessage.textContent = '';
            window.location.href = 'index.php';
        });
    </script>
</body>
</html>
