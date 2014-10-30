<?php

class Album extends Eloquent {

    protected $table = 'albums';

    public function artist() {
        return $this->belongsTo('Artist');
    }

    public function songs() {
        return $this->hasMany('Song');
    }

}
