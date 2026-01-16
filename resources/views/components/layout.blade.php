<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ONYX Cinema - Premium Movie Experience' }}</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'onyx': '#0B0B0D',
                        'charcoal': '#1C1F26',
                        'gold': '#D4AF37',
                        'cyan': '#00E5FF',
                        'soft-white': '#F5F5F5',
                        'silver': '#B3B3B3',
                    },
                    fontFamily: {
                        'display': ['Playfair Display', 'serif'],
                        'body': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Color utility fallbacks -->
    <style>
        :root {
            --onyx: #0B0B0D;
            --charcoal: #1C1F26;
            --gold: #D4AF37;
            --cyan: #00E5FF;
            --soft-white: #F5F5F5;
            --silver: #B3B3B3;
        }

        .bg-onyx { background-color: var(--onyx) !important }
        .bg-charcoal { background-color: var(--charcoal) !important }
        .bg-gold { background-color: var(--gold) !important }
        .bg-cyan { background-color: var(--cyan) !important }
        .text-gold { color: var(--gold) !important }
        .text-soft-white { color: var(--soft-white) !important }
        .text-silver { color: var(--silver) !important }
        .text-onyx { color: var(--onyx) !important }
        .border-gold { border-color: var(--gold) !important }
        .border-gold\/20 { border-color: rgba(212, 175, 55, 0.2) !important }
        .hover\:bg-gold\/10:hover { background-color: rgba(212, 175, 55, 0.1) !important }
        .font-display { font-family: 'Playfair Display', serif }
    </style>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        @keyframes fadeInUp { from { opacity:0; transform:translateY(30px);} to {opacity:1; transform:translateY(0);} }
        @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-10px);} }
        .animate-fadeInUp { animation: fadeInUp 1s ease; }
        .animate-float { animation: float 3s ease-in-out infinite; }
    </style>

    {{ $styles ?? '' }}
</head>

<body class="bg-onyx text-soft-white">

