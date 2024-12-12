<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class Member_ProgramController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Daftar Program';
        $query = Program::query();
        if ($request->has('category')) {
            $query->where('code_category', $request->category);
        }
        if ($request->has('city')) {
            $query->where('code_city', $request->city);
        }
        if ($request->has('hide_past') && $request->hide_past) {
            $query->upcoming();
        }
        $query->active();
        $programs = $query->paginate(6)->withQueryString();

        return view('pages.program.index', compact('title', 'programs'));
    }

    public function show($code)
    {
        $title = 'Detail Program';
        $program = Program::where('code', $code)->firstOrFail();
        return view('pages.program.show', compact('title', 'program'));
    }
}
