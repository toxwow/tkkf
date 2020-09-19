@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/contact.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 page-title-wrapper">
                <h1 class="page-title" style="position: initial">Kontakt</h1>
            </div>
            <div class="col-12 col-md-8">
                <p class="description">Informujemy, iż do 30.09.2020 przyjmujemy zgłoszenia zespołow i potwierdzenia udziału zespołów w poszczególnych ligach. W zgłoszeniu należy podać adres, dzień i godzinę hali. Ponadto prosimy o przesłanie numeru i email kontaktowego do kapitana zespołu.
                    <br><br>Zespoły,które dokonały wcześniej formalnośći nie muszą robić tego powtórnie.Na podstawie potwierdzonych zespołów zrobimy terminarze poszczególnych lig niezależnie od ilośći zespołów w danej lidze.Czas jest wyjątkowy i pewnie sezon też taki może być.
                    <br><br><b>Zgłoszenia proszę kierować na:</b> <br><br>
                    <i class="icofont-send-mail"></i> tkkf@tkkf.com <br> <i class="icofont-phone"></i>Leszek Tytko 512 142 810
                </p>
            </div>

        </div>
    </div>
    </section>
@endsection
