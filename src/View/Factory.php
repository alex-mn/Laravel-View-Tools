<?php namespace AlexMn\LaravelViewTools\View;

use \AlexMn\LaravelViewTools\View\View;

class Factory extends \Illuminate\View\Factory {

    /**
     * @author Alexandru Muresan <contact@alex-mn.com>
     *
     * The method definition is exactly the same as in the parent object, we rewrote it because we need to return our
     * Factory object and not the one called by the parent.
     *
     */
    public function make($view, $data = array(), $mergeData = array())
    {
        if (isset($this->aliases[$view])) $view = $this->aliases[$view];

        $path = $this->finder->find($view);

        $data = array_merge($mergeData, $this->parseData($data));

        $this->callCreator($view = new View($this, $this->getEngineFromPath($path), $view, $path, $data));

        return $view;
    }
}