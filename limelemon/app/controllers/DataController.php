<?php

class DataController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
        //
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
	$url = 'https://limelemon.lemonstand.com/api/v2/products';
    $accesstoken = 'PUT ACCESS TOKEN HERE';
	
	
    $headr = array();
    $headr[] = 'Content-Type: application/json';
    $headr[] = 'Authorization: Bearer '.$accesstoken;

   
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLOPT_HTTPGET,true);
	curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
    $reply = curl_exec($crl);

    if ($reply === false) {
      
       print_r('Curl error: ' . curl_error($crl));
    }
    curl_close($crl);
    
    $decoded_data = json_decode($reply, true);

	
	foreach($decoded_data as $key => $row)
	{
		foreach($row as $prod)
			{
				
				$newt=$prod['id'];
				if($newt)
				{
				$product = Products::where('id', '=', $newt)->first();
				if($product)
				{
				$product->name      = $prod['name'];
				$product->description = $prod['description'];
				$product->base_price=(string)$prod['base_price'];
				$product->save();
				}
				else
				{
				$product = new Products;
				$product->id       = $prod['id'];
				$product->name      = $prod['name'];
				$product->description = $prod['description'];
				$product->base_price=(string)$prod['base_price'];
				$product->save();
				
				}
				}	
			}
	}
	
	return "Data Updated!";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
