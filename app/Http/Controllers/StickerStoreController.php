<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStickerStoreRequest;
use App\Http\Requests\UpdateStickerStoreRequest;
use App\Libraries\Repositories\StickerStoreRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class StickerStoreController extends AppBaseController
{

	/** @var  StickerStoreRepository */
	private $stickerStoreRepository;

	function __construct(StickerStoreRepository $stickerStoreRepo)
	{
		$this->stickerStoreRepository = $stickerStoreRepo;
	}

	/**
	 * Display a listing of the StickerStore.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stickerStores = $this->stickerStoreRepository->paginate(10);

		return view('stickerStores.index')
			->with('stickerStores', $stickerStores);
	}

	/**
	 * Show the form for creating a new StickerStore.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('stickerStores.create');
	}

	/**
	 * Store a newly created StickerStore in storage.
	 *
	 * @param CreateStickerStoreRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStickerStoreRequest $request)
	{
		$input = $request->all();

		if($request->file('stickerImg'))
			$input['stickerImg'] = json_encode($this->uploadImage($request->file('stickerImg'),'/stickers_photo/'));

		$stickerStore = $this->stickerStoreRepository->create($input);

		Flash::success('StickerStore saved successfully.');

		return redirect(route('stickerStores.index'));
	}

	/**
	 * Display the specified StickerStore.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$stickerStore = $this->stickerStoreRepository->find($id);

		if(empty($stickerStore))
		{
			Flash::error('StickerStore not found');

			return redirect(route('stickerStores.index'));
		}

		return view('stickerStores.show')->with('stickerStore', $stickerStore);
	}

	/**
	 * Show the form for editing the specified StickerStore.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$stickerStore = $this->stickerStoreRepository->find($id);

		if(empty($stickerStore))
		{
			Flash::error('StickerStore not found');

			return redirect(route('stickerStores.index'));
		}

		return view('stickerStores.edit')->with('stickerStore', $stickerStore);
	}

	/**
	 * Update the specified StickerStore in storage.
	 *
	 * @param  int              $id
	 * @param UpdateStickerStoreRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateStickerStoreRequest $request)
	{
		$stickerStore = $this->stickerStoreRepository->find($id);

		if(empty($stickerStore))
		{
			Flash::error('StickerStore not found');

			return redirect(route('stickerStores.index'));
		}

		$input = $request->all();

		if($request->file('stickerImg'))
			$input['stickerImg'] = json_encode($this->uploadImage($request->file('stickerImg'),'/stickers_photo/'));

		$this->stickerStoreRepository->updateRich($input, $id);

		Flash::success('StickerStore updated successfully.');

		return redirect(route('stickerStores.index'));
	}

	/**
	 * Remove the specified StickerStore from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$stickerStore = $this->stickerStoreRepository->find($id);

		if(empty($stickerStore))
		{
			Flash::error('StickerStore not found');

			return redirect(route('stickerStores.index'));
		}

		$this->stickerStoreRepository->delete($id);

		Flash::success('StickerStore deleted successfully.');

		return redirect(route('stickerStores.index'));
	}
}
