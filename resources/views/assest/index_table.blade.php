@extends('layouts.master_backend')
@section('index_table')
       <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title">Liability</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Paid month</th>
                    <th>Paid Amount</th>
                    <th>Total Amount</th>
                    
                  </tr>
                  </thead>
                  <tbody>  
                    @foreach($index_liability as $get)
                    
                        
                  <tr>
                    <td class="text-capitalize">{{$get->name}}</td>
                      
                    <td class="text-capitalize">{{$get->paid_monthplus}}</td>
                    
                 <td>{{$get->paid_current_amount}}</td>

                     
                    <th><span class="font-weight-normal text-blue">Rs. {{$get->amount-$get->paid_amountplus}}</span> &nbsp;<span class="text-danger">({{$get->amount}})</span>@if($get->amount==$get->paid_amountplus) &nbsp; <span class="text-success">Finish</span> @elseif($get->paid_amountplus>$get->amount) &nbsp; Over @endif</th>
                        
                  </tr>
                         
                   
                  @endforeach
                     
            
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Total ({{$get->count()}})</th>
                    <th> </th> 
                     <th> </th>
                    <th class="text-danger">Rs. {{$get->sum('amount')-$get->sum('paid_amountplus')}}</th>
                   
                 
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           {{-- for income --}}
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Income</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Way</th>
                    <th>Month</th>
                    <th>Amount</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($index_income as $getincomes)
                  <tr>
                    <td class="text-capitalize">{{$getincomes->way}}</td>
                    <td class="text-capitalize">{{$getincomes->month}}</td>
                    <td>{{$getincomes->amount}}</td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name of field</th>
                    <th></th>
                   <th>Rs. {{$getincomes->sum('amount')}}</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{-- Expenses --}}
           <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title">Expenses and Loss</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Way</th>
                    <th>Month</th>
                    <th>Amount</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($index_expenses as $getexpenses)
                  <tr>
                     <td class="text-capitalize">{{$getexpenses->way}}</td>
                     <td class="text-capitalize">{{$getexpenses->month}}</td>
                     <td>{{$getexpenses->amount}}</td>
                   
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name of field</th>
                    <th></th>
                      <th>Rs. {{$getexpenses->sum('amount')}}</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{-- Balance Sheet --}}
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Balance Sheet</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example5" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                     <th>Amount</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                   <th>Total Income</th>

                     <th>{{$index_income_total}}</th>
                  
                   
                  </tr>
                    <tr>
                   <th>Total Expenses</th>
                    <th>{{$index_expenses_total}}</th>
                    
                  
                   
                  </tr>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Final</th>
                     <th class="btn btn-primary font-weight-bold @if($index_expenses_total> $index_income_total) text-danger @else text-white @endif "> {{$index_income_total-$index_expenses_total}} </th>
                     
                    
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection