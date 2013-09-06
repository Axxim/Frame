<?php

namespace Frame\Controller;

/**
 * Class View
 * Renders HTML views
 *
 * @package Frame\Controller
 */
class View extends Base {

    /**
     * Layout for views
     * @var string
     */
    public $layout;

    /**
     * View file extensions
     * @var string
     */
    public $ext = 'phtml';

    public $data;

    /**
     * Make the view
     *
     * @param       $view
     * @param array $data
     */
    public function make($view, $data = array()) {
        // If we have a layout
        if(!empty($this->layout)) {
            $this->service->layout(self::findView($this->layout));
        }

        // Render view regardless
        $this->service->render(self::findView($view), $data);
    }

    /**
     * Find a view, this will be expanded in the future.
     *
     * @param $view
     *
     * @return string
     */
    private function findView($view) {
        $ext = $this->ext;
        $path = app_path("views/$view.$ext");

        return $path;
    }

}
