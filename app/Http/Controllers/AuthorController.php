<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Libraries\Repositories\AuthorRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AuthorController extends AppBaseController
{

	/** @var  AuthorRepository */
	private $authorRepository;

	function __construct(AuthorRepository $authorRepo)
	{
		$this->authorRepository = $authorRepo;
	}

	/**
	 * Display a listing of the Author.
	 *
	 * @return Response
	 */
	public function index()
	{
		$authors = $this->authorRepository->paginate(10);

		return view('authors.index')
			->with('authors', $authors);
	}

	/**
	 * Show the form for creating a new Author.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('authors.create');
	}

	/**
	 * Store a newly created Author in storage.
	 *
	 * @param CreateAuthorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAuthorRequest $request)
	{
		$input = $request->all();

		if($request->file('authorImg')){
			$uploadImage = $this->uploadImage($request->file('authorImg'),'/authors_photo/');
			$input['authorImg'] = $uploadImage['resize_url'][0];
		}

		$author = $this->authorRepository->create($input);

		Flash::success('Author saved successfully.');

		return redirect(route('authors.index'));
	}

	/**
	 * Display the specified Author.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$author = $this->authorRepository->find($id);

		if(empty($author))
		{
			Flash::error('Author not found');

			return redirect(route('authors.index'));
		}

		return view('authors.show')->with('author', $author);
	}

	/**
	 * Show the form for editing the specified Author.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$author = $this->authorRepository->find($id);

		if(empty($author))
		{
			Flash::error('Author not found');

			return redirect(route('authors.index'));
		}

		return view('authors.edit')->with('author', $author);
	}

	/**
	 * Update the specified Author in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAuthorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAuthorRequest $request)
	{
		$author = $this->authorRepository->find($id);

		if(empty($author))
		{
			Flash::error('Author not found');

			return redirect(route('authors.index'));
		}

		$input = $request->all();

		if($request->file('authorImg')){
			$uploadImage = $this->uploadImage($request->file('authorImg'),'/authors_photo/');
			$input['authorImg'] = $uploadImage['resize_url'][0];
		}

		$this->authorRepository->updateRich($input, $id);

		Flash::success('Author updated successfully.');

		return redirect(route('authors.index'));
	}

	/**
	 * Remove the specified Author from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$author = $this->authorRepository->find($id);

		if(empty($author))
		{
			Flash::error('Author not found');

			return redirect(route('authors.index'));
		}

		$this->authorRepository->delete($id);

		Flash::success('Author deleted successfully.');

		return redirect(route('authors.index'));
	}
}
