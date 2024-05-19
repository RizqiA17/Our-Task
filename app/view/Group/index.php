<?php if ($_SESSION['status'] != 'guru') { ?>
    <!-- Group Content -->
    <div class="box-border py-4 px-9" id="content">

        <!-- Lewat Deadline -->
        <div id="content">
            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Lewat Deadline</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-1',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-1',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-1">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    if ($interval->format('%R') == '-' && (int)$task['progress'] != 100) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Bottom Items -->
                            <div class="box-border w-48 px-5 py-4">
                                <?php
                                if ($task['id_leader'] != null) {
                                ?>

                                    <!-- Presentage -->
                                    <h3 class="text-sm font-semibold">
                                        <?= $task['progress'] ?>%
                                    </h3>

                                    <!-- Presentage Bar -->
                                    <div class="flex flex-row items-center justify-between">

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
                                                if ($member['id_task'] == $task['id_task'] && $member['id_profile_leader'] == $task['id_profile_leader']) {
                                                    if ($memberTotal < 5) {
                                                        $memberTotal++; ?>
                                                        <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                    <?php } else if ($memberTotal >= 5) {
                                                        $memberTotal++;
                                                        $is_lot = true; ?>
                                                <?php }
                                                }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark">&plus;<?= $memberTotal -= 5 ?></div>
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
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Deadline Dekat -->
        <div id="content-2">

            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Deadline Dekat</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-2">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    // echo $interval->format('%a days');
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7' && (int)$task['progress'] != 100) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Bottom Items -->
                            <div class="box-border w-48 px-5 py-4">
                                <?php
                                if ($task['id_leader'] != null) {
                                ?>

                                    <!-- Presentage -->
                                    <h3 class="text-sm font-semibold">
                                        <?= $task['progress'] ?>%
                                    </h3>

                                    <!-- Presentage Bar -->
                                    <div class="flex flex-row items-center justify-between">

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
                                                if ($member['id_task'] == $task['id_task'] && $member['id_profile_leader'] == $task['id_profile_leader']) {
                                                    if ($memberTotal < 5) {
                                                        $memberTotal++; ?>
                                                        <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                    <?php } else if ($memberTotal >= 5) {
                                                        $memberTotal++;
                                                        $is_lot = true; ?>
                                                <?php }
                                                }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark">&plus;<?= $memberTotal -= 5 ?></div>
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
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Tugas Baru -->
        <div id="content-3">

            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Tugas Baru</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-3',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-3',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-3">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ((($interval->format('%R') == '+' && $interval->format('%a') <= '7') || ($interval->format('%R') == '-' && $interval->format('%a') == '0')) && (int)$task['progress'] != 100) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Bottom Items -->
                            <div class="box-border w-48 px-5 py-4">
                                <?php
                                if ($task['id_leader'] != null) {
                                ?>

                                    <!-- Presentage -->
                                    <h3 class="text-sm font-semibold">
                                        <?= $task['progress'] ?>%
                                    </h3>

                                    <!-- Presentage Bar -->
                                    <div class="flex flex-row items-center justify-between">

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
                                                if ($member['id_task'] == $task['id_task'] && $member['id_profile_leader'] == $task['id_profile_leader']) {
                                                    if ($memberTotal < 5) {
                                                        $memberTotal++; ?>
                                                        <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                    <?php } else if ($memberTotal >= 5) {
                                                        $memberTotal++;
                                                        $is_lot = true; ?>
                                                <?php }
                                                }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark">&plus;<?= $memberTotal -= 5 ?></div>
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
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php } ?>
<?php if ($_SESSION['status'] == 'guru') { ?>
    <!-- Group Content -->
    <div class="box-border py-4 px-9" id="content">

        <!-- Lewat Deadline -->
        <div id="content">
            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Lewat Deadline</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-1',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-1',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-1">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    if ($interval->format('%R') == '-') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id'] ?>"><input type="hidden" id="task-<?= $task['id'] ?>" name="idtask" value="<?= $task['id'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-6 text-xs font-extralight">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="#71839B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 text-xs font-normal">
                                    <?= $task['tgl_deadline'] ?>
                                </p>
                            </div>
                        </a>
                    <?php
                    }
                }
                if ($total == 0) { ?>
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Deadline Dekat -->
        <div id="content-2">

            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Deadline Dekat</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-2">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    // echo $interval->format('%a days');
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id'] ?>"><input type="hidden" id="task-<?= $task['id'] ?>" name="idtask" value="<?= $task['id'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-6 text-xs font-extralight">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="#71839B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 text-xs font-normal">
                                    <?= $task['tgl_deadline'] ?>
                                </p>
                            </div>
                        </a>
                    <?php
                    }
                }
                if ($total == 0) { ?>
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Tugas Baru -->
        <div id="content-3">

            <!-- Title -->
            <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
                <h3 class="text-xl font-semibold dark:text-100">Tugas Baru</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-3',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-3',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-3">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['tugas'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    if ((($interval->format('%R') == '+' && $interval->format('%a') <= '7') || ($interval->format('%R') == '-' && $interval->format('%a') == '0'))) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>group/detail/<?= $task['id'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                            <form action="Group/getDetail" method="post" id="form-<?= $task['id'] ?>"><input type="hidden" id="task-<?= $task['id'] ?>" name="idtask" value="<?= $task['id'] ?>"></form>

                            <!-- Top Items -->
                            <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                                <div class="p-4">
                                    <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                        <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                    </h3>
                                </div>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-6 text-xs font-extralight">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="#71839B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 text-xs font-normal">
                                    <?= $task['tgl_deadline'] ?>
                                </p>
                            </div>
                        </a>
                    <?php
                    }
                }
                if ($total == 0) { ?>
                    <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>


</div>


<script>
    function post(id) {
        var idformname = "form-" + id;
        var idform = document.getElementById(idformname);
        var idtask = document.getElementById("task-" + id)
        // alert(idtask.value)
        idform.submit(idtask)
    }
</script>
<script src="http://localhost/ourtaskmvc/public/js/script.js"></script>