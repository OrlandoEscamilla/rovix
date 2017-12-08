<?php

namespace App\Http\Controllers;

use App\Language;
use App\QueriesTops;
use App\Resource;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MainController extends Controller {

    public function recursos() {
        $resources = Resource::all();
        $languages = Language::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'POST';
        $url = '/resource';
        return view('recursos', compact('resources', 'languages', 'types', 'method', 'url'));
    }

    public function buscar(Request $request) {

        $types = Type::all();
        $searching = (isset($request->searching) ? $request->searching : '');
        $request->session()->put('searching', $searching);
        if (isset($request->types)) {
            $request->session()->put('types', $request->types);
            $filter = str_split($request->types, 1);
        } else {
            $filter = $this->getTypes($request);
            $request->session()->put('types', implode('', $filter));
        }

        $filtering = [];

        /** Here we get which filters (resources types) were picked*/
        for ($i = 1; $i <= count($types); $i++) {
            if (in_array($i, $filter)) {
                array_push($filtering, 1);
            } else {
                array_push($filtering, 0);
            }
        }

        if (empty($request->searching)) {
            /** If searching was empty, we will response with the six latest resources added */
            $recursos = DB::table('resources')
                ->join('types', 'types.id', '=', 'resources.type_id')
                ->leftJoin('users', 'users.id', '=', 'resources.user_id')
                //->leftJoin('stars', 'stars.resource_id', '=', 'resources.id')
                ->select('resources.*', 'types.name as tipo', 'types.icon', 'types.class', 'users.name as usuario')
                ->whereIn('resources.type_id', (empty($filter) ? [1, 2, 3, 4, 5, 6] : $filter))
                ->whereNull('resources.deleted_at')
                ->latest()
                ->limit(6)
                ->paginate(5);
            $searching = 'Últimos recursos agregados';
            return view('buscador', compact('recursos', 'types', 'searching', 'filtering'));

        } else {
            $recursos = DB::table('resources')
                ->join('types', 'types.id', '=', 'resources.type_id')
                ->leftJoin('users', 'users.id', '=', 'resources.user_id')
                //->leftJoin('stars', 'stars.resource_id', '=', 'resources.id')
                ->select('resources.*', 'types.name as tipo', 'types.icon', 'types.class', 'users.name as usuario')
                ->where([
                    ['resources.name', 'like', "%{$request->searching}%"]
                    //['resources.type_id', '=', '1']
                ])
                ->whereIn('resources.type_id', (empty($filter) ? [1, 2, 3, 4, 5, 6] : $filter))
                ->whereNull('resources.deleted_at')
                ->paginate(5);

            //dd($recursos);
            return view('buscador', compact('recursos', 'types', 'searching', 'filtering'));
        }
    }

    public function getTypes($request) {
        $types = Type::pluck('name');
        $tipos = [];
        $busqueda = [];
        $filtro = [];

        foreach ($request->request as $key => $value) {
            $key = str_replace('_', ' ', $key);
            array_push($busqueda, $key);
        }

        foreach ($types as $type) {
            array_push($tipos, $type);
        }

        for ($i = 0; $i < count($busqueda); $i++) {
            $index = array_search($busqueda[$i], $tipos);
            if (is_int($index)) {
                array_push($filtro, $index + 1);
            }
        }

        return $filtro;
    }

    public function about() {
        return view('about');
    }

    public function getUserProfile() {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function searcher(Request $request) {
        $searching = $request->searching;
        $topViewed = [
            'title' => 'Top Más Vistos',
            'elements' => QueriesTops::topStarred(),
            'type' => 'info'
        ];
        $topStarred = [
            'title' => 'Top Más Estrellados',
            'elements' => QueriesTops::topViewed(),
            'type' => 'warning'
        ];
        return view('searching.searcher', compact('searching', 'topViewed', 'topStarred'));
    }
}
