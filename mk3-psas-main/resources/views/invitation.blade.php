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
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        /* Responsive */
        @media (max-width: 992px) {
            h1 {
                font-size: 3rem;
            }
            h2 {
                font-size: 2.5rem;
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
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header id="header">
        <div class="container nav-container">
            <div class="logo">F&N</div>
            <ul class="nav-links">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">Our Story</a></li>
                <li><a href="#details">Details</a></li>
                <li><a href="#rsvp">RSVP</a></li>
                <li><a href="#qr">QR Code</a></li>
                <li><a href="#wishes">Messages</a></li>
            </ul>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content fade-in">
                <h1>We're Getting <span>Married</span></h1>
                <p class="guest-name">Dear {{ $guest->name }}</p>
                <p>Fabian & Naifa invite you to celebrate their special day. Join us for an unforgettable celebration of love, laughter, and new beginnings.</p>
                <div class="hero-btns">
                    <a href="#about" class="btn">Open Invitation</a>
                    <a href="#rsvp" class="btn btn-outline">Send RSVP</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
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
                    [Portrait of Fabian & Naifa]
                </div>
            </div>
        </div>
    </section>

    <!-- Details Section -->
    <section class="details" id="details">
        <div class="container">
            <h2 class="text-center fade-in">Wedding Details</h2>
            <div class="details-cards">
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Location</h3>
                    <p>Garden View Estate</p>
                    <p>Surrounded by natural beauty and elegant charm</p>
                </div>
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <h3>Date & Time</h3>
                    <p>Saturday, June 15th, 2025</p>
                    <p>Ceremony begins at 4:00 PM</p>
                </div>
                <div class="card detail-card fade-in">
                    <div class="detail-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Attire</h3>
                    <p>Semi-formal</p>
                    <p>Cocktail attire</p>
                </div>
            </div>
        </div>
    </section>

    <!-- RSVP Section -->
    <section class="rsvp" id="rsvp">
        <div class="container">
            <h2 class="text-center fade-in">We Hope You Can Join Us</h2>
            <div class="rsvp-form card fade-in">
                <div id="rsvpAlert" class="alert"></div>
                <form id="weddingRsvp">
                    <input type="hidden" id="guestId" value="{{ $guest->id }}">
                    
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
                        <label for="totalGuests">Number of Guests (max: {{ $guest->quota }}) *</label>
                        <input type="number" id="totalGuests" class="form-control" min="1" max="{{ $guest->quota }}" value="1" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message for the Couple</label>
                        <textarea id="message" class="form-control" placeholder="Share your well wishes"></textarea>
                    </div>

                    <button type="submit" class="btn" style="width: 100%;">Submit RSVP</button>
                </form>
            </div>
        </div>
    </section>

    <!-- QR Section -->
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
                </div>
            </div>
        </div>
    </section>

    <!-- Wishes Section -->
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
                @foreach($wishes as $wish)
                <div class="wish-item fade-in visible">
                    <div class="wish-author">{{ $wish->name }}</div>
                    <div class="wish-message">{{ $wish->message }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
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

        // Fade in animation
        document.addEventListener('DOMContentLoaded', function() {
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

            fadeInOnScroll();
            window.addEventListener('scroll', fadeInOnScroll);

            // RSVP Form
            document.getElementById('weddingRsvp').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const guestId = document.getElementById('guestId').value;
                const attendance = document.querySelector('input[name="attendance"]:checked').value;
                const totalGuests = document.getElementById('totalGuests').value;
                const message = document.getElementById('message').value;

                try {
                    const response = await fetch('/rsvp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            guest_id: guestId,
                            attendance: attendance,
                            total_guests: totalGuests,
                            message: message
                        })
                    });

                    const data = await response.json();
                    
                    const alert = document.getElementById('rsvpAlert');
                    if (data.success) {
                        alert.className = 'alert alert-success';
                        alert.textContent = data.message;
                        alert.style.display = 'block';
                    } else {
                        alert.className = 'alert alert-error';
                        alert.textContent = 'Failed to submit RSVP';
                        alert.style.display = 'block';
                    }

                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 5000);

                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                }
            });

            // Wish Form
            document.getElementById('wishForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const name = document.getElementById('wishName').value;
                const message = document.getElementById('wishMessage').value;

                try {
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
                        const wishesList = document.getElementById('wishesList');
                        const newWish = document.createElement('div');
                        newWish.className = 'wish-item fade-in visible';
                        newWish.innerHTML = `
                            <div class="wish-author">${name}</div>
                            <div class="wish-message">${message}</div>
                        `;
                        wishesList.prepend(newWish);

                        document.getElementById('wishForm').reset();
                        document.getElementById('wishName').value = '{{ $guest->name }}';

                        const alert = document.getElementById('wishAlert');
                        alert.className = 'alert alert-success';
                        alert.textContent = data.message;
                        alert.style.display = 'block';

                        setTimeout(() => {
                            alert.style.display = 'none';
                        }, 5000);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    </script>
</body>
</html>