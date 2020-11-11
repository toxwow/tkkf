@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/contact.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 page-title-wrapper">
                <h1 class="page-title" style="position: initial">Dokumenty</h1>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Karta zgłoszenia zespołu na sezon 2020/2021</h5>
                        <p class="card-text">Kapitan ma obowiązek dostarczenia sędziemu wypełnionej karty na pierwszy mecz sezonu.</p>
                        <a href="{{ asset('files/karta.doc') }}" download class="btn btn-primary">Pobierz plik</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body">
                        <h5 class="card-title">Ankieta w zakresie profikatyki zakażeń SARS-COV-2</h5>
                        <p class="card-text">Kapitan jest zobowiązany wypełnić ankietę i dostarczyć ją sędziemu przed każdym meczem w sezonie.</p>
                        <a href="{{ asset('files/covid.doc') }}" download class="btn btn-primary">Pobierz plik</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </section>
@endsection
