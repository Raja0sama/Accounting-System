All phases of the conversion will will be tracked as separate branches under branch 'laravel' where they will be merged into. 

We now have initial core application served via laravel under `/core`. This will stay there until all functionality is served utilizing laravel components.

The laravel part of the app will eventually be served under `/`.

The approach we will take is to rewrite existing functionality utilising following Laravel concepts/components, in probably below order :

1.  Migrations
2.  Auth
3.  Config (for any app behavior defining parameters)
4.  Eloquent Models
5.  Routing
6.  Resource Controllers / Requests (for validation)
7.  Resources (compiled via webpack/laravel mix)
8.  Blade Views
9.  Vue / AJAX / RESTful API
10. Other ??? 

Development will mostly follow a TDD approach and will utilize following tools :

1. VSCode with docker and devcontainer 
2. PHPCS/PHPCBF for autostyling
3. PHPUNIT
4. GitHub Actions for running tests and checking styling on PRs

