<?php

namespace Bstoots\YoctoController;
use Psr\Http\Message\RequestInterface;

abstract class Psr7Controller {

  /**
   * @var Psr\Http\Message\RequestInterface $request
   */
  protected $request;
  
  /**
   * @param Psr\Http\Message\RequestInterface $request
   */
  public function __construct(RequestInterface $request) {
    $this->request = $request;
  }
  
  /**
   * Every controller is required to handle an HTTP message in some way
   */
  abstract public function handle();
  
}
