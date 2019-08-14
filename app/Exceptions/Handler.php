<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use  \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if($exception instanceof NotFoundHttpException){

            $config = app('config');

            $defaultLocal = $config['app']['locale'];
            $locale = $request->segment(1);
           // dd($locale);
            if(!in_array($locale,$config['app.languages']) && (strlen($locale)!=2)){
                $url = $request->getUriForPath('/'.$defaultLocal.$request->getPathInfo());
                return redirect($url,301);
            }
        }
        return parent::render($request, $exception);
    }
}
