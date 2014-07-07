<?php

class Tag extends Eloquent{
	
	protected $table = 'tags';

	protected $fillable = array('tag');

	public static function listTags(){
		$tags = static::all();
		$a = array();
		foreach($tags as $tag){
			array_push($a, $tag->tag);
		}
		return $a;
	}
	
	

}
