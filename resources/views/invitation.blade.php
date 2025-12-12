<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fabian & Naifa | Wedding Celebration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --ivory: #f9f6f2;
            --champagne: #f7e7ce;
            --rose-gold: #b76e79;
            --dark-rose: #9e5a64;
            --charcoal: #333333;
            --light-gray: #e8e8e8;
            --white: #ffffff;
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --transition: all 0.4s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--charcoal);
            background-color: var(--ivory);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
            line-height: 1.2;
        }

        h1 {
            font-size: 4rem;
            letter-spacing: -0.5px;
        }

        h2 {
            font-size: 3rem;
            margin-bottom: 2rem;
            position: relative;
        }

        h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        p {
            color: #555;
            margin-bottom: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        section {
            padding: 6rem 0;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            background-color: var(--rose-gold);
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            background-color: var(--dark-rose);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(183, 110, 121, 0.2);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--rose-gold);
            color: var(--rose-gold);
        }

        .btn-outline:hover {
            background-color: var(--rose-gold);
            color: var(--white);
        }

        .card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2.5rem;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1.5rem 0;
            transition: var(--transition);
        }

        header.scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--rose-gold);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 2.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--charcoal);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a:hover {
            color: var(--rose-gold);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--rose-gold);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
            color: var(--charcoal);
            transition: var(--transition);
        }
        
        header.scrolled .mobile-menu {
            color: var(--charcoal);
        }
        
        .nav-links.open {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 100%;
            right: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.98); 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 1.5rem 0;
            text-align: center;
            border-top: 1px solid var(--light-gray);
        }

        .nav-links.open li {
            margin: 0.5rem 0;
        }

        /* Hero */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.2) 100%), url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .hero-content {
            max-width: 800px;
            z-index: 1;
            color: var(--white);
        }

        .hero h1 {
            margin-bottom: 1.5rem;
            font-weight: 300;
        }

        .hero h1 span {
            font-weight: 600;
            color: var(--champagne);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: rgba(255, 255, 255, 0.9);
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .guest-name {
            font-size: 1.5rem;
            color: var(--champagne);
            margin-top: 1rem;
            font-style: italic;
        }

        /* About */
        .about {
            background-color: var(--white);
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 4rem;
            align-items: center;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
        }

        .about-image {
            flex: 1;
            min-width: 300px;
            height: 500px;
            background: linear-gradient(135deg, var(--champagne) 0%, var(--rose-gold) 100%);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            font-style: italic;
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        
        .about-image img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 12px;
        }

        /* Details */
        .details {
            background-color: var(--ivory);
        }

        .details-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .detail-card {
            text-align: center;
            padding: 3rem 2rem;
        }

        .detail-icon {
            font-size: 2.5rem;
            color: var(--rose-gold);
            margin-bottom: 1.5rem;
        }

        .detail-card h3 {
            color: var(--rose-gold);
        }

        /* RSVP */
        .rsvp {
            background: linear-gradient(135deg, rgba(249, 246, 242, 0.9) 0%, rgba(247, 231, 206, 0.7) 100%);
        }

        .rsvp-form {
            max-width: 700px;
            margin: 0 auto;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius);
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
            background-color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--rose-gold);
            box-shadow: 0 0 0 3px rgba(183, 110, 121, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .radio-option input[type="radio"] {
            cursor: pointer;
        }

        .radio-option label {
            cursor: pointer;
            margin-bottom: 0;
        }

        /* QR */
        .qr-section {
            background-color: var(--white);
        }

        .qr-container {
            display: flex;
            flex-wrap: wrap;
            gap: 3rem;
            align-items: center;
            justify-content: center;
        }

        .qr-code {
            flex: 0 0 250px;
            height: 250px;
            background: var(--white);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(183, 110, 121, 0.2);
            padding: 1rem;
        }

        .qr-code img {
            width: 100%;
            height: 100%;
        }

        .qr-code svg {
            width: 100%;
            height: 100%;
        }

        .qr-actions {
            flex: 1;
            min-width: 300px;
        }

        .qr-actions .btn {
            margin-right: 1rem;
            margin-bottom: 1rem;
        }

        /* Wishes */
        .wishes {
            background-color: var(--ivory);
        }

        .wishes-form {
            max-width: 600px;
            margin: 0 auto 3rem;
        }

        .wishes-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .wish-item {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .wish-item:hover {
            transform: translateY(-5px);
        }

        .wish-author {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--rose-gold);
        }

        .wish-message {
            color: #555;
        }

        /* Footer */
        footer {
            background-color: var(--charcoal);
            color: var(--white);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
        }

        .footer-column h3 {
            color: var(--champagne);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .footer-column p {
            color: #ccc;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--rose-gold);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--white);
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--rose-gold);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #999;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: var(--radius);
            display: none;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Music Control */
        .audio-control-btn {
            position: fixed;
            bottom: 20px; 
            right: 20px; 
            z-index: 1050; 
            background-color: var(--rose-gold); 
            color: var(--white);
            border: none;
            border-radius: 50%; 
            width: 50px; 
            height: 50px; 
            cursor: pointer;
            box-shadow: var(--shadow); 
            font-size: 18px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .audio-control-btn:hover {
            background-color: var(--dark-rose);
            transform: scale(1.1); 
        }

        /* Wedding Notification */
        .wedding-notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: linear-gradient(135deg, var(--rose-gold) 0%, var(--dark-rose) 100%);
            color: var(--white);
            padding: 3rem;
            border-radius: var(--radius);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 2000;
            text-align: center;
            max-width: 500px;
            width: 90%;
            transition: transform 0.5s ease;
        }

        .wedding-notification.show {
            transform: translate(-50%, -50%) scale(1);
        }

        .wedding-notification h2 {
            color: var(--white);
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .wedding-notification p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .wedding-notification .btn {
            background-color: var(--white);
            color: var(--rose-gold);
        }

        .wedding-notification .btn:hover {
            background-color: var(--champagne);
            color: var(--dark-rose);
        }

        .notification-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .notification-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Animations */
        @keyframes floatUp {
            0% { transform: translateY(10px) scale(0.9); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes gentleWiggle {
            0%,100% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(-1.5px) rotate(-0.5deg); }
            50% { transform: translateX(1.5px) rotate(0.5deg); }
            75% { transform: translateX(-1px) rotate(-0.3deg); }
        }

        @keyframes glowPulse {
            0%,100% { box-shadow: 0 4px 15px rgba(183,110,121,0.5), 0 0 8px rgba(255,255,255,0.4); }
            50% { box-shadow: 0 6px 20px rgba(183,110,121,0.7), 0 0 12px rgba(255,255,255,0.6); }
        }

        @keyframes shimmer {
            0% { box-shadow: 0 0 6px rgba(255,255,255,0.4); }
            50% { box-shadow: 0 0 14px rgba(255,255,255,0.8); }
            100% { box-shadow: 0 0 6px rgba(255,255,255,0.4); }
        }

        /* Responsive */
        @media (max-width: 992px) {
            h1 {
                font-size: 3rem;
            }
            h2 {
                font-size: 2.5rem;
            }
            .nav-links li {
                margin-left: 1.5rem; 
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .mobile-menu {
                display: block;
            }
            .hero-btns {
                flex-direction: column;
                align-items: center;
            }
            .hero-btns .btn {
                width: 100%;
                max-width: 250px;
            }
            section {
                padding: 4rem 0;
            }
            .qr-container {
                flex-direction: column;
            }
            .qr-actions {
                text-align: center;
                min-width: unset;
            }
            .qr-code {
                flex: 0 0 200px;
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 2.5rem;
            }
            h2 {
                font-size: 2rem;
            }
            .container {
                padding: 0 1.5rem;
            }
            .about-content {
                gap: 2rem;
            }
            .card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="container nav-container">
            <div class="logo">F&N</div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">Our Story</a></li>
                <li><a href="#details">Details</a></li>
                <li><a href="#rsvp">RSVP</a></li>
                <li><a href="#qr">QR Code</a></li>
                <li><a href="#wishes">Messages</a></li>
            </ul>
            <div class="mobile-menu" id="mobileMenu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content fade-in">
                <h1>We're Getting <span>Married</span></h1>
                <p class="guest-name">Dear {{ $guest->name }}</p>
                <p>Fabian Rozan Fanani & Naifa Ashila Handoyo invite you to celebrate their special day. Join us for an unforgettable celebration of love, laughter, and new beginnings.</p>
                <div class="hero-btns">
                    <a href="#about" class="btn">Open Invitation</a>
                    <a href="#rsvp" class="btn btn-outline">Send RSVP</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <h2 class="text-center fade-in">Our Love Story</h2>
            <div class="about-content">
                <div class="about-text fade-in">
                    <h3>So This Is Love...</h3>
                    <p>Our journey began with chance encounters and shared laughter, slowly weaving a tapestry of memories that became the fabric of our love story.</p>
                    <p>As we stand on the brink of forever, we want you to be a part of our next chapter. Join us as we exchange vows and promise each other a lifetime of adventures.</p>
                </div>
                <div class="about-image fade-in">
                    <img src="{{ asset('images/FN.png') }}" alt="Fabian & Haifa" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="details" id="details">
        <div class="container">
            <h2 class="text-center fade-in">Wedding Details</h2>
            <div class="details-cards">
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Location</h3>
                    <p>SMK Telkom Purwokerto</p>
                    <p>Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, South Purwokerto District, Banyumas Regency, Central Java 53141</p>
                    <a href="https://maps.app.goo.gl/bDu22rrdEUnayUDw5" target="_blank" class="btn" style="margin-top: 1rem;">
                        <i class="fas fa-map-marked-alt"></i> Open in Google Maps
                    </a>
                </div>
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <h3>Date & Time</h3>
                    <p>Monday, December 8th, 2025</p>
                    <p>Ceremony begins at 7:30 - 9:00 AM</p>
                    <div id="countdown" style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--light-gray);">
                        <p style="font-weight: 600; color: var(--rose-gold); margin-bottom: 1rem;">Counting Down To Our Big Day</p>
                        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                            <div style="text-align: center;">
                                <div id="days" style="font-size: 2rem; font-weight: 700; color: var(--rose-gold);">0</div>
                                <div style="font-size: 0.9rem; color: #777;">Days</div>
                            </div>
                            <div style="text-align: center;">
                                <div id="hours" style="font-size: 2rem; font-weight: 700; color: var(--rose-gold);">0</div>
                                <div style="font-size: 0.9rem; color: #777;">Hours</div>
                            </div>
                            <div style="text-align: center;">
                                <div id="minutes" style="font-size: 2rem; font-weight: 700; color: var(--rose-gold);">0</div>
                                <div style="font-size: 0.9rem; color: #777;">Minutes</div>
                            </div>
                            <div style="text-align: center;">
                                <div id="seconds" style="font-size: 2rem; font-weight: 700; color: var(--rose-gold);">0</div>
                                <div style="font-size: 0.9rem; color: #777;">Seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Attire</h3>
                    <p>Traditional Formal Attire</p>
                    <p>Surakarta/Solo Style</p>
                </div>
            </div>
        </div>
    </section>

    <section class="rsvp" id="rsvp">
        <div class="container">
            <h2 class="text-center fade-in">We Hope You Can Join Us</h2>
            <div class="rsvp-form card fade-in">
                <div id="rsvpAlert" class="alert"></div>
                <form id="weddingRsvp">
                    <input type="hidden" id="guestId" value="1">
                    
                    <div class="form-group">
                        <label for="guestEmail">Your Email *</label>
                        <input type="email" id="guestEmail" class="form-control" required placeholder="your@email.com">
                        <small style="color: #777; font-size: 0.9rem;">We'll send you confirmation and wedding day reminder</small>
                    </div>

                    <div class="form-group">
                        <label>Will you be attending? *</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="attendingYes" name="attendance" value="attending" required>
                                <label for="attendingYes">Yes, I'll be there!</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="attendingNo" name="attendance" value="not_attending">
                                <label for="attendingNo">Sorry, I can't make it</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="totalGuests">Number of Guests (max: 5) *</label>
                        <input type="number" id="totalGuests" class="form-control" min="1" max="5" value="1" required>
                    </div>

                    <button type="submit" class="btn" style="width: 100%;">Submit RSVP</button>
                </form>
            </div>
        </div>
    </section>

    <section class="qr-section" id="qr">
        <div class="container">
            <h2 class="text-center fade-in">Your Digital Invitation</h2>
            <div class="qr-container fade-in">
                <div class="qr-code">
                    {!! $qrCode !!}
                </div>
                <div class="qr-actions">
                    <p>Your personal QR code for event check-in. Please present this code upon arrival.</p>
                    <p><strong>Guest Code:</strong> {{ $guest->code }}</p>
                    <a href="/qr/{{ $guest->code }}" class="btn" style="margin-top: 1rem;">
                    <i class="fas fa-expand"></i> View Full QR Code
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="wishes" id="wishes">
        <div class="container">
            <h2 class="text-center fade-in">Messages & Wishes</h2>
            <div class="wishes-form card fade-in">
                <div id="wishAlert" class="alert"></div>
                <form id="wishForm">
                    <div class="form-group">
                        <label for="wishName">Your Name *</label>
                        <input type="text" id="wishName" class="form-control" value="{{ $guest->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wishMessage">Your Message *</label>
                        <textarea id="wishMessage" class="form-control" required placeholder="Share your well wishes for the couple"></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
            <div class="wishes-list" id="wishesList">
                <div class="wish-item fade-in visible">
                    <div class="wish-author">John Doe</div>
                    <div class="wish-message">Congratulations on your wedding! Wishing you a lifetime of love and happiness.</div>
                </div>
                <div class="wish-item fade-in visible">
                    <div class="wish-author">Jane Smith</div>
                    <div class="wish-message">May your marriage be filled with all the right ingredients: love, humor, understanding, and patience.</div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Fabian & Naifa</h3>
                    <p>Thank you for being part of our special day!</p>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">Our Story</a></li>
                        <li><a href="#details">Details</a></li>
                        <li><a href="#rsvp">RSVP</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Fabian & Naifa Wedding. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <audio id="background-music" src="{{ asset('audio/lagunikahan.mpeg') }}" loop preload="auto"></audio>
    <button id="play-pause-button" class="audio-control-btn" title="Kontrol Musik Latar">
        <i class="fas fa-play"></i> 
    </button>

    <!-- Wedding Notification -->
    <div class="notification-overlay" id="notificationOverlay"></div>
    <div class="wedding-notification" id="weddingNotification">
        <h2>🎉 The Wedding Has Begun! 💒</h2>
        <p>Fabian & Naifa's special moment is starting now!</p>
        <button class="btn" onclick="closeNotification()">Celebrate With Us!</button>
    </div>

    <script>
    // Get CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Fade in animation on scroll
        const fadeElements = document.querySelectorAll('.fade-in');

        const fadeInOnScroll = function() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        };

        // Initial check
        fadeInOnScroll();

        // Check on scroll
        window.addEventListener('scroll', fadeInOnScroll);

        // Mobile Menu Toggle
        const mobileMenu = document.getElementById('mobileMenu');
        const navLinks = document.getElementById('navLinks');

        mobileMenu.addEventListener('click', function() {
            navLinks.classList.toggle('open');
            const icon = mobileMenu.querySelector('i');
            if (navLinks.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (navLinks.classList.contains('open')) {
                    navLinks.classList.remove('open');
                    document.getElementById('mobileMenu').querySelector('i').classList.remove('fa-times');
                    document.getElementById('mobileMenu').querySelector('i').classList.add('fa-bars');
                }
            });
        });

        // Music Control
        const audio = document.getElementById('background-music');
        const playPauseButton = document.getElementById('play-pause-button');
        
        audio.volume = 0.4;

        function togglePlayPause() {
            if (audio.paused) {
                audio.play()
                    .then(() => {
                        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
                    })
                    .catch(error => {
                        console.log('Pemutaran diblokir oleh browser:', error);
                    });
            } else {
                audio.pause();
                playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
            }
        }

        playPauseButton.addEventListener('click', togglePlayPause);
        
        document.body.addEventListener('click', function attemptPlayOnce() {
            if (audio.paused) {
                audio.play()
                    .then(() => {
                        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
                    })
                    .catch(e => console.log("Gagal memicu play awal:", e));
            }
            document.body.removeEventListener('click', attemptPlayOnce);
        });

        // Countdown Timer
        let notificationShown = false;

        function updateCountdown() {
            const weddingDate = new Date('2025-12-08T07:30:00').getTime();
            const now = new Date().getTime();
            const distance = weddingDate - now;

            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;
            } else {
                document.getElementById('countdown').innerHTML = '<p style="font-weight: 600; color: var(--rose-gold);">The Wedding Day is Here! 🎉</p>';
                
                // Show notification only once
                if (!notificationShown) {
                    showWeddingNotification();
                    notificationShown = true;
                }
            }
        }

        function showWeddingNotification() {
            // Check if user has RSVP'd
            const hasRSVP = localStorage.getItem('hasRSVP') === 'true';
            
            if (!hasRSVP) {
                console.log('User has not RSVP\'d, notification not shown');
                return;
            }
            
            const overlay = document.getElementById('notificationOverlay');
            const notification = document.getElementById('weddingNotification');
            
            overlay.classList.add('show');
            notification.classList.add('show');
            
            // Browser notification (if permission granted)
            if ('Notification' in window && Notification.permission === 'granted') {
                new Notification('🎉 Wedding Started!', {
                    body: 'Fabian & Naifa\'s wedding ceremony has begun!',
                    icon: 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=200',
                    tag: 'wedding-notification'
                });
            }
            
            // Play confetti sound or celebration effect (optional)
            if (!audio.paused) {
                audio.volume = 0.6; // Increase volume for celebration
            }
        }

        // Update countdown setiap detik
        updateCountdown();
        setInterval(updateCountdown, 1000);

        // RSVP Form Submission
        document.getElementById('weddingRsvp').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const guestId = document.getElementById('guestId').value;
            const email = document.getElementById('guestEmail').value;
            const attendance = document.querySelector('input[name="attendance"]:checked');
            const totalGuests = document.getElementById('totalGuests').value;
            
            if (!attendance) {
                alert('Please select attendance option');
                return;
            }

            try {
                const response = await fetch('/rsvp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        guest_id: guestId,
                        email: email,
                        attendance: attendance.value,
                        total_guests: totalGuests
                    })
                });

                const data = await response.json();
                
                const alertBox = document.getElementById('rsvpAlert');
                if (data.success) {
                    // Simpan status RSVP ke localStorage
                    if (attendance.value === 'attending') {
                        localStorage.setItem('hasRSVP', 'true');
                        
                        // Request notification permission
                        if ('Notification' in window && Notification.permission === 'default') {
                            Notification.requestPermission().then(permission => {
                                if (permission === 'granted') {
                                    console.log('Notification permission granted');
                                }
                            });
                        }
                    }
                    
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = 'RSVP submitted successfully! Check your email for confirmation and wedding day reminder!';
                    alertBox.style.display = 'block';
                    
                    alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    alertBox.className = 'alert alert-error';
                    alertBox.textContent = 'Failed to submit RSVP. Please try again.';
                    alertBox.style.display = 'block';
                }

                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 5000);

            } catch (error) {
                console.error('Error:', error);
                
                const alertBox = document.getElementById('rsvpAlert');
                alertBox.className = 'alert alert-error';
                alertBox.textContent = 'An error occurred. Please try again.';
                alertBox.style.display = 'block';
                
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 5000);
            }
        });

        // Wish Form Submission
