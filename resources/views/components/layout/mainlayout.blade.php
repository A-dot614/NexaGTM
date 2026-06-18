<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#0d1117',
                        brand: '#3fb950',
                    }
                }
            }
        }

// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      animation: {
        marquee: 'marquee 25s linear infinite',
      },
      keyframes: {
        marquee: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
      },
    },
  },
}        


    </script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <style>




@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-marquee {
  animation: marquee 25s linear infinite;
}

/* Pause animation on hover */
.animate-marquee:hover {
  animation-play-state: paused;
}              


        body { font-family: 'Roboto', sans-serif; }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-dark text-white min-h-screen">
<x-common.header />
{{ $slot }}


<x-common.footer />

</body>
</html>