<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropzoneController;
use App\Models\Blog;
  
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-gallery', [App\Http\Controllers\galleryController::class , 'adminGallery'])->name('admin.gallery');
    Route::post('/admin-gallery/store', [App\Http\Controllers\galleryController::class , 'storeGallery'])->name('admin.gallery.store');
    Route::get('/admin-gallery-byid/{id}', [App\Http\Controllers\galleryController::class , 'getGalleryByAlbumId'])->name('admin.gallerybyid');
    


    Route::get('/admin-promo', [App\Http\Controllers\promoController::class , 'indexPromo'])->name('admin.promo');
    Route::get('/admin-promo/create', [App\Http\Controllers\promoController::class , 'createPromo'])->name('admin.promo.create');
    Route::post('/admin-promo/store', [App\Http\Controllers\promoController::class , 'storePromo'])->name('admin.promo.store');
    Route::get('/admin-promo/edit/{id}', [App\Http\Controllers\promoController::class , 'editPromo'])->name('admin.promo.edit');
    Route::patch('/admin-promo/update/{id}', [App\Http\Controllers\promoController::class , 'updatePromo'])->name('admin.promo.update');
    Route::delete('/admin-promo/delete/{id}', [App\Http\Controllers\promoController::class , 'deletePromo'])->name('admin.promo.delete');

    Route::get('/admin-page', [App\Http\Controllers\pageController::class, 'index'])->name('admin.page');
    Route::get('/admin-page/create', [App\Http\Controllers\pageController::class, 'create'])->name('admin.page.create');
    Route::post('/admin-page/store', [App\Http\Controllers\pageController::class, 'store'])->name('admin.page.store');
    Route::get('/admin-page/edit/{id}', [App\Http\Controllers\pageController::class, 'edit'])->name('admin.page.edit');
    Route::patch('/admin-page/update/{id}', [App\Http\Controllers\pageController::class, 'update'])->name('admin.page.update');
    Route::delete('/admin-page/delete/{id}', [App\Http\Controllers\pageController::class, 'destroy'])->name('admin.page.delete');


    Route::post('/dropzone/store', [DropzoneController::class, 'store'])->name('dropzone.store');
    Route::post('/dropzone/store-sl', [DropzoneController::class, 'storeSl'])->name('dropzone.storeSl');
    Route::post('/dropzone/store-bg', [DropzoneController::class, 'storeBg'])->name('dropzone.storeBg');
    Route::delete('/dropzone/delete', [DropzoneController::class, 'destroy'])->name('dropzone.delete');
    Route::delete('/dropzone/delete-bg', [DropzoneController::class, 'destroyBg'])->name('dropzone.deleteBg');
    Route::delete('/dropzone/delete-sl', [DropzoneController::class, 'destroySl'])->name('dropzone.deleteSl');

    
});

require __DIR__.'/auth.php';




Route::get('/', [App\Http\Controllers\webController::class , 'home'])->name('home');
Route::get('/blog', [App\Http\Controllers\webController::class , 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [App\Http\Controllers\webController::class , 'blogDetail'])->name('blog.detail');

Route::get('/admin-slide', [App\Http\Controllers\galleryController::class , 'dataDasboard'])->name('admin.dataDasboard');

Route::get('/gallery', [App\Http\Controllers\webController::class , 'gallery']);
Route::get('/provide-services', [App\Http\Controllers\webController::class , 'services']);

Route::get('/project-detail', [App\Http\Controllers\projectController::class , 'projectDetail']);
Route::get('/about-us', [App\Http\Controllers\webController::class , 'aboutUs']);

Route::get('/sitemap', function(){
    $sitemap = Sitemap::create()
    ->add(Url::create('/gallery'))
    ->add(Url::create('/provide-services'))
    ->add(Url::create('/about-us'));
    
   

    $blogs = Blog::all();
    foreach ($blogs as $blog) {
        $sitemap->add(Url::create("/blog-detail/{$blog->slug}"));
    }
    
    $sitemap->writeToFile(public_path('sitemap.xml'));
    
}); 