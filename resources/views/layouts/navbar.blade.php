<header
    id="navbar"
    class="fixed top-0 left-0 w-full z-50 bg-transparent text-white py-4 transition-all duration-500"
>
    <div class="container mx-auto flex justify-between items-center px-4">
        {{-- Logo --}}
        <div class="flex items-center space-x-3">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo FazzDrink"
                class="h-10 w-auto"
            />
            <h1 class="text-2xl font-bold">FazzDrink</h1>
        </div>

        {{-- Desktop Menu --}}
        <nav class="hidden md:flex">
            <ul class="flex space-x-6 font-semibold items-center">
                <li>
                    <a href="{{ route('about') }}" class="hover:underline"
                        >ABOUT US</a
                    >
                </li>
                <li>
                    <a href="{{ route('menu') }}" class="hover:underline"
                        >MENU</a
                    >
                </li>
                <li>
                    <a
                        href="{{ route('how.it.works') }}"
                        class="hover:underline"
                        >HOW IT WORKS</a
                    >
                </li>

                {{-- Keranjang --}}
                <li>
                    <a href="{{ route('cart.index') }}" class="relative">
                        🛒 @if(Auth::check()) @php $count =
                        \App\Models\Cart::where('user_id',
                        Auth::id())->withCount('items')->first()->items_count ??
                        0; @endphp @if($count > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full px-2"
                        >
                            {{ $count }}
                        </span>
                        @endif @endif
                    </a>
                </li>

                {{-- LOGIN/LOGOUT --}}
                <li>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="btn-nav bg-transparent border-white px-2 py-1 rounded-lg font-bold transition duration-500"
                        >
                            LOGOUT
                        </button>
                    </form>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="btn-nav bg-transparent border-white px-2 py-1 rounded-lg font-bold transition duration-500"
                    >
                        LOGIN
                    </a>
                    @endauth
                </li>
            </ul>
        </nav>

        {{-- Hamburger (Mobile Only) --}}
        <button id="menu-toggle" class="md:hidden focus:outline-none text-2xl">
            ☰
        </button>
    </div>

    {{-- Overlay --}}
    <div
        id="overlay"
        class="fixed inset-0 bg-black bg-opacity-40 hidden z-40 transition-opacity duration-300"
    ></div>

    {{-- Mobile Menu (lebih ramping & isi rapat) --}}
    <div
        id="mobile-menu"
        class="fixed top-0 right-0 h-full w-2/3 max-w-[240px] bg-red-600 text-white transform translate-x-full transition-transform duration-300 ease-in-out md:hidden z-50 shadow-lg rounded-l-xl"
    >
        <div class="p-4 flex flex-col space-y-2 font-medium text-base">
            <button id="menu-close" class="self-end text-2xl">&times;</button>

            <a href="{{ route('about') }}" class="hover:underline">ABOUT US</a>
            <a href="{{ route('menu') }}" class="hover:underline">MENU</a>
            <a href="{{ route('how.it.works') }}" class="hover:underline"
                >HOW IT WORKS</a
            >
            <a
                href="{{ route('cart.index') }}"
                class="hover:underline flex items-center gap-2"
            >
                🛒 Cart
            </a>

            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="bg-black px-3 py-1 rounded-md font-bold text-sm"
                >
                    LOGOUT
                </button>
            </form>
            @else
            <a
                href="{{ route('login') }}"
                class="bg-black px-3 py-1 rounded-md font-bold text-sm"
            >
                LOGIN
            </a>
            @endauth
        </div>
    </div>
</header>

<script>
    const navbar = document.getElementById("navbar");
    const navButtons = document.querySelectorAll(".btn-nav");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuToggle = document.getElementById("menu-toggle");
    const menuClose = document.getElementById("menu-close");
    const overlay = document.getElementById("overlay");

    // Scroll effect
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.remove("bg-transparent");
            navbar.classList.add("bg-red-600");
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.remove("bg-red-600");
        }
    });

    // Toggle mobile menu
    menuToggle.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
        mobileMenu.classList.add("translate-x-0");
        overlay.classList.remove("hidden");
        setTimeout(() => overlay.classList.add("opacity-100"), 10);
    });

    function closeMenu() {
        mobileMenu.classList.remove("translate-x-0");
        mobileMenu.classList.add("translate-x-full");
        overlay.classList.remove("opacity-100");
        setTimeout(() => overlay.classList.add("hidden"), 300);
    }

    menuClose.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);
</script>
