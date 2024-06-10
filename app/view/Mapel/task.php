<label for="Toggle3" class="dark:outline-none outline-[0.5px] max-w-[calc(100vw_-_224px)] max-[720px]:max-w-[100vw]  min-w-[calc(100vw_-_224px)] max-[720px]:min-w-[100vw] outline inline-flex items-center min-h-12 rounded-sm cursor-pointer bg-50 dark:bg-700 text-300">
    <input id="Toggle3" type="checkbox" name="group" class="hidden peer" onchange="changeTaskMode()">
    <span class=" h-full w-1/2 rounded-l-sm bg-200 dark:bg-400 peer-checked:text-300 text-950 peer-checked:bg-inherit text-center content-center">Solo</span>
    <span class=" h-full w-1/2 rounded-r-sm bg-inherit peer-checked:text-950 peer-checked:bg-200 peer-checked:dark:bg-400 text-center content-center">Group</span>
</label>

<div class="max-w-[calc(100vw_-_224px)] max-[720px]:max-w-[100vw] max-h-[calc(100svh_-_121px)] overflow-hidden overflow-y-auto min-w-[calc(100vw_-_223px)] max-[720px]:min-w-[100vw] h-full">

    <!-- Solo Content -->
    <div class="py-4 px-9 max-w-[calc(100vw_-_223px)] max-[720px]:max-w-[100vw] min-h-full min-w-[calc(100vw_-_223px)] max-[720px]:min-w-[100vw]" id="content-solo">

        <!-- Content -->
        <div class="relative grid grid-cols-[repeat(auto-fit,minmax(256px,1fr))] max-w-full gap-6 pb-2 overflow-hidden overflow-y-auto min-h-36 ">

            <!-- Items -->
            <?php
            $total = 0;
            foreach ($data['task_solo'] as $task) {
                $total++;
                date_default_timezone_set('Asia/Jakarta');
                $today = new DateTime(date('Y-m-d', time()));
                $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                $interval = date_diff($dibuat, $today);
            ?>
                <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full bg-white shadow-md min-w-64 dark:bg-700 rounded-2xl h-36" id="<?= $task['id_task'] ?>">
                    <!-- Top -->
                    <div class="flex-grow pb-3 mx-6 mt-6 border-b border-100 dark:border-500">
                        <h3 class=" text-lg font-bold font-sans ">
                            <?= $task['name'] ?>
                            <p class="text-sm font-normal ">
                                <?= $task['mapel'] ?>
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
            if ($total == 0) { ?>
                <div class="flex items-center justify-center w-full text-5xl font-bold text-center text-700">No New Task</div>
            <?php } ?>
        </div>
    </div>

    <!-- Group Content -->
    <div class="py-4 px-9 max-w-[calc(100vw_-_223px)] max-[720px]:max-w-[100vw] hidden min-h-full min-w-[calc(100vw_-_223px)] max-[720px]:min-w-[100vw]" id="content-group">
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
                    <div class="box-border w-48 p-4">
                        <?php
                        if ($task['id_profile_leader'] != null) {
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
            if ($total == 0) { ?>
                <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No New Task</div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    var switchMode = document.getElementById('Toggle3');
    var solo = document.getElementById('content-solo');
    var group = document.getElementById('content-group');

    function changeTaskMode() {
        if (switchMode.checked) {
            solo.classList.add('hidden');
            group.classList.remove('hidden');
        } else {
            solo.classList.remove('hidden');
            group.classList.add('hidden')
        }
    }
</script>