<?php

class Artist extends Eloquent {

    protected $table = 'artists';

    public function albums() {
        return $this->hasMany('Album');
    }

    public function songs() {
        return $this->hasManyThrough('Song', 'Album');
    }
}
