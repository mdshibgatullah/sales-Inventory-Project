@extends('layouts.app')

@section('content')


<!-- Custom CSS for this page -->
<style>
    .form-control {
        padding-left: 13px !important;
    }
</style>


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="{{ asset('images/logo.png') }}" width="90">
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link px-3" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#">Company</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#">Testimonials</a></li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-primary px-4" href="{{ url('/login') }}">Start Sale</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="pt-5 mt-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold mb-3">
                    Smart POS System for <span class="text-primary">Growing Businesses</span>
                </h1>
                <p class="text-muted mb-4">
                    Manage sales, inventory & reports in one powerful POS dashboard.
                </p>
                <a href="{{ url('/login') }}" class="btn btn-primary btn-lg me-2">Start Sale</a>
                <a href="{{ url('/login') }}" class="btn btn-outline-primary btn-lg">Login</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero.svg') }}" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- CLIENTS -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Happy Clients</h2>
            <p class="text-muted">Trusted by businesses worldwide</p>
        </div>

        <div class="row g-4">
           
            <div class="col-md-6 col-lg-3">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="{{ asset('images/man.jpg') }}" class="card-img-top rounded-top">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Danny Bailey</h5>
                        <p class="text-muted mb-0">CEO & Founder</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="{{ asset('images/woman.png') }}" class="card-img-top rounded-top">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Danny Bailey</h5>
                        <p class="text-muted mb-0">CEO & Founder</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="{{ asset('images/man.jpg') }}" class="card-img-top rounded-top">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Danny Bailey</h5>
                        <p class="text-muted mb-0">CEO & Founder</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card text-center border-0 shadow-sm h-100">
                    <img src="{{ asset('images/man2.png') }}" class="card-img-top rounded-top">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Danny Bailey</h5>
                        <p class="text-muted mb-0">CEO & Founder</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Let’s Talk Business</h2>
                <p class="text-muted">Have questions? We’d love to hear from you.</p>

                <h6 class="fw-bold mt-4">Address</h6>
                <p class="text-muted">Chattogram</p>

                <h6 class="fw-bold">Email</h6>
                <p class="text-muted">mdshibgatullah94@gmail.com</p>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form class="contact-form">
                            <input class="form-control mb-3" placeholder="Your Name">
                            <input class="form-control mb-3" placeholder="Email">
                            <textarea class="form-control mb-3" rows="4" placeholder="Message"></textarea>
                            <button class="btn btn-primary w-100">Send Message</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white py-5">
    <div class="container text-center">
        <img src="{{ asset('images/logo.png') }}" width="90" class="mb-3">
        <p class="text-muted mb-3">Powerful POS Solution for Modern Business</p>

        <div class="mb-4">
            <a href="#" class="text-white me-3">About</a>
            <a href="#" class="text-white me-3">Services</a>
            <a href="#" class="text-white">Contact</a>
        </div>

        <small class="text-muted">
            © 2024 Learn with Rabbil. All rights reserved.
        </small>
    </div>
</footer>

@endsection
