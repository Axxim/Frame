<?php

namespace Frame;

use DirectoryIterator;

class Config {

    /**
     * List of files we have loaded into our configuration
     *
     * @var array
     */
    protected $files = array();

    /**
     * All the configuration items those configs contain.
     *
     * @var array
     */
    protected $items = array();

    /**
     * Load all of the files and the config items they contain.
     */
    public function __construct() {
        if(empty($files)) {
            $this->files = $this->findFiles();
            foreach($this->files as $file) {
                $this->items[str_replace('.php', '', $file)] = $this->loadItems($file);
            }
        }
    }

    /**
     * Check if key exists
     *
     * @param $key
     *
     * @return bool
     */
    public function exists($key) {
        return isset($this->items[$key]);
    }

    /**
     * Get a configuration item.
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key) {
        if (!isset($this->items[$key])) {
            return false;
        }

        return $this->items[$key];
    }

    public function put($key, $value) {

    }

    private function findFiles() {
        $files = array();
        foreach (new DirectoryIterator(app_path('config')) as $fileInfo) {
            if($fileInfo->isDot()) continue;

            array_push($files, $fileInfo->getFilename());
        }

        return $files;
    }

    /**
     * Loads the array into a variable.
     *
     * @param $file
     *
     * @return mixed
     */
    private function loadItems($file) {
        return require(app_path("config/$file"));
    }

} 
