<?php


class Router
{
    /** Storage raw REQUEST_URI
     * @var string
     */
    private $uri;

    /** Storage controller name
     * @var string
     */
    private $controller;

    /** Storage controller name
     * @var string
     */
    private $action;

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }


    /**
     * Router constructor.
     * @param $uri
     */
    public function __construct($uri)
    {
        $this->setUri($uri);
        $this->dispatch();

        return $this;
    }

    /**
     * take apart URI (controller, action, parameters)
     * @return $this
     */
    public function takeApartUri()
    {
        $uri = new Uri($this->getUri());
        $this->setController($uri->getController());
        $this->setAction($uri->getAction());
        print_r($uri->getParameters());

        return $this;
    }

    public function dispatch()
    {
        $this->takeApartUri();
    }

}