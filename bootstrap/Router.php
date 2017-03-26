<?php

namespace Codeuz;

class Router
{
	public function dispatch()
	{
		$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
			$r->addRoute('GET', '/', 'HomeController@index');
			$r->addRoute('GET', '/test', 'TestController@index');
		    /*$r->addRoute('GET', '/users', 'get_all_users_handler');
		    // {id} must be a number (\d+)
		    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
		    // The /{title} suffix is optional
		    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');*/
		});
		
		// Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];
		
		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);
		
		$base = str_replace('index.php','', $_SERVER['PHP_SELF']);
		$uri = '/'.substr($uri, strlen($base));
		$len = strlen($uri);
		
		if ($len != 1 && (substr($uri, -1) == '/')) {
			$uri = substr($uri, 0, $len - 1);
		}
		
		$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case \FastRoute\Dispatcher::NOT_FOUND:
		        // ... 404 Not Found
		        echo 'not found';
		        break;
		    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        // ... 405 Method Not Allowed
		        echo 'not allowed';
		        break;
		    case \FastRoute\Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];
				
				$handlerInfo = explode('@', $handler);
				$class = '\\App\Controllers\\'.$handlerInfo[0];
				$method = $handlerInfo[1];
				
		        // ... call $handler with $vars
		        $controller = new $class;
				$controller->$method();
		        break;
		}
	}
}
