<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateApkRequest;
use App\Http\Requests\UpdateApkRequest;
use App\Libraries\Repositories\ApkRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ApkController extends AppBaseController
{

	/** @var  ApkRepository */
	private $apkRepository;

	function __construct(ApkRepository $apkRepo)
	{
		$this->apkRepository = $apkRepo;
	}

	/**
	 * Display a listing of the Apk.
	 *
	 * @return Response
	 */
	public function index()
	{
		$apks = $this->apkRepository->paginate(10);

		return view('apks.index')
			->with('apks', $apks);
	}

	/**
	 * Show the form for creating a new Apk.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('apks.create');
	}

	/**
	 * Store a newly created Apk in storage.
	 *
	 * @param CreateApkRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateApkRequest $request)
	{
		$input = $request->all();

		if($request->name){

			$apk_file = $this->uploadAPK($request->name, '/apk/');

			if($apk_file){
				$input['name'] = $apk_file;
			}
		}

		$apk = $this->apkRepository->create($input);

		Flash::success('Apk saved successfully.');

		return redirect(route('apks.index'));
	}

	/**
	 * Display the specified Apk.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$apk = $this->apkRepository->find($id);

		if(empty($apk))
		{
			Flash::error('Apk not found');

			return redirect(route('apks.index'));
		}

		return view('apks.show')->with('apk', $apk);
	}

	/**
	 * Show the form for editing the specified Apk.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$apk = $this->apkRepository->find($id);

		if(empty($apk))
		{
			Flash::error('Apk not found');

			return redirect(route('apks.index'));
		}

		return view('apks.edit')->with('apk', $apk);
	}

	/**
	 * Update the specified Apk in storage.
	 *
	 * @param  int              $id
	 * @param UpdateApkRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateApkRequest $request)
	{
		$apk = $this->apkRepository->find($id);

		if(empty($apk))
		{
			Flash::error('Apk not found');

			return redirect(route('apks.index'));
		}

		$this->apkRepository->updateRich($request->all(), $id);

		Flash::success('Apk updated successfully.');

		return redirect(route('apks.index'));
	}

	/**
	 * Remove the specified Apk from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$apk = $this->apkRepository->find($id);

		if(empty($apk))
		{
			Flash::error('Apk not found');

			return redirect(route('apks.index'));
		}

		$this->apkRepository->delete($id);

		Flash::success('Apk deleted successfully.');

		return redirect(route('apks.index'));
	}
}
