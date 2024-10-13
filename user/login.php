<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function toggleSignupLink() {
            // Get the radio buttons for user and admin
            const userRadio = document.querySelector('input[name="loginType"][value="user"]');
            const adminRadio = document.querySelector('input[name="loginType"][value="admin"]');
            const signupLink = document.getElementById('signup-link');

            // Show the signup link if 'User' is selected, hide it if 'Admin' is selected
            if (adminRadio.checked) {
                signupLink.style.display = 'none';
            } else {
                signupLink.style.display = 'block';
            }
        }

        // Ensure that the function runs when the page loads
        window.onload = function() {
            const radios = document.querySelectorAll('input[name="loginType"]');
            radios.forEach(radio => {
                radio.addEventListener('change', toggleSignupLink);
            });
            toggleSignupLink(); // Run on page load to ensure the correct state
        };
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="login.php" method="post">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="email" name="email" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="pass" required>
                    </div>

                    <!-- Add Radio Buttons for User Type -->
                    <div class="radio-field">
                        <label for="loginType">Login as:</label>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="loginType" value="user" required>
                                User
                            </label>
                            <label>
                                <input type="radio" name="loginType" value="admin" required>
                                Admin
                            </label>
                        </div>
                    </div>

                    <div class="form-link">
                        <a href="forgot.php">Forgot password?</a>
                    </div>

                    <div class="field-button">
                        <button type="submit" name="login" class="field-button" value="login">Login</button>
                    </div>
                </form>

                <!-- Signup link that will be hidden when admin is selected -->
                <div class="form-link" id="signup-link">
                    <span>Don't have an account? <a href="signup.php" class="signup-link">Sign up</a></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
