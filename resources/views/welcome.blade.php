<x-layout title="ONYX Cinema - Premium Movie Experience">

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-onyx/60 via-onyx/80 to-onyx"></div>
        
        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan rounded-full blur-3xl"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 text-center px-6 max-w-4xl animate-fadeInUp">
            <h1 class="font-display text-5xl md:text-7xl font-bold text-gold mb-6 drop-shadow-[0_0_30px_rgba(212,175,55,0.5)]">
                Experience Cinema Redefined
            </h1>
            <p class="text-xl md:text-2xl text-silver mb-10 leading-relaxed">
                Immerse yourself in luxury. Where every frame tells a story and every seat is the best in the house.
            </p>
            <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <a href="" class="bg-gold text-onyx px-10 py-4 rounded-full font-semibold text-lg hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(212,175,55,0.5),0_0_20px_#00E5FF] transition-all duration-300">
                    Book Now
                </a>
                <a href="" class="border-2 border-gold text-soft-white px-10 py-4 rounded-full font-semibold text-lg hover:bg-gold/10 hover:border-cyan hover:text-cyan hover:-translate-y-1 transition-all duration-300">
                    View Schedule
                </a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Now Showing Section -->
    <section class="py-20 px-6 lg:px-12">
        <div class="container mx-auto">
            <h2 class="font-display text-4xl md:text-5xl text-center text-gold mb-16">Now Showing</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Movie Card 1 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                    <div class="h-96 bg-gradient-to-br from-charcoal via-gold/20 to-gold flex items-center justify-center text-6xl relative overflow-hidden">
                        <span class="text-8xl opacity-20">🎬</span>
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-cyan text-2xl">▶️</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">The Midnight Heist</h3>
                        <p class="text-silver text-sm mb-4">Action • 2h 15m • PG-13</p>
                        <button class="w-full bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                            Book Tickets
                        </button>
                    </div>
                </div>

                <!-- Movie Card 2 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                    <div class="h-96 bg-gradient-to-br from-charcoal via-cyan/20 to-cyan flex items-center justify-center text-6xl relative overflow-hidden">
                        <span class="text-8xl opacity-20">🎭</span>
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-cyan text-2xl">▶️</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">Eternal Echoes</h3>
                        <p class="text-silver text-sm mb-4">Drama • 1h 58m • R</p>
                        <button class="w-full bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                            Book Tickets
                        </button>
                    </div>
                </div>

                <!-- Movie Card 3 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                    <div class="h-96 bg-gradient-to-br from-charcoal via-gold/30 to-gold/50 flex items-center justify-center text-6xl relative overflow-hidden">
                        <span class="text-8xl opacity-20">👽</span>
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-cyan text-2xl">▶️</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">Beyond the Stars</h3>
                        <p class="text-silver text-sm mb-4">Sci-Fi • 2h 30m • PG-13</p>
                        <button class="w-full bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                            Book Tickets
                        </button>
                    </div>
                </div>

                <!-- Movie Card 4 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                    <div class="h-96 bg-gradient-to-br from-charcoal via-cyan/30 to-cyan/50 flex items-center justify-center text-6xl relative overflow-hidden">
                        <span class="text-8xl opacity-20">😂</span>
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-cyan text-2xl">▶️</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">Laugh Out Loud</h3>
                        <p class="text-silver text-sm mb-4">Comedy • 1h 45m • PG</p>
                        <button class="w-full bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                            Book Tickets
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{route('movies.index')}}" class="inline-block border-2 border-gold text-gold px-8 py-3 rounded-full font-semibold hover:bg-gold hover:text-onyx transition-all duration-300">
                    View All Movies
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-charcoal py-20 px-6 lg:px-12">
        <div class="container mx-auto">
            <h2 class="font-display text-4xl md:text-5xl text-center text-gold mb-16">Why Choose ONYX</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Feature 1 -->
                <div class="text-center group">
                    <div class="text-6xl mb-6 inline-block animate-float group-hover:scale-110 transition-transform duration-300">🎥</div>
                    <h3 class="text-2xl font-semibold text-gold mb-4">Premium Screens</h3>
                    <p class="text-silver leading-relaxed">Experience movies on our state-of-the-art 4K laser projection screens with stunning clarity.</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center group">
                    <div class="text-6xl mb-6 inline-block animate-float group-hover:scale-110 transition-transform duration-300" style="animation-delay: 0.5s">🔊</div>
                    <h3 class="text-2xl font-semibold text-gold mb-4">Dolby Atmos</h3>
                    <p class="text-silver leading-relaxed">Immerse yourself in multidimensional sound that flows all around you.</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center group">
                    <div class="text-6xl mb-6 inline-block animate-float group-hover:scale-110 transition-transform duration-300" style="animation-delay: 1s">🛋️</div>
                    <h3 class="text-2xl font-semibold text-gold mb-4">Luxury Seating</h3>
                    <p class="text-silver leading-relaxed">Recline in our plush, premium leather seats with extra legroom and comfort.</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center group">
                    <div class="text-6xl mb-6 inline-block animate-float group-hover:scale-110 transition-transform duration-300" style="animation-delay: 1.5s">🍿</div>
                    <h3 class="text-2xl font-semibold text-gold mb-4">Gourmet Concessions</h3>
                    <p class="text-silver leading-relaxed">Enjoy artisanal snacks and beverages crafted by our culinary team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Coming Soon Section -->
    <section class="py-20 px-6 lg:px-12">
        <div class="container mx-auto">
            <h2 class="font-display text-4xl md:text-5xl text-center text-gold mb-16">Coming Soon</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Coming Soon 1 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="h-72 bg-gradient-to-br from-gold/30 to-charcoal flex items-center justify-center relative">
                        <span class="text-7xl opacity-30">🚀</span>
                        <div class="absolute top-4 right-4 bg-cyan text-onyx px-4 py-1 rounded-full text-sm font-bold">
                            Jan 28
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">Cosmic Voyage</h3>
                        <p class="text-silver text-sm">Sci-Fi Adventure • 2h 20m</p>
                    </div>
                </div>

                <!-- Coming Soon 2 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="h-72 bg-gradient-to-br from-cyan/30 to-charcoal flex items-center justify-center relative">
                        <span class="text-7xl opacity-30">💔</span>
                        <div class="absolute top-4 right-4 bg-cyan text-onyx px-4 py-1 rounded-full text-sm font-bold">
                            Feb 14
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">Love & Loss</h3>
                        <p class="text-silver text-sm">Romance • 1h 55m</p>
                    </div>
                </div>

                <!-- Coming Soon 3 -->
                <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="h-72 bg-gradient-to-br from-gold/40 to-charcoal flex items-center justify-center relative">
                        <span class="text-7xl opacity-30">🦸</span>
                        <div class="absolute top-4 right-4 bg-cyan text-onyx px-4 py-1 rounded-full text-sm font-bold">
                            Mar 5
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-soft-white mb-2">The Last Guardian</h3>
                        <p class="text-silver text-sm">Action • 2h 35m</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 lg:px-12 bg-gradient-to-r from-charcoal via-gold/10 to-charcoal">
        <div class="container mx-auto text-center">
            <h2 class="font-display text-4xl md:text-5xl text-gold mb-6">Join ONYX Rewards</h2>
            <p class="text-xl text-silver mb-10 max-w-2xl mx-auto">
                Get exclusive benefits, earn points on every ticket, and enjoy members-only screenings.
            </p>
            <a href="#" class="inline-block bg-gold text-onyx px-12 py-4 rounded-full font-bold text-lg hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(212,175,55,0.5),0_0_20px_#00E5FF] transition-all duration-300">
                Sign Up Free
            </a>
        </div>
    </section>

</x-layout>