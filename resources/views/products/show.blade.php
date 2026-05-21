@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4">{{ $product->name }}</h3>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <p class="form-control-plaintext">{{ $product->description ?? '-' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <p class="form-control-plaintext">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <p class="form-control-plaintext">{{ $product->quantity }} unit</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Dibuat</label>
                        <p class="form-control-plaintext">{{ $product->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Diperbarui</label>
                        <p class="form-control-plaintext">{{ $product->updated_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline;" 
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
