<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Hub</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <link rel="stylesheet" href="style-header.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --dark: #2d3436;
            --light: #f5f6fa;
            --accent: #fd79a8;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1e1e2f, #2d2d42);
            color: var(--light);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Animated background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(108, 92, 231, 0.1);
            animation: float 15s infinite ease-in-out;
        }
        
        .circle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 60%;
            left: 20%;
            animation-delay: 2s;
        }
        
        .circle:nth-child(3) {
            width: 400px;
            height: 400px;
            top: 30%;
            right: 15%;
            animation-delay: 4s;
        }
        
        .circle:nth-child(4) {
            width: 250px;
            height: 250px;
            bottom: 10%;
            right: 20%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-50px) rotate(10deg);
            }
        }
        
        /* Header */
        header {
            background: rgba(30, 30, 47, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
        }
        
        .logo-icon {
            color: var(--accent);
            font-size: 1.8rem;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: white;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Main content */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            text-align: center;
        }
        
        .title {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 2rem;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }
        
        .title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
        }
        
        .subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 700px;
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        
        /* Search bar */
        .search-container {
            width: 100%;
            max-width: 600px;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .search-bar {
            width: 100%;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .search-bar:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .search-bar::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .search-icon {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }
        
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(30, 30, 47, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 0 0 15px 15px;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease, opacity 0.2s ease;
            opacity: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        
        .search-bar:focus + .search-icon + .search-results,
        .search-results:hover {
            max-height: 300px;
            opacity: 1;
        }
        
        .search-item {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .search-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .search-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .search-item-info {
            text-align: left;
        }
        
        .search-item-name {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        
        .search-item-type {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* Buttons */
        .button-container {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .action-btn {
            position: relative;
            padding: 1rem 2rem;
            border-radius: 50px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            text-decoration: none;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 200px;
            justify-content: center;
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(108, 92, 231, 0.4);
        }
        
        .action-btn:active {
            transform: translateY(0);
        }
        
        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
        }
        
        .action-btn:hover::before {
            left: 100%;
        }
        
        .btn-icon {
            font-size: 1.2rem;
        }
        
        .btn-comparator {
            background: linear-gradient(45deg, #00b894, #55efc4);
            box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
        }
        
        .btn-comparator:hover {
            box-shadow: 0 10px 20px rgba(0, 184, 148, 0.4);
        }
        
        .btn-team {
            background: linear-gradient(45deg, #0984e3, #74b9ff);
            box-shadow: 0 4px 15px rgba(9, 132, 227, 0.3);
        }
        
        .btn-team:hover {
            box-shadow: 0 10px 20px rgba(9, 132, 227, 0.4);
        }
        
        .btn-settings {
            background: linear-gradient(45deg, #e84393, #fd79a8);
            box-shadow: 0 4px 15px rgba(232, 67, 147, 0.3);
        }
        
        .btn-settings:hover {
            box-shadow: 0 10px 20px rgba(232, 67, 147, 0.4);
        }
        
        /* Footer */
        footer {
            background: rgba(30, 30, 47, 0.8);
            backdrop-filter: blur(10px);
            padding: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            color: var(--accent);
            transform: translateY(-2px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .title {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1rem;
            }
            
            .button-container {
                flex-direction: column;
                width: 100%;
            }
            
            .action-btn {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .title {
                font-size: 2rem;
            }
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 1s ease forwards;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease forwards;
        }
        
        .delay-1 {
            animation-delay: 0.2s;
        }
        
        .delay-2 {
            animation-delay: 0.4s;
        }
        
        .delay-3 {
            animation-delay: 0.6s;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Animated background -->
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    
    <!-- Header -->
    <?php include 'header.php'; ?>
    
    <!-- Main content -->
    <div class="main-container">
        <h1 class="title fade-in">All Star Tower Rater</h1>
        <p class="subtitle fade-in delay-1">
            The ultimate tool to rate, compare and optimize your team compositions in All Star Tower Defense.
            Find the best units, create powerful teams and dominate the battlefield!
        </p>
        
        <div class="search-container fade-in delay-1">
            <input type="text" class="search-bar" placeholder="Search any unit...">
            <i class="fas fa-search search-icon"></i>
            <div class="search-results">
                <div class="search-item">
                    <img src="https://via.placeholder.com/40" alt="Unit">
                    <div class="search-item-info">
                        <div class="search-item-name">Goku Black</div>
                        <div class="search-item-type">Mythic • Range</div>
                    </div>
                </div>
                <div class="search-item">
                    <img src="https://via.placeholder.com/40" alt="Unit">
                    <div class="search-item-info">
                        <div class="search-item-name">Levi</div>
                        <div class="search-item-type">Legendary • Melee</div>
                    </div>
                </div>
                <div class="search-item">
                    <img src="https://via.placeholder.com/40" alt="Unit">
                    <div class="search-item-info">
                        <div class="search-item-name">Broly</div>
                        <div class="search-item-type">Mythic • AoE</div>
                    </div>
                </div>
                <div class="search-item">
                    <img src="https://via.placeholder.com/40" alt="Unit">
                    <div class="search-item-info">
                        <div class="search-item-name">Gojo</div>
                        <div class="search-item-type">Mythic • Support</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="button-container">
            <a href="comparator.php" class="action-btn btn-comparator slide-up delay-2">
                <i class="fas fa-balance-scale btn-icon" href="/All_Star_Tower_Rater/All_Star_Tower_Rater_Deepsite/comparator.html"></i>
                Unit Comparator
            </a>
            <a href="#" class="action-btn btn-team slide-up delay-2">
                <i class="fas fa-users btn-icon"></i>
                Team Rater
            </a>
            <a href="settings.php" class="action-btn btn-settings slide-up delay-3">
                <i class="fas fa-cog btn-icon"></i>
                Parameters
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    
    <script>
        // Simple animation trigger
        document.addEventListener('DOMContentLoaded', () => {
            // Add hover effect to buttons
            const buttons = document.querySelectorAll('.action-btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', () => {
                    button.style.transform = 'translateY(-3px)';
                });
                button.addEventListener('mouseleave', () => {
                    button.style.transform = 'translateY(0)';
                });
            });
            
            // Search functionality (placeholder)
            const searchBar = document.querySelector('.search-bar');
            const searchResults = document.querySelector('.search-results');
            
            searchBar.addEventListener('focus', () => {
                searchResults.style.maxHeight = '300px';
                searchResults.style.opacity = '1';
            });
            
            searchBar.addEventListener('blur', () => {
                if (!searchResults.matches(':hover')) {
                    searchResults.style.maxHeight = '0';
                    searchResults.style.opacity = '0';
                }
            });
            
            // Sample search functionality
            searchBar.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const items = document.querySelectorAll('.search-item');
                
                items.forEach(item => {
                    const name = item.querySelector('.search-item-name').textContent.toLowerCase();
                    if (name.includes(searchTerm)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>