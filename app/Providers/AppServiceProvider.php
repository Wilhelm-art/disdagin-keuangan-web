<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // Dompdf configuration for serverless writable /tmp
        $tempDir = sys_get_temp_dir();
        $fontDir = $tempDir . '/dompdf_fonts';
        if (!is_dir($fontDir)) {
            @mkdir($fontDir, 0777, true);
        }
        config([
            'dompdf.options.font_dir' => $fontDir,
            'dompdf.options.font_cache' => $fontDir,
            'dompdf.options.temp_dir' => $tempDir,
        ]);
    }
}
