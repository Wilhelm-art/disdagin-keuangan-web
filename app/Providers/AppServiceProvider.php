<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFour();

        if ($this->app->environment('production') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // Dompdf configuration for serverless writable /tmp
        $tempDir = sys_get_temp_dir();
        $fontCacheDir = $tempDir . '/dompdf_fonts';
        if (!is_dir($fontCacheDir)) {
            @mkdir($fontCacheDir, 0777, true);
        }
        $vendorFontsDir = base_path('vendor/dompdf/dompdf/lib/fonts');
        if (is_dir($vendorFontsDir) && file_exists($vendorFontsDir . '/installed-fonts.dist.json')) {
            if (!file_exists($fontCacheDir . '/installed-fonts.json')) {
                @copy($vendorFontsDir . '/installed-fonts.dist.json', $fontCacheDir . '/installed-fonts.json');
            }
        }
        config([
            'dompdf.options.font_dir' => $vendorFontsDir,
            'dompdf.options.font_cache' => $fontCacheDir,
            'dompdf.options.temp_dir' => $tempDir,
            'dompdf.options.isHtml5ParserEnabled' => true,
            'dompdf.options.isRemoteEnabled' => true,
        ]);
    }
}
