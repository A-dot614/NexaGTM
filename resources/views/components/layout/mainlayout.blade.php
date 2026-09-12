<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<script>document.documentElement.setAttribute('data-design-mode', 'liquid-glass');</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'NexaGTM — High-Performance B2B Outbound & GTM Automation Engine' }}</title>
  <meta name="description" content="NexaGTM engineers high-converting go-to-market systems, verified waterfall lead data, and custom Clay automation for B2B SaaS and recruitment agencies.">
  <link rel="icon" type="image/png" href="{{ asset('pic/logo.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

  <!-- FontAwesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- NexaGTM Master Design Systems Engine -->
  <link rel="stylesheet" href="{{ asset('css/design-systems.css') }}">
  <script src="{{ asset('js/design-systems.js') }}" defer></script>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'Inter', 'Roboto', 'sans-serif'],
            display: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
          },
          colors: {
            dark: '#0d1117',
            'dark-bg': '#0a0d12',
            'dark-surface': '#161b22',
            'dark-card': '#1c2128',
            'dark-border': '#30363d',
            'dark-muted': '#8b949e',
            brand: '#3fb950',
            'brand-light': '#56d364',
            'brand-dark': '#2ea043',
            'brand-glow': 'rgba(63, 185, 80, 0.35)',
          },
          boxShadow: {
            'glow-sm': '0 0 15px rgba(63, 185, 80, 0.25)',
            'glow-md': '0 0 30px rgba(63, 185, 80, 0.35)',
            'glow-lg': '0 0 50px rgba(63, 185, 80, 0.45)',
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      background-color: #0d1117;
      color: #f0f6fc;
      overflow-x: hidden;
    }

    /* Custom Sleek Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #0d1117;
    }
    ::-webkit-scrollbar-thumb {
      background: #21262d;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #3fb950;
    }

    /* Animations */
    @keyframes marquee {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .animate-marquee {
      animation: marquee 32s linear infinite;
    }
    .animate-marquee:hover {
      animation-play-state: paused;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(24px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
      animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Subtle grid background */
    .bg-grid-pattern {
      background-size: 40px 40px;
      background-image: 
        linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    }

    .bg-radial-vignette {
      background: radial-gradient(circle at 50% 0%, rgba(63, 185, 80, 0.12) 0%, transparent 60%);
    }
  </style>
</head>
<body class="bg-dark text-white min-h-screen flex flex-col selection:bg-[#3fb950]/30 selection:text-white">
<x-common.header />

<div class="flex-grow pt-24">
  {{ $slot }}
</div>

<x-common.footer />

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/923444543772"
   target="_blank"
   rel="noopener noreferrer"
   title="Chat with NexaGTM on WhatsApp"
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 bg-[#25D366] rounded-full shadow-[0_10px_25px_rgba(37,211,102,0.4)] hover:scale-110 hover:shadow-[0_15px_30px_rgba(37,211,102,0.6)] transition-all duration-300 group">

    <!-- Official WhatsApp Logo -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 relative z-10 transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" fill="white">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>

    <!-- Pulse Effect -->
    <span class="absolute inline-flex w-full h-full rounded-full bg-[#25D366] opacity-60 animate-ping"></span>
</a>
</body>
</html>