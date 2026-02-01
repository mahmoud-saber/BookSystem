<?php

namespace App\Providers\Filament;

use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Psy\Output\Theme;

class BorrowerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
       // dd(get_class_methods($panel));// Debugging line to list available methods on the Panel class
        return $panel
            ->id('borrower')
            ->path('borrower')
            ->colors([
                'primary' => Color::Gray,
            ])
            ->login()
            ->discoverResources(in: app_path('Filament/Borrower/Resources'), for: 'App\Filament\Borrower\Resources')
            ->discoverPages(in: app_path('Filament/Borrower/Pages'), for: 'App\Filament\Borrower\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Borrower/Widgets'), for: 'App\Filament\Borrower\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->profile()
            ->simpleProfilePage(false)
            ->spa() // Enable SPA mode
            ->spaUrlExceptions([
                url('borrower/profile')
                    ]) // ->brandLogo(function () {
        //     return view('logo');

        // })
           // ->unsavedChangesAlerts() // Enable unsaved changes alerts
           //->databaseTransactions() // Enable database transactions for requests
        //    ->brandName('Book System')
        // ->brandLogo(function () {
            //     return view('logo');

            // })
        ->brandLogo('/images/book1.png')
        ->brandLogoHeight('3rem') // Set the logo height
        ->favicon('/images/book1.png')  // Set the favicon
        ->font('Pappins')
        ->sidebarFullyCollapsibleOnDesktop()
        ->breadcrumbs(false) // Disable breadcrumbs for the panel

            ;
    }
}
