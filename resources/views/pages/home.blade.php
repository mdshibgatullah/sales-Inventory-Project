@extends('layouts.app')

@section('content')

<!-- Link External CSS File -->
<link rel="stylesheet" href="{{ asset('css/home_css.css') }}">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" width="90" alt="Logo">
    </a>

    <!-- Desktop menu -->
    <ul class="navbar-nav mx-auto gap-lg-4 text-center d-none d-lg-flex flex-lg-row">
      <li class="nav-item"><a class="nav-link active-link" href="#home">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
      <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
      <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
    </ul>
    <a href="{{ url('/login') }}" class="btn btn-pink d-none d-lg-inline-block">START SALE</a>

    <!-- Toggler for tablet/mobile -->
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
      <i class="fa-solid fa-bars"></i>
    </button>
  </div>
</nav>

<!-- OFFCANVAS MENU (right side, 250px) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header">
    <a class="navbar-brand mb-0" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" width="90" alt="Logo">
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link active-link" href="#home" data-bs-dismiss="offcanvas">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#about" data-bs-dismiss="offcanvas">About</a></li>
      <li class="nav-item"><a class="nav-link" href="#features" data-bs-dismiss="offcanvas">Features</a></li>
      <li class="nav-item"><a class="nav-link" href="#services" data-bs-dismiss="offcanvas">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#testimonials" data-bs-dismiss="offcanvas">Testimonials</a></li>
      <li class="nav-item"><a class="nav-link" href="#contact" data-bs-dismiss="offcanvas">Contact</a></li>
    </ul>
    <a href="{{ url('/login') }}" class="btn btn-pink">START SALE</a>
  </div>
</div>

