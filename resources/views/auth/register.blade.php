@extends('layouts.app')

@section('content')
<div class="auth-page" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 4rem 2rem;">
    <div class="auth-card" style="width: 100%; max-width: 500px; background: var(--light); border: 1px solid var(--glass-border); border-radius: 40px; padding: 3.5rem; box-shadow: var(--shadow);">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <h1 style="font-size: 2.5rem; color: var(--dark); font-family: var(--font-outfit); margin-bottom: 0.5rem;">Bienvenue !</h1>
            <p style="color: var(--gray);">Créez votre compte pour profiter de LuxeCart.</p>
        </div>

        @if($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #fecaca; font-size: 0.9rem;">
                <ul style="list-style: none; padding: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Nom complet</label>
                <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="Jean Kouassi">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="jean@exemple.com">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Mot de passe</label>
                    <input type="password" name="password" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Confirmer</label>
                    <input type="password" name="password_confirmation" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="••••••••">
                </div>
            </div>

            <div style="margin-bottom: 2.5rem;">
                <label style="display: flex; align-items: start; gap: 10px; font-size: 0.85rem; color: var(--gray); cursor: pointer; line-height: 1.5;">
                    <input type="checkbox" required style="margin-top: 3px;">
                    J'accepte les conditions d'utilisation et la politique de confidentialité de LuxeCart.
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer; padding: 1.2rem; display: flex; align-items: center; justify-content: center; gap: 1rem;">
                Créer mon compte <i class="fa-solid fa-user-plus"></i>
            </button>
        </form>

        <div style="text-align: center; margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
            <p style="color: var(--gray); font-size: 0.95rem;">
                Vous avez déjà un compte ? 
                <a href="{{ route('login') }}" style="color: var(--primary); font-weight: 600;">Connectez-vous</a>
            </p>
        </div>
    </div>
</div>
@endsection
