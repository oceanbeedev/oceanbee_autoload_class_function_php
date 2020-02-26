# oceanbee_autoload_class_function_php
PHP class auto load function with parameters


## Example

```php

<?php 

  include './oceanbee_auto_load_class_function.php' ;
  
  class Request {
    public function get($name){
      return $_GET[$name];
    }
  }
  
  class Post {
    
    public function create(Request $request,$id){
      $data = [
        'title'=>$request->get('title') ,
        'id'=>$id
      ];
      
      //to do
      
    }
  
  }
  
  
  OceanbeeAutoLoadClassFunction::name('Post')->method('create',[
    'id'=>12
  ]);
  