<!-- HERO -->
<section class="hero-section" id="home">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <span class="badge-pill-custom"><i class="fa-solid fa-star me-1"></i> #1 POS Solution for Businesses</span>
        <h1 class="hero-title">Smart POS System for <span class="gradient-text">Growing Businesses</span></h1>
        <p class="hero-sub my-4">Manage sales, inventory &amp; reports in one powerful POS dashboard.</p>
        <div class="d-flex gap-3 mb-5 flex-wrap">
          <a href="{{ url('/login') }}" class="btn btn-pink">START SALE</a>
          <a href="{{ url('/login') }}" class="btn btn-outline-pink"><i class="fa-solid fa-play me-1"></i> WATCH DEMO</a>
        </div>
        <div class="d-flex flex-wrap gap-4">
          <div class="d-flex align-items-center gap-2 stat-item">
            <i class="fa-solid fa-users bg-purple-icon"></i>
            <div><div class="num">10K+</div><div class="lbl">Happy Users</div></div>
          </div>
          <div class="d-flex align-items-center gap-2 stat-item">
            <i class="fa-solid fa-store bg-red-icon"></i>
            <div><div class="num">500+</div><div class="lbl">Shops</div></div>
          </div>
          <div class="d-flex align-items-center gap-2 stat-item">
            <i class="fa-solid fa-globe bg-blue-icon"></i>
            <div><div class="num">50+</div><div class="lbl">Countries</div></div>
          </div>
          <div class="d-flex align-items-center gap-2 stat-item">
            <i class="fa-solid fa-shield-halved bg-green-icon"></i>
            <div><div class="num">99%</div><div class="lbl">Uptime</div></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-art text-center">
        <img src="{{ asset('images/hero.svg') }}" class="img-fluid" alt="Hero Illustration">
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="why-section" id="features">
  <div class="container text-center">
    <h2 class="section-title">Why Choose Our POS?</h2>
    <p class="section-sub mb-5">Powerful features to simplify your business operations</p>
    <div class="row g-4 text-start">
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon bg-purple-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h5>Sales Analytics</h5>
          <p>Track daily sales, best products and revenue in real-time.</p>
          <div class="arrow-circle"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon bg-red-icon"><i class="fa-solid fa-box"></i></div>
          <h5>Inventory Management</h5>
          <p>Manage stock, categories and suppliers with ease.</p>
          <div class="arrow-circle"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon bg-blue-icon"><i class="fa-solid fa-file-lines"></i></div>
          <h5>Smart Reports</h5>
          <p>Generate detailed reports and make better business decisions.</p>
          <div class="arrow-circle"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
      </div>
    </div>

    <div class="stats-bar mt-5">
      <div class="stat-row">
        <div class="stat">
          <i class="fa-solid fa-users"></i>
          <div>
            <div class="num">10K+</div>
            <div class="lbl">Happy Users</div>
          </div>
        </div>
        <div class="stat">
          <i class="fa-solid fa-shop"></i>
          <div>
            <div class="num">500+</div>
            <div class="lbl">Active Shops</div>
          </div>
        </div>
        <div class="stat">
          <i class="fa-solid fa-globe"></i>
          <div>
            <div class="num">50+</div>
            <div class="lbl">Countries</div>
          </div>
        </div>
        <div class="stat">
          <i class="fa-solid fa-shield-halved"></i>
          <div>
            <div class="num">99%</div>
            <div class="lbl">System Uptime</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials-section" id="testimonials">
  <div class="container text-center">
    <h2 class="section-title">Happy Clients</h2>
    <p class="section-sub mb-5">Trusted by businesses worldwide</p>
    <div class="d-flex align-items-center">
      <div class="carousel-arrow me-3 me-md-4 flex-shrink-0"><i class="fa-solid fa-chevron-left"></i></div>
      <div class="row g-4 flex-grow-1">
        <div class="col-md-3">
          <div class="client-card">
            <div class="client-photo">
              <img src="{{ asset('images/man.jpg') }}" alt="Danny Bailey">
            </div>
            <div class="client-body">
              <div class="stars">★★★★★</div>
              <p>"This POS system has completely changed the way we manage our business."</p>
              <h6>Danny Bailey</h6>
              <span>CEO &amp; Founder</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="client-card">
            <div class="client-photo">
              <img src="{{ asset('images/woman.png') }}" alt="Danny Bailey">
            </div>
            <div class="client-body">
              <div class="stars">★★★★★</div>
              <p>"This POS system has completely changed the way we manage our business."</p>
              <h6>Danny Bailey</h6>
              <span>CEO &amp; Founder</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="client-card">
            <div class="client-photo">
              <img src="{{ asset('images/man.jpg') }}" alt="Danny Bailey">
            </div>
            <div class="client-body">
              <div class="stars">★★★★★</div>
              <p>"This POS system has completely changed the way we manage our business."</p>
              <h6>Danny Bailey</h6>
              <span>CEO &amp; Founder</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="client-card">
            <div class="client-photo">
              <img src="{{ asset('images/man2.png') }}" alt="Danny Bailey">
            </div>
            <div class="client-body">
              <div class="stars">★★★★★</div>
              <p>"This POS system has completely changed the way we manage our business."</p>
              <h6>Danny Bailey</h6>
              <span>CEO &amp; Founder</span>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-arrow ms-3 ms-md-4 flex-shrink-0"><i class="fa-solid fa-chevron-right"></i></div>
    </div>
    <div class="dot-indicators mt-4">
      <span class="active"></span><span></span><span></span><span></span>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section class="contact-section" id="contact">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        <h2 class="section-title" style="font-size:1.9rem;">Let's Talk Business</h2>
        <p class="section-sub mb-4">Have questions? We'd love to hear from you.</p>
        <div class="d-flex gap-3 mb-4 contact-info">
          <div class="contact-info-icon"><i class="fa-solid fa-location-dot"></i></div>
          <div><h6>Address</h6><p>Chattogram</p></div>
        </div>
        <div class="d-flex gap-3 mb-4 contact-info">
          <div class="contact-info-icon"><i class="fa-solid fa-envelope"></i></div>
          <div><h6>Email</h6><p>mdshibgatullah94@gmail.com</p></div>
        </div>
        <div class="d-flex gap-3 mb-4 contact-info">
          <div class="contact-info-icon"><i class="fa-solid fa-phone"></i></div>
          <div><h6>Phone</h6><p>+880 1234-567890</p></div>
        </div>
        <div class="d-flex gap-3 contact-info">
          <div class="contact-info-icon"><i class="fa-solid fa-globe"></i></div>
          <div><h6>Website</h6><p>www.shop.com</p></div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="contact-form-card">
          <form class="contact-form">
            <div class="row g-3 mb-3">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Your Name"></div>
              <div class="col-md-6"><input type="email" class="form-control" placeholder="Email"></div>
            </div>
            <div class="mb-3"><textarea class="form-control" rows="5" placeholder="Message"></textarea></div>
            <button type="submit" class="btn btn-pink w-100">SEND MESSAGE</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <img src="{{ asset('images/logo.png') }}" width="90" class="mb-3" alt="Logo">
        <p>Powerful POS Solution for Modern Business</p>
        <div class="mt-3">
          <span class="social-icon"><i class="fa-brands fa-facebook-f"></i></span>
          <span class="social-icon"><i class="fa-brands fa-twitter"></i></span>
          <span class="social-icon"><i class="fa-brands fa-linkedin-in"></i></span>
          <span class="social-icon"><i class="fa-brands fa-instagram"></i></span>
        </div>
      </div>
      <div class="col-lg-2 col-6">
        <h6>Quick Links</h6>
        <div class="d-flex flex-column">
          <a href="#about">About</a>
          <a href="#services">Services</a>
          <a href="#contact">Contact</a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <h6>Resources</h6>
        <div class="d-flex flex-column">
          <a href="#">Documentation</a>
          <a href="#">Help Center</a>
          <a href="#">Privacy Policy</a>
        </div>
      </div>
      <div class="col-lg-3">
        <h6>Newsletter</h6>
        <p>Subscribe to get updates</p>
        <div class="d-flex">
          <input type="email" class="form-control newsletter-input" placeholder="Your email">
          <button class="newsletter-btn"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
    <div class="footer-bottom">© 2024 Learn with Rabbil. All rights reserved.</div>
  </div>
</footer>

@endsection