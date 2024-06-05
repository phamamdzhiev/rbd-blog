<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerDirectives();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function registerDirectives()
    {
        Blade::directive('image', handler: function (string $name) {
            return "<?php echo  asset('storage/'.$name);?>";
        });
    }
}
