@extends('layouts.app')

@section('title', $service->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4">{{ $service->name }}</h3>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <p class="form-control-plaintext">{{ $service->description ?? '-' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <p class="form-control-plaintext">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <p class="form-control-plaintext">{{ $service->quantity }} unit</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Dibuat</label>
                        <p class="form-control-plaintext">{{ $service->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Diperbarui</label>
                        <p class="form-control-plaintext">{{ $service->updated_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="d-flex gap-2">
                        @if(auth()->user() && auth()->user()->role === 'admin')
                            <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('services.destroy', $service) }}" style="display:inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        @else
                            <a href="https://wa.me/6289660329648?text={{ urlencode("saya tertarik menggunakan jasa {$service->name}") }}" target="_blank" class="btn btn-primary">
                                <i class="bi bi-whatsapp"></i> Pesan via WA
                            </a>
                        @endif

                        <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
