@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('
Verifique seu endereço de E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('
Um novo link de verificação foi enviado para o seu endereço de E-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, verifique seu E-mail para um link de verificação.') }}
                    {{ __('Se você não recebeu o Email') }}, <a href="{{ route('verification.resend') }}">{{ __('click aqui para mandar outro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
