<?php


class Uri
{

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $parameters;

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
        $this->controller = strtolower($controller);
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
        $this->action = strtolower($action);
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Uri constructor.
     * @param $uri
     *
     */
    public function __construct($uri)
    {
        $prepared_uri = preg_split('/\//', $uri, -1, PREG_SPLIT_NO_EMPTY);

        if(count($prepared_uri) == 0){
            $this->setController('index');
            $this->setAction('index');

        } elseif ( count($prepared_uri) == 1 ) {
            $this->setController($prepared_uri[0]);
            $this->setAction('default');

        } elseif ( count($prepared_uri) == 2 ) {
            $this->setController($prepared_uri[0]);
            $this->setAction($prepared_uri[1]);

        } elseif ( count($prepared_uri) > 2 ) {
            $this->setController($prepared_uri[0]);
            $this->setAction($prepared_uri[1]);
            $this->setParameters(array_splice($prepared_uri, 2));
        }

    }
}