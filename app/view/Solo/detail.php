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
        <div class="back" onclick="window.location.href='<?= BASEURL.'ome';   ?>'">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" fill="#363942" />
            </svg>
        </div>
    </div>
    <div class="container">
        <div class="task-title">
            Design Figma
        </div>
        <div class="task-detail">
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum delectus dignissimos voluptas fugiat,
                distinctio reiciendis laborum. Architecto vel reprehenderit iure dolores libero, voluptatem adipisci
                illo ipsa sapiente enim, natus quod?
            </p>
            <div class="bottom-detail">
                <div class="deadline">
                    Deadline
                    <div class="date">
                        Thursday, 20 July 2023
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="file">
        <div class="bg" id="attachments">
            <div style="display: flex; ">
                <div class="menu" style="margin: 0 10px;" onclick="AddAttachments()">Attachments</div>
                <div class="menu" style="margin: 0 10px;" onclick="Attachment()">Add attachment</div>
            </div>
            <div id="attachment">
                <div class="Attachments">
                    <div style="background-image: url(http://localhost/ourtaskmvc/public/image/figma.png);" class="img"></div>
                    <div style="margin-left: 10px;">
                        <div style="font-size: 0.9rem;">Figma</div>
                        <div style="color: #8e8e8e ; font-size: 0.8rem;">Added May 8 at 11:30 PM</div>
                        <div>
                            <iconify-icon class="icon" icon="octicon:comment-16" flip="horizontal"></iconify-icon>
                            <iconify-icon class="icon" icon="bi:trash"></iconify-icon>
                            <iconify-icon class="icon" icon="uil:pen"></iconify-icon>
                        </div>
                    </div>
                </div>
                <div class="Attachments">
                    <div style="background-image: url(http://localhost/ourtaskmvc/public/image/hp.jpg);" class="img"></div>
                    <div style="margin-left: 10px;">
                        <div style="font-size: 0.9rem;">Front End</div>
                        <div style="color: #8e8e8e; font-size: 0.8rem;">Added May 8 at 11:30 PM</div>
                        <div>
                            <iconify-icon class="icon" icon="octicon:comment-16" flip="horizontal"></iconify-icon>
                            <iconify-icon class="icon" icon="bi:trash"></iconify-icon>
                            <iconify-icon class="icon" icon="uil:pen"></iconify-icon>
                        </div>
                    </div>
                </div>
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
                var month = currentTime.toLocaleString('default', { month: 'long' });
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
                        var month = currentTime.toLocaleString('default', { month: 'long' });
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

                //     // Mengirim file ke server
                //     var formData = new FormData();
                //     formData.append('file', file);
                    
                //     var xhr = new XMLHttpRequest();
                //     xhr.open('POST', '/upload', true);
                //     xhr.onload = function () {
                //         if (xhr.status === 200) {
                //             console.log('File berhasil diunggah.');
                //         } else {
                //             console.log('Terjadi kesalahan saat mengunggah file.');
                //         }
                //     };
                //     xhr.send(formData);
                };
                // const express = require('express');
                // const multer  = require('multer');
                // const app = express();
                // const upload = multer({ dest: 'uploads/' }); // Direktori untuk menyimpan file

                // // Endpoint untuk mengunggah file
                // app.post('/upload', upload.single('file'), function (req, res, next) {
                //     // Lakukan penyimpanan nama file ke database di sini
                //     const fileName = req.file.filename;
                //     res.status(200).send('File berhasil diunggah.');
                // });

                // app.listen(3000, function () {
                // console.log('Server berjalan di port 3000');
                // });

            }

        }
    </script>

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
        }
    </script> -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>