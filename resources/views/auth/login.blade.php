<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name', 'Registration Dashboard') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            overflow-x: hidden;
            overflow-y: auto;
            min-height: 100vh;
        }

        .glass-bg {
            position: fixed;
            inset: 0;
            z-index: -2;
            background:
                radial-gradient(circle at 15% 10%, rgba(220, 38, 38, .08), transparent 40%),
                radial-gradient(circle at 85% 90%, rgba(220, 38, 38, .06), transparent 40%),
                #f7f7f6;
        }

        .glass {
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(24px) saturate(170%);
            -webkit-backdrop-filter: blur(24px) saturate(170%);
            border: 1px solid rgba(255, 255, 255, .65);
            box-shadow:
                0 8px 32px rgba(31, 38, 135, .08),
                inset 0 1px 0 rgba(255, 255, 255, .70);
            min-height: 88vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
        }

        .glass-btn {
            background: rgba(185, 28, 28, .92);
            color: #fff;
            transition: .3s;
            box-shadow: 0 8px 18px rgba(185, 28, 28, .25);
        }

        .glass-btn:hover {
            background: rgba(153, 27, 27, .96);
            transform: translateY(-1px);
        }

        .input {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(229, 231, 235, .8);
            background: rgba(255, 255, 255, .70);
            padding: 14px 16px;
            transition: .25s;
            outline: none;
        }

        .input:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 4px rgba(185, 28, 28, .12);
        }

        .floating-circle {
            position: absolute;
            border-radius: 9999px;
            filter: blur(55px);
            opacity: .35;
            animation: float 8s ease-in-out infinite;
        }

        .circle1 {
            width: 260px;
            height: 260px;
            background: #dc2626;
            top: -80px;
            left: -80px;
        }

        .circle2 {
            width: 240px;
            height: 240px;
            background: #f87171;
            right: -70px;
            bottom: -60px;
            animation-delay: 2s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .fade {
            animation: fade .7s ease;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width:1024px) {

            .glass {
                display: block;
                min-height: auto;
            }

            body {
                overflow: auto;
            }

        }

        @media (max-width: 1023px) {

            .glass {
                min-height: auto;
                border-radius: 24px;
            }

            .glass-card {
                width: 100%;
                max-width: 100%;
                padding: 24px;
                border-radius: 24px;
            }

            .input {
                padding: 14px 14px 14px 46px;
                font-size: 15px;
            }

            .glass-btn {
                width: 100%;
                padding: 14px;
                font-size: 16px;
            }

            h2 {
                font-size: 2rem;
            }

        }

        @media (max-width:380px) {

            .glass-card {
                padding: 18px;
            }

            h2 {
                font-size: 28px;
            }

            .input {
                font-size: 14px;
            }

        }
    </style>
</head>

<body class="text-[#1b1b18]" x-data="{ showPassword: false }">

    <div class="glass-bg"></div>

    <div class="min-h-screen flex items-center justify-center px-3 sm:px-6 lg:px-8 py-4 sm:py-8">

        <div
            class="glass rounded-3xl w-full max-w-[1500px] min-h-[88vh] grid lg:grid-cols-[1.2fr_0.8fr] overflow-hidden">

            <!-- Left Panel -->
            <div class="relative hidden lg:flex flex-col justify-center px-20 py-20 overflow-hidden">

                <div class="floating-circle circle1"></div>
                <div class="floating-circle circle2"></div>

                <div class="relative z-10 fade">

                    <span class="inline-flex px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold mb-6">
                        Registration Dashboard
                    </span>

                    <h1 class="text-5xl font-bold leading-tight">
                        Welcome Back
                    </h1>

                    <p class="mt-6 text-gray-600 leading-8 text-lg">
                        Secure access for Admin and Employee.
                        Sign in to manage registrations, students,
                        reports and dashboard securely.
                    </p>

                    <div class="mt-12 space-y-5">

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                                🔒
                            </div>
                            <div>
                                <h3 class="font-semibold">Secure Login</h3>
                                <p class="text-sm text-gray-500">
                                    Protected with Laravel Authentication
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                                👥
                            </div>
                            <div>
                                <h3 class="font-semibold">Role Based Access</h3>
                                <p class="text-sm text-gray-500">
                                    Admin & Employee Permissions
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                                ⚡
                            </div>
                            <div>
                                <h3 class="font-semibold">Fast & Responsive</h3>
                                <p class="text-sm text-gray-500">
                                    Optimized for Desktop & Mobile
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Panel -->
            <div class="flex items-center justify-center px-2 sm:px-6 lg:px-12 py-6 lg:py-10">

                <div class="glass-card rounded-3xl w-full max-w-md lg:max-w-lg p-5 sm:p-8 lg:p-10 fade">

                    <div class="text-center mb-8">

                        <div
                            class="w-20 h-20 rounded-full bg-red-100 mx-auto flex items-center justify-center text-4xl mb-5">
                            🔐
                        </div>

                        <h2 class="text-3xl font-bold">
                            Sign In
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Login to continue
                        </p>

                    </div>
                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3">
                            <ul class="space-y-1 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div
                            class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" class="space-y-6">

                        @csrf

                        {{-- Email --}}
                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Email Address
                            </label>

                            <div class="relative">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                    <path d="M4 4h16v16H4z" opacity=".15" />
                                    <path d="M4 6l8 6 8-6" />

                                </svg>

                                <input type="email" name="email" value="{{ old('email') }}" class="input pl-12"
                                    placeholder="Enter your email" required autofocus>

                            </div>

                        </div>


                        {{-- Password --}}
                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                    <rect x="5" y="11" width="14" height="10" rx="2" />
                                    <path d="M8 11V8a4 4 0 118 0v3" />

                                </svg>

                                <input :type="showPassword ? 'text' : 'password'" name="password"
                                    class="input pl-12 pr-14" placeholder="Enter your password" required>

                                <button type="button" @click="showPassword=!showPassword"
                                    class="absolute right-4 top-3 text-gray-500 hover:text-red-700">

                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12" />
                                        <circle cx="12" cy="12" r="3" />

                                    </svg>

                                    <svg x-show="showPassword" x-cloak xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">

                                        <path
                                            d="M17.94 17.94A10.94 10.94 0 0112 20C5 20 1 12 1 12a21.8 21.8 0 015.06-6.94" />
                                        <path
                                            d="M9.9 4.24A10.94 10.94 0 0112 4c7 0 11 8 11 8a21.8 21.8 0 01-3.17 4.59" />
                                        <line x1="1" y1="1" x2="23" y2="23" />

                                    </svg>

                                </button>

                            </div>

                        </div>


                        {{-- Remember --}}
                        <div class="flex items-center justify-between">

                            <label class="flex items-center gap-2 cursor-pointer">

                                <input type="checkbox" name="remember"
                                    class="rounded border-gray-300 text-red-700 focus:ring-red-600">

                                <span class="text-sm text-gray-600">
                                    Remember Me
                                </span>

                            </label>

                            {{-- Future --}}
                            {{--
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-red-700 hover:underline">
                            Forgot Password?
                        </a>
                        --}}

                        </div>


                        {{-- Login Button --}}
                        <button type="submit" class="glass-btn w-full rounded-2xl py-4 text-base font-semibold">

                            Login

                        </button>

                    </form>

                    <div class="mt-8 text-center">

                        <p class="text-sm text-gray-500">

                            Authorized access only.

                        </p>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }

        ::selection {
            background: rgba(185, 28, 28, .18);
        }

        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }

        .input::placeholder {
            color: #9ca3af;
        }

        .glass-card {
            animation: cardFade .7s ease;
        }

        @keyframes cardFade {
            from {
                opacity: 0;
                transform: translateY(25px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>

</body>

</html>
