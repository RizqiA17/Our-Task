<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/group-detail.css"> -->
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Desain baru</title>
</head>

<body>
<div class="header">
        <div class="title">
            Member Task
        </div>
        <div class="back" onclick="window.history.back()">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z" fill="#363942" />
            </svg>
        </div>
    </div>

    <div class="bg">
        <div style="font-weight: bold; ">High-fidelityt design</div>

        <div style="color: #8e8e8e; margin-top: 20px;">Members</div>
        <div style="display: flex; margin-top: 10px;">
            <div class="profile2"></div>
            <div class="profile"></div>
        </div>

    </div>

    <div class="bg">
        <div>Description</div>
        <div style="margin:20px 0;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nulla
            deleniti repellat expedita, enim
            adipisci! Deleniti sed enim, ullam dicta quisquam harum commodi vel nihil obcaecati omnis, ab dolorum? Quas.
        </div>
        <a style="color: black; " href="#">Show full description</a>
    </div>




    <div class="bg" id="attachments">
        <div style="display: flex; ">
            <div class="menu" style="margin: 0 10px;" onclick="AddAttachments()">Attachments</div>
            <div class="menu" style="margin: 0 10px;" onclick="Attachment()">Add attachment</div>
        </div>
        <div id="attachment">
            <div class="Attachments">
                <div style="background-image: url(http://localhost/ourtaskmvc/public/image/figma.png);" class="img">
                </div>
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
        <div class="add-attachment hide" id="add">
            <input type="text" id="attachment-note" style="height: 20px">
            <input type="file" id="attachment-file">
            <button style="outline: none; border:none; height: 30px" onclick="AttachmentInput()">Upload</button>
        </div>
    </div>

    <div class="bg">
        <div>Activity</div>
        <div style="display: flex; align-items: center; margin-top: 15px;">
            <div class="profile"></div>
            <input type="text" id="comment-box" style="width: 100%; height: 20px; padding:5px; margin-bottom: 10px"
                placeholder="Write a comment">
        </div>
        <button class="" style="width: 100%; height: 30px; outline:none; border:none;"
            onclick="AddComment()">Send</button>
        <div style="width: 100%; height: 2px; background: rgb(239, 239, 239); margin-top: 20px;"></div>
        <div class="comment" id="comment">

            <div style="display: flex; align-items: center; margin-top: 15px;">
                <div class="profile"></div>
                <div class="comment-username">Cristina</div>
                <div style="font-size: 0.8rem; margin-left: 7px; color: #8e8e8e;">May 8 at 11:41 PM</div>
            </div>
            <div class="comment-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eos architecto voluptas itaque
                similique
                autem necessitatibus, rerum reprehenderit voluptates est, consequuntur quod ullam officia, deleniti
                iusto?
                Provident unde assumenda hic.</div>
            <!-- <div style="display: flex; align-items: center;">
                <iconify-icon icon="fluent:emoji-add-16-regular"></iconify-icon>
                <div style="margin: 0px 7px;">•</div>
                <a href="" style="font-size: 0.8rem;">Replly</a>
            </div> -->
        </div>
    </div>
    <script>
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
            formattedTime = formattedMonth + ' ' + day + ' at ' + padZero(hours) + ':' + padZero(minutes) + ' ' + ampm;
        }

        // Fungsi untuk menambahkan nol di depan angka satu digit
        function padZero(number) {
            return (number < 10) ? '0' + number : number;
        }

        // Add Comment

        var comment_box = document.getElementById("comment-box");
        var comment = document.getElementById("comment");

        function AddComment() {
            // alert("ba");
            showTime();

            var commentDiv = document.createElement('div');
            commentDiv.style.display = "flex";
            commentDiv.style.alignItems = "center";
            commentDiv.style.marginTop = "25px";

            var profile = document.createElement('div');
            profile.classList.add("profile");
            commentDiv.appendChild(profile);

            var username = document.createElement('div');
            username.classList.add("comment-username");
            username.textContent = "Rizqi";
            commentDiv.appendChild(username);

            var time = document.createElement('div');
            time.style.fontSize = "0.8rem";
            time.style.marginLeft = "7px";
            time.style.color = "#8e8e8e";
            time.textContent = formattedTime;
            commentDiv.appendChild(time);

            var comment_text = document.createElement('div');
            comment_text.textContent = comment_box.value;
            comment_text.classList.add("comment-text");

            comment.appendChild(commentDiv);
            comment.appendChild(comment_text);

        }

        // Add Atttachment
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
            addedInfoDiv.textContent = 'Added ' + addedInfo;
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
    </script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>