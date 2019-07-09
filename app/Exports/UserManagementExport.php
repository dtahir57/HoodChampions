<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Spatie\Permission\Models\Role;

class UserManagementExport implements FromQuery, WithHeadings, WithMapping, WithEvents
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
				$event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
			},
		];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::role(Role::all())->select('id', 'name', 'email', 'phone_number', 'created_at');
    }
    /**
    * @var Invoice $invoice
    */
    public function map($user): array
    {
        return [
        	$user->id,
        	$user->name,
        	$user->email,
        	$user->phone_number,
        	$user->created_at,
        	$user->getRoleNames(),
        	$user->getAllPermissions()->pluck('name')
        ];
    }
    public function headings(): array
    {
        return [
        	'ID',
            'Name',
            'Email',
            'Phone Number',
            'Created At',
            'Assigned Roles',
            'Assigned Permissions'
        ];
    }
}
