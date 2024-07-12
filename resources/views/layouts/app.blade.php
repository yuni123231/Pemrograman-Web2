<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 16rem; /* Adjust width as needed */
            height: 100vh;
            overflow-y: auto;
            background-color: #1a202c; /* bg-gray-900 */
            border-right: 1px solid #4a5568; /* dark:border-gray-700 */
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 16rem; /* Adjust based on sidebar width */
            right: 0;
            z-index: 1000; /* Ensure navbar is above other content */
        }

        .main-content {
            margin-left: 16rem; /* Adjust based on sidebar width */
            margin-top: 4rem; /* Adjust based on navbar height */
            padding: 1rem;
        }
    </style>
</head>

<body>
    <header class="navbar px-4 py-2 shadow bg-white">
        <div class="flex justify-between">
            <div class="flex items-center">
                <a class="navbar-brand ps-3" href="" style="font-size: 2rem; font-weight: bold;">SPK WP</a>
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars-staggered"></i></button>
            </div>
            <div class="flex items-center">
                
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=100&h=100&q=80" alt="Profle" class="h-8 w-8 rounded-full">
                    <span class="ml-4 text-sm hidden md:inline-block">{{ auth()->user()->name }}</span>
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>
                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false">
                        <ul>
                            <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="{{ route('admin/profile') }}">My Profile</a></li>
                            <li class="px-4 py-3 hover:bg-gray-200"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>
            </div>
        </div>
    </header>

    <div class="sidebar text-center">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600"></i>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3">Admin</h1>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <div class="sb-sidenav-menu-heading" style="color: grey; text-align: left; padding-left: 10px;">HOME</div>
        <a href="{{ route('admin/home') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</span>
            </div>
        </a>
        <div class="sb-sidenav-menu-heading" style="color: grey; text-align: left; padding-left: 10px;">DATA</div>
        <a href="{{ route('admin/kriterias') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-clipboard"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Kriteria</span>
            </div>
        </a>
        <a href="{{ route('admin/subkriteria') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-clipboard-plus"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Sub Kriteria</span>
            </div>
        </a>
        <a href="{{ route('admin/alternatif') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-file-text"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Alternatif</span>
            </div>
        </a>
        <a href="{{ route('admin/penilaian') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-files"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Penilaian</span>
            </div>
        </a>
        <a href="{{ route('admin/perhitungan') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-code"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Perhitungan</span>
            </div>
        </a>
        <a href="{{ route('admin/hasil_akhir') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-code-slash"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Hasil Akhir</span>
            </div>
        </a>
        <div class="sb-sidenav-menu-heading" style="color: grey; text-align: left; padding-left: 10px;">SETTING</div>
        <a href="{{ route('admin/profile') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-person-circle"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Profile</span>
            </div>
        </a>
    </div>

    <div class="main-content">
        <div>@yield('contents')</div>
    </div>
</body>

</html>
