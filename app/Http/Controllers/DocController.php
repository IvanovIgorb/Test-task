<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use DateTimeImmutable;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $key = 'tagged';
        if ($request->input('inTitle')){
            $key = 'inTitle';
        }
        //checking required parameters
        $request->validate(
            [
                'site' => 'required',
                'order' => 'required',
                'sort' => 'required',
                $key => 'required',
            ]
        );

        $site = $request->input('site');
        $page = $request->input('page');
        $pageSize = $request->input('pageSize');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $order = $request->input('order');
        $min = $request->input('min');
        $max = $request->input('max');
        $sort = $request->input('sort');
        $tagged = $request->input('tagged');
        $notTagged = $request->input('notTagged');
        $inTitle = $request->input('inTitle');

        //API address
        $url = 'https://api.stackexchange.com/2.3/search?';

        //setting the given criteria
        $options = array(
            'page' => $page,
            'pagesize' => $pageSize,
            'fromdate' => $fromDate,
            'todate' => $toDate,
            'order'=> $order,
            'min'=> $min,
            'max'=> $max,
            'sort'=> $sort,
            'tagged'=> $tagged,
            'nottagged'=> $notTagged,
            'intitle'=> $inTitle,
            'site'=> $site,
        );

        //building query
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_ENCODING ,"");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url.http_build_query($options));

        $response = curl_exec($ch);
        $data = json_decode($response, true);
        curl_close($ch);


        foreach($data as $element){
            foreach ((array)$element as $item){
                if($item['title']){
                    $now = new DateTimeImmutable();
                    $date = $now->setTimestamp($item['creation_date']);
                    $dateFormat = $date->format('Y-m-d H:i:s');
                    Doc::create(
                      [
                          'title' => $item['title'],
                          'creation_date' => $dateFormat,
                          'author' => $item['owner']['display_name'],
                          'answered' => $item['is_answered'],
                          'link' => $item['link'],
                      ]
                    );
                }
            }
        }

        return redirect()->route('index');
    }

    /**
     * Display the resources.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        $docs = Doc::all();
        return view('show', compact('docs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $doc)
    {
        //
    }

    /**
     * Clearing storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Doc::truncate();

        return redirect()->route('index');
    }
}
