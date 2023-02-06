<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pet;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    //
    use Notifiable;
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.dashboard', compact('users'));
    }

    public function pets()
    {
        $pets = Pet::paginate(20);
        return view('admin.pets', compact('pets'));
    }

    public function storePets()
    {

        $url = 'https://api.publicapis.org/entries';
        $httpClient = Http::get($url);

        $pets = json_decode($httpClient->body());

        foreach ($pets->entries as $pet) {

            try {
                if (!Pet::where('link', $pet->Link)->exists()) {
                    Pet::create([
                        'api' => $pet->API,
                        'description' => $pet->Description,
                        'auth' => $pet->Auth,
                        'HTTPS' => $pet->HTTPS,
                        'cors' => $pet->Cors,
                        'link' => $pet->Link,
                        'category' => $pet->Category,
                    ]);
                }
            } catch (\Throwable $th) {

                Admin::find(1)->notify(new NotifyAdmin($th));
                DB::rollBack();
                break;
            }
        }


        return back()->with('success', 'All Pets has been successfully fetch and stored in the db');


        // dd($pets->entries);
    }
}
