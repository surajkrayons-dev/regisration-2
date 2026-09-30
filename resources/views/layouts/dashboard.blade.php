<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="p-10">

        <h1 class="text-3xl font-bold">

            Dashboard

        </h1>

        <p>

            Welcome,

            {{ auth()->user()->name }}

        </p>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="bg-red-600 text-white px-5 py-2 rounded mt-5">

                Logout

            </button>

        </form>

    </div>

</body>

</html>
