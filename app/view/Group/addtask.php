<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="<?= BASEURL ?>css/detail.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/output.css">
    <style>
        input[type='file']::file-selector-button {
            background-color: #b5b5b5;
            outline: 1px solid;
            border: none;
            padding: 8px;
            cursor: pointer;
            border-radius: 2px;
        }

        @media(prefers-color-scheme: dark) {
            input[type='file']::file-selector-button {
                background-color: #6b6b6b;
            }
        }
    </style>
    <title>Task Details</title>
</head>

<body class="bg-white dark:bg-800 h-full overflow-x-hidden">

    <div class="flex-col flex justify-between items-center">
        <div class="flex justify-center items-center m-9">
            <div class=" font-semibold uppercase font-['Poppins',_sans-serif] text-2xl text-800 dark:text-100">
                Add Task
            </div>
            <div class="absolute left-8 cursor-pointer" onclick="window.history.back()">
                <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class=" fill-900 dark:fill-100" d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" />
                </svg>
            </div>
        </div>
    </div>

    <form action="<?= BASEURL ?>group/addnewtask" method="post" class="add-task-form" enctype="multipart/form-data">
        <div class=" h-[calc(100%_-_104px)] text-800 dark:text-100 w-screen flex flex-col justify-start p-5 bg-inherit rounded-t-3xl">
            <div class="relative font-semibold text-2xl font-['Poppins',_sans-serif]">
                <label class=" text-inherit" for="">Title</label>
                <input type="text" name="title" class="text-800 dark:text-100 dark:outline-none mb-2.5 bg-50 outline-[0.5px] outline dark:bg-700 border-none rounded-sm box-border p-1 w-full" required>
            </div>
            <div class="font-medium text-xl font-['Poppins',_sans-serif] mb-2.5">
                <label class="text-inherit" for="">Detail Task</label>
                <textarea class=" resize-none mb-2.5 h-36 box-border border-none rounded-sm text-800 dark:text-100 mb-2.5 bg-50 outline-[0.5px] outline dark:outline-none dark:bg-700 border-none rounded-sm box-border p-1 w-full" required name="detail"></textarea>
            </div>
            <div class="grid gap-5 grid-cols-[repeat(auto-fit,_minmax(208px,_1fr))] grid-cols-1">
                <div class="flex flex-col">
                    <label for="deadline">Deadline</label>
                    <input id="deadline" class=" bg-50 outline-[0.5px] dark:outline-none outline dark:bg-700 w-full h-10 box-border p-2 rounded-sm text-300" type="date" min="<?= date('Y-m-d', time()) . 'T' . date('H:i:s', time()) ?>" name="deadline" value="<?= date('Y-m-d', time()) ?>">
                </div>
                <div class="flex flex-col max-[704px]:col-span-1 min-[932px]:col-span-1 col-span-full">
                    <label for="">Image</label>
                    <input type="file" class=" bg-50 dark:outline-none outline-[0.5px] outline dark:bg-700 w-full h-10 box-border rounded-sm text-300" accept="image/*" class="file-task" name="image">
                </div>
            </div>
            <div class=" w-full text-center font-semibold text-xl mt-5" id="selectLeader">
                <input type="hidden" class="text-inherit" name="leader" id="leader">
                Assigned To
            </div>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] mt-6">
                <?php
                foreach ($data['member_group'] as $member) {
                ?>
                    <div>
                        <label for=""><input type="checkbox" name="leader-list" id="<?= $member['id_profile'] ?>" value="<?= $member['id_profile'] ?>"> &ThinSpace; <?= $member['name'] ?> </label>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


        <div class="bottom">
            <button onclick="getLeader()" type="submit">Add</button>
        </div>
    </form>
    <script>
        var leader = '';

        function getLeader() {
            var checkbox = document.getElementsByName("leader-list");

            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    leader += checkbox[i].value + ',';
                }
            }
            alert(leader)
            document.getElementById('leader').value = leader
        }

        function groupLeader() {
            if (document.getElementById('task-mode').value == 'Solo') {
                document.getElementById('selectLeader').classList.add("hide");
                document.getElementById('class' + 1).classList.add("hide");
            } else {
                document.getElementById('selectLeader').classList.remove("hide");
                document.getElementById('class' + 1).classList.remove("hide");
            }
        }

        function selectClass(kelas) {
            var i = 1
            for (i = 1; i <= 20; i++) {
                if (i == kelas) {
                    idkelas = "class" + kelas;
                    document.getElementById(idkelas).classList.remove("hide");
                } else {
                    idkelas2 = "class" + i;
                    document.getElementById(idkelas2).classList.add("hide");
                }
            }
        }

        setInterval(function() {
            var h1 = document.querySelector(".header");
            var h2 = document.querySelector(".task-title");
            var h3 = document.querySelector(".task-detail");

            var h4 = h1.offsetHeight + 75;
            var h5 = h2.offsetHeight + 50;
            var h6 = h3.offsetHeight;

            var h = h4 + h5 + h6;

            document.querySelector(".task").style.height = "calc(100vh - " + h + "px)";
        }, 1000);
    </script>
</body>

</html>