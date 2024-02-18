<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="http://localhost/ourtaskmvc/public/css/output.css" rel="stylesheet">
    <link rel="icon" href="" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" media="(prefers-color-scheme: dark)">
    <style>
        .btn:active {
            background-color: #add3ff;
            border-radius: 5px;
            animation: click 0.5s;
        }

        @keyframes click {

            100% {
                top: 10px
            }
        }
    </style>
</head>

<body class="bg-[#006EE9] " style="overflow: hidden;">
    <div class="" style="margin: 40px 20px 10px 20px;">
        <a onclick="window.history.back(); " style="position: absolute;">
            <div class="w-[45px] h-[40px] center bg-white rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                    <rect fill="none" height="24" width="24" />
                    <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
                </svg>
            </div>
        </a>
        <div class=" text-white font-bold " style="width: 100%; text-align: center;">Profile</div>
    </div>

    <div class="w-full absolute" style="display: flex;align-items: center;justify-content: center; cursor: pointer;">
        <div class="bg-white rounded-full">
            <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="mx-auto w-[100px] ">
        </div>
    </div>
    <div class="bg-white w-[100%]  mt-14 pt-14 text-center" style="height: calc(100vh - 120px)">

        <div class="bg-white shadow-lg rounded-lg px-5 mx-5 " style="height: 100px;">
            <div class="mt-5 text-lg font-bold text-[#006EE9]"><?= $_SESSION['nama'] ?></div>
            <div class="mt-3 font-medium"><?= $_SESSION['email'] ?></div>
        </div>


        <div class="px-7 py-10 ">
            <!--  -->
            <a href="http://localhost/ourtaskmvc/public/setting/myprofile">
                <div class="flex my-8 items-center btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <div class="ml-3">My Profile</div>
                </div>
            </a>
            <!--  -->
            <a href="http://localhost/ourtaskmvc/public/setting">
                <div class="flex my-8 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                        <g>
                            <path d="M0,0h24v24H0V0z" fill="none" />
                            <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" />
                        </g>
                    </svg>
                    <div class="ml-3">Settings</div>
                </div>
            </a>
            <!--  -->
            <a href="http://localhost/ourtaskmvc/public/login">
                <div class="flex my-8 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
                    </svg>
                    <form action="http://localhost/ourtaskmvc/public/home/logout">
                        <button type="submit" method="post">
                            <div class="ml-3">Logout</div>
                        </button>
                    </form>
                </div>
            </a>
        </div>
    </div>
</body>

</html>