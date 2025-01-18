<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
            Management AC
        </a>
        <ul class="mt-6">
            @if (auth()->user()->role == 'admin')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.home'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                        href="{{ route('admin.home') }}">
                        <x-heroicon-o-home class="w-5 h-5" />
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pengingat.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pengingat.index') }}">
                        <x-heroicon-o-calendar-date-range class="w-5 h-5" />
                        <span class="ml-4">Pengingat Service</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.survey.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.survey.index') }}">
                        <x-heroicon-o-star class="w-5 h-5" />
                        <span class="ml-4">Survey Kepuasan</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.jasa.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.jasa.index') }}">
                        <x-heroicon-o-wrench-screwdriver class="w-5 h-5" />
                        <span class="ml-4">Kelola Jasa</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.order.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.order.index') }}">
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5" />
                        <span class="ml-4">Manajemen Order</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pelanggan.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pelanggan.index') }}">
                        <x-heroicon-o-users class="w-5 h-5" />
                        <span class="ml-4">Kelola Pelanggan</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pengguna.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pengguna.index') }}">
                        <x-heroicon-o-user-circle class="w-5 h-5" />
                        <span class="ml-4">Kelola Pengguna</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.history.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.history.index') }}">
                        <x-heroicon-o-clock class="w-5 h-5" />
                        <span class="ml-4">Riwayat Order</span>
                    </a>
                </li>
            @endif
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.penugasan.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.penugasan.index') }}">
                    <x-heroicon-o-document-text class="w-5 h-5" />
                    <span class="ml-4">Penugasan</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.pengeluaran.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.pengeluaran.index') }}">
                    <x-heroicon-o-shopping-cart class="w-5 h-5" />
                    <span class="ml-4">Kelola Pengeluaran</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
            Management AC
        </a>
        <ul class="mt-6">
            @if (auth()->user()->role == 'admin')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.home'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                        href="{{ route('admin.home') }}">
                        <x-heroicon-o-home class="w-5 h-5" />
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pengingat.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pengingat.index') }}">
                        <x-heroicon-o-calendar-date-range class="w-5 h-5" />
                        <span class="ml-4">Pengingat Service</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.survey.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.survey.index') }}">
                        <x-heroicon-o-star class="w-5 h-5" />
                        <span class="ml-4">Survey Kepuasan</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.jasa.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.jasa.index') }}">
                        <x-heroicon-o-wrench-screwdriver class="w-5 h-5" />
                        <span class="ml-4">Kelola Jasa</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.order.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.order.index') }}">
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5" />
                        <span class="ml-4">Manajemen Order</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pelanggan.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pelanggan.index') }}">
                        <x-heroicon-o-users class="w-5 h-5" />
                        <span class="ml-4">Kelola Pelanggan</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.pengguna.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.pengguna.index') }}">
                        <x-heroicon-o-user-circle class="w-5 h-5" />
                        <span class="ml-4">Kelola Pengguna</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.history.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.history.index') }}">
                        <x-heroicon-o-clock class="w-5 h-5" />
                        <span class="ml-4">Riwayat Order</span>
                    </a>
                </li>
            @endif
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.penugasan.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.penugasan.index') }}">
                    <x-heroicon-o-document-text class="w-5 h-5" />
                    <span class="ml-4">Penugasan</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.pengeluaran.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.pengeluaran.index') }}">
                    <x-heroicon-o-shopping-cart class="w-5 h-5" />
                    <span class="ml-4">Kelola Pengeluaran</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
