<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="http://localhost/ourtaskmvc/public/css/output.css" rel="stylesheet">
    <link rel="icon" href="" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" media="(prefers-color-scheme: dark)">
    <style>
        body {
            margin: 30px 20px 20px 20px;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        #calendar-container {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none;
            -ms-overflow-style: none;
            overflow: hidden;
        }

        table {
            border-collapse: collapse;
            width: 3500px;
        }

        td {
            border: none;

            padding: 8px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Animasi transisi */
        }

        th {
            background-color: #006EE9;
        }

        #date-selector {
            margin-right: 10px;
        }

        .background-blue {
            background-color: #006EE9;
            transition: background-color 0.3s ease;
            /* Animasi transisi */
        }

        .hide {
            display: none;
        }

        /* Animasi geser ke tengah */
        @keyframes scrollAnimation {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>
</head>

<body>
    <div class="back" style="position: absolute; cursor: pointer;" onclick="window.history.back()">
        <svg class="chevron-down-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 6L8 12L14 18" stroke="#363942" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <h3 style="text-align: center;">Calendar</h3>

    <div id="date-selector">
        <select id="monthSelector" onchange="setMonth(value)" style="border: none; font: 600 20px 'Poppins',sans-serif; margin: 20px 0 10px 0;">
            <?php
            echo '<option hidden disabled selected value="' . date('n') . '">' . date('F') . '</option>';
            for ($i = 1; $i <= 12; $i++) {
                $month_name = date('F', mktime(0, 0, 0, $i, 1, 2011));
                echo '<option value="' . $i . '">' . $month_name . '</option>';
            } ?>
        </select>

    </div>

    <div id="calendar-container"></div>

    <div class="">
        <!-- 2 -->
        <?php
        foreach ($data['task_solo'] as $task) {
        ?>
            <form action="../solo/detail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>
            <div class="hide flex items-center pl-3 rounded-md h-[60px] shadow-lg mt-5" onclick="post(<?= $task['id_task'] ?>)" id="<?= date('n', strtotime($task['tgl_dibuat'])) . date('j', strtotime($task['tgl_dibuat'])) ?>">
                <div class="text-[#363942] "><?= $task['mapel'] ?></div>
                <div class="flex items-center justify-between rounded-md h-[60px] ml-3 pr-3 bg-white shadow-md  w-[100%]">
                    <div class="px-3">
                        <div class="text-black "><?= $task['name'] ?></div>
                        <div class="text-[#a6a6a6e9] "><?= date('j  Y', strtotime($task['tgl_deadline'])) ?></div>
                    </div>

                </div>
            </div>
        <?php } ?>
        <?php
        foreach ($data['task_group'] as $task) {
        ?>
            <form action="../Group/detail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>
            <div class="hide flex items-center pl-3 rounded-md h-[60px] shadow-lg mt-5" onclick="post(<?= $task['id_task'] ?>)" id="<?= date('n', strtotime($task['tgl_dibuat'])) . date('j', strtotime($task['tgl_dibuat'])) ?>">
                <div class="text-[#363942] "><?= $task['mapel'] ?></div>
                <div class="flex items-center justify-between rounded-md h-[60px] ml-3 pr-3 bg-white shadow-md  w-[100%]">
                    <div class="px-3">
                        <div class="text-black "><?= $task['name'] ?></div>
                        <div class="text-[#a6a6a6e9] "><?= date('j M Y', strtotime($task['tgl_deadline'])) ?></div>
                    </div>

                </div>
            </div>
        <?php } ?>
        <!-- 2 -->


    </div>

    <script>

        function post(id) {
            var idformname = "form-" + id;
            var idform = document.getElementById(idformname);
            var idtask = document.getElementById("task-" + id)
            // alert(idtask.value)
            idform.submit(idtask)
        }

        function generateCalendar(year, month) {
            const firstDay = new Date(year, month - 1, 1);
            const lastDay = new Date(year, month, 0);
            const daysInMonth = lastDay.getDate();

            const calendarContainer = document.getElementById('calendar-container');
            calendarContainer.innerHTML = '';

            const table = document.createElement('table');
            const thead = document.createElement('thead');
            const tbody = document.createElement('tbody');

            const firstDayOfWeek = firstDay.getDay();
            let currentDay = 1;

            const row = document.createElement('tr');
            for (let i = 0; i < daysInMonth; i++) {
                // for (let j = 0; j < daysInMonth; j++) {
                const td = document.createElement('td');
                const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                // Create the row for day names
                const dayNamesRow = document.createElement('div');
                for (const dayName of dayNames) {
                    const th = document.createElement('div');
                    th.textContent = dayName;
                    td.appendChild(th);
                }
                thead.appendChild(dayNamesRow);
                td.id = currentDay;
                td.addEventListener('click', function() {
                    handleTdClick(td.id);
                });

                // if (i === 0 && j < firstDayOfWeek) {
                //     td.textContent = '';
                // } else 
                if (currentDay > daysInMonth) {
                    break;
                } else {
                    td.textContent = currentDay;
                    currentDay++;
                }
                row.appendChild(td);
            }
            tbody.appendChild(row);
            // }

            table.appendChild(thead);
            table.appendChild(tbody);
            calendarContainer.appendChild(table);
        }

        function handleScroll(e) {
            const delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            const container = document.getElementById('calendar-container');
            container.scrollLeft -= delta * 40;
        }

        function updateCalendar() {
            const monthSelector = document.getElementById('monthSelector');
            const selectedMonth = parseInt(monthSelector.value, 10);

            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();

            generateCalendar(currentYear, selectedMonth);
        }

        const container = document.getElementById('calendar-container');
        container.addEventListener('wheel', handleScroll);

        function handleTdClick(tdId) {
            const day = document.getElementById(tdId);

            // Menghapus kelas 'background-blue' dari semua elemen td
            const allTds = document.querySelectorAll('td');
            allTds.forEach(td => {
                td.classList.remove('background-blue', 'selected');
            });

            // Menambahkan kelas 'background-blue' pada elemen td yang diklik
            day.classList.add('background-blue', 'selected');

            // Mengatur fokus atau scroll sehingga elemen berada di tengah dengan animasi
            const container = document.getElementById('calendar-container');
            const containerRect = container.getBoundingClientRect();
            const dayRect = day.getBoundingClientRect();
            const offset = dayRect.left - containerRect.left - (containerRect.width - dayRect.width) / 2;
            // alert(offset);
            container.scrollBy({
                left: offset,
                behavior: 'smooth'
            });

            // Menambahkan kelas 'scroll-animation' untuk animasi geser
            // container.style.transition = 'transform 0.5s ease-out';
            // container.style.transform = 'translateX(' + -offset + 'px)';


            // Menghapus kelas 'scroll-animation' setelah animasi selesai
            // setTimeout(() => {
            //     container.style.transition = '';
            // }, 500);

            // Menghapus kelas 'selected' setelah animasi transisi selesai
            // setTimeout(() => {
            //     day.classList.remove('selected');
            // }, 500);
            list(tdId)
        }
    </script>
</body>

</html>