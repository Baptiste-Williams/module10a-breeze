<x-guest-layout>
    <style>
        @keyframes flashWarning {
            0%, 100% { background-color: white; }
            50% { background-color: red; }
        }

        .warning-active {
            animation: flashWarning 0.5s infinite;
        }

        #countdown {
            font-size: 20px;
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>

    <div id="countdown">Login within 30 seconds...</div>

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <!-- Welcome Agent Message -->
        <div class="text-center text-red-600 font-bold text-xl mb-4">
            Welcome Agent
        </div>

        <input type="email" name="email" required
            class="w-full mb-4 px-4 py-2 bg-black text-green-300 border border-green-400 rounded focus:outline-none focus:ring-2 focus:ring-green-500 placeholder:text-green-700"
            placeholder="Email" />

        <input type="password" name="password" required
            class="w-full mb-6 px-4 py-2 bg-black text-green-300 border border-green-400 rounded focus:outline-none focus:ring-2 focus:ring-green-500 placeholder:text-green-700"
            placeholder="Password" />

        <button type="submit"
            class="w-full py-2 bg-green-600 text-white font-semibold rounded hover:shadow-[0_0_10px_#0F0] transition duration-300">
            Enter The System
        </button>
    </form>

    <audio id="alarm" preload="auto">
        <source src="{{ asset('sounds/tornado-siren.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('sounds/tornado-siren.ogg') }}" type="audio/ogg">
        Your browser does not support the audio element.
    </audio>

    <script>
        let timeLeft = 30;
        const countdownEl = document.getElementById('countdown');
        const alarm = document.getElementById('alarm');
        const loginForm = document.getElementById('loginForm');
        let submitted = false;

        loginForm.addEventListener('submit', () => submitted = true);

        const timer = setInterval(() => {
            if (submitted) {
                clearInterval(timer);
                return;
            }

            timeLeft--;
            countdownEl.textContent = `Login within ${timeLeft} seconds...`;

            if (timeLeft <= 0) {
                clearInterval(timer);
                document.body.classList.add('warning-active');
                countdownEl.textContent = "⚠️ Alert Triggered! System Breach!";
                alarm.volume = 1.0;
                alarm.load();
                alarm.play().catch(err => console.warn("Autoplay issue:", err));
            }
        }, 1000);
    </script>
</x-guest-layout>
