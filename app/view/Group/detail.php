<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-card {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            width: 80%;
            height: 60vh;

        }

        /* Modal Content/Box */
        .modal-content {
            display: grid;
            grid-template-columns: auto auto;
            overflow: hidden;
            overflow-y: auto;
            height: calc(100% - 120px);
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body style="max-width: 100%;">
    <div class="header">
        <div class="title">
            Group Project
        </div>
        <div class="back" onclick="window.history.back()">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" fill="#363942" />
            </svg>
        </div>
    </div>
    <div class="container">
        <?php foreach ($data['task'] as $task) { ?>
            <div class="title" style="margin-bottom: 10px; padding: 5px; width: 100%;"><?= $task['name'] ?></div>
            <div class="task-detail">
                <div style="margin-bottom: 10px; height: fit-content; width: 100%; border: solid 1px gray; border-radius: 5px; box-sizing: border-box; padding: 5px;"><?= $task['description'] ?></div>
                <div style="font: 200 14px 'Poppins',sans-serif; color: black;">
                    Due date: <?= date('l, j M Y') ?>
                </div>
            </div>
            <?php if ($data['task'][0]['id_leader'] != null) { ?>
                <div style="font: 400 20px 'Poppins',sans-serif; margin-top: 30px;">Member</div>
                <div style="display: flex; align-items: center;">
                    <!-- <img class="member-img" src="<?= BASEURL ?>image/<?= $task['pp_name'] ?>" alt="" style="height: 40px; width: 40px; margin: 10px;" style="display: flex; align-items: center; justify-content: center; font-size: 25px; box-sizing: border-box; border: dotted 3px; height: 40px; width: 40px;"> -->
                    <?php
                    foreach ($data['member'] as $member) { ?>
                        <img class="member-img" src="<?= BASEURL ?>image/<?= $task['pp_name'] ?>" alt="" style="height: 40px; width: 40px; margin: 10px;" style="display: flex; align-items: center; justify-content: center; font-size: 25px; box-sizing: border-box; border: dotted 3px; height: 40px; width: 40px;">
                    <?php } ?>
                    <?php if ($task['id'] == $task['id_profile'] || sizeof($data['member']) < floor($data['group_lenght'])) { ?>
                        <div id="Add-Member" class="modal">
                            <div class="modal-card">
                                <!-- Modal content -->
                                <span class="close">×</span>
                                <p>Add Member</p>
                                <form action="addMember" method="post">
                                    <input type="hidden" name="addMember" id="addMemberValue" value="">
                                    <div class="modal-content">
                                        <?php foreach ($data['notmember'] as $getmember) { ?>
                                            <div style="display: flex; gap: 10px; align-items: center">
                                                <div class="">
                                                    <input onchange="totalAddMember(<?= $getmember['id_profile'] ?>)" type="checkbox" name="membernogroup" value="<?= $getmember['id_profile'] ?>" id="<?= $getmember['id_profile'] ?>">
                                                </div>
                                                <?= $getmember['name'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <button onclick="getValue()" type="submit" style="background-color: rgba(62, 74, 222, 1); color: white; border: none; height: 30px; width: 100%; margin-top: 30px; border-radius: 10px;">Add Member</button>
                                </form>
                            </div>
                        </div>
                    <?php }
                    if (sizeof($data['member']) < floor($data['group_lenght'])) {
                    ?>
                        <button class="member-img" style="display: flex; align-items: center; justify-content: center; font-size: 25px; border-radius: 100%; box-sizing: border-box; border: dotted 3px; height: 40px; width: 40px;" id="Add-member-btn">+</button>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div style="font: 400 20px 'Poppins',sans-serif; margin-top: 30px;">Your not in any Group, contact your leader group</div>
            <?php } ?>
    </div>
    <div class="task" style="font: 400 20px 'Poppins',sans-serif; overflow: hidden; overflow-y: auto; margin-top: 30px; ">Task
        <?php foreach ($data['subtask'] as $subtask) { ?>
            <div>
                <form action="subdetail" method="post">
                    <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <input type="hidden" name="id_task" value="<?= $subtask['id'] ?>">
                            <button type="submit" style="border: solid 2px; height: 25px; width: 25px; border-radius: 100%; cursor: pointer">
                                <!-- <div class="member-img checked none">
                                    <svg class="check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.9422 6.06717L7.94217 16.0672C7.88412 16.1253 7.81519 16.1714 7.73932 16.2028C7.66344 16.2343 7.58212 16.2505 7.49998 16.2505C7.41785 16.2505 7.33652 16.2343 7.26064 16.2028C7.18477 16.1714 7.11584 16.1253 7.05779 16.0672L2.68279 11.6922C2.56552 11.5749 2.49963 11.4158 2.49963 11.25C2.49963 11.0841 2.56552 10.9251 2.68279 10.8078C2.80007 10.6905 2.95913 10.6246 3.12498 10.6246C3.29083 10.6246 3.44989 10.6905 3.56717 10.8078L7.49998 14.7414L17.0578 5.18279C17.1751 5.06552 17.3341 4.99963 17.5 4.99963C17.6658 4.99963 17.8249 5.06552 17.9422 5.18279C18.0594 5.30007 18.1253 5.45913 18.1253 5.62498C18.1253 5.79083 18.0594 5.94989 17.9422 6.06717Z" fill="white" />
                                    </svg>
                                </div> -->
                            </button>
                            <div style="margin-left: 30px;"><?= $subtask['name'] ?>
                                <div style="display: flex; align-items: center; font-size: 18px; margin-top: 5px;">
                                    <svg style="margin-right: 10px;" class="flag" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.5">
                                            <path d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z" fill="black" />
                                        </g>
                                    </svg>
                                    <?= date('j M Y', strtotime($subtask['deadline'])) ?>
                                </div>
                            </div>
                        </div>
                        <div style="padding-right: 10px;">
                            <img src="person1.jpeg" class="member-img" alt="">
                            <img src="person1.jpeg" class="member-img" alt="">
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>

<?php } ?>
</div>
<form action="addtask">
    <button style="background-color: rgba(62, 74, 222, 1); color: white; border: none; height: 30px; width: 100%; margin-top: 30px; border-radius: 10px;">
        Add New Task
    </button>
</form>
<script>
    // Get the modal
    var modal = document.getElementById("Add-Member");

    // Get the button that opens the modal
    var btn = document.getElementById("Add-member-btn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "flex";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    var i = <?= sizeof($data['member']); ?>

    function totalAddMember(id) {
        member = id;
        // alert(i)
        if (document.getElementById(id).checked) {
            if (i < Math.floor(<?= $data['group_lenght'] ?>)) {
                i++
            } else {
                alert("Anggota telah mencapai batas")
                document.getElementById(id).checked = false
            }
        } else {
            i--
        }
        alert(i)
    }

    function getValue() {
        var membernogroup = ''
        // if(document.getElementsByName("membernogroup").length > 0){
        //     alert("berhasil")
        // }
        for (var a = 0; a < document.getElementsByName("membernogroup").length; a++) {
            if (document.getElementsByName("membernogroup")[a].checked) {
                membernogroup += document.getElementsByName("membernogroup")[a].value + ","
                alert(membernogroup)
                document.getElementById("addMemberValue").value = membernogroup
            }
        }
    }

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