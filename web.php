use App\Http\Controllers\MessageController;
Route::post('/submit', [MessageController::class, 'submit'])->name('submit-message');
Route::get('/contact', function () {
    return view('contact');
}
