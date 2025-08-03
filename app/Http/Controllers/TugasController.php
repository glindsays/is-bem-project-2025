<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tugas;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tugas::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('deadline')) {
            $query->whereDate('deadline', $request->deadline);
        }

        // $tugas = Tugas::with('project')->get();
        $tugas = $query->with('project')->latest()->get();
        return view('tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tugas.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:to-do,in-progress,done',
            'file' => 'nullable|file|max:10240' //10mb(?)
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tugas_files', 'public');
            $validated['file_path'] = $filePath;
        }

        Tugas::create($validated);

        return redirect()->route('tugas.index')->with('success', 'Task created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $projects = Project::all();
        return view('tugas.edit', compact('tugas', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:to-do,in-progress,done',
            'file' => 'nullable|file|max:10240'
        ]);

        $tugas = Tugas::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($tugas->file_path && \Storage::disk('public')->exists($tugas->file_path)) {
                \Storage::disk('public')->delete($tugas->file_path);
            }

            $validated['file_path'] = $request->file('file')->store('tugas_files', 'public');
        }

        if ($request->has('delete_file')) {
            Storage::delete('public/' . $tugas->file_path);
            $tugas->file_path = null;
        }

        $tugas->update($validated);

        return redirect()->route('tugas.index')->with('success', 'Task updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success', 'Task deleted successfully!');
    }
}
