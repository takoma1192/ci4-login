<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        // if segment 1 == users
        // we have to redirect the request to the second segment 
        // ServerでRootを/publicに指定する
        
        $uri = service('uri');
        if($uri->getSegment(1) === 'users') {
            if($uri->getSegment(2) === '') {
                $segment = '/';
            } else {
                $segment = '/'.$uri->getSegment(2);
            }

            return redirect()->to(base_url($segment));
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
