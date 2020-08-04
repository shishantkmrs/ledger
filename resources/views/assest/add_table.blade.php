@extends('layouts.master_backend')
@section('add_table')

   @if ($message = Session::get('message'))
  
  <div class="card-body bg-cyan text-capitalize message" style="line-height:7px;position: absolute; right:0%; z-index: 1;">
               <i class="fas fa-check " style="line-height: 2px;"></i> &nbsp;  {{$message}}
              </div>
       

     @endif
 
     <!-- Form Element sizes -->

     

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Liabities</h3>
              </div>
              <div class="card-body">
              	<form action="/add_liability" method="POST">
              		@csrf
                 <div class="form-group">
                    <label >Creditors Name</label>
                    <input type="text" name="name"class="form-control form-control-lg" placeholder="Enter Name" required>

                    {{-- amount --}}
                    <label >Amount</label>
                    <input name="amount" type="text" class="form-control form-control-lg" placeholder="$00000" required>
                    {{-- month --}}
                    <label >Month</label>
                    <input name="month" type="text" class="form-control form-control-lg" placeholder="Enter month" required>
                  </div>
                  <input class="btn btn-primary" type="submit" name="submit" placeholder="Send" required>
              </form>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
            {{-- expand card --}}
            <div id="accordion">
			
			   <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header bg-success">
              <h3 class="card-title"> Given Amount</h3>

              <div class="card-tools">
              <button type="button"class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				        <i class="fas fa-minus text-white">  </i>
				        </button>  <button  class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                 </i></button>
              </div>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"style="padding-left:9px;">
            <form action="/paid_liability" method="POST">
            	@csrf
          		<div class="form-group">
                  <label>Creditor Name</label>
                  <select id="select" name="name_id" class=" form-control select2 form-control-lg" style="width: 100%;">
                   <option >Choose name...</option required>
                   @foreach($index_liability as $get)
                    <option class="selecteds" value="{{$get->id}}" required>{{$get->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
              	 <div class="form-group">
                    <label > Paid Month</label>
                    <input name="month" type="text" class="month form-control form-control-lg" placeholder="Enter paid month" required>
                <label for="inputEstimatedBudget"> Amount</label>
                <input name="amount" type="number" id="inputEstimatedBudget" class="amount form-control form-control-lg" placeholder="$0000" step="1" required>
              </div>
             <input class="btn btn-primary select_submit " type="submit" name="submit" placeholder="Send"></br></br>
           	
			</form> 
      	 </div>
            <!-- /.card-body -->
          </div>	
      </div>
      {{-- income --}}
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Income</h3>
              </div>
              <div class="card-body">
				<form action="/add_income" method="POST">
				  @csrf
                	 <div class="form-group">
                 	
	                    <label >Income way</label>
	                    <input name="way" type="text" class="form-control form-control-lg" placeholder="Enter income way" required>
	                    {{-- month --}}
	                    <label >Income Month</label>
	                    <input name="month" type="text" class="form-control form-control-lg" placeholder="Enter month" required>
	                    <label >Amount</label>
	                    <input name="amount" type="text" class="form-control form-control-lg" placeholder="$00000" required>
                  	
	                  </div>
	                  <input class="btn btn-primary" type="submit" name="submit" placeholder="Send">
				</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
            {{-- Expenses --}}
            {{-- income --}}
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Expenses</h3>
              </div>
              <div class="card-body">
				<form action="/add_expenses" method="POST">
				  @csrf
                	 <div class="form-group">
                 	
	                    <label >Expenses way</label>
	                    <input name="ways" type="text" class="form-control form-control-lg" placeholder="Enter income way" required>
	                    {{-- month --}}
	                    <label >Expenses Month</label>
	                    <input name="months" type="text" class="form-control form-control-lg" placeholder="Enter month" required>
	                    <label >Amount</label>
	                    <input name="amounts" type="text" class="form-control form-control-lg" placeholder="$00000" required>
                  	
	                  </div>
	                  <input class="btn btn-primary" type="submit" name="submit" placeholder="Send">
				</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        
         
@endsection