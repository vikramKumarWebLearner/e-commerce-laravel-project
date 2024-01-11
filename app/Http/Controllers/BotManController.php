<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Message\Incoming\Answer;
class BotManController extends Controller
{
    public function index()
    {
        $botman = app('botman');
        return view('frotend.botman');
    }
}
