<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="<?=BASEURL?>css/output.css" rel="stylesheet">
    <link rel="icon" href="" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" media="(prefers-color-scheme: dark)">
</head>

<body class="bg-base-500 dark:bg-600 dark:text-50">
    <div class="" style="margin: 40px 20px 10px 20px;">
    <a onclick="window.history.back(); " style="position: absolute;">
            <div class="w-[45px] h-[40px] center bg-white dark:bg-700 rounded-lg " style="display: flex;align-items: center;justify-content: center; cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="28px" viewBox="0 0 24 24" width="28px" fill="#006EE9">
                    <rect fill="none" height="24" width="24" />
                    <path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z" />
                </svg>
            </div>
        </a>
        <div class=" text-white font-bold " style="width: 100%; text-align: center;">Notification</div>
    </div>


    <div class="bg-white dark:bg-800 w-[100%] h-full mt-14 pt-10 rounded-t-3xl">
        <div class="px-7 py-10 h-[700px] ">
            <div class="mt-7">
                <div class="text-[#006EE9] font-medium">Notification Tone</div>
                <div class="">Silent</div>
            </div>
            <div class="mt-7">
                <div class="text-[#006EE9] font-medium"> Vibrate</div>
                <div class="">Off</div>
            </div>
            <div class="mt-7">
                <div class="text-[#006EE9] font-medium"> Pop up Notification</div>
                <div class="">On</div>
            </div>
            <div class="mt-7 flex items-center" style="justify-content: space-between;">
                <div class="pr-10">
                    <div class="text-[#006EE9] font-medium "> Use High Priority Notification </div>
                    <div class="">Show previews of notification at the top
                        of the screen</div>
                </div>
                <div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
            </div>
        </div>

</body>

</html>