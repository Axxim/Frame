<?php

class MarkdownController extends Frame\Controller\Markdown {

    public function index() {
        $markdown = "## Hello";

        return $markdown;
    }

}
