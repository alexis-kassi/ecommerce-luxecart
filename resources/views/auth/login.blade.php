@extends('layouts.app')

@section('content')
<div class="auth-page" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 4rem 2rem;">
    <div class="auth-card" style="width: 100%; max-width: 450px; background: var(--light); border: 1px solid var(--glass-border); border-radius: 40px; padding: 3.5rem; box-shadow: var(--shadow);">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <h1 style="font-size: 2.5rem; color: var(--dark); font-family: var(--font-outfit); margin-bottom: 0.5rem;">Bon Retour !</h1>
            <p style="color: var(--gray);">Connectez-vous pour continuer vos achats.</p>
        </div>

        @if($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #fecaca; font-size: 0.9rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none; transition: var(--transition);" placeholder="jean@exemple.com">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; font-size: 0.95rem;">Mot de passe</label>
                <input type="password" name="password" required style="width: 100%; padding: 14px 20px; border-radius: 15px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none; transition: var(--transition);" placeholder="••••••••">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--gray); cursor: pointer;">
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                <a href="#" style="color: var(--primary); font-size: 0.9rem; font-weight: 500;">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer; padding: 1.2rem; display: flex; align-items: center; justify-content: center; gap: 1rem;">
                Connexion <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
        </form>

        <div style="text-align: center; margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
            <p style="color: var(--gray); font-size: 0.95rem;">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" style="color: var(--primary); font-weight: 600;">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</div>
@endsection
