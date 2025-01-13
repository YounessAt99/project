<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * @return response()
     */
    public function dashboard()
    {
        return view('agent.dashboard');
    }
}
