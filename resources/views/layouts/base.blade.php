<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="{{ asset('assets/icons/favicon.png') }}">
    <title>Weekly</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/029424212f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <header class="sticky z-52 top-0 left-0 flex items-center justify-between w-full py-2 px-6 shadow-sm bg-white">
        <div class="flex items-center gap-10">
            <div class="w-auto">
                <a href="/" class="text-2xl font-bold font-unbounded text-orange"> Weekly </a>
            </div>
            @yield('header')
        </div>
        <nav class="flex justify-end">
            <ul class="flex gap-7 items-center">
                @auth


                <li class="group">
                    <a href="/organizer/create" class="flex flex-col items-center">
                        <span class="group-hover:text-orange text-orange">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-7">
                                <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </a>
                </li>

                <li>
                    <button class="circl_nv flex justify-center items-center w-[42px] h-[42px] bg-gray-200 hover:bg-gray-300 text-orange rounded-full cursor-pointer overflow-hidden">
                        @if(auth()->user()->avatar)
                        <img class="w-full h-full object-cover" src="{{ auth()->user()->avatar }}" alt="User Avatar">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" class="size-5">
                            <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                        </svg>
                        @endif
                    </button>
                </li>
                @else
                <li>
                    <a href="/login">
                        <button class="w-max h-[42px] border border-2 border-[#f05537] text-[#f05537] px-7 rounded-full text-md font-medium cursor-pointer hover:bg-[#f05537] hover:text-white">
                            Login
                        </button>
                    </a>
                </li>
                <li>
                    <a href="/register">
                        <button class="w-max h-[42px] bg-[#f05537] text-white px-7 rounded-full text-md font-medium cursor-pointer hover:bg-transparent border-2 border-[#f05537] hover:text-[#f05537]">
                            Sign up
                        </button>
                    </a>
                </li>
                @endauth
            </ul>

            <div class="menu_nv absolute right-0 top-full bg-white border border-1 border-gray-300 hidden">
                <ul class="w-60 flex flex-col">
                    <a href="/account/profile">
                        <li class="flex flex-col w-full py-3 px-4 hover:bg-gray-100">
                            <span class="capitalize">{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</span>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                    </a>

                    <div class="w-full h-[1.7px] bg-gray-200"></div>
                    <a href="/setting/profile">
                        <li class="w-full py-3 px-4 hover:bg-gray-100">
                            <span>Settings</span>
                        </li>
                    </a>

                    <div class="w-full h-[1.7px] bg-gray-200"></div>

                    <a href="/logout">
                        <li class="w-full py-3 px-4 hover:bg-gray-100">
                            <span>Log out</span>
                        </li>
                    </a>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

  

    @yield('scripts')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>