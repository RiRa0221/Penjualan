<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Selamat Datang</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Satisfy&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .hero-section {
      background: url('{{ asset('storage/bckgrndd.jpg') }}') no-repeat center center / cover;
      height: 100vh;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding-right: 150px; /* Sedikit ke kiri */
    }

    h1 {
      font-size: 4.6rem !important;
      font-family: 'Playfair Display', serif !important;
      font-weight: bold;
      color: white; /* Warna teks putih */
      text-shadow: 
        -1px -1px 0 #f158a7, 
         1px -1px 0 #f158a7, 
        -1px  1px 0 #f158a7, 
         1px  1px 0 #f158a7; /* Efek border pink */
    }
  </style>
</head>

<body>
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="main-content text-right max-w-lg">
      <h1>Welcome to the <br> Sales Website</h1>
      <div class="mt-12 text-center">
        <a href="{{ route('register') }}" class="px-6 py-3 bg-pink-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-pink-600 transition">
          REGISTER
        </a>
        <a href="{{ route('login') }}" class="px-6 py-3 bg-pink-100 text-pink-500 text-base font-medium rounded-lg shadow-md hover:bg-pink-200 transition ml-4">
          LOGIN
        </a>
      </div>
    </div>
  </section>
</body>

</html>
