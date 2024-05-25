<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html { line-height: 1.15; -webkit-text-size-adjust: 100% }
        body { margin: 0; font-family: 'Nunito', sans-serif; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; height: 100vh; position: relative; }
        a { background-color: transparent; color: #d63384; text-decoration: none; }
        a:hover { text-decoration: underline; }
        [hidden] { display: none; }
        .antialiased { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        .relative { position: relative; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .min-h-screen { min-height: 100vh; }
        .bg-gray-100 { background-color: #f7fafc; }
        .dark\:bg-gray-900 { background-color: #1a202c; }
        .text-gray-700 { color: #4a5568; }
        .text-gray-500 { color: #6b7280; }
        .text-gray-300 { color: #d1d5db; }
        .text-gray-900 { color: #111827; }
        .underline { text-decoration: underline; }
        .rounded-lg { border-radius: .5rem; }
        .overflow-hidden { overflow: hidden; }
        .shadow { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06); }
        .max-w-6xl { max-width: 72rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .sm\:px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .lg\:px-8 { padding-left: 2rem; padding-right: 2rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .pt-8 { padding-top: 2rem; }
        .text-center { text-align: center; }
        .mt-2 { margin-top: .5rem; }
        .mt-4 { margin-top: 1rem; }
        .mt-8 { margin-top: 2rem; }
        .ml-4 { margin-left: 1rem; }
        .ml-2 { margin-left: .5rem; }

        .bg-pink {
            background-color: #ffe6f0;
        }
        .border-pink {
            border: 1px solid #d63384;
        }
        .text-pink {
            color: #d63384;
        }
        .font-fancy {
            font-family: 'Great Vibes', cursive;
        }

        /* Custom styles for the main content */
        .welcome-container {
            background-color: #fff0f6;
            border: 2px solid #d63384;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(214, 51, 132, 0.2);
            text-align: center;
        }
        .welcome-title {
            font-family: 'Great Vibes', cursive;
            font-size: 4rem;
            color: #d63384;
        }
        .welcome-subtitle {
            font-size: 1.25rem;
            color: #b83280;
        }
        .link {
            color: #b83280;
            font-weight: 700;
            text-decoration: none;
            margin: 0 10px;
        }
        .link:hover {
            color: #d63384;
            text-decoration: underline;
        }

        /* Position the auth links at the top right */
        .auth-links {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body class="antialiased bg-pink">
    @if (Route::has('login'))
        <div class="auth-links">
            @auth
                <a href="{{ url('/home') }}" class="link">Home</a>
            @else
                <a href="{{ route('login') }}" class="link">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="link">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="welcome-container">
        <h1 class="welcome-title">Welcome to Colour Land</h1>
        <p class="welcome-subtitle">In the trade of timber, wisdom is in knowing the value of the trees and the patience to let them grow.</p>
    </div>
</body>
</html>
