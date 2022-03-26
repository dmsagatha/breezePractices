<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
  {
    return view('admin.users.import');
  }
  
  public function importUsers(Request $request)
  {
    $data = [];

    $user_id = "";

    //  file validation
    $request->validate([
      "csv_file" => "required",
    ]);

    $file = $request->file("csv_file");
    $csvData = file_get_contents($file);

    $rows = array_map("str_getcsv", explode("\n", $csvData));
    $header = array_shift($rows);

    foreach ($rows as $row)
    {
      if (isset($row[0]))
      {
        if ($row[0] != "")
        {
          $row = array_combine($header, $row);

          // master user data
          $userData = [
            "name"      => $row["name"],
            "email"     => $row["email"],
            'password' 	=> Hash::make('123456'),
          ];

          // ----------- check if user already exists ----------------
          $checkUser = User::where("email", "=", $row["email"])->first();

          if (!is_null($checkUser))
          {
            $updateUser = User::where("email", "=", $row["email"])->update($userData);

            if ($updateUser == true)
            {
              $data["status"] = "failed";
              $data["message"] = "Users updated successfully";
            }
          }
          else
          {
            $user = User::create($userData);
            
            if (!is_null($user))
            {
              $data["status"] = "success";
              $data["message"] = "Users imported successfully";
            }
          }
        }
      }
    }

    return back()->with($data["status"], $data["message"]);
  }
}