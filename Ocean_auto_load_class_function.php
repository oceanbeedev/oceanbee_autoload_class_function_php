<?php

class OceanbeeAutoLoadClassFunction
{
    /**
     * class name
     * @var $className
     */
    public $className ;

    /**
     * this function get name of the target class
     * and using this class you can access class  static
     * 
     * @param string $className
     * @return self
     */
    public static function name($className){
        return (new self)->setClass($className) ;
    }

    /**
     * this function set class name for called class
     * 
     * @param string $className
     */
    public function setClass($className){
        $this->className = $className ;
        return $this ;
    }

    /**
     * this method get name of the target class method 
     * and get parms for pass parameters to method
     * 
     * @param string $name 
     * @param array $params 
     * 
     * @return void
     */
    public function method($name,$params){
      
        //user class refelction for get class property
        $ref = new ReflectionClass($this->className) ;

        //get method info from class reflection
        $methodParams = $ref->getMethod($name)->getParameters() ;

        
        $injectParams = [] ;    

        foreach($methodParams as $param) {

            if($param->getClass() != null){
                $className = $param->getClass()->name ;
                $injectParams[] = new $className ;
            }else{
                $injectParams[] = $params[$param->getName()] ;
            }
            
            
        }
        
        //call method form class
        call_user_func_array( array($this->className, $name),$injectParams) ;
    }
}
