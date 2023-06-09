<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attestation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listUsers = User::paginate(5);
        $listAttestations = Attestation::paginate(5);
        return  view('template',['users'=>$listUsers,'attestations'=>$listAttestations]);
    }
}
