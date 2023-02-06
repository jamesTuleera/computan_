<?php

namespace App\Http\Controllers;

use App\Imports\CsvDataImport;
use App\Models\Admin;
use App\Notifications\NotifyAdmin;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    use Notifiable;

    public function uploadData(Request $request)
    {
        $request->validate([
            // 'csv_data' => 'required|file|in:csv|max:20000'
            'csv_data' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt'

        ]);

        try {
            Excel::import(new CsvDataImport, $request->file('csv_data'));
        } catch (\Throwable $th) {
            Admin::find(1)->notify( new NotifyAdmin($th));
            return back()->with('failed', 'An error occur while uploading your csv file');
        }

        return back()->with('success', 'Record uploaded successfully');
    }
}
