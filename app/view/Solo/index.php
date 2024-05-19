<?php if ($_SESSION['status'] != 'guru') { ?>
    <!-- Solo Content -->
    <div class="px-9 py-4 max-w-[calc(100vw_-_223px)] max-[720px]:max-w-[100vw]" id="content-solo">

        <!-- Lewat Deadline -->
        <div class="" id='content'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Lewat Deadline</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-1',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-1',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-1">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    if ($interval->format('%R') == '-' && $task['progress'] != 'finish') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full min-w-64 max-w-64 bg-white dark:bg-700 shadow-md rounded-2xl grow sm:w-96 h-36" id="<?= $task['id_task'] ?>">
                            <!-- Top -->
                            <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-100 dark:border-500">
                                <h3 class=" text-lg font-bold font-sans">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Deadline Dekat -->
        <div class="" id='content-2'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Deadline Dekat</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-2">

                <!-- Items -->

                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    // echo $interval->format('%a days');
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7' && $task['progress'] != 'finish') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full min-w-64 max-w-64 bg-white dark:bg-700 shadow-md rounded-2xl grow sm:w-96 h-36" id="<?= $task['id_task'] ?>">
                            <!-- Top -->
                            <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-100 dark:border-500">
                                <h3 class=" text-lg font-bold font-sans">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Tugas baru -->
        <div class="" id='content-3'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Tugas Baru</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-3',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-3',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-3">

                <!-- Items -->

                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    // echo $interval->format('%a days');
                    if ((($interval->format('%R') == '+' && $interval->format('%a') <= '7') || ($interval->format('%R') == '-' && $interval->format('%a') == '0')) && $task['progress'] != 'finish') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full min-w-64 max-w-64 bg-white dark:bg-700 shadow-md rounded-2xl grow sm:w-96 h-36" id="<?= $task['id_task'] ?>">
                            <!-- Top -->
                            <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-100 dark:border-500">
                                <h3 class=" text-lg font-bold font-sans">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

    </div>

<?php } else if ($_SESSION['status'] == 'guru') { ?>

    <div class="px-9 py-4 max-w-[calc(100vw_-_223px)] max-[720px]:max-w-[100vw]" id="content-solo">

        <!-- Lewat Deadline -->
        <div class="" id='content'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Lewat Deadline</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-1',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-1',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-1">

                <!-- Items -->
                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    if ($interval->format('%R') == '-') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id'] ?>" class="w-full bg-white shadow-md min-w-64 dark:bg-700 rounded-2xl grow sm:w-96 h-36" id="<?= $task['id'] ?>">
                            <!-- Top -->
                            <div class="flex-grow pb-3 mx-6 mt-6 border-b border-100 dark:border-500">
                                <h3 class="font-sans text-lg font-bold ">
                                    <?= $task['name'] ?>
                                    <p class="text-sm font-normal ">
                                        <?= $task['grade'] ?>
                                    </p>
                                </h3>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-4 text-xs font-extralight">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Deadline Dekat -->
        <div class="" id='content-2'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Deadline Dekat</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-2">

                <!-- Items -->

                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline'])));
                    $interval = date_diff($today, $deadline);
                    // echo $interval->format('%a days');
                    if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id'] ?>" class="w-full bg-white shadow-md min-w-64 dark:bg-700 rounded-2xl grow sm:w-96 h-36" id="<?= $task['id'] ?>">
                            <!-- Top -->
                            <div class="flex-grow pb-3 mx-6 mt-6 border-b border-100 dark:border-500">
                                <h3 class="font-sans text-lg font-bold ">
                                    <?= $task['name'] ?>
                                    <p class="text-sm font-normal ">
                                        <?= $task['grade'] ?>
                                    </p>
                                </h3>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-4 text-xs font-extralight">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
            </div>
        </div>

        <!-- Tugas baru -->
        <div class="" id='content-3'>
            <!-- Title -->
            <div class=" font-normal text-2xl w-full base-100 flex justify-between items-center h-12">
                <h3 class=" font-semibold text-xl dark:text-100">Tugas Baru</h3>
                <div class="flex">
                    <span onclick="scrollContainer('scroll-3',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span onclick="scrollContainer('scroll-3',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class=" flex max-w-full min-h-36 pb-2 max-h-80 gap-6 flex-row relative overflow-hidden overflow-y-auto" id="scroll-3">

                <!-- Items -->

                <?php
                $total = 0;
                foreach ($data['task'] as $task) {
                    date_default_timezone_set('Asia/Jakarta');
                    $today = new DateTime(date('Y-m-d', time()));
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                    $interval = date_diff($dibuat, $today);
                    // echo $interval->format('%a days');
                    if ((($interval->format('%R') == '+' && $interval->format('%a') <= '7') || ($interval->format('%R') == '-' && $interval->format('%a') == '0'))) {
                        $total++;
                ?>
                        <a href="<?= BASEURL ?>solo/detail/<?= $task['id'] ?>" class="w-full bg-white shadow-md min-w-64 dark:bg-700 rounded-2xl grow sm:w-96 h-36" id="<?= $task['id'] ?>">
                            <!-- Top -->
                            <div class="flex-grow pb-3 mx-6 mt-6 border-b border-100 dark:border-500">
                                <h3 class="font-sans text-lg font-bold ">
                                    <?= $task['name'] ?>
                                    <p class="text-sm font-normal ">
                                        <?= $task['grade'] ?>
                                    </p>
                                </h3>
                            </div>

                            <!-- Deadline -->
                            <div class="flex items-center mx-6 mt-4 text-xs font-extralight">
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
                    <div class=" w-full text-center flex items-center justify-center font-bold text-5xl text-700">No Task</div>
                <?php } ?>
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