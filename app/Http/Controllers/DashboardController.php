<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalTasks = Tugas::count();
        $completedProjects = Project::where('status', 'completed')->count();
        $completedTasks = Tugas::where('status', 'done')->count();

        return view('dashboard', compact('totalProjects', 'totalTasks', 'completedProjects', 'completedTasks'));
    }
}
