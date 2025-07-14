<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee ID Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white shadow-2xl rounded-3xl overflow-hidden grid md:grid-cols-2">
            <div class="p-8 flex flex-col justify-center">
                <h1 class="text-4xl font-bold mb-4 text-blue-600">Employee Verification</h1>
                <p class="text-gray-600 mb-6">
                    A modern system to verify employee identities using secure QR codes and verified digital ID cards.
                </p>
                <a href="/admin" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                    Login to Admin Panel
                </a>
            </div>
            <div class="bg-blue-100 flex items-center justify-center p-6">
                <img src="https://via.placeholder.com/250x350.png?text=ID+Card+Preview" alt="ID Card Preview" class="rounded-xl shadow-md">
            </div>
        </div>
    </div>
</body>
</html>
