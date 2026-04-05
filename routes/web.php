<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);




// Route::view('/', 'welcome');

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');


Route::get('/formtest', function(){
    $emails = session()->get('emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

// Route::post('/formtest', function(){
//     $email = request('email');

//     session()->push('emails', $email);

//     return redirect('/formtest');
// });

Route::post('/formtest', function(){

    $validated = request()->validate([
        'email' => 'required|email|ends_with:@gmail.com'
    ]);

    $emails = session()->get('emails', []);

        if (count($emails) >= 5) {
        return redirect('/formtest')
            ->withErrors(['Maximum of 5 emails only!']);
    }

    if (in_array($validated['email'], $emails)) {
        return redirect('/formtest')
            ->withErrors(['Email already exists!']);
    }

    session()->push('emails', $validated['email']);

    return redirect('/formtest')->with('success', 'Email added successfully!');
});

Route::get('/delete-emails', function(){
    session()->forget('emails');
    return redirect('/formtest');
});


Route::post('/delete-email', function(){

    $index = request('index');
    $emails = session()->get('emails', []);

    unset($emails[$index]); // remove specific

    session()->put('emails', array_values($emails)); // reindex

    return redirect('/formtest')->with('success', 'Email deleted!');
});