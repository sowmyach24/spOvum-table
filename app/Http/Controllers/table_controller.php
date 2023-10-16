<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tables;
use Illuminate\Support\Facades\File;

class table_controller extends Controller
{
    public function extractAndInsertData() {
        $dataFolder = public_path('storage/table/Data_interview');

        $data = [];

        foreach (scandir($dataFolder) as $folderName) {
            $folderPath = $dataFolder . '/' . $folderName;

            if (is_dir($folderPath)) {

                $date = substr($folderName, 0, 8);
                foreach (scandir($folderPath) as $fileName) {
                    if ($fileName === 'DM_values.txt') {
                        $filePath = $folderPath . '/' . $fileName;

                        // Read the file and extract data
                        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        foreach ($lines as $line) {
                            $parts = explode(' ', $line);
                                $data[] = [
                                    'folderName' => $folderName,
                                    'date' => $date,
                                    'fileName' => $fileName,
                                    'colA' => $parts[5],
                                    'colB' => $parts[17],
                                ];
                        }
                    }
                }
            }
        }
        //Insert data into the database using Eloquent
        $check = Tables::where('folderName', $folderName)->get()->count();
        if($check == 0)
        {
            Tables::insert($data);
        }
        else{
            Tables::where('folderName', $folderName)
            ->update([
                'folderName' => $folderName,
                'date' => $date,
                'fileName' => $fileName,
                'colA' => $parts[5],
                'colB' => $parts[17],
            ]);
        }
        $allData = Tables::get(['id','colA','colB','date']);
        $all_colA = $allData->pluck('colA')->all();
        $all_colB = $allData->pluck('colB')->all();
        $all_id = $allData->pluck('id')->all();
        $all_date = $allData->pluck('date')->all();
        // return "Data extraction and insertion completed.";


        $uniqueDates = array_unique($all_date);
        $data = [
            'colA'  =>    json_encode($all_colA),
            'colB'  =>    json_encode($all_colB),
            'id'    =>    json_encode($all_id),
            'avg_colA'  =>  json_encode(array(round(array_sum($all_colA)/count($all_colA)))),
            'avg_colB'  =>  json_encode(array(round(array_sum($all_colB)/count($all_colB)))),
            'date'  =>    json_encode($uniqueDates),
        ];
        return view('chart',$data);
    }
}
