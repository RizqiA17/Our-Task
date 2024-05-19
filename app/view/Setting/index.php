<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="<?=BASEURL?>css//output.css" rel="stylesheet">
    <link rel="icon" href="" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" media="(prefers-color-scheme: dark)">
</head>

<body class="bg-base-500 dark:bg-600 dark:text-50">
    <div class="" style="margin: 40px 20px 10px 20px;">
        <a onclick="window.history.back(); "class="absolute">
            <div class="w-[45px] h-[40px] center bg-white dark:bg-700 rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                    <rect fill="none" height="24" width="24" />
                    <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
                </svg>
            </div>
        </a>
        <div class=" text-white font-bold " style="width: 100%; text-align: center;">Settings</div>
    </div>


    <div class="bg-white dark:bg-800 w-[100%] h-full mt-14 pt-10 rounded-t-3xl">


        <div class="px-7 py-10 h-[700px] ">
            <!--  -->
            <a href="<?=BASEURL?>setting/notification">
                <div class="flex my-8 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="36px" fill="#006EE9">
                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                    </svg>
                    <div class="ml-3">Notification</div>
                </div>
            </a>
            <!--  -->
            <div class="flex my-8 items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="36px" fill="#006EE9">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                </svg>
                <div class="ml-3">Security</div>
            </div>
            <!--  -->
            <div class="flex my-8 items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="36px" fill="#006EE9">
                    <path d="M0 0h24v24H0z" fill="none" opacity=".1" />
                    <path d="M12 1c-4.97 0-9 4.03-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h4v1h-7v2h6c1.66 0 3-1.34 3-3V10c0-4.97-4.03-9-9-9z" />
                </svg>
                <div class="ml-3">Help</div>
            </div>
            <!--  -->
            <div class="flex my-8 items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="36px" fill="#006EE9">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                </svg>
                <div class="ml-3">About</div>
            </div>

</body>

</html>