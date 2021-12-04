<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index() {
        return view('pages.candidate.index', [
            'candidate' => Candidate::class
        ]);
    }

    public function create() {
        return view('pages.candidate.create');
    }

}
