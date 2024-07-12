@extends('base')

@section('title','home')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     </head>
     <body >
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

 <div class="main-banner">
   <div class="owl-carousel owl-banner">
     <div class="item item-1">
       <div class="header-text">
         <span class="category">Mercedes, <em>Benz GLE</em></span>

       </div>
     </div>
     <div class="item item-2">
       <div class="header-text">
         <span class="category">Mercedes, <em>Benz class C AMG</em></span>

       </div>
     </div>
     <div class="item item-3">
       <div class="header-text">
         <span class="category">Suzuki, <em>Cote d'Ivoire</em></span>

       </div>
     </div>
   </div>
 </div>

{{-- <div class="featured section">
   <div class="container">
     <div class="row">
       <div class="col-lg-4">
         <div class="left-image">
           <img src="assets/images/car11.jpg" alt="">
           <a href="property-details.html"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
         </div>
       </div>
       <div class="col-lg-5">
         <div class="section-heading">
           <h6>| Featured</h6>
           <h2>Best car &amp; Sea view</h2>
         </div>
         <div class="accordion" id="accordionExample">
           <div class="accordion-item">
             <h2 class="accordion-header" id="headingOne">
               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 Best useful links ?
               </button>
             </h2>
             <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
               <div class="accordion-body">
               Get <strong>the best villa</strong> website template in HTML CSS and Bootstrap for your business. TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">best free CSS templates</a> in the world. Please tell your friends about it.</div>
             </div>
           </div>
           <div class="accordion-item">
             <h2 class="accordion-header" id="headingTwo">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                 How does this work ?
               </button>
             </h2>
             <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                 Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               </div>
             </div>
           </div>
           <div class="accordion-item">
             <h2 class="accordion-header" id="headingThree">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                 Why is Villa Agency the best ?
               </button>
             </h2>
             <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                 Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-lg-3">
         <div class="info-table">
           <ul>
             <li>
               <img src="assets/images/valise.png" alt="" style="max-width: 52px;">
               <h4>5<br><span>bagages</span></h4>
             </li>
             <li>
               <img src="assets/images/porte-de-voiture.png" alt="" style="max-width: 52px;">
               <h4>4<br><span>portes</span></h4>
             </li>
             <li>
               <img src="assets/images/gele.png" alt="" style="max-width: 52px;">
               <h4>oui<br><span>climatisation</span></h4>
             </li>
             <li>
               <img src="assets/images/groupe.png" alt="" style="max-width: 52px;">
               <h4>5+2<br><span>sièges</span></h4>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </div>
 </div>--}}

 <div class="section best-deal">
   <div class="container">
     <div class="row">
       <div class="col-lg-4">
         <div class="section-heading">
           <h6>| Meilleure offre</h6>
           <h2>Reserver dès maintenant !</h2>
         </div>
       </div>
       <div class="col-lg-12">
         <div class="tabs-content">
           <div class="row">
             <div class="nav-wrapper ">
               <ul class="nav nav-tabs" role="tablist">
                 <li class="nav-item" role="presentation">
                   <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Standard</button>
                 </li>
                 <li class="nav-item" role="presentation">
                   <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Medium</button>
                 </li>
                 <li class="nav-item" role="presentation">
                   <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Lux</button>
                 </li>
               </ul>
             </div>

             <div class="tab-content" id="myTabContent">
              @php
              $ids = \App\Models\Vehicule::pluck('id')->toArray();
              $randomId = null;
              if (!empty($ids)) {
                  $randomId = $ids[mt_rand(0, count($ids) - 1)];
              }
          @endphp


                      @foreach (\App\Models\Vehicule::whereHas('categorie', function ($query) {
                          $query->where('name', 'Standard');
                      })->get() as $vehicule)
                          @if ($vehicule->id == $randomId)
                              <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                                  <div class="row">
                                      <div class="col-lg-3">
                                          <div class="info-table">
                                              <ul>
                                                  <li>Climatisation <span>{{ $vehicule->climatisation ? 'Oui' : 'Non' }}</span></li>
                                                  <li>GPS <span>{{ $vehicule->gps ? 'Oui' : 'Non' }}</span></li>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <img src="/images/{{ $vehicule->image }}" alt="">
                                      </div>
                                      <div class="col-lg-3">
                                          <h4>Plus d'information</h4>
                                          <p>La Nouvelle Classe G attire immédiatement l'attention par son design avant racé et robuste, symbole de sa préparation à de nouvelles aventures. Sa taille emblématique est amplifiée par la calandre nouvellement conçue.
                                              </p>
                                          <div class="icon-button">
                                              <form action="{{ route('form_reservation',$vehicule->id) }}" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <button type="submit" class="fa fa-calendar">Reserver</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      @endforeach
                      </div>



                      @php
                      $ids = \App\Models\Vehicule::pluck('id')->toArray();
                      $randomId = !empty($ids) ? $ids[mt_rand(0, count($ids) - 1)] : null;
                  @endphp


                        @foreach (\App\Models\Vehicule::whereHas('categorie', function ($query) { $query->where('name', 'Medium');})->get() as $vehicule)
                            @if ($vehicule->id == $randomId)
                                <div class="tab-pane fade show active" id="villa" role="tabpanel" aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                 <ul>
                                                     <li>Climatisation <span>{{ $vehicule->climatisation ? 'Oui' : 'Non' }}</span></li>
                                                     <li>GPS <span>{{ $vehicule->gps ? 'Oui' : 'Non' }}</span></li>
                                                 </ul>
                                             </div>
                                       </div>
                                       <div class="col-lg-6">
                                             <img src="/images/{{ $vehicule->image }}" alt="">
                                        </div>
                                         <div class="col-lg-3">
                                               <h4>Plus d'information</h4>
                                                 <p>La Nouvelle Classe G attire immédiatement l'attention par son design avant racé et robuste, symbole de sa préparation à de nouvelles aventures. Sa taille emblématique est amplifiée par la calandre nouvellement conçue.
                                                   </p>
                                         <div class="icon-button">
                                                 <form action="{{ route('form_reservation',$vehicule->id) }}" method="POST">
                                                     @csrf
                                                     @method('PUT')
                                                          <button type="submit" class="fa fa-calendar">Reserver</button>
                                                 </form>
                                         </div>
                                      </div>
                                   </div>
                            </div>
                            @endif
                            @endforeach


                            @php
                            $ids = \App\Models\Vehicule::pluck('id')->toArray();
                            $randomId = null;
                            if (!empty($ids)) {
                                $randomId = $ids[mt_rand(0, count($ids) - 1)];
                            }
                        @endphp


                            @foreach (\App\Models\Vehicule::whereHas('categorie', function ($query) { $query->where('name', 'Lux');
                            })->get() as $vehicule)
                            @if ($vehicule->id == $randomId)
                                  <div class="tab-pane fade show active" id="penthouse" role="tabpanel" aria-labelledby="appartment-tab">
                                     <div class="row">
                                              <div class="col-lg-3">
                                                <div class="info-table">
                                                       <ul>
                                                            <li>Climatisation <span>{{ $vehicule->climatisation ? 'Oui' : 'Non' }}</span></li>
                                                             <li>GPS <span>{{ $vehicule->gps ? 'Oui' : 'Non' }}</span></li>
                                                        </ul>
                                                 </div>
                                               </div>
                                          <div class="col-lg-6">
                                             <img src="/images/{{ $vehicule->image }}" alt="">
                                          </div>
                                           <div class="col-lg-3">
                                               <h4>Plus d'information</h4>
                                                     <p>La Nouvelle Classe G attire immédiatement l'attention par son design avant racé et robuste, symbole de sa préparation à de nouvelles aventures. Sa taille emblématique est amplifiée par la calandre nouvellement conçue.

                                                          </p>
                                                <div class="icon-button">
                                                     <form action="{{ route('form_reservation',$vehicule->id) }}" method="POST">
                                                         @csrf
                                                         @method('PUT')
                                                           <button type="submit" class="fa fa-calendar">Reserver</button>
                                                     </form>
                                                 </div>
                                             </div>
                                        </div>
                                 </div>
                            @endif
                            @endforeach

                      </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
 </div>






 <div id="contactez_nous" class="contact section">
   <div class="container">
     <div class="row">
       <div class="col-lg-4 offset-lg-4">
         <div class="section-heading text-center">
           <h6>| Contactez nous</h6>
           <h2>Prenez contatct avec notre Parc Auto</h2>
         </div>
       </div>
     </div>
   </div>
 </div>

 <div class="contact-content">
   <div class="container">
     <div class="row">
       <div class="col-lg-7">

         <div class="row">
           <div class="col-lg-6">
             <div class="item phone">
               <img src="assets/images/appel.png" alt="" style="max-width: 35px;">
               <h8>+225 0140908964<br><span>Numéro</span></h8>
             </div>
           </div>
           <div class="col-lg-6">
             <div class="item email">
               <img src="assets/images/email.png" alt="" style="max-width: 35px;">
               <h8>info@ParcAuto.com<br><span>Email Professionnel</span></h8>
             </div>
           </div>
         </div>
       </div>
       <div class="col-lg-5">
         <form id="contact-form" action="{{ route('message.store') }}" method="post">
              @csrf
           <div class="row">
             <div class="col-lg-12">
               <fieldset>
                 <label for="name">Nom et prenoms</label>
                 <input type="name" name="name" id="name" placeholder="Votre Name..." autocomplete="on" required>
               </fieldset>
             </div>
             <div class="col-lg-12">
               <fieldset>
                 <label for="email">Addresse Email</label>
                 <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre E-mail..." required="">
               </fieldset>
             </div>
             <div class="col-lg-12">
               <fieldset>
                 <label for="subject">Objet</label>
                 <input type="subject" name="subject" id="subject" placeholder="Objet..." autocomplete="on" >
               </fieldset>
             </div>
             <div class="col-lg-12">
               <fieldset>
                 <label for="message">Message</label>
                 <textarea name="message" id="message" placeholder="Votre Message"></textarea>
               </fieldset>
             </div>
             <div class="col-lg-12">
               <fieldset>
                 <button type="submit" id="form-submit" class="orange-button">Envoyer Message</button>
               </fieldset>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>

 <footer>
   <div class="container">
     <div class="col-lg-8">
       <p>Copyright © 2048 Parc Atutomobile Co., Ltd. All rights reserved.
     </div>
   </div>
 </footer>
     </body>
</html>
@endsection
