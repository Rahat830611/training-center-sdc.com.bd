use App\Http\Controllers\BugController;

Route::get('/bug', [BugController::class, 'triggerBug']);
