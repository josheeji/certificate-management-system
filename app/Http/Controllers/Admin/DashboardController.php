<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
      $data = [
         array(
             "label" => "Title 1", "type" => "select", "name" => "title1",
             "placeholder" => "Title", "id" => "title"
         ),
         array(
             "label" => "Title 2", "type" => "text", "name" => "title2",
             "placeholder" => "e.g CERTIFICATE", "id" => "title2"
         ),
         array(
             "label" => "Title 3", "type" => "text", "name" => "title3",
             "placeholder" => "e.g. of Achievement", "id" => "title3"
         ),
     ];
      return view('admin.dashboard', compact('data'));      
   }
}