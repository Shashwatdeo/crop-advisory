<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crop Advisory and Farmer's Companion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        :root {
            --primary-color: #2E7D32;
            --primary-dark: #1B5E20;
            --primary-light: #81C784;
            --secondary-color: #FFA000;
            --light-bg: #F5F5F6;
            --dark-text: #263238;
            --light-text: #ECEFF1;
            --success-color: #4CAF50;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--light-text);
            padding: 1.5rem 2rem;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 100;
        }

        header h2 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header h2 i {
            font-size: 1.5rem;
        }

        /* Navbar Styling */
        nav {
            background-color: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 90;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 2rem;
        }

        nav ul .nav-left,
        nav ul .nav-right {
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: var(--dark-text);
            text-decoration: none;
            padding: 1rem 1.5rem;
            display: block;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        nav ul li a:hover {
            color: var(--primary-color);
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        nav ul li a:hover:after {
            width: 70%;
        }

        nav ul li a.active {
            color: var(--primary-color);
        }

        nav ul li a.active:after {
            width: 70%;
        }

        nav ul li a i {
            margin-right: 8px;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Success Message */
        .success-message {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--success-color);
            padding: 1rem;
            border-radius: 4px;
            margin: 1.5rem 0;
            border-left: 4px solid var(--success-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: var(--light-text);
            padding: 2rem;
            text-align: center;
            margin-top: 3rem;
        }

        footer p {
            margin: 0;
            font-weight: 300;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1rem 0;
        }

        .social-links a {
            color: var(--light-text);
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            color: var(--secondary-color);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                width: 100%;
                text-align: center;
            }

            nav ul li a {
                padding: 0.8rem;
            }
        }

        /* ========== PAGINATION STYLES ========== */
        .pagination-container {
        margin: 3rem 0;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .pagination {
        display: inline-flex;
        list-style: none;
        padding: 0.5rem;
        gap: 0.5rem;
        align-items: center;
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: var(--shadow);
    }

    .page-item {
        margin: 0;
        display: flex;
        align-items: center;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 42px;
        height: 42px;
        padding: 0 0.75rem;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: white;
        color: var(--dark-text);
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        box-shadow: 0 2px 6px rgba(46, 125, 50, 0.25);
    }

    .page-link:not(.active):hover {
        background: #f1f5f9;
        border-color: #cbd5e0;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .page-item.disabled .page-link {
        color: #cbd5e0;
        background: #f8f9fa;
        border-color: #f1f5f9;
        cursor: not-allowed;
        box-shadow: none;
    }

    /* Navigation arrows */
    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
        min-width: 42px;
        padding: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .pagination {
            padding: 0.25rem;
            gap: 0.25rem;
        }

        .page-link {
            min-width: 36px;
            height: 36px;
            padding: 0 0.5rem;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .pagination {
            flex-wrap: wrap;
            justify-content: center;
            background: none;
            box-shadow: none;
            gap: 0.25rem;
        }

        .page-link {
            min-width: 32px;
            height: 32px;
        }
    }

    #scrollToTopBtn {
    display: none;
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: #00704A;
    color: white;
    cursor: pointer;
    padding: 12px 16px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

#scrollToTopBtn:hover {
    background-color: #005f3b;
}



    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h2><i class="fas fa-leaf"></i> Crop Advisory and Farmer's Companion</h2>
    </header>

    <!-- Navbar Section -->
    <nav>
        <ul>
            <div class="nav-left">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>Home
                </a></li>
                <li><a href="{{ route('crops.index') }}" class="{{ request()->routeIs('crops.*') ? 'active' : '' }}">
                    <i class="fas fa-seedling"></i>Crops
                </a></li>
                <li><a href="{{ route('weather.index') }}" class="{{ request()->routeIs('weather.*') ? 'active' : '' }}">
                    <i class="fas fa-cloud-sun"></i>Weather
                </a></li>
                <li><a href="{{ route('pest-alerts.index') }}" class="{{ request()->routeIs('pest-alerts.*') ? 'active' : '' }}">
                    <i class="fas fa-bug"></i>Pest Alerts
                </a></li>
                <li><a href="{{ route('crop-suggestions.index') }}" class="{{ request()->routeIs('crop-suggestions.*') ? 'active' : '' }}">
                    <i class="fas fa-lightbulb"></i>Crop Suggestions
                </a></li>
            </div>
            <div class="nav-right">
                @guest
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="fas fa-sign-in-alt"></i>Sign In
                    </a></li>
                    <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">
                        <i class="fas fa-user-plus"></i>Register
                    </a></li>
                @else
                    @if(Auth::user()->is_admin)
                        <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>Admin Dashboard
                        </a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            </a>
                        </form>
                    </li>
                @endguest
            </div>
        </ul>
    </nav>

    <!-- Main Content Section -->
    <main class="container">
        @yield('content')

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
    </main>

    <!-- Footer Section -->
    <footer>
    <div class="social-links">
        <a href="YOUR_FACEBOOK_LINK_HERE" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://x.com/shashwatdeo" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/_.shashwat_dev._/" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/shashwat-deo/" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://www.youtube.com/@shashwatdeo7511" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="https://github.com/Shashwatdeo/" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
    </div>
    <p>&copy; {{ date('Y') }} Crop Advisory System | Powered by Laravel MVC | <a href="https://github.com/Shashwatdeo/crop-advisory" target="_blank" aria-label="GitHub Repository">View on GitHub</a></p>
</footer>

    <button id="scrollToTopBtn" title="Go to top">⬆️</button>

    <script>
    // Show/hide button on scroll
     window.onscroll = function () {
     const btn = document.getElementById("scrollToTopBtn");
     if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        btn.style.display = "block";
     } else {
        btn.style.display = "none";
     }
    };

    // Scroll to top when clicked
     document.getElementById("scrollToTopBtn").onclick = function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };
</script>

    @stack('scripts')

</body>
</html>