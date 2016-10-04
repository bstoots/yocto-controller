<?php

namespace Bstoots\YoctoController;

abstract class FastRouteController extends Psr7Controller {

  /**
   * @var array $routeData Contains FastRoute pattern placeholder key/val data
   */
  protected $routeData = [];

  /**
   * @param array $routeData Accepts FastRoute pattern placeholder key/val data
   */
  public function setRouteData(array $routeData) {
    $this->routeData = $routeData;
  }

}
