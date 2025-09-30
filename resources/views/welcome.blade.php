<<<<<<< HEAD
@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h2>Welcome to CampusSpeak</h2>
    <p>This is the home page content.</p>
@endsection
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Speak - Where Student Voices Unite</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .hero-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            z-index: -2;
        }
        
        .hero-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%);
            z-index: -1;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }
        
        .shape:nth-child(1) {
            top: 20%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            top: 60%;
            right: 10%;
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 20%;
            animation-delay: -5s;
        }
        
        .shape:nth-child(3) {
            top: 40%;
            left: 70%;
            width: 40px;
            height: 40px;
            background: white;
            transform: rotate(45deg);
            animation-delay: -10s;
        }
        
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(30px) rotate(240deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .navbar {
            position: relative;
            z-index: 10;
            padding: 20px 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .nav-links {
            display: flex;
            gap: 15px;
        }
        
        .nav-link {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }
        
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .nav-link.primary {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        .nav-link.primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }
        
        .hero {
            padding: 100px 0 150px;
            text-align: center;
            position: relative;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            color: white;
        }
        
        .hero h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #fff 0%, #f0f0ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }
        
        .hero .subtitle {
            font-size: 1.25rem;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }
        
        .cta-button {
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        
        .cta-primary {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            box-shadow: 0 8px 30px rgba(255, 107, 107, 0.3);
        }
        
        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(255, 107, 107, 0.4);
        }
        
        .cta-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .cta-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }
        
        .features {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 60px 40px;
            margin: 0 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }
        
        .feature {
            text-align: center;
            color: white;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }
        
        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .feature p {
            opacity: 0.8;
            line-height: 1.6;
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin: 40px 0;
            flex-wrap: wrap;
        }
        
        .stat {
            text-align: center;
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
        }
        
        .stat-label {
            opacity: 0.8;
            margin-top: 5px;
        }
        
        .footer {
            text-align: center;
            padding: 60px 0 40px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-link:hover {
            color: white;
        }
        
        @media (max-width: 768px) {
            .nav-links {
                gap: 10px;
            }
            
            .nav-link {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
            
            .hero {
                padding: 60px 0 100px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-button {
                width: 250px;
                justify-content: center;
            }
            
            .features {
                padding: 40px 20px;
                margin: 0 10px;
            }
            
            .stats {
                gap: 40px;
            }
            
            .footer-links {
                gap: 20px;
            }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <nav class="navbar">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <div class="logo-icon">CS</div>
                    Campus Speak
                </a>
                <div class="nav-links">
                    <a href="auth/login" class="nav-link">Login</a>
                    <a href="auth/register" class="nav-link primary">Join Now</a>
                </div>
            </div>
        </div>
    </nav>
    
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Where Student Voices Unite</h1>
                <p class="subtitle">Connect, discuss, and shape your campus experience. Join thousands of students in meaningful conversations that matter.</p>
                
                <div class="cta-buttons">
                    <a href="auth/register" class="cta-button cta-primary pulse">
                        🎓 Start Speaking
                    </a>
                    <a href="/about" class="cta-button cta-secondary">
                        📖 Learn More
                    </a>
                </div>
                
                <div class="stats">
                    <div class="stat">
                        <span class="stat-number">25K+</span>
                        <div class="stat-label">Active Students</div>
                    </div>
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <div class="stat-label">Universities</div>
                    </div>
                    <div class="stat">
                        <span class="stat-number">1M+</span>
                        <div class="stat-label">Conversations</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="container">
        <div class="features">
            <div class="hero-content">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px; font-family: 'Space Grotesk', sans-serif;">Why Campus Speak?</h2>
                <p style="font-size: 1.1rem; opacity: 0.8;">Empowering student voices through innovative features designed for the modern campus experience.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature">
                    <div class="feature-icon">💬</div>
                    <h3>Real Conversations</h3>
                    <p>Engage in authentic discussions about campus life, academics, and what matters most to students.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🏫</div>
                    <h3>Campus Connect</h3>
                    <p>Connect with students from your university and discover others from campuses worldwide.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <h3>Safe Space</h3>
                    <p>Moderated environments ensure respectful dialogue and meaningful exchanges between students.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile First</h3>
                    <p>Access Campus Speak anywhere, anytime. Optimized for mobile to fit your busy student lifestyle.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🎯</div>
                    <h3>Topic-Focused</h3>
                    <p>From study groups to campus events, find and create discussions around topics you care about.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🌟</div>
                    <h3>Recognition</h3>
                    <p>Build your reputation as a helpful community member and gain recognition for quality contributions.</p>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <a href="/about" class="footer-link">About</a>
                <a href="/privacy" class="footer-link">Privacy</a>
                <a href="/terms" class="footer-link">Terms</a>
                <a href="/contact" class="footer-link">Contact</a>
                <a href="/support" class="footer-link">Support</a>
            </div>
            <p>&copy; 2025 Campus Speak. Empowering student voices across the globe.</p>
        </div>
    </footer>
</body>
</html>
>>>>>>> 60bebd65ddaa7183cd1f3a842cef5677bb8f60ac
