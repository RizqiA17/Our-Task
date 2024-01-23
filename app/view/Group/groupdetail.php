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
            Group Project
        </div>
        <div class="back" onclick="window.history.back()">
            <svg class="group" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7.828 11H20V13H7.828L13.192 18.364L11.778 19.778L4 12L11.778 4.22205L13.192 5.63605L7.828 11Z"
                    fill="#363942" />
            </svg>
        </div>
        <div onclick="window.location.href='leader.html'" style="display: flex; justify-content: center; align-items: center; color: white; background-color: #006EE9; font: 200 12px 'Poppins',sans-serif; text-decoration: none; position: absolute; right: 40px; width: 100px; height: 20px; border: solid 1px; border-radius: 10px; ">
        Add Assignment</div>
    </div>
    <div class="container">
        <div class="task-title">
            Web UI
        </div>
        <div class="task-detail">
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum delectus dignissimos voluptas fugiat,
                distinctio reiciendis laborum. Architecto vel reprehenderit iure dolores libero, voluptatem adipisci
                illo ipsa sapiente enim, natus quod?
            </p>
            <div class="bottom-detail">
                <div class="member">
                    Members
                    <div>
                        <img class="member-img" src="person1.jpeg" alt="">
                        <img class="member-img" src="person2.jpeg" alt="">
                        <img class="member-img" src="person1.jpeg" alt="">
                        <img class="member-img" src="person2.jpeg" alt="">
                        <img class="member-img" src="person1.jpeg" alt="">
                        <img class="member-img" src="person2.jpeg" alt="">
                    </div>
                </div>
                <div class="deadline">
                    Deadline
                    <div class="date">
                        Thursday, 20 July 2023
                    </div>
                </div>
            </div>
        </div>
        <div class="task">
            <div class="task-division">
                <div class="task-card" onclick="window.location.href='task.html'">
                    <div class="top">
                        <div class="task-division-title">
                            Buat Figma
                        </div>
                        <div class="day-remain">
                            <svg class="flag" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path
                                        d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                        fill="black" />
                                </g>
                            </svg>
                            25hr
                        </div>
                    </div>
                    <div class="member" style="margin-top: 10px;">
                        <img src="person1.jpeg" alt="" class="member-img">
                        <img src="person2.jpeg" alt="" class="member-img">
                    </div>
                </div>
                <div class="task-card" onclick="window.location.href='task.html'">
                    <div class="top">
                        <div class="task-division-title">
                            Buat Figma
                        </div>
                        <div class="day-remain">
                            <svg class="flag" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path
                                        d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                        fill="black" />
                                </g>
                            </svg>
                            25hr
                        </div>
                    </div>
                    <div class="member" style="margin-top: 10px;">
                        <img src="person1.jpeg" alt="" class="member-img">
                        <img src="person2.jpeg" alt="" class="member-img">
                    </div>
                </div>
                <div class="task-card" onclick="window.location.href='task.html'">
                    <div class="top">
                        <div class="task-division-title">
                            Buat Figma
                        </div>
                        <div class="day-remain">
                            <svg class="flag" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path
                                        d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                        fill="black" />
                                </g>
                            </svg>
                            25hr
                        </div>
                    </div>
                    <div class="member" style="margin-top: 10px;">
                        <img src="person1.jpeg" alt="" class="member-img">
                        <img src="person2.jpeg" alt="" class="member-img">
                    </div>
                </div>
                <div class="task-card" onclick="window.location.href='task.html'">
                    <div class="top">
                        <div class="task-division-title">
                            Buat Figma
                        </div>
                        <div class="day-remain">
                            <svg class="flag" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path
                                        d="M3.39453 4.10153C3.31048 4.17438 3.24296 4.26434 3.19648 4.36539C3.15 4.46644 3.12563 4.57625 3.125 4.68747V21.0937C3.125 21.3009 3.20731 21.4996 3.35382 21.6461C3.50034 21.7927 3.69905 21.875 3.90625 21.875C4.11345 21.875 4.31216 21.7927 4.45868 21.6461C4.60519 21.4996 4.6875 21.3009 4.6875 21.0937V16.7744C7.30371 14.708 9.55762 15.8222 12.1533 17.1074C13.7549 17.8994 15.4795 18.7529 17.3291 18.7529C18.6895 18.7529 20.1162 18.289 21.6084 16.9951C21.6924 16.9222 21.76 16.8323 21.8064 16.7312C21.8529 16.6302 21.8773 16.5204 21.8779 16.4092V4.68747C21.8776 4.53752 21.8341 4.39083 21.7526 4.26493C21.6712 4.13903 21.5552 4.03923 21.4186 3.97745C21.2819 3.91567 21.1304 3.89452 20.982 3.91652C20.8337 3.93852 20.6949 4.00275 20.582 4.10153C17.8477 6.46774 15.5312 5.32126 12.8467 3.99216C10.0654 2.61325 6.91211 1.05368 3.39453 4.10153ZM20.3125 16.04C17.6963 18.1064 15.4424 16.9912 12.8467 15.707C10.4053 14.5009 7.68945 13.1552 4.6875 14.8867V5.05759C7.30371 2.99118 9.55762 4.10544 12.1533 5.38962C14.5947 6.59567 17.3115 7.94138 20.3125 6.20993V16.04Z"
                                        fill="black" />
                                </g>
                            </svg>
                            25hr
                        </div>
                    </div>
                    <div class="member" style="margin-top: 10px;">
                        <img src="person1.jpeg" alt="" class="member-img">
                        <img src="person2.jpeg" alt="" class="member-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(function() {
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