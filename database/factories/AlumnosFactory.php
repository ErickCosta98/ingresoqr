<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumnos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'matricula'=> Helper::IDGenerator(new Alumnos, 'matricula', 8, 'MTR') ,
                'nombre' => $this->faker->name(),
                'apelPat'=> $this->faker->name(),
                'apelMat' => $this->faker->name(),    
        ];
    }
}
