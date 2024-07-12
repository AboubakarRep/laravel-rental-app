<?php

use App\Http\Middleware\CheckAmosAdmin;
use App\Models\Vehicule;
use App\Models\Candidat;
use App\Http\Controllers\SexeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController; //add VehiculeController
use App\Http\Controllers\CandidatController; //add CandidatController
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RecuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;



Route::get('/', function () {
    return view('home.home');
})->name('app_home');

Route::get('/about', function () {
    return view('home.about');
})->name('app_about');

Route::get('/formulaire-reservation', function () {
    return view('home.form_reservation');
})->name('app_form-reservation');

 Route::get('/seconnecter', function () {
   return view('home.seconnecter');
 })->name('app_seconnecter');

Route::get('/compte', function () {
    return view('home.compte');
})->name('app_compte');



Route::get('/admin', function () {
    return view('home.admin');
})->name('app_admin');

// Route::get('/admin', function () {
//     return view('home.admin');
// })->name('app_admin');


Route::get('/reservation', function () {
    return view('home.reservation');
})->name('app_reservation');


//admin
Route::get('/adminl', function () {
    return view('admin.auth.login');
})->name('app_login');
// Route::get('/admin-home', function () {
//     return view('admin.pages.home');
// })->name('app_admin-home')

Route::get('/admin-home', [AppController::class, 'index'])->name('app_admin-home');

Route::get('reservations/{id}/facture', [RecuController::class, 'generate'])->name('recu.download');
Route::get('reservations/{id}/code', [RecuController::class, 'code'])->name('code.download');
//Route::get('/print', [RecuController::class,'generate'])->name('recu.download');
//Route::get('/admin-reservation', function () {
  //  return view('admin.pages.consulter_reservation');
//})->name('app_conreservation');

Route::get('/admin-profil', function () {
    return view('admin.pages.profil');
})->name('app_admin_profil');

Route::get('/admin-consultercaisse', function () {
    return view('admin.pages.consulter_caisse');
})->name('app_admin_consult_caisse');

Route::get('/admin-ajoutereservation', function () {
    return view('admin.pages.ajouter_reservation');
})->name('app_admin_formulaire_reservation');

Route::get('/admin-ajoutereservationcaisse', function () {
    return view('admin.pages.ajouter_reservation_caisse');
})->name('app_admin_formulaire_reservation_caisse');

// Route::get('/admin-recu', function () {
//     return view('admin.pages.recu');
// })->name('app_admin_recu');









Route::get('/postuler', function () {
    return view('home.postuler');
})->name('app_postuler');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/postuler', function () {
        return view('home.postuler');
    })->name('app_postuler');


    Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
    Route::post('/message', [MessageController::class, 'store'])->name('message.store');

    Route::get('/messages', function () {
        return view('messages');
     });

    // Afficher le formulaire de message


Route::get('/admin_vehicule', [VehiculeController::class, 'admin'])->name('admin');
Route::get('/admin_ajout_Vehicule', [VehiculeController::class, 'create'])->name('createnew');
Route::get('store/', [VehiculeController::class, 'store'])->name('store');
Route::get('admin_infoVehicule/{vehicule}', [VehiculeController::class, 'show'])->name('show');
Route::get('admin_modifier_vehicule/{vehicule}', [VehiculeController::class, 'edit'])->name('edit');
Route::put('edit/{vehicule}', [VehiculeController::class, 'update'])->name('update');
Route::delete('/{vehicule}', [VehiculeController::class, 'destroy'])->name('destroy');
Route::match(['get', 'put'],'/home.form_reservation/{vehicule}', [VehiculeController::class, 'showReservationForm'])->name('form_reservation');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/admin_chauffeur', [CandidatController::class, 'postulation'])->name('postulation');
Route::get('/admin_candidat', [CandidatController::class, 'postulations'])->name('postulations');
Route::get('/home.postuler', [CandidatController::class, 'create'])->name('postuler');
Route::get('ajouter/', [CandidatController::class, 'ajouter'])->name('ajouter');
Route::get('admin_info_candidat/{candidat}', [CandidatController::class, 'voirInfo'])->name('voirInfo');
Route::get('modifier/{candidat}', [CandidatController::class, 'modifier'])->name('modifier');
Route::put('modifier/{candidat}', [CandidatController::class, 'miseAjour'])->name('miseAjour');
Route::delete('/{candidat}', [CandidatController::class, 'retirer'])->name('retirer');


Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

