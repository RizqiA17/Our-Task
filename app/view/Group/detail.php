<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>css/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Group Project Name</title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="h-svh w-svh bg-bg-light dark:bg-bg-dark p-10">

    <!-- Top -->
    <div class="flex justify-between items-center w-full">
        <span class="material-symbols-outlined dark:text-gray-400 h-6 w-6">keyboard_backspace</span>
        <h1 class=" dark:text-gray-400 font-semibold text-xl">Group Project</h1>
        <a href="<?=BASEURL?>group" class="material-symbols-outlined dark:text-gray-400 h-6 w-6">edit</a>
    </div>

    <!-- Detail -->
    <h2 class=" mt-6  font-bold text-2xl capitalize dark:text-white mb-6">Judul Tugas</h2>
    <div class="w-full flex max-[712px]:flex-col flex-row gap-6 mb-12">

        <!-- Description -->
        <div class="w-full">
            <p class=" text-slate-600 dark:text-gray-400 max-h-24 overflow-hidden overflow-y-auto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit autem voluptas, hic optio eligendi ea eveniet ipsum eaque, nesciunt itaque quisquam sequi amet corporis ratione reiciendis perferendis perspiciatis consequuntur cum.</p>
        </div>

        <!-- Info Task -->
        <div class=" flex flex-row justify-between w-full">
            <div class="">
                <h3 class="text-slate-400 font-normal">Assigned to</h3>
                <div class="flex mt-1">
                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="w-8 h-8 rounded-full border-2 border-white dark:border-bg-dark justify-center box-border ">
                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="w-8 h-8 rounded-full -ml-3 border-2 border-white dark:border-bg-dark justify-center box-border ">
                </div>
            </div>
            <div class="">
                <h3 class="text-slate-400 font-normal">Due date</h3>
                <p class="text-sm dark:text-white">Thursday, 20 July 2023</p>
            </div>
        </div>
    </div>

    <!-- Subtask -->
    <div class="border-2 border-gray-300 dark:border-gray-600 rounded-xl w-full h-28 flex p-4 justify-between">
        <div class=" flex flex-col justify-center h-full">
            <h3 class=" text-gray-600 dark:text-gray-400 text-xl">Title Subtask</h3>
            <div class="flex pt-2.5">
                <img src="<?= BASEURL ?>image/Profil.png" alt="" class="w-8 h-8 rounded-full border-2 border-white dark:border-bg-dark justify-center box-border ">
                <img src="<?= BASEURL ?>image/Profil.png" alt="" class="w-8 h-8 rounded-full -ml-3 border-2 border-white dark:border-bg-dark justify-center box-border ">
                <img src="<?= BASEURL ?>image/Profil.png" alt="" class="w-8 h-8 rounded-full -ml-3 border-2 border-white dark:border-bg-dark justify-center box-border ">
            </div>
        </div>
        <div class="h-full flex items-center text-gray-600 dark:text-gray-400">
            <span class="material-symbols-outlined">
                Flag
            </span>
            25 Hari
        </div>
    </div>
</body>

</html>