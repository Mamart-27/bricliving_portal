<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OperationExpenditure extends Model
{
    use HasFactory;

    public function import($data, $entitiy){
        foreach ($data[0] as $pck => $pcVal) {            
            $propertyID = DB::table('properties')->where('ref_no', $pcVal[0])->select('properties.id')->first();
            if ($propertyID) {
                $operationExpenditureID = DB::table('operation_expenditures')->where('property_id', $propertyID->id)->select('id')->first();
                // update operation expenditure
                if ($operationExpenditureID) {
                    $operation_expenditures = DB::table('operation_expenditures')
                    ->where('operation_expenditures.id', '=', $operationExpenditureID->id)
                    ->update([
                        'operation_expenditures.property_id' => $propertyID->id,
                        'operation_expenditures.expenditure_year' => $pcVal[1] ? $pcVal[1] : null,
                        'operation_expenditures.hmo_licence_fee' => $pcVal[2] ? number_format($pcVal[2]) : null,
                        'operation_expenditures.hmo_licence_period' => $pcVal[3] ? number_format($pcVal[3]) : null,
                        'operation_expenditures.hmo_fee_per_year' => $pcVal[4] ? number_format($pcVal[4]) : null,
                        'operation_expenditures.maintenance_property_year' => $pcVal[5] ? number_format($pcVal[5]) : null,
                        'operation_expenditures.maintenance_bed_year' => $pcVal[6] ? number_format($pcVal[6]) : null,
                        'operation_expenditures.gas_property_year' => $pcVal[7] ? number_format($pcVal[7]) : null,
                        'operation_expenditures.gas_bed_year' => $pcVal[8] ? number_format($pcVal[8]) : null,
                        'operation_expenditures.electric_property_year' => $pcVal[9] ? number_format($pcVal[9]) : null,
                        'operation_expenditures.electric_bed_year' => $pcVal[10] ? number_format($pcVal[10]) : null,
                        'operation_expenditures.water_property_year' => $pcVal[11] ? number_format($pcVal[11]) : null,
                        'operation_expenditures.water_bed_year' => $pcVal[12] ? number_format($pcVal[12]) : null,
                        'operation_expenditures.internet_property_year' => $pcVal[13] ? number_format($pcVal[13]) : null,
                        'operation_expenditures.internet_bed_year' => $pcVal[14] ? number_format($pcVal[14]) : null,
                        'operation_expenditures.tv_licence_per_house' => $pcVal[15] ? number_format($pcVal[15]) : null,
                        'operation_expenditures.property_insurance_annual_cost' => $pcVal[16] ? number_format($pcVal[16]) : null,
                        'operation_expenditures.total_opex_budget' => $pcVal[17] ? number_format($pcVal[17]) : null,
                    ]);
                }else{
                    $expenditure = new OperationExpenditure();
                    $expenditure->property_id = $propertyID->id;
                    $expenditure->expenditure_year = $pcVal[1] ? $pcVal[1] : null;
                    $expenditure->hmo_licence_fee = $pcVal[2] ? number_format($pcVal[2]) : null;
                    $expenditure->hmo_licence_period = $pcVal[3] ? number_format($pcVal[3]) : null;
                    $expenditure->hmo_fee_per_year = $pcVal[4] ? number_format($pcVal[4]) : null;
                    $expenditure->maintenance_property_year = $pcVal[5] ? number_format($pcVal[5]) : null;
                    $expenditure->maintenance_bed_year = $pcVal[6] ? number_format($pcVal[6]) : null;
                    $expenditure->gas_property_year = $pcVal[7] ? number_format($pcVal[7]) : null;
                    $expenditure->gas_bed_year = $pcVal[8] ? number_format($pcVal[8]) : null;
                    $expenditure->electric_property_year = $pcVal[9] ? number_format($pcVal[9]) : null;
                    $expenditure->electric_bed_year = $pcVal[10] ? number_format($pcVal[10]) : null;
                    $expenditure->water_property_year = $pcVal[11] ? number_format($pcVal[11]) : null;
                    $expenditure->water_bed_year = $pcVal[12] ? number_format($pcVal[12]) : null;
                    $expenditure->internet_property_year = $pcVal[13] ? number_format($pcVal[13]) : null;
                    $expenditure->internet_bed_year = $pcVal[14] ? number_format($pcVal[14]) : null;
                    $expenditure->tv_licence_per_house = $pcVal[15] ? number_format($pcVal[15]) : null;
                    $expenditure->property_insurance_annual_cost = $pcVal[16] ? number_format($pcVal[16]) : null;
                    $expenditure->total_opex_budget = $pcVal[17] ? number_format($pcVal[17]) : null;
                    $expenditure->save();
                }
            }
        }
        return true;
    }
}
