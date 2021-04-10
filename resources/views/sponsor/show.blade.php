@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sponsors
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('sponsor.show_fields')
                    <a href="{{ URL('kafel') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
