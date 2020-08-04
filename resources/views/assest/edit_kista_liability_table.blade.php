@extends('layouts.master_backend')
@section('edit_kista_table')
     <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Liabities</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('/update_kista_liability',['id'=>$edit_kista_liability->id]) }}" method="POST">
                   @CSRF<div class="form-group">
                    <label >Creditors </label></br>                      
                    <label >Month</label>  {{-- month --}}
                      <input type="text" name="month" class="form-control form-control-lg"  value="{{$edit_kista_liability->month}}" >                    
                      <label >Amount</label>{{-- amount --}}
                      <input type="text" name="amount" class="form-control form-control-lg"  value="{{$edit_kista_liability->amount}}" >
                  </div>
                    <input class="btn btn-primary" type="submit" name="submit" placeholder="Send">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
            {{-- expand card --}}
            
     
@endsection