<?php

namespace Laraerp\Ordination;


trait OrdinationTrait {

    public function orderBy($column, $direction = 'asc'){
        if(strpos($column, '.')) {
            $a = substr($column, 0, strpos($column, '.'));
            $b = substr($column, strpos($column, '.') + 1);

            $relation = $this->{$a}();
            $table = $relation->getRelated()->getTable();

            $column = $table.'.'.$b;

            return $this->join($table, $relation->getQualifiedForeignKey(), '=', $relation->getQualifiedOtherKeyName())->orderBy($column, $direction);
        }else
            return parent::orderBy($column, $direction);
    }

}
