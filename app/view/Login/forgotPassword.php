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
    <link rel="stylesheet" href="<?= BASEURL ?>css/output.css">
    <style>
        ::-ms-reveal {
            display: none !important;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <title>Forgot Password</title>
</head>

<body class=" flex items-center bg-50 dark:bg-800 dark:text-50 flex-col justify-center h-svh w-screen">

    <a onclick="window.history.back(); " class="absolute left-10 top-10">
        <div class="w-[45px] h-[40px] center bg-white dark:bg-700 rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                <rect fill="none" height="24" width="24" />
                <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
            </svg>
        </div>
    </a>


    <div class=" max-[559px]:w-full max-[559px]:px-14">
        <div class=" flex flex-col items-center">
            <div class=" text-base-500 font-medium text-3xl font-cursive">OUR TASK</div>
            <div class="font-sans">Task Management</div>
        </div>
        <div class=" mt-16 flex w-full flex-col items-center justify-center min-[560px]:w-112 max-[390px]:mt-12">
            <div class=" font-semibold font-Poppins text-base max-md:text-sm">Forgot Password</div>
            <form class="w-full flex flex-col items-center" action="<?= BASEURL ?>login/checkInputForgotPassword" method="post">
                <div class=" dark:bg-700  flex mt-5 border-solid border border-200 dark:border-500 rounded-xl h-12 w-full max-md:h-11">
                    <div class=" flex justify-center items-center bg-base-500  box-border h-full w-12 max-md:w-11 rounded-s-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                            <path d="M13.1448 0.5C14.2623 0.5 15.3373 0.941667 16.1282 1.73417C16.9198 2.525 17.3623 3.59167 17.3623 4.70833V11.2917C17.3623 13.6167 15.4707 15.5 13.1448 15.5H4.91235C2.58651 15.5 0.695679 13.6167 0.695679 11.2917V4.70833C0.695679 2.38333 2.57818 0.5 4.91235 0.5H13.1448ZM14.0873 4.83333C13.9123 4.82417 13.7457 4.88333 13.6198 5L9.86234 8C9.37901 8.40083 8.68651 8.40083 8.19568 8L4.44568 5C4.18651 4.80833 3.82818 4.83333 3.61235 5.05833C3.38735 5.28333 3.36235 5.64167 3.55318 5.89167L3.66235 6L7.45401 8.95833C7.92068 9.325 8.48651 9.525 9.07901 9.525C9.66985 9.525 10.2457 9.325 10.7115 8.95833L14.4707 5.95L14.5373 5.88333C14.7365 5.64167 14.7365 5.29167 14.5282 5.05C14.4123 4.92583 14.2532 4.85 14.0873 4.83333Z" fill="white" />
                        </svg>
                    </div>
                    <input type="email" id="email" placeholder="Email" class=" bg-inherit outline-none pl-7 max-md:pl-2.5 flex-grow pr-7 max-md:pr-2.5 rounded-r-xl max-md:text-sm" required name='email'>
                </div>
                <div class=" dark:bg-700  flex mt-5 border-solid border border-200 dark:border-500 rounded-xl h-12 max-md:h-11 max-md:h-11 w-full">
                    <div class=" flex justify-center items-center bg-base-500  box-border h-full w-12 max-md:w-11 rounded-s-xl">
                        <svg class="profile" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.04998 8.56306C8.87008 8.56306 11.25 9.02131 11.25 10.7893C11.25 12.558 8.85448 13 6.04998 13C3.23052 13 0.849976 12.5417 0.849976 10.7737C0.849976 9.00506 3.24547 8.56306 6.04998 8.56306ZM6.04998 0C7.96039 0 9.49107 1.53012 9.49107 3.43918C9.49107 5.34825 7.96039 6.87902 6.04998 6.87902C4.14021 6.87902 2.60889 5.34825 2.60889 3.43918C2.60889 1.53012 4.14021 0 6.04998 0Z" fill="white" />
                        </svg>
                    </div>
                    <input type="number" placeholder="NIS" name="no_induk" class=" bg-inherit outline-none pl-7 max-md:pl-2.5 flex-grow pr-7 max-md:pr-2.5 rounded-r-xl max-md:text-sm" required>
                </div>
                <div class="w-full text-red-500 text-center mt-6 font-Poppins max-md:text-xs font-bold text-sm"><?php if (isset($_SESSION['login_err'])) echo $_SESSION['login_err'] ?></div>
                <button class="font-semibold font-Poppins text-base mt-6 w-full h-12 max-md:h-11 rounded-xl bg-base-500 text-white cursor-pointer max-md:text-xs" type="submit">
                    Check Password</button>
            </form>
        </div>
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