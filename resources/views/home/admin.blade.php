@extends('base')

@section('title','Admin')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

      <title>{{config('app.name')}}- Page Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/templatemo-villa-agency.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/swiper@7/swiper-bundle.min.css" rel="stylesheet">

    <!--

  TemplateMo 591 villa agency

  https://templatemo.com/tm-591-villa-agency

  -->

    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }

      .container {
        width: 80%;
        margin: auto;
        padding: 20px;
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
      }

      h2 {
        margin-top: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .vehicle {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .vehicle img {
        width: 100px;
        height: auto;
        margin-right: 20px;
      }

      .vehicle-info {
        flex-grow: 1;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th,
      td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #f2f2f2;
      }

      .add-btn {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .add-btn:hover {
        background-color: #45a049;
      }

      .action-btns {
        display: flex;
      }

      .action-btns a {
        margin-right: 10px;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
      }

      .action-btns a.update-btn {
        background-color: #428bca;
      }

      .action-btns a.delete-btn {
        background-color: #d9534f;
      }

      .image-container {
      position: relative;
    }

    .remove-image-btn {
      position: absolute;
      height: 30px;
      bottom: -25px;
      left: 180px;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 5px;
      border-radius: 100%;
      cursor: pointer;
    }
    </style>
      </head>
      <body>

          <!-- ***** Preloader Start ***** -->
          <div id="js-preloader" class="js-preloader">
            <div class="preloader-inner">
              <span class="dot"></span>
              <div class="dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
          <!-- ***** Preloader End ***** -->

          <div class="sub-header">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-8">
                  <ul class="info">
                    <li><i class="fa fa-envelope"></i> info@company.com</li>
                    <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
                  </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                  <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- ***** Header Area Start ***** -->
          <header class="header-area header-sticky">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                      <h1>Covoiturage</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    {{-- <ul class="nav">
                      <li><a href="{{ route('app_home') }}">Home</a></li>
                      <li><a href="{{ route('app_reservation') }}">Reservation</a></li>
                      <li><a href="{{ route('app_seconnecter') }}">Se Connecter</a></li>
                      <li><a href="{{ route('app_postuler') }}" class="active">Postuler</a></li>
                      <li><a href="{{ route('app_admin') }}"><i class="fa fa-calendar"></i> Admin</a></li>
                    </ul> --}}
                    <a class='menu-trigger'>
                      <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                  </nav>
                </div>
              </div>
            </div>
          </header>
          <!-- ***** Header Area End ***** -->

          <div class="page-heading header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <span class="breadcrumb"><a href="#">Home</a> / Page Admin </span>
                  <h3>Admin Panel</h3>
                </div>
              </div>
            </div>
          </div>


          <div class="container">
            <h1>Panel Admin - Service de Covoiturage</h1>

            <h2>Véhicules</h2>

        <!-- Add Vehicle Form -->
        <form id="add-vehicle-form">
          <div class="form-group">
            <label for="vehicle-image">Image du véhicule:</label>
            <div class="image-container">
              <input type="file" class="form-control-file" id="vehicle-image" accept="image/*" required onchange="previewImage(event)">
              <span id="remove-image-btn" class="remove-image-btn" onclick="removeImage()"><i class="fas fa-times"></i></span>
            </div>
            <img id="preview" src="#" alt="Image du véhicule" style="display:none; max-width: 200px; margin-top: 10px;">
          </div>
          <div class="form-group">
            <label for="vehicle-name">Nom du véhicule:</label>
            <input type="text" class="form-control" id="vehicle-name" required>
          </div>
          <div class="form-group">
            <label for="vehicle-status">Statut:</label>
            <select class="form-control" id="vehicle-status" required>
              <option value="Disponible">Disponible</option>
              <option value="Indisponible">Indisponible</option>
            </select>
          </div>
          <div class="form-group">
            <label for="vehicle-plate-number">Numéro de plaque:</label>
            <input type="text" class="form-control" id="vehicle-plate-number" required>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>



            <br>
            <!-- Example vehicle data, replace with data from your database -->
            <div class="vehicle">
              <img src="assets/images/photo-1551952237-954a0e68786c.avif" alt="Car 1">
              <div class="vehicle-info">
                <h3>Toyota Corolla 2020</h3>
                <p>Statut: Indisponible</p>
                <p>Numéro de plaque: XYZ123</p>
                <div class="action-btns">
                  <a href="#" class="update-btn">Mettre à jour</a>
                  <a href="#" class="delete-btn">Supprimer</a>
                </div>
              </div>
            </div>

            <div class="vehicle">
              <img src="assets/images/istockphoto-1307086567-170667a.webp" alt="Car 2">
              <div class="vehicle-info">
                <h3>Honda Accord 2019</h3>
                <p>Statut: Disponible</p>
                <p>Numéro de plaque: ABC456</p>
                <div class="action-btns">
                  <a href="#" class="update-btn">Mettre à jour</a>
                  <a href="#" class="delete-btn">Supprimer</a>
                </div>
              </div>
            </div>
            <!-- More vehicle divs for additional vehicles -->
          </div>

          <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

         <!-- Custom Script for Add Vehicle Form Submission -->
          <script>
            $(document).ready(function () {
              $('#add-vehicle-form').submit(function (e) {
                e.preventDefault();
                // Add your code to handle form submission (e.g., sending data to the server) here
                console.log('Form submitted');
              });
            });
          </script>

        <script>
          function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
              var output = document.getElementById('preview');
              output.src = reader.result;
              output.style.display = 'block'; // Affiche l'image
              document.getElementById('remove-image-btn').style.display = 'block'; // Affiche le bouton de suppression
            }
            reader.readAsDataURL(event.target.files[0]);
          }

          function removeImage() {
            document.getElementById('preview').src = '#'; // Supprime l'image
            document.getElementById('preview').style.display = 'none'; // Cache l'image
            document.getElementById('remove-image-btn').style.display = 'none'; // Cache le bouton de suppression
            document.getElementById('vehicle-image').value = ''; // Vide le champ de téléchargement d'image
          }
        </script>
      </body>
</html>
@endsection
