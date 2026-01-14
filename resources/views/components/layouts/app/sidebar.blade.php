<!-- Sidebar -->
<aside x-show="sidebarOpen"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="-translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition ease-in duration-300"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="-translate-x-full"
       @click.away="if (window.innerWidth < 1024) { sidebarOpen = false; localStorage.setItem('sidebarOpen', false); }"
       class="w-64 bg-charcoal border-r border-gold/20 fixed lg:static inset-y-0 left-0 z-40 overflow-y-auto">
    
    <nav class="p-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}" 
           @click="temporarilyOpenSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('dashboard') ? 'bg-gold text-onyx' : 'text-soft-white hover:bg-gold/20 hover:text-gold' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="font-semibold">Dashboard</span>
        </a>

        <!-- Movies -->
        <a href="{{ route('movies.index') }}" 
           @click="temporarilyOpenSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('movies*') ? 'bg-gold text-onyx' : 'text-soft-white hover:bg-gold/20 hover:text-gold' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
            </svg>
            <span class="font-semibold">Movies</span>
        </a>

        <!-- My Bookings -->
        <a href="#" 
           @click="temporarilyOpenSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-soft-white hover:bg-gold/20 hover:text-gold transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
            </svg>
            <span class="font-semibold">My Bookings</span>
        </a>

        <!-- Schedule -->
        <a href="#" 
           @click="temporarilyOpenSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-soft-white hover:bg-gold/20 hover:text-gold transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-semibold">Schedule</span>
        </a>

        <hr class="border-gold/20 my-4">

        <!-- Profile -->
        <a href="#" 
           @click="temporarilyOpenSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-soft-white hover:bg-gold/20 hover:text-gold transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-semibold">Profile</span>
        </a>
    </nav>
</aside>

<!-- Overlay for mobile -->
<div x-show="sidebarOpen && window.innerWidth < 1024"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false; localStorage.setItem('sidebarOpen', false);"
     class="fixed inset-0 bg-black/50 z-30 lg:hidden">
    </div>