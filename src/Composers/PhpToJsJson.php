<?php namespace AlexMn\LaravelViewTools\Composers;

use AlexMn\LaravelViewTools\Components\PhpToJsJson as PhpToJsJsonHelper;

/**
 * Class PhpToJson
 *
 * @author Alexandru Muresan <contact@alex-mn.com>
 */
class PhpToJsJson
{
    /**
     * @var \AlexMn\LaravelViewTools\Components\PhpToJsJson
     */
    protected $php_to_js_json;

    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     *
     * @param PhpToJsJsonHelper $phpToJsJson
     */
    public function __construct(PhpToJsJsonHelper $phpToJsJson)
    {
        $this->php_to_js_json = $phpToJsJson;

        $this->php_to_js_json->set_namespace(\Config::get('alex-mn/laravel-view-tools::php_to_js_json.namespace'));
    }

    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     *
     * @param $view
     */
    public function compose($view)
    {
        $this->php_to_js_json->set_php_array($view['alex_mn_php_to_json']);

        echo $this->php_to_js_json->generate()->get_generated_string();
    }

}