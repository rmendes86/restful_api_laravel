<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var $statusCode
     */
    protected $statusCode;

    /**
     * Get Status Code
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set Status Code
     *
     * @param $statusCode
     *
     * @return static
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Responde Internal Error
     *
     * @param array       $data
     * @param string|null $message
     *
     * @return mixed
     */
    public function respondInternalError(array $data = [], $message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($data, $message);
    }

    /**
     * Respond Not Found
     *
     * @param string|null $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError([], $message);
    }

    /**
     * Respond Bad Request
     *
     * @param array       $data
     * @param string|null $message
     *
     * @return mixed
     */
    public function respondBadRequest(array $data = [], $message = 'Bad Request')
    {
        return $this->setStatusCode(400)->respondWithError($data, $message);
    }

    /**
     * Respond Unprocessable Entity
     *
     * @param array $data
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessableEntity(array $data = [], $message = 'Unprocessable Entity')
    {
        return $this->setStatusCode(422)->respondWithError($data, $message);
    }

    /**
     * Respond Success
     *
     * @param mixed       $data
     * @param string|null $message
     * @param array       $headers
     *
     * @return mixed
     */
    public function respondSuccess($data, $message = 'Ok', $headers = [])
    {
        $statusCode = 200;
        if (! $message) {
            $message = $this->getResponseText($statusCode);
        }
        return $this->setStatusCode($statusCode)->respond(
            ['success' => ['data' => $data, 'message' => $message, 'status_code' => $statusCode]],
            $headers
        );
    }

    /**
     * Respond With Error
     *
     * @param string $message
     *
     * @param array $data
     *
     * @return mixed
     */
    public function respondWithError(array $data = [], $message = null)
    {
        $statusCode = $this->getStatusCode();
        if (! $message) {
            $message = $this->getResponseText($statusCode);
        }
        return $this->respond(['error' => ['message' => $message, 'data' => $data, 'status_code' => $statusCode]]);
    }

    /**
     * Respond Access Denied
     *
     * @return mixed
     */
    public function respondAccessDenied()
    {
        return $this->setStatusCode(403)->respondWithError([], 'Access Denied');
    }

    /**
     * Respond
     *
     * @param $data
     *
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $code
     *
     * @return string
     */
    protected function getResponseText($code)
    {
        return \Symfony\Component\HttpFoundation\Response::$statusTexts[$code];
    }
}
