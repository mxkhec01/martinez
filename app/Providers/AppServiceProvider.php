<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected $namespace = 'App\Http\Controllers';

    public function register()
    {
        //
    }

    protected function map()
    {
        $this->mapApiV2Routes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('money', function ($amount) {
            return "<?php echo '$' . number_format($amount, 2); ?>";
        });
    }

    protected function mapApiV2Routes()
    {
        route::prefix('api/v2')
            ->middleware('api')
            ->namespace($this->namespace.'\\Api\\V2')
            ->group(base_path('routes/api.php'));
    }
}
