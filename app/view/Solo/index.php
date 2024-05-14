<?php if ($_SESSION['status'] != 'guru') { ?>
    <div class="dark:bg-bg-dark flex-grow">
        <div class="px-9 py-4 box-border">
            <div class="" id='content'>
                <div class="sort-by top">
                    <div class=" font-semibold text-xl dark:text-slate-100">Lewat Deadline</div>
                    <div class="arrow">
                        <span onclick="scrollContainer('scroll-1',-1)">
                            <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span onclick="scrollContainer('scroll-1',1)">
                            <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                <script>
                    var hide = true;
                </script>
                <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-1">
                    <?php
                    foreach ($data['task'] as $task) {
                        date_default_timezone_set('Asia/Jakarta');
                        $today = new DateTime(date('Y-m-d', time()));
                        $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                        $interval = date_diff($today, $deadline);
                        if ($interval->format('%R') == '-') {
                    ?>
                            <script>
                                hide = false
                            </script>
                            <form action="solo/detail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>
                            <div class="solo list" onclick="post(<?= $task['id_task'] ?>)">
                                <div class="plain">
                                    <div class="info">
                                        <div class="task work-sans <?php if ($task['progress'] != "unfinished") ?>">
                                            <?= $task['name'] ?>
                                        </div>
                                        <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                    </div>
                                    <div class="deadline work-sans">
                                        <div class="logo">
                                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <?= $task['tgl_deadline'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else { ?>
                            <script>
                                if (hide) {
                                    var content = document.getElementById('content');
                                    content.classList.add('hide');
                                }
                            </script>
                    <?php }
                    } ?>
                </div>
            </div>
            <script>
                var hide2 = true;
            </script>
            <div class="" id="content-2">
                <div class="sort-by top">
                    <div class=" font-semibold text-xl dark:text-slate-100">Deadline Dekat</div>
                    <div class="arrow">
                        <span onclick="scrollContainer('scroll-2',-1)">
                            <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span onclick="scrollContainer('scroll-2',1)">
                            <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-2">
                    <?php foreach ($data['task'] as $task) {
                        date_default_timezone_set('Asia/Jakarta');
                        $today = new DateTime(date('Y-m-d', time()));
                        $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                        $interval = date_diff($today, $deadline);
                        // echo $interval->format('%a days');
                        if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                    ?>
                            <script>
                                hide2 = false
                            </script>
                            <form action="solo/detail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>
                            <div class="solo list" id="<?= $task['id_task'] ?>" onclick="post(<?= $task['id_task'] ?>)">
                                <div class="plain">
                                    <div class="info">
                                        <div class="task work-sans <?php if ($task['progress'] != "unfinished") echo "task-down" ?>">
                                            <?= $task['name'] ?>
                                        </div>
                                        <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                    </div>
                                    <div class="deadline work-sans">
                                        <div class="logo">
                                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <?= $task['tgl_deadline'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else { ?>
                            <script>
                                if (hide2) {
                                    var content = document.getElementById('content-2');
                                    content.classList.add('hide');
                                }
                            </script>
                    <?php
                        }
                    } ?>
                </div>
            </div>
            <script>
                var hide3 = true;
            </script>
            <div class="" id="content-3">
                <div class="sort-by top">
                    <div class=" font-semibold text-xl dark:text-slate-100">Tugas Baru</div>
                    <div class="arrow">
                        <span onclick="scrollContainer('scroll-3',-1)">
                            <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span onclick="scrollContainer('scroll-3',1)">
                            <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-3">
                    <?php foreach ($data['task'] as $task) {
                        date_default_timezone_set('Asia/Jakarta');
                        $today = new DateTime(date('Y-m-d', time()));
                        $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                        $interval = date_diff($dibuat, $today);
                        // echo $interval->format('%a days');
                        if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                    ?>
                            <Script>
                                hide3 = false
                            </Script>
                            <form action="solo/detail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>
                            <div class="solo list" id="<?= $task['id_task'] ?>" onclick="post(<?= $task['id_task'] ?>)">
                                <div class="plain">
                                    <div class="info">
                                        <div class="task work-sans <?php if ($task['progress'] != "unfinished") echo "task-down" ?>">
                                            <?= $task['name'] ?>
                                        </div>
                                        <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                    </div>
                                    <div class="deadline work-sans">
                                        <div class="logo">
                                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <?= $task['tgl_deadline'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else { ?>
                            <script>
                                if (hide3) {
                                    var content = document.getElementById('content-3');
                                    content.classList.add('hide');
                                }
                            </script>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($_SESSION['status'] == 'guru') { ?>
    <div class="dark:bg-bg-dark flex-grow">
        <div class="px-9 py-4 box-border">
            <div class="" id='content'>
                <div class="sort-by top">
                    <div class=" font-semibold text-xl dark:text-slate-100">Lewat Deadline</div>
                    <div class="arrow">
                        <span onclick="scrollContainer('scroll-1',-1)">
                            <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span onclick="scrollContainer('scroll-1',1)">
                            <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                <script>
                    var hide = true;
                </script>
                <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-1">
                    <?php
                    foreach ($data['task'] as $task) {
                        date_default_timezone_set('Asia/Jakarta');
                        $today = new DateTime(date('Y-m-d', time()));
                        $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                        $interval = date_diff($today, $deadline);
                        if ($interval->format('%R') == '-') {
                    ?>
                            <script>
                                hide = false
                            </script>
                            <div class="list solo" ">
                                        <div class=" plain">
                                <div class="info">
                                    <div class="task work-sans">
                                        <?= $task['name'] ?>
                                    </div>
                                    <div class="mapel work-sans">
                                        <?= $task['grade'] ?>
                                    </div>
                                </div>
                                <div class="deadline work-sans">
                                    <div class="logo">
                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <?= $task['tgl_deadline'] ?>
                                </div>
                            </div>
                </div>
            <?php
                        } else { ?>
                <script>
                    if (hide) {
                        var content = document.getElementById('content');
                        content.classList.add('hide');
                    }
                </script>
        <?php }
                    } ?>
            </div>
        </div>
        <script>
            var hide2 = true;
        </script>
        <div class="" id="content-2">
            <div class="sort-by top">
                <div class=" font-semibold text-xl dark:text-slate-100">Deadline Dekat</div>
                <div class="arrow">
                    <span onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-2">
                <?php foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    // echo $interval->format('%a days');
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                ?>
                        <script>
                            hide2 = false
                        </script>
                        <div class="list solo " ">
                                        <div class=" plain">
                            <div class="info">
                                <div class="task work-sans">
                                    <?= $task['name'] ?>
                                </div>
                                <div class="mapel work-sans">
                                    <?= $task['grade'] ?>
                                </div>
                            </div>
                            <div class="deadline work-sans">
                                <div class="logo">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <?= $task['tgl_deadline'] ?>
                            </div>
                        </div>
            </div>
        <?php
                    } else { ?>
            <script>
                if (hide2) {
                    var content = document.getElementById('content-2');
                    content.classList.add('hide');
                }
            </script>
    <?php
                    }
                } ?>
        </div>
    </div>
    <script>
        var hide3 = true;
    </script>
    <div class="" id="content-3">
        <div class="sort-by top">
            <div class=" font-semibold text-xl dark:text-slate-100">Tugas Baru</div>
            <div class="arrow">
                <span onclick="scrollContainer('scroll-3',-1)">
                    <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span onclick="scrollContainer('scroll-3',1)">
                    <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-3">
            <?php foreach ($data['task'] as $task) {
                date_default_timezone_set('Asia/Jakarta');
                $today = new DateTime(date('Y-m-d', time()));
                $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                $interval = date_diff($dibuat, $today);
                // echo $interval->format('%a days');
                if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
            ?>
                    <Script>
                        hide3 = false
                    </Script>
                    <div class="list solo " ">
                                        <div class=" plain">
                        <div class="info">
                            <div class="task work-sans">
                                <?= $task['name'] ?>
                            </div>
                            <div class="mapel work-sans">
                                <?= $task['grade'] ?>
                            </div>
                        </div>
                        <div class="deadline work-sans">
                            <div class="logo">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <?= $task['tgl_deadline'] ?>
                        </div>
                    </div>
        </div>
    <?php
                } else { ?>
        <script>
            if (hide3) {
                var content = document.getElementById('content-3');
                content.classList.add('hide');
            }
        </script>
<?php
                }
            } ?>
    </div>
    </div>
    </div>
    </div>
<?php } ?>
</div>
<script src="http://localhost/ourtaskmvc/public/js/script.js"></script>
<script>
    function post(id) {
        var idformname = "form-" + id;
        var idform = document.getElementById(idformname);
        var idtask = document.getElementById("task-" + id)
        // alert(idtask.value)
        idform.submit(idtask)
    }
</script>