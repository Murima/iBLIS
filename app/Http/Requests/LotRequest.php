<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
use App\Models\Lot;
class LotRequest extends Request {
	/**
	* Determine if the user is authorized to make this request.
	*
	* @return bool
	*/
	public function authorize() {
		return true;
	}
	/**
	* Get the validation rules that apply to the request.
	*
	* @return array
	*/
	public function rules() {
		$id = $this->ingnoreId();
		return [ 'name' => 'required|unique:lots,name,'.$id, ];
	}
	/**
	* @return \Illuminate\Routing\Route|null|string
	*/
	public function ingnoreId(){
		$id = $this->route('lot');
		$instrument_id = $this->input('instrument_id');
		return Lot::where(compact('id', 'instrument_id'))->exists() ? $id : '';
	}
}
