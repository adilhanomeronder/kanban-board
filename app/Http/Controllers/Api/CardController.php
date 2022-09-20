<?php
namespace App\Http\Controllers\Api;
use App\Http\Requests\CardStoreRequest;
use App\Http\Requests\CardUpdateRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $qb = Card::query();
            $qb->orderBy("queue", 'ASC');

            if($request->has("q"))
                $qb->where("title", 'like', '%'.$request->query("q")."%");

            if($request->has("list"))
                $qb->where('list', '=', $request->query("list"));

            if($request->has("sortBy"))
                $qb->orderBy($request->query("sortBy"), $request->query("sort", 'ASC'));

            if($request->has("offset") && $request->has("limit"))
                $qb->offset($request->query('offset'))->limit($request->query('limit'))->get();

            $data = $qb->get();
            return $this->apiResponse($data, "Card fetched", 200);

        }catch (\Exception $e){
            return $this->apiResponse(null, "Card not fetched", 200);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CardStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardStoreRequest $request)
    {
        try {
            $create = Card::create($request->except('_token'));
            $rsp = $request->except('_token');
            $rsp["id"] = $create["id"];

            return $this->apiResponse($rsp, "Card created", 201);

        }catch (\Exception $e){
            return $this->apiResponse(null, "Card not created", 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Card::where("id",$id)->firstOrfail();

            return $this->apiResponse($data, "Card listed", 200);
        }catch (\Exception $e){
            return $this->apiResponse(null, "Card not found", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CardUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardUpdateRequest $request, $id)
    {
        try {
            Card::where("id", $id)
            ->update($request->except('_method', "_token"));

            return $this->apiResponse($request->input(), "Card updated", 200);

        }catch (\Exception $e){
            return $this->apiResponse(null, "Card not updated", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Card::where("id",$id)->delete();
            return $this->apiResponse(null, "Card deleted", 200);

        }catch (\Exception $e){
            return $this->apiResponse(null, "Card not deleted", 500);
        }
    }
}
