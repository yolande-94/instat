$indics = DB::table('result_regions')
                            ->join('regions','regions.id','=','result_regions.id_region')
                            ->join('indicators', function ($join) {
                                $join->on('result_regions.id_indicator', '=', 'indicators.id')
                                    ->where('result_regions.id_indicator', '=', 1);
                                    })
                            ->select('regions.id','regions.name','result_regions.value')
                            ->get();

                            $ValueByIndicator = array();
            foreach ($resregs as $resreg) {
                $ValueByIndicator[$resreg->id_indicator][$resreg->id] = $resreg->value;
                }


SELECT * FROM `result_regions` ORDER BY id_indicator ASC


<a href="{{ URL::to('affichage/'.$resreg->id_indicator) }}" class="list-group-item">