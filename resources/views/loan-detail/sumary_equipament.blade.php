@extends('layouts.app')

@section('template_title')
Create Loan Detail
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Crear prestamo</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sumary_generate') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('loan-detail.sumary_equipament_form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection