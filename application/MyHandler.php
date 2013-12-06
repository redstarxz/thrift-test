<?php
class MyHandler implements HelloServiceIf
{
    public function say_hello()
    {
        return 'hello world';
    }

  public function say_foreign_hello($language)
  {
        return 'yyyyy'.$language;
  }
  public function say_hello_repeat($times)
  {
        return array('yyyyy'.$times);

  }


}
