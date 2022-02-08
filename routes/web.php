<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->middleware('verified');
/*
Route::get('user/role', function ()
{
$user=User::find(1);
foreach($user->roles as $role){
   return $role->name;}
 });
Route::get('user/role', function ()
 {
    $role=Role::find(2);
    foreach($role->users as $user){
       echo $user->name.'<br/>';
    }
 });
 */
// Has Many  Through
/*
Route::get('countries/posts', function ()
{
$country=Country::find(3);
foreach($country->posts as $post)
{
echo $post->name.'<br/>';
}
});
*/
//Poly morphic relationShip
/*
Route::get('users/image', function ()
{
$user=User::find(1)->images;
foreach($user as $image )
{
    return $image;
}
});
Route::get('posts/image', function ()
{
$post=Post::find(2);

   foreach($post->imagesx as $image)
   {
     echo $image->path;
   }

});
Route::get('image/post', function ()
{
$Image=Image::find(1);

    return $Image->imageable;

});
*/
//Crud One to Many RelationShip
/*
Route::get('save', function ()
{
$user = User::find(3);
$post = new Post ;
$post->name = 'پست فرهنگی';
$post->body = 'پست فرهنگی در حال ساخت است';
$user ->posts()->save($post);
});
Route::get('create', function ()
{
$user = User::find(2);
$post = new Post ;
$user ->posts()->create(['name' => 'پست اجتماعی','body' => 'پست اجتماعی در حال ساخت است']);
});
Route::get('update', function ()
{
$user = User::find(2);
$user ->posts()->update(['name' => 'پست خصوصی','body' => 'پست حصوصی است مواظب باشید ']);
});
Route::get('delete', function ()
{
$user = User::find(2);
$user ->posts()->whereid(1)->delete();
});
*/
//Crud Many to Many RelationShip
// Route::get('save', function ()
// {
// $user  = User::find(1);
// $Role2 = Role::find(2);
// $Role4 = Role::find(4);
// $user  ->roles() -> saveMany([$Role4,$Role2]);
// });
// Route::get('update', function ()
// {
// $user  = User::find(1);
// if($user->has('roles'))
// {
//     foreach($user->roles as $role)
//     {
//         switch($role->name)
//         {
//             case 'کاربر عادی':
//             $role->name = 'karbar adee';
//             $role->save();
//             break;
//             case 'Management':
//             $role->name = 'd';
//             $role->save();
//             break;
//         }
//     }
// }
// });
// Route::get('delete', function ()
// {
// $user  = User::find(3);

//         $user->roles()->delete(3);//کار نمیکنه

// });
// Route::get('detach', function ()
// {
// $user  = User::find(3);

//         $user->roles()->detach(1);//کار میکنه

// });
// Route::get('attach', function ()
// {
// $user  = User::find(3);
//         $Role2 = Role::find(2);
//         $user->roles()->attach($Role2);

// });
// Route::get('sync', function ()
// {
// $user  = User::find(1);

//         $user->roles()->sync(3);//https://www.roxo.ir/relationships-laravel-part-four

// });
// Route::get('popo', function ()
// {
// $user  = User::find(3);
// $posts = Post::find(2);
// $user->posts()->attach($posts);//خطا میده پس در رابطه یک به چند از این متدها نمیتوان استفاده کرد

// });
//Crud PolyMorphic RelationShip
// Route::get('create',function()
// {
// $post  = Post::find(5);
// $post->imagesx()->create(['path'=>'mohammadMirzakhani']);
// });
// Route::get('read',function()
// {
// $post  = Post::find(5);
// $imagePost=$post->imagesx;
// foreach($imagePost as $Image)
// {
//     echo $Image->path;
//     echo '<br/>';
// }
// });
// Route::get('update',function()
// {
// $post  = Post::find(2);
// $post->imagesx()->whereid(2)->update(['path'=>'mohammad']);
// });
// Route::get('delete',function()
// {
// $post  = Post::find(2);
// $post->imagesx()->whereid(2)->delete();
// });
Route::resource('post', PostController::class);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
