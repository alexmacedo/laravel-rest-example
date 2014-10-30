<?php

class Song extends Eloquent {

    protected $table = 'songs';

    public function album() {
        return $this->belongsTo('Album');
    }

}
