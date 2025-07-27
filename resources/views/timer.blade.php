<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tornado Countdown</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #fff;
            transition: background-color 0.5s ease;
        }

        #countdown {
            font-size: 48px;
            color: red;
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .modal button {
            font-size: 20px;
            padding: 10px 20px;
            cursor: pointer;
            background: red;
            color: white;
            border: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="modal" id="modal">
        <h2>Activate Warning System?</h2>
        <button onclick="activate()">Activate</button>
    </div>

    <h1>Tornado Countdown</h1>
    <div id="countdown">10</div>

    <audio id="alarm" preload="auto">
        <source src="{{ asset('sounds/tornado-siren.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('sounds/tornado-siren.ogg') }}" type="audio/ogg">
        Your browser does not support the audio element.
    </audio>

    <script>
        const countdownEl = document.getElementById('countdown');
        const modal = document.getElementById('modal');
        const alarm = document.getElementById('alarm');

        let time = 10;
        let timer;

        function activate() {
            modal.style.display = 'none'; // hide modal
            alarm.volume = 1.0;
            alarm.load(); // primes audio
            startCountdown();
        }

        function startCountdown() {
            timer = setInterval(() => {
                time--;
                countdownEl.textContent = time;

                if (time <= 0) {
                    clearInterval(timer);
                    countdownEl.textContent = "⚠️ Warning Active ⚠️";
                    document.body.style.backgroundColor = "#ff0000";
                    alarm.play().catch((error) => {
                        console.warn("Autoplay blocked despite activation.");
                    });
                }
            }, 1000);
        }
    </script>
</body>
</html>
