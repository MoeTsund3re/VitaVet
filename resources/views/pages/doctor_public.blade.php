{{-- resources/views/pages/doctor_public.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="profile_page">
        <div class="profile_layout" style="max-width: 1200px; margin: 120px auto 60px; padding: 0 20px;">
            <div style="background: #1a1a2e; border-radius: 30px; padding: 40px; margin-bottom: 30px;">
                <div style="display: flex; gap: 40px; flex-wrap: wrap;">
                    <div style="flex-shrink: 0;">
                        <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}"
                            style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; border: 4px solid #014bff;">
                    </div>
                    <div style="flex: 1;">
                        <h1 style="color: white; font-size: 36px; margin-bottom: 10px;">{{ $doctor->name }}</h1>
                        <p style="color: #014bff; font-size: 20px; font-weight: 600; margin-bottom: 15px;">
                            {{ $doctor->specialization }}</p>

                        <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                            @if ($doctor->position)
                                <div style="background: rgba(1,75,255,0.15); padding: 5px 15px; border-radius: 20px;">
                                    <span style="color: #014bff;">{{ $doctor->position->name }}</span>
                                </div>
                            @endif
                            @if ($doctor->experience)
                                <div style="background: rgba(0,200,100,0.15); padding: 5px 15px; border-radius: 20px;">
                                    <span style="color: #00c864;">Опыт: {{ $doctor->experience }} лет</span>
                                </div>
                            @endif
                        </div>

                        <div style="margin-bottom: 20px;">
                            <div style="color: rgba(255,255,255,0.6); margin-bottom: 5px;">📧 {{ $doctor->email }}</div>
                            @if ($doctor->phone)
                                <div style="color: rgba(255,255,255,0.6);">📞 {{ $doctor->phone }}</div>
                            @endif
                        </div>

                        <div style="background: #014bff; border-radius: 16px; padding: 20px; display: inline-block;">
                            <div style="font-size: 14px; color: rgba(255,255,255,0.8);">Стоимость приема</div>
                            <div style="font-size: 32px; font-weight: 800;">{{ number_format($doctor->price, 0, ',', ' ') }}
                                ₽</div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($doctor->description)
                <div style="background: #1a1a2e; border-radius: 30px; padding: 40px; margin-bottom: 30px;">
                    <h2 style="color: white; margin-bottom: 20px;">О враче</h2>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">{{ $doctor->description }}</p>
                </div>
            @endif

            @if ($doctor->education)
                <div style="background: #1a1a2e; border-radius: 30px; padding: 40px;">
                    <h2 style="color: white; margin-bottom: 20px;">Образование</h2>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">{{ $doctor->education }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
