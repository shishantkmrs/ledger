@extends('layouts.master_backend')
@section('add_table')
     <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Liabilitys</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('/update_liability',['id'=>$edit_laibility->id]) }}" method="POST">
                  @CSRF
                 <div class="form-group">
                    <label >Creditors Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" value="{{$edit_laibility ->name}}" >
                     {{-- month --}}
                    {{--  --}}
                    <label >Amount</label>
                    <input type="text" name="amount" class="form-control form-control-lg"  value="{{$edit_laibility ->amount}}" >
                    <label >Month</label>
                    <input type="text" name="month" class="form-control form-control-lg"  value="{{$edit_laibility ->paid_month}}" >
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
              <h3 class="card-title">Paid Months</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                 
                          @foreach($edit_paid_liability as $edit)
              
                            <tr>
                                <td>{{$edit->month}}</td>
                                <td>{{$edit->amount}}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        
                                            <a href="{{ route('/edit_kista_liability',['id'=>$edit->id]) }}"><i class="btn btn-primary fas fa-eye"></i></a>
                                            <a href="{{ route('/delete_paid_liability',['id'=>$edit->id]) }}" data-confirm="Are you sure to delete this item?" class="btn btn-danger deleted"><i class="fas fa-trash"></i></a>
                                         
                                           
                                     </div>
                                </td>
                            </tr>
            
                          @endforeach
                    
                  
                    

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
  </div>
      
@endsection