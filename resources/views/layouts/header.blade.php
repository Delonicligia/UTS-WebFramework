<header class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
            <a href="{{ route('pemesanan.index') }}" class="text-2xl font-semibold hover:text-indigo-400">Pemesanan Tiket Konser</a>
            <button class="lg:hidden text-white" id="navbar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div class="lg:flex justify-center space-x-4 hidden" id="navbar-menu">
            <a href="{{ route('pemesanan.index') }}" class="hover:text-indigo-400">Pemesanan</a>
            <a href="{{ route('pemesanan.create') }}" class="hover:text-indigo-400">Tambah Pemesanan</a>
        </div>
    </div>
</header>
