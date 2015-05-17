<?php

namespace Laraerp\Ordination;


trait OrdinationTrait {

    public function orderBy($column, $direction = 'asc'){

        $parts = explode('.', $column);

        $column = array_pop($parts);

        if(count($parts) > 0){

            $table = null;

            $builder = $this;
            $model = $this;

            foreach($parts as $part){
                $relation = $model->{$part}();
                $model = $relation->getRelated();

                $table = $model->getTable();

                $builder = $builder->leftjoin($table, $relation->getQualifiedForeignKey(), '=', $relation->getQualifiedOtherKeyName());
            }

            return $builder->orderBy($table . '.' . $column, $direction);

        }else

            return parent::orderBy($column, $direction);
    }

}
