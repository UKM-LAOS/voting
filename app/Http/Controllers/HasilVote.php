<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilVote extends Controller
{
    public function index() {
        if (Auth::user()->role!=1){
            return redirect(route('admin.dashboard'))->with('status','Eits, gak boleh lihat! Tunggu diumumin ya...');
        }

        $candidates = Candidate::all();

        $candidateNames = [];
        $candidateVotes = [];

        $votes = [];

        foreach ($candidates as $c) {
            $count = Vote::where('candidate_id', $c->id)->count();
            array_push($candidateNames, $c->name);
            array_push($candidateVotes, $count);
            array_push($votes, [
                'name'=>$c->name,
                'count'=>$count,
            ]);
        }

        return view('pages.hasil-vote.index', compact('votes'))->with('namesJson',json_encode($candidateNames))->with('votesJson',json_encode($candidateVotes,JSON_NUMERIC_CHECK));;
    }
}
