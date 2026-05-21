@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-7">
        <h1 class="fw-bold mb-3">Fakhri Andika</h1>
        <h5 class="text-secondary mb-4">Staff Assistant | EY</h5>
        <small>Consulting · Technology Consulting · CNS · TC · Microsoft</small>
        <p class="lead corporate-text mt-3">A detail-oriented professional specializing as a Developer and Technical Consultant for Microsoft Dynamics 365 CRM at EY, with strong expertise in administrative workflows and digital solutions. Passionate about designing structured, efficient, and user-centric CRM systems to support modern business operations and enterprise transformation.</p>

        <div class="mt-4">
          <a href="{{ route('contact') }}" class="btn btn-outline-dark">Get in Touch</a>
          <a href="{{ route('contact') }}" class="btn btn-outline-secondary">Learn More</a>
        </div>
      </div>

      <div class="col-md-5 text-center">
        <div class="profile-photo-wrapper">
          <img src="{{ asset('img/Fakhri Andika Pas Poto.jpg') }}" alt="Fakhri Andika" class="profile-photo img-fluid rounded" />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-5">Core Capabilities</h2>

    <div class="row text-center">
      <div class="col-md-3 col-6 mb-4">
        <i class="bi bi-file-earmark-text mb-2 fs-1"></i>
        <h6 class="fw-semibold">Administrative Support</h6>
        <p class="text-muted small">Documentation, coordination, and operational support.</p>
      </div>

      <div class="col-md-3 col-6 mb-4">
        <i class="bi bi-bar-chart mb-2 fs-1"></i>
        <h6 class="fw-semibold">Data & Reporting</h6>
        <p class="text-muted small">Organized data handling and basic reporting structure.</p>
      </div>

      <div class="col-md-3 col-6 mb-4">
        <i class="bi bi-code-slash mb-2 fs-1"></i>
        <h6 class="fw-semibold">Web Development Dynamics 365</h6>
        <p class="text-muted small">HTML, CSS, Bootstrap, C#, Javascript for development of Dynamics 365 applications.</p>
      </div>

      <div class="col-md-3 col-6 mb-4">
        <i class="bi bi-lightbulb mb-2 fs-1"></i>
        <h6 class="fw-semibold">Digital Mindset</h6>
        <p class="text-muted small">Process improvement through digital solutions.</p>
      </div>
    </div>
  </div>
</section>

<section class="section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <i class="bi bi-person-circle fs-1 mb-3"></i>
        <h2>Professional Summary</h2>
        <p class="corporate-text">I am a dependable staff assistant with a structured approach to work, strong attention to detail, and a commitment to continuous improvement. Alongside my administrative responsibilities, I am actively developing capabilities in web development to support digital transformation initiatives within the workplace.</p>
        <div class="mt-4">
          <a href="{{ route('contact') }}" class="btn btn-outline-dark">Get in Touch</a>
          <a href="{{ route('about') }}" class="btn btn-outline-secondary">Learn More</a>
        </div>
      </div>

      <div class="col-md-6">
        <ul class="list-unstyled corporate-list">
          <li>✓ Strong organizational and analytical skills</li>
          <li>✓ Able to work independently and collaboratively</li>
          <li>✓ Fast learner with adaptive mindset</li>
          <li>✓ Comfortable in structured corporate environments</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-5">Areas of Contribution</h2>

    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <i class="bi bi-gear mb-2 fs-1"></i>
        <h6 class="fw-semibold">Operational Support</h6>
        <p class="text-muted small">Supporting daily operations through structured documentation and administrative coordination.</p>
      </div>

      <div class="col-md-4 mb-4">
        <i class="bi bi-graph-up mb-2 fs-1"></i>
        <h6 class="fw-semibold">Process Optimization</h6>
        <p class="text-muted small">Identifying opportunities for efficiency and digital improvement.</p>
      </div>

      <div class="col-md-4 mb-4">
        <i class="bi bi-display mb-2 fs-1"></i>
        <h6 class="fw-semibold">Web & Digital Support</h6>
        <p class="text-muted small">Creating basic web interfaces to support business needs.</p>
      </div>
    </div>
  </div>
</section>

<section class="section text-center lets-connect-section py-5">
  <div class="container">
    <h2>Let’s Connect</h2>
    <p class="mb-4">Open to professional discussions, collaboration, and career opportunities.</p>
    <a href="{{ route('contact') }}" class="btn btn-light">Get in Touch</a>
  </div>
</section>

@endsection
