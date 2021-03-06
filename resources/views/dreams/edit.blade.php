@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dreams
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dreams, ['route' => ['dreams.update', $dreams->id], 'method' => 'patch']) !!}

                        @include('dreams.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection