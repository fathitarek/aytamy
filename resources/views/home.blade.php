@extends('layouts.app')
@section('content')
   <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-2 col-sm-6 col-xs-12">
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
        <div class="col-md-2 col-sm-6 col-xs-12">
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion-tshirt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cloth Bank</span>
              <span class="info-box-number">
                @if(isset($cloth_amount))
                  {{$cloth_amount}} $
                  @else
                  0 $
              @endif
            </span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion-android-restaurant"></i></span>
  
            <div class="info-box-content">
              <span class="info-box-text">Food Bank</span>
              <span class="info-box-number">
                @if(isset($food_amount))
                  {{$food_amount}} $
                  @else
                  0 $
              @endif
            </span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion-android-bar"></i></span>
  
            <div class="info-box-content">
              <span class="info-box-text">Treatment Bank</span>
              <span class="info-box-number">
                @if(isset($treatment_amount))
                  {{$treatment_amount}} $
                  @else
                  0 $
              @endif
            </span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> 
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
              <h3 class="box-title"> Highest Donations For  Cases ( {{count ($highest_donations)}} )</h3>

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
                    @if(isset($highest_donations))
                    @foreach($highest_donations as $highest_donation)
                  <tr>
                    <td>{!! $highest_donation->name !!}</td>
                    <td>{!! $highest_donation->sumtion !!} $</td>
                    
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

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Highest Donations For Food Bank ( {{count ($highest_foods)}} )</h3>

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
                    @if(isset($highest_foods))
                    @foreach($highest_foods as $highest_food)
                  <tr>
                    <td>{!! $highest_food->name !!}</td>
                    <td>{!! $highest_food->sumtion !!} $</td>
                    
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




          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Highest Donations For Clothes Bank ( {{count ($highest_clothes)}} )</h3>

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
                    @if(isset($highest_clothes))
                    @foreach($highest_clothes as $highest_clothe)
                  <tr>
                    <td>{!! $highest_clothe->name !!}</td>
                    <td>{!! $highest_clothe->sumtion !!} $</td>
                    
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




          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Highest Donations For Treatment Bank ( {{count ($highest_treatments)}} )</h3>

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
                    @if(isset($highest_treatments))
                    @foreach($highest_treatments as $highest_treatment)
                  <tr>
                    <td>{!! $highest_treatment->name !!}</td>
                    <td>{!! $highest_treatment->sumtion !!} $</td>
                    
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
  