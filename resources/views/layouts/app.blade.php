<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="matrixController()" x-init="init()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body :class="matrix ? 'font-sans antialiased' : 'font-sans antialiased bg-gray-100 dark:bg-gray-900'">
    <!-- Matrix Canvas -->
    <canvas id="matrixCanvas" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; display: none;"></canvas>

    <!-- Navigation -->
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Optional Header -->
        @isset($header)
            <header :class="matrix ? 'bg-black bg-opacity-70 text-white shadow relative z-10' : 'bg-white dark:bg-gray-800 shadow relative z-10 text-gray-900 dark:text-gray-100'">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Main Content -->
        <main :class="matrix ? 'relative z-10 max-w-3xl mx-auto mt-10 bg-black bg-opacity-70 p-6 rounded-lg shadow-lg text-white' : 'relative z-10 max-w-3xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow text-gray-900 dark:text-gray-100'">
            <!-- Matrix Mode Toggle -->
            <div class="mb-4">
                <label class="inline-flex items-center text-sm font-medium text-gray-700">
                    <input type="checkbox" x-model="matrix" class="form-checkbox text-green-500 focus:ring-green-500">
                    <span class="ml-2">Activate Matrix Mode</span>
                </label>
            </div>

            {{ $slot }}
        </main>
    </div>

    <!-- Matrix Controller Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('matrixController', () => ({
                matrix: localStorage.getItem('matrix') === 'true',
                matrixInterval: null,
                drops: [],
                canvas: null,
                ctx: null,

                init() {
                    localStorage.setItem('matrix', this.matrix);
                    this.canvas = document.getElementById("matrixCanvas");
                    this.ctx = this.canvas.getContext("2d");
                    this.canvas.width = window.innerWidth;
                    this.canvas.height = window.innerHeight;

                    const columns = this.canvas.width / 16;
                    this.drops = Array(Math.floor(columns)).fill(1);

                    this.$watch('matrix', val => {
                        localStorage.setItem('matrix', val);
                        if (val) {
                            this.canvas.style.display = "block";
                            this.startMatrix();
                        } else {
                            this.canvas.style.display = "none";
                            clearInterval(this.matrixInterval);
                            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                        }
                    });

                    if (this.matrix) {
                        this.canvas.style.display = "block";
                        this.startMatrix();
                    }
                },

                startMatrix() {
                    const letters = "アァイィウエエオカキクケコサシスセソタチツテトナニヌネノABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    const fontSize = 16;

                    this.matrixInterval = setInterval(() => {
                        this.ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
                        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
                        this.ctx.fillStyle = "#0F0";
                        this.ctx.font = `${fontSize}px monospace`;

                        for (let i = 0; i < this.drops.length; i++) {
                            const text = letters.charAt(Math.floor(Math.random() * letters.length));
                            this.ctx.fillText(text, i * fontSize, this.drops[i] * fontSize);
                            this.drops[i]++;
                            if (this.drops[i] * fontSize > this.canvas.height && Math.random() > 0.975) {
                                this.drops[i] = 0;
                            }
                        }
                    }, 50);
                }
            }));
        });
    </script>
</body>
</html>
