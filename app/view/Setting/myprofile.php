<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="<?= BASEURL ?>css/output.css" rel="stylesheet">
    <link rel="icon" href="" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" media="(prefers-color-scheme: dark)">
    <style>
        input {
            outline: none;
        }

        ::-ms-reveal {
            display: none !important;
        }
    </style>
</head>

<body class="bg-base-500 dark:bg-600 dark:text-50 h-[calc(100svh_-_120px)]">
    <div class="mt-10 mb-2.5 mx-5">
        <a onclick="window.history.back(); " style="position: absolute;">
            <div class="w-[45px] h-[40px] center bg-white dark:bg-700 rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                    <rect fill="none" height="24" width="24" />
                    <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
                </svg>
            </div>
        </a>
        <div class=" text-white font-bold " style="width: 100%; text-align: center;">My Profile</div>
    </div>




    <div class="bg-white dark:bg-800 w-full h-full mt-14 pt-10 rounded-t-3xl">
        <img class="mx-auto w-[100px] " src="asset/Profil.png" alt="">


        <div class="px-7 py-10 ">
            <div class="mt-4">
                <label class="pt-10 text-[#006EE9] font-medium " for="">Name</label>
                <label type="text" class="mt-1 flex border-2 border-[#bdd3ec] dark:bg-700 rounded-lg w-[100%] px-4 py-3 text-sm "><?= $_SESSION['nama'] ?></label>
            </div>
            <br>
            Change Email
            <form action="<?= BASEURL ?>setting/ChangeEmail" method="post">
                <div class="mt-4">
                    <label class="pt-10 text-[#006EE9] font-medium " for="">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 flex border-2 dark:bg-700 border-[#bdd3ec] rounded-lg w-[100%] px-4 py-3 text-sm " placeholder="New Email">
                </div>
                <div class="mt-4">
                    <label class="pt-10 text-[#006EE9] font-medium " for="">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 flex border-2 dark:bg-700 border-[#bdd3ec] rounded-lg w-[100%] px-4 py-3 text-sm " placeholder="Enter Password to Change Email">
                </div>
                <button class="bg-[#006EE9] w-[100%] rounded-lg mt-6 h-[40px] text-white">save</button>
            </form>


        </div>

    </div>

</body>

</html>