<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $guarded = [];

	protected $casts = [
		'meta' => 'array'
	];

	public function getLinkAttribute(){
		return site_url('veiculos/'.$this->slug);
	}

	public function getPriceAttribute(){
		if(empty($this->attributes['price'])) return null;
		return number_format($this->attributes['price'],2,',','.');
	}

	public function getImageAttribute(){
		if(empty($this->meta['fotos'])) return site_url('images/fotond.jpg');
		return $this->meta['fotos'][0];
	}

	public function getInfoAttribute(){

		$str = [];

		if(!empty($this->meta['cor'])) $str[] = 'Cor: '.$this->meta['cor'];
		if(!empty($this->meta['opcionais'])) $str[] = 'Opcionais: '.$this->meta['opcionais'];
		if(!empty($this->meta['observacoes'])) $str[] = $this->meta['observacoes'];

		return implode('. ',$str);
	}

}
