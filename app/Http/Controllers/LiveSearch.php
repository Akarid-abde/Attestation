<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('fonc')
                        ->where('name','like','%'.$query.'%')
                        ->orwhere('add','like','%'.$query.'%')
                        //->orwhere('tele','like','%'.$query.'%')
                        ->orwhere('id','like','%'.$query.'%')
                        ->orderBy('name','desc')
                        ->get();
            }
            else
            {
                $data = DB::table('fonc')
                        ->orderBy('name','desc')
                        ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                $action = '<button class="btn btn-primary">Action</button>';
                
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->add.'</td>
                    <td>'.$row->tele.'</td>
                    <td>' .$action. '</td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output .= '
                <tr>
                <td colspan="5">No Data Found</td>
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
}
