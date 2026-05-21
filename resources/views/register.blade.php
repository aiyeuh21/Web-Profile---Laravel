<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Register - My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  </head>
  <body>
    @include('partial.header')
    <section class="section contact-section">
      <div class="container">
        <h1>Register</h1>
        <p class="corporate-text">Daftar untuk mendapatkan informasi lebih lanjut atau bergabung dengan WhatsApp saya.</p>
        <form action="register.php" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap:</label>
            <input type="text" id="name" name="name" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat:</label>
            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
