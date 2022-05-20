<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Blog;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('user.listing');

Route::get('getUser', function (Request $request) {
    if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn viewbtn btn-info btn-sm mr-3" value="'.$row->id.'" " data-toggle="modal" data-target="#viewModal">View</button><a href="'.route('user.edit',[$row->id]).'" class="edit btn btn-success btn-sm mr-3">Edit</a> <a  href="#" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
})->name('user.index'); 


Route::get('listing',[BlogController::class,'show'])->name('blog.listing'); //listing file show

Route::view('addblog','blog/addblog')->name('blog.add'); //addblog file show 

Route::post('addblog',[BlogController::class,'addData'])->name('blog.addblogg'); //addblog action route

Route::get('deletee/{id}',[BlogController::class,'delete'])->name('blog.delete'); //delete route

Route::get('view/{id}',[BlogController::class,'view'])->name('blog.view'); //view route

Route::get('editt/{id}',[BlogController::class,'edit'])->name('blog.edit'); //edit route

Route::post('/editblog',[BlogController::class,'updateData'])->name('blog.updateblogg'); //edit action route


// FOR USER


Route::view('adduser','user/adduser')->name('user.add'); //addblog file show 

Route::post('adduser',[UserController::class,'addData'])->name('user.adduser'); //addblog action route

Route::get('delete/{id}',[UserController::class,'delete'])->name('user.delete'); //delete route

Route::get('viewww/{id}',[UserController::class,'view'])->name('user.view'); //view route

Route::get('edit/{id}',[UserController::class,'edit'])->name('user.edit'); //edit route

Route::post('edit',[UserController::class,'updateData'])->name('user.updateuser'); //edit action route