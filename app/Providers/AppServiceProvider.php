<?php

namespace App\Providers;

use App\Cart;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\CommentRepositoryInterface;
use App\Contracts\EventRepositoryInterface;
use App\Contracts\HomeRepositoryInterface;
use App\Contracts\ManageRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\RepositoryBill;
use App\Repositories\Eloquents\BillRepositoryIn;
use App\Repositories\Eloquents\CategoryRepositoryIn;
use App\Repositories\Eloquents\CommentRepository;
use App\Repositories\Eloquents\EventRepository;
use App\Repositories\Eloquents\HomeRepository;
use App\Repositories\Eloquents\ManageRepository;
use App\Repositories\Eloquents\ProductRepositoryIn;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['welcome', 'ShoppingCart.order', 'layouts.app_user', 'emails.newEmailUser'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });

        Resource::withoutWrapping();

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepositoryIn::class);
        $this->app->singleton(EventRepositoryInterface::class, EventRepository::class);
        $this->app->singleton(ManageRepositoryInterface::class, ManageRepository::class);
        $this->app->singleton(ManageRepositoryInterface::class, ManageRepository::class);
        $this->app->singleton(ManageRepositoryInterface::class, ManageRepository::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepositoryIn::class);
        $this->app->singleton(RepositoryBill::class, BillRepositoryIn::class);
        $this->app->singleton(HomeRepositoryInterface::class, HomeRepository::class);

    }
}
