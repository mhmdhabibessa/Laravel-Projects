<?php

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

use App\Http\Controllers\AboutPage;
use App\Http\Controllers\CartPage;
use App\Http\Controllers\CourseDisplayPage;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderPage;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PictureAlbumController;
use App\Http\Controllers\PrivacyPolicyPage;
use App\Http\Controllers\RefundPolicyPage;
use App\Http\Controllers\TermsConditionsPage;
use App\Http\Controllers\VideosPage;

if (! Request::is('nova*')) {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/about-us', AboutPage::class)->name('about');
    Route::get('/privacy-policy', PrivacyPolicyPage::class)->name('privacy');
    Route::get('/terms-and-conditions', TermsConditionsPage::class)->name('terms-and-conditions');
    Route::get('/refund-policy', RefundPolicyPage::class)->name('refund-policy');
    Route::get('/courses/{course:slug}', CourseDisplayPage::class)->name('course.show');
    Route::get('/pictures-gallery', [PictureAlbumController::class, 'index'])->name('picture-album.index');
    Route::get('/pictures-gallery/{pictureAlbum:slug}', [PictureAlbumController::class, 'show'])->name('picture-album.show');
    Route::get('/videos-gallery', VideosPage::class)->name('videos');
    Route::get('/cart', CartPage::class)->name('cart');
    Route::get('/order/{id}', OrderPage::class)->name('order.show');
    Route::get('/payment/{id}/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/result/{id}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/result', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/switch/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

    Route::get('print/{id}', function () {

        $income = \App\Models\Income::findOrFail(request('id'));
        $purchaseOrder = $income->purchaseOrder;

        $pdf = \PDF::setOptions(['rootDir' => '{app_directory}/public'])->setPaper('letter', 'portrait')->loadView('pdf.invoice', [
            'data' => [
                'income' => $income,
                'order' => $purchaseOrder,
                'students' => $purchaseOrder->students,
            ]
        ]);

        $pdf->save(storage_path().'/app/public/invoices/'.sha1($this->income->id).'.pdf');
        $this->payment->update([
            'receipt' => 'invoices/'.sha1($this->income->id).'.pdf',
        ]);
    });
}
