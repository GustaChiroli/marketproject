@component('mail::message')
# Boas Vindas
 
Seja muito bem vindo a plataforma Mega Market

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)

@component('mail::button', ['url' => config('app.url')])
Confirmar Conta
@endcomponent
 
Obrigado,
{{ config('app.name') }}
@endcomponent