<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
</head>

<body>
    <form action="addnewtask" method="post" class="add-task-form" enctype="multipart/form-data">
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
                <div class="task-setting" style="justify-content: space-around">
                    <div class="set-deadline sett">
                        <label for="">Deadline</label>
                        <input type="date" name="deadline" required>
                    </div>
                    <div class="task-file sett">
                        <label for="">Image</label>
                        <input type="file" accept="image/*" class="file-task" name="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="header hide" id="selectLeader">
            <input type="hidden" name="leader" id="leader">
            Select Leader
        </div>
        <div class="list-murid" style=" margin-top: 32px">
            <?php
            foreach ($data['member_group'] as $member) {
            ?>
                <div>
                    <label for=""><input type="checkbox" name="leader-list" id="<?= $member['id_profile'] ?>" value="<?= $member['id_profile'] ?>"><?= $member['name'] ?> </label>
                </div>
            <?php
            }
            ?>
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
            // alert(leader)
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