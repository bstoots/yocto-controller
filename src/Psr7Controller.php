<?php

namespace Bstoots\YoctoController;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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
   * Every controller is required to handle an HTTP message in some way.
   * This call is the last stop so to speak before the response is returned to the user.
   *
   * @param void
   * @return void
   */
  abstract public function handle();
  
  /**
   * Helper function that takes care of sending response headers and body data.
   * This is most often called inside handle().
   *
   * @param Psr\Http\Message\ResponseInterface $response
   * @return void
   */
  protected function respond(ResponseInterface $response) {
    // Special case HTTP header first
    header("HTTP/".$response->getProtocolVersion()." ".$response->getStatusCode()." ".$response->getReasonPhrase());
    // Then the rest of the headers
    foreach ($response->getHeaders() as $field => $value) {
      header($field.': '.$value[0]);
    }
    // Lastly the body
    echo $response->getBody();
  }
  
}
