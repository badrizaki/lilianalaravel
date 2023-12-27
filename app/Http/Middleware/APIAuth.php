<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Config;

class APIAuth
{
    // BASIC AUTH
	/**
     * Name of the realm
     *
     * @var string
     */
    private $realm = 'Restricted area';
    
    /**
     * Valid Users
     * @var array
     */
    private $users = array('username' => 'password');
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$this->users = array(Config::get('api.username') => Config::get('api.password'));
        
        // Check the user is authenticated for this session
        if (false === $request->session()->get('isAuthenticated', false))
        {
            if (false === $request->header('PHP_AUTH_USER', false))
            {
                // Save their destination and return headers for BasicAuth
                $request->session()->put('intendedDestination', $request->getUri());
                return $this->notAuthorisedResponse();
            }
            else {

                // If user is not found
                if (!isset($this->users[$request->header('PHP_AUTH_USER')]))
                {
                	return $this->notAuthorisedResponse();
                }

                // If password is incorrect
                if ($this->users[$request->header('PHP_AUTH_USER')] !== $request->header('PHP_AUTH_PW'))
                {
                	return $this->notAuthorisedResponse();
                }

                // Else Log them in
                $request->session()->put('isAuthenticated', true);
            }
        }
        return $next($request);
    }

    private function notAuthorisedResponse()
    {
        /** @var Response $response */
        $response = new Response();
        $response->header('WWW-Authenticate', 'Basic realm="'. $this->realm .'"');
        $response->setStatusCode(401);
        $response->setContent('401: You are not authorised');
        return $response;
    }
}

