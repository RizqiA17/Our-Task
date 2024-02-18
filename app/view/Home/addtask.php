<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
</head>

<body>
    <form action="<?=BASEURL?>/home/addnewtask" method="post" class="add-task-form">
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
                    <input type="text" name="title" class="task-title">
                    </input>
                </div>
                <div class="task-detail" style=" margin-bottom: 10px;">
                    <label for="">Detail Task</label>
                    <textarea name="detail"></textarea>
                </div>
                <div class="task-setting">
                    <div class="set-deadline sett">
                        <label for="">Deadline</label>
                        <input type="date" name="deadline">
                    </div>
                    <div class="task-file sett">
                        <label for="">File</label>
                        <input type="file" class="file-task" name="file-name">
                    </div>
                    <div class="task-mode sett">
                        <label for="">Task Mode</label>
                        <select id="" name="mode">
                            <option value="Solo">Solo</option>
                            <option value="Group">Group</option>
                        </select>
                    </div>
                    <div class="select-kelas sett">
                        <label for="">Kelas</label>
                        <select id="" name="kelas">
                            <option value="1">PPLG 1</option>
                            <option value="2">PPLG 2</option>
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
        <div class="bottom">
            <button type="submit">Add</button>
        </div>
    </form>
    <script>
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