<!-- HEADER -->
<header class="bg-onyx border-b border-gold/20 sticky top-0 z-50 backdrop-blur-md">
    <div class="container mx-auto px-6 lg:px-12 py-5">
        <div class="flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ url('/') }}"
               class="font-display text-3xl font-bold text-gold tracking-wider hover:drop-shadow-[0_0_20px_rgba(212,175,55,0.6)] transition-all duration-300">
               ONYX
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8">

                <!-- Home -->
                <a href="{{ url('/') }}"
                   class="relative text-soft-white hover:text-cyan transition-colors duration-300 group {{ Request::is('/') ? 'text-gold' : '' }}">
                   Home
                   <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan group-hover:w-full transition-all duration-300 {{ Request::is('/') ? 'w-full bg-gold' : '' }}"></span>
                </a>

                <!-- Always visible Movies for all users -->
                <a href="{{ route('movies.index') }}"
                   class="relative text-soft-white hover:text-cyan transition-colors duration-300 group {{ Request::is('movies') ? 'text-gold' : '' }}">
                   🎬 Movies
                   <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan group-hover:w-full transition-all duration-300 {{ Request::is('movies') ? 'w-full bg-gold' : '' }}"></span>
                </a>

                <!-- Schedule / About / Contact -->
                <a href="{{ url('/schedule') }}" class="relative text-soft-white hover:text-cyan transition-colors duration-300 group {{ Request::is('schedule*') ? 'text-gold' : '' }}">Schedule</a>
                <a href="{{ url('/about') }}" class="relative text-soft-white hover:text-cyan transition-colors duration-300 group {{ Request::is('about') ? 'text-gold' : '' }}">About</a>
                <a href="{{ url('/contact') }}" class="relative text-soft-white hover:text-cyan transition-colors duration-300 group {{ Request::is('contact') ? 'text-gold' : '' }}">Contact</a>

                <!-- Authenticated Users: Manage Dropdown -->
                @auth
                <div class="relative group">
                    <a href="#"
                       class="relative text-soft-white hover:text-cyan transition-colors duration-300 flex items-center gap-1">
                       Manage
                       <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                       </svg>
                    </a>

                    <div class="absolute left-0 mt-2 w-56 bg-charcoal border-2 border-gold rounded-lg shadow-[0_0_30px_rgba(212,175,55,0.3)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">

                        <!-- Other Manage links -->
                        <a href="{{ route('movies.dashboard') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Movies</a>
                        <a href="{{ route('user.dashboard') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Users</a>
                        <a href="{{ route('cinemas.index') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Cinemas</a>
                        <a href="{{ route('genres.index') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Genres</a>
                        <a href="{{ route('halls.index') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Halls</a>
                        <a href="{{ route('plays.index') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Plays</a>
                        <a href="{{ route('tickets.index') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200 rounded-b-lg">Tickets</a>
                    </div>
                </div>
                @endauth

                <!-- Authenticated User actions -->
                @auth
                    <a href="{{ route('settings.profile.edit') }}" class="text-soft-white hover:text-cyan transition-colors duration-300">My Account</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-gold text-onyx px-6 py-2.5 rounded-full font-semibold text-sm hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(212,175,55,0.4),0_0_15px_#00E5FF] transition-all duration-300">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-gold text-onyx px-6 py-2.5 rounded-full font-semibold text-sm hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(212,175,55,0.4),0_0_15px_#00E5FF] transition-all duration-300">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 px-6 py-2.5 border border-gold text-gold rounded-full font-semibold text-sm hover:bg-gold/10 transition-all duration-300">Sign Up</a>
                @endauth

            </nav>

            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuToggle" class="lg:hidden text-gold text-3xl focus:outline-none">☰</button>

        </div>

        <!-- Mobile Navigation -->
        <nav id="mobileNav" class="lg:hidden hidden flex-col gap-4 mt-6 pb-4">
            <a href="{{ url('/') }}" class="text-soft-white hover:text-cyan transition-colors">Home</a>
            <a href="{{ route('movies.index') }}" class="text-soft-white hover:text-cyan transition-colors">🎬 All Movies</a>
            <a href="{{ url('/schedule') }}" class="text-soft-white hover:text-cyan transition-colors">Schedule</a>
            <a href="{{ url('/about') }}" class="text-soft-white hover:text-cyan transition-colors">About</a>
            <a href="{{ url('/contact') }}" class="text-soft-white hover:text-cyan transition-colors">Contact</a>

            @auth
            <div>
                <button id="mobileManageToggle" class="text-soft-white hover:text-cyan transition-colors flex items-center gap-2 w-full">
                    Manage
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobileManageMenu" class="hidden flex-col gap-2 ml-4 mt-2">
                    <a href="{{ route('movies.dashboard') }}" class="text-silver hover:text-cyan transition-colors">🎬 Dashboard</a>
                    <a href="{{ route('user.dashboard') }}" class="block px-4 py-3 text-soft-white hover:bg-gold hover:text-onyx transition-colors duration-200">Users</a>
                    <a href="{{ route('cinemas.index') }}" class="text-silver hover:text-cyan transition-colors">Cinemas</a>
                    <a href="{{ route('genres.index') }}" class="text-silver hover:text-cyan transition-colors">Genres</a>
                    <a href="{{ route('halls.index') }}" class="text-silver hover:text-cyan transition-colors">Halls</a>
                    <a href="{{ route('plays.index') }}" class="text-silver hover:text-cyan transition-colors">Plays</a>
                    <a href="{{ route('tickets.index') }}" class="text-silver hover:text-cyan transition-colors">Tickets</a>
                </div>
            </div>

            <a href="{{ route('settings.profile.edit') }}" class="text-soft-white hover:text-cyan transition-colors">My Account</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-gold text-onyx px-6 py-2.5 rounded-full font-semibold text-sm w-full">Logout</button>
            </form>
            @else
                <a href="{{ route('login') }}" class="bg-gold text-onyx px-6 py-2.5 rounded-full font-semibold text-sm text-center">Sign In</a>
                <a href="{{ route('register') }}" class="mt-3 block bg-onyx/20 text-gold px-6 py-2.5 rounded-full font-semibold text-sm text-center">Sign Up</a>
            @endauth
        </nav>
    </div>
