<?php

use App\Filament\Siswa\Pages\RegisterSiswa;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiswaController;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Route; 
use App\Livewire\Dashboard;
use App\Livewire\Guru\Dashboard as GuruDashboard; 
use App\Livewire\Guru\Hafalan\Show;
use App\Livewire\Guru\Pengumuman\Create; 
use App\Livewire\Guru\Pengumuman\Update;
use App\Livewire\Guru\Pengumuman\Show as PengumumanShow; 
use App\Livewire\Guru\RegirterGuru;
use App\Livewire\Guru\ResponseHafalan\Show as ResponseHafalanShow;
use App\Livewire\Guru\SiswaTertanda\Show as SiswaTertandaShow;
use App\Livewire\Siswa\InputHafalan\Create as InputHafalanCreate;
use App\Livewire\Login;
use App\Livewire\RegisterKedua;
use App\Livewire\Siswa\Dashboard as SiswaDashboard;
use App\Livewire\Siswa\InputHafalan;
use App\Livewire\Siswa\InputHafalan\Show as InputHafalanShow;
use App\Livewire\Siswa\InputHafalan\Update as InputHafalanUpdate;
use App\Livewire\Siswa\KomentarPengumuman\Show as KomentarPengumumanShow;
use App\Livewire\Siswa\Murottal\Show as MurottalShow;
use App\Livewire\Siswa\RegirterSiswa;
use App\Livewire\Siswa\SiswaProfile;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Dashboard umum 
Route::get('/dashboard', Dashboard::class);

// Siswa
Route::prefix('siswa')->middleware(['auth', 'siswa'])->group(function () {
    Route::get('dashboard', SiswaDashboard::class)->name('siswa.dashboard'); 
    Route::get('register-siswa', RegisterSiswa::class)->name('siswa.register'); 
    Route::get('hafalan', InputHafalanShow::class)->name('siswa.show-hafalan');
    Route::get('createHafalan', InputHafalanCreate::class)->name('siswa.create-hafalan');
    Route::get('updateHafalan/{id}', InputHafalanUpdate::class)->name('siswa.update-hafalan');
    Route::get('murottal', MurottalShow::class)->name('siswa.show-murottal');
    Route::get('komentarPengumuman', KomentarPengumumanShow::class)->name('siswa.show-komentar');
    Route::get('profile-siswa', SiswaProfile::class)->name('siswa.profile-siswa');

});

// Guru 
Route::prefix('guru')->middleware(['auth', 'guru'])->group(function () {
    Route::get('dashboard', GuruDashboard::class)->name('guru.dashboard');
    // Route::get('register-guru', RegisterGuru::class)->name('guru.register');
    Route::get('hafalan', Show::class)->name('guru.hafalan');
    Route::get('responseHafalan', ResponseHafalanShow::class)->name('guru.responseHafalan');
    Route::get('siswaTertanda', SiswaTertandaShow::class)->name('guru.siswaTertanda');

    Route::get('pengumuman', PengumumanShow::class)->name('guru.pengumuman');


    Route::get('createPengumuman', Create::class)->name('guru.create.pengumuman');
    Route::get('updatePengumuman/{id}', \App\Livewire\Guru\Pengumuman\Update::class)->name('guru.update.pengumuman');
});

// Login
Route::get('/login', Login::class)->name('login'); 
Route::get('/register', Register::class)->name('register');
Route::get('/register-kedua', RegisterKedua::class)->name('register-guru');
Route::get('/register-kedua', RegisterKedua::class)->name('register-siswa');

// Route::post('/admin/logout', function () {
//     Auth::logout();
//     session()->invalidate();
//     session()->regenerateToken();

//     return redirect('/'); 
// })->name('filament.logout');
