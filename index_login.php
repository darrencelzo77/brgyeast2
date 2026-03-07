<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL ^ E_WARNING);
    
    session_start();
// echo md5('darren');
    if(!isset($_SESSION)) {
        $showdate = date("Y-m-d");
        date_default_timezone_set('Asia/Manila');
        $showtime = date("h:i:a");
        $_SESSION['storedate'] = $showdate;
        $_SESSION['storetime'] = $showtime;
    }

    require('classes/main.class.php');
    $bmiclass = new BMISClass;
    $bmiclass->login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Modern Site Barangay Information System</title>
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0f2f7; /* Light blue background for browser */
        }

        .eye-icon {
            cursor: pointer;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.5);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-4xl flex flex-col md:flex-row mx-4">

        <!-- Left Side Logo -->
        <div class="md:w-1/2 flex items-center justify-center mb-6 md:mb-0">
            <img src="assets/logos1.png" alt="Barangay Logo" class="w-32 md:w-48 h-auto rounded-full shadow-md">
        </div>

        <!-- Right Side Form -->
        <div class="md:w-1/2">
            <h1 class="text-xl md:text-2xl font-bold text-center mb-6">
                East Modern Site Barangay Information System
            </h1>

            <form method="post" action="">
                
                <!-- Email Input -->
                <div class="mb-4 relative">
                    <label for="email" class="block mb-1 font-medium text-gray-700">Email:</label>
                    <div class="flex items-center border rounded-lg overflow-hidden">
                        <span class="bg-blue-600 text-white px-4 py-2">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" placeholder="Enter Email" required 
                               class="flex-1 px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-4 relative">
                    <label for="password" class="block mb-1 font-medium text-gray-700">Password:</label>
                    <div class="flex items-center border rounded-lg overflow-hidden">
                        <span class="bg-blue-600 text-white px-4 py-2">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required 
                               class="flex-1 px-4 py-2">
                        <span class="absolute right-3 text-gray-600 eye-icon" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <!-- Buttons -->
                <button type="submit" name="login" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg mb-3 transition duration-300">
                        Log-in
                </button>
                <a href="index.php" 
                   class="w-full inline-block text-center bg-green-700 hover:bg-green-800 text-white font-semibold py-2 rounded-lg transition duration-300 mb-4">
                    Back to Homepage
                </a>
            </form>

            <hr class="my-4 border-gray-300">

            <div class="text-center">
                <p class="mb-2 font-medium">Haven't registered yet? / Hindi ka pa rehistrado?</p>
                <button onclick="window.location.href='resident_registration.php';" 
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    Create Account
                </button>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.eye-icon i');

            if(passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>
