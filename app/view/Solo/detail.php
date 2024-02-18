<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
</head>

<body>
    <div class="header">
        <div class="title">
            Solo Project
        </div>
        <div class="back" onclick="window.location.href='<?= BASEURL . 'solo';   ?>'">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" fill="#363942" />
            </svg>
        </div>
    </div>
    <?php
    foreach ($data['task'] as $detail) {
        $deadline = date('l, j F Y', strtotime($detail['tgl_deadline']));
    ?>
        <div class="container">
            <div class="task-title">
                <?= $detail['name'] ?>
            </div>
            <div class="task-detail">
                <p>
                    <?= $detail['description'] ?>
                </p>
                <div class="bottom-detail">
                    <div class="deadline">
                        Deadline
                        <div class="date">
                            <?= $deadline ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php
                if ($_SESSION['status'] != 'guru') { ?>
            <div class="file">
                <div class="bg" id="attachments">
                    <div style="display: flex; ">
                        <div class="menu" style="margin: 0 10px;" onclick="AddAttachments()">Attachments</div>
                        <div class="menu" style="margin: 0 10px;" onclick="Attachment()">Add attachment</div>
                    </div>
                    <div id="attachment">
                        <?php
                        if ($detail['task_description_file'] != null) {
                        ?>
                            <div class="Attachments">
                                <div style="background-image: url(<?= BASEURL.'image/'.$detail['task_description_file'] ?>);" class="img"></div>
                                <div style="margin-left: 10px;">
                                    <div style="font-size: 0.9rem;">File Task</div>
                            </div>
                        <?php } 
                        foreach($data['task_file'] as $file){ ?>
                        <div class="Attachments">
                            <div style="background-image: url(<?=BASEURL?>image/<?=$file['task_answer_file']?>);" class="img"></div>
                            <div style="margin-left: 10px;">
                                <div style="font-size: 0.9rem;"><?=$file['name']?></div>
                                <div style="color: #8e8e8e; font-size: 0.8rem;">Added <?=date('M j ', strtotime($file['date'])).'at '.date( 'g:m A', strtotime($file['date']))?></div>
                                <div>
                                    <iconify-icon class="icon" icon="bi:trash"></iconify-icon>
                                    <iconify-icon class="icon" icon="uil:pen"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <form action="upload" method="post" enctype="multipart/form-data">
                        <div class="add-attachment hide" id="add">
                            <input type="text" id="attachment-note" style="height: 20px">
                            <input type="file" name="image" id="image attachment-file">
                            <button type="submit" name="proses" id="attachment-submit" style="outline: none; border:none; height: 30px" onclick="AttachmentInput()">Upload</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="finsih">
                <button style="background-color: rgba(0, 110, 233, 1); border-radius: 10px; height: 30px; width: 100%; border: none; color: white;" onclick="window.location.href='http://localhost/ourtaskmvc/public/home'">Finsih</button>
            </div>

            <script>
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
            </script>
        <?php } else {
        ?>
            <div class="list_siswa">
                <div class="item">
                    <div class="name">
                        <div class="student">
                            Rizqi Asyriansyah
                        </div>
                        <div class="file">
                            <a href="#">jhkaskjfask.png</a>
                        </div>
                    </div>
                    <div class="responses">
                        <div class="submit-date">
                            2-5-2023
                        </div>
                        <div class="approve">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                                <path d="M396-291 234-454l46.5-46.5L396-386l283.5-282.5L726-621 396-291Z" />
                            </svg>
                        </div>
                        <div class="reject">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                                <path d="m294-246-47-48 185-186-185-186 47-48 186 186 186-186 47 48-185 186 185 186-47 48-186-186-186 186Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list_siswa">
                <div class="item">
                    <div class="name">
                        <div class="student">
                            Rizqi Asyriansyah
                        </div>
                        <div class="file">
                            <a href="#">jhkaskjfask.png</a>
                        </div>
                    </div>
                    <div class="responses">
                        <div class="submit-date">
                            2-5-2023
                        </div>
                        <div class="approve">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                                <path d="M396-291 234-454l46.5-46.5L396-386l283.5-282.5L726-621 396-291Z" />
                            </svg>
                        </div>
                        <div class="reject">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                                <path d="m294-246-47-48 185-186-185-186 47-48 186 186 186-186 47 48-185 186 185 186-47 48-186-186-186 186Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
            } ?>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>