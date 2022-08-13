<?php
namespace App\Http\Controllers;

use App\Models\Rest;
use Illuminate\Http\Request;

class RestController extends Controller
{
    /**
     *リソースのリストを表示します。
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Rest::all();
        return response()->json([
            'data' => $items
        ], 200);
    }





    
    /**
     *新しく作成されたリソースをストレージに格納します
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Rest::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);

    }

    /**
     * 指定されたリソースを表示します。
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(Rest $rest)
    {
        $item = Rest::find($rest);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     *ストレージ内の指定されたリソースを更新します。
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rest $rest)
    {
        $update = [
            'message' => $request->message,
            'url' => $request->url
        ];
        $item = Rest::where('id', $rest->id)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     *指定されたリソースをストレージから削除します。
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rest $rest)
    {
        $item = Rest::where('id', $rest->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
