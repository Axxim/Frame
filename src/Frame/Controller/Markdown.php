<?php

namespace Frame\Controller;

use dflydev\markdown\MarkdownParser;

/**
 * Class Markdown
 * A controller that automatically renders markdown.
 *
 * @package Frame\Controller
 */
class Markdown extends Base {

    public function _render($out, $args) {
        parent::_render($out, $args);

        $parser = new MarkdownParser();
        $html = $parser->transformMarkdown($out);

        $this->response->header('Content-Type', 'text/html; charset=' . $this->charset);
        $this->response->body($html);

        $this->response->send();
    }

}
