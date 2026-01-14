<header class="bg-charcoal border-b border-gold/20 sticky top-0 z-50">
    <div class="px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo & Menu Toggle -->
            <div class="flex items-center gap-4">
                <button @click="toggleSidebar()" class="text-gold hover:text-cyan transition-colors lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <a href="/" class="font-display text-2xl font-bold text-gold tracking-wider hover:drop-shadow-[0_0_20px_rgba(212,175,55,0.6)] transition-all">
                    ONYX
                </a>
            </div>

            <!-- Right Side -->
            <div class="flex items-center gap-4">
                <span class="text-silver hidden sm:block">{{ Auth::user()->name }}</span>
                
                <form action="{{ route('logout') }}" method="POST" x-data>
                    @csrf
                    <button type="submit" 
                            @click.prevent="formSubmitted = true; $el.closest('form').submit()"
                            :disabled="formSubmitted"
                            class="bg-gold text-onyx px-4 py-2 rounded-lg font-semibold hover:bg-cyan transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-show="!formSubmitted">Logout</span>
                        <span x-show="formSubmitted">Logging out...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>