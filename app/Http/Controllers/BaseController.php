<?php

namespace App\Http\Controllers;


class BaseController extends Controller
{


    protected function enterMiddlewares($middlewares = [])
    {

        try{

            foreach ( $middlewares as $middleware ){

                $this->middleware($middleware);
            }
        }catch(\Exception $e){


        }

    }

    protected function enterMiddlewaresOnly($middlewares = [])
    {

        try{

            foreach ( $middlewares as $middleware => $method ){

                $this->middleware($middleware)->only($method);
            }
        }catch(\Exception $e){


        }

    }

    protected function enterMiddlewaresExcept($middlewares = [])
    {

        try{

            foreach ( $middlewares as $middleware => $method ){

                $this->middleware($middleware)->only($method);
            }
        }catch(\Exception $e){


        }

    }

}