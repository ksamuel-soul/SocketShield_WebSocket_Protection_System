<?php
use App\Events\TestWebSocketEvent;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSocketController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/test-websocket', function(){
    broadcast(new TestWebSocketEvent('SocketShield WebSocket is working Fine...'));
    return response()->json(['message' => 'Event broadcasted']);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/metrics', [DashboardController::class, 'metrics'])
        ->name('dashboard.metrics');

});

Route::post('/websocket/connect', [WebSocketController::class, 'connect']);
Route::post('/websocket/heartbeat', [WebSocketController::class, 'heartbeat']);
Route::post('/websocket/disconnect', [WebSocketController::class, 'disconnect']);
Route::post('/websocket/message', [WebSocketController::class, 'message']);
Route::get('/monitor/resources', [ResourceController::class, 'collect']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/metrics', [DashboardController::class, 'metrics'])->name('dashboard.metrics');
require __DIR__.'/settings.php';