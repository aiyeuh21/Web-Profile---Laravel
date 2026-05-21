@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Tentang Kami</h2>
            <p class="mb-3">
                Selamat datang di sistem manajemen produk kami. Platform ini dirancang untuk memudahkan pengelolaan 
                inventori produk dengan sistem autentikasi yang aman.
            </p>
            <p class="mb-3">
                Dengan fitur CRUD lengkap, Anda dapat dengan mudah menambah, mengedit, melihat, dan menghapus produk. 
                Semua data tersimpan dengan aman di database kami.
            </p>
            <p>
                Jika Anda memiliki pertanyaan atau memerlukan bantuan, silakan <a href="{{ route('contact') }}">hubungi kami</a>.
            </p>
        </div>
    </div>
</div>
@endsection
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  </head>
  <body>
    @include('partial.header')
    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>About Me</h1>
            <p class="corporate-text">Hello! I'm Fakhri Andika, a dedicated Staff Assistant at EY with a passion for technology and digital solutions. My role involves supporting administrative operations while actively contributing to web development projects, particularly in Microsoft Dynamics 365 CRM systems.</p>
            <p class="corporate-text">With a background in Technical Consultant and a growing expertise in web technologies, I focus on creating efficient, user-friendly digital experiences that enhance business processes. I'm committed to continuous learning and applying innovative solutions to real-world challenges.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="img/Fakhri Andika Pas Poto.jpg" alt="Fakhri Andika" class="profile-photo" />
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-light">
      <div class="container">
        <h2 class="text-center mb-5">Professional Experience</h2>
        <div class="row">
          <div class="col-md-6">
            <h5>Staff Assistant</h5>
            <h6 class="text-secondary">EY (Ernst & Young)</h6>
            <p class="small text-muted">Present</p>
            <ul>
              <li>Provide administrative support for consulting operations</li>
              <li>Assist in documentation and coordination of projects</li>
              <li>Contribute to data management and reporting tasks</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5>Technical Consultant</h5>
            <h6 class="text-secondary">Microsoft Dynamics 365 CRM</h6>
            <p class="small text-muted">Specialization</p>
            <ul>
              <li>Customiazation Dynamics 365 CRM Apps</li>
              <li>Implement solutions with C# and JavaScript</li>
              <li>Support digital transformation initiatives</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2 class="text-center mb-5">Skills & Expertise</h2>
        <div class="row text-center">
          <div class="col-md-4 mb-4">
            <i class="bi bi-code-slash fs-1 mb-3"></i>
            <h6>Web Development</h6>
            <p class="text-muted small">HTML, CSS, Bootstrap, JavaScript, C#</p>
          </div>
          <div class="col-md-4 mb-4">
            <i class="bi bi-bar-chart fs-1 mb-3"></i>
            <h6>Data Management</h6>
            <p class="text-muted small">Reporting, analysis, structured data handling</p>
          </div>
          <div class="col-md-4 mb-4">
            <i class="bi bi-lightbulb fs-1 mb-3"></i>
            <h6>Digital Solutions</h6>
            <p class="text-muted small">Process improvement, innovative thinking</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-light">
      <div class="container">
        <h2 class="text-center mb-5">Education</h2>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="text-center">
              <h5>Computer Science / Information Technology</h5>
              <h6 class="text-secondary">Universitas Paramadina</h6>
              <p class="small text-muted">Expected Graduation: 2026</p>
              <p>Currently pursuing studies in Computer Science with a focus on software development and information systems.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="text-center py-3 bg-dark text-light">© 2026 MyProfile</footer>
  </body>
</html>
