<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        return view('services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Jasa berhasil ditambahkan!');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $service->update($validated);

        return redirect()->route('services.show', $service)->with('success', 'Jasa berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Jasa berhasil dihapus!');
    }
}
