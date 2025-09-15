<header
    id="navbar"
    class="fixed top-0 left-0 w-full z-50 bg-transparent text-white py-4 transition-all duration-500"
>
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo FazzDrink"
                class="h-10 w-auto"
            />
            <h1 class="text-2xl font-bold">FazzDrink</h1>
        </div>

        <!-- Navigation -->
        <nav>
            <ul class="flex space-x-4 font-semibold items-center">
                @auth
                <!-- Jika user login -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="btn-nav bg-transparent border border-white px-3 py-1 rounded-lg transition duration-300 hover:bg-white hover:text-black"
                    >
                        LOGOUT
                    </button>
                </form>
                @else
                <!-- Jika user belum login -->
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="border-white px-3 py-1 rounded-lg transition duration-300 hover:bg-white hover:text-black"
                    >
                        MASUK
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('register') }}"
                        class="text-white px-3 py-1 rounded-lg transition duration-300 hover:bg-gray-200"
                    >
                        DAFTAR
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>

<!-- Script untuk ubah navbar saat scroll -->
<script>
    const navbar = document.getElementById("navbar");
    const navButtons = document.querySelectorAll(".btn-nav");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            // Scroll ke bawah → navbar jadi solid
            navbar.classList.remove("bg-transparent");
            navbar.classList.add("bg-red-600");

            navButtons.forEach((btn) => {
                btn.classList.remove(
                    "bg-transparent",
                    "border",
                    "border-white"
                );
                btn.classList.add("bg-black", "text-white");
            });
        } else {
            // Scroll ke atas → navbar transparan
            navbar.classList.add("bg-transparent");
            navbar.classList.remove("bg-red-600");

            navButtons.forEach((btn) => {
                btn.classList.add("bg-transparent", "border", "border-white");
                btn.classList.remove("bg-black", "text-white");
            });
        }
    });
</script>
