@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Kategori</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $kategori->nama }}</h5>
            <p class="card-text">{{ $kategori->deskripsi }}</p>
            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
            </form>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection