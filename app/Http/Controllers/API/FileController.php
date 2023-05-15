<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Csv\Writer;
use Illuminate\Support\Str;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    // Handle generat request
    public function generate_csv_file(Request $request)
    {
        // get data 

        try {
            $data = [
                ["a","b","c","d","e","f","g","h","i","j","k","l"]
            ];


            // Generate unique file name
            $timestamp = now()->format('Ymd_His');
            $randomString = Str::random(8);
            $filename = $timestamp . '_' . $randomString . '.csv';
            
            // define filename and path
            $path = env('CVS_File_Path') . $filename;
    
            // generate csv file
            $csv = Writer::createFromPath(storage_path($path), 'w+');
            // $csv->insertOne(['Header 1', 'Header 2', 'Header 3']); // add headers
            foreach ($data as $row) {
                $csv->insertOne($row); // add data
            }

            // generate download link
            $token = Str::random(40);
            $url = route('download-csv-file', ['token' => $token]);

            // save token and file path to database
            $file = new File();
            $file->token = $token;
            // For fixing the path issue 
            $file->path = str_replace('app/public/', 'public/', str_replace('\\', '/', $path));
            $file->user_id = auth('api')->user()->id;
            $file->save();

            return response()->json([

                'response' => true,
                'result' => ['url' => $url],
                'message' =>  "Success!"

            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'response' => false,
                'result' => [],
                'message' => $e->getMessage()
            ], 500);
        }

    }
    // Handle download request
    public function download_csv_file($token)
    {

        $file = File::where('token', $token)
        // ->where('user_id',auth('api')->user()->id)
        ->first();

        if (!$file) {
            abort(404);
        }

        // read file contents
        $contents = Storage::get($file->path);

        // delete file from storage
        Storage::delete($file->path);

        // delete file record from database
        $file->delete();

        // generate response with file contents
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . basename($file->path) . '"');
        return $response;

        // return response()->json([

        //     'response' => true,
        //     'result' => [$token],
        //     'message' =>  "Success!"

        // ], 200);
    }
    
}
