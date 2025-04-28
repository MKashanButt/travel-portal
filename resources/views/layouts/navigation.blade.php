<nav x-data="{ open: false }"
    class="w-64 min-h-screen bg-white dark:bg-[#161615] border-r border-[#19140035] dark:border-[#3E3E3A]">
    <!-- Logo -->
    <div class="h-16 flex items-center px-4 border-b border-[#19140035] dark:border-[#3E3E3A]">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="mt-4">
        <!-- Main Section -->
        <div class="px-4 space-y-1">
            <p class="text-xs font-semibold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider mb-2">Main</p>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block py-2">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('agent-sales.index')" :active="request()->routeIs('agent-sales.*')" class="block py-2">
                {{ __('Agent Sales') }}
            </x-nav-link>
        </div>

        <!-- Travel Section -->
        <div class="px-4 mt-6 space-y-1">
            <p class="text-xs font-semibold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider mb-2">Travel</p>
            <x-nav-link :href="route('airlines.index')" :active="request()->routeIs('airlines.*')" class="block py-2">
                {{ __('Airlines') }}
            </x-nav-link>
            @if (Auth::check() && Auth::user()->isAdmin())
                <x-nav-link :href="route('gds.index')" :active="request()->routeIs('gds.*')" class="block py-2">
                    {{ __('GDS') }}
                </x-nav-link>
                <x-nav-link :href="route('pccs.index')" :active="request()->routeIs('pccs.*')" class="block py-2">
                    {{ __('PCC') }}
                </x-nav-link>
            @endif
        </div>

        @if (Auth::check() && Auth::user()->isAdmin())
            <!-- Settings Section -->
            <div class="px-4 mt-6 space-y-1">
                <p class="text-xs font-semibold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider mb-2">
                    Settings
                </p>
                <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')" class="block py-2">
                    {{ __('Roles') }}
                </x-nav-link>
                <x-nav-link :href="route('credit-types.index')" :active="request()->routeIs('credit-types.*')" class="block py-2">
                    {{ __('Credit Types') }}
                </x-nav-link>
                <x-nav-link :href="route('visa-types.index')" :active="request()->routeIs('visa-types.*')" class="block py-2">
                    {{ __('Visa Types') }}
                </x-nav-link>
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="block py-2">
                    {{ __('Users') }}
                </x-nav-link>
            </div>
        @endif

        <!-- User Menu -->
        <div class="px-4 mt-6 pt-4 border-t border-[#19140035] dark:border-[#3E3E3A]">
            <div class="flex items-center">
                <div class="text-sm">
                    <div class="font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-[#706f6c] dark:text-[#A1A09A]">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-nav-link class="flex justify-between py-2" :href="Auth::user()->isAdmin() ? route('limit.index') : ''">
                    <div class="font-medium">Limit</div>
                    @if (!Auth::user()->isAdmin())
                        <div class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                            {{ formatNumber($limit_used) }}/{{ formatNumber($limit) }}</div>
                    @endif
                </x-nav-link>
            </div>
            <div class="space-y-1">
                @if (Auth::check() && Auth::user()->isAdmin())
                    <x-nav-link :href="route('profile.edit')" class="block py-2">
                        {{ __('Profile') }}
                    </x-nav-link>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block py-2">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <!-- Mobile menu content here if needed -->
    </div>
</nav>
