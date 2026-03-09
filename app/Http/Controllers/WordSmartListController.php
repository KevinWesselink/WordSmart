<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WordSmartListController extends Controller
{
    public function index() {
        return view('wordsmart-lists.index');
    }

    public function create() {
        return view('wordsmart-lists.create');
    }
}
