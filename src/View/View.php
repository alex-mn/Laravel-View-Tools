<?php namespace AlexMn\LaravelViewTools\View;

class View extends \Illuminate\View\View {

    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     *
     * @param string $key
     * @param string | array $value
     *
     * @return $this
     */
    public function withJs($key, $value)
    {
        $this->data['alex_mn_php_to_json'][$key] = $value;

        return $this;
    }
}