<?php

namespace App\Helpers;

use App\CompanyUser;
use App\DocNumber;
use Exception;
use Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Auth;

class DocNo {

	
	public static function getDocNumber($formId, $companyId) {
		
		$docNumber = DocNumber::where(['form_id' => $formId, 'company_id' => $companyId])->first();
		
		return $docNumber;

	}
	public static function getDocNumberString($formId, $companyId) {
		
		$docNumber = DocNumber::where(['form_id' => $formId, 'company_id' => $companyId])->first();
		
		$pre = $docNumber->prefix_string ? $docNumber->prefix_string : '';
		$no = $docNumber->last_value ? $docNumber->last_value : 0;
		return $pre. (intval($no) + 1);

	}

	public static function updateDoc($formId, $companyId) {
		try{

			$docNumber = DocNumber::where(['form_id' => $formId, 'company_id' => $companyId])->first();
			$val = $docNumber->last_value;
			$docNumber->previos_value = $val;
			$docNumber->last_value = $val+1;
			$docNumber->save();
			return $docNumber;

		} catch(Exception $e) {
			return '';
		}
		
		

	}

	public static function companyId()
	{
		return CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
	}



}