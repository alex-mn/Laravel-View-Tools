<?php namespace AlexMn\LaravelViewTools\Components;

/**
 * Class PhpToJsJson
 *
 * Convert a php array to javascript JSON
 *
 * @author Alexandru Muresan <contact@alex-mn.com>
 */
class PhpToJsJson
{
    /**
     * The JS namespace under which the JSON will be stored
     *
     * @var string
     */
    protected $namespace;

    /**
     * Array of data to be converted
     *
     * @var array
     */
    protected $php_array;

    /**
     * @var string
     */
    protected $start_tag = '<script type="text/javascript">';

    /**
     * @var string
     */
    protected $end_tag = '</script>';

    /**
     * The resulted json string
     *
     * @var string
     */
    protected $generated_string;

    /**
     * @param string $namespace
     */
    public function set_namespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @param array $php_array
     */
    public function set_php_array($php_array)
    {
        $this->php_array = json_encode($php_array);
    }

    /**
     * @return string
     */
    public function get_generated_string()
    {
        return $this->generated_string;
    }

    public function generate()
    {
        $this->generated_string = $this->start_tag;

        $this->generated_string .= "var $this->namespace = {$this->php_array}";

        $this->generated_string .= $this->end_tag;

        return $this;
    }
}