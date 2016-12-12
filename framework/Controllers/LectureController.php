<?php

namespace Controllers;

use Models\Lecture;
use Models\Auth;

use Core\Validator;
use Core\Responder;

class LectureController {
	/**
	 * Returns a json with all the lecture events.
	 * 
	 * @return json
	 */
	public static function index() {
		// select all the lectures
		$lectures = Lecture::all();

		// send the lectures back in json
		Responder::respondWithJson("lectures", $lectures, 200);
	}

	/**
	 * Returns the dashboard for managing lectures
	 * 
	 * @return view
	 */
	public static function dashboard() {
		render("lectures/dashboard");
	}

	/**
	 * Displays the form for creating a new lecture
	 * 
	 * @return view
	 */
	public static function create() {
		render("lectures/create");
	}

	/**
	 * Shows a single lecture with an id.
	 * 
	 * @return view
	 */
	public static function show($id) {
		// get the lecture
		$lecture = Lecture::get("id", $id);

		// render the view
		render("lectures/show", ["lecture" => $lecture]);
	}

	/**
	 * Persists the created lecture into the database
	 * 
	 * @return view
	 */
	public static function store($data) {
		// add user to the $data aray
		$data["user_id"] = Auth::user()["id"];

		// store into database
		$record = Lecture::store($data);
		if ($record) {
			// return back to lectures dashboard
			redirect('/lecture'); // self::dashboard();
		}
		redirect('/lecture');
	}
}
