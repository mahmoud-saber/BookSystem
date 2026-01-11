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

class BorrowerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('borrower')
            ->path('borrower')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
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

            // ->navigation(false) // Disable navigation for this panel
            ->profile() //Enable profile for this panel
            ->simpleProfilePage(false) // Disable simple profile page for this panel
            ->spa() // Enable SPA mode for this panel
            ->spaUrlExceptions([url('borrower/profile')]) // Exclude profile page from SPA handling
            ->unsavedChangesAlerts() // Enable unsaved changes alerts for this panel
            ->databaseTransactions() // Enable database transactions for this panel
            ->brandName('Borrower Panel') // Set the brand name for this panel
            ->brandLogo('/images/book1.png') // Set the brand logo for this panel
            ->brandLogoHeight('50px') // Set the brand logo height for this panel
            ->font('poppins') // Set the font for this panel
           // ->defaultThemeMode(ThemeMode::Dark) // Set the default theme mode for this panel
           ->favicon('/images/book1.png') // Set the favicon for this panel
           ->sidebarWidth('20rem') // Set the sidebar width for this panel
        // ->sidebarCollapsibleOnDesktop() // Enable sidebar collapsibility on desktop for this panel
           ->sidebarFullyCollapsibleOnDesktop() // Enable full sidebar collapsibility on desktop for this panel
        //    ->topNavigation() // Enable top navigation for this panel
           ->topbar(false) // Disable topbar for this panel



        ;
    }
}
