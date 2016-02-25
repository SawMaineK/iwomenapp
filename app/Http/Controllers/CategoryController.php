<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Libraries\Repositories\CategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class CategoryController extends AppBaseController
{

	/** @var  CategoryRepository */
	private $categoryRepository;

	function __construct(CategoryRepository $categoryRepo)
	{
		$this->categoryRepository = $categoryRepo;
	}

	/**
	 * Display a listing of the Category.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categoryRepository->paginate(10);

		return view('categories.index')
			->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new Category.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created Category in storage.
	 *
	 * @param CreateCategoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCategoryRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = str_random(10);

		if($request->file('image')){
			$image = $this->uploadImage($request->file('image'),'/categories_photo/');
			$input['image'] = $image['resize_url'][0];
		}

		$category = $this->categoryRepository->create($input);

		Flash::success('Category saved successfully.');

		return redirect(route('categories.index'));
	}

	/**
	 * Display the specified Category.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->categoryRepository->find($id);

		if(empty($category))
		{
			Flash::error('Category not found');

			return redirect(route('categories.index'));
		}

		return view('categories.show')->with('category', $category);
	}

	/**
	 * Show the form for editing the specified Category.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$category = $this->categoryRepository->find($id);

		if(empty($category))
		{
			Flash::error('Category not found');

			return redirect(route('categories.index'));
		}

		return view('categories.edit')->with('category', $category);
	}

	/**
	 * Update the specified Category in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCategoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCategoryRequest $request)
	{
		$category = $this->categoryRepository->find($id);

		if(empty($category))
		{
			Flash::error('Category not found');

			return redirect(route('categories.index'));
		}

		$input = $request->all();

		if($request->file('image')){
			$image = $this->uploadImage($request->file('image'),'/categories_photo/');
			$input['image'] = $image['resize_url'][0];
		}

		$this->categoryRepository->updateRich($input, $id);

		Flash::success('Category updated successfully.');

		return redirect(route('categories.index'));
	}

	/**
	 * Remove the specified Category from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = $this->categoryRepository->find($id);

		if(empty($category))
		{
			Flash::error('Category not found');

			return redirect(route('categories.index'));
		}

		$this->categoryRepository->delete($id);

		Flash::success('Category deleted successfully.');

		return redirect(route('categories.index'));
	}
}
