<div class="h-full">

    <!-- Student Form -->
    <?php
    if ($_SESSION['status'] != 'guru') {
    ?>

        <!-- Solo Content -->
        <div class="px-9 py-4" id="content-solo">

            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Solo Projects</h3>
                <a href="<?= BASEURL ?>solo" class=" text-xs font-normal">View All</a>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['task_solo'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7' && $total < 6) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full max-w-64 bg-white dark:bg-700 shadow-md rounded-2xl grow sm:w-96 h-36" id="<?= $task['id_task'] ?>">
                            <!-- Top -->
                            <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-100 dark:border-500">
                                <h3 class=" text-lg font-bold font-sans <?php if ($task['progress'] != "unfinished") echo "task-down" ?>">
                                    <?= $task['name'] ?>
                                    <p class=" font-normal text-sm">
                                        <?= $task['mapel'] ?>
                                    </p>
                                </h3>
                            </div>

                            <!-- Deadline -->
                            <div class=" mt-4 flex items-center font-extralight text-xs mx-6 ">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="#71839B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 font-normal text-xs">
                                    <?= $task['tgl_deadline'] ?>
                                </p>
                            </div>
                        </a>
                    <?php
                    }
                }
                if ($total == 0) { ?>
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No New Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Group Content -->
        <div class="px-9 py-4 box-border" id="content-group">

            <!-- Title -->
            <div class=" font-normal text-2xl w-full flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Group Projects</h3>
                <a href="<?= BASEURL ?>group" class=" text-xs font-normal">View All</a>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task">
                <script>
                    // var hide = true;
                </script>

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas_group'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7' && $total < 6) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class=" relative rounded-2xl h-36 w-48  shadow-md bg-white dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class=" font-medium text-base text-white"><?= $task['mapel'] ?>
                                        <p class=" font-normal text-xs"><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Bottom Items -->
                            <div class="py-4 px-5 w-48 box-border">
                                <?php
                                if ($task['id_leader'] != null) {
                                ?>

                                    <!-- Presentage -->
                                    <h3 class="font-semibold text-sm">
                                        <?= $task['progress'] ?>%
                                    </h3>

                                    <!-- Presentage Bar -->
                                    <div class="flex flex-row justify-between items-center">

                                        <!-- Bar -->
                                        <div class="h-0.5 w-25 bg-gray-200 dark:bg-gray-500 mr-5">
                                            <div class="h-0.5 from-gradient-1-start to-gradient-1-end gradient bg-gradient-to-r" style="width: <?= $task['progress'] ?>px;"></div>
                                        </div>

                                        <!-- Member Total -->
                                        <div class="flex flex-row justify-center flex-grow">
                                            <?php
                                            $memberTotal = 0;
                                            $is_lot = false;
                                            foreach ($data['group_member'] as $member) {
                                                if ($member['id_task'] == $task['id_task'] && $memberTotal < 5) {
                                                    $memberTotal++; ?>
                                                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                <?php } else if ($memberTotal >= 5) {
                                                    $memberTotal++;
                                                    $is_lot = true ?>
                                                <?php }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark"><?= $memberTotal -= 5 ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } else echo "Belum masuk Group" ?>
                            </div>
                        </a>
                    <?php
                    }
                }
                if ($total == 0) { ?>
                    <div class="h-full w-full text-center flex items-center justify-center font-bold text-5xl text-700">No New Task</div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php
    if ($_SESSION['status'] == 'guru') {
    ?>
        <!-- Solo Content -->
        <div class="px-9 py-4" id="content-solo">

            <!-- Title -->
            <div class=" font-normal text-2xl w-full flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-slate-100">Solo Projects</h3>
                <a href="<?= BASEURL ?>solo" class=" text-xs font-normal">View All</a>
            </div>

            <!-- Content -->
            <div class=" flex max-[560px]:flex-col gap-6 min-[560px]:flex-row">
                <script>
                    var hide = true;
                </script>

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['task_solo'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ($total < 2) {
                        if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                            $total++;
                ?>
                            <script>
                                hide = false
                            </script>

                            <div class="w-full bg-white dark:bg-item-dark rounded-2xl h-36" onclick="post(<?= $task['id'] ?>)" id="<?= $task['id'] ?>">
                                <form action="solo/detail" method="post" id="form-<?= $task['id'] ?>"><input type="hidden" id="task-<?= $task['id'] ?>" name="idtask" value="<?= $task['id'] ?>"></form>
                                <!-- Top -->
                                <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-50 dark:border-slate-400">
                                    <h3 class=" text-lg font-bold font-sans">
                                        <?= $task['name'] ?>
                                        <p class=" font-normal text-sm">
                                            <?= $task['grade'] ?>
                                        </p>
                                    </h3>
                                </div>

                                <!-- Deadline -->
                                <div class=" mt-4 flex items-center font-extralight text-xs mx-6 ">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="ml-3 font-normal text-xs">
                                        <?= $task['tgl_deadline'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        } else { ?>
                            <script>
                                if (hide) {
                                    var content = document.getElementById('content-solo');
                                    content.classList.add('hide');
                                }
                            </script>
                <?php }
                    }
                }

                ?>
            </div>
        </div>

        <!-- Group Content -->
        <div class="px-9 py-4 box-border" id="content-group">

            <!-- Title -->
            <div class=" font-normal text-2xl w-full flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-slate-100">Group Projects</h3>
                <a href="<?= BASEURL ?>group" class=" text-xs font-normal">View All</a>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap relative gap-6 min-[550px]:flex-row row-task">
                <script>
                    // var hide = true;
                </script>

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas_group'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ($total < 2) {
                        if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                            $total++;
                ?>
                            <div class=" relative rounded-2xl h-36 w-48 bg-bg-light dark:bg-item-dark" onclick="post(<?= $task['id'] ?>)">
                                <form action="Group/getDetail" method="post" id="form-<?= $task['id'] ?>"><input type="hidden" id="task-<?= $task['id'] ?>" name="idtask" value="<?= $task['id'] ?>"></form>

                                <!-- Top Items -->
                                <div class="w-full h-20 rounded-t-2xl from-gradient-1-start to-gradient-1-end bg-gradient-to-r">
                                    <div class="p-4">
                                        <h3 class=" font-medium text-base text-white"><?= $task['name'] ?>
                                            <p class=" font-normal text-xs"><?= $task['grade'] ?></p>
                                        </h3>
                                    </div>
                                </div>

                                <!-- Deadline -->
                                <div class=" mt-6 flex items-center font-extralight text-xs mx-6 ">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="ml-3 font-normal text-xs">
                                        <?= $task['tgl_deadline'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <script>
                                // if (hide) {
                                //     var content = document.getElementById('content-group');
                                //     content.classList.add('hide');
                                // }
                            </script>
                    <?php }
                    }
                    ?>

                <?php } ?>
            </div>
        </div>


    <?php } ?>
</div>
</div>
<script>
    function post(id) {
        var idformname = "form-" + id;
        var idform = document.getElementById(idformname);
        var idtask = document.getElementById("task-" + id)
        idform.submit(idtask)
    }
</script>