<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $elements = [
            'partial.input' => 'input',
            'partial.invalid-feedback' => 'invalidFeedback'
        ];

        foreach ($elements as $element => $alias) {
            Blade::include($element, $alias);
        }

        Blade::component('partial.alert', 'alert');

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Sven\ArtisanView\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        Blade::directive('currency', function ($number) {
            return "<?php echo ('Rp. ' . number_format($number)) ?>";
        });
    }
}
