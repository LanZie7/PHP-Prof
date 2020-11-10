<?php

namespace app\controllers;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('Экшен не существует');
        }
    }


    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = TEMPLATE_DIR . $template . ".php";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }
}