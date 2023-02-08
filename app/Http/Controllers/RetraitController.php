<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retrait;
use App\User;
use DB;

class RetraitController extends Controller
{
    public function index()
    {
        // $fonc_data =  DB::table('users')->get();
        $listRetraits = Retrait::paginate(5);
        // $listRetraits = User::where('retraits', '=', "R")->paginate(5);
        return view('Retraits/index',['retraits'=>$listRetraits]);
    }

    public function find1(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                
                $data = DB::table('retraits')
                        ->where('id',$query)
                        ->Orwhere('DOTI',$query)
                        ->get();
                // $data = $user->retrait;
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                $output .= '
                <table class="table table-striped">
                        <thead>
                            <tr class="table-active">
                                <th>id</th>
                                <th>DOTI</th>
                                <th>DATE RETRAIT</th>
                            </tr>
                        </thead>
                ';
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->DOTI.'</td>
                    <td>'.$row->DateRetraits.'</td>
                    </td>
                    </tr>';
                }
                $output .= '
                    </table>
                ';
            }
            else
            {
                $output .= '
                <tr>
                <td colspan="5"> Dont Exist </td>
                </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row  
            );
            echo json_encode($data);
        }
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {

    }

    public function show(Residence $residence)
    {

    }

  
    public function edit(Residence $residence)
    {

    }

   
    public function update(Request $request, Residence $residence)
    {

    }

    public function destroy(Residence $residence)
    {

    }

}
