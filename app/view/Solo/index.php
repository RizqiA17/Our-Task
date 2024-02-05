<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="container.css">
    <title>Home</title>
</head> -->
<?php session_start();?>
<body>
    <div>
        <div class="header">
            <div class="header-contain">
                <div class="top home">
                    <button class="nav-button" id="nav-button" onclick="overlayOpen()">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </button>
                    <div class="right-content">
                        <a href="http://localhost/ourtaskmvc/public/home/notification" class="notification">
                            <svg class="" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.917375 10.4893V10.3068C0.944146 9.76687 1.11719 9.24374 1.41865 8.79134C1.92044 8.24789 2.26394 7.58192 2.41312 6.86332C2.41312 6.30792 2.41312 5.74459 2.46163 5.18919C2.71226 2.51535 5.35609 0.666668 7.96757 0.666668H8.03225C10.6437 0.666668 13.2876 2.51535 13.5463 5.18919C13.5948 5.74459 13.5463 6.30792 13.5867 6.86332C13.7379 7.58359 14.081 8.25162 14.5812 8.79927C14.8849 9.24767 15.0582 9.76889 15.0824 10.3068V10.4813C15.1005 11.2067 14.8507 11.914 14.379 12.4728C13.7558 13.1262 12.9101 13.5327 12.002 13.6154C9.33918 13.901 6.65255 13.901 3.98971 13.6154C3.08264 13.5292 2.23815 13.1233 1.61269 12.4728C1.14835 11.9136 0.901888 11.2105 0.917375 10.4893Z" stroke="#8E92BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.96246 16.3765C6.37853 16.8987 6.98951 17.2367 7.66021 17.3156C8.3309 17.3945 9.00599 17.2079 9.53607 16.797C9.6991 16.6755 9.8458 16.5342 9.97266 16.3765" stroke="#8E92BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="have-notif"></div>
                        </a>
                        <a href="http://localhost/ourtaskmvc/public/setting/profile">
                            <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="profile">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contain">
                <div class="" id='content'>
                    <div class="sort-by top">
                        <div class="title poppins">Lewat Deadline</div>
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
                    <div class="item row-task" id="scroll-1">
                        <?php foreach ($data['tugas'] as $task) {
                            date_default_timezone_set('Asia/Jakarta');
                            $today = new DateTime(date('Y-m-d', time()));
                            $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline_solo'])));
                            $interval = date_diff($today, $deadline);
                            if ($interval->format('%R') == '-') {
                        ?>
                                <script>
                                    hide = false
                                </script>
                                <div class="solo list" onclick="window.location.href='Solo/detail'">
                                    <div class="plain">
                                        <div class="info">
                                            <div class="task work-sans task-down"><?= $task['nama_tugas_solo'] ?></div>
                                            <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                        </div>
                                        <div class="deadline work-sans">
                                            <div class="logo">
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <?= $task['tgl_deadline_solo'] ?>
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
                <?php
                $display2 = 'block';
                ?>
                <div style="display:<?= $display2; ?>;">
                    <div class="sort-by top">
                        <div class="title poppins">Deadline Dekat</div>
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
                    <div class="item row-task" id="scroll-2">
                        <?php foreach ($data['tugas'] as $task) {
                            date_default_timezone_set('Asia/Jakarta');
                            $today = new DateTime(date('Y-m-d', time()));
                            $deadline = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_deadline_solo'])));
                            $interval = date_diff($today, $deadline);
                            // echo $interval->format('%a days');
                            if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                        ?>
                                <div class="solo list" onclick="window.location.href='Solo/detail'">
                                    <div class="plain">
                                        <div class="info">
                                            <div class="task work-sans task-down"><?= $task['nama_tugas_solo'] ?></div>
                                            <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                        </div>
                                        <div class="deadline work-sans">
                                            <div class="logo">
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <?= $task['tgl_deadline_solo'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        <?php
                        } ?>
                    </div>
                </div>
                <div>
                    <div class="sort-by top">
                        <div class="title poppins">Tugas Baru</div>
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
                    <div class="item row-task" id="scroll-3">
                        <?php foreach ($data['tugas'] as $task) {
                            date_default_timezone_set('Asia/Jakarta');
                            $today = new DateTime(date('Y-m-d', time()));
                            $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat_solo'])));
                            $interval = date_diff($dibuat, $today);
                            // echo $interval->format('%a days');
                            if ($interval->format('%R') == '+' && $interval->format('%a') <= '7') {
                        ?>
                                <div class="solo list" onclick="window.location.href='Solo/detail'">
                                    <div class="plain">
                                        <div class="info">
                                            <div class="task work-sans task-down"><?= $task['nama_tugas_solo'] ?></div>
                                            <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                                        </div>
                                        <div class="deadline work-sans">
                                            <div class="logo">
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <?= $task['tgl_deadline_solo'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="background"></div>
    <div id="overlay" class="">
        <div class="menu">
            <div class="logo">
                <img src="http://localhost/ourtaskmvc/public/image/logo.png" alt="">
                <a href="tugasupload.html">
                    <div class="title">OUR TASK</div>
                </a>
            </div>
            <div class="container">
                <div class="nav-button-list">
                    <button class="navigation" onclick="pathFind('home')">
                        <div class="left-content">
                            <svg class="u-home-alt" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="logo-fill" d="M16.6667 6.66666L11.6667 2.28333C11.2083 1.87337 10.6149 1.64672 9.99999 1.64672C9.38504 1.64672 8.79167 1.87337 8.33332 2.28333L3.33332 6.66666C3.06863 6.90339 2.8574 7.19379 2.71371 7.51853C2.57002 7.84327 2.49716 8.1949 2.49999 8.55V15.8333C2.49999 16.4964 2.76338 17.1323 3.23222 17.6011C3.70106 18.0699 4.33695 18.3333 4.99999 18.3333H15C15.663 18.3333 16.2989 18.0699 16.7678 17.6011C17.2366 17.1323 17.5 16.4964 17.5 15.8333V8.54166C17.5016 8.18797 17.4282 7.83795 17.2845 7.51473C17.1409 7.19152 16.9303 6.90246 16.6667 6.66666ZM11.6667 16.6667H8.33332V12.5C8.33332 12.279 8.42112 12.067 8.5774 11.9107C8.73368 11.7545 8.94564 11.6667 9.16665 11.6667H10.8333C11.0543 11.6667 11.2663 11.7545 11.4226 11.9107C11.5789 12.067 11.6667 12.279 11.6667 12.5V16.6667ZM15.8333 15.8333C15.8333 16.0543 15.7455 16.2663 15.5892 16.4226C15.433 16.5789 15.221 16.6667 15 16.6667H13.3333V12.5C13.3333 11.837 13.0699 11.2011 12.6011 10.7322C12.1322 10.2634 11.4964 10 10.8333 10H9.16665C8.50361 10 7.86773 10.2634 7.39889 10.7322C6.93005 11.2011 6.66665 11.837 6.66665 12.5V16.6667H4.99999C4.77897 16.6667 4.56701 16.5789 4.41073 16.4226C4.25445 16.2663 4.16665 16.0543 4.16665 15.8333V8.54166C4.1668 8.42334 4.19215 8.30641 4.241 8.19865C4.28986 8.09088 4.3611 7.99476 4.44999 7.91666L9.44999 3.54166C9.60206 3.40806 9.79756 3.33439 9.99999 3.33439C10.2024 3.33439 10.3979 3.40806 10.55 3.54166L15.55 7.91666C15.6389 7.99476 15.7101 8.09088 15.759 8.19865C15.8078 8.30641 15.8332 8.42334 15.8333 8.54166V15.8333Z" fill="#71839B" />
                            </svg>
                            <div>Home</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="pathFind('solo')">
                        <div class="left-content">
                            <svg class="curved-pinpaper-filled" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="logo" d="M7.5 10.8333H10.8333M7.5 14.1667H12.5M12.5 3.56607V2.5H7.5V3.56607M12.5 3.56607V5H7.5V3.56607M12.5 3.56607C15.3121 4.20516 16.25 6.25308 16.25 10.8333C16.25 16.5686 14.7794 18.3333 10 18.3333C5.22059 18.3333 3.75 16.5686 3.75 10.8333C3.75 6.25308 4.68791 4.20516 7.5 3.56607" stroke="#71839B" stroke-width="1.65" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>Solo Projects</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="pathFind('group')">
                        <div class="left-content">
                            <svg class="curved-users-more" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="logo" d="M15.8333 11.6667C17.6743 11.6667 19.1667 13.3333 19.1667 14.5833C19.1667 15.2737 18.607 15.8333 17.9167 15.8333H17.5M14.1667 9.16667C15.5474 9.16667 16.6667 8.04738 16.6667 6.66667C16.6667 5.28596 15.5474 4.16667 14.1667 4.16667M4.16668 11.6667C2.32573 11.6667 0.833344 13.3333 0.833344 14.5833C0.833344 15.2737 1.39299 15.8333 2.08334 15.8333H2.50001M5.83334 9.16667C4.45263 9.16667 3.33334 8.04738 3.33334 6.66667C3.33334 5.28596 4.45263 4.16667 5.83334 4.16667M13.75 15.8333H6.25001C5.55965 15.8333 5.00001 15.2737 5.00001 14.5833C5.00001 12.5 7.50001 11.6667 10 11.6667C12.5 11.6667 15 12.5 15 14.5833C15 15.2737 14.4404 15.8333 13.75 15.8333ZM12.5 6.66667C12.5 8.04738 11.3807 9.16667 10 9.16667C8.6193 9.16667 7.50001 8.04738 7.50001 6.66667C7.50001 5.28596 8.6193 4.16667 10 4.16667C11.3807 4.16667 12.5 5.28596 12.5 6.66667Z" stroke="#71839B" stroke-width="1.65" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>Group Projects</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="window.location.href='http://localhost/ourtaskmvc/public/home/calender'">
                        <div class="left-content">
                            <svg class="u-calender" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="logo-fill" d="M15.8333 3.33332H14.1667V2.49999C14.1667 2.27898 14.0789 2.06701 13.9226 1.91073C13.7663 1.75445 13.5543 1.66666 13.3333 1.66666C13.1123 1.66666 12.9003 1.75445 12.7441 1.91073C12.5878 2.06701 12.5 2.27898 12.5 2.49999V3.33332H7.49999V2.49999C7.49999 2.27898 7.41219 2.06701 7.25591 1.91073C7.09963 1.75445 6.88767 1.66666 6.66666 1.66666C6.44564 1.66666 6.23368 1.75445 6.0774 1.91073C5.92112 2.06701 5.83332 2.27898 5.83332 2.49999V3.33332H4.16666C3.50362 3.33332 2.86773 3.59672 2.39889 4.06556C1.93005 4.5344 1.66666 5.17028 1.66666 5.83332V15.8333C1.66666 16.4964 1.93005 17.1322 2.39889 17.6011C2.86773 18.0699 3.50362 18.3333 4.16666 18.3333H15.8333C16.4964 18.3333 17.1322 18.0699 17.6011 17.6011C18.0699 17.1322 18.3333 16.4964 18.3333 15.8333V5.83332C18.3333 5.17028 18.0699 4.5344 17.6011 4.06556C17.1322 3.59672 16.4964 3.33332 15.8333 3.33332ZM16.6667 15.8333C16.6667 16.0543 16.5789 16.2663 16.4226 16.4226C16.2663 16.5789 16.0543 16.6667 15.8333 16.6667H4.16666C3.94564 16.6667 3.73368 16.5789 3.5774 16.4226C3.42112 16.2663 3.33332 16.0543 3.33332 15.8333V9.99999H16.6667V15.8333ZM16.6667 8.33332H3.33332V5.83332C3.33332 5.61231 3.42112 5.40035 3.5774 5.24407C3.73368 5.08779 3.94564 4.99999 4.16666 4.99999H5.83332V5.83332C5.83332 6.05434 5.92112 6.2663 6.0774 6.42258C6.23368 6.57886 6.44564 6.66666 6.66666 6.66666C6.88767 6.66666 7.09963 6.57886 7.25591 6.42258C7.41219 6.2663 7.49999 6.05434 7.49999 5.83332V4.99999H12.5V5.83332C12.5 6.05434 12.5878 6.2663 12.7441 6.42258C12.9003 6.57886 13.1123 6.66666 13.3333 6.66666C13.5543 6.66666 13.7663 6.57886 13.9226 6.42258C14.0789 6.2663 14.1667 6.05434 14.1667 5.83332V4.99999H15.8333C16.0543 4.99999 16.2663 5.08779 16.4226 5.24407C16.5789 5.40035 16.6667 5.61231 16.6667 5.83332V8.33332Z" fill="#71839B" />
                            </svg>
                            <div>Calendar</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="pathFind('complited')">
                        <div class="left-content">
                            <svg class="check-ring" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle id="logo" cx="10" cy="10" r="7.5" stroke="#71839B" stroke-width="2" />
                                <path id="logo" d="M6.66668 10L9.16668 12.5L13.3333 7.5" stroke="#71839B" stroke-width="2" />
                            </svg>
                            <div>Complated Tasks</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="pathFind('home/mapel')">
                        <div class="left-content">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -880 970 600" width="20">
                                <path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z" fill="#71839B" stroke="#71839B" />
                            </svg>
                            <div>Mapel</div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="option">
            <div class="container">
                <div class="nav-button-list">
                    <button class="navigation" onclick="window.location.href='http://localhost/ourtaskmvc/public/home/notification'">
                        <div class="left-content">
                            <svg class="curved-bell" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17.5V18.5C9 20.1569 10.3431 21 12 21C13.6569 21 15 20.1569 15 18.5V17.5M5.99999 8.5C5.99999 5.18629 8.68628 3.5 12 3.5C15.3137 3.5 18 5.18629 18 8.5C18 10.4392 18.705 12.6133 19.4316 14.3389C20.0348 15.7717 19.0222 17.5 17.4676 17.5H6.53237C4.97778 17.5 3.96518 15.7717 4.56842 14.3389C5.29493 12.6133 5.99999 10.4392 5.99999 8.5Z" stroke="#71839B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>Notification</div>
                        </div>
                    </button>
                    <button class="navigation" onclick="window.location.href='http://localhost/ourtaskmvc/public/setting/'">
                        <div class="left-content">
                            <svg class="u-setting" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5833 10.55C16.4497 10.3979 16.376 10.2024 16.376 9.99999C16.376 9.79757 16.4497 9.60207 16.5833 9.44999L17.65 8.24999C17.7675 8.11888 17.8405 7.95391 17.8585 7.77875C17.8765 7.60359 17.8385 7.42723 17.75 7.27499L16.0833 4.39166C15.9957 4.23959 15.8624 4.11906 15.7023 4.04723C15.5422 3.97541 15.3635 3.95596 15.1917 3.99166L13.625 4.30833C13.4256 4.34952 13.2181 4.31632 13.0416 4.21499C12.865 4.11367 12.7317 3.95123 12.6667 3.75833L12.1583 2.23333C12.1024 2.06781 11.9959 1.92405 11.8539 1.82236C11.7118 1.72068 11.5414 1.66621 11.3667 1.66666H8.03333C7.85161 1.65718 7.67177 1.70743 7.5213 1.80976C7.37082 1.91208 7.25798 2.06084 7.2 2.23333L6.73333 3.75833C6.66833 3.95123 6.53497 4.11367 6.35842 4.21499C6.18187 4.31632 5.97434 4.34952 5.77499 4.30833L4.16666 3.99166C4.00379 3.96864 3.83774 3.99435 3.68945 4.06553C3.54116 4.13671 3.41725 4.25018 3.33333 4.39166L1.66666 7.27499C1.57596 7.42554 1.53518 7.6009 1.55015 7.77601C1.56511 7.95113 1.63506 8.11703 1.74999 8.24999L2.80833 9.44999C2.94193 9.60207 3.01561 9.79757 3.01561 9.99999C3.01561 10.2024 2.94193 10.3979 2.80833 10.55L1.74999 11.75C1.63506 11.883 1.56511 12.0489 1.55015 12.224C1.53518 12.3991 1.57596 12.5745 1.66666 12.725L3.33333 15.6083C3.42091 15.7604 3.55426 15.8809 3.71437 15.9528C3.87448 16.0246 4.05318 16.044 4.225 16.0083L5.79166 15.6917C5.99101 15.6505 6.19854 15.6837 6.37509 15.785C6.55164 15.8863 6.685 16.0488 6.74999 16.2417L7.25833 17.7667C7.31631 17.9391 7.42916 18.0879 7.57963 18.1902C7.73011 18.2926 7.90994 18.3428 8.09166 18.3333H11.425C11.5997 18.3338 11.7701 18.2793 11.9122 18.1776C12.0542 18.0759 12.1608 17.9322 12.2167 17.7667L12.725 16.2417C12.79 16.0488 12.9234 15.8863 13.0999 15.785C13.2764 15.6837 13.484 15.6505 13.6833 15.6917L15.25 16.0083C15.4218 16.044 15.6005 16.0246 15.7606 15.9528C15.9207 15.8809 16.0541 15.7604 16.1417 15.6083L17.8083 12.725C17.8968 12.5728 17.9348 12.3964 17.9168 12.2212C17.8989 12.0461 17.8259 11.8811 17.7083 11.75L16.5833 10.55ZM15.3417 11.6667L16.0083 12.4167L14.9417 14.2667L13.9583 14.0667C13.3581 13.944 12.7338 14.0459 12.2038 14.3532C11.6738 14.6604 11.2751 15.1515 11.0833 15.7333L10.7667 16.6667H8.63333L8.33333 15.7167C8.14154 15.1349 7.74281 14.6437 7.21283 14.3365C6.68285 14.0293 6.05851 13.9273 5.45833 14.05L4.47499 14.25L3.39166 12.4083L4.05833 11.6583C4.46829 11.2 4.69494 10.6066 4.69494 9.99166C4.69494 9.37672 4.46829 8.78335 4.05833 8.32499L3.39166 7.57499L4.45833 5.74166L5.44166 5.94166C6.04185 6.06435 6.66618 5.96239 7.19617 5.65516C7.72615 5.34792 8.12487 4.85679 8.31666 4.27499L8.63333 3.33333H10.7667L11.0833 4.28333C11.2751 4.86513 11.6738 5.35626 12.2038 5.66349C12.7338 5.97073 13.3581 6.07268 13.9583 5.94999L14.9417 5.74999L16.0083 7.59999L15.3417 8.34999C14.9363 8.80729 14.7125 9.39723 14.7125 10.0083C14.7125 10.6194 14.9363 11.2094 15.3417 11.6667ZM9.7 6.66666C9.04072 6.66666 8.39626 6.86216 7.84809 7.22843C7.29993 7.5947 6.87269 8.1153 6.6204 8.72438C6.3681 9.33347 6.30209 10.0037 6.43071 10.6503C6.55933 11.2969 6.8768 11.8908 7.34297 12.357C7.80915 12.8232 8.40309 13.1407 9.04969 13.2693C9.6963 13.3979 10.3665 13.3319 10.9756 13.0796C11.5847 12.8273 12.1053 12.4001 12.4716 11.8519C12.8378 11.3037 13.0333 10.6593 13.0333 9.99999C13.0333 9.11594 12.6821 8.26809 12.057 7.64297C11.4319 7.01785 10.5841 6.66666 9.7 6.66666ZM9.7 11.6667C9.37036 11.6667 9.04813 11.5689 8.77404 11.3858C8.49996 11.2026 8.28634 10.9423 8.1602 10.6378C8.03405 10.3333 8.00104 9.99815 8.06535 9.67484C8.12966 9.35154 8.2884 9.05457 8.52148 8.82148C8.75457 8.5884 9.05154 8.42966 9.37484 8.36535C9.69815 8.30104 10.0333 8.33405 10.3378 8.4602C10.6423 8.58634 10.9026 8.79996 11.0858 9.07404C11.2689 9.34813 11.3667 9.67036 11.3667 9.99999C11.3667 10.442 11.1911 10.8659 10.8785 11.1785C10.5659 11.4911 10.142 11.6667 9.7 11.6667Z" fill="#71839B" />
                            </svg>
                            <div>Setting</div>
                        </div>
                    </button>
                    <form class='navigation' action="http://localhost/ourtaskmvc/public/home/logout" method='post'>
                    <button type='submit' class="navigation">
                        <div class="left-content">
                            <svg class="u-sign-out-alt" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.4917 10.8333L8.57499 12.7416C8.49688 12.8191 8.43489 12.9113 8.39258 13.0128C8.35027 13.1144 8.32849 13.2233 8.32849 13.3333C8.32849 13.4433 8.35027 13.5522 8.39258 13.6538C8.43489 13.7553 8.49688 13.8475 8.57499 13.925C8.65246 14.0031 8.74463 14.0651 8.84618 14.1074C8.94773 14.1497 9.05665 14.1715 9.16666 14.1715C9.27667 14.1715 9.38559 14.1497 9.48714 14.1074C9.58869 14.0651 9.68085 14.0031 9.75832 13.925L13.0917 10.5916C13.1675 10.5124 13.227 10.4189 13.2667 10.3166C13.35 10.1138 13.35 9.8862 13.2667 9.68331C13.227 9.58102 13.1675 9.48757 13.0917 9.40831L9.75832 6.07498C9.68062 5.99728 9.58838 5.93565 9.48687 5.8936C9.38535 5.85155 9.27654 5.8299 9.16666 5.8299C9.05677 5.8299 8.94797 5.85155 8.84645 5.8936C8.74493 5.93565 8.65269 5.99728 8.57499 6.07498C8.49729 6.15268 8.43566 6.24492 8.39361 6.34644C8.35156 6.44796 8.32991 6.55677 8.32991 6.66665C8.32991 6.77653 8.35156 6.88534 8.39361 6.98686C8.43566 7.08837 8.49729 7.18062 8.57499 7.25831L10.4917 9.16665H2.49999C2.27898 9.16665 2.06701 9.25445 1.91073 9.41073C1.75445 9.56701 1.66666 9.77897 1.66666 9.99998C1.66666 10.221 1.75445 10.433 1.91073 10.5892C2.06701 10.7455 2.27898 10.8333 2.49999 10.8333H10.4917ZM9.99999 1.66665C8.44257 1.65969 6.91436 2.08933 5.58871 2.90681C4.26307 3.72429 3.19303 4.89691 2.49999 6.29165C2.40053 6.49056 2.38417 6.72083 2.45449 6.93181C2.52482 7.14279 2.67608 7.31719 2.87499 7.41665C3.0739 7.5161 3.30418 7.53247 3.51515 7.46214C3.72613 7.39182 3.90053 7.24056 3.99999 7.04165C4.52682 5.97775 5.32818 5.07383 6.32128 4.4233C7.31438 3.77278 8.46318 3.39925 9.64895 3.34131C10.8347 3.28337 12.0145 3.54313 13.0663 4.09374C14.118 4.64435 15.0037 5.46584 15.6317 6.47331C16.2598 7.48078 16.6074 8.63769 16.6387 9.82447C16.6699 11.0112 16.3837 12.1848 15.8096 13.224C15.2355 14.2631 14.3943 15.1301 13.3729 15.7353C12.3516 16.3406 11.1872 16.6621 9.99999 16.6666C8.75739 16.672 7.53845 16.327 6.48307 15.671C5.42768 15.0151 4.57862 14.0749 4.03332 12.9583C3.93387 12.7594 3.75947 12.6081 3.54849 12.5378C3.33751 12.4675 3.10724 12.4839 2.90832 12.5833C2.70941 12.6828 2.55815 12.8572 2.48783 13.0681C2.4175 13.2791 2.43387 13.5094 2.53332 13.7083C3.19401 15.0379 4.19792 16.1668 5.44122 16.9784C6.68451 17.7899 8.12203 18.2545 9.60509 18.3241C11.0882 18.3938 12.5629 18.066 13.8768 17.3746C15.1907 16.6832 16.296 15.6533 17.0784 14.3915C17.8608 13.1297 18.2919 11.6818 18.3271 10.1975C18.3623 8.7132 18.0003 7.24647 17.2785 5.94901C16.5568 4.65154 15.5015 3.57045 14.2219 2.81757C12.9422 2.06469 11.4847 1.66735 9.99999 1.66665Z" fill="#71839B" />
                            </svg>
                            <div>Logout</div>
                        </div>
                    </button>
                    </form>
                    <div class="navigation" style="display: flex; align-items: center; margin: 20px 0 30px 0;">
                        <a href="http://localhost/ourtaskmvc/public/setting/profile">
                            <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="left-content">
                        </a>
                        <div style="font: 400 13px Arial; display: flex; gap: 2px; flex-direction: column;">
                            <div><?= $_SESSION['nama']; ?></div>
                            <div style="font-size: 12px; font-weight:100; color:gray"><?= $_SESSION['email']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://localhost/ourtaskmvc/public/js/overlay_menu.js"></script>
    <script src="http://localhost/ourtaskmvc/public/js/script.js"></script>
</body>