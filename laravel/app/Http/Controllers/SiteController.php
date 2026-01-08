<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Cache;


class SiteController extends Controller
{
    public function home(Request $request){



			$searchData = \App\Product::select('brand','model')->distinct()->get()->groupBy('brand');
    		if (Cache::has('products')) {
	    		$featured = Cache::get('products');
	    	} else {
	    		$featured = $this->importVehicles();
	    	}


			return view('master',[
				'searchData' => $searchData,
				'showcase' => true,
				'content'=>view('home',[
					'featured'=>$featured,
				]),
				'title'=>'',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);

    }

    public function pageLocalizacao(Request $request){
			return view('master',[
				'content'=>view('pageLocalizacao'),
				'title'=>'Localização',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);
    }

    public function pageSobre(Request $request){
			return view('master',[
				'content'=>view('pageSobre'),
				'title'=>'Sobre',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);
    }


		public function pageContato(Request $request){
			return view('master',[
				'content'=>view('pageContato'),
				'title'=>'Fale conosco',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);
    }


    public function busca(Request $request){

    	if (!Cache::has('products')) $this->importVehicles();

    	$get_data = $request->input();
    	$where = [];

    	$query = \App\Product::whereRaw('true');

    	if(!empty($get_data['marca'])){
    		$query->where('brand',$get_data['marca']);
    	}
    	if(!empty($get_data['modelo'])){
    		$query->where('model',$get_data['modelo']);
    	}
    	if(!empty($get_data['ano'])){
    		$query->where('year',$get_data['ano']);
    	}
    	if(!empty($get_data['valor'])){
    		list($min,$max) = explode('-',$get_data['valor']);
    		$query->where("price",">=",$min);
    		$query->where("price","<=",$max);
    	}

    	if(!empty($get_data['termo'])){
    		$query->whereRaw("MATCH(title) against('{$get_data['termo']}') > 0");
    	}

			$products = $query->orderBy('id')->get();
			$searchData = \App\Product::select('brand','model')->distinct()->get()->groupBy('brand');

			return view('master',[
				'searchData'=>$searchData,
				'content'=>view('archive',[
					'products'=>$products,
					'search'=>true
				]),
				'title'=>'Nossos Veículos',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);
    }


    public function archive(Request $request){

    	if (Cache::has('products')) {
    		$products = Cache::get('products');
    	} else {
    		$products = $this->importVehicles();
    	}

			$searchData = \App\Product::select('brand','model')->distinct()->get()->groupBy('brand');

			return view('master',[
				'searchData'=>$searchData,
				'content'=>view('archive',[
					'products'=>$products
				]),
				'title'=>'Nossos Veículos',
				'description'=>'Revenda de veículos. Carros seminovos de todas as marcas. Acesse nosso site e conheça o nosso estoque.',
				'image'=>site_url('images/seo.jpg'),
			]);
    }

    public function single(Request $request,$link){

    	if (!Cache::has('products')) $this->importVehicles();

    	$product = \App\Product::where('slug',$link)->first();
    	if(empty($product) && preg_match('/-(\d+)$/',$link,$match)){
    		$id = $match[1];
    		//tenta buscar somente pelo id
    		$product = \App\Product::where('slug','like',"%-$id")->first();
    	}

    	if(!empty($product)){
    		$related = \App\Product::inRandomOrder()->limit(3)->get();
				return view('master',[
					'noshowcase'=>true,
    			'content'=>view('single',[
    				'product'=>$product,
    				'related'=>$related,
  				]),
    			'title'=>$product->title,
					'description'=>$product->info,
					'image'=>$product->image,
  			]);
    	}

    	return $this->page404();

    }


    public function page404(){
    	return response(view('master',[
  			'content'=>view('errors/404'),
  			'title'=>'Página não encontrada',
				'description'=>'',
				'image'=>site_url('images/seo.jpg'),
			]),404);
    }


	public function postContato(Request $request){
		$post_data = $request->input();

		// Verifica se a URL da API está configurada
		$apiUrl = env('CNV_ADMIN_AJAX');
		if(empty($apiUrl)){
			return response('Erro: URL da API não configurada', 500);
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $apiUrl,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => http_build_query($post_data),
			CURLOPT_USERAGENT => 'Leco Motos Contact Form',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded'
			),
			CURLOPT_TIMEOUT => 30,
			CURLOPT_CONNECTTIMEOUT => 10
		));
		
		$result = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);
		curl_close($curl);

		// Verifica se houve erro no cURL
		if($result === false || !empty($curlError)){
			\Log::error('Erro ao enviar formulário de contato: ' . $curlError);
			return response('Erro ao processar o formulário. Tente novamente mais tarde.', 500);
		}

		// Verifica se a resposta contém erro
		if(preg_match('/erro/i', $result)){
			$statusCode = 400;
		} else {
			$statusCode = 200;
		}
		
		return response($result, $statusCode);
    }


	public function postProposta(Request $request){
		$post_data = $request->input();

		// Verifica se a URL da API está configurada
		$apiUrl = env('CNV_ADMIN_AJAX');
		if(empty($apiUrl)){
			return response('Erro: URL da API não configurada', 500);
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $apiUrl,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => http_build_query($post_data),
			CURLOPT_USERAGENT => 'Leco Motos Proposal Form',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded'
			),
			CURLOPT_TIMEOUT => 30,
			CURLOPT_CONNECTTIMEOUT => 10
		));
		
		$result = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);
		curl_close($curl);

