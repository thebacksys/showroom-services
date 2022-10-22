<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalesHistory;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SalesHistoryController extends Controller
{
    public function getTotalSalesWithBrandByDate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fromDate' => 'required',
                'toDate' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'success' => false,
                    'description' => 'Validate error',
                    'validator' => $errors,
                ]);
            }

            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            $data = [];
            $brands = VehicleBrand::all();
            foreach ($brands as $key => $brand) {
                $totalSales = SalesHistory::where('vehicle_brand_id', $brand->id)
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();
                $data[] = [
                    'brandId' => $brand->id,
                    'brand' => $brand->name,
                    'totalSales' => $totalSales,
                ];
            }

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'description' => 'Internal error',
            ]);
        }
    }

    public function getTotalSalesWithBrandModelByDate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fromDate' => 'required',
                'toDate' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'success' => false,
                    'description' => 'Validate error',
                    'validator' => $errors,
                ]);
            }

            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            $data = [];
            $brands = VehicleBrand::all();
            foreach ($brands as $key => $brand) {
                $models = VehicleModel::where('vehicle_brand_id', $brand->id)->get();
                $modelCountData = [];
                foreach ($models as $key => $model) {
                    $totalSales = SalesHistory::where('vehicle_brand_id', $brand->id)
                        ->where('vehicle_model_id', $model->id)
                        ->whereDate('created_at', '>=', $fromDate)
                        ->whereDate('created_at', '<=', $toDate)
                        ->count();
                    $modelCountData[] = [
                        'modelId' => $model->id,
                        'model' => $model->name,
                        'totalSales' => $totalSales,
                    ];
                }
                $data[] = [
                    'brandId' => $brand->id,
                    'brand' => $brand->name,
                    'models' => $modelCountData,
                ];
            }

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'description' => 'Internal error',
            ]);
        }
    }

    public function getTotalSalesWithBrandModelByEmployeeAndDate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fromDate' => 'required',
                'toDate' => 'required',
                'employeeId' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'success' => false,
                    'description' => 'Validate error',
                    'validator' => $errors,
                ]);
            }

            $fromDate = $request->fromDate;
            $toDate = $request->toDate;
            $employeeId = $request->employeeId;

            $employee = Employee::find($employeeId);
            if (!$employee) {
                return response()->json([
                    'success' => false,
                    'description' => 'Employee ID not found',
                ]);
            }

            $data = [];
            $brands = VehicleBrand::all();
            foreach ($brands as $key => $brand) {
                $models = VehicleModel::where('vehicle_brand_id', $brand->id)->get();
                $modelCountData = [];
                foreach ($models as $key => $model) {
                    $totalSales = SalesHistory::where('vehicle_brand_id', $brand->id)
                        ->where('vehicle_model_id', $model->id)
                        ->where('employee_id', $employeeId)
                        ->whereDate('created_at', '>=', $fromDate)
                        ->whereDate('created_at', '<=', $toDate)
                        ->count();
                    $modelCountData[] = [
                        'modelId' => $model->id,
                        'model' => $model->name,
                        'totalSales' => $totalSales,
                    ];
                }
                $data[] = [
                    'brandId' => $brand->id,
                    'brand' => $brand->name,
                    'models' => $modelCountData,
                ];
            }

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'description' => 'Internal error',
            ]);
        }
    }

    public function newSalesHistory(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'employeeId' => 'required',
                'vehicleModelId' => 'required',
                'vehicleBrandId' => 'required|integer',
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
            $vehicleModelId = $request->vehicleModelId;
            $employeeId = $request->employeeId;

            $employee = Employee::find($employeeId);
            if (!$employee) {
                return response()->json([
                    'success' => false,
                    'description' => 'Employee ID not found',
                ]);
            }

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

            $employee = Employee::find($employeeId);
            if (!$employee) {
                return response()->json([
                    'success' => false,
                    'description' => 'Employee not found',
                ]);
            }

            $SalesHistory = SalesHistory::create([
                'employee_id' => $employeeId,
                'vehicle_model_id' => $vehicleModelId,
                'vehicle_brand_id' => $vehicleBrandId,
            ]);

            return response()->json([
                'success' => true,
                'description' => 'Success',
                'data' => $SalesHistory,
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
