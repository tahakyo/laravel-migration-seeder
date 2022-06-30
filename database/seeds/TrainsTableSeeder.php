<?php

use App\train;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $types = [
            'Regionale veloce',
            'Freccia rossa',
            'Freccia bianca'
        ];
        //inserire i record all'interno della tabella
        for ($i=0; $i < 10; $i++) {
            $train = new train();
            $train->azienda = 'Trenitalia';
            $train->tipo_di_treno = $types[rand(0, count($types)-1)];
            $train->stazione_di_partenza = $faker->state();
            $train->stazione_di_arrivo = $faker->state();
            $train->orario_di_partenza = $faker->time('H:i');
            $train->orario_di_arrivo = $faker->time('H:i');
            $train->codice_treno = $faker->regexify('[A-Z]{5}[0-4]{3}');
            $train->numero_carrozza = $faker->randomDigitNotNull();
            $train->in_orario = $faker->boolean();
            $train->cancellato = $faker->boolean();
            $train->save();
        }
    }
}
