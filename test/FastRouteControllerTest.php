<?php

namespace Bstoots\YoctoController\Test;
use Bstoots\YoctoController\FastRouteController;

class FastRouteControllerTest extends \PHPUnit_Framework_TestCase {
  
  /**
   * @dataProvider setRouteDataSuccessProvider()
   */
  public function testSetRouteDataSuccess($routeData) {
    $request = $this->getMockBuilder('\Psr\Http\Message\RequestInterface')->getMock();
    $c = $this->getMockBuilder('\Bstoots\YoctoController\FastRouteController')
              ->setConstructorArgs([$request])
              ->getMock();
    $c->setRouteData($routeData);
  }
  
  public static function setRouteDataSuccessProvider() {
    return [
      [[]],
      [['key' => 'val']]
    ];
  }
  
  /**
   * @expectedException TypeError
   * @dataProvider setRouteDataTypeErrorProvider()
   */
  public function testSetRouteDataTypeError($routeData) {
    $request = $this->getMockBuilder('\Psr\Http\Message\RequestInterface')->getMock();
    $c = $this->getMockBuilder('\Bstoots\YoctoController\FastRouteController')
              ->setConstructorArgs([$request])
              ->getMock();
    $c->setRouteData($routeData);
  }
  
  public static function setRouteDataTypeErrorProvider() {
    return [
      [null],
      ['nope']
    ];
  }
  
}
