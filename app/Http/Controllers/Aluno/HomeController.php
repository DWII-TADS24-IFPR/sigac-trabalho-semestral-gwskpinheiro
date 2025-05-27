<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('aluno.home');
    }
}
