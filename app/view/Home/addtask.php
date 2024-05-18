<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>css/detail.css"> -->
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
    <form action="<?= BASEURL ?>home/addnewtask" method="post" class="add-task-form" enctype="multipart/form-data">
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
                    <input id="deadline" class=" bg-50 outline-[0.5px] dark:outline-none outline dark:bg-700 w-full h-10 box-border p-2 rounded-sm text-300" type="date" min="<?= date('Y-m-d', time()) . 'T' . date('H:i:s', time()) ?>" name="deadline"  value="<?= date('Y-m-d', time()) ?>">
                </div>
                <div class="flex flex-col">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" name="kelas" class=" bg-50 dark:outline-none outline-[0.5px] outline dark:bg-700 w-full h-10 box-border p-2 rounded-sm text-300" onchange="groupLeader()">
                        <?php foreach ($data['kelas'] as $kelas) { ?>
                            <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['grade'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="Toggle3">Task Mode</label>
                    <label for="Toggle3" class="dark:outline-none outline-[0.5px] outline inline-flex items-center h-10 w-full rounded-sm cursor-pointer bg-50 dark:bg-700 text-300">
                        <input id="Toggle3" type="checkbox" name="group" class="hidden peer" onchange="groupLeader()">
                        <span class=" h-full w-1/2 rounded-l-sm bg-200 dark:bg-400 peer-checked:bg-inherit text-center content-center">Solo</span>
                        <span class=" h-full w-1/2 rounded-r-sm bg-inherit peer-checked:bg-200 peer-checked:dark:bg-400 text-center content-center">Group</span>
                    </label>
                    <!-- <select id="task-mode" class="dark:bg-700 w-full h-10 box-border p-2 w-full rounded-sm text-300" name="mode" onchange="groupLeader()">
                        <option value="Solo">Solo</option>
                        <option value="Group">Group</option>
                    </select> -->
                </div>
                <div class="flex flex-col max-[704px]:col-span-1 min-[932px]:col-span-1 col-span-full">
                    <label for="">Image</label>
                    <input type="file" class=" bg-50 dark:outline-none outline-[0.5px] outline dark:bg-700 w-full h-10 box-border rounded-sm text-300" accept="image/*" class="file-task" name="image">
                </div>
            </div>
            <!-- <div style="font: 400 18px 'Poppins',sans-serif; margin-top: 10px;">
                    Leader Group
                    <div style="margin-bottom: 20px; display: flex; align-items: center; overflow: hidden; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; ::-webkit-scrollbar{display: none;}">
                        <img class="member-img leader" src="person1.jpeg" alt="">
                        <div class="member-img leader">+</div>
                    </div>
                </div> -->

            <div class=" w-full text-center font-semibold text-xl mt-5 hidden" id="selectLeader">
                <input type="hidden" class="text-inherit" name="leader" id="leader">
                Select Leader
            </div>
            <?php
            $absen = 0;
            $id_kelas = 0;
            do {
            ?>
                <div class="hidden grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))]" id="class<?= $id_kelas + 1; ?>">
                    <?php
                    foreach ($data['siswa' . $id_kelas] as $siswa) {
                    ?>
                        <div>
                            <?php $absen++; ?>
                            <label for=""><input type="checkbox" class=" text-nowrap" name="leader-list" id="<?= $siswa['id_profile'] ?>" value="<?= $siswa['id_profile'] ?>"><?= $absen . '. ' . $siswa['name'] ?> </label>
                        </div>
                    <?php
                        if ($absen == sizeof($data['siswa' . $id_kelas])) {
                            $absen = 0;
                            $id_kelas = $id_kelas + 1;
                        }
                    }
                    ?>
                </div>
            <?php
            } while (!empty($data['siswa' . $id_kelas]));
            ?>
        </div>
        <div class="sticky w-screen h-20 bottom-0 flex items-center bg-[rgba(144,144,144,0.25)]">
            <button class=" left-10 right-10 h-10 sticky w-[calc(100%_-_85px)] bottom-0 w-full rounded-md text-white bg-base-500" onclick="getLeader()" type="submit">Add</button>
        </div>
        <div id="delete-coma"></div>
    </form>
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                // console.log("Setiap 5 detik!");
                // alert(document.getElementById("task-mode").value);

                if (document.getElementById("task-mode").value == "Group") {
                    var kelas = document.getElementById("kelas").value
                    // alert(kelas);
                    document.getElementById("selectLeader").classList.remove('hide')
                    document.getElementById("class" + kelas).classList.remove("hide")
                }
            }, 0.1);
        });

        var leader = '';

        function getLeader() {
            var checkbox = document.getElementsByName("leader-list");

            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    leader += checkbox[i].value + ',';
                }
            }
            document.getElementById("delete-coma").innerText = leader.replace(/,\s*$/, "");
            document.getElementById('leader').value = leader
        }

        function groupLeader() {
            var kelas = document.getElementById("kelas").value
            if (document.getElementById('Toggle3').checked) {
                document.getElementById('selectLeader').classList.remove("hidden");
                for (i = 1; i <= 20; i++) {
                    if (i == kelas) {
                        idkelas = "class" + kelas;
                        document.getElementById(idkelas).classList.remove("hidden");
                    } else {
                        idkelas2 = "class" + i;
                        document.getElementById(idkelas2).classList.add("hidden");
                    }
                }
            } else {
                document.getElementById('selectLeader').classList.add("hidden");
                for (i = 1; i <= 20; i++) {
                    idkelas = "class" + i;
                    document.getElementById(idkelas).classList.add("hidden");
                }
                // document.getElementById('class' + kelas).classList.add("hide");
            }
        }

        // function selectClass(kelas) {
        //     var i = 1
        //     for (i = 1; i <= 20; i++) {
        //         if (i == kelas) {
        //             idkelas = "class" + kelas;
        //             document.getElementById(idkelas).classList.remove("hide");
        //         } else {
        //             idkelas2 = "class" + i;
        //             document.getElementById(idkelas2).classList.add("hide");
        //         }
        //     }
        // }

        // setInterval(function() {
        //     var h1 = document.querySelector(".header");
        //     var h2 = document.querySelector(".task-title");
        //     var h3 = document.querySelector(".task-detail");

        //     var h4 = h1.offsetHeight + 75;
        //     var h5 = h2.offsetHeight + 50;
        //     var h6 = h3.offsetHeight;

        //     var h = h4 + h5 + h6;

        //     document.querySelector(".task").style.height = "calc(100vh - " + h + "px)";
        // }, 1000);
    </script>
</body>

</html>