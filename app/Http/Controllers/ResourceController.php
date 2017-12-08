<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Events\SendNotificationEvent;
use App\Format;
use App\Language;
use App\Notification;
use App\Resource;
use App\ResourceView;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Parsedown;

class ResourceController extends Controller
{
    /**
     * ResourceController constructor.
     */
    public function __construct()
    {
        $this->middleware('checkAuth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = User::find(session('usuario_id'))->resources()->paginate(6);
        $languages = Language::pluck('name', 'id');
        $formats = Format::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'POST';
        $url = '/resource';
        return view('resources.resources', compact('resources', 'languages', 'types', 'formats', 'method', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        $user = Auth::id();

        $resource = new Resource;
        $resource->user_id = $user;
        $resource->type_id = $request->type_id;
        $resource->name = $request->name;
        $resource->format_id = $request->format_id;
        $resource->language_id = $request->language_id;
        if (isset($request->has_cost) && $request->has_cost != null) {
            $resource->has_cost = 1;
        }
        $resource->link = $request->link;
        $mdToHtml = Parsedown::instance()->setBreaksEnabled(false)->text($request->description);
        if (strlen($request->description) > 350) {
            $resource->short_description = substr($mdToHtml, 0, 350) . '...';
        } else {
            $resource->short_description = $mdToHtml;
        }
        $resource->description = $request->description;
        $resource->tags = $request->tags;
        $resource->save();

        $this->assignMedal($user)->sendNotification($resource);

        return back()->with('success', 'Recurso creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $resource = Resource::find($id);
            ResourceView::create(['resource_id' => $resource->id]);
            return response()->json(['status' => 200, 'data' => compact('resource')]);
        }

        $resource = Resource::find($id);
        dd($resource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso = Resource::find($id);
        if (Auth::user()->id != $recurso->user->id) {
            return redirect('/');
        }

        $resources = User::find(session('usuario_id'))->resources;
        $languages = Language::pluck('name', 'id');
        $formats = Format::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'PATCH';

        $url = "/resource/$recurso->id";

        return view('resources.update', compact('resources', 'languages', 'types', 'formats' ,'method', 'url', 'recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $resource = Resource::find($id);
        $resource->name = $request->name;
        $resource->type_id = $request->type_id;
        $resource->has_cost = ($request->has('has_cost')) ? 1 : 0;
        $resource->language_id = $request->language_id;
        $resource->link = $request->link;
        $resource->description = $request->description;
        $resource->tags = $request->tags;

        $resource->save();
        //return back()->with('success', 'Recurso actualizado satisfactoriamente');
        return redirect('/resource')->with('success', 'Recurso actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resource::destroy($id);
        return back()->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function assignMedal($user)
    {
        $recursos = User::find($user)->resources()->count();
        if (in_array($recursos, [1, 5, 10, 25, 50, 100])) {
            $has_medal = Badge::where('user_id', $user)->where('name', $recursos . ' Recursos')->first();
            if (!$has_medal) {
                $badge = new Badge;
                $badge->user_id = $user;
                $badge->name = $recursos . ' Recursos';
                $badge->image = $recursos . '.png';
                $badge->save();
            }
        }

        return $this;
    }

    public function sendNotification($resource){
        $notification = new Notification();
        $notification->app_id = env('ONESIGNAL_APP_ID');
        $notification->headings = ['en' => 'Rovix: nuevo recurso'];
        $notification->contents = ['en' => $resource->name];
        $notification->included_segments = ['All'];
        event(new SendNotificationEvent($notification));
        return $this;
    }
}
