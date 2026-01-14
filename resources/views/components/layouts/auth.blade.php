<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 1s ease;
        }
    </style>
</head>

<body class="bg-onyx text-soft-white antialiased">

    <div class="min-h-screen flex flex-col relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan rounded-full blur-3xl"></div>
        </div>

        <!-- Logo/Brand at Top -->
        <div class="relative z-10 pt-8 text-center">
            <a href="/"
                class="font-display text-4xl font-bold text-gold tracking-wider hover:drop-shadow-[0_0_20px_rgba(212,175,55,0.6)] transition-all duration-300 inline-block">
                ONYX
            </a>
            <p class="text-silver mt-2">Premium Cinema Experience</p>
        </div>

        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center p-6 relative z-10">
            <div class="w-full max-w-md animate-fadeInUp">
                <!-- Card Container -->
                <div class="bg-charcoal rounded-2xl shadow-[0_0_40px_rgba(212,175,55,0.2)] border-2 border-gold/20 p-8">
                    {{ $slot }}
                </div>

                <!-- Extra Links Below Card -->
                <div class="mt-6 text-center">
                    <p class="text-silver text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                            class="text-gold hover:text-cyan transition-colors duration-300 font-semibold">Sign up
                            here</a>
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="relative z-10 py-6 text-center text-silver text-sm">
            <p>&copy; {{ date('Y') }} ONYX Cinema. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
