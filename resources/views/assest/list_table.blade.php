@extends('layouts.master_backend')
@section('list_table')
 @if ($message = Session::get('message'))
  
  <div class="card-body bg-orange text-capitalize message" style="line-height:7px;position: absolute; right:0%; z-index: 1;">
               <i class="fas fa-check " style="line-height: 2px;"></i> &nbsp;  {{$message}}
              </div>
       

     @endif

  <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Liabities</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($index_liability as $get)
                      <tr>
                        <td class="text-capitalize">{{$get->name}}</td>
                        <td class="text-capitalize">{{$get->paid_month}} </td>
                        <td>{{$get->amount}} </td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{ route('/edit_liability',['id'=>$get->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a> 
                            <a href="{{ route('/delete_liability',['id'=>$get->id]) }}" data-confirm="Are you sure to delete this item?" class="btn btn-danger deleted"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      
                  @endforeach 
                  <tr>
                     <th> Total ({{$get->count()}})</th>
                     <th></th>
                      <th></th>
                      <th></th>
                   </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
  </div>
  {{-- income --}}
   <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Income</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Way</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($index_income as $getincome)
                      <tr>
                        <td class="text-capitalize">{{$getincome->way}}</td>
                         <td class="text-capitalize">{{$getincome->month}} </td>
                        <td>{{$getincome->amount}}</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                              <a href="{{ route('/edit_income',['id'=>$getincome->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a> 
                               <a href="{{ route('/delete_income',['id'=>$getincome->id]) }}" data-confirm="Are you sure to delete this item?" class="btn btn-danger deleted"><i class="fas fa-trash"></i></a>
                            </div>
                         </td>                                       
                          </tr>
                    @endforeach 
                    <tr>
                      <th> Total ({{$getincome->count()}})</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
  </div>
  {{-- expenses --}}
  <div class="card card-orange">
            <div class="card-header">
              <h3 class="card-title">Expenses</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Way</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                   @foreach($index_expenses as $getexpenses)
                      <tr>
                        <td class="text-capitalize">{{$getexpenses->way}}</td>
                        <td class="text-capitalize">{{$getexpenses->month}} </td>
                        <td>{{$getexpenses->amount}}</td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{ route('/edit_expenses',['id'=>$getexpenses->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a> 
                            <a href="{{ route('/delete_expenses',['id'=>$getexpenses->id]) }}" data-confirm="Are you sure to delete this item?" class="btn btn-danger deleted"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    
                   @endforeach
                   <tr>
                     <th> Total ({{$getexpenses->count()}})</th>
                     <th></th>
                      <th></th>
                      <th></th>
                   </tr>
                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
  </div>
 @endsection   