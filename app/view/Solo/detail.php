<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>css/detail.css"> -->
    <link rel="stylesheet" href="<?= BASEURL ?>css/output.css">
    <title>Task Details</title>
</head>

<body class="min-h-svh bg-50 dark:bg-700 dark:text-50 mx-6 font-sans flex flex-col justify-start">


    <!-- Header -->
    <div class="flex justify-between items-center py-9">
        <div class="w-6 h-6 material-symbols-outlined dark:text-gray-400 cursor-pointer" onclick="window.history.back()">
            <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-700 dark:fill-50" d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" />
            </svg>
        </div>
        <h1 class="font-semibold text-2xl uppercase">
            Solo Project
        </h1>
        <div class="w-6 h-6"></div>
    </div>

    <?php
    $task = $data['task'];
    $deadline = date('l, j F Y', strtotime($task['tgl_deadline']));
    ?>

    <div class="flex gap-4 w-full flex-wrap">

        <!-- Detail -->
        <div class=" min-h-48 flex-grow flex flex-col justify-center bg-inherit border border-gray-200 dark:border-slate-600 p-5 rounded-2xl">
            <h2 class=" font-semibold text-2xl w-full uppercase">
                <?= $task['name'] ?>
            </h2>
            <h3 class="mt-6">
                Description
                <p class=" px-3 text-gray-400">
                    <?= $task['description'] ?>
                </p>
            </h3>
            <div class="flex flex-row justify-between gap-5 mt-3">
                <h3 class="">
                    Deadline
                    <p class=" font-semibold text-md text-gray-400 pl-3">
                        <?= $deadline ?>
                    </p>
                </h3>
            </div>
        </div>

        <!-- Attachment for Student -->

        <div class=" rounded-2xl p-5 w-full flex-grow md:max-w-96 border border-gray-200 dark:border-slate-600" id="attachments">
            <div class="flex">
                <div class=" p-2 w-36 text-center rounded-2xl cursor-pointer hover:bg-gray-200 ease-in-out hover:text-black transition-colors delay-75" onclick="AddAttachments()">Attachments</div>
                <?php if (($_SESSION['status'] == 'guru' && $task['task_description_file'] == null) || $_SESSION['status'] == 'siswa') : ?>
                    <div class=" ml-1 p-2 w-36 text-center rounded-2xl cursor-pointer hover:bg-gray-200 ease-in-out hover:text-black transition-colors delay-75" onclick="Attachment()">Add attachment</div>
                <?php endif; ?>
            </div>

            <!-- Attachment Task -->
            <div id="attachment">
                <?php
                if ($task['task_description_file'] != null) {
                ?>
                    <div class="mt-5 flex items-center">
                        <a href="<?= BASEIMG . $task['task_description_file'] ?>" class="w-16 h-16 bg-green-600 rounded-lg flex justify-center items-center overflow-hidden" target="_blank">
                            <img src="<?= BASEURL ?>image/<?= $task['task_description_file'] ?>" alt="">
                        </a>
                        <div style="margin-left: 10px;">
                            <a href="<?= BASEIMG . $task['task_description_file'] ?>" target="_blank">Task Attachments</a>
                            <div class=" text-gray-400 text-xs">Added <?= date('M j ', strtotime($task['tgl_dibuat'])) . 'at ' . date('g:m A', strtotime($task['tgl_dibuat'])) ?></div>
                        </div>
                    </div>
                    <?php }
                if (!empty($data['task_file'])) {
                    foreach ($data['task_file'] as $file) { ?>
                        <div class="mt-5 flex items-center">
                            <a href="<?= BASEIMG . $file['task_answer_file'] ?>" class="w-16 h-16 bg-green-600 rounded-lg flex justify-center items-center overflow-hidden" target="_blank">
                                <img src="<?= BASEIMG . $file['task_answer_file'] ?>" alt="">
                            </a>
                            <div style="margin-left: 10px;">
                                <a href="<?= BASEIMG . $file['task_answer_file'] ?>" target="_blank">Task Attachments</a>
                                <div class=" text-gray-400 text-xs">Added <?= date('M j ', strtotime($file['date'])) . 'at ' . date('g:m A', strtotime($file['date'])) ?></div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>

            <!-- Add Attachment -->
            <form action="<?= BASEURL ?>solo/upload" method="post" enctype="multipart/form-data">
                <div class="mt-5 flex flex-col gap-2 hidden" id="add">
                    <div class="flex max-sm:gap-2 max-sm:flex-col flex-row gap-8 items-center">
                        <input type="text" id="attachment-note" class="h-5 dark:bg-gray-700 box-border h-8 w-full outline-none border dark:border-slate-600 rounded-md text-sm p-1 " name="name" placeholder="Title">
                        <input type="file" name="image" id="image attachment-file" class=" w-full text-center text my-2">
                    </div>
                    <button type="submit" name="proses" id="attachment-submit" class="bg-own-blue rounded-lg h-7 w-full border-none text-white cursor-pointer" onclick="AttachmentInput()">Upload</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Set Finish -->
    <?php if ($_SESSION['status'] == 'siswa') : if ($task['progress'] == 'unfinished') { ?>
            <!-- <form action="" class=" mb-9 w-full"> -->
            <button onclick="window.confirm('Tandai Selesai?') ? window.location.href='<?= BASEURL ?>solo/complited' : ''" class="bg-own-blue rounded-lg mt-3 h-7 w-full border-none text-white cursor-pointer">Finish</button>
            <!-- </form> -->
    <?php }
    endif; ?>

    <!-- <script>
        var attachment = document.getElementById('attachment');
        var addAttachments = document.getElementById('add');

        function Attachment() {
            attachment.classList.add("hide");
            addAttachments.classList.remove("hide");
        }

        function AddAttachments() {
            attachment.classList.remove("hide");
            addAttachments.classList.add("hide");
        }

        function AttachmentInput() {

            var formattedTime;

            // Fungsi untuk menampilkan waktu
            function showTime() {
                var timeDisplay = document.getElementById('timeDisplay');
                var currentTime = new Date();
                var month = currentTime.toLocaleString('default', {
                    month: 'long'
                });
                var day = currentTime.getDay();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var formattedMonth = month.substring(0, 3);
                var ampm = hours >= 12 ? 'PM' : 'AM';
                formattedTime = 'Added ' + formattedMonth + ' ' + day + ' at ' + padZero(hours) + ':' + padZero(minutes) + ' ' + ampm;
            }

            // Fungsi untuk menambahkan nol di depan angka satu digit
            function padZero(number) {
                return (number < 10) ? '0' + number : number;
            }

            showTime();
            AddAttachments();
            addAttachment(document.getElementById("attachment-note").value, 'url placeholder', formattedTime);

            // Menambahkan elemen ikon komentar, sampah, dan pena
            var iconDiv = document.createElement('div');
            var icons = ['octicon:comment-16', 'bi:trash', 'uil:pen'];
            icons.forEach(icon => {
                var iconifyIcon = document.createElement('iconify-icon');
                iconifyIcon.className = 'icon';
                iconifyIcon.setAttribute('icon', icon);
                iconDiv.appendChild(iconifyIcon);
            });
        }

        function addAttachment(fileName, imageUrl, addedInfo) {
            // Membuat elemen Attachments
            var attachmentDiv = document.createElement('div');
            attachmentDiv.className = 'Attachments';

            // Membuat elemen gambar
            var imgDiv = document.createElement('div');
            imgDiv.className = 'img';
            imgDiv.style.backgroundImage = 'url(' + imageUrl + ')';
            attachmentDiv.appendChild(imgDiv);

            // Membuat elemen keterangan file
            var textDiv = document.createElement('div');
            textDiv.style.marginLeft = '10px';

            // Menambahkan elemen teks nama file
            var fileNameDiv = document.createElement('div');
            fileNameDiv.style.fontSize = '0.9rem';
            fileNameDiv.textContent = fileName;
            textDiv.appendChild(fileNameDiv);

            // Menambahkan elemen teks informasi tambahan
            var addedInfoDiv = document.createElement('div');
            addedInfoDiv.style.color = '#8e8e8e';
            addedInfoDiv.style.fontSize = '0.8rem';
            addedInfoDiv.textContent = addedInfo;
            textDiv.appendChild(addedInfoDiv);

            // Menambahkan elemen ikon komentar, sampah, dan pena
            var iconDiv = document.createElement('div');
            var icons = ['octicon:comment-16', 'bi:trash', 'uil:pen'];
            icons.forEach(icon => {
                var iconifyIcon = document.createElement('iconify-icon');
                iconifyIcon.className = 'icon';
                iconifyIcon.setAttribute('icon', icon);
                iconDiv.appendChild(iconifyIcon);
            });
            textDiv.appendChild(iconDiv);

            // Menambahkan elemen teks ke elemen Attachments
            attachmentDiv.appendChild(textDiv);

            // Menambahkan elemen Attachments ke dalam elemen target
            document.getElementById('attachment').appendChild(attachmentDiv);

            // Menambahkan fitur mengirim file ke databases
            function AttachmentInput() {
                var fileInput = document.getElementById('fileInput');
                fileInput.click();

                fileInput.onchange = function() {
                    var file = fileInput.files[0];
                    var attachmentNote = document.getElementById("attachment-note").value;
                    var formattedTime;

                    // Fungsi untuk menampilkan waktu
                    function showTime() {
                        var currentTime = new Date();
                        var month = currentTime.toLocaleString('default', {
                            month: 'long'
                        });
                        var day = currentTime.getDay();
                        var hours = currentTime.getHours();
                        var minutes = currentTime.getMinutes();
                        var formattedMonth = month.substring(0, 3);
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        formattedTime = 'Added ' + formattedMonth + ' ' + day + ' at ' + padZero(hours) + ':' + padZero(minutes) + ' ' + ampm;
                    }

                    // Fungsi untuk menambahkan nol di depan angka satu digit
                    function padZero(number) {
                        return (number < 10) ? '0' + number : number;
                    }

                    showTime();
                    AddAttachments();
                    addAttachment(attachmentNote, 'url placeholder', formattedTime);

                };
            }

        }
    </script> -->

    <!-- Change from Display Attachment to Add Attachment -->
    <script>
        var attachment = document.getElementById('attachment');
        var addAttachments = document.getElementById('add');

        function Attachment() {
            attachment.classList.add("hidden");
            addAttachments.classList.remove("hidden");
        }

        function AddAttachments() {
            attachment.classList.remove("hidden");
            addAttachments.classList.add("hidden");
        }
    </script>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>