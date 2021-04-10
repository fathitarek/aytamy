@extends('layouts.app')
@section('content')
   <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cases</span>
              <span class="info-box-number">
                @if(isset($number_of_cases))
                  {{$number_of_cases}}
                  @else
                  0
              @endif
            </span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sponsors</span>
              <span class="info-box-number">
        @if(isset($number_of_sponsors))
              {{$number_of_sponsors}}
             @else
              0
              @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- highest sales products -->
                    <!-- /.box -->
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Highest Likes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    
                    <th>Name</th>
                    <th>Number of Likes</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @if(isset($highest_wishlists))
                    @foreach($highest_wishlists as $highest_wishlist)
                  <tr>
                    <td>{!! $highest_wishlist->customer->name !!}</td>
                    
                    <td>{!! $highest_wishlist->count !!}</td>
                    
                  </tr>
               @endforeach
               @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.row -->
 <!-- <div class="box box-info"> -->
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Highest Users Orderd</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> -->
            <!-- /.box-header -->
            
              <!-- /.table-responsive -->
            <!-- </div> -->
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          <!-- </div> -->
          <!-- TABLE: LATEST ORDERS -->
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Highest wishlists products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>$</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @if(isset($highest_wishlists))
                    @foreach($highest_wishlists as $highest_wishlist)
                  <tr>
                    <td>{!! $highest_wishlist->count !!}</td>
                    {{-- <td>{!! $highest_wishlist->product !!}</td> --}}
                    
                  </tr>
               @endforeach
               @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  