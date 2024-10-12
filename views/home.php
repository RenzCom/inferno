<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(to bottom, #1a0001, #270002, #380103, #4c0101);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* ========= Fire-glows ========== */

        .fire-glow {
            position: absolute;
            filter: blur(100px);
        }

        .fire-glow-1 {
            width: 700px;
            height: 700px;
            left: -200px;
            bottom: -400px;
            opacity: 0.5;
        }

        .fire-glow-2 {
            width: 800px;
            height: 800px;
            right: -200px;
            bottom: -300px;
            opacity: 0.5;
        }

        .fire-glow-3 {
            width: 900px;
            height: 900px;
            left: 50%;
            bottom: -600px;
            transform: translateX(-50%);
            opacity: 0.7;
        }

        .fire-glow-4 {
            width: 1000px;
            height: 1000px;
            left: 10%;
            bottom: -600px;
            transform: translateX(-25%);
            opacity: 0.55;
        }

        .fire-glow-5 {
            width: 1100px;
            height: 1100px;
            right: 10%;
            bottom: -700px;
            transform: translateX(25%);
            opacity: 0.55;
        }

        .fire-glow-6 {
            width: 1200px;
            height: 1200px;
            bottom: -700px;
            left: -200px;
            opacity: 1;
            transform: translateX(-50%);
            opacity: 0.7;
        }

        .container {
            position: relative;
            width: inherit;
            height: inherit;
        }

        .inner-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 100%;
        }

        .inner-glow-1 {
            height: 25%;
            width: 25%;
            background-color: #d86306;
            animation: flickerAnimation 4s ease-in-out infinite;
            z-index: 10;
        }

        .inner-glow-2 {
            height: 65%;
            width: 65%;
            background-color: #a62602;
            animation: flickerAnimation 3s ease-in-out infinite;
            z-index: 9;
        }

        .inner-glow-3 {
            height: 100%;
            width: 100%;
            background-color: #670101;
            animation: flickerAnimation 3.6s ease-in-out infinite;
        }

        @keyframes flickerAnimation {

            0%,
            100% {
                opacity: 0.9;
                scale: 0.98;
            }

            15%,
            80% {
                opacity: 1;
                scale: 1;
            }

            30%,
            60% {
                opacity: 0.8;
                scale: 1.05;
            }

            45%,
            75% {
                opacity: 0.95;
                scale: 0.97;
            }
        }

        /* ======== Sparks ======== */

        .spark {
            position: absolute;
            border-radius: 100%;
            scale: 1;
            z-index: 999;
        }

        .spark .spark-glow {
            width: 200%;
            height: 200%;
            transform: translate(-25%, -25%);
            background-color: inherit;
            border-radius: 100%;
            filter: blur(8px) brightness(1.5);
            z-index: 99;
        }
    </style>
    <link rel="stylesheet" href="/css">
</head>

<body>
    <div class="fire-glow fire-glow-1">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="fire-glow fire-glow-2">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="fire-glow fire-glow-3">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="fire-glow fire-glow-4">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="fire-glow fire-glow-5">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="fire-glow fire-glow-6">
        <div class="container">
            <span class="inner-glow inner-glow-1"></span>
            <span class="inner-glow inner-glow-2"></span>
            <span class="inner-glow inner-glow-3"></span>
        </div>
    </div>
    <div class="flex justify-center items-center h-screen">
        <h1 class="text-6xl text-center bg-gradient-to-r from-red-950 via-red-700 to-red-800 inline-block text-transparent bg-clip-text">Welcome to Inferno</h1>
    </div>
</body>

</html>