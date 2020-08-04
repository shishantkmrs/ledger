@extends('layouts.master_backend')
@section('edit_income_table')
     <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Incomes</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('/update_income',['id'=>$edit_income->id]) }}" method="POST">
                  @CSRF
                 <div class="form-group">
                    <label >Creditors Name</label>
                    <input type="text" name="way" class="form-control form-control-lg text-capitalize" value="{{$edit_income ->way}}" >
                     {{-- month --}}
                    {{--  --}}
                    <label >Amount</label>
                    <input type="text" name="amount" class="form-control form-control-lg"  value="{{$edit_income ->amount}}" >
                    <label >Month</label>
                    <input type="text" name="month" class="form-control form-control-lg text-capitalize"  value="{{$edit_income ->month}}" >
                  </div>
                  <input class="btn btn-primary" type="submit" name="submit" placeholder="Send">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
            {{-- expand card --}}
            <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                 </button>
              </div>
            </div>
            
            <!-- /.card-body -->
  </div>
      
@endsection