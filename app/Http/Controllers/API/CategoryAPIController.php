<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class CategoryAPIController extends AppBaseController
{
	/** @var  CategoryRepository */
	private $categoryRepository;

	function __construct(CategoryRepository $categoryRepo)
	{
		$this->categoryRepository = $categoryRepo;
	}

	/**
	 * Display a listing of the Category.
	 * GET|HEAD /categories
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$posts = Category::offset($offset)->limit($limit)->get();
				
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new Category.
	 * GET|HEAD /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Category in storage.
	 * POST /categories
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Category::$rules) > 0)
			$this->validateRequestOrFail($request, Category::$rules);

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$categories = $this->categoryRepository->create($input);

		return $this->sendResponse($categories->toArray(), "Category saved successfully");
	}

	/**
	 * Display the specified Category.
	 * GET|HEAD /categories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->categoryRepository->apiFindOrFail($id);

		return $this->sendResponse($category->toArray(), "Category retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Category.
	 * GET|HEAD /categories/{id}/edit
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
	 * Update the specified Category in storage.
	 * PUT/PATCH /categories/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Category $category */
		$category = $this->categoryRepository->apiFindOrFail($id);

		$result = $this->categoryRepository->updateRich($input, $id);

		$category = $category->fresh();

		return $this->sendResponse($category->toArray(), "Category updated successfully");
	}

	/**
	 * Remove the specified Category from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->categoryRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Category deleted successfully");
	}
}
