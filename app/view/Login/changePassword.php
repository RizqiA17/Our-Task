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

        input:-webkit-autofill()::before,
        input:-webkit-autofill()::after,
        input:-webkit-autofill() {
            box-shadow: 0 0 0px 100px black inset;
        }
    </style>
    <title>Change Password</title>
</head>

<body class=" flex items-center bg-50 dark:bg-800 dark:text-50 flex-col justify-center h-svh w-screen">

    <a href="<?= BASEURL ?>Login" class="absolute left-10 top-10">
        <div class="w-[45px] h-[40px] center bg-white dark:bg-700 rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                <rect fill="none" height="24" width="24" />
                <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
            </svg>
        </div>
    </a>

    <div class=" max-[559px]:w-full max-[559px]:px-14 " id="pin">
        <div class=" flex flex-col items-center">
            <div class=" text-base-500 font-medium text-3xl font-cursive">OUR TASK</div>
            <div class="font-sans">Task Management</div>
        </div>
        <div class=" mt-16 flex w-full flex-col items-center justify-center min-[560px]:w-112 max-[390px]:mt-12">
            <div class=" font-semibold font-Poppins text-base max-md:text-sm">Input PIN</div>

            <div class=" dark:bg-700  flex mt-5 border-solid border border-200 dark:border-500 rounded-xl h-12 max-md:h-11 w-full">
                <div class=" flex justify-center items-center bg-base-500  box-border h-full w-12 max-md:w-11 rounded-s-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M400-40q-33 0-56.5-23.5T320-120v-120q-33 0-56.5-23.5T240-320v-520q0-33 23.5-56.5T320-920h320q33 0 56.5 23.5T720-840v520q0 33-23.5 56.5T640-240v120q0 33-23.5 56.5T560-40H400Zm80-420q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm-80 340h160v-120H400v120Zm-80-200h320v-520H320v520Zm160-220q-17 0-28.5-11.5T440-580q0-17 11.5-28.5T480-620q17 0 28.5 11.5T520-580q0 17-11.5 28.5T480-540ZM320-320h320-320Z" />
                    </svg>
                </div>
                <div class=" flex-grow flex items-center justify-between gap-1 bg-inherit outline-none pl-7 max-md:pl-2.5 flex-grow pr-3 max-md:pr-2.5 rounded-r-xl max-md:text-sm">
                    <input type="number" id="pin" placeholder="PIN" name="pin" class=" md:mr-3 max-md:text-sm bg-inherit w-full outline-none" minlength="6" maxlength="6" required>
                </div>
            </div>
            <button class=" max-md:text-xs font-semibold font-Poppins text-base mt-6 w-full h-12 max-md:h-11 rounded-xl bg-base-500 text-white cursor-pointer" type="button" onclick="CheckPIN()">Change</button>
        </div>
    </div>

    <div class=" max-[559px]:w-full max-[559px]:px-14 transition-opacity opacity-0 duration-150 ease-linear hidden" id="new-password">
        <div class=" flex flex-col items-center">
            <div class=" text-base-500 font-medium text-3xl font-cursive">OUR TASK</div>
            <div class="font-sans">Task Management</div>
        </div>
        <div class=" mt-16 flex w-full flex-col items-center justify-center min-[560px]:w-112 max-[390px]:mt-12">
            <div class=" font-semibold font-Poppins text-base max-md:text-sm">Change Password</div>
            <form class="w-full flex flex-col items-center" action="<?= BASEURL ?>login/register" method="post">

                <div class=" dark:bg-700  flex mt-5 border-solid border border-200 dark:border-500 rounded-xl h-12 max-md:h-11 w-full">
                    <div class=" flex justify-center items-center bg-base-500  box-border h-full w-12 max-md:w-11 rounded-s-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                            <path d="M7.07588 0.731476C9.63316 0.731476 11.6908 2.7438 11.6908 5.22815V6.50593C13.1261 6.95394 14.1719 8.25326 14.1719 9.80515V13.9192C14.1719 15.8405 12.5791 17.3981 10.6154 17.3981H3.56258C1.59805 17.3981 0.00524902 15.8405 0.00524902 13.9192V9.80515C0.00524902 8.25326 1.05187 6.95394 2.48632 6.50593V5.22815C2.49479 2.7438 4.55247 0.731476 7.07588 0.731476ZM7.08435 10.2184C6.67789 10.2184 6.34765 10.5413 6.34765 10.9388V12.7773C6.34765 13.183 6.67789 13.506 7.08435 13.506C7.49927 13.506 7.82952 13.183 7.82952 12.7773V10.9388C7.82952 10.5413 7.49927 10.2184 7.08435 10.2184ZM7.09282 2.18068C5.37385 2.18068 3.97666 3.53879 3.96819 5.21159V6.32623H10.209V5.22815C10.209 3.54707 8.81178 2.18068 7.09282 2.18068Z" fill="white" />
                        </svg>
                    </div>
                    <div class=" flex-grow flex items-center justify-between gap-1 bg-inherit outline-none pl-7 max-md:pl-2.5 flex-grow pr-3 max-md:pr-2.5 rounded-r-xl max-md:text-sm">
                        <input type="password" id="password" placeholder="New Password" name="password" class=" md:mr-3 max-md:text-sm bg-inherit w-full outline-none" minlength="8" required>
                        <!-- <span class="material-symbols-outlined" id="toggleIcon">&#xe8f5;</span> -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000" class="material-symbols-outlined" id="toggleIcon">
                            <path id="toogleOff" class=" fill-black dark:fill-white" d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                            <path style="display: none;" class=" fill-black dark:fill-white" id="toogleOn" d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                        </svg>
                    </div>
                </div>

                <div class=" dark:bg-700  flex mt-5 border-solid border border-200 dark:border-500 rounded-xl h-12 max-md:h-11 w-full">
                    <div class=" flex justify-center items-center bg-base-500  box-border h-full w-12 max-md:w-11 rounded-s-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                            <path d="M7.07588 0.731476C9.63316 0.731476 11.6908 2.7438 11.6908 5.22815V6.50593C13.1261 6.95394 14.1719 8.25326 14.1719 9.80515V13.9192C14.1719 15.8405 12.5791 17.3981 10.6154 17.3981H3.56258C1.59805 17.3981 0.00524902 15.8405 0.00524902 13.9192V9.80515C0.00524902 8.25326 1.05187 6.95394 2.48632 6.50593V5.22815C2.49479 2.7438 4.55247 0.731476 7.07588 0.731476ZM7.08435 10.2184C6.67789 10.2184 6.34765 10.5413 6.34765 10.9388V12.7773C6.34765 13.183 6.67789 13.506 7.08435 13.506C7.49927 13.506 7.82952 13.183 7.82952 12.7773V10.9388C7.82952 10.5413 7.49927 10.2184 7.08435 10.2184ZM7.09282 2.18068C5.37385 2.18068 3.97666 3.53879 3.96819 5.21159V6.32623H10.209V5.22815C10.209 3.54707 8.81178 2.18068 7.09282 2.18068Z" fill="white" />
                        </svg>
                    </div>
                    <div class=" flex-grow flex items-center justify-between gap-1 bg-inherit outline-none pl-7 max-md:pl-2.5 flex-grow pr-3 max-md:pr-2.5 rounded-r-xl max-md:text-sm">
                        <input type="password" id="confirm-password" placeholder="Confirm Password" name="cnfrmpass" class=" md:mr-3 max-md:text-sm bg-inherit w-full outline-none" minlength="8" required>
                        <!-- <span class="material-symbols-outlined" id="toggleIcon-2">&#xe8f5;</span> -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000" class="material-symbols-outlined" id="toggleIcon-2">
                            <path class=" fill-black dark:fill-white" id="toogleOff-2" d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                            <path style="display: none;" class=" fill-black dark:fill-white" id="toogleOn-2" d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                        </svg>
                    </div>
                </div>
                <button class=" max-md:text-xs font-semibold font-Poppins text-base mt-6 w-full h-12 max-md:h-11 rounded-xl bg-base-500 text-white cursor-pointer" type="submit">Change</button>
            </form>
        </div>
    </div>
    <script>
        var passwordToogleIcon = document.getElementById('toggleIcon');
        var toogleOn = document.getElementById('toogleOn');
        var toogleOff = document.getElementById('toogleOff');
        var password = document.getElementById('password');
        var hidden = true;

        passwordToogleIcon.addEventListener('click', function() {
            if (hidden) {
                password.type = 'text';
                // passwordToogleIcon.innerHTML = '&#xe8f4;';
                toogleOff.setAttribute('style', "display: none;");
                toogleOn.removeAttribute('style');
                hidden = false
            } else {
                password.type = 'password';
                // passwordToogleIcon.innerHTML = '&#xe8f5;';
                toogleOff.setAttribute('style', "display: none;");
                toogleOn.removeAttribute('style');
                hidden = true;
            }
        });

        var passwordToogleIcon2 = document.getElementById('toggleIcon-2');
        var toogleOn2 = document.getElementById('toogleOn-2');
        var toogleOff2 = document.getElementById('toogleOff-2');
        var password2 = document.getElementById('confirm-password');
        var hidden2 = true;

        passwordToogleIcon2.addEventListener('click', function() {
            if (hidden2) {
                password2.type = 'text';
                // passwordToogleIcon2.innerHTML = '&#xe8f4;';
                toogleOff2.setAttribute('style', "display: none;");
                toogleOn2.removeAttribute('style');
                hidden2 = false
            } else {
                password2.type = 'password';
                // passwordToogleIcon2.innerHTML = '&#xe8f5;';
                toogleOff2.setAttribute('style', "display: none;");
                toogleOn2.removeAttribute('style');
                hidden2 = true;
            }
        });

        function CheckPIN() {
            var inputPin = document.getElementById('pin').value;
            // if(value == pin){
            document.getElementById('pin').classList.add('hidden');
            setInterval(() => {
                document.getElementById('new-password').classList.remove('hidden');
                document.getElementById('new-password').classList.remove('opacity-0');
            }, 300);
            // }
        }
    </script>
</body>

</html>