<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-transparent">
        <div id="successMessage"
            class="text-green-400 text-3xl font-mono opacity-0 transition-opacity duration-1000">
            ACCESS GRANTED
        </div>

        <div class="mt-6 text-white text-xl font-mono">
            Welcome back, Agent {{ Auth::user()->name }}
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const msg = document.getElementById('successMessage');
            msg.style.opacity = 1;
        });
    </script>
</x-app-layout>
