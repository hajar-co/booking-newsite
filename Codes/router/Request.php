<?php
include "IRequest.php";
class Request implements IRequest
{
    function __construct()
    {
        $this->bootStrapSelf();
    }
    private function bootStrapSelf()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }
    private function toCamelCase($str)
    {
        $stringChunks = preg_split('[_]', strtolower($str));
        $camelCaseStrirng = "";
        foreach ($stringChunks as $key => $value) {
            if ($key == 0) {
                $camelCaseStrirng .= $value;
            } else {
                $camelCaseStrirng .= ucfirst($value);
            }
        }
        return $camelCaseStrirng;
    }
    public function getBody()
    {
        switch ($this->requestMethod) {
            case "GET":
                return;
            break;
            case "POST":
                $body = array();
                foreach ($_POST as $key => $value) {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
                return $body;
            break;
        }
    }
}
