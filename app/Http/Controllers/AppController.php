<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Vehicule;
use App\Models\Reservation;
use PHPUnit\Framework\Constraint\Count;

class AppController extends Controller
{
    //
    public function index()
    {
        $totalVehicule = Vehicule::all()->count();
        $totalChauffeur = Candidat::all()->count();
        $totalRevenue = Reservation::sum('cout');


        //  $appName = Configuration::where('type','APP_NAME')->first();



        return view('admin.pages.home', compact('totalVehicule', 'totalChauffeur', 'totalRevenue',));
    }
}
