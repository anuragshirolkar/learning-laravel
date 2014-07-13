<?php

class Tag extends Eloquent{
	
	protected $table = 'tags';

	protected $fillable = array('tag');

	/**
	 * Returns list of all tags (just tags)
	 */
	public static function listTags(){
		$tags = static::all();
		$a = array();
		foreach($tags as $tag){
			array_push($a, $tag->tag);
		}
		return $a;
	}


	/**
	 * Update database with new tags
	 */
	public static function updateWithNew($tags){
		$tags = explode(',', $tags);
		foreach ($tags as $tag){
			$tagsFound = static::where('tag','=', $tag)->get();
			if(sizeof($tagsFound) == 0){
				$newtag = new Tag;
				$newtag->tag = $tag;
				$newtag->save();
			}
		}
	}
	

}
