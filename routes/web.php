<?php

use Illuminate\Support\Facades\Route;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StudentController;

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
});

// Route::get('/students', function() {
//     return ("Student List");
// });

Route::get('/Sign-Up', function() {
    return ("This is your sign-up page");
});

Route::redirect('/test1', '/Sign-Up');

// Route::view('/test2', 'welcome');

Route::view('/home', 'homepage'); 
Route::view('/welcome', 'contact', ['name' => 'Lyly']);

Route::get('/parameter/{id}', function ($id) {
    return 'User '. $id;
});

Route::get('/parameter/post/{post_id}/comment/{comment_id}', function ($post_id, $comment_id) {
    return 'Post number '. $post_id . ' -- Comment_ID ' . $comment_id;
});

Route::get('/parameter/name/{name?}', function ($name = 'John') {
    return $name;
});

Route::get('/parameter/validation/username/{username}', function($username) {
    try{
        return $username;
    } catch(error) {
        print(error);
    }
})->where('username', '[A-Za-z]+');

Route::get('/parameter/validation/{id}', function($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/parameter/validation/user/profile', function() {
    return 'user profile';
})->name('profile');

Route::get('/testthis', function() {
    $profile = route('profile');
    return $profile;
});

// Route::get('/student', [StudentController::class,'index']);
// Route::get('/student/list1', [StudentController::class,'list1']);
// Route::get('/student/list2', [StudentController::class,'list2']);

// Route::get('/')

Route::get('/testmodel', function() {
    $test = Test::findOrFail(1);
    echo ($test->name);
});

// Laravel Eloquent
Route::get('/testuser', function() {
    $user = User::findOrFail(1);
    dd($user);
});

// Laravel Query Builder
Route::get('/testuser', function() {
    $user = DB::table('users')->where('id',1)->first();
    dd($user);
});

// Select
Route::get('/category', [CategoryController::class, 'index'])->name("category.index")->middleware('api_user');;
// Create
Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");
Route::post('/category', [CategoryController::class, 'store'])->name("category.store");
// Edit
Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');
Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');
// Delete
Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
// Detail
Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");


Route::get('/products',[ProductController::class,'index'])->name('product.index')->middleware('api_token');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

Route::post('/products',[ProductController::class,'store'])->name('product.store');

Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');

Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');



Route::get('/home-menu',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/list', [FrontendController::class, 'list'])->name('frontend.list');
Route::get('/detail/{id}', [FrontendController::class, 'show']);
Route::get('/frontend/{category?}', [FrontendController::class, 'showByCategory']);
Route::get('/search', [FrontendController::class,'getBySearch']);


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'registration'])->name('registration');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Select
Route::get('/quiz', [QuizController::class, 'index'])->name("quiz.index");
// Create
Route::get('/quiz/create', [QuizController::class, 'create'])->name("quiz.create");
Route::post('/quiz', [QuizController::class, 'store'])->name("quiz.store");
// Edit
Route::get("/quiz/{id}/edit", [QuizController::class, 'edit'])->name('quiz.edit');
Route::put("/quiz/{id}", [QuizController::class, 'update'])->name('quiz.update');
// Delete
Route::delete("/quiz/{id}", [QuizController::class, 'destroy'])->name('quiz.delete');
// Detail
Route::get('/quiz/{id}', [QuizController::class, 'show'])->name("quiz.show");
// Search
Route::get('/quiz', [QuizController::class, 'getBySearch']);



// change password
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('form.password');
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// update profile
Route::get('/update-profile/{user}',  [UpdateProfileController::class, 'editProfile'])->name('profile.edit');
Route::patch('/update-profile/{user}',  [UpdateProfileController::class, 'updateProfile'])->name('profile.update');


// Api Token
Route::get('/example/{api_token}/', [ProductController::class,'index'])->middleware('api_token');



//Route::get('/', [StoreController::class, 'index']);  
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [StoreController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [StoreController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [StoreController::class, 'remove'])->name('remove.from.cart');


Route::get('/checkout', [StoreController::class, 'checkout'])->name('cart.checkout');


// Select
Route::get('/student', [StudentController::class, 'index'])->name("student.index");
// Create
Route::get('/student/create', [StudentController::class, 'create'])->name("student.create");
Route::post('/student', [StudentController::class, 'store'])->name("student.store");
// Edit
Route::get("/student/{id}/edit", [StudentController::class, 'edit'])->name('student.edit');
Route::put("/student/{id}", [StudentController::class, 'update'])->name('student.update');
// Delete
Route::delete("/student/{id}", [StudentController::class, 'destroy'])->name('student.delete');
// Detail
Route::get('/student/{id}', [StudentController::class, 'show'])->name("student.show");
// Search
Route::get('/student', [StudentController::class, 'getBySearch']);