<?php

namespace App\Repositories\Backend\Inventory\Aircon;

use App\Models\Inventory\Item\Aircon\Aircon;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Inventory\Aircon\AirconCreated;
use App\Events\Backend\Inventory\Aircon\AirconDeleted;
use App\Events\Backend\Inventory\Aircon\AirconUpdated;
use App\Events\Backend\Inventory\Aircon\AirconUploaded;
use App\Events\Backend\Inventory\Aircon\AirconRestored;
use App\Events\Backend\Inventory\Aircon\AirconPermanentlyDeleted;

use Excel;

/**
* Class AirconRepository.
*/
class AirconRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Aircon::class;

    /**
     * @param        $permissions
     * @param string $by
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
        * be able to differentiate what buttons to show for each row.
        */
        $dataTableQuery = $this->query()
        ->select([
            config('inventory.aircons_table').'.id',
            config('inventory.aircons_table').'.name',
            config('inventory.aircons_table').'.serial_number',
            config('inventory.aircons_table').'.status',
            config('inventory.aircons_table').'.created_at',
            config('inventory.aircons_table').'.updated_at',
            config('inventory.aircons_table').'.deleted_at',
        ]);

        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }

    public function create($input)
    {
        $data = $input['data'];

        $aircon = $this->createAirconStub($data);

        DB::transaction(function () use ($aircon, $data) {
            if ($aircon->save()) {
                event(new AirconCreated($aircon));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.create_error'));
        });
    }

    public function update(Model $aircon, array $input)
    {
        $data = $input['data'];

        $aircon->name           = $data['name'];
        $aircon->serial_number  = $data['serial_number'];
        $aircon->manufacturer   = $data['manufacturer'];
        $aircon->price          = $data['price'];
        $aircon->selling_price  = $data['selling_price'];
        $aircon->horsepower     = $data['horsepower'];
        $aircon->voltage        = $data['voltage'];
        $aircon->size           = $data['size'];
        $aircon->brand_name     = $data['brand_name'];
        $aircon->feature        = $data['feature'];

        DB::transaction(function () use ($aircon, $data) {
            if ($aircon->save()) {
                event(new AirconUpdated($aircon));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.update_error'));
        });
    }

    public function import(Model $aircon, array $input)
    {
        $data = $input['data'];

        DB::transaction(function () use ($aircon, $data) {
            $path = $data['aircon_file']->getRealPath();

            $airconFile = Excel::load($path, function($reader) {})->get();

            if(!empty($airconFile) && $airconFile->count()) {

            foreach (array_chunk($airconFile->toArray()) as $key => $value) {
                $insert[] = [
                    'name'             => isset($value['name']) ? $value['name'] : '-',
                    'customer_id'      => 0,
                    'manufacturer'     => isset($value['manufacturer']) ? $value['manufacturer']: '-',
                    'price'            => isset($value['price']) ? $value['price'] : '0.0' ,
                    'selling_price'    => isset($value['selling_price']) ? $value['selling_price'] : '0.0',
                    'horsepower'       => isset($value['horsepower']) ? $value['horsepower']: '0.0' ,
                    'voltage'          => isset($value['voltage']) ? $value['voltage'] : '0.0',
                    'size'             => isset($value['size']) ? $value['size'] : '0.0',
                    'brand_name'       => isset($value['brand_name']) ? $value['brand_name'] : '-',
                    'feature'          => isset($value['feature']) ? $value['feature'] : '-',
                    'status'           => 2,
                    'container_number' => isset($value['container_number']) ? $value['container_number'] : '-',
                    'batch_code'       => isset($value['batch_code']) ? $value['batch_code'] : '-',
                    'door_type'        => isset($value['door_type']) ? $value['door_type'] : '-',
                    'serial_number'    => isset($value['serial_number']) ? $value['serial_number'] : '-',
                    'created_at'       => date('Y-m-d h:i:s'),
                    'updated_at'       => date('Y-m-d h:i:s')
                ];
            }

                if(!empty($insert)) {
                    Aircon::insert($insert);
                }

                event(new AirconUploaded($aircon));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.upload_error'));
        });
    }

    protected function createAirconStub($input)
    {
        $aircon                 = self::MODEL;
        $aircon                 = new $aircon;
        $aircon->name           = $input['name'];
        $aircon->user_id        = 0;
        $aircon->category_id    = 0;
        $aircon->serial_number  = $input['serial_number'];
        $aircon->manufacturer   = $input['manufacturer'];
        $aircon->price          = $input['price'];
        $aircon->status         = isset($input['status']) ? 1 : 0;
        $aircon->horsepower     = $input['horsepower'];
        $aircon->voltage        = $input['voltage'];
        $aircon->size           = $input['size'];
        $aircon->brand_name     = $input['brand_name'];
        $aircon->feature        = $input['feature'];
        $aircon->manufacturer   = $input['manufacturer'];

        return $aircon;
    }

    public function delete(Model $aircon)
    {
        if ($aircon->delete()) {
            event(new AirconDeleted($aircon));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
    }

    public function forceDelete(Model $aircon)
    {
        if (is_null($aircon->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_first'));
        }

        DB::transaction(function () use ($aircon) {
            if ($aircon->forceDelete()) {
            event(new AirconPermanentlyDeleted($aircon));

            return true;
            }

            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
        });
    }

    public function restore(Model $aircon)
    {
        if (is_null($aircon->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.cant_restore'));
        }

        if ($aircon->restore()) {
            event(new AirconRestored($aircon));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.restore_error'));
    }
}
