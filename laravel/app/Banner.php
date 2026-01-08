<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'banners';



	// public function getLinkAttribute(){
	// 	return url('veiculos/'.$this->slug);
	// }

	// public function getImageAttribute(){
	// 	if(empty($this->meta['fotos'])) return asset('images/fotond.jpg');
	// 	return $this->meta['fotos'][0];
	// }

	// public function getInfoAttribute(){

	// 	$str = [];

	// 	if(!empty($this->meta['cor'])) $str[] = 'Cor: '.$this->meta['cor'];
	// 	if(!empty($this->meta['opcionais'])) $str[] = 'Opcionais: '.$this->meta['opcionais'];
	// 	if(!empty($this->meta['observacoes'])) $str[] = $this->meta['observacoes'];

	// 	return implode('. ',$str);
	// }

}
