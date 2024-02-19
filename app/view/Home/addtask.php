<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
</head>

<body>
    <form action="<?= BASEURL ?>/home/addnewtask" method="post" class="add-task-form" enctype="multipart/form-data">
        <div class="top">
            <div class="header">
                <div class="title">
                    Add Tugas
                </div>
                <div class="back" onclick="window.history.back()">
                    <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" fill="#363942" />
                    </svg>
                </div>
            </div>
            <div class="container">
                <div class="title">
                    <label for="">Title</label>
                    <input type="text" name="title" class="task-title" required>
                    </input>
                </div>
                <div class="task-detail" style=" margin-bottom: 10px;">
                    <label for="">Detail Task</label>
                    <textarea required name="detail"></textarea>
                </div>
                <div class="task-setting">
                    <div class="set-deadline sett">
                        <label for="">Deadline</label>
                        <input type="date" name="deadline" required>
                    </div>
                    <div class="task-file sett">
                        <label for="">Image</label>
                        <input type="file" accept="image/*" class="file-task" name="image">
                    </div>
                    <div class="task-mode sett">
                        <label for="">Task Mode</label>
                        <select id="task-mode" name="mode" onchange="groupLeader()">
                            <option value="Solo">Solo</option>
                            <option value="Group">Group</option>
                        </select>
                    </div>
                    <div class="select-kelas sett">
                        <label for="">Kelas</label>
                        <select id="kelas" name="kelas" onchange="selectClass(value)">
                            <?php foreach ($data['kelas'] as $kelas) { ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['grade'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- <div style="font: 400 18px 'Poppins',sans-serif; margin-top: 10px;">
                    Leader Group
                    <div style="margin-bottom: 20px; display: flex; align-items: center; overflow: hidden; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; ::-webkit-scrollbar{display: none;}">
                        <img class="member-img leader" src="person1.jpeg" alt="">
                        <div class="member-img leader">+</div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="header hide" id="selectLeader">
            <input type="hidden" name="leader" id="leader">
            Select Leader
        </div>
        <?php
        $absen = 0;
        $id_kelas = 0;
        do {
        ?>
            <div class="hide list-murid" id="class<?= $id_kelas + 1; ?>">
                <?php
                foreach ($data['siswa' . $id_kelas] as $siswa) {
                ?>
                    <div>
                        <?php $absen++; ?>
                        <label for=""><input type="checkbox" name="leader-list" id="<?= $siswa['id_profile'] ?>" value="<?=$siswa['id_profile']?>"><?= $absen . '. ' . $siswa['name'] ?> </label>
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
        <div class="bottom">
            <button onclick="getLeader()" type="submit">Add</button>
        </div>
        <div id="delete-coma"></div>
    </form>
    <script>
        var leader='';
        function getLeader(){
            var checkbox =document.getElementsByName("leader-list");

            for(var i = 0; i < checkbox.length; i++){
                if(checkbox[i].checked){
                    leader += checkbox[i].value+',';
                }
            }
            document.getElementById("delete-coma").innerText = leader.replace(/,\s*$/, "");
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