Route::delete('supprimer/{candidat}', [CandidatController::class, 'supprimer'])->name('Supprimer');

Route::delete('supprimercat/{categorie}', [CategoryController::class, 'supprimer'])->name('SupprimerCateg');

Route::delete('supprimeresv/{reservation}', [ReservationController::class, 'supprimer'])->name('SupprimerRes');

Route::delete('supprimemarque/{marque}', [MarqueController::class, 'supprimer'])->name('SupprimerMarque');

Route::delete('supprimermodele/{modele}', [ModeleController::class, 'supprimer'])->name('SupprimerModele');

Route::put('modifierstatutuser/{reservation}', [ReservationController::class, 'changerReservationSatutUser'])->name('modifierStatutReservationUser');
Route::get('modifierstatutuser/{reservation}', [ReservationController::class, 'changerReservationUser'])->name('changerReservationUser');
Route::get('modifierstatut/{reservation}', [ReservationController::class, 'modifierstatut'])->name('modifierstatut');
Route::put('modifierstatut/{reservation}', [ReservationController::class, 'changerReservationSatut'])->name('modifierSatatutReservation');
Route::post('ajouterReservation/', [ReservationController::class, 'ajouterReservation'])->name('ajouterReservation');
Route::get('/admin-reservation', [ReservationController::class, 'reservationeff'])->name('reservationeff');



Route::post('storeCategorie/', [CategoryController::class, 'storeCategorie'])->name('storeCategorie');
Route::get('Ajout_categorie/', [CategoryController::class, 'create'])->name('ajouterCategorie');
Route::get('admin_categorie_vehicule/', [CategoryController::class, 'index'])->name('categorieliste');
Route::post('admin_categorie_vehicule_edit/{categorie}', [CategoryController::class, 'miseAjour'])->name('changerCategorie');
Route::get('admin_categorie_vehicule_edit/{categorie}', [CategoryController::class, 'modifierCategorie'])->name('modifierCategorie');


Route::post('storeMarque/', [MarqueController::class, 'storeMarque'])->name('storeMarque');
Route::get('Ajout_marque/', [MarqueController::class, 'create'])->name('ajouterMarque');
Route::get('admin_marque_vehicule/', [MarqueController::class, 'index'])->name('marqueliste');
Route::post('admin_marque_vehicule_edit/{marque}', [MarqueController::class, 'miseAjour_marque'])->name('changerMarque');
Route::get('admin_marque_vehicule_edit/{marque}', [MarqueController::class, 'modifiermarque'])->name('modifierMarque');


Route::get('sexeliste', [SexeController::class, 'index'])->name('sexeliste');
Route::get('ajouter_sexe_candidat', [SexeController::class, 'create'])->name('ajouterSexe');
Route::post('store_sexe_candidat', [SexeController::class, 'storeSexe'])->name('storeSexe');
Route::get('modifier_sexe_candidat/{sexe}', [SexeController::class, 'modifierSexe'])->name('modifierSexe');
Route::put('changer_sexe_candidat/{sexe}', [SexeController::class, 'miseAjour_Sexe'])->name('changerSexe');
Route::delete('supprimer_sexe_candidat/{sexe}', [SexeController::class, 'supprimer'])->name('supprimerSexe');


Route::post('storeModele/', [ModeleController::class, 'storeModele'])->name('storeModele');
Route::get('Ajout_modele/', [ModeleController::class, 'create'])->name('ajouterModele');
Route::get('admin_modele_vehicule/', [ModeleController::class, 'index'])->name('modeleliste');
Route::post('admin_modele_vehicule_edit/{modele}', [ModeleController::class, 'miseAjour_modele'])->name('changerModele');
Route::get('admin_modele_vehicule_edit/{modele}', [ModeleController::class, 'modifiermodele'])->name('modifierModele');
Route::get('/api/modeles/{marque_id}', [ModeleController::class, 'getModeles']);




Route::get('/caisse', [CaisseController::class, 'index'])->name('caisse.index');
Route::get('/caisse/create', [CaisseController::class, 'create'])->name('caisse.create');
Route::post('/caisse', [CaisseController::class, 'store'])->name('caisse.store');

Route::get('/caisse', [CaisseController::class, 'index'])->name('caisse.index');
Route::post('/caisse', [CaisseController::class, 'store'])->name('caisse.store');
// Ajoutez d'autres routes pour update et destroy si nécessaire


});

require __DIR__.'/auth.php';

