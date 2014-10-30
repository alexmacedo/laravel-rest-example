<?php

class MusicApiSeeder extends Seeder {

    public function run()
    {
        DB::table('songs')->delete();
        DB::table('albums')->delete();
        DB::table('artists')->delete();

        $led_zeppelin = Artist::create(array('name' => 'Led Zeppelin', 'active' => false));

        $black_sabbath = Artist::create(array('name' => 'Black Sabbath', 'active' => true));

        $houses_of_the_holy = Album::create(array(
            'name' => 'Houses of the Holy',
            'year' => '1972',
            'artist_id' => $led_zeppelin->id
        ));

        $paranoid = Album::create(array(
            'name' => 'Paranoid',
            'year' => 1970,
            'artist_id' => $black_sabbath->id
        ));

        $master_of_reality = Album::create(array(
            'name' => 'Master of Reality',
            'year' => 1971,
            'artist_id' => $black_sabbath->id
        ));

        $songs = array(
            "The Song Remains the Same",
            "The Rain Song",
            "Over the Hills and Far Away",
            "The Crunge",
            "Dancing Days",
            "D'yer Mak'er",
            "No Quarter",
            "The Ocean",
        );

        foreach ($songs AS $key => $value) {
            Song::create(array(
                'name' => $value,
                'track' => $key + 1,
                'album_id' => $houses_of_the_holy->id
            ));
        }

        $songs = array(
            "War Pigs",
            "Paranoid",
            "Planet Caravan",
            "Iron Man",
            "Electric Funeral",
            "Hand of Doom",
            "Rat Salad",
            "Fairies Wear Boots"
        );

        foreach ($songs AS $key => $value) {
            Song::create(array(
                'name' => $value,
                'track' => $key + 1,
                'album_id' => $paranoid->id
            ));
        }

        $songs = array(
            "Sweet Leaf",
            "After Forever",
            "Embryo",
            "Children of the Grave",
            "Orchid",
            "Lord of This World",
            "Solitude",
            "Into the Void"
        );

        foreach ($songs AS $key => $value) {
            Song::create(array(
                'name' => $value,
                'track' => $key + 1,
                'album_id' => $master_of_reality->id
            ));
        }
    }
}
