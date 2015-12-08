<?php
namespace Database;
use ReflectionMethod;

class Database
{
    protected $adapter;
    public function __construct()
    {}
    public function test(MysqlAdapter $adapter)
    {
        $adapter->test();
    }
}

class MysqlAdapter
{
    public function test()
    {
        echo "\ni am MysqlAdapter test";
    }
}

class app
{
    public static function run($instance, $method)
    {
        if (! method_exists($instance, $method)) {
            echo 11;
            return null;
        }
        $reflector = new ReflectionMethod($instance, $method);
        print_r($reflector->getParameters());
        $parameters  = [];

        foreach ($reflector->getParameters() as $key => $parameter) {
            $class = $parameter->getClass();
            print_r($class->name);
            if ($class) {
                $parameters[] = new $class->name();
                /* $a = array_splice($parameters, $key, 0, [
                    new $class->name()
                ]); */
            }
        }
            print_r($parameters);

        call_user_func_array([
            $instance,
            $method
        ], $parameters);
    }
}

app::run(new Database(), 'test');
