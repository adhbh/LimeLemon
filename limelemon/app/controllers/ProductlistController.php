<?php

class ProductlistController extends \BaseController {

	public function getProducts()
    {
        $product = Products::paginate(10);
    
        return View::make('index')
            ->with('product', $product);
			
			
	}
	
	public function getChart()
    {
        $product = Products::paginate(10);
    
        return View::make('chart')
            ->with('product', $product);	
	}

}