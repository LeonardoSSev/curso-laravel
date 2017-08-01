<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //

    public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('auth')->only(['Contato', 'Categoria']);
        //$this->middleware('auth')->except(['index', 'contato']);
    }

    public function index(){
        return "Home Page do Site";
    }

    public function Contato(){
        return "Pg Contato";
    }

    public function categoria($id){
        return "Lista da categoria {$id}";
    }

    public function categoriaOp($id=1){
        return "Lista da categoria {$id}";
    }
}
