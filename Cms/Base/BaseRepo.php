<?php

namespace Cms\Base;
use Illuminate\Database\QueryException;

abstract class BaseRepo implements BaseRepoInterface
{

    abstract public function getModel();

    public function find($id)
    {
        try {
            return $this->getModel()->find($id);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());;
        }
    }


    public function all($column = 'id', $filter = 'ASC')
    {
        try {
            return $this->getModel()->orderBy($column, $filter)->get();
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function allOrderBy($column, $order)
    {
        try {
            return $this->getModel()->orderBy($column, $order)->get();
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function create($data)
    {
        try {
            return $this->getModel()->create($data);
        }catch (QueryException $e) {
            // TODO Tengo que implementar esto en los demas metodos...
            throw new \Exception($e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            if($this->getModel()->find($id)->update($request)){
                return $this->find($id);
            }
            return null;
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $dato = $this->getModel()->findOrFail($id);
            $dato->status = $dato->status ? 0: 1;
            if($dato->save()) {
                return $this->find($id);
            }
            return null;
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function findByAttributes(array $attributes)
    {
        try {
            $query = $this->buildQueryByAttributes($attributes);
            return $query->first();
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc')
    {
        try {
            $query = $this->buildQueryByAttributes($attributes, $orderBy, $sortOrder);
            return $query->get();
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function findByMany(array $ids)
    {
        try {
            $query = $this->getModel()->query();
            return $query->whereIn("id", $ids)->get();
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function clearCache()
    {
        return true;
    }

    public function getFillable()
    {
        return $this->getModel()->getFillable();
    }

    private function buildQueryByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc')
    {
        $query = $this->getModel()->query();
        if (method_exists($this->getModel(), 'translations')) {
            $query = $query->with('translations');
        }
        foreach ($attributes as $field => $value) {
            $query = $query->where($field, $value);
        }
        if (null !== $orderBy) {
            $query->orderBy($orderBy, $sortOrder);
        }
        return $query;
    }
}
