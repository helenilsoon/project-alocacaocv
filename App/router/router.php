<?php

function routes()
{
  return require_once('routes.php');
}
/**
 * Checks if a URI exists in the given routes array and returns the route if found.
 *
 * @param mixed $uri The URI to search for in the routes array.
 * @param array $routes The array of routes to search in.
 * @return array Returns an array with the found route or an empty array if not found.
 */
function findExactRouteInArray($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    return [$uri => $routes[$uri]];
  }
  return [];
}
/**
 * Checks if a URI exists in the given routes array and returns the route if found.
 * dinamic
 * @param mixed $uri The URI to search for in the routes array.
 * @param array $routes The array of routes to search in.
 * @return array Returns an array with the found route or an empty array if not found.
 */
function findDinamicRouteInArray($uri, $routes)
{
  return array_filter(
    $routes,
    function ($url) use ($uri) {
      $regex = str_replace('/', '\/', ltrim($url, '/'));      
      return preg_match("/^$regex$/", ltrim($uri, '/'));
    },
    ARRAY_FILTER_USE_KEY
  );
}
 function paramsDinamic($uri, $foundUrl){
  if (!empty($foundUrl)) {
    $toGetParamets = array_keys($foundUrl)[0];
    return array_diff(
      explode('/', ltrim($uri, '/')),
      explode('/', ltrim($toGetParamets, '/'))

    );
    return [];
  }
}
function FormatParams($uri, $params){
  $paramsUri = explode("/", ltrim($uri, '/'));;
  dd($uri);
  dd($params);
  $paramsData= [];
   foreach($params as $index=>$param){
     $paramsData[$paramsUri[$index - 1]] = $param;
   }
   return $paramsData;
}
function router()
{
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  
  $routes = routes(); 
  $foundUrl = findExactRouteInArray($uri, $routes);
  $params=[];
  if (empty($foundUrl)) { 
    $foundUrl = findDinamicRouteInArray($uri, $routes);
       $params =paramsDinamic($uri, $foundUrl);
       $params = FormatParams($uri, $params);   
       
    }

    if(!empty($foundUrl)){
      return controller($foundUrl,$params);
      
   }
  
  throw new Exception('Rota nao encontrada'); 
    
}