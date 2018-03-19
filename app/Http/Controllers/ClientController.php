<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\AjaxValidationRequest;
use Illuminate\Contracts\Session;
use App\Client;
use App\Telephone;
use Illuminate\Validation\Validator;
use Response;
use Illuminate\Support\Facades\Input;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::paginate(10);


        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = Client::create([
            'name'      =>  $request->input('Nname'),
            'email'     =>  $request->input('Nemail'),
            'address'   =>  $request->input('Naddress'),
        ]);

        return redirect()->back();
        /**
        $client = new Client;

        $client->name = $request->Nname;
        $client->email = $request->Nemail;
        $client->address = $request->Naddress;

        $client->save();

        \Session::flash('flash_message', [
            'msg' => "The Client was add with success!!",
            'class' => "alert-success"
        ]);


        return redirect()->route('client.create');**/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addClient(AjaxValidationRequest $request)
    {
        if($request->ajax())
        {
            $client = Client::create($request->all());

            return Response(Client::find($client->id));
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
        $client = Client::find($id);

        $telephones = Telephone::where('client_id', $id)->first();
        $client->telephones = $telephones;
        //$clients = Telephone::paginate(10);

        //return redirect()->route('client.index', compact('cli', 'clients'));
        return $client->telephones;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        if (!$client) {
            \Session::flash('flash_message', [
                'msg' => "This Client did not was found!!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('client.create');
        }

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $client->name       =  $request->Nname;
        $client->email      =  $request->Nemail;
        $client->address    =  $request->Naddress;
        $client->save();

            \Session::flash('flash_message', [
                'msg' => "The Client was updated with success!!",
                'class' => "alert-success"
            ]);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editClient(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;

            $client = Client::find($id);

            return Response($client);
        }/**
            $client = Client::find($id);

            return Response($client);**/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClient(Request $request)
    {
       if($request->ajax())
       {
            $client = Client::find($request->id);
            $client->update($request->all());

            return Response($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infoClient(Request $request)
    {
        if($request->ajax())
        {
        $client = Client::find($request->id);
        //Search the telephones belongs to client
        $telephones = Telephone::where('client_id', $client->id)->first();
        //Add the telephones to JSON
        $client->telephones = $telephones;

            //return Response(Client::find($request->id));
            return Response($client);
        }

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroyClient(Request $request)
     {
        if($request->ajax())
        {
            $client = Client::find($request->id);
            $client->delete();

            \Session::flash('flash_message', [
                'msg' => "The client was delete with success!!",
                'class' => "alert-success"
            ]);
            return Response()->json(['msg' => 'O client foi deletado com sucesso!',
                                     'id'  => $request->id]);
        }
     }

    public function destroy($id)
    {
        $client = Client::find($id);

        if(!$client->destroyTelephones()){
             \Session::flash('flash_message', [
                'msg' => "Telephones was not found in data base!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('client.index');

        }elseif(!$client) {
            \Session::flash('flash_message', [
                'msg' => "This Client was not found!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('client.index');
        }

        $client->delete();

            \Session::flash('flash_message', [
                'msg' => "This Client was deleted with success",
                'class' => "alert-success"
            ]);

        return redirect()->route('client.index');
    }

    public function testComponent() {
        return view('test-vue');
    }
}
