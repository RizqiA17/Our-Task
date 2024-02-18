<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/login.css">
    <style>
        ::-ms-reveal {
            display: none !important;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="header">
        <div class="title">OUR TASK</div>
        <div class="sub-title general-text-font">Task Management</div>
    </div>
    <div class="container">
        <div class="login general-text-font">Login to your account</div>
        <form action="<?=BASEURL?>/login/signin" method="post">
            <div class="input-box">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                        <path d="M13.1448 0.5C14.2623 0.5 15.3373 0.941667 16.1282 1.73417C16.9198 2.525 17.3623 3.59167 17.3623 4.70833V11.2917C17.3623 13.6167 15.4707 15.5 13.1448 15.5H4.91235C2.58651 15.5 0.695679 13.6167 0.695679 11.2917V4.70833C0.695679 2.38333 2.57818 0.5 4.91235 0.5H13.1448ZM14.0873 4.83333C13.9123 4.82417 13.7457 4.88333 13.6198 5L9.86234 8C9.37901 8.40083 8.68651 8.40083 8.19568 8L4.44568 5C4.18651 4.80833 3.82818 4.83333 3.61235 5.05833C3.38735 5.28333 3.36235 5.64167 3.55318 5.89167L3.66235 6L7.45401 8.95833C7.92068 9.325 8.48651 9.525 9.07901 9.525C9.66985 9.525 10.2457 9.325 10.7115 8.95833L14.4707 5.95L14.5373 5.88333C14.7365 5.64167 14.7365 5.29167 14.5282 5.05C14.4123 4.92583 14.2532 4.85 14.0873 4.83333Z" fill="white" />
                    </svg>
                </div>
                <input type="email" id="email" placeholder="Email" class="input" required name='email'>
            </div>
            <div class="input-box">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                        <path d="M7.07588 0.731476C9.63316 0.731476 11.6908 2.7438 11.6908 5.22815V6.50593C13.1261 6.95394 14.1719 8.25326 14.1719 9.80515V13.9192C14.1719 15.8405 12.5791 17.3981 10.6154 17.3981H3.56258C1.59805 17.3981 0.00524902 15.8405 0.00524902 13.9192V9.80515C0.00524902 8.25326 1.05187 6.95394 2.48632 6.50593V5.22815C2.49479 2.7438 4.55247 0.731476 7.07588 0.731476ZM7.08435 10.2184C6.67789 10.2184 6.34765 10.5413 6.34765 10.9388V12.7773C6.34765 13.183 6.67789 13.506 7.08435 13.506C7.49927 13.506 7.82952 13.183 7.82952 12.7773V10.9388C7.82952 10.5413 7.49927 10.2184 7.08435 10.2184ZM7.09282 2.18068C5.37385 2.18068 3.97666 3.53879 3.96819 5.21159V6.32623H10.209V5.22815C10.209 3.54707 8.81178 2.18068 7.09282 2.18068Z" fill="white" />
                    </svg>
                </div>
                <div class="input password">
                    <input type="password" id="password" placeholder="Password" required name='password'>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000" class="material-symbols-outlined" id="toggleIcon">
                        <path id="toogleOff" d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                        <path style="display: none;" id="toogleOn" d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                    </svg>
                </div>
            </div>
            <a href="" class="general-text-font forgot-password">Forgot password?</a>
            <div class="err-msg"><?php if(isset($_SESSION['login_err'])) echo $_SESSION['login_err']?></div>
            <button class="general-text-font login-btn" type="submit">
                <!-- onclick="window.location.href='http://localhost/ourtaskmvc/public/home'" -->
                Login</button>
        </form>
    </div>
    <div class="sign-up">
        <label for="" class="general-text-font sign-up-text">Don't have an account?</label>
        <a href="http://localhost/ourtaskmvc/public/login/signup" class="general-text-font sign-up-text">Sign Up</a>
    </div>
    <script>
        var passwordToogleIcon = document.getElementById('toggleIcon');
        var password = document.getElementById('password');
        var toogleOn = document.getElementById('toogleOn');
        var toogleOff = document.getElementById('toogleOff');
        var hidden = true;

        passwordToogleIcon.addEventListener('click', function() {

            if (hidden) {
                password.type = 'text';
                toogleOff.setAttribute('style', "display: none;");
                toogleOn.removeAttribute('style');
                hidden = false
            } else {
                password.type = 'password';
                toogleOn.setAttribute('style', "display: none;");
                toogleOff.removeAttribute('style');
                hidden = true;
            }
        });
    </script>
</body>

</html>