</header>

    <!-- MAIN CONTENT -->
    <main>
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-onyx border-t border-gold/20 mt-20">
        <div class="container mx-auto px-6 lg:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- About Section -->
                <div>
                    <h3 class="font-display text-2xl text-gold mb-4">ONYX Cinema</h3>
                    <p class="text-silver leading-relaxed mb-6">
                        Experience luxury cinema like never before. Premium seats, crystal-clear sound, and
                        unforgettable moments.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-2xl hover:text-cyan transition-colors duration-300"
                            aria-label="Facebook">📘</a>
                        <a href="#" class="text-2xl hover:text-cyan transition-colors duration-300"
                            aria-label="Instagram">📷</a>
                        <a href="#" class="text-2xl hover:text-cyan transition-colors duration-300"
                            aria-label="Twitter">🐦</a>
                        <a href="#" class="text-2xl hover:text-cyan transition-colors duration-300"
                            aria-label="YouTube">📺</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-display text-xl text-gold mb-4">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href=""
                                class="text-silver hover:text-cyan transition-colors duration-300">Home</a></li>
                        <li><a href="" class="text-silver hover:text-cyan transition-colors duration-300">Now
                                Showing</a></li>
                        <li><a href=""
                                class="text-silver hover:text-cyan transition-colors duration-300">Schedule</a></li>
                        <li><a href="" class="text-silver hover:text-cyan transition-colors duration-300">About
                                Us</a></li>
                        <li><a href=""
                                class="text-silver hover:text-cyan transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="font-display text-xl text-gold mb-4">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-silver hover:text-cyan transition-colors duration-300">Premium Seating</a>
                        </li>
                        <li><a href="#"
                                class="text-silver hover:text-cyan transition-colors duration-300">Private
                                Screenings</a></li>
                        <li><a href="#" class="text-silver hover:text-cyan transition-colors duration-300">VIP
                                Experience</a></li>
                        <li><a href="#" class="text-silver hover:text-cyan transition-colors duration-300">Gift
                                Cards</a></li>
                        <li><a href="#"
                                class="text-silver hover:text-cyan transition-colors duration-300">Membership</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="font-display text-xl text-gold mb-4">Contact Us</h3>
                    <ul class="space-y-3 text-silver">
                        <li class="flex items-start gap-2">
                            <span>📍</span>
                            <span>123 Cinema Boulevard<br>Los Angeles, CA 90028</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📞</span>
                            <a href="tel:+11234567890" class="hover:text-cyan transition-colors duration-300">+1 (123)
                                456-7890</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>✉️</span>
                            <a href="mailto:info@onyxcinema.com"
                                class="hover:text-cyan transition-colors duration-300">info@onyxcinema.com</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>🕐</span>
                            <span>Open Daily: 10 AM - 12 AM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gold/10 mt-12 pt-8 text-center">
                <p class="text-silver">
                    &copy; {{ date('Y') }} ONYX Cinema. All rights reserved. |
                    <a href="#" class="hover:text-cyan transition-colors duration-300">Privacy Policy</a> |
                    <a href="#" class="hover:text-cyan transition-colors duration-300">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('hidden');
            mobileNav.classList.toggle('flex');
        });

        // Mobile Movies Dropdown Toggle
        document.getElementById('mobileMoviesToggle')?.addEventListener('click', function() {
            const moviesMenu = document.getElementById('mobileMoviesMenu');
            moviesMenu.classList.toggle('hidden');
            moviesMenu.classList.toggle('flex');
        });

        // Mobile Manage Dropdown Toggle
        document.getElementById('mobileManageToggle')?.addEventListener('click', function() {
            const manageMenu = document.getElementById('mobileManageMenu');
            manageMenu.classList.toggle('hidden');
            manageMenu.classList.toggle('flex');
        });
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const toggle = document.getElementById('mobileMenuToggle');

            if (mobileNav && toggle && !mobileNav.contains(event.target) && !toggle.contains(event.target)) {
                mobileNav.classList.add('hidden');
                mobileNav.classList.remove('flex');
            }
        });
    </script>

    {{ $scripts ?? '' }}
</body>

</html>