		// Verifica se houve erro no cURL
		if($result === false || !empty($curlError)){
			\Log::error('Erro ao enviar formulário de proposta: ' . $curlError);
			return response('Erro ao processar o formulário. Tente novamente mais tarde.', 500);
		}

		// Verifica se a resposta contém erro
		if(preg_match('/erro/i', $result)){
			$statusCode = 400;
		} else {
			$statusCode = 200;
		}
		
		return response($result, $statusCode);
    }


    private function importVehicles(){

			//save new cache to prevent duplicated items (concurrent requests);
			$products = Cache::get('products_backup');
			Cache::put('products', $products, 60*24*7);

	  	$url = env('CNV_API_VEHICLES');

	  	$vehicles = json_decode(file_get_contents($url),true);

	  	if(!empty($vehicles)){

				$keep = [];

				//save vehicles
				foreach($vehicles as $vehicle){
					$marca = preg_replace('/ motos?/i','',$vehicle['marca']);
					$title = $marca.' '.$vehicle['modelo_versao'].' - '.$vehicle['ano_modelo'];
					$slug = str_slug($title.' '.$vehicle['id']);

					$keep[] = $slug;

					if(\App\Product::where('slug',$slug)->count()>1) \App\Product::where('slug',$slug)->first()->delete();
					$product = \App\Product::firstOrNew(['slug'=>$slug]);

					$product->title = $title;
	  			$product->slug = $slug;
	  			$product->brand = $marca;
	  			$product->model = $vehicle['modelo_versao'];
	  			$product->year = $vehicle['ano_modelo'] ?: $vehicle['ano'];
	  			$product->price = !empty($vehicle['valor'])?preg_replace('/[^0-9]/','',$vehicle['valor']):null;
	  			$product->meta = $vehicle;
	  			$product->save();
	    	}

				//delete local vehicles
				DB::table('products')->whereNotIn('slug', $keep)->delete();

				$products =  \App\Product::orderBy('id')->get();
				Cache::put('products', $products, 60*24*7);
				Cache::forever('products_backup', $products);


	    }


			return $products;

    }




    public function sitemap(){
    	$links = [];
    	$links[] = site_url('/');
    	$links[] = site_url('sobre');
    	$links[] = site_url('veiculos');

    	$products = Cache::get('products');
    	foreach($products as $product){
    		$links[] = $product->link;
    	}

    	$links[] = site_url('contato');
    	return implode("\n",$links);
    }

}
