<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ourtaskmvc/public/css/detail.css">
    <title>Task Details</title>
</head>

<body style="max-width: 100%;">
    <div class="header">
        <div class="title">
            Group Project
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
        <?php foreach($data['task'] as $task){?>
        <div class="title" style="margin-bottom: 10px; padding: 5px; width: 100%;"><?=$task['name']?></div>
        <div class="task-detail">
            <div style="margin-bottom: 10px; height: fit-content; width: 100%; border: solid 1px gray; border-radius: 5px; box-sizing: border-box; padding: 5px;" ><?=$task['description']?></div>
            <div style="font: 200 14px 'Poppins',sans-serif; color: black;">
                Due date: <?=date('l, i M Y')?>
            </div>
        </div>
        <div style="font: 400 20px 'Poppins',sans-serif; margin-top: 30px;">Assigned to</div>
        <div
            style="margin-bottom: 20px; display: flex; align-items: center; overflow: hidden; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; ::-webkit-scrollbar{display: none;}">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <img class="member-img" src="person1.jpeg" alt="" style="height: 40px; width: 40px; margin: 10px;">
            <div class="member-img"
                style="display: flex; align-items: center; justify-content: center; font-size: 25px; box-sizing: border-box; border: dotted 3px; height: 40px; width: 40px;">
                +</div>
            <!-- <svg class="avatar-image-40 member-img" width="38" height="37" viewBox="0 0 38 37" fill="none" style="height: 40px; width: 40px; margin: 10px;"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="18.9186" cy="18.5386" r="18.5" stroke="black" stroke-width="1.85" stroke-linecap="round"
                    stroke-linejoin="round" stroke-dasharray="4.62 4.62" />
                <path
                    d="M25.2775 18.879C25.2775 19.0984 25.1902 19.3088 25.0348 19.4639C24.8794 19.619 24.6687 19.7062 24.4489 19.7062H19.2009V24.9447C19.2009 25.1641 19.1136 25.3745 18.9582 25.5296C18.8028 25.6847 18.592 25.7719 18.3723 25.7719C18.1525 25.7719 17.9417 25.6847 17.7863 25.5296C17.6309 25.3745 17.5436 25.1641 17.5436 24.9447V19.7062H12.2956C12.0758 19.7062 11.8651 19.619 11.7097 19.4639C11.5543 19.3088 11.467 19.0984 11.467 18.879C11.467 18.6597 11.5543 18.4493 11.7097 18.2942C11.8651 18.139 12.0758 18.0519 12.2956 18.0519H17.5436V12.8133C17.5436 12.594 17.6309 12.3836 17.7863 12.2285C17.9417 12.0734 18.1525 11.9862 18.3723 11.9862C18.592 11.9862 18.8028 12.0734 18.9582 12.2285C19.1136 12.3836 19.2009 12.594 19.2009 12.8133V18.0519H24.4489C24.6687 18.0519 24.8794 18.139 25.0348 18.2942C25.1902 18.4493 25.2775 18.6597 25.2775 18.879Z"
                    fill="#181818" />
            </svg> -->
        </div>
        <div class="task" style="font: 400 20px 'Poppins',sans-serif; overflow: hidden; overflow-y: auto;">Task
            <div>

                <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="member-img checked" style="border: solid 1px;">
                            <svg class="check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9422 6.06717L7.94217 16.0672C7.88412 16.1253 7.81519 16.1714 7.73932 16.2028C7.66344 16.2343 7.58212 16.2505 7.49998 16.2505C7.41785 16.2505 7.33652 16.2343 7.26064 16.2028C7.18477 16.1714 7.11584 16.1253 7.05779 16.0672L2.68279 11.6922C2.56552 11.5749 2.49963 11.4158 2.49963 11.25C2.49963 11.0841 2.56552 10.9251 2.68279 10.8078C2.80007 10.6905 2.95913 10.6246 3.12498 10.6246C3.29083 10.6246 3.44989 10.6905 3.56717 10.8078L7.49998 14.7414L17.0578 5.18279C17.1751 5.06552 17.3341 4.99963 17.5 4.99963C17.6658 4.99963 17.8249 5.06552 17.9422 5.18279C18.0594 5.30007 18.1253 5.45913 18.1253 5.62498C18.1253 5.79083 18.0594 5.94989 17.9422 6.06717Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div style="margin-left: 30px;">Create Design
                            <div style="display: flex; align-items: center; font-size: 18px; margin-top: 5px;">
                                <svg style="margin-right: 10px;" class="flag" width="25" height="25" viewBox="0 0 25 25"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path
                                            d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                            fill="black" />
                                    </g>
                                </svg>
                                25 hr
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 10px;">
                        <img src="person1.jpeg" class="member-img" alt="">
                        <img src="person1.jpeg" class="member-img" alt="">
                    </div>
                </div>
                <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="member-img checked" style="border: solid 1px;">
                            <svg class="check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9422 6.06717L7.94217 16.0672C7.88412 16.1253 7.81519 16.1714 7.73932 16.2028C7.66344 16.2343 7.58212 16.2505 7.49998 16.2505C7.41785 16.2505 7.33652 16.2343 7.26064 16.2028C7.18477 16.1714 7.11584 16.1253 7.05779 16.0672L2.68279 11.6922C2.56552 11.5749 2.49963 11.4158 2.49963 11.25C2.49963 11.0841 2.56552 10.9251 2.68279 10.8078C2.80007 10.6905 2.95913 10.6246 3.12498 10.6246C3.29083 10.6246 3.44989 10.6905 3.56717 10.8078L7.49998 14.7414L17.0578 5.18279C17.1751 5.06552 17.3341 4.99963 17.5 4.99963C17.6658 4.99963 17.8249 5.06552 17.9422 5.18279C18.0594 5.30007 18.1253 5.45913 18.1253 5.62498C18.1253 5.79083 18.0594 5.94989 17.9422 6.06717Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div style="margin-left: 30px;">Create Design
                            <div style="display: flex; align-items: center; font-size: 18px; margin-top: 5px;">
                                <svg style="margin-right: 10px;" class="flag" width="25" height="25" viewBox="0 0 25 25"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path
                                            d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                            fill="black" />
                                    </g>
                                </svg>
                                25 hr
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 10px;">
                        <img src="person1.jpeg" class="member-img" alt="">
                        <img src="person1.jpeg" class="member-img" alt="">
                    </div>
                </div>
                <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="member-img" style="border: solid 1px;"></div>
                        <div style="margin-left: 30px;">Create Design
                            <div style="display: flex; align-items: center; font-size: 18px; margin-top: 5px;">
                                <svg style="margin-right: 10px;" class="flag" width="25" height="25" viewBox="0 0 25 25"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path
                                            d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                            fill="black" />
                                    </g>
                                </svg>
                                25 hr
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 10px;">
                        <img src="person1.jpeg" class="member-img" alt="">
                        <img src="person1.jpeg" class="member-img" alt="">
                    </div>
                </div>
                <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="member-img" style="border: solid 1px;"></div>
                        <div style="margin-left: 30px;">Create Design
                            <div style="display: flex; align-items: center; font-size: 18px; margin-top: 5px;">
                                <svg style="margin-right: 10px;" class="flag" width="25" height="25" viewBox="0 0 25 25"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path
                                            d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                            fill="black" />
                                    </g>
                                </svg>
                                25 hr
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 10px;">
                        <img src="person1.jpeg" class="member-img" alt="">
                        <img src="person1.jpeg" class="member-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <button
        style="background-color: rgba(62, 74, 222, 1); border: none; height: 30px; width: 100%; margin-top: 30px; border-radius: 10px;">
        Add
        New Task +
    </button>
    <script>
        setInterval(function () {
            var h1 = document.querySelector(".header");
            var h2 = document.querySelector(".task-title");
            var h3 = document.querySelector(".task-detail");

            var h4 = h1.offsetHeight + 75;
            var h5 = h2.offsetHeight + 50;
            var h6 = h3.offsetHeight;

            var h = h4 + h5 + h6;

            document.querySelector(".task").style.height = "calc(100vh - " + h + "px)";
        }, 1000);

    </script>
</body>

</html>