<?php namespace AlexMn\LaravelViewTools;

use AlexMn\LaravelViewTools\View\Factory as Factory;

class ViewServiceProvider extends \Illuminate\View\ViewServiceProvider {


    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     *
     * The method definition is exactly the same as in the parent object, we rewrote it because we need to return our
     * Factory object and not the one called by the parent.
     *
     * ! calling parent::registerFactory() would call the Illuminate\View\Factory !
     */
    public function registerFactory()
    {

        $this->app->bindShared('view', function($app)
        {
            // Next we need to grab the engine resolver instance that will be used by the
            // environment. The resolver will be used by an environment to get each of
            // the various engine implementations such as plain PHP or Blade engine.
            $resolver = $app['view.engine.resolver'];

            $finder = $app['view.finder'];

            $env = new Factory($resolver, $finder, $app['events']);

            // We will also set the container instance on this view environment since the
            // view composers may be classes registered in the container, which allows
            // for great testable, flexible composers for the application developer.
            $env->setContainer($app);

            $env->share('app', $app);

            return $env;
        });
    }

    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     */
    public function boot()
    {
        $this->package('alex-mn/laravel-view-tools');

        /*
         * Register configurations folder
         */
        \Config::addNamespace('alex-mn/laravel-view-tools', __DIR__.'/Config');


        /*
         *  Bind PhpToJsJson composer to the selected view
         */
        $view_to_attach_json = \Config::get('alex-mn/laravel-view-tools::php_to_js_json.view');

        \View::composer($view_to_attach_json, 'AlexMn\LaravelViewTools\Composers\PhpToJsJson');

    }

}
