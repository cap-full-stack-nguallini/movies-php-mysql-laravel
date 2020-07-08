<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function edit($id)
    {
       $userlog = Auth::user();
       $vac = compact('userlog');
       return view('perfilUsr', $vac);
    }

    public function update(Request $req)
    {

        $reglas = [
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "email" => "email|max:255"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string.",
            "unique" => "The field :attribute already exists.",
            "max" => "Max length the field :attribute is 255 ."
        ];

        $this->validate($req, $reglas, $mensajes);

        $id = $req->id;
        $userlog = User::find($id);

        $userlog->name = $req['name'];
        $userlog->surname = $req['surname'];

        if($userlog->email != $req['email']){
        $userlog->email = $req['email'];
        }

        $userlog->save();

        return redirect("/home");

    }

    public function updatePass(Request $req)
    {

        $reglas = [
            "password" => "string|min:8",
            "repassword" => "string|min:8|same:password"
        ];

        $mensajes = [
            "string" => "The field :attribute must be a string.",
            "min" => "Min length the field :attribute is 8 ."
        ];

        $this->validate($req, $reglas, $mensajes);

        $id = $req->id;
        $userlog = User::find($id);

        $userlog->password = Hash::make($req['password']);

        $userlog->save();

        return redirect("/home");

    }

    public function avatar(Request $req)
    {

        $reglas = ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040'];

        $this->validate($req, $reglas);

        $id = $req["id"];
        $userlog = User::find($id);

        if ($req->file('avatar')) {
            $imagen = $req->file('avatar');
            $fileOriginalName = $imagen->getClientOriginalName();
            $ext = pathinfo($fileOriginalName, PATHINFO_EXTENSION);
            $nombreImagen = uniqid("img_") . "." . $ext;
            $imagen->move('images/users', $nombreImagen);
            $userlog->avatar =  $nombreImagen;
        }

        $userlog->save();

        return redirect("/user/$id/edit");
    }


}
