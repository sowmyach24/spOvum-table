<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tables;
use Illuminate\Support\Facades\File;


class Table extends Controller
{
    public function extractAndInsertData() {
        $dataFolder = public_path('storage/table/');

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

                            if (count($parts) === 2) {
                                $data[] = [
                                    'folderName' => $folderName,
                                    'date' => $date,
                                    'fileName' => $fileName,
                                    'colA' => $parts[0],
                                    'colB' => $parts[1]
                                ];
                            }
                        }
                    }
                }
            }
        }

        // Insert data into the database using Eloquent
        Tables::insert($data);

        return "Data extraction and insertion completed.";
    }

}
