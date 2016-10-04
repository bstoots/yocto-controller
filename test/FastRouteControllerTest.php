<?php

namespace Bstoots\YoctoController\Test;
use PHPUnit\Framework\TestCase;
use Bstoots\YoctoController\FastRouteController;

class FastRouteControllerTest extends TestCase {
  
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
