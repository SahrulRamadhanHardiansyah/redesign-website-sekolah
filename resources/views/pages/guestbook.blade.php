@extends('layouts.main')

@section('title', 'Buku Tamu - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/guestbook.css') }}">
@endsection

@section('content')
<div class="gb-page-header"> 
    <div class="container">
        <h1 class="gb-page-title">Buku <span>Tamu</span></h1> 
        <p class="gb-page-description">Silakan tinggalkan kesan, pesan, atau pertanyaan Anda untuk SMKN 1 Bangil.</p> 
    </div>
</div>

<section class="gb-section"> 
    <div class="container">
        <div class="gb-container"> 

            <div class="gb-form-card"> 
                <h5 class="gb-form-title">Tinggalkan Pesan Anda</h5> 

                @if (session('success'))
                    <div class="gb-alert gb-alert-success">{{ session('success') }}</div> 
                @endif

                <form action="{{ route('guestbook.store') }}" method="POST">
                    @csrf
                    <div class="gb-form-group"> 
                        <label for="name" class="gb-form-label">Nama Anda <span class="gb-required">*</span></label> 
                        <input type="text" class="gb-form-input @error('name') gb-input-error @enderror" id="name" name="name" value="{{ old('name') }}" required> 
                        @error('name')<div class="gb-error-message">{{ $message }}</div>@enderror 
                    </div>
                    <div class="gb-form-group"> 
                        <label for="message" class="gb-form-label">Pesan Anda <span class="gb-required">*</span></label> 
                        <textarea class="gb-form-textarea @error('message') gb-input-error @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea> 
                        @error('message')<div class="gb-error-message">{{ $message }}</div>@enderror 
                    </div>
                    <button type="submit" class="gb-button gb-button-primary">Kirim Pesan</button> 
                </form>
            </div>

            <div class="gb-entries"> 
                <h5 class="gb-entries-title">Pesan Terbaru</h5> 
                @forelse ($entries as $entry)
                    <div class="gb-entry-card"> 
                        <p class="gb-entry-message">{{ $entry->message }}</p> 
                        <div class="gb-entry-meta"> 
                            <span class="gb-entry-name">oleh: <strong>{{ $entry->name }}</strong></span> 
                            <span class="gb-entry-date">{{ $entry->created_at->diffForHumans() }}</span> 
                        </div>
                    </div>
                @empty
                    <div class="gb-alert gb-alert-info">Belum ada pesan. Jadilah yang pertama!</div> 
                @endforelse

                @if ($entries->hasPages())
                <div class="gb-pagination"> 
                    {{ $entries->links('vendor.pagination.simple-tailwind') }}
                </div>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection