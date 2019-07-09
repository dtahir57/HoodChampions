<?php

namespace App\Exports;

use App\Http\Models\Hood;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class HoodsExport implements FromQuery, WithHeadings, WithMapping, WithEvents
{
	/**
	 * @return [type] [description]
	 */
	public function registerEvents(): array
	{
		$styleArray = [
			'font' => [
				'bold' => true
			]
		];
		return [
			AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
				$event->sheet->getStyle('A1:D1')->applyFromArray($styleArray);
			},
		];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Hood::select('id', 'planning_area_name', 'region_id', 'created_at');
    }
    /**
    * @var Invoice $invoice
    */
    public function map($hood): array
    {
        return [
        	$hood->id,
            $hood->planning_area_name,
            $hood->region->region,
            $hood->created_at,
        ];
    }
    public function headings(): array
    {
        return [
        	'ID',
            'Planning Area Name',
            'Region',
            'Created At'
        ];
    }
}
