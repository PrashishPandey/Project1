<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\user_group;
use App\model\user;
class user_groups extends Controller
{
    //$ug=new user_group();
    //$u=new user();
    //-----insert function----
    public function insert_group(Request $request){
    	 //object create for user_group model
    	 $ug=new user_group();

    	 //get value
    	 $ug-> group_id = $request-> group_id;
    	 $ug-> group_name = $request-> group_name;
    	 $ug-> group_type = $request-> group_type;

    	 //insert
    	 $ug-> save();

    	 //check
    	 if($ug-> save()){
    	 	return ['sucess'=>$ug];
    	 }else{
    	 	return ['sucess'=>'operation failed'];
    	 }

    }
    //------
    public function insert_user(Request $request){
    	$u=new user();//object for use model
    	//data get
    	$u-> user_id = $request-> user_id;
    	$u-> group_id = $request-> group_id;
    	$u-> user_name = $request-> user_name;
    	$u-> user_pwd = $request-> user_pwd;
    	$u-> user_display_name = $request-> user_display_name;
    	$u-> user_mobile = $request-> user_mobile;
    	$u-> user_email = $request-> user_email;
    	$u-> registered_date = $request-> registered_date;
    	$u-> user_status = $request-> user_status;

    	//insert function call

    	$u-> save();

    	// check

    	if($u-> save()){
    		return ['sucess'=> $u];
    	}else{
    		return ['sucess'=>'operation failed'];
    	}
    }
    //----read func----
    public function read_group(){
    	//to read value
    	return user_group::all();
    }
    public function read_user(){

    	return user::all();
    }
    //------ to update the table
    public function update_group(Request $request,$group_id){
    	$groupup= user_group::where('group_id',$group_id);//find row
    	$groupup->update($request->all());//update row
    	return ['sucess'=>'updated group'];
    }
    //---update for user---
    public function update_user(Request $request,$user_id){
    	//$userup=new user();
    	$userup= user::where('user_id',$user_id);//find row
    	//update value
    	/*
    	$userup-> user_id = $request-> input('user_id');
    	$userup-> group_id = $request-> input('group_id');
    	$userup-> user_name = $request-> input('user_name');
    	$userup-> user_pwd = $request-> input('user_pwd');
    	$userup-> user_display_name = $request-> input('user_display_name');
    	$userup-> user_mobile = $request-> input('user_mobile');
    	$userup-> user_email = $request-> input('user_email');
    	$userup-> registered_date = $request-> input('registered_date');
    	$userup-> user_status = $request-> input('user_status');
		*/
    	//$userup->update();
    	$userup->update($request->all());// update the fields
    	
    	return ['sucess'=> "updated"];
    }
    
    //--- to delete the column
    //--delete for user_group
    public function delete_usergroup(Request $request,$group_id){
    	$groupdel=user_group::where('group_id',$group_id);
    	$groupdel->delete();
    	return ['sucess'=>$groupdel];
    }
    //---delete for user
    public function delete_user(Request $request, $user_id){
    	$userdel= user::where('user_id',$user_id);//it finds the specific row
    	//$userdel = user:: find($user_id);// it finds the user_id
    	$userdel-> delete();
    	return ['sucess'=>$userdel];
    }
    //---show by id
    public function showbygroupid(Request $request,$group_id){
    	return user_group::where('group_id',$group_id)->get();	
    }
    //---
    public function showbyuserid(Request $request,$user_id){
    	//$showid= user::where('user_id',$user_id);
    	return user::where('user_id',$user_id)->get();
    }
    //----
}
