<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Contract;
use Illuminate\Http\Request;
use App\Type;
use App\Service;

class ContractController extends Controller
{
	public function create(){
		return view('cont/create');
	}

	public function store(Request $request){
		$data=$request->all();
		$res=Contract::create([
			'cust_name'=>$data['cust_name'],
			'cust_deal'=>$data['cust_deal'],
			'create_time'=>$data['create_time'],
			'update_time'=>$data['update_time']
		]);
		$cust_id=$res->cust_id;
		foreach($data['type_id'] as $k=>$v){

			$res=Service::create([
                'cust_id'=>$cust_id,
                'type_id'=>$v,
                'cust_content'=>$data['cust_content'][$k],
                'cust_money'=>$data['cust_money'][$k]
            ]);
		}
	}

	public function index(){
		$data=Contract::join('service','contract.cust_id','=','service.cust_id')->get()->toArray();
		$newData=[];
        foreach($data as $k=>$v){
            $status=$v['cust_id'];
            $newData[$status][]=$v;
        }
       
    //     foreach($newData as $k=>$v){
    //     	foreach($v as $kk=>$vv){
    //     		$v[$kk]['cust_money'];
				// dd($money);
    //     	}
    //     }
		return view('cont/index',['newData'=>$newData]);
	}
}