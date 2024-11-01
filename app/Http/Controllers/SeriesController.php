<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Series;
use App\Models\Season;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();

        return view('series/index', compact('series'));
    }

    public function create()
    {
        return view('series/create');
    }

    public function store(SeriesFormRequest $request): RedirectResponse
    {
        $serie = Series::create($request->all());
        $this->createSeasons($serie, $request->seasonsQty);
        $this->createEpisodes($serie, $request->episodes);

        return to_route('series.index');
    }

    private function createSeasons(Series $serie, int $seasonsQty): void
    {
        $seasons = [];
        for ($i = 1; $i <= $seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);
    }

    private function createEpisodes(Series $serie, int $episodesQty): void
    {
        $episodes = [];
        foreach ($serie->seasons as $season) { 
            for ($j = 1; $j <= $episodesQty; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Series::destroy($request->series);
        return to_route('series.index');
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request): RedirectResponse
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index');
    }
}
