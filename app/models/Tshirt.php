<?php

class Tshirt extends Eloquent{
	protected $table = 'tshirts';


	/**
	 * Initialize with input data
	 */
	public function initializeWithData($data, $image){
		$this->title = $data['title'];
		$this->tags = $data['tags'];
		$this->description = $data['description'];
		$this->styles = implode(',', $data['styles']);
		$this->colors = implode(',', $data['colors']);
		$this->fabric = implode(',', $data['fabrics']);
		$this->sizes = implode(',', $data['sizes']);
		$this->wash_care = $data['wash_care'];
		$this->price = $data['price'];
		$this->image = $image;
	}

	/**
	 * Order by filter options
	 *
	 * @param array $filter
	 * @return array of tshirts sorted according to filter
	 */
	public static function orderByFilter($filterids){
		$filters = array();
		foreach ($filterids as $filterid) $filters[] = Style::find($filterid)->style;
		$tshirts = static::all();
		$preference = array();
		foreach ($tshirts as $tshirt){
			$preference[$tshirt->id] = sizeof(array_intersect($filters, explode(',', $tshirt->styles)));
		}
		arsort($preference);
		$tshirts = array();
		foreach ($preference as $tshirt => $value){
			$tshirts[] = static::find($tshirt);
		}
		return $tshirts;
	}
}
