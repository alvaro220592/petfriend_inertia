<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PetController;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/getUsers', function() {
    return response()->json(User::paginate(10));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', function() {
        return Inertia::render('Admin/User/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%");
                })->paginate(Request::input('perpage') ? Request::input('perpage') : 5)
            ->withQueryString(),
            'filters' => Request::only(['search'])
        ]);
    })->name('users');

    Route::resource('clients', ClientController::class);
    Route::resource('pets', PetController::class);

    // Route::get('/stateCity', [StateController::class, 'stateCity'])->name('stateCity');
    // Route::get('/stateCities/{state_id}', [StateController::class, 'stateCities'])->name('stateCities');
    // Route::get('/state', [StateController::class, 'index'])->name('state.index');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['verified'])->name('dashboard');
});

require __DIR__.'/auth.php';
