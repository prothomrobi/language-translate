
# language-translate
How to use multiple language in Laravel-----

1. Add LanguageController.php file in your project’s Controller folder (From rapasoft laravel boilerplate)
2. Assign a route to interact  Language controller in our project web.php route file.
  Example : 
      Route::get('lang/{lang}', 'LanguageController@swap');
      
3. Add LocalMiddleware.php file in your project’s Middleware folder (From rapasoft laravel boilerplate)
4. Assign LocalMiddleware in kernel.php file within protected middlewareGroups web section.
  Example:  
            protected $middlewareGroups = [
                'web' => [
                    \App\Http\Middleware\EncryptCookies::class,
                    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                    \Illuminate\Session\Middleware\StartSession::class,
                    // \Illuminate\Session\Middleware\AuthenticateSession::class,
                    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                    \App\Http\Middleware\VerifyCsrfToken::class,
                    \Illuminate\Routing\Middleware\SubstituteBindings::class,
                    \App\Http\Middleware\LocaleMiddleware::class, // define it and check it
                ],
5. Add local.php file in your project's config folder (From rapasoft laravel boilerplate)
6. We need to declare your define language syntax in languages array in local.php file to use require language.
  Example: 
        'languages' => [
                  /*
                   * Key is the Laravel locale code
                   * Index 0 of sub-array is the Carbon locale code
                   * Index 1 of sub-array is the PHP locale code for setlocale()
                   * Index 2 of sub-array is whether or not to use RTL (right-to-left like arabic language) html direction for this language
                   */
                  'ar'    => ['ar', 'ar_AR', true],
                  'zh'    => ['zh', 'zh-CN', false],
                  'zh-TW' => ['zh-TW', 'zh-TW', false],
                  'en'    => ['en', 'en_US', false],  //For english
                  'bn'    => ['bn', 'bn-BD', false]   // For bangla
                  ],
  7. Add  different language folder (like en,bn etc) in resource/lang directory from rapasoft boilerplate to use specific language string.                
  8. Then you need to add different custom file in resource/lang/en & bn folder to change your site language in english & bangle 
  9. Then put your content in your custom or default file in resource/lang/en & bn folder by defining a tag
      Example: In resource/lang/en folder auth.php file--
                'welcome' => 'WELCOME', // here 'welcome' is a custom define tag and right side is your content
      
       And In resource/lang/bn folder auth.php file--
               'welcome' => 'সাদরে অভ্যর্থিত',
      and so on.....
  10.Then Open your blade file ( like welcome.blade.php ) and set the code as below
        {{ __('auth.welcome') }} // here 'auth' is file location and 'welcome' is your defined tag
   11. And at last we need to add a language choose option in your nav bar option
      Exapmle: ( it is deafult code)
              <nav>
                <ul>
                    <li class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLa16643nguageLink">
                    @foreach(array_keys(config('locale.languages')) as $lang)
                        {{--{{dd(app()->getLocale() , $lang )}}--}}
                        @if($lang != app()->getLocale())
                            <li >
                                <small>
                                    <a href="{{ '/lang/'.$lang }}" class="dropdown-item"><span class="badge badge-info">@lang('menus.language-picker.langs.'.$lang)</span></a>
                                </small>
                            </li>
                            @endif
                            @endforeach
                            </li>
                </ul>
              </nav>
  
      
      ###Collected from Rafasoft
                                                THANK YOU
