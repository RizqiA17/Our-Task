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
        <div class="back" onclick="window.history.back()">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z"
                    fill="#363942" />
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
                <div class="menu" style="margin: 0 10px;">Attachments</div>
                <div class="menu" style="margin: 0 10px;" onclick="AttachmentInput()">Add attachment</div>
            </div>
            <div class="Attachments">
                <div style="background-image: url(figma.png);" class="img"></div>
                <div style="margin-left: 10px;">
                    <div style="font-size: 0.9rem;">Hospital-app.fig</div>
                    <div style="color: #8e8e8e ; font-size: 0.8rem;">Added May 8 at 11:30PM</div>
                    <div>
                        <iconify-icon class="icon" icon="octicon:comment-16" flip="horizontal"></iconify-icon>
                        <iconify-icon class="icon" icon="bi:trash"></iconify-icon>
                        <iconify-icon class="icon" icon="uil:pen"></iconify-icon>
                    </div>
                </div>
            </div>

            <div class="Attachments">
                <div style="background-image: url(hp.jpg);" class="img"></div>
                <div style="margin-left: 10px;">
                    <div style="font-size: 0.9rem;">Thumbnail.png</div>
                    <div style="color: #8e8e8e; font-size: 0.8rem;">Added May 8 at 11:30PM</div>
                    <div>
                        <iconify-icon class="icon" icon="octicon:comment-16" flip="horizontal"></iconify-icon>
                        <iconify-icon class="icon" icon="bi:trash"></iconify-icon>
                        <iconify-icon class="icon" icon="uil:pen"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="finsih">
        <button
            style="background-color: rgba(0, 110, 233, 1); border-radius: 10px; height: 30px; width: 100%; border: none; color: white;"
            onclick="window.location.href='../'">Finsih</button>
    </div>
    <script>
        function AttachmentInput() {
            // Membuat elemen Attachments
            var attachmentDiv = document.createElement('div');
            attachmentDiv.className = 'Attachments';
    
            // Membuat elemen gambar
            var imgDiv = document.createElement('input');
            imgDiv.type = 'file';
            imgDiv.className = 'img';
            attachmentDiv.appendChild(imgDiv);
    
            // Membuat elemen keterangan file
            var textDiv = document.createElement('div');
            textDiv.style.marginLeft = '10px';
    
            // Menambahkan elemen teks nama file
            var fileNameDiv = document.createElement('input');
            fileNameDiv.type = 'text';
            fileNameDiv.style.fontSize = '0.9rem';
            textDiv.appendChild(fileNameDiv);
    
            // Membuat tombol melalui JavaScript
            var button = document.createElement('button');
            button.textContent = 'Upload';
            textDiv.appendChild(button);
    
            var formattedTime;
    
            // Fungsi untuk menampilkan waktu
            function showTime() {
                var timeDisplay = document.getElementById('timeDisplay');
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();
                formattedTime = padZero(hours) + ':' + padZero(minutes) + ':' + padZero(seconds);
            }
    
            // Fungsi untuk menambahkan nol di depan angka satu digit
            function padZero(number) {
                return (number < 10) ? '0' + number : number;
            }
    
            // Menambahkan pendengar acara klik ke tombol baru
            button.addEventListener('click', function () {
                showTime();
                addAttachment(fileNameDiv.value, 'url placeholder', formattedTime);
                attachmentDiv.remove();
            });
    
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
            var targetElement = document.getElementById('attachments');
            targetElement.appendChild(attachmentDiv);
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
            document.getElementById('attachments').appendChild(attachmentDiv);
        }
    </script>
    
</body>

</html>