document.getElementById('wishForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const name = document.getElementById('wishName').value;
    const message = document.getElementById('wishMessage').value;

    try {
        // KIRIM ke backend
        const response = await fetch('/wishes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                name: name,
                message: message
            })
        });

        const data = await response.json();

        if (data.success) {
            // Tampilkan di UI
            const wishesList = document.getElementById('wishesList');
            const newWish = document.createElement('div');
            newWish.className = 'wish-item fade-in visible';
            newWish.innerHTML = `
                <div class="wish-author">${name}</div>
                <div class="wish-message">${message}</div>
            `;
            wishesList.prepend(newWish);

            // Reset form
            document.getElementById('wishForm').reset();

            // Show success alert
            const alertBox = document.getElementById('wishAlert');
            alertBox.className = 'alert alert-success';
            alertBox.textContent = data.message;
            alertBox.style.display = 'block';

            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        } else {
            // Show error alert
            const alertBox = document.getElementById('wishAlert');
            alertBox.className = 'alert alert-error';
            alertBox.textContent = 'Failed to submit wish. Please try again.';
            alertBox.style.display = 'block';
            
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});  // Tutup addEventListener Wish Form

        });  // Tutup DOMContentLoaded ← INI YANG KURANG!

    // Close notification function
    function closeNotification() {
        const overlay = document.getElementById('notificationOverlay');
        const notification = document.getElementById('weddingNotification');
        
        overlay.classList.remove('show');
        notification.classList.remove('show');
    }
    </script>
</body>
</html>