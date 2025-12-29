<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/hello', function () {
    return 'Bonjour, monde !';
})->middleware('token');

Route::get('/movies', function () {
    return "Liste des films";
})->middleware('checkage');

Route::get('/info', function (Request $request) {
    return [
        'path'    => $request->path(),
        'fullUrl' => $request->fullUrl(),
    ];
});

Route::post('/test-post', function () {

    return 'Requête POST reçue avec succès.';
});

Route::get('/client-ip', function (Request $request) {
    return [
        'ip' => $request->ip(),
    ];
});

Route::get('/testget', function () {
    return "bonjour";
});

/*

Route::post('/login', function (Request $request) {




    return response()->json($credentials);
});

*/
Route::get('qq', function () {
    return 'bonjourq';
});


Route::Redirect ('/home', '/about');
Route::permanentRedirect ('/cotact', '/home'); 

Route::Redirect ('/3', '/4', 301);

Route::view ('/mr', 'mr');

Route::view('/test', 'page.test' , ['name' => 'merouan']);




Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/userr', 'admin.userr');

});



Route::get('/bonjour', function () {
    return 'Bonjour';
});


Route::get('/user/{nom}', function ($nom) {
    return "Bienvenue, {$nom}";
});


Route::get('/produit/{id}', function ($id) {
    return "Produit ID: {$id}";
})->where('id', '[0-9]+');


Route::get('/article/{id?}', function ($id) {
    return $id ? "Article ID: {$id}" : "Aucun "; 
});


Route::get('/contact', function () {
    return view('contact');
});


Route::redirect('/home', '/dashboard');




Route::get('/admin/dashboard', function () {
    return 'Espace ';
});


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Liste des utilisateurs';
    });
    Route::get('/settings', function () {
        return 'Paramètres de...';
    });
});


Route::fallback(function () {
    return 'Erreur 404';
});



Route::get('/admin1', function () {
    return 'Bonjour, monde !';
})->middleware('role:admin1');

Route::get('/ip' , function (){
    return '127.0.0.1';
})->middleware('CheckIpLocal');


Route::get('/block' , function (){
    return response('OK');
})->middleware('BlockEmptyRequest');



Route::get('/content/FR', function () {
    return 'Contenu MAROC';
})->middleware('country:FR');


Route::get('/len', function () {
    return 'Nom de l\'utilisateur : ' . request('namefgrg');
})->middleware('minlength:5,namefgrg');


Route::get('/', function () {
    return 'Accueil du site';
});


Route::get('/', function () {
    return view('welcome');
});






Route::get('/admin/panel', function () {
    return 'admin';
})->middleware('isadmin');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    return 'Message reçu : ' . $request->input('message');
});



/*ex 5 */

Route::get('/bonjour7', function () {
    return 'Bonjour Laravel';
});



Route::get('/notes', function () {
    return [18, 11, 14, 9];
});


Route::get('/acces-refuse', function () {
    return response('Accès interdit', 403);
});