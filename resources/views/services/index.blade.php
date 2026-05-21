@extends('layouts.app')

@section('title', 'Daftar Jasa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>Daftar Jasa</h2>
        </div>
        <div class="col-md-4 text-end">
            @if(auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ route('services.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Jasa
            </a>
            @endif
        </div>
    </div>

    @if ($services->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                            <td>{{ $service->quantity }}</td>
                            <td>
                                <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if(auth()->user() && auth()->user()->role === 'admin')
                                    <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('services.destroy', $service) }}" style="display:inline;" 
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    {{-- Regular users can order via WhatsApp --}}
                                    <a href="https://wa.me/6289660329648?text={{ urlencode("saya tertarik menggunakan jasa {$service->name}") }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-whatsapp"></i> Pesan
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $services->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada jasa. <a href="{{ route('services.create') }}">Buat jasa baru</a>
        </div>
    @endif
</div>
@endsection
