@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Likes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($likes, ['route' => ['likes.update', $likes->id], 'method' => 'patch']) !!}

                        @include('likes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection