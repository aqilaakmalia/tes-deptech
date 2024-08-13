<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::whereNull('deleted_at')->get();

        return view('content.pages.pages-extracurriculars', compact('extracurriculars'));
    }
}