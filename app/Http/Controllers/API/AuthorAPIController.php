<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\AuthorRepository;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use Validator;

class AuthorAPIController extends AppBaseController
{
	/** @var  AuthorRepository */
	private $authorRepository;

	function __construct(AuthorRepository $authorRepo)
	{
		$this->authorRepository = $authorRepo;
	}

	/**
	 * Display a listing of the Author.
	 * GET|HEAD /authors
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$posts = Author::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new Author.
	 * GET|HEAD /authors/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Author in storage.
	 * POST /authors
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Author::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, Author::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$authors = $this->authorRepository->create($input);

		return $this->sendResponse($authors->toArray(), "Author saved successfully");
	}

	/**
	 * Display the specified Author.
	 * GET|HEAD /authors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$author = Author::where('objectId', $id)->first();

		return $this->sendResponse($author->toArray(), "Author retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Author.
	 * GET|HEAD /authors/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Author in storage.
	 * PUT/PATCH /authors/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Author $author */
		$author = $this->authorRepository->apiFindOrFail($id);

		$result = $this->authorRepository->updateRich($input, $id);

		$author = $author->fresh();

		return $this->sendResponse($author->toArray(), "Author updated successfully");
	}

	public function authorUploadImage(Request $request){
		if($request->file('image')){
        	$photoname = $this->uploadImage($request->file('image'), '/authors_photo/');
        	return response()->json($photoname);
		}
		return response()->json('Image Field is Required!');
        
    }

	/**
	 * Remove the specified Author from storage.
	 * DELETE /authors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->authorRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Author deleted successfully");
	}
}
