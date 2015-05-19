<?php
	/**
		Klassen hanterar ingredienserna i databasen.
		
		@author Andreas Indal
	*/
	class Ingredient {
		/**
			Hämtar samtliga ingredienser från databasen
		*/
		public static function all() {
			$db = DB::getInstance();
			$db->getAll('ingredients');

			return $db->results();
		}

		/**
			Lägger till en ny ingrediens i databasen

			@param $fields 	Data som skall läggas till i tabellen.
		*/
		public static function add($fields) {
			$db = DB::getInstance();

			if (!$db->insert('ingredients', $fields)) {
				throw new Exception('Ingrediensen kunde inte läggas till.');
			}
		}

		/**
			Hämtar namnet från ingrediensen med angivet id

			@param $id 	Ingrediensens id
		*/
		public static function get($id) {
			if ($id) {
				$db = DB::getInstance();
				$db->get('ingredients', array('id', '=', $id));

				return $db->first()->name;
			}
		}

		/**
			Hämtar all data tillhörande ingrediensen med angivet id

			@param $id 	Ingrediensens id
		*/
		public static function data($id) {
			if ($id) {
				$db = DB::getInstance();
				return $db->get('ingredients', array('id', '=', $id))->first();
			}
		}

		/**
			Hämtar samtliga ingredienser som tillhör angivet recept

			@param $recipe 	Receptets id
		*/
		public static function in($recipe) {
			if ($recipe) {
				$db = DB::getInstance();
				$db->get('recipe_ingredients', array('recipe', '=', $recipe));

				return $db->results();
			}
		}

		/**
			Lägger till en ingrediens till ett recept

			@param $fields 	Data som skall läggas till i databastabellen
		*/
		public static function addToRecipe($fields) {
			$db = DB::getInstance();
			if (!$db->insert('recipe_ingredients', $fields)) {
				throw new Exception('Ingrediensen kunde inte läggas till');
			}
		}
	}