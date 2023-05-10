<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    // fetch all users
    //$users = DB::select("select * from users");
    //$users = DB::select("select * from users where id=1");
    //$users = DB::select("select * from users where email=?", ['dburgstaller@gmx.de']);

    /**
     * Create new users
     */
    // $user = DB::insert('insert into users(name, email, password) values(?,?,?)', [
    //     'Sarthak',
    //     'sarthak1@bitfumes.com',
    //     'password',
    // ]);
    /**
     * Update
     */

    //$user = DB::update("update users set email ='abc@bitfumes.com' where id=4");

    // $user = DB::update("update users set email = ? where id=?", [
    //     'dieter@bitfumes.com',
    //     4,
    // ]);
    /**
     * Delete a user
     */
    //$user = DB::delete("delete from users where id=4");

    /**
     * Query Builder
     */
    //Fetch all users
    // $users = DB::table('users')->get();
    //$users = DB::table('users')->where('id', 7)->first();
    $users = DB::table('users')->find(7);
    //$users = DB::table('users')->where('id', 1)->get();

    //Insert Data
    // $user = DB::table('users')->insert([
    //     'name' => 'Dieter',
    //     'email' => 'burgdi@gmail.com',
    //     'password' => 'password',
    // ]);

    // $user = DB::table('users')->where('id', 5)->update([
    //     'email' => 'abc@gmail.com',
    // ]);
    // Delete a user
    // $user = DB::table('users')->where('id', 5)->delete();

    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
