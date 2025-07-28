@extends('layouts.app') {{-- Eğer ortak bir layout varsa kullan, yoksa bu satırı kaldır --}}

@section('content')
<div class="container mt-5">
    <h2>Mesaj Gönder</h2>
    <div class="mb-4">
        <strong>Kullanıcı Adı:</strong> {{ Auth::user()->name }}
    </div>

    {{-- Başarılı gönderim mesajı --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hata mesajları --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.message.send') }}">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Mesajınız</label>
            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Mesajınızı buraya yazınız..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>
@endsection