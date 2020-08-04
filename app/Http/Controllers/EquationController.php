<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquationLiability;
use App\EquationIncome;
use App\EquationExpenses;
use App\EquationPaidLiability;

class EquationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function index_table()
    {
        $index_liability = EquationLiability::all(); 
        $index_income = EquationIncome::all();
        $index_expenses = EquationExpenses::all();
        $index_expenses_total = EquationExpenses::get()->sum('amount');
        $index_income_total = EquationIncome::get()->sum('amount');
        $ind=EquationPaidLiability::where('liability_id',1)->get()->sum('amount');
       
    
         return view('assest.index_table',compact('index_liability','index_income','index_expenses','index_expenses_total','index_income_total','ind'));
    }


    //Add Seciton*******************************************************************************************

    public function add_table()
    {
         $index_liability = EquationLiability::all(); 
        return view('assest.add_table',compact('index_liability'));
    }
    // add_liability
        public function add_liability(Request $request)
        {
            $add = new EquationLiability;
            $add->name =$request->name;
            $add->amount =$request->amount;
            $add->paid_month =$request->month;
            $add->save();
            return redirect()->route('add')->with('message','Data Submited');
        } 
                public function paid_liability(Request $request) //paid liability
                    {
                        if($request->name_id=='Choose name...')
                            {
                                return redirect()->route('add')->with('message','Select Name first');
                            }
                        else
                        {
                            $add = new EquationPaidLiability;
                            $add->liability_id =$request->name_id;
                            $add->month =$request->month;
                            $add->amount =$request->amount;
                          
                            $add->save();
                                $Ea = EquationPaidLiability::where('liability_id',$request->name_id)->sum('amount');
                                $Es= EquationLiability::find($request->name_id);
                                $Es->paid_amountplus =$Ea;
                                $Es->paid_monthplus =$request->month;
                                $Es->paid_current_amount= $request->amount;
                                $Es->update();
                                return redirect()->route('add')->with('message','Data Submited');
                        }
                    } 
        
        public function add_income(Request $request)// add_income
        {
            $add = new EquationIncome;
            $add->way =$request->way;
            $add->month =$request->month;
            $add->amount =$request->amount;
            $add->save();
            return redirect()->route('add')->with('message','Data Submited');
        } 
        
        public function add_expenses(Request $request) // add_expenses
        {
            $add = new EquationExpenses;
            $add->way =$request->ways;
            $add->month =$request->months;
            $add->amount =$request->amounts;
            $add->save();
            return redirect()->route('add')->with('message','Data Submited');
        } 

     public function list_table()
        {
            $index_liability = EquationLiability::all(); 
            $index_income = EquationIncome::all();
            $index_expenses = EquationExpenses::all();

            return view('assest.list_table',compact('index_liability','index_income','index_expenses'));
        }


//Edit Seciton*******************************************************************************************


            public function edit_liability(Request $request,$id)//edit liability
            {
                $edit_laibility = EquationLiability::find($id);
                $edit_paid_liability = EquationPaidLiability::where('liability_id',$id)->get();
                return view('assest.edit_liability_table',compact('edit_laibility','edit_paid_liability'));
            }
                    public function edit_kista_liability(Request $request,$id)
                    {
                        $edit_kista_liability = EquationPaidLiability::find($id);
                        return view('assest.edit_kista_liability_table',compact('edit_kista_liability'));
                    }  

             public function edit_income(Request $request,$id)//Edit Income
            {
                $edit_income = EquationIncome::find($id);
                 return view('assest.edit_income_table',compact('edit_income'));
            } 
              public function edit_expenses(Request $request,$id)//Edit Expenses
            {
                $edit_expenses = EquationExpenses::find($id);
                 return view('assest.edit_expenses_table',compact('edit_expenses'));
            } 
//update Seciton*******************************************************************************************

             public function update_liability (Request $request,$id)
            {
                $update_liability = EquationLiability::find($id);
                $update_liability->name =$request->name;
                $update_liability->amount =$request->amount;
                $update_liability->paid_month =$request->month;
                $update_liability->update();
                return redirect()->route('list')->with('message','Data Updated');
             }


            public function update_kista_liability (Request $request,$id)
            {
            $update_kista_liability = EquationPaidLiability::find($id);
            $update_kista_liability->amount =$request->amount;
            $update_kista_liability->month =$request->month;
            $update_kista_liability->update();
            $update_liability_id = EquationPaidLiability::where('id',$id)->first('liability_id');
            $ids=$update_liability_id->liability_id;
            $total_paid_laibility = EquationPaidLiability::where('liability_id',$ids)->sum('amount');
            // dd($ids);
            $update_liability = EquationLiability::find($ids);
            $update_liability->paid_monthplus=$request->month;
            $update_liability->paid_current_amount=$request->amount;
            $update_liability->paid_amountplus=$total_paid_laibility;
            $update_liability->update();
            return redirect()->route('list')->with('message','Data Updated');
            }
             public function update_income (Request $request,$id)
            {
                $update_liability = EquationIncome::find($id);
                $update_liability->way =$request->way;
                $update_liability->amount =$request->amount;
                $update_liability->month =$request->month;
                $update_liability->update();
                return redirect()->route('list')->with('message','Data Updated');
             }
              public function update_expenses (Request $request,$id)
            {
                $update_expenses = EquationExpenses::find($id);
                $update_expenses->way =$request->way;
                $update_expenses->amount =$request->amount;
                $update_expenses->month =$request->month;
                $update_expenses->update();
                return redirect()->route('list')->with('message','Data Updated');
             }
//Delete Seciton*******************************************************************************************

   
             public function delete_liability (Request $request,$id)// delete liability
            {
                $delete_liability = EquationLiability::find($id);
                $delete_paid_liability = EquationPaidLiability::where('liability_id',$id);
                $delete_liability->delete();
                $delete_paid_liability->delete();

                return redirect()->route('list')->with('message','Data Deleted');
             }

              public function delete_paid_liability (Request $request,$id)// delete paid liability
                {   

                $delete_paid_liability = EquationPaidLiability::find($id);//1
                $update_liability_id = EquationPaidLiability::where('id',$id)->first('liability_id');//2
                $delete_paid_liability->delete();//3                
                $ids=$update_liability_id->liability_id;//4
                $total_paid_laibility = EquationPaidLiability::where('liability_id',$ids)->sum('amount');//5
                $get_less_id = EquationPaidLiability::where('liability_id',$ids)->where('id',$id)->first('id');
                 $get_amount = EquationPaidLiability::where('liability_id',$ids)->orderBy('id','DESC')->first('amount');
                $amount=$get_amount->amount; 
                $update_liability =EquationLiability::find($ids);//6
                $update_liability->paid_amountplus=$total_paid_laibility;//7
                $update_liability->paid_current_amount=$amount;
                $update_liability->update(); 
                return redirect()->route('list')->with('message','Data Deleted');
                }
               
             public function delete_income (Request $request,$id)//delete income
            {
                $delete_income = EquationIncome::find($id); 
                $delete_income->delete();
                return redirect()->route('list')->with('message','Data Deleted');
             }
             public function delete_expenses (Request $request,$id) // delete expenses
            {
                $delete_expenses = EquationExpenses::find($id);
                $delete_expenses->delete();
                return redirect()->route('list')->with('message','Data Deleted');
             }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
