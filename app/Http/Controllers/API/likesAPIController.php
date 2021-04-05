<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelikesAPIRequest;
use App\Http\Requests\API\UpdatelikesAPIRequest;
use App\Models\likes;
use App\Repositories\likesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\customers;
/**
 * Class likesController
 * @package App\Http\Controllers\API
 */

class likesAPIController extends AppBaseController
{
    /** @var  likesRepository */
    private $likesRepository;

    public function __construct(likesRepository $likesRepo)
    {
        $this->likesRepository = $likesRepo;
    }

    /**
     * Display a listing of the likes.
     * GET|HEAD /likes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $likes = $this->likesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
foreach ($likes as $like) {
   $like->data_to= customers::findOrFail($like->to);
}
        return $this->sendResponse($likes->toArray(), 'Likes retrieved successfully');
    }

    /**
     * Store a newly created likes in storage.
     * POST /likes
     *
     * @param CreatelikesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatelikesAPIRequest $request)
    {
        $input = $request->all();
$title='اولوياتي';
$to=customers::find($request->to);
if (app()->getLocale()=='ar') {
    $body="لقد ضمك  ".$to->name." ضمن قائمة اولوياتي
    اتمنى لك النجاح والتفوق ويرزقك الله الخير";
}
else {
    $body="Oh dear ".$to->name." for sure I included you in my list of priorities I wish you success, excellence, and may God bless you.";
}

        $likes = $this->likesRepository->create($input);
// return $request;
$this-> firebase_notification($request->to, $title, $body,null);
        return $this->sendResponse($likes->toArray(), 'Likes saved successfully');
    }

    /**
     * Display the specified likes.
     * GET|HEAD /likes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var likes $likes */
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            return $this->sendError('Likes not found');
        }

        return $this->sendResponse($likes->toArray(), 'Likes retrieved successfully');
    }

    /**
     * Update the specified likes in storage.
     * PUT/PATCH /likes/{id}
     *
     * @param int $id
     * @param UpdatelikesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatelikesAPIRequest $request)
    {
        $input = $request->all();

        /** @var likes $likes */
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            return $this->sendError('Likes not found');
        }

        $likes = $this->likesRepository->update($input, $id);

        return $this->sendResponse($likes->toArray(), 'likes updated successfully');
    }

    /**
     * Remove the specified likes from storage.
     * DELETE /likes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var likes $likes */
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            return $this->sendError('Likes not found');
        }

        $likes->delete();

        return $this->sendSuccess('Likes deleted successfully');
    }
    public function deleteFromHomePage($from_id,$to_id){
       $likes= likes::where('from',$from_id)->where('to',$to_id)->firstorfail()->delete();
       return $this->sendSuccess('Likes deleted successfully');

    }
}
