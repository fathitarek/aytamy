@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Educations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($educations, ['route' => ['educations.update', $educations->id], 'method' => 'patch']) !!}

                        @include('educations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection