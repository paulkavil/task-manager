<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4a5568">
    <title>Offline - Task Manager PWA</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto">
            <div class="text-xl font-bold">Task Manager PWA</div>
        </div>
    </nav>

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
            <div class="mb-6">
                <svg class="h-24 w-24 text-blue-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">You're Offline</h1>
            <p class="text-gray-600 mb-3">It seems you've lost your internet connection. Please check your network and try again.</p>
            <p class="text-gray-600 mb-6">Your tasks will be available once you're back online.</p>
            <button onclick="window.location.reload()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                Try Again
            </button>
        </div>
    </div>

    <footer class="bg-white p-4 text-center text-gray-500 border-t">
        <p>&copy; {{ date('Y') }} Task Manager PWA. All rights reserved.</p>
    </footer>
</body>
</html>
