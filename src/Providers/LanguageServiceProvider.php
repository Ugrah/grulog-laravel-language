<?php

namespace Grulog\Language\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Grulog\Language\Http\Middleware\SetLanguageCookie;


/**
* Worker service provider
*
* @author    Ulrich Grah <grulogdev@gmail.com>
* @copyright 2020 Ulrich Grah
*/
class LanguageServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
        $router->aliasMiddleware('language', SetLanguageCookie::class);

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
	}
}