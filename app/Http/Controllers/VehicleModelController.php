<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VehicleModelController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'vehicleBrandId' => 'required|integer',
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'success' => false,
                    'description' => 'Validate error',
                    'validator' => $errors,
                ]);
            }

            $vehicleBrandId = $request->vehicleBrandId;
            $name = $request->name;

            $vehicleBrand = VehicleBrand::find($vehicleBrandId);
            if (!$vehicleBrand) {
                return response()->json([
                    'success' => false,
                    'description' => 'Vehicle Brand ID not found',
                ]);
            }

            $VehicleModel = VehicleModel::create([
                'vehicle_brand_id' => $vehicleBrandId,
                'name' => $name,
            ]);

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $VehicleModel,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'description' => 'Internal error',
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'vehicleBrandId' => 'required|integer',
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'success' => false,
                    'description' => 'Validate error',
                    'validator' => $errors,
                ]);
            }

            $vehicleModelId = $request->vehicleModelId;
            $vehicleBrandId = $request->vehicleBrandId;
            $name = $request->name;

            $vehicleBrand = VehicleBrand::find($vehicleBrandId);
            if (!$vehicleBrand) {
                return response()->json([
                    'success' => false,
                    'description' => 'Vehicle Brand ID not found',
                ]);
            }

            $vehicleModel = VehicleModel::find($vehicleModelId);
            if (!$vehicleModel) {
                return response()->json([
                    'success' => false,
                    'description' => 'Vehicle Model ID not found',
                ]);
            }

            $vehicleModel->vehicle_brand_id = $vehicleBrandId;
            $vehicleModel->name = $name;
            $vehicleBrand->save();

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $vehicleModel,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'description' => 'Internal error',
            ]);
        }
    }
}
